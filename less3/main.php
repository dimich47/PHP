<?php
echo 'Задача 1', '<br>';;
$str1 = 'this_is_string';
echo 'Было - ',$str1, '<br>';
$arr1=explode("_", $str1); // разбиваем строку на массив по разделителю '_'
for($i=0;$i<count($arr1);$i++)
{
    $arr1[$i] = ucfirst($arr1[$i]); // меняем регистр первого символа на верхний
}
$str1 = '';
echo 'Стало - ', implode($str1, $arr1),'<br>'; // создаем из массива строку

echo '<br>','Задача 2', '<br>';;
//Дана строка, необхлдимо выделить имя файла
$name= 'C\OpenServer\testtext\mytext.txt';
echo 'Строка: ', $name, '<br>';
if(!substr_compare($name, '.txt',-4)) // если мы получили ссылку на текстовый файл
{
    // поиск последнего вхождения '\' и вывод полученной подстроки.
    // substr - используем чтобы убрать '\' и '.txt'
    echo 'Имя текстового файла - ', substr(strrchr($name,'\\'),1, strlen(strrchr($name,'\\'))-5), '<br>';;
}

echo '<br>','Задача 3', '<br>';;
// Дано два текста. Определить степень совпадения текстов (придумать алгоритм определения соответствия, используя 5 бальную шкалу)
$str1 = 'Это строка текста';
$str2 = 'cтрока это';
$perc1;
$perc2;

echo 'Функция similar_text', '<br>';
similar_text($str1,$str2,$perc1);
echo 'Степень похожести строк - \' ', $str1, '\' и - \'',$str2, ' \'', '<br>', 'Этап1 - ', $perc1, ' %', '<br>';
similar_text($str2,$str1,$perc2);
echo 'Этап2 - ', $perc2, ' %', '<br>';
echo 'Итого: ', round(($perc2+$perc2)/40), ' балла(ов)', '<br>';

echo '<br>','Задача 4', '<br>';
// написать фукцию сортировки массива по возрастанию чисел.
$arrOld = [13,55,100];
$arrSum = [];

function SumArrElements($arr){                               // функция подсчета суммы чисел массива
    $sum = 0;
    for($i=0;$i<strlen($arr);$i++)
    {
        $sum += (int)substr($arr, $i, 1);
    }
    return $sum;
}

function PrintData($str,$arr)                           // функция вывода результатов
{
    echo '<br>', $str;
    foreach ($arr as  $arr1)
    {
        echo $arr1, ' ';
    }
}

foreach ($arrOld as $key => $arr)                       // получение массива с суммой чисел
{
    $arrSum[$key] = SumArrElements($arr);
}

PrintData('Исходный массив: ', $arrOld);
array_multisort($arrSum, $arrOld);      // сортировка массивов
PrintData('Исходный массив после сортиовки по сумме чисел: ', $arrOld);
PrintData('Сумма чисел сортированного массива: ', $arrSum);
