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

		return $htmlReturn;
	}

	private static function getHTML(\stdClass $obj){

		$html  = "<div class='inner cover'>\n";
		$html .= "\t<h1 class='cover-heading'>".$obj->title."</h1>\n";
		$html .= "\t<p class='lead'>\n";
		$html .= "\t\t". $obj->descricao ."\n";
		$html .= "\t</p>\n";

		if ($obj->linkImage != ''){
			$html .= "\t<center>\n";
			$html .= "\t\t<img src='".$obj->linkImage."' class='img-responsive' height='-1' width='-1'>\n";
			$html .= "\t</center>\n";
		}

		$html .= "</div>";

		return $html;

	}

	private static function getHTMLSearch($obj){

		$html = "<div class='inner cover'>\n";
		$html .= "\t<h1 class='cover-heading'>Pesquisar</h1>\n";

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
}