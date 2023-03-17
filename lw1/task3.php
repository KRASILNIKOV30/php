<?php

$text = $argv[1];
$text = preg_replace('/\s+/', ' ', $text);
echo trim($text);
