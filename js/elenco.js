
function visualizza(val) {


    console.log("elenco_libri.php?value=" + val)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var libro = JSON.parse(this.responseText)

            for (let i = 0; i < libro.items.length - 1; i++) {

                var row = document.createElement("div");
                row.classList.add("row");
                for (let k = i; k < i + 3; k++) {
                    if (i >= libro.length) break;
                    var autori = [];
                    var categorie = [];
                    console.log(libro.items[k].volumeInfo.title);
                    var titolo = libro.items[k].volumeInfo.title;
                    if (libro.items[k].volumeInfo.hasOwnProperty("authors")) {

                        for (let i = 0; i < libro.items[k].volumeInfo.authors.length; i++) {
                            autori.push(libro.items[k].volumeInfo.authors[i]);
                        }
                    } else {
                        autori.push("Sconosciuto");
                    }

                    if (libro.items[k].volumeInfo.hasOwnProperty("categories")) {

                        for (let i = 0; i < libro.items[k].volumeInfo.categories.length; i++) {
                            categorie.push(libro.items[k].volumeInfo.categories[i]);
                        }
                    } else {
                        categorie.push("Sconosciuto");
                    }

                    var pagine = libro.items[k].volumeInfo.pageCount;


                    var ISBN = libro.items[k].volumeInfo.industryIdentifiers[0].identifier;

                    if (libro.items[k].volumeInfo.hasOwnProperty("imageLinks")) {

                        var immagine = libro.items[k].volumeInfo.imageLinks.thumbnail;
                    }


                    var lib = document.createElement("div");
                    lib.classList.add("col-lg-4");
                    lib.classList.add("col-md-6");
                    lib.setAttribute('id', 'lib' + k);
                    lib.classList.add("mb-4");

                    var card = document.createElement("div");
                    card.classList.add("card");
                    card.classList.add("h-100");
                    card.setAttribute('id', 'card' + k);
                    lib.appendChild(card);

                    var img = document.createElement("img");
                    img.classList.add("card-img-top");
                    img.src = immagine;
                    img.setAttribute('id', 'immag' + k);
                    card.appendChild(img);

                    var body = document.createElement("div");
                    body.classList.add("card-body");
                    body.setAttribute('id', 'body' + k);
                    card.appendChild(body);

                    var h4 = document.createElement("h4");
                    h4.classList.add("card-title");
                    var testoTitolo = document.createTextNode("Titolo: " + titolo);
                    h4.setAttribute('id', 'titol' + k);
                    h4.appendChild(testoTitolo);
                    body.appendChild(h4);

                    var h5 = document.createElement("h5");
                    var testoAutore = document.createTextNode("Autore: " + autori);
                    h5.setAttribute('id', 'autore' + k);
                    h5.appendChild(testoAutore);
                    body.appendChild(h5);

                    var isb = document.createElement("h5");
                    var testoISBN = document.createTextNode("ISBN: " + ISBN);
                    isb.classList.add("card-text");
                    isb.setAttribute('id', 'isbn' + k);
                    isb.appendChild(testoISBN);
                    body.appendChild(isb);

                    var cat = document.createElement("p");
                    var testoCategoria = document.createTextNode("Categoria: " + categorie);
                    cat.classList.add("card-text");
                    cat.setAttribute('id', 'categ' + k);
                    cat.appendChild(testoCategoria);
                    body.appendChild(cat);

                    var pag = document.createElement("p");
                    var numeroPagine = document.createTextNode("Numero pagine: " + pagine);
                    pag.appendChild(numeroPagine);
                    pag.setAttribute('id', 'num_p' + k);
                    pag.classList.add("card-text");
                    body.appendChild(pag);


                    var prenota = document.createElement("button");
                    var testoBottone = document.createTextNode("Prenota ora");
                    prenota.classList.add("bttn");
                    prenota.setAttribute('id', 'bottone' + k);
                    prenota.setAttribute('type', 'button');
                    prenota.setAttribute('onclick', 'prenota(' + k + ');');
                    prenota.setAttribute("action", "libri_prenotati.php")

                    prenota.appendChild(testoBottone);
                    body.appendChild(prenota);

                    row.appendChild(lib);



                }

                i += 2;
                var element = document.getElementById("container");
                element.appendChild(row);

            }





        }



    }
    xhttp.open("GET", "elenco_libri.php?value=" + val, true);
    xhttp.send();
}



function prenota(j) {

    var dbTitolo = document.getElementById("titol" + j).innerHTML;
    var dbAutore = document.getElementById("autore" + j).innerHTML;
    var dbISBN = document.getElementById("isbn" + j).innerHTML;
    var dbCategoria = document.getElementById("categ" + j).innerHTML;
    var dbPagine = document.getElementById("num_p" + j).innerHTML;
    //var dbImage = document.getElementById("image" + j).innerHTML;




    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {



            window.location.href = "http://localhost/Progetto2021/libri_prenotati.php?dbTitolo=" + dbTitolo + "&dbAutore="
                + dbAutore + "&dbISBN=" + dbISBN + "&dbCategoria=" + dbCategoria + "&dbPagine=" + dbPagine;



        }


    }
    xhttp.open("GET", "libri_prenotati.php?value=" + dbTitolo + "&" + dbAutore + "&" + dbISBN + "&" + dbCategoria + "&" + dbPagine, true);
    xhttp.send();
}

