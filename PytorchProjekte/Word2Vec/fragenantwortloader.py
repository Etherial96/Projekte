import torch
import torch.nn as nn
import torch.nn. functional as F
import torch.optim as optim
import torchtext
from torch.autograd import Variable
from torchtext.data.utils import get_tokenizer
from torch.nn.utils.rnn import pad_sequence
from torch.utils.data import DataLoader
import spacy


# worterstellung.py

import torch
from torch.nn.utils.rnn import pad_sequence
from torch.utils.data import DataLoader
from torchtext.data.utils import get_tokenizer
import spacy

def lade_daten(dateipfad, tokenizer, max_seq_length=25, batch_size=300, **kwargs):
    datei = open(dateipfad, 'r')

    alle_dialoge = []

    for zeile in datei:
        tokens = tokenizer(zeile.strip())
        alle_dialoge.append(tokens)

    wort_index = {wort: index for index, wort in enumerate(set(w for dialog in alle_dialoge for w in dialog))}
    
    numerische_dialoge = [[wort_index[token] for token in dialog] for dialog in alle_dialoge]

    formatierte_daten = pad_sequence([torch.tensor(seq) for seq in numerische_dialoge], batch_first=True)
    formatierte_daten = [torch.cat([seq.clone().detach(), torch.zeros(max(0, max_seq_length - len(seq))).clone().detach()])[:max_seq_length] for seq in formatierte_daten]


    trainingsdaten = DataLoader(formatierte_daten, batch_size=batch_size, shuffle=True, **kwargs)

    return trainingsdaten, wort_index


kwargs = {'num_workers': 4, 'pin_memory': True}
# Beispielaufruf für die Fragen
datasetfragen = 'deutschefragen.txt'
tokenizer = get_tokenizer(spacy.load('de_core_news_sm'))
fragendaten, wort_index_fragen = lade_daten(datasetfragen, tokenizer, **kwargs)

# Beispielaufruf für die Antworten
datasetantworten = 'deutscheantworten.txt'
antwortendaten, wort_index_antworten = lade_daten(datasetantworten, tokenizer, **kwargs)










"""
kwargs = {'num_workers': 1, 'pin_memory': True}
datasetfragen = 'deutschefragen.txt'
tokenisierte_dialoge = []
tokenizer = get_tokenizer(spacy.load('de_core_news_sm'))

dateif = open(datasetfragen, 'r')

allefragen = []

for zeile in dateif:
    tokens = tokenizer(zeile.strip())
    allefragen.append(tokens)
    #print(tokens)

# Zuordnung von Wörtern zu Indizes
wort_index = {wort: index for index, wort in enumerate(set(w for frage in allefragen for w in frage))}
print('zeig mal',len(wort_index))
#for index, wort in enumerate(allefragen):
    #print(index,' ',wort)

# Numerische Repräsentation der Fragen
numerische_fragen = [[wort_index[token] for token in frage] for frage in allefragen]

fragendata = pad_sequence([torch.tensor(dialog) for dialog in numerische_fragen], batch_first=True)
fragendata = [torch.cat([torch.tensor(seq), torch.zeros(max(0, 25 - len(seq)))])[:25] for seq in fragendata]
#Fertig formatierte trainingsdaten
train_data = DataLoader(fragendata, batch_size=300, shuffle=True, **kwargs)
#print(len(train_data))
#print(train_data)
# Ausgabe der numerischen Repräsentationen
#for index, numerische_frage in enumerate(numerische_fragen):
    #print(f"Index der Frage {index+1}: {numerische_frage}")


datasetantworten = 'deutscheantworten.txt'
tokenisierte_dialoge = []
tokenizer = get_tokenizer(spacy.load('de_core_news_sm'))

dateia = open(datasetantworten, 'r')

alleantworten = []

for zeile in dateia:
    tokens = tokenizer(zeile.strip())
    alleantworten.append(tokens)
    #print(tokens)

# Zuordnung von Wörtern zu Indizes
wort_index = {wort: index for index, wort in enumerate(set(w for antwort in alleantworten for w in antwort))}
#for index, wort in enumerate(alleantworten):
    #print(index,' ',wort)

# Numerische Repräsentation der Fragen
numerische_antworten = [[wort_index[token] for token in antwort] for antwort in alleantworten]

antwortendata = pad_sequence([torch.tensor(dialog) for dialog in numerische_antworten], batch_first=True)

#Fertig formatierte trainingsdaten
target_data = DataLoader(antwortendata, batch_size=300, shuffle=True, **kwargs)

for index, wort in enumerate(antwortendata):
    print(index,' ',len(wort))
for index, wort in enumerate(fragendata):
    print(index,' ',wort)
    """