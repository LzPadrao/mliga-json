/* Atribui ao evento submit do formulário a função de validação de dados */
var form = document.getElementById("Campeonato");
if (form.addEventListener) {                   
    form.addEventListener("submit", validaCadastro);
} else if (form.attachEvent) {                  
    form.attachEvent("onsubmit", validaCadastro);
}

/* Atribui ao evento keypress do input datas de inicio do campeonato a função para formatar o data (dd/mm/yyyy) */
var inputDataIniCamp = document.getElementById("DtIni");
if (inputDataIniCamp.addEventListener) {                   
    inputDataIniCamp.addEventListener("keypress", function(){mascaraTexto(this, '##/##/####')});
} else if (inputDataIniCamp.attachEvent) {                  
    inputDataIniCamp.attachEvent("onkeypress", function(){mascaraTexto(this, '##/##/####')});
}

/* Atribui ao evento keypress do input data de fim do campeonato a função para formatar o data (dd/mm/yyyy) */
var inputDataFimCamp = document.getElementById("DtFim");
if (inputDataFimCamp.addEventListener) {                   
    inputDataFimCamp.addEventListener("keypress", function(){mascaraTexto(this, '##/##/####')});
} else if (inputDataFimCamp.attachEvent) {                  
    inputDataFimCamp.attachEvent("onkeypress", function(){mascaraTexto(this, '##/##/####')});
}

/* Atribui ao evento change do input FILE para upload da foto*/
var inputFile = document.getElementById("ArqLogo");
var logo_campeonato = document.getElementById("img-campeonato");
if (inputFile.addEventListener) {                   
    inputFile.addEventListener("change", function(){loadFoto(this, logo_campeonato)});
} else if (inputFile.attachEvent) {                  
    inputFile.attachEvent("onchange", function(){loadFoto(this, logo_campeonato)});
}

/* Atribui ao evento change do input FILE para upload da foto PATROCINADOR-1*/
var inputFile1 = document.getElementById("Patr1");
var patrocinador_1 = document.getElementById("img-patr1");
if (inputFile1.addEventListener) {                   
    inputFile1.addEventListener("change", function(){loadFoto(this, patrocinador_1)});
} else if (inputFile1.attachEvent) {                  
    inputFile1.attachEvent("onchange", function(){loadFoto(this, patrocinador_1)});
}

/* Atribui ao evento change do input FILE para upload da foto PATROCINADOR-2*/
var inputFile2 = document.getElementById("Patr2");
var patrocinador_2 = document.getElementById("img-patr2");
if (inputFile2.addEventListener) {                   
    inputFile2.addEventListener("change", function(){loadFoto(this, patrocinador_2)});
} else if (inputFile2.attachEvent) {                  
    inputFile2.attachEvent("onchange", function(){loadFoto(this, patrocinador_2)});
}

/* Atribui ao evento change do input FILE para upload da foto PATROCINADOR-3*/
var inputFile3 = document.getElementById("Patr3");
var patrocinador_3 = document.getElementById("img-patr3");
if (inputFile3.addEventListener) {                   
    inputFile3.addEventListener("change", function(){loadFoto(this, patrocinador_3)});
} else if (inputFile3.attachEvent) {                  
    inputFile3.attachEvent("onchange", function(){loadFoto(this, patrocinador_3)});
}

/* Função para validar os dados antes da submissão dos dados */
function validaCadastro(evt)
{
	var nome 		= document.getElementById('NmCamp');
	var data_ini 	= document.getElementById('DtIni');
	var data_fim 	= document.getElementById('DtFim');
	var situacao 	= document.getElementById('StCamp')
	var filtro 		= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var contErro 	= 0;


	/* Validação do campo nome */
	caixa_nome = document.querySelector('.msg-nome');
	if(nome.value == ""){
		caixa_nome.innerHTML = "Favor preencher o Nome do campeonato";
		caixa_nome.style.display = 'block';
		contErro += 1;
	}else{
		caixa_nome.style.display = 'none';
	}
	
	/* Validação do campo data inicial*/
	caixa_dataI = document.querySelector('.msg-data_ini');
	if(data_ini.value == ""){
		caixa_dataI.innerHTML = "Favor preencher a data inicial do campeonato";
		caixa_dataI.style.display = 'block';
		contErro += 1;
	}else{
		caixa_dataI.style.display = 'none';
	}

	/* Validação do campo data final*/
	caixa_dataF = document.querySelector('.msg-data_fim');
	if(data_fim.value == ""){
		caixa_dataF.innerHTML = "Favor preencher a data final do campeonato";
		caixa_dataF.style.display = 'block';
		contErro += 1;
	}else{
		caixa_dataF.style.display = 'none';
	}
	
	/* Validação do campo status */
	caixa_status = document.querySelector('.msg-situacao');
	if(status.value == ""){
		caixa_status.innerHTML = "Defina a situacao do campeonato";
		caixa_status.style.display = 'block';
		contErro += 1;
	}else{
		caixa_status.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}
}

/* Função para formatar dados conforme parâmetro enviado, CPF, DATA, TELEFONE e CELULAR */
function mascaraTexto(t, mask){
	var i = t.value.length;
	var saida = mask.substring(1,0);
	var texto = mask.substring(i);

	if (texto.substring(0,1) != saida){
		t.value += texto.substring(0,1);
	}
}

/* Função para exibir a imagem selecionada no input file na elemento <img>  */
function loadFoto(file, img)
{
    if (file.files && file.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
           img.src = e.target.result;
        }
        reader.readAsDataURL(file.files[0]);
    }
}