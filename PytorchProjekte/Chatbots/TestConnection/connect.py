from flask import Flask, request

app = Flask(__name__)
"""
@app.route("/hello")
def helloWorld():
    return "Hello WOrld"
"""

@app.route('/userMessage', methods=['POST'])
def receive_user_message():
    try:
        # Erhalte die Benutzernachricht vom Request
        user_message = request.get_data(as_text=True)

        # Verarbeite die Benutzernachricht (hier einfach umdrehen)
        reversed_message = "super"

        # Gib die verarbeitete Nachricht als Antwort zurück
        return reversed_message

    except Exception as e:
        return str(e)
    
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5002)