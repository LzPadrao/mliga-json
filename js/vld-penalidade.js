/* Atribui ao evento submit do formulário a função de validação de dados */
var form = document.getElementById("Penalidade");
if (form.addEventListener) {                   
    form.addEventListener("submit", validaCadastro);
} else if (form.attachEvent) {                  
    form.attachEvent("onsubmit", validaCadastro);
}

/* Função para validar os dados antes da submissão dos dados */
function validaCadastro(evt)
{
	var pen_categ	= document.getElementById('IdCateg');
	var pen_tpenal	= document.getElementById('TpPenal');
	var pen_dspen	= document.getElementById('DsPenal');
	var pen_efsusp 	= document.getElementById('EfSusp');
	var pen_recur	= document.getElementById('Recurso');
	var pen_drecur	= document.getElementById('DsRecur');
	var pen_multa	= document.getElementById('Multa');
	var pen_vmulta	= document.getElementById('VlMulta');
	var pen_multar	= document.getElementById('MultaRec');
	var pen_vmultar	= document.getElementById('VlMultaR');
	var filtro 		= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var contErro 	= 0;

	/* Validação do tipo categoria */
	caixa_cat = document.querySelector('.msg-idcateg');
	if(pen_categ.value == ""){
		caixa_cat.innerHTML = "Informe a categoria";
		caixa_cat.style.display = 'block';
		contErro += 1;
	}else{
		caixa_cat.style.display = 'none';
	}

	/* Validação do tipo da penalidade */
	caixa_penal = document.querySelector('.msg-tppenal');
	if(pen_tpenal.value == ""){
		caixa_penal.innerHTML = "Informe o tipo de penalidade";
		caixa_penal.style.display = 'block';
		contErro += 1;
	}else{
		caixa_penal.style.display = 'none';
	}

	/* Validação da descrição da penalidade */
	caixa_dspen = document.querySelector('.msg-dspenal');
	if(pen_dspen.value == ""){
		caixa_dspen.innerHTML = "Informe a descrição da penalidade";
		caixa_dspen.style.display = 'block';
		contErro += 1;
	}else{
		caixa_dspen.style.display = 'none';
	}
	
	/* Validação do efeito suspensivo */
	caixa_efsusp = document.querySelector('.msg-efsusp');
	if(pen_efsusp.value == ""){
		caixa_efsusp.innerHTML = "Informe o efeito suspensivo";
		caixa_efsusp.style.display = 'block';
		contErro += 1;
	}else{
		caixa_efsusp.style.display = 'none';
	}	

	/* Validação do campo recurso*/
	caixa_recur = document.querySelector('.msg-recurso');
	if(pen_recur.value == ""){
		caixa_recur.innerHTML = "Informe se permite recurso";
		caixa_recur.style.display = 'block';
		contErro += 1;
	}else{
		caixa_recur.style.display = 'none';
	}

	/* Validação do campo multa*/
	caixa_multa = document.querySelector('.msg-multa');
	if(pen_multa.value == ""){
		caixa_multa.innerHTML = "Informe se aplica multa";
		caixa_multa.style.display = 'block';
		contErro += 1;
	}else{
		caixa_dtmax.style.display = 'none';
	}

	/* Validação de recorrencia de penalidade */
	caixa_multar = document.querySelector('.msg-multarec');
	if(pen_multar.value == ""){
		caixa_multar.innerHTML = "Informe se há recorrencia na penalidade";
		caixa_multar.style.display = 'block';
		contErro += 1;
	}else{
		caixa_multar.style.display = 'none';
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