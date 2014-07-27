<?php 

require_once './lib/connection.class.php';

$conn = Connection::getConnection();

// fixture file
echo "<pre>";
echo str_repeat('#', 40).PHP_EOL;
echo "--     Inicio da Fixture - Paginas    --".PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;

echo "--       Criando table: paginas       --".PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;
echo '#'.str_repeat(' ', 38).'#'.PHP_EOL;

$dbname = Connection::getConfig()['dbname'];
$sql = "CREATE TABLE IF NOT EXISTS $dbname.paginas (
			idpaginas INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
			nome VARCHAR(100) NULL ,
			descricao LONGTEXT NULL
		)
";


$stmt = $conn->prepare($sql);
if ($stmt->execute())
	echo "--       *Criou table: paginas       --".PHP_EOL;
else
	echo "***Error".PHP_EOL;

echo '#'.str_repeat(' ', 38).'#'.PHP_EOL;
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
$sql = "INSERT INTO paginas (nome, descricao) VALUES 
			('home', 'SadTech is a corporation started by Alec Sadler and one of the founding members of the Corporate Congress.'),
			('empresa', 'SadTech builds advanced technology such as the Cellular Memory Review liquid chip technology, the CPS Suit and the Quantum Device.'),
			('produtos', 'Cellular Memory Review, or CMR, is a technology which interfaces with the user allowing them to create a heads-up display over their own eyesight and access databases.'),
			('servicos', 'The CPS Suit is an advanced clothing material worn by CPS protectors. - Changing color - Invisibility - Electric shock - Hacking ATMs'),
			('contato', 'Contato'),
			('404', '<h1>Page not found</h1>Error Code: 404'),
			('login', null)
";

$stmt = $conn->prepare($sql);
if ($stmt->execute())
	echo "--    *Dados inseridos com Sucesso!   --".PHP_EOL;
else
	echo "***Error".PHP_EOL;

echo '#'.str_repeat(' ', 38).'#'.PHP_EOL;

echo str_repeat('#', 40).PHP_EOL;


// Users Table


echo "--       Criando table: users         --".PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;
echo '#'.str_repeat(' ', 38).'#'.PHP_EOL;

$sql = "CREATE TABLE IF NOT EXISTS users (
			id int(11) PRIMARY KEY NOT NULL,
			login varchar(50) UNIQUE KEY NOT NULL,
			pass varchar(255) NOT NULL,
			dateCreated datetime NOT NULL
		)
";

$stmt = $conn->prepare($sql);
if ($stmt->execute())
	echo "--       *Criou table: users         --".PHP_EOL;
else
	echo "***Error".PHP_EOL;

echo '#'.str_repeat(' ', 38).'#'.PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;


echo "--      Limpando table: users         --".PHP_EOL;


// Clean table
$sql = "TRUNCATE users";

echo str_repeat('#', 40).PHP_EOL;
echo '#'.str_repeat(' ', 38).'#'.PHP_EOL;

$stmt = $conn->prepare($sql);
if ($stmt->execute())
	echo "--       *Limpou table: users         --".PHP_EOL;
else
	echo "***Error".PHP_EOL;


echo '#'.str_repeat(' ', 38).'#'.PHP_EOL;

echo str_repeat('#', 40).PHP_EOL;
echo "--  Preparando dados para insercao    --".PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;

echo '#'.str_repeat(' ', 38).'#'.PHP_EOL;

$pass = password_hash('admin', PASSWORD_DEFAULT);
$sql = "INSERT INTO users (login, pass, dateCreated) 
		VALUES ('admin', :pass, now())
";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':pass', $pass);
if ($stmt->execute())
	echo "--    *Dados inseridos com Sucesso!   --".PHP_EOL;
else
	echo "***Error".PHP_EOL;




echo '#'.str_repeat(' ', 38).'#'.PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;


echo str_repeat('#', 40).PHP_EOL;
echo "--      FIM da Fixture - Paginas      --".PHP_EOL;
echo str_repeat('#', 40).PHP_EOL;
