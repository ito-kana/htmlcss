<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
<?php
class Staff {
    protected $name;
    protected $age;
    protected $sex;
    protected $id;

    public function __construct($name, $age, $sex) {
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
        $this->number(); 
    }

    public function number() {
        static $a = 1;
        $this->id = sprintf("S%04d", $a);
        $a++;
    }

    public function show() {
       printf("(%s) %s %d歳 %s性<br>", $this->id, $this->name, $this->age, $this->sex);
    }
}

class PartStaff extends Staff {
    private $part;

    public function __construct($name, $age, $sex, $part) {
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
        $this->part = $part;
        $this->id = sprintf("P%04d", $this->PartId());
    }

    private function PartId() {
        static $b = 1;
        return $b++;
    }

    public function show() {
       printf("(%s) %s %d歳 %s性 時給：%d円<br>", $this->id, $this->name, $this->age, $this->sex, $this->part);
    }
}

$staff[1] = new Staff("佐藤 一郎", 31, "男");
$staff[2] = new Staff("山田 花子", 25, "女");
$staff[3] = new Staff("鈴木 次郎", 27, "男");
$staff[4] = new PartStaff("田中 友子", 24, "女", 900);
$staff[5] = new Staff("中村 三郎", 27, "男");

// $staff[1]->show();
// $staff[2]->show();  
// $staff[3]->show();  
// $staff[4]->show();
// $staff[5]->show();

foreach($staff as $a){
    $a->show() ;
}
?>
</body>
</html>
