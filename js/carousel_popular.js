(function() {
    window.tmdb = {
      "api_key": "7e9bf83aab5dab37c959ba59b82e59d6",
      "base_uri": "https://api.themoviedb.org/3",
      "images_uri": "http://image.tmdb.org/t/p",
      "timeout": 5000,
      "size": "/w500",
      call: function(url, params, success, error) {
        var params_str = "api_key=" + tmdb.api_key;
        for (var key in params) {
          if (params.hasOwnProperty(key)) {
            params_str += "&" + key + "=" + encodeURIComponent(params[key]);
          }
        }
        var xhr = new XMLHttpRequest();
        xhr.timeout = tmdb.timeout;
        xhr.ontimeout = function() {
          throw ("Request timed out: " + url + " " + params_str);
        };
        xhr.open("GET", tmdb.base_uri + url + "?" + params_str, true);
        xhr.setRequestHeader('Accept', 'application/json');
        xhr.responseType = "text";
        xhr.onreadystatechange = function() {
          if (this.readyState === 4) {
            if (this.status === 200) {
              if (typeof success == "function") {
                success(JSON.parse(this.response));
              } else {
                throw ('No success callback, but the request gave results')
              }
            } else {
              if (typeof error == "function") {
                error(JSON.parse(this.response));
              } else {
                throw ('No error callback')
              }
            }
          }
        };
        xhr.send();
      }
    }
  })()

  function carousel_popular_tv() {
    tmdb.call('/trending/tv/week', {},
      function(e) {
        var results = Object.keys(e.results);
        console.log("Success: " + e);
        console.log(e.results);
        for (var i = 0; i < e.results.length; i++) {
          var place = document.getElementById('img'+i)
          console.log(JSON.stringify(e.results[i]));
          var json = e.results[i];
          var poster = tmdb.images_uri + tmdb.size + e.results[i].poster_path;
          var img = new Image();
          img.src = poster;
          place.innerHTML = img;
          if (img.src === 'http://image.tmdb.org/t/p/w500null') {
            img.src = 'http://colouringbook.org/SVG/2011/COLOURINGBOOK.ORG/cartoon_tv_black_white_line_art_scalable_vector_graphics_svg_inkscape_adobe_illustrator_clip_art_clipart_coloring_book_colouring-1331px.png';
          }
        };
      },
      function(e) {
        console.log("Error: " + e)
      })
  }