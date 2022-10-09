// LISTA DE NIVELES
niveles = [
	nivel0, nivel1, nivel2, nivel3, nivel4, nivel5
]

// POSICION DE CADA PANEL
var xb = 0
var yb = 0

// LLENAR EL "ESCENARIO" DE PANELES
/*
1. limpiar
2. entrar a  nivel
3. leer fila
4. leer clase del panel
*/
function generarEscenario(e){
	
	document.getElementById("escenario").innerHTML = "";
	for (let i=0; i < e.length; i++){
		xb = 0
		for (let o=0; o < e[i].length; o++){
			if (e[i][o] == "PA"|| e[i][o] == "PB"){
				document.getElementById("escenario").innerHTML += "<div id='"+e[i][o]+"' class='panel' style='top: "+yb+"px;left: "+xb+"px;'> </div>"
				xb += 50
			}else{
				document.getElementById("escenario").innerHTML += "<div class='"+e[i][o]+" panel' style='top: "+yb+"px;left: "+xb+"px;'> </div>"
				xb += 50
			}
		}
		yb += 50
	}
	xb = 0
	yb = 0
}