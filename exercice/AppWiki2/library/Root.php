<?

class Root
{
  function __construct()
  {
    if(!isset($_GET['c']) || !isset($_GET['a']))
    {
      echo 'Stop !';
    }
    else
    {
      $class      = trim($_GET['c']);
      $action     = trim($_GET['a']);
      $controller = $class.'Controller';
      if (is_file('controller/'.$controller.'.php'))
      {
        include_once ('controller/'.$controller.'.php');
        if (method_exists($controller,$action))
        {
          $controller::$action();
        }
        else
        {
          echo 'non non non';
        }
      }
    }
  }
}