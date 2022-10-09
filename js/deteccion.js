// MANERA EN QUE SE DETECTA QUE BLOQUE PISA EL JUGADOR

var paneles = document.getElementsByClassName("panel");

// FUNCION QUE EJECUTA CODIGO SEGUN EL PANEL
function activarEventos(key){
	for (let panel of paneles){
		if (
			/*
			(
				(cuadrado.style.top > panel.style.top && cuadrado.style.top < panel.style.top+panel.style.height) &&
				(
					(cuadrado.style.left+cuadrado.style.width > panel.style.left && cuadrado.style.left+cuadrado.style.width < panel.style.left+panel.style.width && cuadrado.style.left-cuadrado.style.width < panel.style.left) ||
					(cuadrado.style.left-cuadrado.style.width < panel.style.left+panel.style.width && cuadrado.style.left-cuadrado.style.width > panel.style.left && cuadrado.style.left+cuadrado.style.width > panel.style.left+panel.style.width)
				)
			) ||
			(
				(cuadrado.style.left+cuadrado.style.width > panel.style.left && cuadrado.style.left-cuadrado.style.width < panel.style.left+panel.style.width)&&
				(
					(cuadrado.style.top+cuadrado.style.height > panel.style.top && cuadrado.style.top+cuadrado.style.height < panel.style.top+panel.style.height && cuadrado.style.top-cuadrado.style.height < panel.style.top) ||
					(cuadrado.style.top-cuadrado.style.height < panel.style.top+panel.style.height && cuadrado.style.top-cuadrado.style.height > panel.style.top && cuadrado.style.top+cuadrado.style.height > panel.style.top+panel.style.height)
				)
			)
			*/
			((y+550)+"px" == panel.style.top && (x-10)+"px" == panel.style.left)
			){
			// PANELES DE TELETRANSPORTE
			switch (panel.id) {
				case "PA":
					eventos.teleport(panel, "PA"); break;
				case "PB":
					eventos.teleport(panel, "PB"); break;
			}
			// OTROS PANELES
			switch (panel.className) {
				case "p0 panel": break;
				case "p1 panel": eventos.colision(key); break;
				case "p2 panel p2": eventos.morir(nivel); break;
				case "p3 panel": break;
				case "p4 panel": eventos.ganar();eventos.colision(key); break;
				case "p5 panel": eventos.abrir(panel, key); break;
				case "p6 panel": eventos.recolectar(panel); break;
				case "p7 panel": eventos.colision(key);eventos.hacer_prueba(panel); break;
				case "p8 panel": break;
				case "p9 panel": eventos.colision(key);break;
			}
		} 
	}
}

// FUNCION QUE EJECUTA LA ANTERIOR CADA QUE OPRIMES UNA TECLA
function detectar(){
	document.addEventListener("keydown", (e)=>{
		activarEventos(e.key)
	}
	,false) 
}