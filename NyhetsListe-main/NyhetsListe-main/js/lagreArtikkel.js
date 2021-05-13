function lagreArtikkel(artikkel_id) {
console.log(bruker_id);
console.log(artikkel_id);
if (typeof bruker_id === 'undefined') {
alert("Logg inn for å lagre artikler")
} else {
sendLagreArtikkel(bruker_id, artikkel_id);   
}
document.getElementById("btn_lagre_"+artikkel_id).className = "btn btn-outline-danger";
document.getElementById("btn_lagre_"+artikkel_id).innerHTML = "Slett";
document.getElementById("btn_lagre_"+artikkel_id).tagName = "btn_slett";
document.getElementById("btn_lagre_"+artikkel_id).onclick = function () { slettArtikkel(artikkel_id); };
document.getElementById("btn_lagre_"+artikkel_id).id = "btn_slett_"+artikkel_id;

}

function sendLagreArtikkel(bruker_id, artikkel_id) {
    var xhttp = new XMLHttpRequest();
    var queryString = "?bruker_id=" + bruker_id + "&artikkel_id=" + artikkel_id;
    xhttp.open("GET", "php/lagre.php" + queryString, true);
    xhttp.send();
  }