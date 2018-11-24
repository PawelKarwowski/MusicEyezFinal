 function search(){
            
       var value = document.getElementById('readme').value;
       var url="http://ws.audioscrobbler.com/2.0/?method=artist.gettopalbums&limit=3&api_key=c46749239cc8ed007bbbd8c66673378e&format=json&artist=" + value;          
       

       $.getJSON(url,function(json){ 

         document.getElementById('heading').innerHTML = "TOP 3 ALBUMS";

               
    /* Obrazki okładek */
    $("#result0").append('<p>'+'<img class="miniature" src="'+json.topalbums.album[0].image[3]["#text"]+ '"  />'+'</p>');
    $("#result1").append('<p>'+'<img class="miniature" src="'+json.topalbums.album[1].image[3]["#text"]+ '"  />'+'</p>');
    $("#result2").append('<p>'+'<img class="miniature" src="'+json.topalbums.album[2].image[3]["#text"]+ '"  />'+'</p>');
    

    /* URL */   
     var strLink0 = (json.topalbums.album[0].url);
     var strLink1 = (json.topalbums.album[1].url);
     var strLink2 = (json.topalbums.album[2].url);

    /* $("#link0").attr('href',strLink0).text(strLink); */ /* Pokazuje pełny link */
    /*$("#link1").attr('href',strLink1); */ /*Ukrywa link, zeby można było dodać tekst <a> XXX </a>*/
   

    $("#link0").attr('href',strLink0).text(strLink0);
    $("#link1").attr('href',strLink1).text(strLink1);
    $("#link2").attr('href',strLink2).text(strLink2);

    /* Nazwy albumów, które wyświetlam nad ich okładkami */
    var nameofalbum0 = (json.topalbums.album[0].name);
    var nameofalbum1 = (json.topalbums.album[1].name);
    var nameofalbum2 = (json.topalbums.album[2].name);

    $("#name0").attr('h1', nameofalbum0).text(nameofalbum0);
    $("#name1").attr('h1', nameofalbum1).text(nameofalbum1);
    $("#name2").attr('h1', nameofalbum2).text(nameofalbum2);



   }); 
       /* Info o zespole i zdjęcie główne */
        var url1="http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&format=json&api_key=c46749239cc8ed007bbbd8c66673378e&artist=" + value;

        $.getJSON(url1,function(json){          

            $("#info").append(json.artist.bio.summary);
            $("#info-img").append('<img class="info-img" src="'+ json.artist.image[5]["#text"]+ '" >');    
        });   
}



