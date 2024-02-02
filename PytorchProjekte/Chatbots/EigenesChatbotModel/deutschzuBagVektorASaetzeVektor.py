import string
import numpy as np



def erstelle_bag_und_vektoren(dateipfad):
    einzigartige_woerter = set()
    satzzeichen = set(string.punctuation)

    with open(dateipfad, 'r', encoding='utf-8') as datei:
        for zeile in datei:
            worte = zeile.strip().split()
            einzigartige_woerter.update(wort.strip(string.punctuation) for wort in worte)

    # Entfernen des Zeichens '{' aus dem Bag, falls es vorhanden ist
    satzzeichen.discard('{')

    bag = list(einzigartige_woerter.union(satzzeichen))
    bag.sort()

    # Hinzufügen des Padding-Vektors am Ende des Bags
    bag.append("__PADDING__")
    vektor_liste = [np.eye(len(bag))[i] for i in range(len(bag))]
    vektor_array = np.array(vektor_liste, dtype=np.float32)

    vektor_dict = {wort: np.eye(len(bag))[i] for i, wort in enumerate(bag)} 
    
    return vektor_array, vektor_dict

# Beispielaufruf
#txt_dateipfad = 'Antworten&FragenGetrennt.txt'
#vektor_array, vektor_dict = erstelle_bag_und_vektoren(txt_dateipfad)
#index_dict = {wort: index for index, wort in enumerate(vektor_dict.keys())}
# Beispiel: Vektor für das Wort 'viele'
#print(f"Vektor für 'viele': {vektor_dict['viele']}")
#for idx, (wort, value) in enumerate(vektor_dict.items()):
    #print(idx,'  ',wort)


def erstelle_vektoren_fuer_saetze(txt_dateipfad, vektor_dict):
    saetze = []

    with open(txt_dateipfad, 'r', encoding='utf-8') as datei:
        for zeile in datei:
            saetze.append(zeile.strip())

    vektorisierte_saetze = []
    max_vektor_laenge = 0

    for satz in saetze:
        worte = satz.split()
        vektorisiert = [vektor_dict.get(wort, vektor_dict["__PADDING__"]) for wort in worte]
        vektorisierte_saetze.append(vektorisiert)
        
        # Aktualisieren der maximalen Vektorlänge
        max_vektor_laenge = max(max_vektor_laenge, len(vektorisiert))
    # Padding der Vektoren auf die maximale Länge mit dem Padding-Vektor
    vektorisierte_saetze_padded = [vektor + [vektor_dict["__PADDING__"]] * (max_vektor_laenge - len(vektor)) for vektor in vektorisierte_saetze]
    vektorisierte_saetze_padded = np.array(vektorisierte_saetze_padded)

    return vektorisierte_saetze_padded, max_vektor_laenge

#txt_dateipfad = 'Antworten&FragenGetrennt.txt'
# Beispielaufruf
#vektorisierte_saetze_padded, max_vektor_laenge = erstelle_vektoren_fuer_saetze(txt_dateipfad, vektor_dict)
#for idx, wort_vektoren in enumerate(vektorisierte_saetze_padded):
    #print(f"{idx}:")
    #for wort, value in enumerate(wort_vektoren):
        #print(f"  {wort}: {value}")

def erstelle_vektoren_fuer_bot(input_text, vektor_dict):
    # Tokenisierung des Satzes
    worte = input_text.split()
    
    # Vektorisierung der Wörter im Satz unter Verwendung des vektor_dict
    # Wenn das Wort nicht gefunden wird, wird der Padding-Vektor verwendet
    vektorisierte_saetze = [vektor_dict.get(wort, vektor_dict["__PADDING__"]) for wort in worte]

    # Falls der Satz leer ist oder keine bekannten Wörter enthält, gebe None zurück
    if not vektorisierte_saetze:
        return None

    # Ausgabe der Längen der Vektoren
    print("Längen der Vektoren:", [len(vektor) for vektor in vektorisierte_saetze])
    
    # Padding der Vektoren auf die maximale Länge
    max_vektor_laenge = max(len(vektor) for vektor in vektorisierte_saetze)
    vektorisierte_saetze_padded = []

    for vektor in vektorisierte_saetze:
        if vektor.any():  # Überprüfen, ob der Vektor nicht leer ist
            padding = np.tile(vektor, (max_vektor_laenge - len(vektor)))
            vektorisierte_saetze_padded.append(np.concatenate([vektor, padding]))
    
    vektorisierte_saetze_padded = np.array(vektorisierte_saetze_padded)

    return vektorisierte_saetze_padded, max_vektor_laenge