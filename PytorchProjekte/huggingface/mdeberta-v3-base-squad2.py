from transformers import pipeline

qa_model = pipeline("question-answering", "timpal0l/mdeberta-v3-base-squad2")
question = "Was ist dein Lieblingssport?"
context = "Mein Lieblingssport ist Tennis."
output = qa_model(question = question, context = context)
print(output)