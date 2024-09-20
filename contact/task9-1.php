<?php
// データベース接続情報
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "consumer";

// データベース接続の作成
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// テーブル作成のSQL
// $sql = "CREATE TABLE IF NOT EXISTS form (
//   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   name VARCHAR(50) NOT NULL,
//   furigana VARCHAR(50) NOT NULL,
//   email VARCHAR(50) NOT NULL,
//   phone VARCHAR(20),
//   inquiry_type VARCHAR(50),
//   message TEXT,
//   acceptance TINYINT(1),
//   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// )";

// テーブル作成の実行
// if ($conn->query($sql) === TRUE) {
//   echo "Table form created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }

// フォームが送信された場合の処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $conn->real_escape_string(htmlspecialchars($_POST['name']));
  $furigana = $conn->real_escape_string(htmlspecialchars($_POST['furigana']));
  $email = $conn->real_escape_string(htmlspecialchars($_POST['email']));
  $phone = $conn->real_escape_string(htmlspecialchars($_POST['phone']));
  $inquiry_type = $conn->real_escape_string(htmlspecialchars($_POST['inquiry_type']));
  $message = $conn->real_escape_string(htmlspecialchars($_POST['message']));
  $acceptance = isset($_POST['acceptance-714']) ? 1 : 0;

  // データベースにデータを挿入
  $sql = "INSERT INTO form (name, furigana, email, phone, inquiry_type, message, acceptance, created_at)
          VALUES ('$name', '$furigana', '$email', '$phone', '$inquiry_type', '$message', '$acceptance', NOW())";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>送信完了</title>
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
</head>
<body>
  <header>
    <div class="wrapper">
      <div class="header">
        <h1>ここには会社名が入ります</h1>
        <div class="btn">
          <a href="#" class="head_btn01">ボタン01</a>
          <a href="#" class="head_btn02">ボタン02</a>
        </div>
      </div>
      <div class="menu">
        <a href="php" class="menu_btn">メニュー01</a>
        <a href="#" class="menu_btn">メニュー02</a>
        <a href="#" class="menu_btn">メニュー03</a>
      </div>
    </div>
  </header>
  <div class="mv">
    <img src="mv.png" alt="">
  </div>
    <div class="message-box">
        <h1>お問い合わせ</h1>
        <p>送信完了しました。</p>
        <style>
          h1 {
              text-align: center;
              margin-top: 60px;
            }
          p {
              text-align: center;
              color: blue;
              margin-top: 40px;
              font-weight:bold;
              font-size:25px;
            }
        </style>
    </div>
    <section class="sec_btn">
      <div class="wrapper">
        <div class="btn_content">
          <div class="btn_01">
            <div class="btn_left">
              <h2>こちらから購入ください</h2>
              <a href="#" class="btn01">ネットショップ</a>
            </div>
          </div>
          <div class="btn_02">
            <div class="btn_right">
              <h2>お気軽に問い合わせください</h2>
              <a href="#" class="btn02">お問い合わせ</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <div class="address">
      <h3>ここには会社名が入ります</h3>
        <p>住所が入ります<br></p>
        <p>03-1234-5678<br></p>
        <p>営業時間:9:00~18:00</p>
    </div>
    <div class="link">
      <div class="wrapper">
        <ul class="link_01">
          <li><a href="#">リンク01</a></li>
          <li><a href="#">リンク02</a></li>
          <li><a href="#">リンク03</a></li>
          <li><a href="#">リンク04</a></li>
          <li><a href="#">リンク05</a></li>
          <li><a href="#">リンク06</a></li>
        </ul>
        <ul class="link_02">
          <li><a href="#">リンク07</a></li>
        </ul>
      </div>
    </div>
    <p class="footer">ここには会社名が入ります©Copyright.</p>
  </footer>
</body>
</html>