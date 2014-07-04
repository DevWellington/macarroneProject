
<!DOCTYPE html>
<html lang="en">
  <?php require_once './includes/head.php'; ?>

  <body>

    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <?php require_once './includes/menu.php'; ?>

          <?php 

            $route = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

            switch ($route['path']) {
              case '/empresa':
                require_once './includes'.$route['path'].'.php';
                break;
              case '/produtos':
                require_once './includes'.$route['path'].'.php';
                break;
              case '/servicos':
                require_once './includes'.$route['path'].'.php';
                break;
              case '/contato':
                require_once './includes'.$route['path'].'.php';
                break;
              default:
                require_once './includes/home.php';
                break;
            }

          ?>

          <?php require_once './includes/footer.php'; ?>

        </div>
      </div>
    </div>

    <?php require_once './includes/jsFilesEnd.php'; ?>
  </body>
</html>
