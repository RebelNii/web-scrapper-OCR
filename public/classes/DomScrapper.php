<?php

// $url = "https://codingreflections.com/wordpress-programming-languages/";

$url = "https://www.traversymedia.com/";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$html = curl_exec($ch);
curl_close($ch);
$dom = new DOMDocument();
// $dom->xmlStandalone = false;
// return $dom->saveHTML();
@$dom->loadHTML($html);



//
// $h2s = $dom->getElementsByTagName('h2');

// $h2Array = array();

// foreach ($h2s as $h2) {
//     $text = $h2->textContent;
//     $h2Array[] = $text;

//     echo $text . '<br>';
// }

//find links

$a = $dom->getElementsByTagName('a');

$link1 = $a->item(0);

echo $link1->textContent . '<br>';

$fl = fopen('links.txt', 'a');

foreach($a as $as){
    $aas = $as->textContent;
    echo $aas .'<br>';
    echo $as->getAttribute('href') . '<br>';
    echo $as->getAttribute('atl') . '<br>';
    fwrite($fl, $as->getAttribute('href') . "\n");
}

fclose($fl);