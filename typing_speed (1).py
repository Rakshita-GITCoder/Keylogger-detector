import time
from pynput.keyboard import Key, Listener

# Define variables
keylogs = []
start_time = time.time()
previous_speed = None

def on_press(key):
    global start_time, previous_speed
    keylogs.append(key)
    current_time = time.time()
    elapsed_time = current_time - start_time
    
    # Calculate typing speed
    typing_speed = (len(keylogs) / elapsed_time) * 60
    cpm = len(keylogs)
    
    # Perform behavioral analysis or fraud detection based on typing speed
    if previous_speed is not None and abs(typing_speed - previous_speed) > 50:
        error_message = f"Typing speed difference detected: {typing_speed} - Previous Speed: {previous_speed}"
        print(error_message)
        with open("keylogs.txt", "a") as file:
            file.write(f"{error_message}\n")
    
    previous_speed = typing_speed
    
    # Save keylogs, typing speed, and CPM to a file
    with open("keylogs.txt", "a") as file:
        file.write(f"{key} - Typing Speed: {typing_speed:.2f} CPM: {cpm}\n")

def on_release(key):
    if key == Key.esc:
        return False

# Start the keylogger
with Listener(on_press=on_press, on_release=on_release) as listener:
    listener.join()