<?php

namespace Tdd\Test\StringToArrayConverter;

use Tdd\StringToArrayConverter\StringToArrayConverter;

class StringToArrayConverterTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * An instance of the StringToArrayConverter object.
	 *
	 * @var StringToArrayConverter
	 */
	private $converter;

	/**
	 * Makes initialization for the test environment.
	 *
	 * @return void
	 */
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
 