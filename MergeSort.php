<?php
/*
 * Сортировка слиянием - это алгоритм сортировки,
 * который использует метод "разделяй и властвуй".
 * Он разбивает список на две части, затем каждую из этих частей сортирует рекурсивно,
 * а затем объединяет отсортированные части в один отсортированный список.
 */

function merge_sort($arr) {
    $length = count($arr);
    if ($length <= 1) {
        return $arr;
    } else {
        $mid = floor($length / 2);
        $left = array_slice($arr, 0, $mid);
        $right = array_slice($arr, $mid);
        $left = merge_sort($left);
        $right = merge_sort($right);
        return merge($left, $right);
    }
}

function merge($left, $right) {
    $result = array();
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] <= $right[0]) {
            array_push($result, array_shift($left));
        } else {
            array_push($result, array_shift($right));
        }
    }
    while (count($left) > 0) {
        array_push($result, array_shift($left));
    }
    while (count($right) > 0) {
        array_push($result, array_shift($right));
    }
    return $result;
}

// Пример использования
$my_array = array(3, 0, 2, 5, -1, 4, 1);
echo "Исходный массив: ";
echo implode(", ", $my_array) . PHP_EOL;

$sorted_array = merge_sort($my_array);
echo "Отсортированный массив: ";
echo implode(", ", $sorted_array);

/*
 * В этом примере мы определяем функцию merge_sort,
 * которая принимает массив чисел в качестве параметра и возвращает отсортированный массив.
 * В функции мы проверяем, является ли длина массива меньше или равной 1,
 * и если это так, мы просто возвращаем массив.
 *
 * Если длина массива больше 1,
 * мы находим середину массива и разделяем его на две части с помощью функции array_slice(),
 * затем рекурсивно вызываем функцию merge_sort() для обеих половинок.
 * Затем мы объединяем отсортированные половинки с помощью функции merge(),
 * которая сравнивает элементы из двух списков и помещает их в правильном порядке в новый список.
 * Наконец, мы возвращаем отсортированный список.
 */
