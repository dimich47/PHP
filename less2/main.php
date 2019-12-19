<?php

echo 'Задача 1', '<br>';

$n = 1;
while($n<11) {
    for ($i = 1; $i < 11; $i++)
    {
        //var_dump($i*$n);
        echo $i*$n, ' ';

    }
    $n++;
    echo ('<br>');
}


echo '<br>', 'Задача 2', '<br>';

$x = 2;
$y = 12; // если спортсмен пробежал эти километры, то мы выводим этот день

for($i=2;$i<100;$i++)
{
    $x = $x*0.1+$x;
    if($x>=$y)
    {
        echo 'Спортсмен пробежал ', $y, ' км через ', $i, ' дней';
        break;
    }
}
echo ('<br>');
echo '<br>', 'Задача 3', '<br>';

$num=800;
$i=0;
while($num>50)
{
    $num = $num/2;
    $i+=1;
}
echo 'Результат деления = ', $num, ' на ', $i, '-й итерации';

echo ('<br>');
echo '<br>', 'Задача 4', '<br>';

//      4.1
$title = 'C++';
$pageCount = '136';
$book = [
    'title' => 'PHP 7',
    'pageCount' => 342
];
extract($book, EXTR_OVERWRITE);
echo $title, ' -', $pageCount, '<br>' ;

//      4.2
$arr1 = [1,2,3];
$arr2 = [
            'id' =>1,
            'login' => 'user'
];
echo 'В массиве arr1 - ', count($arr1), ' элемента(тов)', '<br>';
echo 'В массиве arr2 - ', count($arr2), ' элемента(тов)', '<br>';
echo ('<br>');

//      4.3
if(in_array("7", $arr1))
echo 'В массиве arr1 значение 7 есть', '<br>';
else
echo 'В массиве arr1 значение 7 отсуствует', '<br>';
echo 'В массиве arr2 значение user находится в ячейке ', array_search(user, $arr2),  '<br>';
echo ('<br>');

//      4.4
echo ('Замена содержимого массива1 содержимым массива 3'),'<br>';
$arr3 = [4,5,6];
echo 'Был массив: ';
var_dump( $arr1);
$arr1 = array_replace($arr1, $arr3);
echo  '<br>', 'Стал массив: ';
var_dump( $arr1);
echo ('<br>');
echo ('<br>');
//      4.5
echo 'Cоздание массива, содержащего название переменнных и их значение';
$id = '123';
$login = 'Ivan';
echo ('<br>');
$arr4 = compact('id',"login");
echo 'Новый массив: ';
var_dump( $arr4);
echo ('<br>');

//      5
echo '<br>', 'Задача 5', '<br>', 'Сортировка массива $myarr по  \'price\'','<br>';
$myArr = [
    '01'=> [
        'price' => 10,
        'count' => 2
    ],
    '02'=> [
        'price' => 5,
        'count' => 5
    ],
    '03'=> [
        'price' => 8,
        'count' => 15
    ],
    '04'=> [
        'price' => 12,
        'count' => 4
    ],
    '05'=> [
        'price' => 8,
        'count' => 44
    ],
];

// сортировка по 'price'
// создаем массив 'newarr', в который переместим из 'myarr' все значения 'price'
// затем через функцию 'array_multisort' отсортируем 'myarr' по  'newarr' (вначале сортируется по возрастанию массив 'newarr')
$newArr = [];
foreach ($myArr as $key=> $data)
{
    $newArr[$key] = $data['price'];
}
array_multisort($newArr, $myArr);
//var_dump($myArr);
foreach ($myArr as  $data)
{
    echo 'price= ', $data['price'], '  count= ';
    echo $data['count'], '<br>';
}

