/* Atribui ao evento submit do formulário a função de validação de dados */
var form = document.getElementById("Estadio");
if (form.addEventListener) {                   
    form.addEventListener("submit", validaCadastro);
} else if (form.attachEvent) {                  
    form.attachEvent("onsubmit", validaCadastro);
}

/* Atribui ao evento keypress do input datas de inicio do campeonato a função para formatar o data (dd/mm/yyyy) 
var inputDataIniCamp = document.getElementById("DtIni");
if (inputDataIniCamp.addEventListener) {                   
    inputDataIniCamp.addEventListener("keypress", function(){mascaraTexto(this, '##/##/####')});
} else if (inputDataIniCamp.attachEvent) {                  
    inputDataIniCamp.attachEvent("onkeypress", function(){mascaraTexto(this, '##/##/####')});
}
*/

/* Atribui ao evento keypress do input data de fim do campeonato a função para formatar o data (dd/mm/yyyy) 
var inputDataFimCamp = document.getElementById("DtFim");
if (inputDataFimCamp.addEventListener) {                   
    inputDataFimCamp.addEventListener("keypress", function(){mascaraTexto(this, '##/##/####')});
} else if (inputDataFimCamp.attachEvent) {                  
    inputDataFimCamp.attachEvent("onkeypress", function(){mascaraTexto(this, '##/##/####')});
}
*/

/* Atribui ao evento change do input FILE para upload da primeira foto do estadio*/
var estadio1 = document.getElementById("Est1");
var temp_estadio1 = document.getElementById("ImgEst1");
if (estadio1.addEventListener) {                   
    estadio1.addEventListener("change", function(){loadFoto(this, temp_estadio1)});
} else if (estadio1.attachEvent) {                  
    estadio1.attachEvent("onchange", function(){loadFoto(this, temp_estadio1)});
}

/* Atribui ao evento change do input FILE para upload da segunda foto do estadio*/
var estadio2 = document.getElementById("Est2");
var temp_estadio2 = document.getElementById("ImgEst2");
if (estadio2.addEventListener) {                   
    estadio2.addEventListener("change", function(){loadFoto(this, temp_estadio2)});
} else if (estadio2.attachEvent) {                  
    estadio2.attachEvent("onchange", function(){loadFoto(this, temp_estadio2)});
}

/* Atribui ao evento change do input FILE para upload da terceira foto do estadio*/
var estadio3 = document.getElementById("Est3");
var temp_estadio3 = document.getElementById("ImgEst3");
if (estadio3.addEventListener) {                   
    estadio3.addEventListener("change", function(){loadFoto(this, temp_estadio3)});
} else if (estadio3.attachEvent) {                  
    estadio3.attachEvent("onchange", function(){loadFoto(this, temp_estadio3)});
}

/* Atribui ao evento change do input FILE para upload da quarta foto do estadio*/
var estadio4 = document.getElementById("Est4");
var temp_estadio4 = document.getElementById("ImgEst4");
if (estadio4.addEventListener) {                   
    estadio4.addEventListener("change", function(){loadFoto(this, temp_estadio4)});
} else if (estadio4.attachEvent) {                  
    estadio4.attachEvent("onchange", function(){loadFoto(this, temp_estadio4)});
}

/* Função para validar os dados antes da submissão dos dados */
function validaCadastro(evt)
{
	var IdCampe			= document.getElementById('TbCamp');
	var nome 			= document.getElementById('NmEstad');
	var comprimento 	= document.getElementById('Compr');
	var largura 		= document.getElementById('Larg');
	var captorcida 		= document.getElementById('CapTorc')
	var filtro 			= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var contErro 		= 0;

	/* Validação do campo nome */
	caixa_camp = document.querySelector('.msg-camp');
	if(IdCampe.value == ""){
		caixa_camp.innerHTML = "Favor preencher o nome do estádio";
		caixa_camp.style.display = 'block';
		contErro += 1;
	}else{
		caixa_camp.style.display = 'none';
	}

	/* Validação do campo nome */
	caixa_nome = document.querySelector('.msg-nome');
	if(nome.value == ""){
		caixa_nome.innerHTML = "Favor preencher o nome do estádio";
		caixa_nome.style.display = 'block';
		contErro += 1;
	}else{
		caixa_nome.style.display = 'none';
	}
	
	/* Validação do campo comprimento*/
	caixa_compr = document.querySelector('.msg-compr');
	if(comprimento.value == ""){
		caixa_compr.innerHTML = "Favor preencher o comprimento do estadio";
		caixa_compr.style.display = 'block';
		contErro += 1;
	}else{
		caixa_compr.style.display = 'none';
	}

	/* Validação do campo largura*/
	caixa_larg = document.querySelector('.msg-larg');
	if(largura.value == ""){
		caixa_larg.innerHTML = "Favor preencher a largura do estadio";
		caixa_larg.style.display = 'block';
		contErro += 1;
	}else{
		caixa_larg.style.display = 'none';
	}
	
	/* Validação do campo capacidade torcida */
	caixa_torc = document.querySelector('.msg-torc');
	if(captorcida.value == ""){
		caixa_torc.innerHTML = "Informe a capacidade de torcida para o estadio";
		caixa_torc.style.display = 'block';
		contErro += 1;
	}else{
		caixa_torc.style.display = 'none';
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