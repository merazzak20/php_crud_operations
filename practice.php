<?php

echo "<h1>Hello!</h1>";
$name = "Abdur Razzak";
echo "I am $name <br>";

$age = 10;
if($age >= 18){
    echo "You are adult <br>";
}else{
    echo"You are not adult <br>";
}

$a =10;
$b=20;
echo"sum:" .($a+$b)."<br>";

$day = "Friday";
switch($day){
    case "Monday": 
        echo "Start the week";
        break;
    case "Friday":
        echo "Almost Weekend";
        break;
    default:
        echo "It's another day";
}

class Calculator{
    public $name;
    public function say(){
        echo "<br> hello, I am $this->name";
    }
    public function add($c,$d){
        echo "<br> Sum: ". ($c+$d);
    }

    public function sub($c,$d){
        echo "<br> Sub: ". ($c-$d);
    }
}

$calc = new Calculator;
$calc -> name="Ab";
$calc -> say();
$calc -> add(3,5);
$calc -> sub(8,5);
    
?>