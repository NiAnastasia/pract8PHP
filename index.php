<?php
/* 1.	Если при вычислении площади она <= 0, то вбрасывайте исключение о не допустимых значениях сторон.*/



interface iFigure{
	public function printString();
}

interface iRectangle{
	public function areaRectangle();
}

interface iSquare{
	public function areaSquare($a);
}

class Figure implements iFigure
{
	public $sideA;
	public function __construct($a)
 	{
 		$this->sideA=$a;
 	}

	public function printString(){
		echo "Сторона a = ".$this->sideA;
	}
}

class Rectangle extends Figure implements iRectangle
 {
 	public $sideA;
 	public $sideB;
 	public function __construct($a, $b)
 	{

 		$this->sideA=$a;
 		$this->sideB=$b;
 		
 	}

 	public function areaRectangle()
 	{
		 $area = $this->sideB*$this->sideA;
		 if($area <= 0){
			throw new Exception("Недопустимые значения сторон!");
		 }
 		echo $area;
 	}


 }

 class Square extends Rectangle implements iSquare
 {
 	 public function __construct($a)
	{
		$this->sideA=$a;
	}
 	public function areaSquare($a)
 	{
		 $this->sideA=$a;
		 $area = $this->sideA*$this->sideA;
		 if($area <= 0){
			 throw new Exception("Недопустимые значения сторон!");
			}
			
		echo $area;
 	}
 }
 
 $c = new Rectangle(2,4);
 $a = new Rectangle(0,1);
 try{
	 $c->areaRectangle();
	 $a->areaRectangle();
 }
 catch(Exception $e){
	echo "<br>";
	echo "Выброшено исключение: ".  $e->getMessage();
 }