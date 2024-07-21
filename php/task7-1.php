<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP練習</title>
</head>
<body>
<?php
class Staff {
    private $name;
    private $age;
    private $sex;
    private $id;

    public function __construct($name, $age, $sex) {
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
        $this->number(); 
    }

    private function number() {
        static $a = 1;
        $this->id = sprintf("S%04d", $a);
        $a++;
    }

    public function show() {
        printf("(%s) %s %d歳 %s性<br>", $this->id, $this->name, $this->age, $this->sex);
    }
}

$staff1 = new Staff("佐藤 一郎", 31, "男");
$staff2 = new Staff("山田 花子", 25, "女");
$staff3 = new Staff("鈴木 次郎", 27, "男");

$staff1->show();
$staff2->show();  
$staff3->show();  

?>
</body>
</html>