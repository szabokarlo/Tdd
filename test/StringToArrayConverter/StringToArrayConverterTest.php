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

	/**
	 * @dataProvider   getDataForInputIsSet
	 */
	public function testIfInputIsSet($input)
	{
		$this->converter->setInput($input);

		$this->assertEquals($input, $this->converter->getInput());
	}

	public function getDataForInputIsSet()
	{
		return array(
			array('tghtrehrav32f'),
			array('fsfsdfsdfsf \n'),
			array('g4z5z356h3#'),
			array('%fsdfsdf')
		);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testExceptionIsThrownInCaseOfInvalidInput()
	{
		$invalidInput = 10;

		$this->converter->setInput($invalidInput);
	}

}
 