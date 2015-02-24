<?php

require_once __DIR__ . '/models/news.php';

$items = News::getAll();
include __DIR__ . '/view/index.php';

//var_dump($items);