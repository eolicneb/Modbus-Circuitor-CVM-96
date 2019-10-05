## Mid Tension Analyzer
In order to keep survillance on the power consumption in a factory, a Circuitor-CVM-96 was installed. The driver to read and write to the Circuitor had to be factored. The "modbus" protocol is an industrial standard and the simple MinimalModbus module was choosen as a base for our driver.
The Modbus002.py script takes care of the logic for collecting, saving and broadcasting the data. The server receives the data in a MySQL database and exposes it on a webpage that can be browsed from everywhere in the local net.

# Modbus-Circuitor-CVM-96
The driver for remote registers reading for the Circuitor CVM-96 supply network analyzer based on MinimalModbus library. This is the core of the implemented solution.

https://pypi.org/project/MinimalModbus/
To download >> pip install MinimalModbus


Circuitor CVM-96 analyzer takes only readings to the registers. The get_ functions implemented in the CircuitorCVM96 class exhaust the whole possible readings according to the manual uploaded to the url
http://www.samey.is/_pdf/_circutor/CVM_NRG96_Maelistod_Manual.pdf

Each function admits two values "min" and "max" for the "cual" keyword, that can be used to obtain the minimal and maximal registered reading instead of the actual values. Also some functions allow the alternance between L1, L2 and L3 by giving values 1, 2 or 3 to the "L" keyword.

For example, function get_Current(L=2, cual='max')
returns current's max registered value for line L2.

get_ functions included:
  get_Voltage_Phase     \
  get_Current           |
  get_Active_Power      |   All of these admit
  get_Reactive_Power    >   L keyword for the
  get_Power_Factor      |   3 different lines
  get_percent_THD_V     |
  get_percent_THD_A     /
  get_Frecuency
  get_Active_power_III
  get_Inductive_power_III
  get_Capacitive_power_III
  get_Cos_Phi
  get_Power_Factor_III
  get_Voltage_Line_L1_L2
  get_Voltage_Line_L2_L3
  get_Voltage_Line_L3_L1
  get_Apparent_Power_III
  get_Maximum_Demand
  get_Three_Phase_Current
  get_Neutral_Current
  get_Maximum_Demand_A2
  get_Maximum_Demand_A3
  get_Active_Energy
  get_Inductive_Reactive_Energy
  get_Reactive_Energy_Capacitive
  get_Apparent_Energy
  get_Active_Energy_Generated
  get_Inductive_Energy_Generated
  get_Capacitive_Energy_Generated
  get_Apparent_Energy_Generated

