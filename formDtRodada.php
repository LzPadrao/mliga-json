<!DOCTYPE html>
<?php
//chama arquivo de conexão
include("conecta.php");
$pdo=conectar(); 

//seleciona os dados na tabela estadio
$qry_estadio = $pdo->prepare("SELECT Nome FROM tbestadio");
$qry_estadio->execute();
$linha=$qry_estadio->fetchAll(PDO::FETCH_OBJ);

//seleciona os dados na tabela categoria
$qry_categoria = $pdo->prepare("SELECT IdCategoria,IdCampeonato,NomeCateg FROM tbcategoria");
$qry_categoria->execute();
$result=$qry_categoria->fetchAll(PDO::FETCH_OBJ);
//?>

<html lang="pt-br"> 
<head>
    <title>ML :: Datas da Rodada</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <link rel="stylesheet" type="text/css" href="/megaliga/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/megaliga/css/estilo.css">
    <script type="text/javascript">
    function mascaraData(campo,e)
    {
        var kC = (document.all) ? event.keyCode : e.keyCode;
        var data = campo.value;
        
        if( kC!=8 && kC!=46 )
        {
            if( data.length==2 )
            {
                campo.value = data += '/';
            }
            else if( data.length==5 )
            {
                campo.value = data += '/';
            }
            else
                campo.value = data;
        }
    }
    </script>
</head> 
<body> 
<script src="/megaliga/js/jquery.js"></script>
<script src="/megaliga/js/bootstrap.min.js"></script>
<div class="col-md-10">
    <form class="form-group" id="DtRod" name="DataRodada" method="post" action="#" enctype="multipart/form-data">
    <div class="container">
        <fieldset>
        <legend><h3>CATEGORIA</h3></legend>
            <div class="row">
                <div class="col-md-5">
                <label>Selecione a categoria : </label>
                    <select class="form-control" name="IdCateg" id="IdCateg">
                        <option value="">Selecione</option>
                        <!-- iteração do PHP para preencimento da SELECT -->
                        <?php foreach ($result as $categ){ ?>
                        <option value="<?php echo "$categ->IdCategoria"?>"><?php echo "$categ->NomeCateg"?></option>  
                        <?php } ?>  
                    </select>
                    <span class='msg-erro msg-idcateg'></span>
                </div>
            </div>
        </fieldset>
        <fieldset>
        <legend><h3>DIAS DA RODADA</h3></legend>
            <div class="row">
                <div class="col-md-2">
                    <label for="DtJogo">Data :</label>
                    <input class="form-control" name="DtJogo" type="text" id="DtJogo" onkeypress="mascaraData( this, event )">
                    <span class='msg-erro msg-dtjogo'></span>
                </div>
                <div class="col-md-3">
                    <label for="DiaSemana"></label>
                    <select class="form-control" id="DiaSemana" name="DiaSemana">
                    	<option value="">Selecione</option> 
                        <option value="DOMINGO">Domingo</option> 
                        <option value="SEGUNDA-FEIRA">Segunda-Feira</option> 
                        <option value="TERCA-FEIRA">Terça-Feira</option> 
                        <option value="QUARTA-FEIRA">Quarta-Feira</option>
                        <option value="QUINTA-FEIRA">Quinta-Feira</option> 
                        <option value="SEXTA-FEIRA">Sexta-Feira</option> 
                        <option value="SABADO">Sábado</option>
                    </select>
                    <span class='msg-erro msg-diasemana'></span>
                </div>
                <div class="col-md-2">
                    <label for="QtJog">Quantidade jogos :</label>
                    <input class="form-control" name="QtJog" type="text" id="QtJog">
                    <span class='msg-erro msg-qtjog'></span>
                </div>
                <div class="col-md-3">
                    <label for="Estadio">Estadio :</label>
                    <select class="form-control"  name="Estadio" id="Estadio">
                        <option value="">Selecione</option>
                        <!-- iteração do PHP para preencimento da SELECT -->
                        <?php foreach ($linha as $list){ ?>
                        <option value="<?php echo "$list->Nome"?>"><?php echo "$list->Nome"?></option>  
                        <?php } ?>
                    </select>
                    <span class='msg-erro msg-estadio'></span>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="container col-md-10">
        <input type="hidden" name = "acao" value="incluir">
        <button type="submit" class="btn btn-primary" id='botao'>Gravar</button>
    </div>
    </form> 
    <script type="text/javascript" src="/megaliga/js/vld-dtrodada.js"></script>
</div>
    
</div>
</body> 
</html> 