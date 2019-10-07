<?php

include 'Parse.php';

$kinopoiskUrl = 'https://www.kinopoisk.ru/top/';

$Parse = new Parse();
$html = $Parse->getKino($kinopoiskUrl);
$billetHtml = $Parse->matchHtml($html, 10);
$rating = $Parse->getRating($billetHtml);
$nameAndYear = $Parse->getNameAndYear($billetHtml);
$totalPiople = $Parse->getTotalPiople($billetHtml);

foreach($nameAndYear as $key => $element){
    $res = $Parse->fetchData('http://localhost/films/public/api/api/comments', 'POST', ['namefilm' => $nameAndYear[$key]['name'],'year' => $nameAndYear[$key]['year'], 'totalpeople' => $totalPiople[$key], 'rating' => $rating[$key]]);
}
