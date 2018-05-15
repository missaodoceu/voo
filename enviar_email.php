<?php
header("Content-type: text/html; charset=utf-8");
session_start();
ob_start();
	include_once 'conexao.php';
    include ('pdf/mpdf.php');

    $result_usuario = "SELECT p.nome, p.data_nascimento, p.peso, u.nome as responsavel FROM usuarios u join passageiros p on p.idUsuario  WHERE u.id='".$_SESSION['id']."' AND p.idUsuario ='".$_SESSION['id']."'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    for($i=0;$i<$row=mysqli_fetch_assoc($resultado_usuario);$i++){
        $nome.$i = $row['nome'];
        $dataNascimento.$i = $row['data_nascimento'];
        $pesoPax.$i = $row['peso'];
        $responsavel.$i = $row['responsavel'];
    }


$pagina =
    "<html>
			<body>
				<h1>Relatório de lead cadastrado</h1>
				<ul>
					<li>cesar@celke.com.br</li>
					<li>kelly@celke.com.br</li>
					<li>atendimento@celke.com.br</li>
				</ul>
				<h4>http://www.celke.com.br</h5>
			</body>
		</html>
		";

$arquivo = "Cadastro01.pdf";

$mpdf = new mPDF();
$mpdf->WriteHTML($pagina);

$mpdf->Output($arquivo, 'I');

// I - Abre no navegador
// F - Salva o arquivo no servido
// D - Salva o arquivo no computador do usuário


	/*include_once 'email.php';

    $titulo = "Teste de envio de e-mail";
    $corpo = "Este é um teste de envio de email utilizando php etc";

    enviarEmail($titulo,$corpo);*/
    /*$result_usuario = "SELECT p.nome, p.data_nascimento, p.peso, u.nome as responsavel FROM passageiros p, usuarios u WHERE p.idUsuario = u.id and  idUsuario='". $_SESSION['id'] ."'";

    $resultado_usuario = mysqli_query($conn, $result_usuario);
    while($row = mysqli_fetch_assoc($resultado_usuario)){
        echo 'Nome Passageiro: '. $row['nome']."<br>";
        echo 'Data Nascimento: '. $row['data_nascimento']."<br>";
        echo 'Peso Pax: '. $row['peso']."<br>";
        echo 'Responsavel Pelo Voo: '. $row['responsavel']."<br>";
        echo '--------------------------------------------------';
        echo '<br>';
    }*/





   /* if($resultado_usuario){
        $row_usuario = mysqli_fetch_assoc($resultado_usuario);

            $nomePax = $row_usuario['nome'];
            $dataNascimento = $row_usuario['data_nascimento'];
            $Peso = $row_usuario['peso'];
            $Responsavel = $row_usuario['responsavel'];


    }else{
        echo "erro";
    }

    echo "Nome Passageiro: ".$nomePax." <br>";
    echo "Data de Nascimento: ".$dataNascimento." <br>";
    echo "Peso Pax: ".$Peso." <br>";
    echo "Responsavel Pelo voo: ".$Responsavel." <br>";*/

?>



