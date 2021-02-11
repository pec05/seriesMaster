function token(){
  var settings = {
  "async": true,
  "url": "https://api.themoviedb.org/3/authentication/token/new?api_key=7e9bf83aab5dab37c959ba59b82e59d6",
  "method": "GET",
  "headers": {},
  "data": "{}"
  }

$.ajax(settings).done(function (response) {
  console.log(response);
  document.getElementById('tokid').value = response["request_token"];
});
}