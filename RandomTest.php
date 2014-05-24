<?php
require_once 'Random.php';
class RandomTest extends PHPUnit_Framework_TestCase
{
	function testRandomPattern()
	{
		$random = new random();
		$this->assertContains($random->getPattern(),array(1,2));
	}
	
	function testRandomOperand()
	{
		$random = new random();
		$this->assertContains($random->getOperand(),array(1,2,3));
	}
	
		function testRandomOperator()
	{
		$random = new random();
		$this->assertContains($random->getOperator(),array(1,2,3,4,5,6,7,8,9));
	}
	
}
?>