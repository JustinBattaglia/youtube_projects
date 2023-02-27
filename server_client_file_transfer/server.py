import socket
from threading import Thread

TCP_IP = 'localhost'
TCP_PORT = 9001
BUFFER_SIZE = 1024

class ClientThread(Thread):

    def __init__(self, ip, port, sock, filename, path=''):
        Thread.__init__(self)
        self.ip = ip
        self.port = port
        self.sock = sock
        self.filename = filename
        self.path = path


    def run(self):
        f = open(f'{self.path}{self.filename}', 'rb')

        while True:
            l = f.read(BUFFER_SIZE)
            while(l):
                self.sock.send(l)
                l = f.read(BUFFER_SIZE)
            if not l:
                f.close()
                self.sock.close()
                break

        print(f'{self.ip}:{self.port} Recieved File: {self.filename}\n')


tcpsock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
tcpsock.bind((TCP_IP, TCP_PORT))
threads = []

print("***** SERVER READY *****")
while True:
    tcpsock.listen(5)

    (conn, (ip, port)) = tcpsock.accept()
    print(f'{ip}:{port} Established Connection')
    print(f'{ip}:{port} Requesting File: ', end='')

    conn.send(b'File options: \ntux.jpg\ncroc.jpg\nmonkey.jpg')
    client_request_filename = conn.recv(1024).decode()
    print(client_request_filename)

    newthread = ClientThread(ip, port, conn, filename=client_request_filename, path='images/')
    newthread.start()
    threads.append(newthread)

for t in threads:
    t.join()