<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン</title>
</head>
<body>
  <h1>ログイン</h1>
  <?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red;"><?php echo htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8'); ?></p>
    <?php unset($_SESSION['error']); ?>
  <?php endif; ?>

  <form action="login_process.php" method="post">
    <div>
      <label>ユーザー名:
        <input type="text" name="username" required>
      </label>
    </div>
    <div>
      <label>パスワード:
        <input type="password" name="password" required>
      </label>
    </div>
    <div>
      <button type="submit">ログイン</button>
    </div>
  </form>
</body>
</html>
