// Funktion show():
// Innerhalb dieser Funktion
/*function show(){
    die('ich lebe');
    dateload = 2019;
    var request = new XMLHttpRequest();
    request.open('post', 'abschluss.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send('daten='+dateload);
    
}*/
function show() {
    var year1 = document.getElementById('2019').innerHTML;
    var year2 = document.getElementById('2020').innerHTML;

    if (year2 == 2020){
        alert(year2);
    }

}
document.getElementById("logouts").addEventListener("click", function (event) {
    var abfrage = confirm("Auf OK werden Sie abgemeldet");
    if (abfrage == false) {
        event.preventDefault();
    }
});
