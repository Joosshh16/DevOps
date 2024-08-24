import os
from flask import Flask, jsonify

app = Flask(__name__)

@app.route('/health')
def health():
    return jsonify(status="healthy")

@app.route('/info')
def info():
    return jsonify(
                language="python", 
                version=os.getenv("PYTHON_VERSION"),
                host=os.getenv("HOSTNAME")
            )

@app.route('/')
def hello_world():
    return f"Hello, from {(os.getenv('HOSTNAME') or 'Python')}!"

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=3001, debug=True)