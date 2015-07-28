<?php


namespace dicom\priorityArrayTest;


use dicom\priorityArray\PriorityArrayElementsContainerFactory;
use dicom\priorityArray\PriorityElementsArrayComparator;

class PriorityElementsArrayComparatorTest extends \PHPUnit_Framework_TestCase
{
    public function dataProvider()
    {
        return [
        //  $a, $b, result
            [[PriorityArrayElementsContainerFactory::PRIORITY_KEY_NAME => 0], [PriorityArrayElementsContainerFactory::PRIORITY_KEY_NAME => 0], 0],
            [[PriorityArrayElementsContainerFactory::PRIORITY_KEY_NAME => 5], [PriorityArrayElementsContainerFactory::PRIORITY_KEY_NAME => 7], -1],
            [[PriorityArrayElementsContainerFactory::PRIORITY_KEY_NAME => 7], [PriorityArrayElementsContainerFactory::PRIORITY_KEY_NAME => 5], 1],
        ];
    }

    /**
     * @param $a
     * @param $b
     * @param $expectedResult
     *
     * @dataProvider dataProvider
     */
    public function testCompare($a, $b, $expectedResult)
    {
        $compareResult = PriorityElementsArrayComparator::compareByPriority($a, $b);

        $this->assertEquals($expectedResult, $compareResult);
    }
}
