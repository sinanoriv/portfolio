<?php
echo $hallo = "HelloWorld!";

$CurrentDate = date("Y-m-d H:i:s");
echo "\nCurrent Date and Time: " . $CurrentDate;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>トップページ</title>
</head>
<body>
  <p><?php echo $hallo; ?> </p>
  <p>現在の日時: <?php echo $CurrentDate; ?></p>
  <p><a href="login.php">ログイン</a></p>
</body>
</html>