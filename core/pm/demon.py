
import RPi.GPIO as IO           # подключение библиотеки для работы с контактами ввода/вывода
import time                     # подключение библиотеки для работы с задержками
IO.setwarnings(False)           #отключаем показ любых предупреждений
IO.setmode (IO.BCM)             # мы будем программировать контакты GPIO по их функциональным номерам (BCM), то есть мы будем обращаться к PIN39 как ‘GPIO19’
IO.setup(23,IO.OUT)
# IO.setup(17,IO.OUT)
IO.setup(16,IO.OUT)              # инициализируем GPIO19 в качестве цифрового выхода
IO.setup(26,IO.IN)              # инициализируем GPIO26 в качестве цифрового входа
while 1:                        #бесконечный цикл
    if(IO.input(26) == False):  
        IO.output(23,True)
        time.sleep(1)
        IO.output(23,False)
        time.sleep(0.11)
        IO.output(16,True)
        time.sleep(0.5)
        IO.output(16,False)
        time.sleep(0.5)
        IO.output(16,True)
        time.sleep(0.5)
        IO.output(16,False)
        time.sleep(0.5)
        IO.output(16,True)
        time.sleep(0.5)
        IO.output(16,False)
        time.sleep(0.5)
        IO.output(16,True)
        time.sleep(0.5)
        IO.output(16,False)
        time.sleep(1)
