<?php

// curl_init(); initialize krne ke liye use krte h
// curl_setopt(); data bhejne ke liye use krte h
// curl_exec(); excute krne ke liye
// curl_close();
$header[] = "Accept: application/json";
$header[] = "Content-type: application/json";

$ch = curl_init( );
curl_setopt($ch,CURLOPT_URL,"https://jsonplaceholder.typicode.com/posts");
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, "userId=10&title=my sample title&body=my sample body data.");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
//curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
$result = curl_exec($ch);
curl_close($ch);
// $result = json_decode($result);
// foreach($result as $row){
//     echo$row->body."<br/>";
// }
 echo "<pre>";
 print_r($result);

// $url = "https://thumbs.dreamstime.com/b/environment-earth-day-hands-trees-growing-seedlings-bokeh-green-background-female-hand-holding-tree-nature-field-gra-130247647.jpg";
// $image = "image.jpg";
// $fimage = fopen($image,'w+');
// $ch = curl_init($url);
// curl_setopt($ch,CURLOPT_FILE,$fimage);
// //curl_setopt($ch,CURLOPT_TIMEOUT,1000);
// curl_exec($ch);
// curl_close($ch);
// fclose($fimage);

?>

