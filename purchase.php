<?php
require __DIR__ . '/auth.php';
require __DIR__ . '/db.php';


$userId = $_SESSION['user_id'];


$credits = (int) $_POST['credits'];
$price = (float) $_POST['price'];


if ($price <= 0) {
http_response_code(400);
die('Invalid price');
}


$db->query("UPDATE wallets SET balance = balance + $credits WHERE user_id = $userId");


$db->query("INSERT INTO transactions (user_id, amount, type)
VALUES ($userId, $credits, 'credit')");


echo json_encode(['status' => 'ok']);