function get_session_id(token){
    var settings = {
        "async": true,
        "url": "https://api.themoviedb.org/3/authentication/session/new?api_key=7e9bf83aab5dab37c959ba59b82e59d6",
        "method": "POST",
        "headers": {
          "content-type": "application/json"
        },
        "processData": false,
        "data": "{\"request_token\":\""+token+"\"}"
      }
    var thereponse;
        $.ajax(settings).done(function (response) {
        //  console.log(response);
        //  document.getElementById('success').value = response['success'];
          document.getElementById('session_id').value = response['session_id'];
          thereponse = response;
        });
    return thereponse;
}