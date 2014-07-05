
<!DOCTYPE html>
<html lang="en">
  <?php require_once './includes/head.php'; ?>

  <body>

    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <?php require_once './includes/menu.php'; ?>

          <?php 


            $arRoutes = ['empresa', 'produtos', 'servicos', 'contato'];

            $route = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            $path = explode('/', $route['path'])[1];

            $includeFilesOfRoute = function ($x) use ($path){

              $filePath = './includes/';
              
              if (!file_exists($filePath.$path.'.php') && ($path !== '')){
                require_once $filePath.'404.php';
              } else {              

                if ($x == $path){
                  require_once $filePath. $path.'.php';
                } elseif ($path == ''){
                  require_once $filePath.'home.php';
                }

              }
            };

            array_walk($arRoutes, $includeFilesOfRoute);

          ?>

          <?php require_once './includes/footer.php'; ?>

        </div>
      </div>
    </div>

    <?php require_once './includes/jsFilesEnd.php'; ?>
  </body>
</html>
