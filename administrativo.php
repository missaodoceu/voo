<?php
session_start();

    $btnSair = filter_input(INPUT_POST, 'btnSair', FILTER_SANITIZE_STRING);
    $btnTermAceite = filter_input(INPUT_POST, 'btnTermAceite', FILTER_SANITIZE_STRING);

if(!empty($_SESSION['id'])){
    if($btnSair){
        header("Location: sair.php");
    }else if($btnTermAceite){
        header("Location: termo.php");
    }
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita!</div>";
	header("Location: login.php");	
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="form-signin" style="background: #42dea4;">
        <h2 class="text-center">Bem Vindo!</h2>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST" action="">

            <h3 class="text-center"><?php echo " " .$_SESSION['nome']." " ?></h3><br>

            <textarea class="form-control text-justify" rows="20" id="comment" disabled>Este é um sistema para cadastro de passageiros e voo pretendidos.
Veja as instruções para que você  cadastre corretamente os dados necessários para o voo.

1. Clique no botão Termo de aceite de Voo;

2. Leia o termo com atenção, pois ele contém informações importantes. Se você aceitar os termos clique na caixa de seleção: “Aceito os termos”. (Se não concorda com os termos, clique no botão anterior, e logo após clique no botão sair);

3. Ao aceitar os termos precisará fazer o seu cadastro e o cadastro das pessoas que serão passageiros no voo pretendido. Lembrando que o cadastro de cada passageiro tem que ser feito de forma individual, um a um. Ao terminar de cadastrar seus dados clique no botão "Salvar Cadastro". Após clicar no botão de Salvar irá aparecer uma mensagem se o cadastro estiver sido concluído com sucesso. Se quiser cadastrar outro passageiro é só preencher os campos novamente e clicar de novo no botão “Salvar Cadastro”. Casso não precise mais cadastrar passageiros clique no botão “Solicitar Voo”.

4. Em seguida será cadastrado o voo pretendido. Os dados a serem inseridos nesta etapa serão a origem (de onde quer sair), destino (local aonde se quer chegar), data do voo, e peso em quilogramas (Kg) estimado de todas as bagagens para o referido voo. Após digitar o peso estimado de bagagem vai ter uma lista com todos os passageiros cadastrados. Você pode escolher até 07 (sete) passageiros para o voo clicando no campo ao lado de cada nome. O último campo são observações como, por exemplo, trechos que pretende voar, alguma localidade que não está na listagem disponível, lista de pessoas que vão nesse voo etc. Após o preenchimento de todos os campos clicar no botão Cadastrar Voo. Se quiser realizar o cadastro de um novo voo clicar no botão Novo voo.

</textarea><br><br>


            <input type="submit" name="btnTermAceite" value="Termo de Aceite de Voo" class="btn btn-success">

            <input type="submit" name="btnSair" value="Sair" class="btn btn-success">



        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>