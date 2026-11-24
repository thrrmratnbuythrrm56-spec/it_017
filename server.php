<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
if ($path === '/api/test' && $method === 'GET') {
    echo json_encode(['status' => 'ok', 'message' => 'GET สำเร็จ'], JSON_UNESCAPED_UNICODE);
    exit;
}
if ($path === '/api/test' && $method === 'POST') {
    echo json_encode(['status' => 'created', 'received' => $input], JSON_UNESCAPED_UNICODE);
    exit;
}
http_response_code(404);
echo json_encode(['error' => 'Not Found']);