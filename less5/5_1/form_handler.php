<?php
// данные из формы передаются в массив $_POST
//$post = $_POST;
//var_dump($post);
// данные о загружаемых файлах приходят в массив $_FILES
$files = $_FILES;
var_dump($files);

foreach($files['picture']['name'] as $key => $name) {
    // имя файла
    $file_name = $name;
    // расширение файла
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    //var_dump($ext);


    // проверка на пустые данные
    if ($file_name  != '') {
//перед перемещениенм нужно проверить тип и размер!!!
        if ($ext == 'jpg' || $ext == 'jpeg') {
            if ((int)$files['picture']['size'][$key] <= 5000000) {
                //изменение имени файла
                $new_name = md5($file_name);
                $full_name = $new_name . '.' . $ext;
// перемещение файла из временной папки
// move_uploaded_file(временная папка)
// затем куда
                $tmp_name = $files['picture']['tmp_name'][$key];
                if (move_uploaded_file($tmp_name, "img/$full_name")) {
                    echo 'Файл ' . $file_name . ' успешно загружен и перемещен в папку - "img"' . '<br>';
                }
            } else {
                echo 'Ошибка! Размер файла ' . $file_name . ' превышает 5 Мбайт.' . '<br>';
            }
        }
        else {
            echo 'Ошибка! Формат файла ' . $file_name . ' не поддерживается.' . '<br>';
        }
    }
    else {
        echo 'Ошибка! Выберите файлы для загрузки.';
    }
}


