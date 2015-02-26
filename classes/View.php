<?php


class View
{
    public $items;
    public $item;


    public function  viewAll()
    {
        foreach ($this->items as $item):
            echo "<h3>" . $item->time . "</h3>";
            echo $item->title . "<br>";
        endforeach;

    }

    public function  viewOne()
    {
        echo "<h3>" . $this->item->time . "</h3>";

        echo $this->item->title . "<br>";

    }
}
