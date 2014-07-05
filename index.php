
<!DOCTYPE html>
<html lang="en">
  <?php require_once './includes/head.php'; ?>

  <body>

    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <?php require_once './includes/menu.php'; ?>

          <?php 

            function IncludeFilesOfRoute($_path, $_arRoutes){
              
              $filePath = './includes/';

              if (!file_exists($filePath.$_path.'.php') && ($_path !== '')){
                require_once $filePath.'404.php';
              } else {

                foreach ($_arRoutes as $key => $value) {

                  if ($_path == $value){
                    require_once $filePath. $_path.'.php';
                    break;
                  } elseif ($_path == ''){
                    require_once $filePath.'home.php';
                    break;
                  }
                }
              }
            }

            $arRoutes = ['home', 'empresa', 'produtos', 'servicos', 'contato'];
            // $filePath = './includes/';

            $route = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            $path = explode('/', $route['path'])[1];

            IncludeFilesOfRoute($path, $arRoutes);


/*
            if (!file_exists($filePath.$path.'.php') && ($path !== '')){
              require_once './includes/404.php';
            } else {

              foreach ($arRoutes as $key => $value) {

                if ($path == $value){
                  require_once $filePath. $path.'.php';
                  break;
                } elseif ($path == ''){
                  require_once $filePath.'home.php';
                  break;
                }
              }
            }*/

          ?>

          <?php require_once './includes/footer.php'; ?>

        </div>
      </div>
    </div>

    <?php require_once './includes/jsFilesEnd.php'; ?>
  </body>
</html>
