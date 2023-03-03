import time
import board
from analogio import AnalogIn
import usb_hid
from adafruit_hid.keyboard import Keyboard
from adafruit_hid.keycode import Keycode

Yaxis = AnalogIn(board.A0)
keyboard = Keyboard(usb_hid.devices)
p2YAxis = AnalogIn(board.A2)

while True:
    yValue = Yaxis.value
    p2YValue = p2YAxis.value
    if yValue < 30000 :
        keyboard.release(Keycode.DOWN_ARROW)
        keyboard.press(Keycode.UP_ARROW)   
    elif yValue > 40000 :
        keyboard.release(Keycode.UP_ARROW)
        keyboard.press(Keycode.DOWN_ARROW)
    else :
        keyboard.release(Keycode.UP_ARROW)
        keyboard.release(Keycode.DOWN_ARROW)
    
    if p2YValue < 30000 :
        keyboard.release(Keycode.S)
        keyboard.press(Keycode.Z)   
    elif p2YValue > 40000 :
        keyboard.release(Keycode.Z)
        keyboard.press(Keycode.S)
    else :
        keyboard.release(Keycode.Z)
        keyboard.release(Keycode.S)