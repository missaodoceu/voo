<!DOCTYPE html>
<html lang="pt-br">

<head>
</head>
<body>
<?php
session_start();
include_once 'conexao.php';

$nome = $_POST['name'];
$dataNascimento = $_POST['dtNascimento'];
$telefone = $_POST['numTel'];
$email = $_POST['email'];
$identidade = $_POST['identidade'];
$pesoCorporal = $_POST['pesoCorporal'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$pais = $_POST['pais'];
$organizacao = $_POST['org'];
$contatoEmergencia = $_POST['numeroContato'];
$aceite = $_POST['aceite'];
$nomeContatoEmergencia = $_POST['nomeContato'];
$cpf = $_POST['cpf'];
$logradouro = $_POST['logradouro'];
$cep = $_POST['cep'];

$date = new DateTime( $dataNascimento ); // data de nascimento
$interval = $date->diff( new DateTime() ); // data definida

$idade = $interval->format( '%Y' ); // 110 Anos, 2 Meses e 2 Dias

$pesquisa_nome_cpf = "SELECT nome,cpf FROM passageiros WHERE nome = '$nome' AND cpf ='$cpf' LIMIT 1";

$resultado_pesquisa = mysqli_query($conn, $pesquisa_nome_cpf);

if($resultado_pesquisa){
    $_SESSION['msg'] = "Passageiro Já cadastrado em nossos Banco de dados";
    echo $_SESSION['msg'];
    echo "<br/><a href='pax.php'>Voltar</a>";
    echo "&nbsp &nbsp<a href='pax.php'>Reservar Voo</a>";
    //$row_resultado = mysqli_fetch_assoc($resultado_pesquisa);
    // echo $row_resultado['nome'];
}else{
    $sqldados = "INSERT INTO passageiros (idPassageiros,nome,cpf,identidade,peso,data_nascimento,idade,nome_contato_emergencia,contato_emergencia,contato_passageiro,email,organizacao,idParceiro,logradouro,cep,cidade,estado,pais)
VALUES ('','$nome','$cpf','$identidade','$pesoCorporal','$dataNascimento','$idade','$nomeContatoEmergencia','$contatoEmergencia','$telefone','$email','$organizacao','','$logradouro','$cep','$cidade','$estado','$pais')";

    //$result = $mysqli->real_query($sqldados); //Realiza a consulta

    if ($result = $conn->query($sqldados)) {
        echo("Dados gravados com Sucesso!");
        $pesquisa_nome = "SELECT idPassageiros FROM passageiros WHERE nome = '$nome' AND cpf='$cpf'";
        $resultado = mysqli_query($conn,$pesquisa_nome);
        if(resultado){
            $row_resultado = mysqli_fetch_assoc($resultado);
            $_SESSION['idUsuario'] = $row_resultado['idUsuario'];
        }
        //header("Location:pax.php");
    }else{
        echo("Error: %s\n".$mysqli->error);
    }
}




?>


</body>
</html>