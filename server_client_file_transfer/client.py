import socket
import time

TCP_IP = 'localhost'
TCP_PORT = 9001
BUFFER_SIZE = 1024

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect((TCP_IP, TCP_PORT))

print(f"Established Connection to {TCP_IP} on Port: {TCP_PORT}")
print(s.recv(1024).decode(), "\n")

file_req = input("Enter file name to receive: ")
s.send(file_req.encode())

received_f = file_req.split(".")[0]+str(time.time()).split('.')[0]+'.jpeg'

with open(received_f, 'wb') as f:
    print("File Created.")
    while True:
        data = s.recv(BUFFER_SIZE)

        if (not data):
            f.close()
            print("File Closed.")
            break

        f.write(data)

print("Successfully downloaded file")
s.close()