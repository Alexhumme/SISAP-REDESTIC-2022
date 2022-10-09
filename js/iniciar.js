// EJECUTAR TODAS LAS FUNCIONE NECESARIAS AL INICIAR EL JUEGO
var tiempoI = 3.5;
var tiempoA = 500;
var tiempoN = tiempoA;
var conteoT;

function startall(t,s,a,e){
	iniciarMovimiento();
	generarEscenario(e);
	detectar();
	//lniveles();
	let r = 0;
	let g = 216;
	let b = 245;
	conteoT = window.setInterval(()=>{
		if(tiempoA>0){
			tiempoA-=1/(tiempoI*2);
			let barra = document.getElementById("tiempoR");
			barra.style.height = tiempoA + "px";
			let minB = Math.round((tiempoA*tiempoI/5))/100;
			let min = (Math.floor(minB));
			let seg = Math.floor(Math.round((minB-min)*100)*6/10);
			document.getElementById("tiempoC").innerHTML = (min)+"."+(seg);
			
			if(b>=10){
				r+=255/(tiempoA*tiempoI);
				g+=216/(tiempoA*tiempoI);
				b-=245/(tiempoA*tiempoI);
			} else {
				g-=127.5/(tiempoA*tiempoI);
			}
			barra.style.backgroundColor = "rgb("+r+","+g+","+b+")";
			
			//document.getElementById("posc").innerHTML = "rgb("+r+","+g+","+b+")";
		}else{
			eventos.terminar(a,s);
		}
	},50);

	generarPruebas();
	cambTxt(0);
	}
