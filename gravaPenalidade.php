<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Inclusão de Penalidades</title>
	<link rel="stylesheet" type="text/css" href="/megaliga/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/megaliga/css/estilo.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
	<?php 
		include("conecta.php");
		$pdo=conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec("set names utf8");
				
		// Recebe os dados enviados pela submissão
		$acao  		= (isset($_POST['acao'])) 		? $_POST['acao'] : '';
		$idcat 		= (isset($_POST['IdCateg'])) 	? $_POST['IdCateg'] : '';
		$tpenal		= (isset($_POST['TipoPenal'])) 	? $_POST['TipoPenal'] : '';
		$descr		= (isset($_POST['DescPen'])) 	? $_POST['DescPen'] : '';
		$esusp 		= (isset($_POST['EfSusp'])) 	? $_POST['EfSusp'] : '';
		$recurso 	= (isset($_POST['Recurso'])) 	? $_POST['Recurso'] : '';
		$recdesc	= (isset($_POST['DsRecur'])) 	? $_POST['DsRecur'] : '';
		$multa		= (isset($_POST['Multa'])) 		? $_POST['Multa'] : '';
		$vmulta		= (isset($_POST['VlMulta'])) 	? $_POST['VlMulta'] : '';
		$multarec	= (isset($_POST['MultaRec'])) 	? $_POST['MultaRec'] : '';
		$vmultar	= (isset($_POST['VlMultaR'])) 	? $_POST['VlMultaR'] : '';
		
		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
			if ($idcat == ''):
				$mensagem .= '<li>Selecione a categoria.</li>';
		    endif;

			if ($tpenal == ''):
				$mensagem .= '<li>Informe o tipo de penalidade.</li>';
		    endif;

			if ($descr == ''): 		
				$mensagem .= '<li>Informe uma descrição.</li>';
			endif;

			if ($esusp == ''): 		
				$mensagem .= '<li>Informe se há efeito suspensivo.</li>';
			endif;

			if ($recurso == ''): 		
				$mensagem .= '<li>Informe se permite recurso para o efeito.</li>';
			endif;

			if ($multa == ''):
			   $mensagem .= '<li>Informe se há aplicação de multa.</li>';
			endif;
			
			if ($multarec == ''):
			   $mensagem .= '<li>Informe se há penalidade em caso de recorrência.</li>';
			endif;

			if ($mensagem != ''):
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
				exit;
			endif;
		endif;
				
		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			// retorna o ID do campeonato gravado na tabela categoria
			$id_categ = $pdo->prepare('SELECT IdCampeonato FROM tbcategoria WHERE IdCategoria ='.$idcat);
			$id_categ->execute();
			$linha=$id_categ->fetchAll(PDO::FETCH_OBJ);
			
			foreach ($linha as $list) 
			{
				$id_camp = $list->IdCampeonato;
			}

			// tratamento para os campos de valor de multa
			if($vmulta == "" OR $vmulta == 0)
			{
				$vmulta_aux = 0.00;
			}
			else
			{	
				$vmulta_aux = $vmulta;
			}

			if($vmultar == "" OR $vmultar == 0)
			{
				$vmultar_aux = 0.00;
			}
			else
			{	
				$vmultar_aux = $vmultar;
			}

			$sql = "INSERT INTO tbpenalidade (IdCampeonato,IdCategoria,Tipo,Descricao,EfeSuspensivo,TipoEfeito,Recurso,Multa,VlMulta,Recorrente,MultaRec) VALUES (:IdCamp,:IdCateg,:TipoPenal,:DescPen,:EfSusp,:DsRecur,:Recurso,:Multa,:VlMulta,:MultaRec,:VlMultaR)";

			$stm = $pdo->prepare($sql);
			$stm->bindValue(':IdCamp',   	$id_camp	,PDO::PARAM_INT);
			$stm->bindValue(':IdCateg',   	$idcat 		,PDO::PARAM_INT);	
			$stm->bindValue(':TipoPenal',   $tpenal		,PDO::PARAM_STR);			
			$stm->bindValue(':DescPen',    	$descr		,PDO::PARAM_STR);
			$stm->bindValue(':EfSusp',    	$esusp 		,PDO::PARAM_STR);
			$stm->bindValue(':DsRecur',  	$recdesc	,PDO::PARAM_STR);
			$stm->bindValue(':Recurso',    	$recurso	,PDO::PARAM_STR);
			$stm->bindValue(':Multa',  		$multa		,PDO::PARAM_STR);
			$stm->bindValue(':VlMulta',  	$vmulta_aux	,PDO::PARAM_STR);
			$stm->bindValue(':MultaRec',  	$multarec 	,PDO::PARAM_STR);
			$stm->bindValue(':VlMultaR', 	$vmultar_aux,PDO::PARAM_STR);
			
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=http://localhost/megaliga/'>";
			
			// echo("Dados recebidos e preparados: ".$idcamp." - ".$nome." - ".$comprim." - ".$largura." - ".$cap_torc." - ".$foto_est1." - ".$foto_est2." - ".$foto_est3." - ".$foto_est4);
			
		endif;
	
	?>
	</div>
</body>
</html>