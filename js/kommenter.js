function kommenter() {
    var kommentar = document.getElementById("kommentar").value;
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    var artikkel_id = urlParams.get('artikkelid');
    console.log(artikkel_id);
    if (typeof bruker_id === 'undefined') {
        alert("Logg inn for å kommentere")
        } else {
            if (kommentar != "") {
                sendKommentar(kommentar, artikkel_id);   
            } else {
                alert("Skriv inn kommentar")
            }
        
        }
}

function sendKommentar(kommentar, artikkel_id) {
    var xhttp = new XMLHttpRequest();
    var queryString = "?artikkel_id=" + artikkel_id + "&bruker_id=" + bruker_id 
    + "&bruker_navn=" + bruker_navn + "&kommentar=" + kommentar;
    xhttp.open("GET", "php/sendKommentar.php" + queryString, true);
    xhttp.send();
    window.location.reload();
  }
