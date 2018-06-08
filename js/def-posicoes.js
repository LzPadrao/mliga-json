function defposicao()
{
	var funcao	=  document.getElementById('funcao');
	
	if(funcao.value == "GOLEIRO")
	{
		document.getElementById("funcao").onchange = function()
		{
			var comboPosic = document.getElementById("posicao");

			var opc0 = document.createElement("option");
    		opc0.value = "GOLEIRO";
    		opt0.text = "Goleiro";
    		comboPosic.add(opc0, comboPosic.options[0]);
		}
	}
	else if(funcao.value == "DEFESA")
	{
		document.getElementById("funcao").onchange = function()
		{
			var comboPosic = document.getElementById("posicao");

			var opc0 = document.createElement("option");
    		opc0.value = "ZAGUEIRO";
    		opt0.text = "Zagueiro";
    		comboPosic.add(opc0, comboPosic.options[0]);

    		var opc1 = document.createElement("option");
    		opc1.value = "LATERAL DIREITO";
    		opt1.text = "Lateral Direito";
    		comboPosic.add(opc1, comboPosic.options[1]);

    		var opc2 = document.createElement("option");
    		opc2.value = "LATERAL ESQUERDO";
    		opt2.text = "Lateral Esquerdo";
    		comboPosic.add(opc2, comboPosic.options[2]);
		}
	}
	else if(funcao.value == "MEIO-CAMPO")
	{
		document.getElementById("funcao").onchange = function()
		{
			var comboPosic = document.getElementById("posicao");

			var opc0 = document.createElement("option");
    		opc0.value = "VOLANTE";
    		opt0.text = "Volante";
    		comboPosic.add(opc0, comboPosic.options[0]);

    		var opc1 = document.createElement("option");
    		opc1.value = "ALA DIREITO";
    		opt1.text = "Ala Direito";
    		comboPosic.add(opc1, comboPosic.options[1]);

    		var opc2 = document.createElement("option");
    		opc2.value = "ALA ESQUERDO";
    		opt2.text = "Ala Esquerdo";
    		comboPosic.add(opc2, comboPosic.options[2]);

    		var opc3 = document.createElement("option");
    		opc3.value = "MEIO ARMADOR";
    		opt3.text = "Meio Armador";
    		comboPosic.add(opc3, comboPosic.options[3]);

    		var opc4 = document.createElement("option");
    		opc4.value = "MEDIO CENTRO";
    		opt4.text = "Medio Centro";
    		comboPosic.add(opc4, comboPosic.options[4]);

    		var opc5 = document.createElement("option");
    		opc5.value = "MC LAT DIREITO";
    		opt5.text = "Meio Campo Lat Direito";
    		comboPosic.add(opc5, comboPosic.options[5]);

    		var opc6 = document.createElement("option");
    		opc6.value = "MC LAT ESQUERDO";
    		opt6.text = "Meio Campo Lat Esquerdo";
    		comboPosic.add(opc6, comboPosic.options[6]);

    		var opc7 = document.createElement("option");
    		opc7.value = "MEIA ATACANTE";
    		opt7.text = "Meia Atacante";
    		comboPosic.add(opc7, comboPosic.options[7]);
		}
	}
	else if(funcao.value == "ATAQUE")
	{
		document.getElementById("funcao").onchange = function()
		{
			var comboPosic = document.getElementById("posicao");

			var opc0 = document.createElement("option");
    		opc0.value = "PONTA";
    		opt0.text = "Ponta / Atacante";
    		comboPosic.add(opc0, comboPosic.options[0]);

    		var opc1 = document.createElement("option");
    		opc1.value = "SEG ATACANTE";
    		opt1.text = "Segundo Atacante";
    		comboPosic.add(opc1, comboPosic.options[1]);

    		var opc2 = document.createElement("option");
    		opc2.value = "CENTROAVANTE";
    		opt2.text = "Centroavante";
    		comboPosic.add(opc2, comboPosic.options[2]);
		}
	}
}

	