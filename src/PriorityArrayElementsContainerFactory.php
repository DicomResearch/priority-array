<?php


namespace dicom\priorityArray;

/**
 * Class PriorityArrayElementsContainerFactory
 *
 * Определяет внутренне хранение элементов в массиве
 *
 * @package dicom\priorityArray
 */
class PriorityArrayElementsContainerFactory
{
    const PRIORITY_KEY_NAME = 'priority';

    const VALUE_KEY_NAME = 'value';

    public function createElement($value, $priority = 0)
    {
        $element = [
            static::PRIORITY_KEY_NAME => $priority,
            static::VALUE_KEY_NAME => $value
        ];

        return $element;
    }
}