<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $header = filter_input(INPUT_POST, 'header', FILTER_SANITIZE_STRING);
}