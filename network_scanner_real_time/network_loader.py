from flask import Flask
from network_monitor import network_scan

app = Flask(__name__)

@app.route("/")
def hello_world():
    s = network_scan('YOUR_IP_GATEWAY_HERE')
    s.do_scan()
    device_data = s.get_devices()
    ret_str = "<meta http-equiv='refresh' content='1' /><h1 style='color: darkgreen;'>Network Monitor</h1><br><h3>"
    for data in device_data:
        ret_str += f"{data['IP']}&nbsp;&nbsp;&nbsp;{data['MAC']}<br>"
    ret_str += "</h3>"
    return ret_str

if __name__ == "__main__":
    app.run()