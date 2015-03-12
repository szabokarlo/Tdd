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

	/**
	 * @dataProvider   getDataForOneLineString
	 */
	public function testWithOneLineString($input, $expectedOutput)
	{
		$this->converter->setInput($input);

		$this->assertEquals($expectedOutput, $this->converter->getArray());
	}

	public function getDataForOneLineString()
	{
		return array(
			array('a,b,c', array('a', 'b', 'c')),
			array('a.b.c', array('a.b.c')),
			array('a;b;c', array('a;b;c')),
			array('a|b|c', array('a|b|c')),
			array('100,982,444,990,1', array('100', '982', '444', '990', '1')),
			array('Mark,Anthony,marka@lib.de', array('Mark', 'Anthony', 'marka@lib.de')),
		);
	}

	public function testWithMultiLineInputWithoutAnySpecialPrefix()
	{
		$input          = '211,22,35' . "\n" . '10,20,33';
		$expectedOutput = array(
			array('211', '22', '35'),
			array('10', '20', '33')
		);

		$this->converter->setInput($input);

		$this->assertEquals($expectedOutput, $this->converter->getArray());
	}
}
 