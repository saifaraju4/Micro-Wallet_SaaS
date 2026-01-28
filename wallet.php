<?php
require __DIR__ . '/auth.php';
require __DIR__ . '/db.php';


$userId = $_SESSION['user_id'];
$wallet = $db->query("SELECT balance FROM wallets WHERE user_id = $userId")->fetch();


echo json_encode([
'balance' => (int) $wallet['balance']
]);