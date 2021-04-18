<?php

function toCamelCase($text, $count=50)
{
    $str = substr($text, 0, $count);
    if (strlen($text) > $count)
        $str .= "...";
    return ucwords(strtolower($str));
}
function getTextSummary($text, $count)
{
    $str = substr($text, 0, $count);
    if (strlen($text) > $count)
        $str .= "...";
    return ucfirst(strtolower($str));
}




function outputMessage($status, $message)
{
    return json_encode(array("status" => $status, "message" => $message));
}

/**
 * Generate initials from a name
 *
 * @param string $name
 * @return string
 */
function generateInitials(string $name): string
{
    $words = explode(' ', $name);
    if (count($words) >= 2) {
        return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
    }
    return makeInitialsFromSingleWord($name);
}

/**
 * Make initials from a word with no spaces
 *
 * @param string $name
 * @return string
 */
function makeInitialsFromSingleWord(string $name): string
{
    preg_match_all('#([A-Z]+)#', $name, $capitals);
    if (count($capitals[1]) >= 2) {
        return substr(implode('', $capitals[1]), 0, 2);
    }
    return strtoupper(substr($name, 0, 2));
}


function combineText($text, $delimiter="_"){


    return strtolower(str_replace ( " ", $delimiter, $text));
}

