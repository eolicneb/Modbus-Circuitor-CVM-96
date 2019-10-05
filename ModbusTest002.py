#!/usr/bin/env python
import sys
import minimalmodbus
from CircuitorCVM96 import CircuitorCVM96
from time import time
from numpy import array, concatenate
import requests

minimalmodbus.BAUDRATE=9600
minimalmodbus.TIMEOUT=0.5

MAXY=2
MAXX=3
MUESTREO=1. # segundos
archivo='setup.dat'

def promALinea(tiempo, promedios):
  from time import asctime as asc, gmtime as gm
  return asc(gm(t)) + ',' + ','.join([str(a) for a in promedios])

def promAGet(tiempo, promedios):
    from time import asctime as asc, gmtime as gm
    sender = '?t='+asc(gm(t))
    return sender + '&' + '&'.join(['var'+str(n)+'='+str(a) for n, a in enumerate(promedios)])

def titulosALinea(instrumento, consultaPorLinea, consultaTrifasicas):
  titulos='hora,'
  titulos+=','.join([instrumento.TitulosDeFuncionesPorLinea[a]+' L'+str(n) for n in [1, 2, 3] for a in consultaPorLinea])
  titulos+=','+','.join([instrumento.TitulosDeFuncionesTrifasicas[b] for b in consultaTrifasicas])
  return titulos

def tomarSetUp(archivo):
  d = open(archivo,'r')
  ret = []
  for l in d:
    if 'a'<=l[0]<='z' or 'A'<=l[0]<='Z' or '0'<=l[0]<='9': ret.append(l[:-1])
  d.close()
  ret[2]=[int(a) for a in ret[2].split(',')]
  ret[3]=[int(a) for a in ret[3].split(',')]
  ret[5]=float(ret[5])
  ret[6]=float(ret[6])*60.
  for r in ret: print r
  return ret
  d.close()

usb, csv, consultaPorLinea, consultaTrifasicas, cual, MUESTREO, REGISTRO, url = tomarSetUp(archivo)

ins = CircuitorCVM96(usb, 1)
#ins.precalculate_read_size=False

f=open(csv, 'w')
f.write(titulosALinea(ins, consultaPorLinea, consultaTrifasicas)+'\n')
f.close()
ultimoSegundo=0.0; ultimoRegistro=0.0; x=0; y=0

entradasPorLinea=array([0.0 for n in [1,2,3] for a in consultaPorLinea])
entradasTrifasicas=array([0.0 for b in consultaTrifasicas])
promedios=concatenate((entradasPorLinea, entradasTrifasicas))

while True: #y<MAXY:
  t=time()
  if t > ultimoSegundo+MUESTREO:
    ultimoSegundo=t
    print t
    entradasPorLinea = array([ ins.FuncionesPorLinea[a](L=n,cual=cual)
                                 for n in [1,2,3] for a in consultaPorLinea ])
    entradasTrifasicas = array([ ins.FuncionesTrifasicas[b](cual=cual) for b in consultaTrifasicas ])
    promedios += concatenate((entradasPorLinea, entradasTrifasicas))
    x+=1
  if t > ultimoRegistro+REGISTRO:
    ultimoRegistro=t
    promedios/=x
    linea = promALinea(t, promedios)
    sender = promAGet(t, promedios)
    promedios=0.0
    sys.stdout.write(linea+'\n')
    #requests.get(url+sender)
    with open(csv, 'a') as f:
      f.write(linea+'\n')
    x=0
    y+=1
