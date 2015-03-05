<?php

/**
 * Class NewsModel
 * $property $id;
 * $property $time;
 * $property $title;
 */
class NewsModel
    extends AbstractModel
{
    protected static $table = 'new';

    public function displayAddForm($path)
    {
        include __DIR__.'/../'.$path;
    }

     public  function setGoodTame()
     {
      $goodT = $this->data{'time'};
         return date('l jS \of F Y h:i:s A', $goodT);
     }

}
