document.getElementById('sendMessageButton').addEventListener('click', function () {
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