<?php
$api_url = 'http://localhost:3000';
if ($_ENV['API_URL']) {
    $api_url = $_ENV['API_URL'];
}

global $api_url;

$url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
switch ($url_path) {
    case '/':
        include 'homepage.php';
        break;
    case '/episode':
        include 'episode.php';
        break;
    case '/upload':
        include 'upload.php';
        break;
    case '/upload-episode':
        include 'upload-episode.php';
        break;
    default:
        http_response_code(404);
        echo '404 Not Found';
        break;
}
