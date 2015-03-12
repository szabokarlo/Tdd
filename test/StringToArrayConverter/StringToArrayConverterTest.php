<?php

namespace Tdd\Test\StringToArrayConverter;

use Tdd\StringToArrayConverter\StringToArrayConverter;

class StringToArrayConverterTest extends \PHPUnit_Framework_TestCase
{
	private $converter;

	public function setUp()
	{
		$this->converter = new StringToArrayConverter();
	}

	public function testIfInputIsSet()
	{
		$input = 'tghtrehrav32f';
		$this->converter->setInput($input);

		$this->assertEquals($input, $this->converter->getInput());
	}
}
 