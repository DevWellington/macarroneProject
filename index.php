
<!DOCTYPE html>
<html lang="en">
  <?php require_once './includes/head.php'; ?>

  <body>

    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <?php require_once './includes/menu.php'; ?>

          <?php 

            $filePath = './includes/';

            require_once "lib/route.class.php";
            require_once "lib/connection.class.php";
            require_once "lib/generatePage.class.php";

            $pdo = Connection::getConnection();
            $route = Route::getRoute();

            $page = generatePage::getPage($pdo, $route);

            echo $page;

          ?>

          <?php if ($route === 'contato'): ?>
              <div class="input-group">

              <form action="#" method="post" >
                <input type="text" class="form-control" name='nome' placeholder="Nome">
                <input type="text" class="form-control" name='email' placeholder="Email">
                <input type="text" class="form-control" name='assunto' placeholder="Assunto">
                <textarea class="form-control" name="msg" rows="2">Mensagem</textarea>

              <input style="color: black" type="submit" value="Enviar" />
              </form>
            </div>
          <?php endif; 

              if (isset($_POST['nome']) or isset($_POST['email']) or isset($_POST['assunto'])){
                echo generatePage::getReturnContato();
              }
          ?>

          <?php require_once './includes/footer.php'; ?>


        </div>
      </div>
    </div>

    <?php require_once './includes/jsFilesEnd.php'; ?>
  </body>
</html>
