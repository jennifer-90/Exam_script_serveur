<?php


/* * * * * * * * * * * * * * *  * * * * * * * * * * * * * *  * * * * * * * *

** Premier essai sur index.php avant de mettre ce code dans une fonction : **

if(!empty($_GET['page'])){
    if(is_array(FILES_EXTENSIONS)){
        foreach (FILES_EXTENSIONS as $key){
            $file_name= $_GET['page'].$key;
        }

        if(file_exists($file_name)){
            include_once $file_name;
        }
    }
}
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
 * @param $string
 * @return void
 */
function extension($string):void {

    if (is_array(FILES_EXTENSIONS)) {
        foreach (FILES_EXTENSIONS as $key) {
            $file_name = $string . $key;


            if (file_exists($file_name)) {
                include_once $file_name;
            }
        }
    }
}