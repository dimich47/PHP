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
$arr1 = [1,2,3];
$arr2 = [
            'id' =>1,
            'login' => 'user'
];
echo 'В массиве arr1 - ', count($arr1), ' элемента(тов)', '<br>';
echo 'В массиве arr2 - ', count($arr2), ' элемента(тов)', '<br>';

echo 'В массиве arr1 значение 7 находится в ячейке ', array_search(7, $arr1),  '<br>';
echo 'В массиве arr2 значение user находится в ячейке ', array_search(user, $arr2),  '<br>';
echo ('Замена содержимого массива1 содержимым массива 3');
$arr3 = [4,5,6];
$arr1 = array_replace($arr1, $arr3);
var_dump( $arr1);

$id = '123';
$login = 'Ivan';
echo ('<br>');
$arr4 = compact('id',"login");
echo 'Новый массив ';
var_dump( $arr4);

echo ('<br>');
echo '<br>', 'Задача 5', '<br>';
