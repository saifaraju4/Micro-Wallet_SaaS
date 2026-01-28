<?php
require __DIR__ . '/auth.php';
require __DIR__ . '/db.php';


$userId = $_SESSION['user_id'];
$cost = 10;


$db->query("UPDATE wallets SET balance = balance - $cost WHERE user_id = $userId");
$db->query("INSERT INTO transactions (user_id, amount, type)
VALUES ($userId, $cost, 'debit')");


echo json_encode(['consumed' => $cost]);