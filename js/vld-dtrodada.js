/* Atribui ao evento submit do formulário a função de validação de dados */
var form = document.getElementById("DtRod");
if (form.addEventListener) {                   
    form.addEventListener("submit", validaCadastro);
} else if (form.attachEvent) {                  
    form.attachEvent("onsubmit", validaCadastro);
}

/* Função para validar os dados antes da submissão dos dados */
function validaCadastro(evt)
{
	var idcateg		= document.getElementById('IdCateg');
	var data 		= document.getElementById('DtJogo');
	var dia_semana 	= document.getElementById('DiaSemana');
	var qtjogo	 	= document.getElementById('QtJog');
	var estadio 	= document.getElementById('Estadio');
	var filtro 		= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var contErro 	= 0;

	/* Validação do campo categoria */
	caixa_categ = document.querySelector('.msg-idcateg');
	if(idcateg.value == ""){
		caixa_categ.innerHTML = "Favor preencher a categoria";
		caixa_categ.style.display = 'block';
		contErro += 1;
	}else{
		caixa_categ.style.display = 'none';
	}

	/* Validação do campo data */
	caixa_data = document.querySelector('.msg-dtjogo');
	if(nome.value == ""){
		caixa_data.innerHTML = "Favor preencher a data";
		caixa_data.style.display = 'block';
		contErro += 1;
	}else{
		caixa_data.style.display = 'none';
	}
	
	/* Validação do campo dia da semana*/
	caixa_semana = document.querySelector('.msg-diasemana');
	if(semana.value == ""){
		caixa_semana.innerHTML = "Favor preencher dia da semana";
		caixa_semana.style.display = 'block';
		contErro += 1;
	}else{
		caixa_semana.style.display = 'none';
	}

	/* Validação do campo quantidade de jogos*/
	caixa_qjogos = document.querySelector('.msg-qtjog');
	if(qtjogo.value == ""){
		caixa_qjogos.innerHTML = "Favor preencher a quantidade de jogos";
		caixa_qjogos.style.display = 'block';
		contErro += 1;
	}else{
		caixa_qjogos.style.display = 'none';
	}
	
	/* Validação do campo status */
	caixa_estadio = document.querySelector('.msg-estadio');
	if(estadio.value == ""){
		caixa_estadio.innerHTML = "Escolha o estadio";
		caixa_estadio.style.display = 'block';
		contErro += 1;
	}else{
		caixa_estadio.style.display = 'none';
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