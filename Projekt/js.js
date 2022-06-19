
    // Provjera forme prije slanja
    document.getElementById("submit").onclick = function (event) {
    var submit_forme=true;
//kod koji ispituje da li treba slati formu
    if (submit_forme!=true) event.preventDefault();
            }

    
    // Naslov vjesti (5-30 znakova)
    var poljeTitle = document.getElementById("title");
    var title = document.getElementById("title").value;
    if (title.length < 5 || title.length > 30) {
    submitForme = false;
    poljeTitle.style.border="1px dashed red";
    document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>";
    } else {
    poljeTitle.style.border="1px solid green";
    document.getElementById("porukaTitle").innerHTML="";
    }
    
    // Kratki sadržaj (10-100 znakova)
    var poljeAbout = document.getElementById("about");
    var about = document.getElementById("about").value;
    if (about.length < 10 || about.length > 100) {
    submitForme = false;
    poljeAbout.style.border="1px dashed red";
    document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
    } else {
    poljeAbout.style.border="1px solid green";
    document.getElementById("porukaAbout").innerHTML="";
    }
    // Sadržaj mora biti unesen
    var poljeContent = document.getElementById("content");
    var content = document.getElementById("content").value;
    if (content.length == 0) {
    submitForme = false;
    poljeContent.style.border="1px dashed red";
    document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>";
    } else {
    poljeContent.style.border="1px solid green";
   10
    document.getElementById("porukaContent").innerHTML="";
    }
    // Slika mora biti unesena
    var poljeSlika = document.getElementById("photo");
    var photo = document.getElementById("photo").value;
    if (photo.length == 0) {
    submitForme = false;
    poljeSlika.style.border="1px dashed red";
    document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
    } else {
    poljeSlika.style.border="1px solid green";
    document.getElementById("porukaSlika").innerHTML="";
    }
    // Kategorija mora biti odabrana
    var poljeCategory = document.getElementById("category");
    if(document.getElementById("category").selectedIndex == 0) {
    submitForme = false;
    poljeCategory.style.border="1px dashed red";
    
   document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
    } else {
    poljeCategory.style.border="1px solid green";
    document.getElementById("porukaKategorija").innerHTML="";
    }
    
    if (submitForme != true) {
    event.preventDefault();
    }
    
    