<?php
// Первое задание

use PhpParser\Node\Expr\Cast\Bool_;

function abbr(string $attr)
{
    $createdAbbr = preg_split('/ /', $attr, -1);
    $abbrString = '';
    foreach ($createdAbbr as $firstLetter) {
        $abbrString .= strtoupper(substr($firstLetter, 0, 1));
    };
    var_dump($abbrString);
};
abbr('Gosdfsad Srwdg ASweg saffef asd12 sasfe');

//Второе задание

function cutText($text, int $maxSymbol) {
    $textLenght = strlen($text);
    if ($textLenght > $maxSymbol) {
        $cuttedText =  mb_substr($text, 0, $maxSymbol -3);
        $cuttedText .='...';
        var_dump($cuttedText);
    };
};

cutText('shaufasufidafduf', 10);

//Третье задание

function getCountSymbol($someText, $someLetter) {
    $letterCount = substr_count($someText, $someLetter);
    var_dump($letterCount);
};
getCountSymbol('33regjiFbnfnb4sfFivbfwr', 'f');

//Третье задание но без учета регистра

function getCountSymbolCase($someText, $someLetter) {
    $toLowText = strtolower($someText);
    $toLowLetter = strtolower($someLetter);
    $letterCountCase = substr_count($toLowText, $toLowLetter);
    var_dump($letterCountCase);
};
getCountSymbolCase('33regjiFbnfnb4sfFivbfwr', 'f');

//Четвертое задание

function ClearText($someFormText) {
    $saveText = trim(stripslashes(strip_tags(htmlspecialchars($someFormText))));
    var_dump($saveText);
};
ClearText('11213<html><script>  <js> ');

//Пятое задание

function shortFio(string $fullName) {
    $createdArray = preg_split('/ /', $fullName, -1);
    $fioString = '';
    $fioString .= $createdArray[0];
    for ($i = 1; $i <= 2; $i++) {
        $fioString .= strtoupper(substr($createdArray[$i], 0, 2));
        $fioString .= '.';
    };
    var_dump($fioString);
};
shortFio('Пупкин Иван Иванович');

//Шестое задание
function FindExtension($someFile) {
    $fileName = new SplFileInfo($someFile);
    $fileExtension = $fileName->getExtension();
    var_dump($fileExtension);
};
FindExtension('123.txt');