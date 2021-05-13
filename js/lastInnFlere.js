window.onload = oppstart;
var counter = 0;
document.cookie="counter="+counter;

function oppstart() {
  lastInnFlere();
}


function lastInnFlere() {
    var pathname = window.location.pathname.split('/'); 
  console.log(pathname[pathname.length-1]);
  if (pathname[pathname.length-1] === "minside.php") {
    var phpurl = "php/lagretArtikkel.php";
  } else {
    var phpurl = "php/artikkel.php";
  }

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {   
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("artikler").innerHTML +=
      this.responseText;
      document.getElementById("lastInnFlere").innerHTML = "Last inn flere";
    }
  };
  document.getElementById("lastInnFlere").innerHTML = "Laster inn ...";
  document.cookie="counter="+counter;
  xhttp.open("GET", phpurl, true);
  xhttp.send();
  counter += 20;
}