<?php
session_start();
require __DIR__ . '/db.php';


if (!isset($_SESSION['user_id'])) {
$user = $db->query("SELECT id FROM users LIMIT 1")->fetch();


if (!$user) {
$db->exec("INSERT INTO users (email, password) VALUES ('internal@service.local', 'internal')");
$userId = $db->lastInsertId();
$db->exec("INSERT INTO wallets (user_id, balance) VALUES ($userId, 0)");
} else {
$userId = $user['id'];
}


$_SESSION['user_id'] = $userId;
}