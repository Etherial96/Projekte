Um den Chatbot in der SpringBoot Anwendung(Website) nutzen zu können, muss lokal ein Image für Docker erstellt werden. Die Dateien dazu findet man unter: Chatbots/chatbotausInternet/...
Es ist auch möglich kein Image zu erstellen und die Pythonanwendung direkt laufen zu lassen: in Chatbots/chatbotausInternet/chatforSpringBoot.py
Es muss unter SpringBoot&Maven/EclipseWorkspace\websiteIT die Main-Klasse gestartet werden, damit die Website erreichbar ist.
Zusätzlich muss in Docker ein Container für postgres gestartet werden auf dem Port 5432 mit dem passenden LoginDaten.(So könnte man später Daten in eine Datenbank importieren)
Die LoginDaten für die Datenbank findet man auch in der application.properties und könnten nochmal umgeändert werden.
