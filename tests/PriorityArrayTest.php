<?php

namespace dicom\priorityArrayTest;

use dicom\priorityArray\PriorityArray;

class PriorityArrayTest extends \PHPUnit_Framework_TestCase
{
    public function testInputArray()
    {
        return [
            //value, priority
            [0, 0],
            [7, 7],
            [5, 5],
            [2, 2],
        ];
    }

    public function testElementAddAndGet()
    {
        $inputValue = 23;
        $inputPriority =4;

        $array = new PriorityArray();
        $array->append($inputValue, $inputPriority);

        $valueFromArray = $array->offsetGet(0);

        $this->assertEquals($inputValue, $valueFromArray);
    }

    /**
     */
    public function testForeach()
    {
        $array = new PriorityArray();

        foreach ($this->testInputArray() as $element)
        {
            $array->append($element[0], $element[1]);
        }

        $outputArray = [];
        foreach ($array as $value)
        {
            $outputArray[] = $value;
        }

        $this->assertEquals([0, 2, 5, 7], $outputArray);
    }
}
