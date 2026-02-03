<?php
session_start();

if (empty($_SESSION['logged_in'])) {
    // 未ログインならログイン画面へ
    header('Location: login.php');
    exit;
}

$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>マイページ</title>
</head>
<body>
  <p><?php echo $username; ?> さん、ログイン中です。</p>
  <p><a href="logout.php">ログアウト</a></p>
</body>
</html>
