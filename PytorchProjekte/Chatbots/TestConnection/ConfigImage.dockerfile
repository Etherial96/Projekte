# Verwende ein Python-Basisimage
#FROM python:3.11.7
# Setze das Arbeitsverzeichnis im Container
#WORKDIR /app

# Kopiere die Anwendungsdateien in das Arbeitsverzeichnis
#COPY . /app
#Falls das Image abänderungen erhalten soll, werden mit Copy nur die Bibliotheken gedownloaded die noch nicht vorhanden waren.
#COPY requirements.txt .
# Installiere die erforderlichen Abhängigkeiten
#RUN pip install -r requirements.txt

# Starte die Anwendung beim Containerstart
#CMD ["python", "chatforSpringBoot.py"]


# Erster Build-Stage: Installiere Abhängigkeiten
FROM python:3.11.7 AS builder

WORKDIR /app
COPY requirements.txt .

RUN pip install --upgrade pip && \
    pip install -r requirements.txt
    
# NLTK-Ressourcen herunterladen
# Zweiter Build-Stage: Kopiere nur notwendige Dateien in ein kleineres Image
FROM python:3.11-slim

WORKDIR /app

# Kopiere Abhängigkeiten aus dem Builder-Image
COPY --from=builder /usr/local/lib/python3.11/site-packages /usr/local/lib/python3.11/site-packages
COPY --from=builder /usr/local/bin /usr/local/bin

# Kopiere deine Anwendungsdateien
COPY . .

# Führe die Anwendung aus
CMD ["python", "connect.py"]