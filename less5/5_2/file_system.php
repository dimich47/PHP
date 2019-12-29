<?php

if(!is_dir("newdir"))
mkdir("newdir");
if(!is_dir("newdir/newdir2"))
mkdir("newdir/newdir2");
if(!is_dir("newdir/newdir2/dir3"))
    mkdir("newdir/newdir2/dir3");
if(!is_file('newdir/newdir2/file2.txt')) {
    $file = fopen('newdir/newdir2/file2.txt', "w");
    fclose($file);
}
if(!is_file('newdir/file.txt')) {
    $file = fopen('newdir/file.txt', "w");
    fclose($file);
}
if(!is_file('newdir/newdir2/dir3/file3.txt')) {
    $file = fopen('newdir/newdir2/dir3/file3.txt', "w");
    fclose($file);
}

function delete_dir($name_dir){
    if(is_dir($name_dir))    // если директория существует
    {
        echo 'Текущая директория '.$name_dir.'<br>';
        if($dh = opendir($name_dir)) // передача дискриптера ресурсов
        {
            while (($data = readdir($dh)) !== false) // поква не считали все из директории
            {
                if(filetype($name_dir .'/'. $data) == 'file') { // если это файл, то удалить его
                    echo "удалить  файл ". $data. '<br>';
                    unlink($name_dir. '/'. $data);
                }
                // если директория
                else if((filetype($name_dir . '/' .$data) == 'dir') && (substr($data,0,1)!='.'))
                {
                   delete_dir($name_dir . '/' . $data);
                }
//            }
            closedir($dh);
        }
        echo "удалить  папку ". $name_dir .'<br>';
        rmdir($name_dir);         // удалить текущую директорию
    }
}
delete_dir("newdir");
