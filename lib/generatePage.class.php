<?php 

/**
* Classe responsavel por gerar as paginas
*/
class generatePage
{

	public static function getPage(\PDO $pdo, $route){

		$obj = null;
		$htmlReturn = null;

		if (isset($_POST['search'])){
			$sql = "SELECT * FROM paginas WHERE descricao like :descricao AND NOT nome = '404'";

			$paramSearch = '%'.$_POST['search'].'%';

			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':descricao', $paramSearch);

			$stmt->execute();

			if ($obj = $stmt->fetchAll(PDO::FETCH_OBJ)){
				echo self::getHTMLSearch($obj);
			} else {
				echo "<h1 class='cover-heading'>A Pesquisa não encontrou resultados</h1>";
			}

		} else {

			if ($route === "login"){
				echo self::getLoginPage();
			} else {

				$sql = "SELECT * FROM paginas WHERE nome = :nome";

				$stmt = $pdo->prepare($sql);
				$stmt->bindValue(':nome', $route);

				if ($stmt->execute()){

					if ($obj = $stmt->fetch(PDO::FETCH_OBJ)){
						$htmlReturn = self::getHTML($obj);
					} else {

						header('HTTP/1.0 404 Not Found');

						$sql = "SELECT * FROM paginas WHERE nome = '404'";

						$stmt = $pdo->prepare($sql);
						$stmt->execute();
						$obj = $stmt->fetch(PDO::FETCH_OBJ);

						$htmlReturn = self::getHTML($obj);
					}
				}
			}
		}

		return $htmlReturn;
	}

	private static function getLoginPage(){
		session_start();
		unset($_SESSION['user']);
		unset($_SESSION['logado']);		

		$getError = (isset($_GET['error'])) ? $_GET['error'] : '';

		$htmlReturn = '
			<h2>Menu administrativo</h2>
			<p id="pReturn" style="color: red; font-weight: bold; font-size: 30px">'.$getError.'</p>

			<form class="form-horizontal" method="post" action="./admin">
				<div class="control-group">
					<label class="control-label" for="user">Login</label>
					<div class="controls">
						<input name="user" style="color: black;" type="text" placeholder="Digite o seu usuario..." />
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="pass">Password</label>
					<div class="controls">
						<input name="pass" style="color: black;" type="password" placeholder="Digite a sua senha..." />
					</div>
				</div>
				<br />
				<div class="control-group">
					<div class="controls">
						<button class="btn btn-info" type="submit">Acessar</button>
					</div>
				</div>
			</form>
		';

		return $htmlReturn;
	}

	private static function getHTML(\stdClass $obj){

		$html = "\t". $obj->descricao ."\n";

		return $html;
	}

	private static function getHTMLSearch($obj){

		$html = "<div class='inner cover'>\n";
		$html .= "\t<h1 class='cover-heading'>Resultado Pesquisa</h1>\n";

		foreach ($obj as $key => $value) {
			$html .= "\t<p class='lead'>\n";
			$html .= "\t\t<p>Página: <a href='".$value->nome."'>".$value->nome." </a></p>";
			$html .= $value->descricao ."\n";
			$html .= "\t</p>\n";
		}

		$html .= "</div>";

		return $html;
	}	

	public static function getReturnContato(){

		$html =  '<div class="alert alert-success" role="alert">Dados enviados com Sucesso !</div>';
		$html .= "Nome: ";
		$html .= (isset($_POST['nome'])) ? $_POST['nome'] : '';
		$html .= "<br />";
		$html .= "Email: ";
		$html .= (isset($_POST['email'])) ? $_POST['email'] : '';
		$html .= "<br />";
		$html .= "Assunto: ";
		$html .= (isset($_POST['assunto'])) ? $_POST['assunto'] : '';
		$html .= "<br />";
		$html .= "Mensagem: ";
		$html .= (isset($_POST['msg'])) ? $_POST['msg'] : '';
		$html .= "<br />";

		return $html;

	}

	public static function getMenu(\PDO $pdo){

		$htmlReturn = '<h1> Menu Administrativo do Site</h1>';

		$sql = "SELECT nome FROM paginas WHERE NOT nome = 'login'";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();

		if ($obj = $stmt->fetchAll(PDO::FETCH_OBJ)){
			foreach ($obj as $key => $value) {
				$htmlReturn .= '<p><a href="#'.$value->nome.'" style="margin: 10px;" id="'.$value->nome.'" class="btn btn-primary btn-large">'.$value->nome.'</a></p>';
			}
		}
		
		return $htmlReturn;
	}

	public static function getContentPage(\PDO $pdo, $page){

		$contentPage = null;

		$sql = "SELECT descricao FROM paginas where nome = :nome";
		$stmt = $pdo->prepare($sql);

		$stmt->bindParam(':nome', $page);
		$stmt->execute();
		if($obj = $stmt->fetch(PDO::FETCH_OBJ))
			$contentPage = ($obj->descricao) ? $obj->descricao : '';

		return $contentPage;
	}
}
