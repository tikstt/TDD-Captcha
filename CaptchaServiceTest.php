<?php
require_once 'Random.php';
require_once 'CaptchaService.php';
class CaptchaServiceTest extends PHPUnit_Framework_TestCase
{
	function testGetCaptcha()
	{	
		$stub = $this->getMock("Random");
		$stub->expects($this->any())
			 ->method('getPattern')
			 ->will($this->returnValue('1'));	 

		$stub->expects($this->any())
			 ->method('getOperand')
			 ->will($this->returnValue('1'));

		$stub->expects($this->any())
			 ->method('getOperator')
			 ->will($this->returnValue('1'));

		$captchaService = new CaptchaService();
        $captchaService->setRandom($stub);
		$result = $captchaService->getCaptcha();
		$this->assertEquals('One',$result->getLeftOperand());
		$this->assertEquals('1',$result->getRightOperand());
		$this->assertEquals('+',$result->getOperator());
		$this->assertEquals('2',$result->getResult());
		
		/*
		$captchaService = new CaptchaService();
		$stub = $this->getMock("CaptchaService");
		$stub->expects($this->any())
			 ->method('getCaptcha')
			 ->will($this->returnValue('foo'));
		 $this->assertEquals('foo', $stub->getCaptcha());	 
		//$captchaService->getCaptcha();
		*/
	}
}
?>