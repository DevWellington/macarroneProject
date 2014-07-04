<?php 
  $_GET['page'] = (!isset($_GET['page'])) ? 'home' : $_GET['page'];


?>
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">SadTech</h3>
              
              <ul class="nav masthead-nav">
                <li class="<?php echo ($_SERVER['REQUEST_URI'] == "/") ? 'active' : ''; ?>"><a href="./">Home</a></li>
                <li class="<?php echo ($_SERVER['REQUEST_URI'] == "/empresa") ? 'active' : ''; ?>"><a href="./empresa">Empresa</a></li>
                <li class="<?php echo ($_SERVER['REQUEST_URI'] == "/produtos") ? 'active' : ''; ?>"><a href="./produtos">Produtos</a></li>
                <li class="<?php echo ($_SERVER['REQUEST_URI'] == "/servicos") ? 'active' : ''; ?>"><a href="./servicos">Serviços</a></li>
                <li class="<?php echo ($_SERVER['REQUEST_URI'] == "/contato") ? 'active' : ''; ?>"><a href="./contato">Contato</a></li>
              </ul>

            </div>
          </div>
