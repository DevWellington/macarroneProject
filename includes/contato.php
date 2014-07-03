
		  <div class="inner cover">
            <h1 class="cover-heading">Contato</h1>
           	<div class="input-group">

           		<form action="#" method="post" >
	           		<input type="text" class="form-control" name='nome' placeholder="Nome">
	           		<input type="text" class="form-control" name='email' placeholder="Email">
	           		<input type="text" class="form-control" name='assunto' placeholder="Assunto">
	           		<textarea class="form-control" name="msg" rows="2">Mensagem</textarea>

       				<input style="color: black" type="submit" value="Enviar" />
           		</form>
           	</div>

           	<?php 
           		if (isset($_POST['nome']) or isset($_POST['email']) or isset($_POST['assunto'])){

           			echo '<div class="alert alert-success" role="alert">Dados enviados com Sucesso !</div>';

           			echo "Nome: ";
       				echo (isset($_POST['nome'])) ? $_POST['nome'] : '';
       				echo "<br />";

           			echo "Email: ";
       				echo (isset($_POST['email'])) ? $_POST['email'] : '';
       				echo "<br />";

           			echo "Assunto: ";
       				echo (isset($_POST['assunto'])) ? $_POST['assunto'] : '';
       				echo "<br />";

           			echo "Mensagem: ";
       				echo (isset($_POST['msg'])) ? $_POST['msg'] : '';
       				echo "<br />";
           		} 

           	?>

          </div>