import random
import json
import torch

from Netz import NeuralNet
from wordsplit import bag_of_words, tokenize
from flask import Flask, request

app = Flask(__name__)

device = torch.device('cuda' if torch.cuda.is_available() else 'cpu')

json_datei_pfad = 'intents.json'

with open(json_datei_pfad, 'r') as f:
    intents = json.load(f)

chat = "trainedbot.pt"
data = torch.load(chat, map_location=device)

input_size = data["input_size"]
hidden_size = data["hidden_size"]
output_size = data["output_size"]
all_words = data['all_words']
tags = data['tags']
model_state = data["model_state"]

model = NeuralNet(input_size, hidden_size, output_size).to(device)
model.load_state_dict(model_state)
model.eval()

bot_name = "Sam"
print("Let's chat! (type 'quit' to exit)")

@app.route('/userMessage', methods=['POST'])
def receive_user_message():
    try:
        user_message = request.get_data(as_text=True)
        user_message = tokenize(user_message)
        X = bag_of_words(user_message, all_words)
        X = X.reshape(1, X.shape[0])
        X = torch.from_numpy(X).to(device)

        output = model(X)
        _, predicted = torch.max(output, dim=1)

        tag = tags[predicted.item()]

        probs = torch.softmax(output, dim=1)
        prob = probs[0][predicted.item()]
        if prob.item() > 0.9:
            for intent in intents['intents']:
                if tag == intent["tag"]:
                    bot_response = random.choice(intent['responses'])
                    return bot_response
        else:
            nevertrained = "Darauf wurde ich nicht trainiert"
            return nevertrained
    except Exception as e:
        return str(e)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5002)