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
    <meta charset="UTF-8"/>
    <title>ML :: Atletas</title>
    <link rel="stylesheet" type="text/css" href="/megaliga/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/megaliga/css/estilo.css">
</head> 
<body>
<script src="/megaliga/js/jquery.js"></script>
<script src="/megaliga/js/bootstrap.min.js"></script>
<script src="/megaliga/js/pos-atleta.js"></script>
<div class="col-md-12">
    <form class="form-group" id="atleta" name="CadastraAtleta" method="post" action="/mliga-json/testes/phpjson-grava.php" enctype='multipart/form-data'>
    <legend><h1>CADASTRO ATLETA</h1></legend>
    <div class="container">
        <legend><h2>ATLETA</h2></legend>
        <div class="row">
            <div class="col-md-2">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="/megaliga/img/User.png" height="190" width="150" id="ImgAtleta">
                </a> 
                <input name="FtAtleta" type="file" id="FtAtleta">    
            </div>
        </div>
    <fieldset>
    <legend><h2>DADOS PESSOAIS</h2></legend>
    <div class="container row fluid">
        <div class="col-md-4">
            <label for="NmAtlet">Nome Atleta :</label>
            <input class="form-control "name="NmAtlet" type="text" id="NmAtlet" size="50">
            <span class='msg-erro msg-nmatlet'></span>       
        </div>
        <div class="col-md-2">
            <label for="CdCota">Número Cota :</label> 
            <input class="form-control" name="CdCota" type="text" id="CdCota">
            <span class='msg-erro msg-cdcota'></span> 
        </div>
        <div class="col-md-2">
            <label for="DcIdent">CPF :</label> 
            <input class="form-control" name="DcIdent" type="text" id="DcIdent">
            <span class='msg-erro msg-dcident'></span> 
        </div>
        <div class="col-md-2">
            <label for="DtNasc">Data Nascimento :</label> 
            <input class="form-control" name="DtNasc" type="text" id="DtNasc">
            <span class='msg-erro msg-dtnasc'></span>
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
    </div>
    </fieldset>
    <fieldset>
    <legend><h2>DADOS DE CONTATO</h2></legend>
    <div class=" container row fluid">
        <div class="col-md-5">    
            <label for="Rua">Rua :</label>
            <input class="form-control" name="Rua" type="text" id="Rua" maxlength="60">
            <span class='msg-erro msg-rua'></span>
        </div>
        <div class="col-md-2">
            <label for="Num">Numero :</label>
            <input class="form-control" name="Num" type="text" id="Num" size="5">
            <span class='msg-erro msg-numero'></span>
        </div>
        <div class="col-md-5">
            <label for="Compl">Complemento :</label>
            <input class="form-control" name="Compl" type="text" id="Compl" maxlength="60">
            <span class='msg-erro msg-compl'></span>
        </div>
    </div>
    <br>
    <div class="container row fluid">        
        <div class="col-md-4">  
            <label for="Bairro">Bairro :</label>
            <input class="form-control" name="Bairro" type="text" id="Bairro" size="45">
            <span class='msg-erro msg-bairro'></span>
        </div>
        <div class="col-md-4">
            <label for="Cidade">Cidade :</label>
            <input class="form-control" name="Cidade" type="text" id="Cidade" size="45">
            <span class='msg-erro msg-cidade'></span>
        </div>
        <div class="col-md-2">
            <label for="Cep">Cep :</label>
            <input class="form-control" name="Cep" type="text" id="Cep" size="8">
            <span class='msg-erro msg-cep'></span>
        </div>
        <div class="col-md-2">
            <label for="Estado">Estado :</label>
            <Select class="form-control" name="Estado" id="Estado">
            	<option value="">Selecione...</option>
                <option value="AC">Acre</option> 
                <option value="AL">Alagoas</option> 
                <option value="AM">Amazonas</option> 
                <option value="AP">Amapá</option> 
                <option value="BA">Bahia</option> 
                <option value="CE">Ceará</option> 
                <option value="DF">Distrito Federal</option> 
                <option value="ES">Espírito Santo</option> 
                <option value="GO">Goiás</option> 
                <option value="MA">Maranhão</option> 
                <option value="MT">Mato Grosso</option> 
                <option value="MS">Mato Grosso do Sul</option> 
                <option value="MG">Minas Gerais</option> 
                <option value="PA">Pará</option> 
                <option value="PB">Paraíba</option> 
                <option value="PR">Paraná</option> 
                <option value="PE">Pernambuco</option> 
                <option value="PI">Piauí</option> 
                <option value="RJ">Rio de Janeiro</option> 
                <option value="RN">Rio Grande do Norte</option> 
                <option value="RO">Rondônia</option> 
                <option value="RS">Rio Grande do Sul</option> 
                <option value="RR">Roraima</option> 
                <option value="SC">Santa Catarina</option> 
                <option value="SE">Sergipe</option> 
                <option value="SP">São Paulo</option> 
                <option value="TO">Tocantins</option> 
            </select>
            <span class='msg-erro msg-estado'></span>
        </div>
    </div>
    <br>
    <div class=" container row fluid">
        <div class="col-md-3">
            <label for="Telef1">Telefone Celular :</label> 
            <input class="form-control" name="Telef1" type="text" id="Telef1">
            <span class='msg-erro msg-telef1'></span> 
        </div>
        <div class="col-md-3">    
            <label for="Telef2">Telefone Fixo :</label>
            <input class="form-control" name="Telef2" type="text" id="Telef2">
            <span class='msg-erro msg-telef2'></span>
        </div>
        <div class="col-md-6">
            <label for="Email">E-mail :</label> 
            <input class="form-control" name="Email" type="email" id="Email" size="60"> 
            <span class='msg-erro msg-email'></span>
        </div>
    </div>
    </fieldset>
    <fieldset>
    <legend><h2>DADOS CLASSIFICAÇÃO</h2></legend>
    <div class="container row fluid">
        <div class="col-md-6">
        <fieldset>
        <legend><h4>AVALIAÇÃO FÍSICA</h4></legend>
            <div class="col-md-6">    
                <label for="peso">PESO :</label>
                <input class="form-control" name="Peso" type="text" id="Peso" placeholder="Ex: 80,00">
                <span class='msg-erro msg-peso'></span>
            </div>
            <div class="col-md-6">
                <label for="altura">ALTURA :</label>
                <input class="form-control" name="Altura" type="text" id="Altura" placeholder="Ex: 1,80">
                <span class='msg-erro msg-altura'></span>
            </div>
        </fieldset>
        </div>
        <div class="col-md-6">
        <fieldset>
        <legend><h4>DEFINIÇÃO POSIÇÃO</h4></legend>
            <div class="col-md-6">
                <label>FUNÇÃO :</label>
                <select class="form-control" id="Funcao" name="Funcao" onchange="loadList(this.value)">
                    <option value="x">Selecione...</option> 
                    <option value="Goleiro">Goleiro</option> 
                    <option value="Defesa">Defesa</option> 
                    <option value="Meio_Campo">Meio-Campo</option>
                    <option value="Ataque">Ataque</option>
                </select>
                <span class='msg-erro msg-classe'></span>
            </div>
            <div class="col-md-6">
                <label>POSIÇÃO :</label>
                <select class="form-control" id="Posicao" name="Posicao">
                </select>
                <span class='msg-erro msg-posicao'></span>
            </div>
        </fieldset>
        </div>
    </div>
    </fieldset>
    <input type="hidden" name = "acao" value="incluir">
    <button type="submit" class="btn btn-primary" id='botao'>Gravar</button>
    </form> 
</div>
<script type="text/javascript" src="/megaliga/js/vld-atleta.js"></script>
</body> 
</html> 