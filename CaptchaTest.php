<?php
require_once "Captcha.php";

class CaptchaTest extends PHPUnit_Framework_TestCase
{

    public function test1111ShouldReturn_One_On_LeftOperand()
    {
        $captcha = new Captcha(1,1,1,1);
        $this->assertEquals("One", $captcha->getLeftOperand());
    }

    public function test1211ShouldReturn_Two_On_LeftOperand()
    {
        $captcha = new Captcha(1,2,1,1);
        $this->assertEquals("Two", $captcha->getLeftOperand());
    }

    public function test1311ShouldReturn_Three_On_LeftOperand()
    {
        $captcha = new Captcha(1,3,1,1);
        $this->assertEquals("Three", $captcha->getLeftOperand());
    }

    public function test1111ShouldReturn_1_On_RightOperand()
    {
        $captcha = new Captcha(1,1,1,1);
        $this->assertSame('1', $captcha->getRightOperand());
    }

    public function test1117ShouldReturn_7_On_RightOperand()
    {
        $captcha = new Captcha(1,1,1,7);
        $this->assertSame('7', $captcha->getRightOperand());
    }

    public function test1111ShouldReturn_Plus_On_Operator()
    {
        $captcha = new Captcha(1,1,1,1);
        $this->assertSame('+', $captcha->getOperator());
    }

    public function test1121ShouldReturn_Multiply_On_Operator()
    {
        $captcha = new Captcha(1,1,2,1);
        $this->assertSame('*', $captcha->getOperator());
    }

    public function test1131ShouldReturn_Minus_On_Operator()
    {
        $captcha = new Captcha(1,1,3,1);
        $this->assertSame('-', $captcha->getOperator());
    }

    public function test1111ShouldReturn_2_On_PlusResult()
    {
        $captcha = new Captcha(1,1,1,1);
        $this->assertSame('2', $captcha->getResult());
    }

    public function test1211ShouldReturn_3_On_PlusResult()
    {
        $captcha = new Captcha(1,2,1,1);
        $this->assertSame('3', $captcha->getResult());
    }

    public function test1221ShouldReturn_2_On_MultiplyResult()
    {
        $captcha = new Captcha(1,2,2,1);
        $this->assertSame('2', $captcha->getResult());
    }

    public function test1531ShouldReturn_4_On_MinusResult()
    {
        $captcha = new Captcha(1,5,3,1);
        $this->assertSame('4', $captcha->getResult());
    }

    public function test2111ShouldReturn_One_On_RightOperand()
    {
        $captcha = new Captcha(2,1,1,1);
        $this->assertSame("One", $captcha->getRightOperand());
    }

    public function test2115ShouldReturn_Five_On_RightOperand()
    {
        $captcha = new Captcha(2,1,1,5);
        $this->assertSame("Five", $captcha->getRightOperand());
    }

    public function test2415ShouldReturn_Four_On_LeftOperand()
    {
        $captcha = new Captcha(2,4,1,5);
        $this->assertSame("4", $captcha->getLeftOperand());
    }

    /**
     * @expectedException MinusErrorException
     */
    public function test1132ShouldThrowException()
    {
        $captcha = new Captcha(1,1,3,2);
        $captcha->getResult();
    }

}


?>
