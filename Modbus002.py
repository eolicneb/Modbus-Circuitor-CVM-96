#!/usr/bin/env python
import sys
import minimalmodbus
from CircuitorCVM96 import CircuitorCVM96
from time import time, sleep
from numpy import array, concatenate
import requests
import threading as thr

minimalmodbus.BAUDRATE=9600
minimalmodbus.TIMEOUT=.5

MAXY=2
MAXX=3
MUESTREO=1. # segundos
archivo='C:\Documents and Settings\Administrator\Servicio\Circuitor\setup.dat'

def promALinea(tiempo, promedios):
  return strTiempo(tiempo) + ',' + ','.join([str(a) for a in promedios])

def strTiempo(tiempo):
    from time import asctime as asc, localtime as lt
    return asc(lt(tiempo))

def strHora(timepo):
  return strTiempo(tiempo)[11:19]

def strFecha(tiempo):
  return strTiempo(tiempo)[:10]

def promAGet(tiempo, promedios):
    sender = '?t=' + strTiempo(tiempo)
    return sender + '&' + '&'.join(['var'+str(n)+'='+str(a) for n, a in enumerate(promedios)])

def titulosALinea(instrumento, consultaPorLinea, consultaTrifasicas):
  titulos='hora,'
  titulos+=','.join([instrumento.TitulosDeFuncionesPorLinea[a]+' L'+str(n) for n in [1, 2, 3] for a in consultaPorLinea])
  titulos+=','+','.join([instrumento.TitulosDeFuncionesTrifasicas[b] for b in consultaTrifasicas])
  return titulos

def registrar(tiempo, promedios, titulos, archivo, url):
  linea = promALinea(tiempo, promedios)
  sender = promAGet(tiempo, promedios)
  sys.stdout.write('\nRegistrando: \n')
##  if url!=None:
##    try:
##      requests.get(url+promAGet(tiempo, promedios))
##    except:
##      sys.stdout.write('No se pudo enviar datos a la URL indicada.')
  sys.stdout.write(linea+'\n')

  thr_envio=thr.Thread(group=None, target=mandarDatos,
                       name='envio', args=(tiempo, promedios, url))
  thr_envio.start()

  thr_registro=thr.Thread(group=None, target=registrarArchivo,
                          name='registro', args=(linea, archivo, titulos))
  thr_registro.start()

def mandarDatos(tiempo, promedios, url):
  if url!=None:
    try:
      requests.get(url+promAGet(tiempo, promedios))
      sys.stdout.write('Los datos se enviaron correctamente a '+url)
    except:
      sys.stdout.write('No se pudo enviar datos a la URL indicada.')


def registrarArchivo(linea, archivo, titulos=None):
  from os.path import isfile
  conEncabezado = not isfile(archivo) and titulos!=None
  try:
    with open(archivo, 'a') as f:
      if conEncabezado: f.write(titulos+'\n')
      f.write(linea+'\n')
    sys.stdout.write('Se escribio en '+archivo+'\n')
  except IOError as error:
    sys.stdout.write('No se pudo escribir en '+archivo+'\n')
    sleep(1)
    registrarArchivo(linea, archivo, titulos)

def archivoPorFecha(tiempo, archivo):
  a = archivo.split('.')
  return a[0]+' '+strFecha(tiempo)+'.'+a[1]

def tomarSetUp(archivo):
  d = open(archivo,'r')
  ret = []
  for l in d:
    if 'a'<=l[0]<='z' or 'A'<=l[0]<='Z' or '0'<=l[0]<='9': ret.append(l[:-1])
  d.close()
  ret[1]='C:/Documents and Settings/Administrator/Servicio/Circuitor/'+ret[1]
  ret[2]=[int(a) for a in ret[2].split(',')]
  ret[3]=[int(a) for a in ret[3].split(',')]
  ret[5]=float(ret[5])
  ret[6]=float(ret[6])*60.
  for r in ret: print r
  return ret

usb, csv, consultaPorLinea, consultaTrifasicas, cual, MUESTREO, REGISTRO, url = tomarSetUp(archivo)

ins = CircuitorCVM96(usb, 1)

lineaTitulos = titulosALinea(ins, consultaPorLinea, consultaTrifasicas)
nuevoMuestreo=0.0; nuevoRegistro=0.0; datosMuestreados=0; y=0

entradasPorLinea=array([0.0 for n in [1,2,3] for a in consultaPorLinea])
entradasTrifasicas=array([0.0 for b in consultaTrifasicas])
promedios=concatenate((entradasPorLinea, entradasTrifasicas))

while True:

  t=time()
  if t>nuevoMuestreo:
    esteMuestreo = nuevoMuestreo if t<nuevoMuestreo+MUESTREO else t
    nuevoMuestreo = esteMuestreo+MUESTREO
    print strTiempo(t)

    entradasPorLinea = array([ ins.FuncionesPorLinea[a](L=n,cual=cual)
                                 for n in [1,2,3] for a in consultaPorLinea ])
    entradasTrifasicas = array([ ins.FuncionesTrifasicas[b](cual=cual) for b in consultaTrifasicas ])
    promedios+=concatenate((entradasPorLinea, entradasTrifasicas))
    datosMuestreados+=1

  if t>nuevoRegistro:
    esteRegistro = nuevoRegistro if t<nuevoRegistro+REGISTRO else t
    nuevoRegistro = esteRegistro+REGISTRO

    promedios/=datosMuestreados
    registrar(t, promedios, lineaTitulos, archivoPorFecha(t, csv), url)

    promedios=0.0
    datosMuestreados=0
    y+=1
