<?php

namespace Tdd\StringToArrayConverter;

class StringToArrayConverter
{
	/**
	 * The input of the converter.
	 *
	 * @var string
	 */
	private $input;

	/**
	 * The output of the converter.
	 *
	 * @var array
	 */
	private $output;

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

		$explodedByNewLines = explode("\n", $this->input);
		if (count($explodedByNewLines) == 1)
		{
			$this->output = explode(',', $explodedByNewLines[0]);
		}
		else
		{
			foreach ($explodedByNewLines as $explodedByNewLine)
			{
				$explodedByCommas = explode(',', $explodedByNewLine);
				$this->output[]   = $explodedByCommas;
			}
		}

		return $this->output;
	}

}