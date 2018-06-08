<!DOCTYPE html>
<?php
//chama arquivo de conexão
//include("conecta.php");
//$pdo=conectar(); 

//seleciona os dados na tabela
//$qry_categoria = $pdo->prepare("SELECT NomeCateg FROM tbcategoria");
//$qry_categoria->execute();
//$linha=$qry_categoria->fetchAll(PDO::FETCH_OBJ);
//?>
<html lang="pt-br"> 
<head>
<title>ML :: Colaboradores</title>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initialscale=1.0">
<link rel="stylesheet" type="text/css" href="/megaliga/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/megaliga/css/estilo.css">
</head> 
<body>
<script src="/megaliga/js/jquery.js"></script>
<script src="/megaliga/js/bootstrap.min.js"></script>
<div class="col-md-12">
<form id="Colaborador" name="CadastraColaborador" method="post" action="gravaColaborador.php" enctype='multipart/form-data'>
<div class="form-group">
    <div class="container">
    <fieldset>
    <legend><h1>CADASTRO COLABORADOR</h1></legend>
        <div class="container">
        <fieldset>
        <legend><h3>COLABORADOR</h3></legend>
        <div class="row">
            <div class="col-md-2">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="/megaliga/img/User.png" height="190" width="150" id="ImgColab">
                </a> 
            </div>
        <input name="FotoColab" type="file" id="FtColab">    
        </fieldset>
        </div>
        <div class="row">
                <div class="col-md-5">
                    <label for="NmColab">Nome Colaborador :</label>
                    <input class="form-control" name="NomeColab" type="text" id="NmColab" size="50" placeholder="informe o nome do colaborador">
                    <span class='msg-erro msg-nomecolab'></span>
                </div>
                <div class="col-md-3">
                    <label for="DcColab">Cpf :</label> 
                    <input class="form-control" name="DocColab" type="text" id="DcColab">
                    <span class='msg-erro msg-cpf'></span>
                </div>
                <div class="col-md-2">
                    <label for="Sexo">Sexo :</label> 
                    <select class="form-control" name="Sexo" id="Sexo">
                        <option value="" selected></option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                        <span class='msg-erro msg-sexo'></span>
                </div>
                <div class="col-md-2">
                    <label for="DtNasc">Data Nascimento :</label> 
                    <input class="form-control"name="DataNasc" type="text" id="DtNasc">
                    <span class='msg-erro msg-dtnasc'></span>
                </div>
        </div>
    </fieldset>
    </div>
    <div class="container">
    <fieldset>
    <legend><h3>DADOS PARA CONTATO</h3></legend>
        <div class="row">
            <div class="col-md-6">
                <label for="RuColab">Rua :</label>
                <input class="form-control" name="RuaColab" type="text" id="RuColab" size="45">
                <span class='msg-erro msg-rua'></span>
            </div>
            <div class="col-md-2">
                <label for="NuColab">Numero :</label>
                <input class="form-control" name="NumColab" type="text" id="NuColab" size="5">
                <span class='msg-erro msg-numero'></span>
            </div>
            <div class="col-md-4">
                <label for="Compl">Complemento :</label>
                <input class="form-control" name="ComplNum" type="text" id="Compl" size="30">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="Bairro">Bairro :</label>
                <input class="form-control" name="Bairro" type="text" id="Bairro">
                <span class='msg-erro msg-bairro'></span>
            </div>
            <div class="col-md-4">
                <label for="Cidade">Cidade :</label>
                <input class="form-control" name="Cidade" type="text" id="Cidade">
                <span class='msg-erro msg-cidade'></span>
            </div>
            <div class="col-md-2">
                <label for="Cep">Cep :</label>
                <input class="form-control" name="Cep" type="text" id="Cep">
                <span class='msg-erro msg-cep'></span>
            </div>
            <div class="col-md-2">
                <label for="Estado">Estado :</label>
                <Select class="form-control" name="Estado" id="Estado">
                	<option value=""></option>
                    <option value="ac">Acre</option> 
                    <option value="al">Alagoas</option> 
                    <option value="am">Amazonas</option> 
                    <option value="ap">Amapá</option> 
                    <option value="ba">Bahia</option> 
                    <option value="ce">Ceará</option> 
                    <option value="df">Distrito Federal</option> 
                    <option value="es">Espírito Santo</option> 
                    <option value="go">Goiás</option> 
                    <option value="ma">Maranhão</option> 
                    <option value="mt">Mato Grosso</option> 
                    <option value="ms">Mato Grosso do Sul</option> 
                    <option value="mg">Minas Gerais</option> 
                    <option value="pa">Pará</option> 
                    <option value="pb">Paraíba</option> 
                    <option value="pr">Paraná</option> 
                    <option value="pe">Pernambuco</option> 
                    <option value="pi">Piauí</option> 
                    <option value="rj">Rio de Janeiro</option> 
                    <option value="rn">Rio Grande do Norte</option> 
                    <option value="ro">Rondônia</option> 
                    <option value="rs">Rio Grande do Sul</option> 
                    <option value="rr">Roraima</option> 
                    <option value="sc">Santa Catarina</option> 
                    <option value="se">Sergipe</option> 
                    <option value="sp">São Paulo</option> 
                    <option value="to">Tocantins</option> 
                </select>
                <span class='msg-erro msg-estado'></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="Telef1">Telefone celular :</label> 
                <input class="form-control" name="Telefone1" type="tel" id="Telef1"> 
                <span class='msg-erro msg-telef'></span>
            </div>
            <div class="col-md-3">
                <label for="Telef2">Telefone fixo :</label>
                <input class="form-control" name="Telefone2" type="tel" id="Telef2">
            </div>
            <div class="col-md-6">
                <label for="Email">E-mail :</label> 
                <input class="form-control" name="Email" type="email" id="Email">
                <span class='msg-erro msg-email'></span>
            </div> 
        </div>
    </div>
    </fieldset>
    <div class="container">
        <fieldset>
        <legend><h3>INFORMAÇÕES PARA PAGAMENTO</h3></legend>
        <div class="row">
            <div class="col-md-1">
                <label for="Banco">Banco :</label>
                <input class="form-control" name="Banco" type="text" id="Banco">
                <span class='msg-erro msg-banco'></span>
            </div>
            <div class="col-md-5">
                <label for="NmBanco">Nome Banco :</label>
                <input class="form-control" name="NomeBanco" type="text" id="NmBanco">
                <span class='msg-erro msg-nomebco'></span>
            </div>
            <div class="col-md-2">
                <label for="AgBanco">Agencia :</label>
                <input class="form-control" name="Agencia" type="text" id="AgBanco" size="10">
                <span class='msg-erro msg-agenc'></span>
            </div>
            <div class="col-md-1">
                <label for="DvAgenc">Digito :</label>
                <input class="form-control" name="DigAgencia" type="text" id="DvAgencia" size="4">
                <span class='msg-erro msg-dvagenc'></span>
            </div>
            <div class="col-md-2">
                <label for="NmConta">Numero Conta :</label>
                <input class="form-control" name="NumConta" type="text" id="NmConta" size="10">
                <span class='msg-erro msg-conta'></span>
            </div>
            <div class="col-md-1">
                <label for="DgConta">Digito :</label>
                <input class="form-control" name="DigConta" type="text" id="DgConta" size="4">
                <span class='msg-erro msg-dvconta'></span>
            </div>
        </div>
        </fieldset>
    </div>
    <div class="container">
    <fieldset>
    <legend><h3>ATIVIDADE COLABORADOR</h3></legend>
    <div class="row">
        <div class="col-md-2">
            <label>Comissão :</label>
            <select class="form-control" name="Comissao" id="Comissao">
               	<option value=""></option>
               	<option value="Arbitragem">Arbitragem</option>
               	<option value="Tecnica">Tecnica</option>
               	<option value="Medica">Medica</option>
            </select>
            <span class='msg-erro msg-comissao'></span>
        </div>
        <div class="col-md-6">
            <label for="FnColab">Função do Colaborador :</label>
            <input class="form-control" name="FuncColab" type="text" id="FnColab" size="20">
            <span class='msg-erro msg-fcolab'></span>
        </div>
        <div class="col-md-4">
            <label>Registro Colaborador :</label> 
            <input class="form-control" name="RegColab" type="text" id="ReColab" size="20" placeholder="ex: numero de carteira de conselho">
            <span class='msg-erro msg-rcolab'></span>
        </div>
    </div>
    </fieldset>
    </div>
    <input type="hidden" name = "acao" value="incluir">
    <button type="submit" class="btn btn-primary" id='botao'>Gravar</button>
</div>
</form> 
<script type="text/javascript" src="/megaliga/js/vld-colaborador.js"></script>
</div>
</body> 
</html> 