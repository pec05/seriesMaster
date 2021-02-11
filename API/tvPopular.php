<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/tv/popular?page=1&language=en-US&api_key=7e9bf83aab5dab37c959ba59b82e59d6",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
));

$response = curl_exec($curl);
$err = curl_error($curl);

$parsed_json = json_decode($response);

$results = $parsed_json->{'results'};

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  for ($i = 0 ; $i < sizeof($results); $i++){
    $poster_path = $parsed_json->{'results'}[$i]->{'poster_path'};
    ?>
    <div class="col"><img src="http://image.tmdb.org/t/p/w780/<?php echo $poster_path?>" class="d-block w-100" alt="<?php echo $poster_path?>"></div>
    <?php
    }  
  }
}
?>