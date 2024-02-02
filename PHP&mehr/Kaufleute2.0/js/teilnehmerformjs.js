

/*
var hidden = false;
document.getElementById('aufgabe12b').style.visibility = 'hidden';
function block() {
    hidden = !hidden;
    if (hidden) {
        document.getElementById('aufgabe12').style.visibility = 'hidden';
    }
    if(hidden) {
        document.getElementById('aufgabe12b').style.visibility = 'visible';
    }
}
*/
/*
Dieser Code wird schon im Teilnehmerformular benutzt

function test() {

    var nname = document.getElementById('name').value;
    var vname = document.getElementById('vorname').value;
    var gstreet = document.getElementById('street').value;
    var gplz = document.getElementById('plz').value;
    var gort = document.getElementById('ort').value;
    var gabschluss = document.getElementById('abschluss').value;
    var ggeburtsdatum = document.getElementById('geburtsdatum').value;

    if (nname.length == 0 || vname.length == 0 || gstreet.length == 0 || gplz.length == 0 || gort.length == 0 || gabschluss.length == 0 || ggeburtsdatum.length == 0) {
        return 1;
    }
    else {
        return 2;
    }
}

document.getElementById("fertig").addEventListener("click", function (event) {
    var i = test();
    if (i == 1) {
        event.preventDefault()
        alert('Kontrollieren Sie Ihre Angaben auf Fehler');
    }
});

*/