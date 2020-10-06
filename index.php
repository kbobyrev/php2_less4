<?php

require_once  'models/items.php';

require_once 'Twig/Autoloader.php';

Twig_Autoloader::register();

try {
  // указывае где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('templates');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $template = $twig->loadTemplate('index.tmpl');
  
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
    if (isset($_GET['limit'])){
        $limit = $_GET['limit']; 
    } else {
        $limit = 5;
    }
    $goods =getAllProductsWithLimits($limit);
    $content = $template->render(array(
    'goods'=> $goods,
    'count'=>count($goods)
  ));
  echo $content;
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>