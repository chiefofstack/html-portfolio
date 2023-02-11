<?php

function trimText($text, $length){
    return strlen($text) > $length ? substr($text,0,$length)."..." : $text;
}

?>