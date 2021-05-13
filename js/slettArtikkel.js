function slettArtikkel(artikkel_id) {
    sendSlettArtikkel(bruker_id, artikkel_id);   
    document.getElementById("btn_slett_"+artikkel_id).className = "btn btn-outline-success";
    document.getElementById("btn_slett_"+artikkel_id).innerHTML = "Lagre";
    document.getElementById("btn_slett_"+artikkel_id).tagName = "btn_lagre";
    document.getElementById("btn_slett_"+artikkel_id).onclick = function () { lagreArtikkel(artikkel_id); };
    document.getElementById("btn_slett_"+artikkel_id).id = "btn_lagre_"+artikkel_id;
    }
    
    function sendSlettArtikkel(bruker_id, artikkel_id) {
        var xhttp = new XMLHttpRequest();
        var queryString = "?bruker_id=" + bruker_id + "&artikkel_id=" + artikkel_id;
        xhttp.open("GET", "php/slett.php" + queryString, true);
        xhttp.send();
      }