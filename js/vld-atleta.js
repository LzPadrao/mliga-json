/* Atribui ao evento submit do formulário a função de validação de dados */
var form = document.getElementById("atleta");
if (form.addEventListener) {                   
    form.addEventListener("submit", validaCadastro);
} else if (form.attachEvent) {                  
    form.attachEvent("onsubmit", validaCadastro);
}

/* Atribui ao evento keypress do input data de nascimento (dd/mm/yyyy) */
var inputNasc = document.getElementById("DtNasc");
if (inputNasc.addEventListener) {                   
    inputNasc.addEventListener("keypress", function(){mascaraTexto(this, '##/##/####')});
} else if (inputNasc.attachEvent) {                  
    inputNasc.attachEvent("onkeypress", function(){mascaraTexto(this, '##/##/####')});
}

/* Atribui ao evento keypress do input cpf a função para formatar o CPF */
var inputCPF = document.getElementById("DcIdent");
if (inputCPF.addEventListener) {                   
    inputCPF.addEventListener("keypress", function(){mascaraTexto(this, '###.###.###-##')});
} else if (inputCPF.attachEvent) {                  
    inputCPF.attachEvent("onkeypress", function(){mascaraTexto(this, '###.###.###-##')});
}

/* Atribui ao evento keypress do input cep a função para formatar o CEP */
var inputCEP = document.getElementById("Cep");
if (inputCEP.addEventListener) {                   
    inputCEP.addEventListener("keypress", function(){mascaraTexto(this, '##.###-###')});
} else if (inputCEP.attachEvent) {                  
    inputCEP.attachEvent("onkeypress", function(){mascaraTexto(this, '##.###-###')});
}

/* Atribui ao evento change do input FILE para upload da foto*/
var inputFile = document.getElementById("FtAtleta");
var img_atleta = document.getElementById("ImgAtleta");
if (inputFile.addEventListener) {                   
    inputFile.addEventListener("change", function(){loadFoto(this, img_atleta)});
} else if (inputFile.attachEvent) {                  
    inputFile.attachEvent("onchange", function(){loadFoto(this, img_atleta)});
}

/* Atribui ao evento keypress do input telefone a função para formatar o Telefone (00 0000-0000) */
var inputTelefone = document.getElementById("Telef2");
if (inputTelefone.addEventListener) {                   
    inputTelefone.addEventListener("keypress", function(){mascaraTexto(this, '## ####-####')});
} else if (inputTelefone.attachEvent) {                  
    inputTelefone.attachEvent("onkeypress", function(){mascaraTexto(this, '## ####-####')});
}

/* Atribui ao evento keypress do input celular a função para formatar o Celular (00 00000-0000) */
var inputCelular = document.getElementById("Telef1");
if (inputCelular.addEventListener) {                   
    inputCelular.addEventListener("keypress", function(){mascaraTexto(this, '## #####-####')});
} else if (inputCelular.attachEvent) {                  
    inputCelular.attachEvent("onkeypress", function(){mascaraTexto(this, '## #####-####')});
}

/* Função para validar os dados antes da submissão dos dados */
function validaCadastro(evt)
{
	var nome		= document.getElementById('NmAtlet');
	var numcota		= document.getElementById('CdCota');
	var doc 		= document.getElementById('DcIdent');
	var nasc 		= document.getElementById('DtNasc');
	var sexo	 	= document.getElementById('Sexo');
	var rua 		= document.getElementById('Rua');
	var num 		= document.getElementById('Num');
	var bair		= document.getElementById('Bairro');
	var cidad		= document.getElementById('Cidade');
	var cep			= document.getElementById('Cep');
	var est			= document.getElementById('Estado');
	var tel1		= document.getElementById('Telef1');
	var tel2		= document.getElementById('Telef2');
	var correio		= document.getElementById('Email');
	var peso		= document.getElementById('Peso');
	var altura		= document.getElementById('Altura');
	var filtro 		= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var contErro 	= 0;


	/* Validação Nome Atleta */
	caixa_nome = document.querySelector('.msg-nmatlet');
	if(nome.value == ""){
		caixa_nome.innerHTML = "Preencha seu nome";
		caixa_nome.style.display = 'block';
		contErro += 1;
	}else{
		caixa_nome.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* validação Codigo da Cota*/ 
	caixa_cota = document.querySelector('.msg-cdcota');
	if(numcota.value == ""){
		caixa_cota.innerHTML = "Preencha o número da sua cota";
		caixa_cota.style.display = 'block';
		contErro += 1;
	}else{
		caixa_cota.style.display = 'none';
	}
	
	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação do campo Cpf*/
	caixa_doc = document.querySelector('.msg-dcident');
	if(doc.value == ""){
		caixa_doc.innerHTML = "Preencha o CPF";
		caixa_doc.style.display = 'block';
		contErro += 1;
	}else{
		caixa_doc.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação do campo Sexo*/
	caixa_sexo = document.querySelector('.msg-sexo');
	if(sexo.value == ""){
		caixa_sexo.innerHTML = "Preencha o sexo";
		caixa_sexo.style.display = 'block';
		contErro += 1;
	}else{
		caixa_sexo.style.display = 'none';
	}
	
	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação do campo Data Nascimento */
	caixa_nasc = document.querySelector('.msg-dtnasc');
	if(nasc.value == "")
	{
		caixa_nasc.innerHTML = "Preencha a data de nascimento";
		caixa_nasc.style.display = 'block';
		contErro += 1;
	}else{
		caixa_nasc.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação da Rua */
	caixa_rua = document.querySelector('.msg-rua');
	if(rua.value == ""){
		caixa_rua.innerHTML = "Informe a rua do endereço";
		caixa_rua.style.display = 'block';
		contErro += 1;
	}else{
		caixa_rua.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação do Numero */
	caixa_num = document.querySelector('.msg-numero');
	if(num.value == ""){
		caixa_num.innerHTML = "Informe o número";
		caixa_num.style.display = 'block';
		contErro += 1;
	}else{
		caixa_num.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação do Bairro */
	caixa_bairro = document.querySelector('.msg-bairro');
	if(bair.value == ""){
		caixa_bairro.innerHTML = "Informe o bairro do endereço";
		caixa_bairro.style.display = 'block';
		contErro += 1;
	}else{
		caixa_bairro.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação do Cidade */
	caixa_cidade = document.querySelector('.msg-cidade');
	if(cidad.value == ""){
		caixa_cidade.innerHTML = "Informe a cidade";
		caixa_cidade.style.display = 'block';
		contErro += 1;
	}else{
		caixa_cidade.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação do Cep */
	caixa_cep = document.querySelector('.msg-cep');
	if(cep.value == ""){
		caixa_cep.innerHTML = "Informe o cep";
		caixa_cep.style.display = 'block';
		contErro += 1;
	}else{
		caixa_cep.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação do Estado */
	caixa_est = document.querySelector('.msg-estado');
	if(est.value == ""){
		caixa_est.innerHTML = "Informe o estado";
		caixa_est.style.display = 'block';
		contErro += 1;
	}else{
		caixa_est.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação do Telefone Celular */
	caixa_tel = document.querySelector('.msg-telef1');
	if(tel1.value == ""){
		caixa_tel.innerHTML = "Informe o telefone";
		caixa_tel.style.display = 'block';
		contErro += 1;
	}else{
		caixa_tel.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação do Email */
	caixa_email = document.querySelector('.msg-email');
	if(correio.value == ""){
		caixa_email.innerHTML = "Informe um email valido";
		caixa_email.style.display = 'block';
		contErro += 1;
	}else{
		caixa_email.style.display = 'none';
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