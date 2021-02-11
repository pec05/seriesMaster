var next = 1; 
var nextTV = 1;
var posterPaths = "http://image.tmdb.org/t/p/w500";
var backgroundPaths = "http://image.tmdb.org/t/p/w1280";
var url = "https://api.themoviedb.org/3/discover/movie?";
var key = "?api_key=7e9bf83aab5dab37c959ba59b82e59d6";
var urlTV = "https://api.themoviedb.org/3/discover/tv?";
var urlAccount = "https://api.themoviedb.org/3/account/%7Btv_id%7D/similar";
var moreTVinfo = "https://api.themoviedb.org/3/tv/  +tvshow id+  ?&api_key=7e9bf83aab5dab37c959ba59b82e59d6";
var movieCast = "https://api.themoviedb.org/3/movie/";
var actorInfo = "https://api.themoviedb.org/3/discover/movie?&with_cast=";
var imdbLink = "http://www.imdb.com/title/";
var date = new Date();
var sessionID;

function similar(sessID){
    sessionID = sessID; 
    console.log(urlAccount+key+"&page=" + nextTV+sessionID);
    $.getJSON(urlAccount+key+"&page=" + nextTV, function(data){
        for (var i = 0; i < data.results.length; i++) {
            var id = data.results[i].id;
            var title = data.results[i].name;
            var rating = data.results[i].vote_average;
            var overview = data.results[i].overview;
            roundHalf(rating);

            function roundHalf(rating) {
                ratin = rating / 2;
                ratin = Math.round(ratin * 2) / 2;
            }
            var poster = posterPaths + data.results[i].poster_path;         
            $(".main_wl").append("\
            <div class='row wl_row' id='r_" + id + "'>\
                <div class='wl_col col-sm-2 text-center tv t"+i+"'id='" + id + "'><div class='tiles'><img onclick='tvInfo(" + id + ");up()' src=" + poster + ">\
                </div></div>\
                <div class='wl_col col-sm-2 text-center ratings'><p class='lead rating'>" + ratin + " <i class='fa fa-star' aria-hidden='true'></i></p></div>\
                <div class='wl_col col-sm-6 title_overview'><h1>"+title+"</h1><p class='lead text-left'>"+overview+"</p></div>\
                <div class='wl_col col-sm-2 text-center btn_supp'><button type='button' class='btn btn-green btn-lg similar_tv_wl' id='similar_tv_wl' onclick = 'add_similar("+id+")'>Similar series</button></div>\
            </div>");        
        }
        console.log(data);    
    });
}

function up(){
    $(window).scrollTop(0);
}

