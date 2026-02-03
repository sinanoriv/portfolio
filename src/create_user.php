<?php
require 'config.php'; // 後述のPDO接続

$username = 'testuser';
$plainPassword = 'testpass';

$hash = password_hash($plainPassword, PASSWORD_DEFAULT); // ハッシュ化[web:13]

$sql = 'INSERT INTO app_users (username, password_hash) VALUES (:username, :password_hash)';
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':username' => $username,
    ':password_hash' => $hash,
]);

echo "ユーザー作成完了\n";
