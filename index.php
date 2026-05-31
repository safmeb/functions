<?php
declare(strict_types=1);

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
];

$items = [];

function getOperationNumber (array $operations):int 
{
    echo "Выберете операцию для выполнения:". PHP_EOL;
    echo implode(separator: PHP_EOL, array: $operations) . PHP_EOL . '>_';
    do { 
    
      $result = (trim(fgets(STDIN)));
      echo 'вы ввели значение: '. $result . PHP_EOL;

        if(!array_key_exists(key:$result, array:$operations))
             {
         echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
             }
    
        } while (!array_key_exists(key:$result, array:$operations)); 
   
    return intval($result); 
  }

function addProducts(array &$items):void
  { 
    if (sizeof($items) === 0) {
     echo 'Текущий список покупок пуст' . PHP_EOL;
     } 
     else { echo 'Текущий список покупок: ' . PHP_EOL;
            echo implode("\n", $items) . "\n";
             }
      echo "Введение название товара для добавления в список: \n> ";
            $itemName = trim(fgets(STDIN));
            $items[] = $itemName;
   }

function deleteProducts(array &$items): void
    {
        echo 'Текущий список покупок:' . PHP_EOL;
            echo 'Список покупок: ' . PHP_EOL;
            echo implode("\n", $items) . "\n";
            echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
            $itemName = trim(fgets(STDIN));

            if (in_array($itemName, $items, true) !== false) {
                while (($key = array_search($itemName, $items, true)) !== false) {
                    unset($items[$key]);
                }
            }
    }

function printProductList(array &$items):void
    {
    if (sizeof($items) === 0) {
     echo 'Текущий список покупок пуст' . PHP_EOL;
     } 
     else{     
       echo 'Ваш список покупок: ' . PHP_EOL;
            echo implode(PHP_EOL, $items) . PHP_EOL;
            echo 'Всего ' . count($items) . ' позиций. '. PHP_EOL;
            echo 'Нажмите enter для продолжения';
            fgets(STDIN);
       }
    }

do {

   $operationNumber = getOperationNumber(operations:$operations);


    echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;

    switch ($operationNumber) {
        case OPERATION_ADD:
            addProducts(items: $items);
            echo $operationNumber . PHP_EOL ;
            break;

        case OPERATION_DELETE:
            deleteProducts (items:$items);
             echo "2".$operationNumber;
            break;

        case OPERATION_PRINT:
            printProductList (items: $items);
             echo "3".$operationNumber;
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber > 0); 
   
    
echo 'Программа завершена' ; 
exit (1);
