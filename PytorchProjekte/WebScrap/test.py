import requests
from bs4 import BeautifulSoup

# URL der Webseite, die Sie abrufen möchten
url = 'https://www.google.com/'

# Eine HTTP-Anfrage senden, um den HTML-Inhalt der Webseite abzurufen
response = requests.get(url)

# Den HTML-Inhalt mit BeautifulSoup analysieren
soup = BeautifulSoup(response.text, 'html.parser')