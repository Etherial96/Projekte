import torch
from transformers import AutoModelForQuestionAnswering, AutoTokenizer
from torch.utils.data import DataLoader, TensorDataset
from torch import nn, optim

# Datenvorbereitung (Beispiel)
train_questions = [
    "Wie heißt du?",
    "Wie alt bist du?",
    "Was sind die Hauptbestandteile von Wasser?"
]

train_answers = [
    "Ich heiße Tim",
    "Ich bin 20 Jahre alt.",
    "Die Hauptbestandteile von Wasser sind Wasserstoff und Sauerstoff."
]

# Tokenisierung
tokenizer = AutoTokenizer.from_pretrained("bert-base-german-cased")
tokenized_data = tokenizer(train_questions, train_answers, return_tensors="pt", padding=True, truncation=True)

print(tokenized_data)

first_question_tokens = tokenizer.convert_ids_to_tokens(tokenized_data['input_ids'][1])

print("Tokens der ersten Frage:", first_question_tokens)
first_question_words = tokenizer.convert_tokens_to_string(first_question_tokens)

print("Ursprüngliche Wörter der ersten Frage:", first_question_words)

# Erstellen der Tensor-Datasets
dataset = TensorDataset(tokenized_data["input_ids"], tokenized_data["attention_mask"], tokenized_data["token_type_ids"])

# DataLoader erstellen
dataloader = DataLoader(dataset, batch_size=1, shuffle=True)

# Laden des vortrainierten BERT-Modells für die Feinabstimmung
model = AutoModelForQuestionAnswering.from_pretrained("bert-base-uncased")

# Feintuning
optimizer = optim.AdamW(model.parameters(), lr=0.0005)
criterion = nn.CrossEntropyLoss()

num_epochs = 3
device = torch.device("cpu")
model.to(device)

for epoch in range(num_epochs):
    model.train()
    total_loss = 0
    for batch in dataloader:
        input_ids, attention_mask, token_type_ids = batch
        input_ids, attention_mask, token_type_ids = input_ids.to(device), attention_mask.to(device), token_type_ids.to(device)

        optimizer.zero_grad()
        outputs = model(input_ids, attention_mask=attention_mask, token_type_ids=token_type_ids)
        
        # Verwende hier die richtigen Labels für deine Feintuning-Aufgabe
        labels = torch.zeros_like(outputs.start_logits, dtype=torch.float).to(device)  # Beispiel: Dummy-Labels für die Vereinfachung

        loss = criterion(outputs.start_logits, labels)
        total_loss += loss.item()

        loss.backward()
        optimizer.step()

    average_loss = total_loss / len(dataloader)
    print(f"Epoch {epoch + 1}/{num_epochs}, Average Loss: {average_loss}")

# Evaluation (Vereinfacht)
model.eval()

for i, question in enumerate(train_questions):
    tokenized_input = tokenizer(question, return_tensors="pt")
    with torch.no_grad():
        output = model(**tokenized_input)

    start_scores = torch.nn.functional.softmax(output.start_logits, dim=1)
    end_scores = torch.nn.functional.softmax(output.end_logits, dim=1)

    # Finden der Start- und Endpositionen mit den höchsten Scores
    start_index = torch.argmax(start_scores).item()
    end_index = torch.argmax(end_scores).item()

    # Erhalten der Originaltokens aus den Start- und Endpositionen
    tokens = tokenizer.convert_ids_to_tokens(tokenized_input["input_ids"][0][start_index:end_index+1])

    # Konvertieren der Tokens zurück zu Text
    answer = tokenizer.decode(tokenized_input["input_ids"][0][start_index:end_index+1])

    print(f"Frage: {question}")
    print(f"Antwort: {answer}\n")


