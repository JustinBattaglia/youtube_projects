import json
import time
from scapy.all import ARP, Ether, srp

class network_scan:
    def __init__(self, interface) -> None:
        self.interface = interface
        self.devices = []

    def do_scan(self):
        arp_r = 24
        arp_request = ARP(pdst=f'{self.interface}/{arp_r}')
        ether = Ether(dst='ff:ff:ff:ff:ff:ff')
        packet = ether / arp_request

        result = srp(packet, timeout=3, verbose=0)[0]
        for sen, recieved in result:
            self.devices.append({'IP': recieved.psrc, 'MAC':recieved.hwsrc})

        return self.devices  

    def get_devices(self):
        return self.devices

    def pretty_print(self, json_data:dict):
        for data in json_data:
            print(data['IP'], '\t\t', data['MAC'])

if __name__ == "__main__":
    while True:
        s = network_scan('YOUR_IP_GATEWAY_HERE')
        s.do_scan()
        device_data = s.get_devices()
        s.pretty_print(device_data)
        time.sleep(1)