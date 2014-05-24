<?php
require_once 'Captcha.php';
class CaptchaService{
	var $random;
	public function getCaptcha()
	{
		return new Captcha($this->random->getPattern(),
					$this->random->getOperand(),
					$this->random->getOperator(),
					$this->random->getOperand());
	}
	
	public function setRandom($random)
    {
        $this->random = $random;
    }
}


?>