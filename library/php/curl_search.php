<?php
function curl_search ($url, $referer = 'https://www.google.com.ua'){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 
    (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
    curl_setopt( $ch, CURLOPT_REFERER, $referer );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $html = curl_exec( $ch );
    curl_close ( $ch );

    return $html;
}