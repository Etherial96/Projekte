
document.getElementById('sendMessageButton').addEventListener('click', function () {
    sendMessage();
});
document.getElementById('userMessage').addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Verhindert, dass die Enter-Taste eine Zeilenumbruch hinzufügt
        sendMessage();
    }
});

function sendMessage() {
    var userMessage = document.getElementById('userMessage').value;
    var messageHistory = document.querySelector('.stickichatbot textarea.history');

    // Füge die abgesendete Nachricht zum Nachrichtenverlauf hinzu
    messageHistory.value += 'Du: ' + userMessage + '\n';

    // Sende die Daten mit fetch an den Server
    fetch('/sendMessage', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'userMessage=' + encodeURIComponent(userMessage)
    })
    .then(response => response.text())
    .then(data => {
        // Hier kannst du die Antwort des Servers verarbeiten
        console.log('Antwort vom Server:', data);

        // Füge die Antwort des Servers zum Nachrichtenverlauf hinzu
        messageHistory.value += 'Bot: ' + data + '\n';

        // Leere das Eingabefeld nach dem Absenden
        document.getElementById('userMessage').value = '';
    })
    .catch(error => {
        console.error('Fehler beim Senden der Nachricht:', error);
    });
}

//Auf und zu klappen des Chats
const toggle = document.getElementById('toggle');
const historyTextarea = document.querySelector('.history');
const sendMessageForm = document.getElementById('sendMessageForm');

toggle.addEventListener('click', () => {
   historyTextarea.style.display = (historyTextarea.style.display === 'block') ? 'none' : 'block';
   sendMessageForm.style.display = (sendMessageForm.style.display === 'block') ? 'none' : 'block';
});
/*
Veraltet

document.getElementById('sendMessageButton').addEventListener('click', function () 
{
    var userMessage = document.getElementById('userMessage').value;
    var messageHistory = document.querySelector('.stickichatbot textarea.history');

    // Füge die abgesendete Nachricht zum Nachrichtenverlauf hinzu
    messageHistory.value += 'Du: ' + userMessage + '\n';

    // Sende die Daten mit Ajax an den Server
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/sendMessage', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Hier kannst du die Antwort des Servers verarbeiten
            console.log('Antwort vom Server:', xhr.responseText);

            // Füge die Antwort des Servers zum Nachrichtenverlauf hinzu
            messageHistory.value += 'Bot: ' + xhr.responseText + '\n';

            // Leere das Eingabefeld nach dem Absenden
            document.getElementById('userMessage').value = '';
        }
    };
    xhr.send('userMessage=' + encodeURIComponent(userMessage));
});*/