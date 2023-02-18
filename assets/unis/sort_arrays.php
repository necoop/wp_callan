<?php

// Функции
// Удаляем дубликаты из массива и сортируем его
function deliteDuplicateAndSort(array $array)
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
    return ($array);
}

// Удаляем разделители в строках (запятые) и объединяем их в массив
// function joinInArray(&$array)
// {
//     do {
//         $count = 0;
//         $rize = 0;
//         foreach ($array as $words => $item) {
//             $tmp[] = str_replace(', ', ',', $item, $count);
//             if ($count) {
//                 $rize++;
//             }
//         }
//         $array = $tmp;
//         unset($tmp);
//     } while ($rize);
//     do {
//         $count = 0;
//         $rize = 0;
//         foreach ($array as $words => $item) {
//             $tmp[] = str_replace(' ,', ',', $item, $count);
//             if ($count) {
//                 $rize++;
//             }
//         }
//         $array = $tmp;
//         unset($tmp);
//     } while ($rize);

//     $tmp = [];
//     foreach ($array as $item) {
//         $tmp = array_merge($tmp, explode(',', $item));
//     }
//     $array = $tmp;
//     unset($tmp);
// }

function removeSpacesAndConvertToArray($str)
{
    if (!is_array($str)) {
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
    } else return ($str);
}

function cutStr(string $str, int $maxLenght, string $strToReplace)
{
    if (mb_strlen($str) > $maxLenght) {
        $newStr = mb_substr($str, 0, $maxLenght - 3);
        return ($newStr . $strToReplace . $strToReplace . $strToReplace);
    } else {
        return ($str);
    }
}

//Удаляем разделители и повторы в строке, преобразуем её в массив
function prepareArray($array)
{
    $newArray = [];
    foreach ($array as $str) {
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
        $newArray[] = $str;
    }
    $array = $newArray;
    unset($newArray);
    $newArray = [];
    foreach ($array as $item) {
        foreach (explode(',', $item) as $str) {
            $newArray[] = $str;
        }
    }
    $array = $newArray;
    unset($newArray);
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
    asort($arrayFiltred);
    return $arrayFiltred;
}

//Обрезаем текст до нужного количества символов
function cutText($text, int $lenght)
{
    if (mb_strlen($text) > $lenght) {
        echo str_replace('" "', '<p>', nl2br(mb_substr($text, 0, $lenght))  . '...');
    } else {
        echo nl2br($text);
    }
}
