/* Atribui ao evento submit do formulário a função de validação de dados */
var form = document.getElementById("Colaborador");
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
var inputCPF = document.getElementById("DcColab");
if (inputCPF.addEventListener) {                   
    inputCPF.addEventListener("keypress", function(){mascaraTexto(this, '###.###.###-##')});
} else if (inputCPF.attachEvent) {                  
    inputCPF.attachEvent("onkeypress", function(){mascaraTexto(this, '###.###.###-##')});
}

/* Atribui ao evento change do input FILE para upload da foto*/
var inputFile = document.getElementById("FtColab");
var img_colab = document.getElementById("ImgColab");
if (inputFile.addEventListener) {                   
    inputFile.addEventListener("change", function(){loadFoto(this, img_colab)});
} else if (inputFile.attachEvent) {                  
    inputFile.attachEvent("onchange", function(){loadFoto(this, img_colab)});
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
	var nome		= document.getElementById('NmColab');
	var doc 		= document.getElementById('DcColab');
	var sexo	 	= document.getElementById('Sexo');
	var nasc 		= document.getElementById('DtNasc');
	var rua 		= document.getElementById('RuColab');
	var num 		= document.getElementById('NuColab');
	var bair		= document.getElementById('Bairro');
	var cidad		= document.getElementById('Cidade');
	var cep			= document.getElementById('Cep');
	var est			= document.getElementById('Estado');
	var tel1		= document.getElementById('Telef1');
	var correio		= document.getElementById('Email');
	var comis		= document.getElementById('Comissao');
	var func		= document.getElementById('FnColab');
	var filtro 		= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var contErro 	= 0;


	/* Validação do campo Nome Colaborador */
	caixa_nome = document.querySelector('.msg-nomecolab');
	if(nome.value == ""){
		caixa_nome.innerHTML = "Favor preencher o nome do colaborador";
		caixa_nome.style.display = 'block';
		contErro += 1;
	}else{
		caixa_nome.style.display = 'none';
	}
	
	/* Validação do campo Cpf*/
	caixa_doc = document.querySelector('.msg-cpf');
	if(doc.value == ""){
		caixa_doc.innerHTML = "Favor preencher o cpf do colaborador";
		caixa_doc.style.display = 'block';
		contErro += 1;
	}else{
		caixa_doc.style.display = 'none';
	}

	/* Validação do campo Sexo*/
	caixa_sexo = document.querySelector('.msg-sexo');
	if(sexo.value == ""){
		caixa_sexo.innerHTML = "Favor preencher o sexo do colaborador";
		caixa_sexo.style.display = 'block';
		contErro += 1;
	}else{
		caixa_sexo.style.display = 'none';
	}
	
	/* Validação do campo Data Nascimento */
	caixa_nasc = document.querySelector('.msg-dtnasc');
	if(nasc.value == "")
	{
		caixa_nasc.innerHTML = "Favor preencher a data de nascimento do colaborador";
		caixa_nasc.style.display = 'block';
		contErro += 1;
	}else{
		caixa_status.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação da Rua */
	caixa_rua = document.querySelector('.msg-rua');
	if(rua.value == ""){
		caixa_rua.innerHTML = "Favor preencher a rua do endereço";
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
		caixa_num.innerHTML = "Favor preencher o número do endereço";
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
		caixa_bairro.innerHTML = "Favor preencher o bairro do endereço";
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
		caixa_cidade.innerHTML = "Favor preencher a cidade do endereço";
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
		caixa_cep.innerHTML = "Favor preencher o cep do endereço";
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
		caixa_est.innerHTML = "Favor preencher o estado do endereço";
		caixa_est.style.display = 'block';
		contErro += 1;
	}else{
		caixa_est.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação do Telefone Celular */
	caixa_tel = document.querySelector('.msg-telef');
	if(tel1.value == ""){
		caixa_tel.innerHTML = "Favor preencher o telefone do colaborador";
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
		caixa_email.innerHTML = "Favor preencher o email do colaborador";
		caixa_email.style.display = 'block';
		contErro += 1;
	}else{
		caixa_email.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação da Comissao */
	caixa_comis = document.querySelector('.msg-comissao');
	if(comis.value == ""){
		caixa_comis.innerHTML = "Favor preencher a comissão do colaborador";
		caixa_comis.style.display = 'block';
		contErro += 1;
	}else{
		caixa_email.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}

	/* Validação da Função */
	caixa_func = document.querySelector('.msg-fcolab');
	if(func.value == ""){
		caixa_func.innerHTML = "Favor preencher a função do colaborador";
		caixa_func.style.display = 'block';
		contErro += 1;
	}else{
		caixa_func.style.display = 'none';
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