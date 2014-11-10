<?php

$to = "coreyreylp@gmail.com";
$subject = "Server Status";
$body = "Hey, \n Something is wrong with the server! Go check it out! \n-Virtual Cory";
$headers = 'From: codeup@coryDev1';

function Visit($url)
{
    $agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";$ch=curl_init();

    curl_setopt ($ch, CURLOPT_URL,$url );
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch,CURLOPT_VERBOSE,false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);

    $page=curl_exec($ch);

    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if($httpcode>=200 && $httpcode<300) {
        return true;
    } else {
        return false;
    }
}

if(!Visit("coryray.me")) {
    mail($to, $subject, $body, $headers);
}

?>