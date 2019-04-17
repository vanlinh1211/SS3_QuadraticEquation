<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    input[type=text]{
        background: lightgray;
        font-size: 16px;
    }
</style>
<form method="post">
    <input type="text" size="10" name="a" placeholder="Enter number"/>
    <input type="text" size="10" name="b" placeholder="Enter number"/>
    <input type="text" size="10" name="c" placeholder="Enter number"/>
    <input type="submit" value="Calculate" id="calculate"/>
</form>
<body>
<?php

class QuadraticEquation
{
    private $a;
    private $b;
    private $c;

    function __construct($_a, $_b, $_c)
    {
        $this->a = $_a;
        $this->b = $_b;
        $this->c = $_c;
    }

    function getA()
    {
        return $this->a;
    }

    function getB()
    {
        return $this->b;
    }

    function getC()
    {
        return $this->c;
    }

    function getDiscriminant()
    {
        $delta = ($this->b * $this->b) - (4 * $this->a * $this->c);
        return $delta;
    }

    function getRoot1(){
         $r1 = - $this->b - pow($this->getDiscriminant(), 0.5) / 2 * $this->a;
         return $r1;
    }
    function getRoot2(){
        $r2 = - $this->b + pow($this->getDiscriminant(), 0.5) / 2 * $this->a;
        return $r2;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $quadratic = new QuadraticEquation($a,$b,$c);
    if (!empty($a) && !empty($b) && !empty($c)){
        if ($quadratic->getDiscriminant() > 0){
            echo "root1: ".$quadratic->getRoot1()."<br>";
            echo "root2: ".$quadratic->getRoot2();
        }
        if ($quadratic->getDiscriminant() == 0){
            echo "The equation has one roots" . "<br>";
            echo "root: ".$quadratic->getRoot2();
        }
        if ($quadratic->getDiscriminant() < 0){
            echo "The equation has no roots";
        }
    }else{
        echo "Enter your number";
    }
}

?>
</body>
</html>