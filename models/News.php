<?php

/**
 * Class NewsModel
 * $property $id;
 * $property $time;
 * $property $title;
 */

namespace Application\models;
use Application\Classes\AbstractModel;

class News
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
