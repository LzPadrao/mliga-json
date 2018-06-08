/* Atribui ao evento submit do formulário a função de validação de dados */
var form = document.getElementById("Time");
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

/* Atribui ao evento change do input FILE para upload do escudo*/
var escudo = document.getElementById("Escudo");
var temp_escudo = document.getElementById("ImgEscudo");
if (escudo.addEventListener) {                   
    escudo.addEventListener("change", function(){loadFoto(this, temp_escudo)});
} else if (escudo.attachEvent) {                  
    escudo.attachEvent("onchange", function(){loadFoto(this, temp_escudo)});
}

/* Atribui ao evento change do input FILE para upload do patrocinador 1*/
var patr1 = document.getElementById("Patr1");
var temp_patr1 = document.getElementById("ImgPatr1");
if (patr1.addEventListener) {                   
    patr1.addEventListener("change", function(){loadFoto(this, temp_patr1)});
} else if (patr1.attachEvent) {                  
    patr1.attachEvent("onchange", function(){loadFoto(this, temp_patr1)});
}

/* Atribui ao evento change do input FILE para upload do patrocinador 2*/
var patr2 = document.getElementById("Patr2");
var temp_patr2 = document.getElementById("ImgPatr2");
if (patr2.addEventListener) {                   
    patr2.addEventListener("change", function(){loadFoto(this, temp_patr2)});
} else if (patr2.attachEvent) {                  
    patr2.attachEvent("onchange", function(){loadFoto(this, temp_patr2)});
}

/* Atribui ao evento change do input FILE para upload patrocinador 3*/
var patr3 = document.getElementById("Patr3");
var temp_patr3 = document.getElementById("ImgPatr3");
if (patr3.addEventListener) {                   
    patr3.addEventListener("change", function(){loadFoto(this, temp_patr3)});
} else if (patr3.attachEvent) {                  
    patr3.attachEvent("onchange", function(){loadFoto(this, temp_patr3)});
}

/* Função para validar os dados antes da submissão dos dados */
function validaCadastro(evt)
{
	var IdCateg			= document.getElementById('categ');
	var nome 			= document.getElementById('NmTime');
	var qtjog		 	= document.getElementById('QtJog');
	var repres	 		= document.getElementById('NmRep');
	var filtro 			= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var contErro 		= 0;

	/* Validação da categoria */
	caixa_categ = document.querySelector('.msg-categ');
	if(IdCateg.value == ""){
		caixa_categ.innerHTML = "Favor preencher a categoria";
		caixa_categ.style.display = 'block';
		contErro += 1;
	}else{
		caixa_categ.style.display = 'none';
	}

	/* Validação do campo nome time */
	caixa_time = document.querySelector('.msg-nmtime');
	if(nome.value == ""){
		caixa_time.innerHTML = "Favor preencher o nome do time";
		caixa_time.style.display = 'block';
		contErro += 1;
	}else{
		caixa_time.style.display = 'none';
	}
	
	/* Validação do campo quantidade jogadores*/
	caixa_jogad = document.querySelector('.msg-qtjog');
	if(qtjog.value == ""){
		caixa_jogad.innerHTML = "Favor preencher a quantidade de jogadores";
		caixa_jogad.style.display = 'block';
		contErro += 1;
	}else{
		caixa_jogad.style.display = 'none';
	}

	/* Validação do campo representante*/
	caixa_repres = document.querySelector('.msg-nmrep');
	if(repres.value == ""){
		caixa_repres.innerHTML = "Favor preencher nome do representante";
		caixa_repres.style.display = 'block';
		contErro += 1;
	}else{
		caixa_repres.style.display = 'none';
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