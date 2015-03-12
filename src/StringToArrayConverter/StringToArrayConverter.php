<?php

namespace Tdd\StringToArrayConverter;

class StringToArrayConverter
{
	/**
	 * The input of the converter
	 *
	 * @var string
	 */
	private $input;

	public function setInput($input)
	{
		if(!$this->isInputValid($input))
		{
			throw new \InvalidArgumentException('The input is invalid');
		}

		$this->input = $input;
	}

	public function isInputValid($input)
	{
		return is_string($input);
	}

	public function getInput()
	{
		return $this->input;
	}

	/**
	 * The converted version of the input.
	 *
	 * @return array
	 */
	public function getArray()
	{
		if ($this->input == '')
		{
			return array();
		}

		return explode(',', $this->input);
	}
}