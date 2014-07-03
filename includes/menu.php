<?php 
  $_GET['page'] = (!isset($_GET['page'])) ? 'home' : $_GET['page'];


?>
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">SadTech</h3>
              
              <ul class="nav masthead-nav">
                <li class="<?php echo ($_GET['page'] == "home") ? 'active' : ''; ?>"><a href="./?page=home">Home</a></li>
                <li class="<?php echo ($_GET['page'] == "empresa") ? 'active' : ''; ?>"><a href="./?page=empresa">Empresa</a></li>
                <li class="<?php echo ($_GET['page'] == "produtos") ? 'active' : ''; ?>"><a href="./?page=produtos">Produtos</a></li>
                <li class="<?php echo ($_GET['page'] == "servicos") ? 'active' : ''; ?>"><a href="./?page=servicos">Serviços</a></li>
                <li class="<?php echo ($_GET['page'] == "contato") ? 'active' : ''; ?>"><a href="./?page=contato">Contato</a></li>
              </ul>

            </div>
          </div>
