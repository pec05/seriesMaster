var settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://api.themoviedb.org/3/account/%7Baccount_id%7D/watchlist?session_id=d087e97213e1dadecf07ed8015007692c95987fd&api_key=7e9bf83aab5dab37c959ba59b82e59d6",
    "method": "POST",
    "headers": {
      "content-type": "application/json;charset=utf-8"
    },
    "processData": false,
    "data": "{\"media_type\":\"tv\",\"media_id\":11,\"watchlist\":true}"
  }
  
  $.ajax(settings).done(function (response) {
    console.log(response);
  });