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
			array(''),
			array('tghtrehrav32f'),
			array('fsfsdfsdfsf \n'),
			array('g4z5z356h3#'),
			array('%fsdfsdf')
		);
	}

	/**
	 * @dataProvider   getDataForInvalidInput
	 *
	 * @expectedException \InvalidArgumentException
	 */
	public function testExceptionIsThrownInCaseOfInvalidInput($invalidInput)
	{
		$this->converter->setInput($invalidInput);
	}

	public function getDataForInvalidInput()
	{
		return array(
			array(10),
			array(3.2),
			array(true),
			array(array()),
			array(array('input' => 'teszt')),
			array(new \stdClass()),
		);
	}

	public function testWithEmptyInput()
	{
		$this->converter->setInput('');

		$this->assertEquals(array(), $this->converter->getArray());
	}

	public function testWithOneLineString()
	{
		$input = "a, b, c";
		$this->converter->setInput($input);

		$this->assertEquals(array('a', 'b', 'c'), $this->converter->getArray());
	}
}
 