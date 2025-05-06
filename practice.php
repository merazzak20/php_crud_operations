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


// class & function
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

// Constructor
class person{
    public $name,$age;

    function __construct($n1,$n2){
        $this->name=$n1;
        $this->age=$n2;
    }

    public function show(){
        echo "<br> I am $this->name. I am $this->age years old.";
    }
}

$p1 = new person("Abdur Razzak",25);
$p1 ->show();

// Destructor
class Demo {
    function __construct() {
        echo "<br> Object created<br>";
    }

    function __destruct() {
        echo "Object destroyed";
    }
}

$obj = new Demo();
    
?>