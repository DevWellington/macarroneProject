<?php 
  require_once "lib/route.class.php";

  $route = Route::getRoute();
 ?>
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">SadTech</h3>
              
              <ul class="nav masthead-nav">
                <li class="<?php echo ($route == "home") ? 'active' : ''; ?>"><a href="./">Home</a></li>
                <li class="<?php echo ($route == "empresa") ? 'active' : ''; ?>"><a href="./empresa">Empresa</a></li>
                <li class="<?php echo ($route == "produtos") ? 'active' : ''; ?>"><a href="./produtos">Produtos</a></li>
                <li class="<?php echo ($route == "servicos") ? 'active' : ''; ?>"><a href="./servicos">Serviços</a></li>
                <li class="<?php echo ($route == "contato") ? 'active' : ''; ?>"><a href="./contato">Contato</a></li>
              </ul>

            </div>
          </div>
