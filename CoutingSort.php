<?php
/*
 * Сортировка подсчётом - это алгоритм сортировки,
 * который подходит для сортировки массива чисел, когда известен диапазон возможных значений.
 * Алгоритм использует вспомогательный массив и считает количество
 * каждого возможного значения в исходном массиве. Затем на основе этих подсчетов мы создаем отсортированный массив.
 */

function counting_sort($arr, $min, $max) {
    $count = array_fill($min, $max - $min + 1, 0);
    foreach ($arr as $num) {
        $count[$num]++;
    }
    $result = array();
    foreach (range($min, $max) as $num) {
        for ($i = 0; $i < $count[$num]; $i++) {
            $result[] = $num;
        }
    }
    return $result;
}

$arr = array(3, 2, 4, 1, 3);
$sorted_arr = counting_sort($arr, 1, 4);
print_r($sorted_arr);

/*
 * В данном примере мы создаем массив $count,
 * который содержит количество каждого возможного значения в исходном массиве.
 * Мы проходим по исходному массиву, увеличивая счетчик каждого значения.
 * Затем мы создаем пустой массив $result и проходим по всем возможным
 * значениям в порядке возрастания, добавляя их в результирующий массив столько раз,
 * сколько раз они встречались в исходном массиве,
 * используя значения из массива $count в качестве указателей на позиции в исходном массиве.
 */