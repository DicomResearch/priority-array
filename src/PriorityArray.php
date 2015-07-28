<?php

namespace dicom\priorityArray;

/**
 * Class PriorityArray
 *
 * Позволяет задавать приоритет для элементов массива
 *
 * Возвращаться элементы будут с учетом их приоритета от меньшего к большему
 *
 * @package dicom\priorityArray
 */
class PriorityArray extends \ArrayObject
{

    /**
     * @var PriorityArrayElementsContainerFactory
     */
    private $priorityArrayContainerFactory;

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Construct a new array object
     * @link http://php.net/manual/en/arrayobject.construct.php
     * @param array|object $input The input parameter accepts an array or an Object.
     * @param int $flags Flags to control the behaviour of the ArrayObject object.
     * @param string $iterator_class Specify the class that will be used for iteration of the ArrayObject object. ArrayIterator is the default class used.
     *
     */
    public function __construct($input = [], $flags = 0, $iterator_class = '\dicom\priorityArray\PriorityArrayIterator')
    {
        parent::__construct($input, $flags, $iterator_class);
        $this->priorityArrayContainerFactory = new PriorityArrayElementsContainerFactory();
    }


    /**
     * добавить к массиву элемент с приоритетом
     *
     * @param mixed $value
     * @param int $priority
     */
    public function append($value, $priority = 0)
    {
        $element = $this->priorityArrayContainerFactory->createElement($value, $priority);
        parent::append($element);
        $this->sortByPriority();
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Returns the value at the specified index
     * @link http://php.net/manual/en/arrayobject.offsetget.php
     * @param mixed $index <p>
     * The index with the value.
     * </p>
     * @return mixed The value at the specified index or false.
     */
    public function offsetGet($index)
    {
        $element = parent::offsetGet($index);
        return $element[PriorityArrayElementsContainerFactory::VALUE_KEY_NAME];
    }


    /**
     * отсортировать массив по Приоритету
     */
    private function sortByPriority()
    {
        $this->uasort([PriorityElementsArrayComparator::class, 'compareByPriority']);
    }


}