<?php

// Функции
// Удаляем дубликаты из массива и сортируем его
function deliteDuplicateAndSort(array &$array)
{
    $arrayFiltred = [];
    foreach ($array as $arrayItem) {
        $equality = false;
        foreach ($arrayFiltred as $arrayFiltredItem) {
            if ($arrayItem == $arrayFiltredItem) {
                $equality = true;
                break;
            }
        }
        if (!$equality) {
            $arrayFiltred[] = $arrayItem;
        }
    }
    $array = $arrayFiltred;
    asort($array);
}

// Удаляем разделители в строках (запятые) и объединяем их в массив
function joinInArray(&$array)
{
    do {
        $count = 0;
        $rize = 0;
        foreach ($array as $words => $item) {
            $tmp[] = str_replace(', ', ',', $item, $count);
            if ($count) {
                $rize++;
            }
        }
        $array = $tmp;
        unset($tmp);
    } while ($rize);
    do {
        $count = 0;
        $rize = 0;
        foreach ($array as $words => $item) {
            $tmp[] = str_replace(' ,', ',', $item, $count);
            if ($count) {
                $rize++;
            }
        }
        $array = $tmp;
        unset($tmp);
    } while ($rize);

    $tmp = [];
    foreach ($array as $item) {
        $tmp = array_merge($tmp, explode(',', $item));
    }
    $array = $tmp;
    unset($tmp);
}

function removeSpacesAndConvertToArray($str)
{
    do {
        $count = 0;
        $rize = 0;
        $tmp = str_replace(', ', ',', $str, $count);
        if ($count) {
            $rize++;
        }
        $str = $tmp;
        unset($tmp);
    } while ($rize);
    do {
        $count = 0;
        $rize = 0;
        $tmp = str_replace(' ,', ',', $str, $count);
        if ($count) {
            $rize++;
        }
        $str = $tmp;
        unset($tmp);
    } while ($rize);
    $newArray = [];
    $newArray = array_merge($newArray, explode(',', $str));
    return ($newArray);
}

function cutStr(string $str, int $maxLenght, string $strToReplace)
{
    if (mb_strlen($str) > $maxLenght) {
        $newStr = mb_substr($str, 0, $maxLenght - 3);
        return($newStr . $strToReplace . $strToReplace . $strToReplace);
    } else {
        return($str);
    }
}
