# Priority array
Позволяет хранить элементы с приоритетом, как SPLPriorityQueue, и так же, как и Queue возвращать элементы 
в зависимости от приоритета. Но, в отличии, от SPLPriorityQueue, не удаляет элементы при обращении к ним.

## Как использовать
Установка:
```bash
php composer.phar require dicomresearch/priority-array
```

Использование:
```php
$array = new PriorityArray();
$array->append($value, $priority);

foreach ($array as $element) {
    echo $element;
}
```