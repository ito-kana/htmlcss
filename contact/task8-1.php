<?php
$errorMessages = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $errorMessages[] = "お名前を入力してください。";
    }
    if (empty($_POST["furigana"])) {
        $errorMessages[] = "フリガナを入力してください。";
    }
    if (empty($_POST["email"])) {
        $errorMessages[] = "メールアドレスを入力してください。";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errorMessages[] = "正しいメールアドレスを入力してください。";
      }
    if (empty($_POST["phone"])) {
        $errorMessages[] = "電話番号を入力してください。";
    } elseif (!preg_match("/^\d{10,11}$/", $_POST["phone"])) {
        $errorMessages[] = "電話番号は10桁または11桁で入力してください。";
      }
    if (empty($_POST["inquiry_type"])) {
        $errorMessages[] = "お問い合わせ項目を選択してください。";
      }
    if (empty($_POST["message"])) {
        $errorMessages[] = "お問い合わせ内容を入力してください。";
      }
    if (empty($_POST["acceptance-714"])) {
        $errorMessages[] = "個人情報保護方針に同意してください。";
      }
  }
  // フォームが送信された場合の処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $furigana = htmlspecialchars($_POST['furigana']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $inquiry_type = htmlspecialchars($_POST['inquiry_type']);
  $message = htmlspecialchars($_POST['message']);
  $acceptance = isset($_POST['acceptance-714']) ? 1 : 0;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>確認ページ</title>
  <link rel="stylesheet" href="stylesheet.css">
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
  <main>
    <div class="Form">
      <div class="wrapper">
        <div class="form_top">
          <h1>お問い合わせ</h1>
          <p>お問い合わせや業務内容に関するご質問は、電話またはこちらのお問い合わせフォームより承っております。<br>後ほど担当者よりご連絡させていただきます</p>
          <br>
          <?php
            if (!empty($errorMessages)) {
              echo '<div style="color: red;">';
              foreach ($errorMessages as $message) {
              echo '<p>' . htmlspecialchars($message) . '</p>';
              }
              echo '</div>';
             }
          ?>
        </div>
  
    <form action="<?php if(empty($errorMessages)){echo 'task9-1.php';}?>" method="post">
        <div class="Form-Item">
            <p class="Form-Item-Label">お名前<span class="Form-Item-Label-Required">必須</span></p>
            <input type="text" class="Form-Item-Input" name="name" placeholder="山田太郎" value="<?= $name; ?>">
        </div>
        <div class="Form-Item">
            <p class="Form-Item-Label">フリガナ<span class="Form-Item-Label-Required">必須</span></p>
            <input type="text" class="Form-Item-Input" name="furigana" placeholder="ヤマダタロウ" value="<?=$furigana; ?>">
        </div>
        <div class="Form-Item">
            <p class="Form-Item-Label">メールアドレス<span class="Form-Item-Label-Required">必須</span></p>
            <input type="text" class="Form-Item-Input" name="email" placeholder="info@fast-creademy.jp" value="<?=$email; ?>">
        </div>
        <div class="Form-Item">
            <p class="Form-Item-Label">電話番号<span class="Form-Item-Label-Required">必須</span></p>
            <input type="text" class="Form-Item-Input" name="phone" placeholder="000-0000-0000" value="<?= $phone; ?>">
        </div>
        <div class="Form-Item">
            <p class="Form-Item-Label">お問い合わせ項目<span class="Form-Item-Label-Required">必須</span></p>
            <div class="cp_ipselect cp_sl01">
                <select name="inquiry_type" required>
                    <option value="" hidden>選択してください</option>
                    <option value="1" <?php echo (isset($_POST['inquiry_type']) && $_POST['inquiry_type'] == '1') ? 'selected' : ''; ?>>１</option>
                    <option value="2" <?php echo (isset($_POST['inquiry_type']) && $_POST['inquiry_type'] == '2') ? 'selected' : ''; ?>>２</option>
                </select>
            </div>
        </div>
        <div class="Form-Item">
            <p class="Form-Item-Label isMsg">お問い合わせ内容<span class="Form-Item-Label-Required">必須</span></p>
            <textarea class="Form-Item-Textarea" name="message" placeholder="こちらにお問い合わせ内容をご記入ください"><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
        </div>
        <div class="box_check">
            <p class="Form-Item-Label isMsg">個人情報保護方針<span class="Form-Item-Label-Required">必須</span></p>
            <label>
                <input type="checkbox" name="acceptance-714" value="1" <?php echo isset($_POST['acceptance-714']) ? 'checked' : ''; ?>> <a href="#" class="check">個人情報保護方針<span class="dli-external-link"><span></span></span></a>に同意します。
            </label>
        </div>
        <input type="submit" class="Form-Btn" value="
        <?php if(empty($errorMessages)){echo'送信';} else {echo'確認';}?>
        ">
    </form>
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