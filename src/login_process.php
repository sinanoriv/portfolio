<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    $_SESSION['error'] = 'ユーザー名とパスワードを入力してください。';
    header('Location: login.php');
    exit;
}

// ユーザー名で1件取得
$sql = 'SELECT id, username, password_hash FROM app_users WHERE username = :username';
$stmt = $pdo->prepare($sql);
$stmt->execute([':username' => $username]);
$user = $stmt->fetch();

if (!$user) {
    // ユーザーが存在しない
    $_SESSION['error'] = 'ユーザー名またはパスワードが違います。';
    header('Location: login.php');
    exit;
}

// パスワードチェック（password_verify）[web:13]
if (!password_verify($password, $user['password_hash'])) {
    $_SESSION['error'] = 'ユーザー名またはパスワードが違います。';
    header('Location: login.php');
    exit;
}

// 認証成功
session_regenerate_id(true); // セッション固定攻撃対策
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];

header('Location: mypage.php');
exit;
