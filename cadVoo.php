<?php
header("Content-type: text/html; charset=utf-8");
session_start();
ob_start();

if(!empty($_SESSION['id'])){


    include_once 'email.php';//inclui a pagina email onde contem a função de enviar o email
    /*Variaveis que foram criadas para receberem os vetores de dados do formulario ou para a tomada de decisão
    de navegação entre as páginas php*/
    $btnant = filter_input(INPUT_POST, 'btnant', FILTER_SANITIZE_STRING);
    $btnCadPax = filter_input(INPUT_POST, 'btnCadPax', FILTER_SANITIZE_STRING);
    $btnNovo = filter_input(INPUT_POST, 'btnNovo', FILTER_SANITIZE_STRING);
    $btnSair = filter_input(INPUT_POST, 'btnSair', FILTER_SANITIZE_STRING);
    //o if faz a comparação para saber se a variavel contem dados;
    if($btnCadPax){
        include_once 'conexao.php';
        $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $erro = false; // variavel booleana para comparação de erro

        $dados_st = array_map('strip_tags', $dados_rc);
        $dados = array_map('trim', $dados_st);


        $pesquisa = "SELECT * FROM usuarios where id ='".$_SESSION['id']."'";
        $resultado = mysqli_query($conn,$pesquisa);
        if($resultado){
            $row = mysqli_fetch_assoc($resultado);
            $responsavel = $row['nome'];
            $emailResponsavel = $row['email'];
            $telResponsavel = $row['telefone'];
        }


        /*INICIANDO AS VARIAVEIS QUE SERÃO USADOS PARA ENVIAR RELATORIO*/
        $nome = "";  $nome2 = ""; $nome3 = ""; $nome4 = "";  $nome5 = ""; $nome6 = ""; $nome7 = "";

        $dataNascimento = "";   $dataNascimento2 = "";  $dataNascimento3 = "";  $dataNascimento4 = "";
        $dataNascimento5 = "";  $dataNascimento6 = "";  $dataNascimento7 = "";

        $pesoPax = "";  $pesoPax2 = "";    $pesoPax3 = "";  $pesoPax4 = ""; $pesoPax5 = ""; $pesoPax6 = ""; $pesoPax7 = "";

        if(isset($dados['checkPax1'])){
            $pax1 = $dados['checkPax1'];
            $pesquisa1 = "SELECT p.nome, p.data_nascimento, p.peso, u.nome as responsavel FROM usuarios u join passageiros p on p.idUsuario  WHERE u.id='".$_SESSION['id']."' AND p.idUsuario ='".$_SESSION['id']."' AND p.idPassageiros = '".$dados['checkPax1']."' ";
            $resultado1 = mysqli_query($conn,$pesquisa1);
            if($resultado1){
                $row = mysqli_fetch_assoc($resultado1);
                $nome = $row['nome'];
                $dataNascimento = $row['data_nascimento'];
                $pesoPax = $row['peso'];

            }
        }

        if(isset($dados['checkPax2'])){
            $pax2 = $dados['checkPax2'];
            $pesquisa2 = "SELECT p.nome, p.data_nascimento, p.peso, u.nome as responsavel FROM usuarios u join passageiros p on p.idUsuario  WHERE u.id='".$_SESSION['id']."' AND p.idUsuario ='".$_SESSION['id']."' AND p.idPassageiros = '".$dados['checkPax2']."' ";
            $resultado2 = mysqli_query($conn,$pesquisa2);
            if($resultado2){
                $row2 = mysqli_fetch_assoc($resultado2);
                $nome2 = $row2['nome'];
                $dataNascimento2 = $row2['data_nascimento'];
                $pesoPax2 = $row2['peso'];

            }
        }

        if(isset($dados['checkPax3'])){
            $pax3 = $dados['checkPax3'];
            $pesquisa3 = "SELECT p.nome, p.data_nascimento, p.peso, u.nome as responsavel FROM usuarios u join passageiros p on p.idUsuario  WHERE u.id='".$_SESSION['id']."' AND p.idUsuario ='".$_SESSION['id']."' AND p.idPassageiros = '".$dados['checkPax3']."' ";
            $resultado3 = mysqli_query($conn,$pesquisa3);
            if($resultado3){
                $row3 = mysqli_fetch_assoc($resultado3);
                $nome3 = $row3['nome'];
                $dataNascimento3 = $row3['data_nascimento'];
                $pesoPax3 = $row3['peso'];

            }
        }

        if(isset($dados['checkPax4'])){
            $pax4 = $dados['checkPax4'];
            $pesquisa4 = "SELECT p.nome, p.data_nascimento, p.peso, u.nome as responsavel FROM usuarios u join passageiros p on p.idUsuario  WHERE u.id='".$_SESSION['id']."' AND p.idUsuario ='".$_SESSION['id']."' AND p.idPassageiros = '".$dados['checkPax4']."' ";
            $resultado4 = mysqli_query($conn,$pesquisa4);
            if($resultado4){
                $row4 = mysqli_fetch_assoc($resultado4);
                $nome4 = $row4['nome'];
                $dataNascimento4 = $row4['data_nascimento'];
                $pesoPax4 = $row4['peso'];

            }
        }

        if(isset($dados['checkPax5'])){
            $pax5 = $dados['checkPax5'];
            $pesquisa5 = "SELECT p.nome, p.data_nascimento, p.peso, u.nome as responsavel FROM usuarios u join passageiros p on p.idUsuario  WHERE u.id='".$_SESSION['id']."' AND p.idUsuario ='".$_SESSION['id']."' AND p.idPassageiros = '".$dados['checkPax5']."' ";
            $resultado5 = mysqli_query($conn,$pesquisa5);
            if($resultado5){
                $row5 = mysqli_fetch_assoc($resultado5);
                $nome5 = $row5['nome'];
                $dataNascimento5 = $row5['data_nascimento'];
                $pesoPax5 = $row5['peso'];

            }
        }

        if (isset($dados['checkPax6'])){
            $pax6 = $dados['checkPax6'];
            $pesquisa6 = "SELECT p.nome, p.data_nascimento, p.peso, u.nome as responsavel FROM usuarios u join passageiros p on p.idUsuario  WHERE u.id='".$_SESSION['id']."' AND p.idUsuario ='".$_SESSION['id']."' AND p.idPassageiros = '".$dados['checkPax6']."' ";
            $resultado6 = mysqli_query($conn,$pesquisa6);
            if($resultado6){
                $row6 = mysqli_fetch_assoc($resultado6);
                $nome6 = $row6['nome'];
                $dataNascimento6 = $row6['data_nascimento'];
                $pesoPax6 = $row6['peso'];

            }
        }

        if (isset($dados['checkPax7'])){
            $pax7 = $dados['checkPax7'];
            $pesquisa7 = "SELECT p.nome, p.data_nascimento, p.peso, u.nome as responsavel FROM usuarios u join passageiros p on p.idUsuario  WHERE u.id='".$_SESSION['id']."' AND p.idUsuario ='".$_SESSION['id']."' AND p.idPassageiros = '".$dados['checkPax7']."' ";
            $resultado7 = mysqli_query($conn,$pesquisa7);
            if($resultado7){
                $row7 = mysqli_fetch_assoc($resultado7);
                $nome7 = $row7['nome'];
                $dataNascimento7 = $row7['data_nascimento'];
                $pesoPax7 = $row7['peso'];

            }
        }



        if($dados['origem']=='' or $dados['destino']=='' or $dados['dataVoo']=='' or $dados['peso'] == ''){
            $erro = true;
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário preencher todos os campos!</div>";
        }/*else{
            $result_usuario = "SELECT idPassageiros FROM passageiros WHERE idPassageiros ='". $_SESSION['id'] ."' LIMIT 1";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
                $row_usuario = mysqli_fetch_assoc($resultado_usuario);
                $idPax = $row_usuario['idPassageiros'];
            }else{
                var_dump($_SESSION['id']);
                $erro = true;
                $_SESSION['msg'] = "<div class='alert alert-danger'>Passageiro Adm Não cadastrado!</div>";
            }

        }*/


        //var_dump($dados);
        if(!$erro){

            $result_usuario = "INSERT INTO voo_pretendido (origem, destino, dataVoo, idUsuario, pesoBagagem, outrosTrechos) VALUES (
                            '" .$dados['origem']. "',
                            '" .$dados['destino']. "',
                            '" .$dados['dataVoo']. "',
                            '".$_SESSION['id']."',
                            '" .$dados['peso']. "',
                            '" .$dados['obs']. "'
                            )";
            $resultado_usario = mysqli_query($conn, $result_usuario);
            if(mysqli_insert_id($conn)){

                /*RELATORIO PARA ENVIO DE EMAIL PARA A EQUIPE DE VOO E PARA O SOLICITANTE*/
                $idVoo = mysqli_insert_id($conn);
                $titulo = "Voo pretendido: $idVoo";
                $destinatario = $emailResponsavel;
                $corpoMensagem = "Numero de identificação do voo pretendido $idVoo <br><br>
                Origem: ".$dados['origem']." <br>
                Destino: ".$dados['destino']." <br>
                Data do Voo: ".$dados['dataVoo']." <br>
                Peso Estimado de Bagagem: ".$dados['peso']." <br>
                Observações: ".$dados['obs']."<br>
                ---------------------------------------------------------------------------------<br>
                Solicitante do Voo: $responsavel <br>
                Telefone do Solicitante: $telResponsavel <br>
                ---------------------------------------------------------------------------------<br>
                Passageiro 1: <br>
                Nome: $nome <br>
                Data de Nascimento: $dataNascimento <br>
                Peso: $pesoPax <br>
                ---------------------------------------------------------------------------------<br>
                Passageiro 2:<br>
                Nome: $nome2 <br>
                Data de Nascimento: $dataNascimento2 <br>
                Peso: $pesoPax2 <br>
                ---------------------------------------------------------------------------------<br>
                Passageiro 3:<br>
                Nome: $nome3 <br>
                Data de Nascimento: $dataNascimento3 <br>
                Peso: $pesoPax3 <br>
                ---------------------------------------------------------------------------------<br>
                Passageiro 4:<br>
                Nome: $nome4 <br>
                Data de Nascimento: $dataNascimento4 <br>
                Peso: $pesoPax4 <br>
                ---------------------------------------------------------------------------------<br>
                Passageiro 5:<br>
                Nome: $nome5 <br>
                Data de Nascimento: $dataNascimento5 <br>
                Peso: $pesoPax5 <br>
                ---------------------------------------------------------------------------------<br>
                Passageiro 6:<br>
                Nome: $nome6 <br>
                Data de Nascimento: $dataNascimento6 <br>
                Peso: $pesoPax6 <br>
                ---------------------------------------------------------------------------------<br>
                Passageiro 7:<br>
                Nome: $nome7 <br>
                Data de Nascimento: $dataNascimento7 <br>
                Peso: $pesoPax7 <br>
                ---------------------------------------------------------------------------------<br>
                ";

                enviarEmail($titulo, $corpoMensagem, $destinatario);

                $_SESSION['msg'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso!</div>";
                header("refresh:10; Location: cadVoo.php");

            }else{
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar o usuário!</div>";
            }
        }

    }else if($btnNovo){
        header("Location: cadVoo.php");
    }else if($btnSair){
        header("Location: sair.php");
    }else if($btnant){
        header("Location: cadastrar_pax.php");
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
    <title>Voo Pretendido</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="form-signin" style="background: #42dea4;">
        <h2 class="text-center">Voo Pretendido</h2>
        <form method="POST" action="">
            <label for="origem">Origem</label>
            <select id="origem" name="origem" class="form-control">
                <option value="">Origem</option>
                <option value="Manaus">Manaus</option>
                <option value="Anori">Anori</option>
                <option value="Barcelos">Barcelos</option>
                <option value="Barreirinha">Barreirinha</option>
                <option value="Boca Do Acre">Boca Do Acre</option>
                <option value="Bona">Bona</option>
                <option value="Cachoeira Porteira">Cachoeira Porteira</option>
                <option value="Canutama">Canutama</option>
                <option value="Carauari">Carauari</option>
                <option value="Coari">Coari</option>
                <option value="Cruzeiro Do Sul">Cruzeiro Do Sul</option>
                <option value="Eirunepé">Eirunepé</option>
                <option value="Envira">Envira</option>
                <option value="Humaitá">Humaitá</option>
                <option value="Ipixuna">Ipixuna</option>
                <option value="Itacoatiara">Itacoatiara</option>
                <option value="Itaituba">Itaituba</option>
                <option value="Itamarati">Itamarati</option>
                <option value="Japurá">Japurá</option>
                <option value="Juruá">Juruá</option>
                <option value="Lábrea">Lábrea</option>
                <option value="Macapá">Macapá </option>
                <option value="Manicoré">Manicoré</option>
                <option value="Mapuera">Mapuera</option>
                <option value="Matrixã">Matrixã</option>
                <option value="Maués">Maués</option>
                <option value="Nhamundá">Nhamundá</option>
                <option value="Nova Aripuanã">Nova Aripuanã</option>
                <option value="Nova Olinda do Norte">Nova Olinda do Norte</option>
                <option value="Oriximiná">Oriximiná</option>
                <option value="Parintins">Parintins</option>
                <option value="Pauini">Pauini</option>
                <option value="Porto Velho">Porto Velho</option>
                <option value="Querari">Querari</option>
                <option value="Rio Branco">Rio Branco</option>
                <option value="Santa Isabel do Rio Negro">Santa Isabel do Rio Negro</option>
                <option value="Santarém">Santarém</option>
                <option value="Santo Antônio do Iça">Santo Antônio do Iça</option>
                <option value="São Gabriel da Cachoeira">São Gabriel da Cachoeira</option>
                <option value="São Paulo De Olivença">São Paulo De Olivença</option>
                <option value="Tabatinga">Tabatinga</option>
                <option value="Tapauá">Tapauá</option>
                <option value="Tefé">Tefé</option>
            </select><br>

            <label for="destino">Destino</label>
            <select name="destino" id="destino" class="form-control">
                <option value="">Destino</option>
                <option value="Manaus">Manaus</option>
                <option value="Anori">Anori</option>
                <option value="Barcelos">Barcelos</option>
                <option value="Barreirinha">Barreirinha</option>
                <option value="Boca Do Acre">Boca Do Acre</option>
                <option value="Bona">Bona</option>
                <option value="Cachoeira Porteira">Cachoeira Porteira</option>
                <option value="Canutama">Canutama</option>
                <option value="Carauari">Carauari</option>
                <option value="Coari">Coari</option>
                <option value="Cruzeiro Do Sul">Cruzeiro Do Sul</option>
                <option value="Eirunepé">Eirunepé</option>
                <option value="Envira">Envira</option>
                <option value="Humaitá">Humaitá</option>
                <option value="Ipixuna">Ipixuna</option>
                <option value="Itacoatiara">Itacoatiara</option>
                <option value="Itaituba">Itaituba</option>
                <option value="Itamarati">Itamarati</option>
                <option value="Japurá">Japurá</option>
                <option value="Juruá">Juruá</option>
                <option value="Lábrea">Lábrea</option>
                <option value="Macapá">Macapá </option>
                <option value="Manicoré">Manicoré</option>
                <option value="Mapuera">Mapuera</option>
                <option value="Matrixã">Matrixã</option>
                <option value="Maués">Maués</option>
                <option value="Nhamundá">Nhamundá</option>
                <option value="Nova Aripuanã">Nova Aripuanã</option>
                <option value="Nova Olinda do Norte">Nova Olinda do Norte</option>
                <option value="Oriximiná">Oriximiná</option>
                <option value="Parintins">Parintins</option>
                <option value="Pauini">Pauini</option>
                <option value="Porto Velho">Porto Velho</option>
                <option value="Querari">Querari</option>
                <option value="Rio Branco">Rio Branco</option>
                <option value="Santa Isabel do Rio Negro">Santa Isabel do Rio Negro</option>
                <option value="Santarém">Santarém</option>
                <option value="Santo Antônio do Iça">Santo Antônio do Iça</option>
                <option value="São Gabriel da Cachoeira">São Gabriel da Cachoeira</option>
                <option value="São Paulo De Olivença">São Paulo De Olivença</option>
                <option value="Tabatinga">Tabatinga</option>
                <option value="Tapauá">Tapauá</option>
                <option value="Tefé">Tefé</option>
            </select><br>

            <label for="dataVoo">data viagem</label>
            <input type="text" name="dataVoo" id="dataVoo" placeholder="Ex: 10/10/2010" class="form-control"}"><br> <!--onfocus para deixar o campo com o formato de data e o obblur com o if para transformar o campo em texto novamente se não estiver selecionado-->

            <label for="peso">peso</label>
            <input type="text" id="peso" name="peso" placeholder="Digite o peso estimado de bagagem" class="form-control">

            <table class="form-control table-responsive">
                <tr>
                    <thead>
                    <th colspan="4" class="form-control text-center">Passageiros</th>
                  </thead>
                </tr>
                <tr>
                    <td>
                        <h5 class="text-justify">Aqui tera uma lista dos passageiros cadastrado,  e deve-se selecionar os passageiros que irão fazer parte do voo que esta sendo cadastrado, para selecionar clique na caixa de seleção que tem ao lado de cada nome. O número máximo de passaeiros por voos são de 7 (sete)</h5>
                    </td>
                </tr>
                <tbody>

                        <?php
                        include_once 'conexao.php';
                        $query = "SELECT * FROM passageiros WHERE idUsuario ='". $_SESSION['id'] ."'";
                        $resultado = mysqli_query($conn,$query);
                        $i=0;
                        while($linha = mysqli_fetch_assoc($resultado)){
                            echo '<tr class="form-control">';
                            echo '<td colspan="4"><input type="checkbox" value="'.$linha['idPassageiros'].'" name="checkPax'.++$i.'""/>'.$linha['nome'].'</td>'.'<br>';
                            echo '</tr>';
                        }

                        ?>

                </tbody>

            </table><br><br>
            <label>Observações</label>
           <textarea class="form-control" rows="10" id="obs" name="obs" placeholder="Digite um local que não esta na origem ou destino, e/ou observações"></textarea><br>

            <input type="submit" name="btnant" value="Anterior" class="btn btn-success">
            <input type="submit" name="btnCadPax" value="Enviar Solicitação" class="btn btn-success" onclick="abrir();"><br><br>
           <!-- <input type="submit" name="btnNovo" value="Cadastrar novo Trecho" class="btn btn-success"><br><br>-->
            <input type="submit" name="btnSair" value="Sair" class="btn btn-success"><br><br>


        </form>
    </div>
</div>

    <div id="popup1" class="popup1">
        <h4 class="text-center">Sua solicitação foi enviada com sucesso!<br>
            Você recerá em instantes uma cópia de sua solicitação no seu email<br>
        </h4>
        <a href="javascript: fechar();"><h4 class="text-center">Fechar</h4></a>
    </div>

<script language="JavaScript">
    function abrir(){
        document.getElementById('popup1').style.display = 'block';
    }
    function fechar(){
        document.getElementById('popup1').style.display = 'none';
    }

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>