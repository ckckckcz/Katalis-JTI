<?php
function cutText($text, $maxWords = 6)
{
    $words = explode(' ', $text);
    if (count($words) > $maxWords) {
        return implode(' ', array_slice($words, 0, $maxWords)) . '...';
    }
    return $text;
}
?>