<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>csvアプロード</title>
</head>
<body>
  <form action="./result.php" method="post" enctype="multipart/form-data">
    <p>csvファイルアップロード</p>
    <input type="file" name="csv">
    <button>基本統計量を表示する</button>
  </form>
</body>
</html>