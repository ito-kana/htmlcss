<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP練習</title>
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <?php
  $a = array('name' => '鉛筆','price' => '100');
  $b = array('name' => '消しゴム','price' => '200');
  $c = array('name' => '定規','price' => '300');
  ?>
  <table>
    <tr>
      <th>商品</th>
      <th>価格</th>
      <th>税込価格</th>
      <th>1Dzの価格</th>
    </tr>
    <tr>
      <td><?= $a[name]; ?></td>
      <td><?= $a[price]; ?>円</td>
      <td><?= $a[price]*1.1; ?>円</td>
      <td><?= $a[price]*1.1*12; ?>円</td>
    </tr>
    <tr>
      <td><?= $b[name]; ?></td>
      <td><?= $b[price]; ?>円</td>
      <td><?= $b[price]*1.1; ?>円</td>
      <td><?= $b[price]*1.1*12; ?>円</td>
    </tr>
  </table>
  <p>消費税は10％です。</p>
</body>
</html>