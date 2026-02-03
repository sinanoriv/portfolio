<?php
// config.php
$host = '';       // EC2上のPostgresならlocalhost
$port = '5432';
$dbname = 'public.app_users';
$user = 'postgres';
$password = 'postgres';

$dsn = "pgsql:dbname={$dbname};host={$host};port={$port}"; // DSN[web:12]

try {
    $pdo = new PDO($dsn, $user, $password);
    // エラー時に例外を投げるモード
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // 連想配列で取得しやすく
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    exit('DB接続エラー: ' . $e->getMessage());
}
