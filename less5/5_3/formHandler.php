<?php
$server = $_SERVER;
$request_method = $server['REQUEST_METHOD'];
if ($request_method == 'POST') {
    $post = $_POST['url'];
    if($post === "")
    echo "Ошибка! Полученные данные пустые.";
    else{
        $post=trim($post);

        if(!filter_var($post,  FILTER_VALIDATE_URL))
            echo "Ошибка! Полученные данные не ссылка.";
        else{
                 echo "Полученные данные - ".$post."<br>";

                if(!is_dir("newdir"))                               // если директория не существует
                {
                    mkdir("newdir");
                    $file = fopen('newdir/file.txt', "w");   // если файл не существует
                    fwrite($file, $post);
                    fclose($file);
                }
                else{
                    $data = file_get_contents('newdir/file.txt');   // чтение из файла
                    $string = explode("\n",$data);                  // разбиваем строку на массив

                    if(urlHandler($string, $post))                           // если ссылки нет в файле, записываем её
                    {
                        file_put_contents('newdir/file.txt',($post.":".myCrc32($string, $post)."\r\n"),FILE_APPEND);
                        echo 'Ссылка записана.';
                    }

                }

            }
        }
}
function urlHandler($string, $data)                             // проверка на существование принятой ссылки в файле
{
    foreach ($string as $url)
    {
        $url = substr($url,7);                              // убираем httml://
        $str = explode(":",$url);

        if ($str[0] === substr($data,7))            // если ссылки совпадают - выводим короткую ссылку
        {
            echo 'Ссылка существует! Короткая ссылка - '.$str[1];
            return FALSE;
        }
    }
    return TRUE;
}

function myCrc32($string, $data)                                // создание короткой ссылки и проверка на существование её у других
{
    $crc = crc32($data);

    foreach ($string as $url)
    {
        $url = substr($url,7);                              // убираем httml://
        $str = explode(":",$url);

        $str[1] = substr($str[1],0,10);

        if($str[1] == $crc) {                                   // если хэш существует - пересчитать crc
            //echo 'Хэш равна!';
            return myCrc32($string,$crc);
        }
    }
    return $crc;
}