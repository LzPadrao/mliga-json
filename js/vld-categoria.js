/* Atribui ao evento submit do formulário a função de validação de dados */
var form = document.getElementById("Categoria");
if (form.addEventListener) {                   
    form.addEventListener("submit", validaCadastro);
} else if (form.attachEvent) {                  
    form.attachEvent("onsubmit", validaCadastro);
}

/* Atribui ao evento keypress do input datas de inicio do campeonato a função para formatar o data (dd/mm/yyyy) */
var inputDataMin = document.getElementById("DtMin");
if (inputDataMin.addEventListener) {                   
    inputDataMin.addEventListener("keypress", function(){mascaraTexto(this, '##/##/####')});
} else if (inputDataMin.attachEvent) {                  
    inputDataMin.attachEvent("onkeypress", function(){mascaraTexto(this, '##/##/####')});
}

/* Atribui ao evento keypress do input data de fim do campeonato a função para formatar o data (dd/mm/yyyy) */
var inputDataMax = document.getElementById("DtMax");
if (inputDataMax.addEventListener) {                   
    inputDataMax.addEventListener("keypress", function(){mascaraTexto(this, '##/##/####')});
} else if (inputDataMax.attachEvent) {                  
    inputDataMax.attachEvent("onkeypress", function(){mascaraTexto(this, '##/##/####')});
}

/* Função para validar os dados antes da submissão dos dados */
function validaCadastro(evt)
{
	var cat_camp	= document.getElementById('TbCamp');
	var cat_nome	= document.getElementById('NmCateg');
	var cat_abrev	= document.getElementById('AbCateg');
	var cat_dtmin 	= document.getElementById('DtMin');
	var cat_dtmax 	= document.getElementById('DtMax');
	var cat_define 	= document.getElementById('DfTimes');
	var cat_qtimes	= document.getElementById('QtTimes');
	var cat_qatlet	= document.getElementById('QtAtleta');
	var cat_forma	= document.getElementById('DfFormat');
	var cat_vit		= document.getElementById('PtVit');
	var cat_emp		= document.getElementById('PtEmp');
	var cat_der		= document.getElementById('PtDer');
	var cat_partida	= document.getElementById('TePart');
	var cat_interv	= document.getElementById('TeInterv');
	var filtro 		= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var contErro 	= 0;

	/* Validação do campo nome */
	caixa_camp = document.querySelector('.msg-camp');
	if(cat_nome.value == ""){
		caixa_camp.innerHTML = "Informe o campeonato";
		caixa_camp.style.display = 'block';
		contErro += 1;
	}else{
		caixa_camp.style.display = 'none';
	}

	/* Validação do campo nome */
	caixa_nome = document.querySelector('.msg-nomecat');
	if(cat_nome.value == ""){
		caixa_nome.innerHTML = "Informe o nome da categoria";
		caixa_nome.style.display = 'block';
		contErro += 1;
	}else{
		caixa_nome.style.display = 'none';
	}
	
	caixa_abrev = document.querySelector('.msg-nomeabv');
	if(cat_abrev.value == ""){
		caixa_abrev.innerHTML = "Informe uma abreviação";
		caixa_abrev.style.display = 'block';
		contErro += 1;
	}else{
		caixa_abrev.style.display = 'none';
	}	

	/* Validação do campo data mínima*/
	caixa_dtmin = document.querySelector('.msg-dtmin');
	if(cat_dtmin.value == ""){
		caixa_dtmin.innerHTML = "Informe data mínima para a categoria";
		caixa_dtmin.style.display = 'block';
		contErro += 1;
	}else{
		caixa_dtmin.style.display = 'none';
	}

	/* Validação do campo data máxima*/
	caixa_dtmax = document.querySelector('.msg-dtmax');
	if(cat_dtmax.value == ""){
		caixa_dtmax.innerHTML = "Informe data máxima para a categoria";
		caixa_dtmax.style.display = 'block';
		contErro += 1;
	}else{
		caixa_dtmax.style.display = 'none';
	}
	
	/* Validação do campo definição da categoria */
	caixa_define = document.querySelector('.msg-dftime');
	if(cat_define.value == ""){
		caixa_define.innerHTML = "Informe a definição do campeonato";
		caixa_define.style.display = 'block';
		contErro += 1;
	}else{
		caixa_status.style.display = 'none';
	}

	/* Validação da quantidade de times da categoria */
	caixa_qtimes = document.querySelector('.msg-qtime');
	if(cat_qtimes.value == ""){
		caixa_qtimes.innerHTML = "Informe a quantidade de times";
		caixa_qtimes.style.display = 'block';
		contErro += 1;
	}else{
		caixa_qtimes.style.display = 'none';
	}

	/* Validação da quantidade de atletas da categoria */
	caixa_qatlet = document.querySelector('.msg-qtatl');
	if(cat_qatlet.value == ""){
		caixa_qatlet.innerHTML = "Informe atletas por times";
		caixa_qatlet.style.display = 'block';
		contErro += 1;
	}else{
		caixa_qatlet.style.display = 'none';
	}

	/* Validação do formato da categoria */
	caixa_format = document.querySelector('.msg-formato');
	if(cat_forma.value == ""){
		caixa_format.innerHTML = "Informe o formato da categoria";
		caixa_format.style.display = 'block';
		contErro += 1;
	}else{
		caixa_format.style.display = 'none';
	}

	/* Validação pontuacao vitoria da categoria */
	caixa_pvit = document.querySelector('.msg-vitoria');
	if(cat_vit.value == ""){
		caixa_pvit.innerHTML = "Informe os pontos quando vitória";
		caixa_pvit.style.display = 'block';
		contErro += 1;
	}else{
		caixa_pvit.style.display = 'none';
	}

	/* Validação pontuacao empate da categoria */
	caixa_pemp = document.querySelector('.msg-empate');
	if(cat_emp.value == ""){
		caixa_pemp.innerHTML = "Informe os pontos quando vitória";
		caixa_pemp.style.display = 'block';
		contErro += 1;
	}else{
		caixa_pemp.style.display = 'none';
	}

	/* Validação pontuacao derrota da categoria */
	caixa_pder = document.querySelector('.msg-derrota');
	if(cat_der.value == ""){
		caixa_pder.innerHTML = "Informe os pontos quando vitória";
		caixa_pder.style.display = 'block';
		contErro += 1;
	}else{
		caixa_pder.style.display = 'none';
	}

	/* Validação tempo total de partida */
	caixa_tempo = document.querySelector('.msg-tpart');
	if(cat_partida.value == ""){
		caixa_tempo.innerHTML = "Informe o tempo total de partida";
		caixa_tempo.style.display = 'block';
		contErro += 1;
	}else{
		caixa_tempo.style.display = 'none';
	}

	/* Validação tempo intervalo */
	caixa_interv = document.querySelector('.msg-tinterv');
	if(cat_interv.value == ""){
		caixa_interv.innerHTML = "Informe o tempo de intervalo";
		caixa_interv.style.display = 'block';
		contErro += 1;
	}else{
		caixa_interv.style.display = 'none';
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

/* Função para exibir a imagem selecionada no input file na elemento <img>  
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
*/