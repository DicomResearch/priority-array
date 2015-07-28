<?php


namespace dicom\priorityArray;


class PriorityArrayIterator extends \ArrayIterator
{

    /**
     * @var PriorityArrayElementsContainerFactory
     */
    private $priorityArrayContainerFactory;

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Construct an ArrayIterator
     * @link http://php.net/manual/en/arrayiterator.construct.php
     * @param array $array The array or object to be iterated on.
     * @param int $flags Flags to control the behaviour of the ArrayObject object.
     * @see ArrayObject::setFlags()
     */
    public function __construct($array = array(), $flags = 0)
    {
        parent::__construct($array, $flags);
        $this->priorityArrayContainerFactory = new PriorityArrayElementsContainerFactory();
    }


    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Get value for an offset
     * @link http://php.net/manual/en/arrayiterator.offsetget.php
     * @param string $index <p>
     * The offset to get the value from.
     * </p>
     * @return mixed The value at offset <i>index</i>.
     */
    public function offsetGet($index)
    {
        $element = parent::offsetGet($index);
        return $element[PriorityArrayElementsContainerFactory::VALUE_KEY_NAME];
    }

    /**
     * Добавить элемент с приоритетом
     *
     * @param mixed $value
     * @param int $priority
     */
    public function append($value, $priority = 0)
    {
        $element = $this->priorityArrayContainerFactory->createElement($value, $priority);
        parent::append($element);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return current array entry
     * @link http://php.net/manual/en/arrayiterator.current.php
     * @return mixed The current array entry.
     */
    public function current()
    {
        return parent::current()[PriorityArrayElementsContainerFactory::VALUE_KEY_NAME];
    }


}