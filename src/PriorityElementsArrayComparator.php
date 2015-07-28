<?php


namespace dicom\priorityArray;

/**
 * Class PriorityElementsArrayComparator
 *
 * Сравнивает (по приоритетам) 2 элементамассива PriorityArray
 *
 * @package dicom\priorityArray
 */
class PriorityElementsArrayComparator
{
    /**
     * Возвращает 0, если элементы равны
     * -1, если первый элемент меньше второго
     * 1, если первый элемент больше второго
     *
     * @param array $a
     * @param array $b
     * @return int
     */
    public static function compareByPriority(array $a, array $b)
    {
        $priorityA = $a[PriorityArrayElementsContainerFactory::PRIORITY_KEY_NAME];
        $priorityB = $b[PriorityArrayElementsContainerFactory::PRIORITY_KEY_NAME];

        if ($priorityA == $priorityB) {
            return 0;
        }
        return ($priorityA < $priorityB) ? -1 : 1;
    }
}