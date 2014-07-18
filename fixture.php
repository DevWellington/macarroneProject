<?php 

require_once './lib/connection.class.php';

$conn = Connection::getConnection();

// fixture file
echo "<pre>";
echo str_repeat('#', 40).PHP_EOL;
echo "--     Inicio da Fixture - Paginas    --".PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;

echo "--      Limpando table: paginas       --".PHP_EOL;


// Clean table
$sql = "TRUNCATE paginas";

echo str_repeat('#', 40).PHP_EOL;
echo '#'.str_repeat(' ', 38).'#'.PHP_EOL;

$stmt = $conn->prepare($sql);
if ($stmt->execute())
	echo "--       *Limpou table: paginas       --".PHP_EOL;
else
	echo "***Error".PHP_EOL;


echo '#'.str_repeat(' ', 38).'#'.PHP_EOL;

echo str_repeat('#', 40).PHP_EOL;
echo "--  Preparando dados para insercao    --".PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;

echo '#'.str_repeat(' ', 38).'#'.PHP_EOL;



// Insert data
$sql = "INSERT INTO paginas (nome, title, descricao, linkImage) VALUES 
			('home', 'Seja bem vindo', 'SadTech is a corporation started by Alec Sadler and one of the founding members of the Corporate Congress.', null),
			('empresa', 'SadTech', 'SadTech builds advanced technology such as the Cellular Memory Review liquid chip technology, the CPS Suit and the Quantum Device.', 'imgs/File-SadTech.jpg'),
			('produtos', 'Produtos', 'Cellular Memory Review, or CMR, is a technology which interfaces with the user allowing them to create a heads-up display over their own eyesight and access databases.', 'imgs/cmr.jpg'),
			('servicos', 'Servico', 'The CPS Suit is an advanced clothing material worn by CPS protectors. - Changing color - Invisibility - Electric shock - Hacking ATMs', 'imgs/cps.jpg'),
			('contato', 'Contato', null, null),
			('404', 'Page not found', 'Error Code: 404', null)
";

$stmt = $conn->prepare($sql);
if ($stmt->execute())
	echo "--    *Dados inseridos com Sucesso!   --".PHP_EOL;
else
	echo "***Error".PHP_EOL;



echo '#'.str_repeat(' ', 38).'#'.PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;



echo "--      FIM da Fixture - Paginas      --".PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;
