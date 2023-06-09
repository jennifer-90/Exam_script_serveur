<?php
$text= 'cool';
function reverseString(string $text): string
{
    return strrev($text);
}

echo reverseString('cool');
