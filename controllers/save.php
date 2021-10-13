<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $header = filter_input(INPUT_POST, 'header', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    $keywords = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_STRING);
}