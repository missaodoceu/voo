<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
$btnAnt = filter_input(INPUT_POST, 'btnAnt', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
    header("Location: cadastrar_pax.php");
} else if($btnAnt){
    header("Location: administrativo.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Termo de Aceite de Voo</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="form-signin" style="background: #42dea4;">
				<h2 class="text-center">Termo de Aceite de Voo</h2>
				<?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
				?>
				<form method="POST" action="">
				    <textarea class="form-control" rows="20" id="comment" disabled>Prezado Parceiro em Ministério

Estamos felizes em podermos firmar esta parceria contigo e apoiá-lo em seu ministério. Entendemos que você e a Missão do Céu estão em pleno acordo de que este é um projeto missionário que estamos realizando em parceria, onde estamos compartilhando a visão de levar o evangelho aos povos e comunidades na Amazônia, bem como compartilhando pessoal, recursos e custos referentes a este projeto. Portanto não se trata de uma prestação de serviço de qualquer natureza, pois concordamos com os ideais missionários e metodológicos de levar o evangelho aos que menos podem ouvir através desta viagem na qual estamos participando juntos.

Para que possamos cumprir nossos propósitos em harmonia, segurança e colaboração informamos que você precisa observar alguns detalhes muito importantes abaixo:
1.	Observe o horário previsto para a saída da viagem. Procure estar lá entre 15 a 30 minutos de antecedência. É importante a colaboração com os horários dos voos, sendo que nosso último pouso do dia sempre está previsto para uma hora antes do pôr do sol. Não fazemos voos noturnos programados por questão de segurança.
2.	As saídas e chegadas em Manaus serão no AEROPORTO DE FLORES, no hangar da JVC AEROTAXI, próximo à esquina das Avenidas Nilton Lins e Torquato Tapajós, Flores. Acesso pelo portão do Cleiton Taxi Aéreo.
3.	Para fins de cálculo de peso da aeronave, a tripulação está considerando que cada passageiro terá uma carga total de 95kg, ou seja, por exemplo, peso corporal médio de 80kg e cerca de 15kg de bagagem total (incluindo a bolsa de mão). Caso isso não se aplique à sua necessidade, por favor, informar a tripulação por meio do telefone (92) 99111-9466 (WhatsApp) ou pelo e-mail: voo@missaodoceu.org.br. Faremos o possível para suprir sua necessidade, mas estamos sujeitos aos limites legais de carregamento da aeronave, bem como aos padrões de segurança previstos pelo fabricante e pelos padrões de segurança da Associação Missão do Céu.
4.	Objetos com volumes acima do normal precisam ser verificados quanto a possibilidade de serem transportados na aeronave, pois o espaço interno é bastante restrito para carga.
5.	Caronas e transporte de bagagens de terceiros serão tratados caso a caso, sendo a última palavra a do comandante.
6.	A tripulação será formada por dois pilotos, sendo o Pastor Márcio Rempel como comandante e o copiloto a ser definido conforme escala dos pilotos voluntários.
7.	Em caso de mau tempo, estamos sujeitos a aguardar a melhora das condições meteorológicas para cumprimento dos voos. Fica a critério do comandante prosseguir ou não. Portanto, podem haver mudanças no planejamento devido meteorologia.
8.	Os voos eventualmente também podem vir a ser cancelados ou remarcados por decisão unilateral da Missão do Céu, conforme circunstâncias técnicas, operacionais, ou institucionais que afetem a segurança de voo.
9.	Como este é um projeto ou atividade desenvolvidos voluntariamente pelos participantes, você deve estar ciente que há riscos inerentes em viajar na Amazônia e, portanto, exime a Associação Missão do Céu da responsabilidade sobre quaisquer problemas ou transtornos que possam vir a lhe ser causados por eventuais circunstâncias adversas antes, durante ou após a viagem.
10.	Em caso de dúvidas nos procure através do contato divulgado acima.

Sendo isso de comum acordo e bom para ambas as partes solicitamos que preencha o formulário abaixo para melhor planejamento da viagem e cadastro dos passageiros.
</textarea><br/>

                    <input type="checkbox" name="aceit" id="aceit" onclick="HabiDsabi()"> Aceito os termos.<br/>
                    <input type="submit" name="btnAnt" value="Anterior" class="btn btn-success">
                    <input type="submit" id="btnCadPax" name="btnCadUsuario" value="Próximo" class="btn btn-success" disabled><br><br>
					
					<div class="row text-center" style="margin-top: 20px;"> 
						Lembrou? <a href="login.php">Clique aqui</a> para logar
					</div>
				</form>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

        <script>
            function HabiDsabi(){
                if(document.getElementById('aceit').checked == true){
                    document.getElementById('btnCadPax').disabled = ""  }
                if(document.getElementById('aceit').checked == false){
                    document.getElementById('btnCadPax').disabled = "disabled"  }
            }</script>
	</body>
</html>