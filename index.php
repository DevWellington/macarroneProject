
<!DOCTYPE html>
<html lang="en">
  <?php require_once './includes/head.php'; ?>

  <body>

    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <?php require_once './includes/menu.php'; ?>

          <?php 

            $get = $_GET['page'];

            switch ($get) {
              case 'home':
                require_once './includes/home.php';
                break;
              case 'empresa':
                require_once './includes/empresa.php';
                break;
              case 'produtos':
                require_once './includes/produtos.php';
                break;
              case 'servicos':
                require_once './includes/servicos.php';
                break;
              case 'contato':
                require_once './includes/contato.php';
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
