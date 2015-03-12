<?php

namespace Tdd\StringToArrayConverter;

class StringToArrayConverter
{
	private $input;

	public function setInput($input)
	{
		 $this->input = $input;
	}

	public function getInput()
	{
		return $this->input;
	}
}