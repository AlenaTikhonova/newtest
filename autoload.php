<?php

function __autoload($class){
     if (file_exists(__DIR__.'/Controllers/'.$class.'.php')){
         require __DIR__.'/Controllers/'.$class.'.php';
     }elseif (file_exists(__DIR__.'/models/'.$class.'.php')){
         require __DIR__.'/models/'.$class.'.php';
     }elseif (file_exists(__DIR__.'/classes/'.$class.'.php')){
         require __DIR__.'/classes/'.$class.'.php';}

}