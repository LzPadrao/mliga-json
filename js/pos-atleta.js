var x = new Array("");
var Goleiro = new Array("Goleiro");
var Defesa = new Array("Zagueiro","Lateral Direito","Lateral Esquerdo");
var Meio_Campo = new Array("Volante","Ala Direito","Ala Esquerdo","Meia Armador","Medio Centro","Meio Lateral Direito","Meio Lateral Esquerdo","Meia Atacante");
var Ataque = new Array("Ponta","Segundo Atacante","Centro Avante");

function loadList(v) 
{
var listaEscolhida 	= eval(v);

document.CadastraAtleta.Posicao.options.length = listaEscolhida.length;
	for (i=0; i<listaEscolhida.length; i++) 
	{
		document.CadastraAtleta.Posicao.options[i] = new Option(listaEscolhida[i], listaEscolhida[i]);
	}
}

function resetLists() 
{
	loadList("x");
	document.CadastraAtleta.Funcao.options[0].selected = true;
}
window.onload = resetLists;