var next = 1; 
var nextTV = 1;

var posterPaths = "http://image.tmdb.org/t/p/w500";
var backgroundPaths = "http://image.tmdb.org/t/p/w1280";
var url = "https://api.themoviedb.org/3/discover/movie?";
var key = "&api_key=7e9bf83aab5dab37c959ba59b82e59d6";
var urlTV = "https://api.themoviedb.org/3/discover/tv?";
var moreTVinfo = "https://api.themoviedb.org/3/tv/  +tvshow id+  ?&api_key=7e9bf83aab5dab37c959ba59b82e59d6";
var movieCast = "https://api.themoviedb.org/3/movie/";
var actorInfo = "https://api.themoviedb.org/3/discover/movie?&with_cast=";
var imdbLink = "http://www.imdb.com/title/";
var date = new Date();
var connect_general; 
var sessionID;

  function sortTv(choice,connect,sessID) {
  nextTV = 0;
  $(".tv").remove(); 
  connect_general = connect; 
  sessionID = sessID;
  // Genres sort by list start
  if (choice === "action") {
    choices="&with_genres=10759";
    showTv("&with_genres=10759");
  } else if (choice === "animation") {
    choices="&with_genres=16";
    showTv("&with_genres=16");
  } else if (choice === "comedy") {
    choices="&with_genres=35";
    showTv("&with_genres=35");
  } else if (choice === "crime") {
    choices="&with_genres=80";
    showTv("&with_genres=80");
  } else if (choice === "documentary") {
    choices="&with_genres=99";
    showTv("&with_genres=99");
  } else if (choice === "drama") {
    choices="&with_genres=18";
    showTv("&with_genres=18");
  } else if (choice === "family") {
    choices="&with_genres=10751";
    showTv("&with_genres=10751");
  } else if (choice === "kids") {
    choices="&with_genres=10762";
    showTv("&with_genres=10762");
  } else if (choice === "mystery") {
    choices="&with_genres=9648";
    showTv("&with_genres=9648");
  } else if (choice === "news") {
    choices="&with_genres=10763";
    showTv("&with_genres=10763");
  } else if (choice === "reality") {
    choices="&with_genres=10764";
    showTv("&with_genres=10764");
  } else if (choice === "fantasy") {
    choices="&with_genres=10765";
    showTv("&with_genres=10765");
  } else if (choice === "soap") {
    choices="&with_genres=10766";
    showTv("&with_genres=10766");
  } else if (choice === "talk") {
    choices="&with_genres=10767";
    showTv("&with_genres=10767");
  } else if (choice === "war") {
    choices="&with_genres=10768";
    showTv("&with_genres=10768");
  } else if(choice === "western") {
    choices="&with_genres=37";
    showTv("&with_genres=37");
  }
  
}

function showTv(choice) {
  nextTV++;
//console.log(url + choice + key + "&page=" + next);
  $.getJSON(urlTV + choice + key + "&page=" + nextTV, function(data) {
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
      if (poster === "http://image.tmdb.org/t/p/w500null") {
        poster = "https://placeholdit.imgix.net/~text?txtsize=33&txt=No%20Poster%20Availible&w=250&h=400";
      }
      if (poster === "http://image.tmdb.org/t/p/w500null") {
          //si pas de poster, ne montre rien
      }
      else if(overview == "null"){
        //ne montre pas si null
      }
      else{
      $(".main").append("<div class='col-sm-2 text-center tv t" + i + "' id='" + id + "'><div class='tiles'><img onclick='tvInfo(" + id + ")' src=" + poster + "><div class='ratings'><p class='lead rating'>" + ratin + " <i class='fa fa-star' aria-hidden='true'></i></p></div></div></div>");
      }
    }
  });
}

function tvInfo(id) {    
  $(".movie").remove();
  $(".tv").hide();
  $(".moreTV").hide();
  var infoURL = "https://api.themoviedb.org/3/tv/" + id + "?&api_key=7e9bf83aab5dab37c959ba59b82e59d6";
  $.getJSON(infoURL, function(data) {
    var genre;
    if (data.genres.length > 3) {
      genre = data.genres[0].name + ", " + data.genres[1].name + ", " + data.genres[2].name + ", " + data.genres[3].name;
    } else if (data.genres.length > 2) {
      genre = data.genres[0].name + ", " + data.genres[1].name + ", " + data.genres[2].name;
    } else if (data.genres.length > 1) {
      genre = data.genres[0].name + ", " + data.genres[1].name;
    } else {
      genre = data.genres[0].name;
    }
    var seasons = data.seasons.length;
    var title = data.name;
    var rating = data.vote_average;
    var overview = data.overview;
    var poster = posterPaths + data.poster_path;
    if (poster === "https://image.tmdb.org/t/p/w500null") {
      poster = "https://placeholdit.imgix.net/~text?txtsize=33&txt=No%20Poster%20Availible&w=250&h=400";
    }
    var backdrop = backgroundPaths + data.backdrop_path;
    $(".main").prepend("<div class='col-sm-12 overview'><div class='background'><img src=" + backdrop + "></i></div><div class='col-sm-4 over-poster'><img src=" + poster + "></div><div class='col-sm-8 text-left'><h1 class=''>" + title + "</h1><p class='lead text-left'>" + overview + "</p></div><div class='row genre_row'><div class='col-sm-4 text-left'><h2>Genre:</h2></div><div class='col-sm-4 text-right bestof_btn'><button type='button' class='btn btn-dark btn-lg add_tv_wl' id='add_tv_wl' onclick='add_watchlist("+data.id+")'>Add to watchlist</button></div></div><div class='col-sm-3' text-left><p class='lead text-left'>" + genre + "</p></div><div class='col-sm-5 text-left seasons'><h2>Season information:</h2><select class='col-sm-8 lead text-left season'></select></div><div id='hideMInfo' class='exit'><i onclick='exitTv(" + id + ")' class='fa fa-times-circle' aria-hidden='true'></div></div></div>");
    for (var i = 0; i < data.seasons.length; i++) {
      $(".season").prepend("<option onclick='seriesInfo("+data.id+","+data.seasons[i].season_number+")' value='"+data.seasons[i].season_number+"'>Season "+data.seasons[i].season_number+" </option>");
    }
    $(".season").prop("selectedIndex",-1);
    if(connect_general=="notconnected"){
      $(".add_tv_wl").hide();
    }
  });
}

function seriesInfo(id,num){
  var seriesURL = "https://api.themoviedb.org/3/tv/"+id+"/season/"+num+"?&api_key=7e9bf83aab5dab37c959ba59b82e59d6";
  $(".describ_seasons").remove();
  $(".seasons").append("<div class='describ_seasons'></div>");
  $.getJSON(seriesURL, function(data) {
    for(var i=0; i<data.episodes.length;i++){
      var seasonname = data.name;
      var seasonoverview = data.overview;
      var episode = data.episodes[i].name;
      var overview = data.episodes[i].overview;
      var airdate = data.episodes[i].air_date;
      
      $(".describ_seasons").append("<div><h3>"+episode+"</h3><p>"+overview+"</p><p>airdate : "+airdate+"</p></div>");
    }
  });
}

$("#tv").click(function() {
  nextTV = 0;
  sortTv();
  $(".overview").remove();
  $(".moreTV").hide();
  $(".more").hide();
  $(".droptv").show();
});

$(".moreTV").click(function() {
  showTv(choices);
});

function exitTv(id) {
  $(".overview").hide();
  $(".tv").show();
  $(".moreTV").show();
  window.location.hash = id;
} 


function add_watchlist(id){
  var settings = {
    "async": true,
    "url": "https://api.themoviedb.org/3/account/%7Baccount_id%7D/watchlist?session_id="+sessionID+"&api_key=7e9bf83aab5dab37c959ba59b82e59d6",
    "method": "POST",
    "headers": {
      "content-type": "application/json;charset=utf-8"
    },
    "processData": false,
    "data": "{\"media_type\":\"tv\",\"media_id\":"+id+",\"watchlist\":true}"
  }
  console.log(settings['data']);
  $.ajax(settings).done(function (response) {
    console.log(response);
    alert('The series was added to your watchlist');
  });
}

function checkSubmit(e,connect,sessID) {
  connect_general = connect; 
  sessionID = sessID;
  if (e && e.keyCode == 13) {
    var searching = document.getElementById('search').value;
    search(searching);
    document.getElementById('search').value = "";
    return false;
  }
}


function search(search) {
  $(".main_search_remove").remove();
  $(".main_search").append("<div class ='main_search_remove'></div>");
  $(".main_search_remove").append("<div class='genre-main'></div>");
  $(".genre-main").append("<div class='genre-section'></div>");
  $(".genre-section").append("<h3 class='genre-title'></h3>");
  $(".genre-section").append("<div class='row text-center main'></div>");
  //$(".movies").remove();
  //$(".tv").remove();
  $(".overview").remove();
  var searchurl = "https://api.themoviedb.org/3/search/tv?api_key=7e9bf83aab5dab37c959ba59b82e59d6&query=";
  $.getJSON(searchurl + search, function(data) {
    for (var i = 0; i < data.results.length; i++) {
      var id = data.results[i].id;
      var title = data.results[i].name;
      var rating = data.results[i].vote_average;
      roundHalf(rating);

      function roundHalf(rating) {
        ratin = rating / 2;
        ratin = Math.round(ratin * 2) / 2;
      }

      var poster = posterPaths + data.results[i].poster_path;
      var overview = data.results[i].overview;
      if (poster === "http://image.tmdb.org/t/p/w500null") {
      }
      else if(overview == "null"){
      }
      else{
      $(".main").append("<div class='col-sm-2 text-center tv t" + i + "' id='" + id + "'><div class='tiles'><img onclick='tvInfo(" + id + ")' src=" + poster + "><div class='ratings'><p class='lead rating'>" + ratin + " <i class='fa fa-star' aria-hidden='true'></i></p></div></div></div>");
      $("h3").replaceWith('<h3> Results of the search for : '+search+' </h3>');
     }
    }
  });
}

alert = function(msg, id) {
  $(".bestof_btn").append( '<div class="alert alert-success alert-dismissible alert_btn_removable">\
  <strong>'+msg+'</strong> \
  </div>');
  $("#r_"+id).append( '<div class="alert alert-success alert-dismissible alert_btn_removable_supp">\
  <strong>'+msg+'</strong> \
  </div>');
 
  setTimeout(t => {$(".alert_btn_removable").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove();
    });}, 2000);
  setTimeout(t => {$(".alert_btn_removable_supp").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove();
    });}, 2000);
}


sortTv();

function delete_watchlist(id){
  var settings = {
    "async": true,
    "url": "https://api.themoviedb.org/3/account/%7Baccount_id%7D/watchlist?session_id="+sessionID+"&api_key=7e9bf83aab5dab37c959ba59b82e59d6",
    "method": "POST",
    "headers": {
      "content-type": "application/json;charset=utf-8"
    },
    "processData": false,
    "data": "{\"media_type\":\"tv\",\"media_id\":"+id+",\"watchlist\":false}"
  }
  console.log(settings['data']);
  $.ajax(settings).done(function (response) {
    console.log(response);
    alert('The series was remove from your watchlist',id);
    timedRefresh(3500);
  });
}

function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}


function show_p_tmdb(sessID){
  sessionID = sessID;
  var settings = {
    "async": true,
    "url": "https://api.themoviedb.org/3/account?session_id="+sessionID+"&api_key=7e9bf83aab5dab37c959ba59b82e59d6",
    "method": "GET",
    "headers": {},
    "data": "{}"
  }
  $.ajax(settings).done(function (response) {
    console.log(response);
    var avatar = response['avatar'];
    var gravatar = avatar['gravatar'];
    var hash = gravatar['hash'];
    console.log(hash);
    $(".tmdb_profil").append("<div class ='container-fluid'><div class= 'tmdb_profil_title'><h3>My profil TMDb : </h3></div><div class='row'> <div class='col-sm-4 text-center'><img src='https://www.gravatar.com/avatar/'"+hash+"'/></div><div class ='col-sm-8 text-left'> <div class ='row'> My username : "+response['username']+"</div><div class ='row'> My name : "+response['name']+"</div> </div></div></div>")
  });
}