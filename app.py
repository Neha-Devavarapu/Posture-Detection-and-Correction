from flask import Flask, render_template, Response, request
import subprocess
app = Flask(__name__)
app.static_folder = 'static'
@app.route('/')
def index():
    return render_template('webcam.html')

msg='Script executed successfully'
@app.route('/run-script1', methods=['POST'])
def run_script1():
    if request.method == 'POST':
        subprocess.run(['python', 'main.py'])
        return msg
    
@app.route('/run-script2', methods=['POST'])
def run_script2():
    if request.method == 'POST':
        subprocess.run(['python', 'plank.py'])
        return msg

@app.route('/run-script3', methods=['POST'])
def run_script3():
    if request.method == 'POST':
        subprocess.run(['python', 'lowersquat.py'])
        return msg

if __name__ == '__main__':
    app.run(debug=True)