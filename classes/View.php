<?php


class View
{
    protected $data = [];


    public function __set($key,$value){
        $this->data[$key]=$value;
    }
    public function  __get($key){
        $this->data[$key];
    }

    public function  display($path)

    {
        foreach ($this->data as $key => $value){
             $$key = $value;}



        include __DIR__ . '/../view/' . $path;

    }



}
