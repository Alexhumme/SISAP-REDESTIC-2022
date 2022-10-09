var eventos = {
	llavesR : function(){ // contar cantidad de llaves en el nivel
		let llaves =  0;
		for (let i = 0; i < paneles.length; i++){
			if (paneles[i].className == "p3 panel"){llaves++}
		}
		return llaves;
	},
	teleport : function(panel, tipo){
		// destipar el panel inicial
		panel.id = "";

		// buscar el otro teletransportador
		let tp = document.getElementById(tipo); 

		// convertir texto a numeros
		x = tp.style.left.split();
		x = x.splice(x.indexOf("p"));
		x = x.splice(x.indexOf("x"));
		x = parseInt(x.join(""));
		y = tp.style.top.split();
		y = y.splice(y.indexOf("p"));
		y = y.splice(y.indexOf("x"));
		y = parseInt(y.join(""));
		
		// actualizar posicion
		cuadrado.style.top = y-1+"px";
		cuadrado.style.left = x-1+"px";
		
		// retipar el panel inicial
		panel.id = tipo;
	},
	comer : function(fruta){
		frutas += 1;
		document.getElementById("frutas").innerHTML = "frutas: " + frutas;
		fruta.className = "p0";
		console.log("comiste");
	},
	recolectar : function(llave){
		llaves += 1;
		document.getElementById("puntaje").innerHTML = '<img src="img/llave.png" alt="" srcset="">' + llaves;
		llave.className = "p3 panel"
		llave.style.opacity = 0;
		console.log("conseguiste llave");
	},
	animaciones : {
		parpadear : ()=>{
			var p_mortales = document.getElementsByClassName("p2");
			for (let panel of p_mortales) {
				if (panel.className = "p2 panel p2"){
					activarEventos("");
				}
				panel.className = "p2 panel " + ser[w];
			}
			v = -v;
			w = w+v;
		},
		girar : ()=>{
			var salida = document.getElementsByClassName("p4")[0];
			rot += 2;
			salida.style.transform = "rotate("+rot+"deg)";
		}
	
	},
	morir : function(n){
		x = 450;
		y = 50;
		llaves = 0;
		nivel = n;
		cuadrado.style.top = y+"px";
		cuadrado.style.left = x+"px";
		cuadrado.style.backgroundImage = "url('img/conejoS.png')";
		document.getElementById("escenario").innerHTML = "";
		document.getElementById("nivel").innerHTML = "nivel: " + (nivel);
		document.getElementById("puntaje").innerHTML = '<img src="img/llave.png" alt="" srcset="">' + llaves;
		swal.fire("Has muerto");
		generarEscenario();
	},
	colision : function(tecla){ // te devuelve a tu posicion anterior si encuentras un muro
		switch (tecla){
			case "ArrowUp":
				y += 50;
				cuadrado.style.top = y + "px";
				cuadrado.style.backgroundImage = "url('img/robot-up.png')";
				break;
			case "ArrowDown":
				y -= 50;
				cuadrado.style.top = y + "px";
				cuadrado.style.backgroundImage = "url('img/robot.png')";
				break;
			case "ArrowLeft":
				x += 50
				cuadrado.style.left = x + "px";
				cuadrado.style.backgroundImage = "url('img/robot-left.png')";
				break;
			case "ArrowRight":
				x -= 50
				cuadrado.style.left = x + "px";
				cuadrado.style.backgroundImage = "url('img/robot-right.png')";
				break;
				case "w":
				y += 50;
				cuadrado.style.top = y + "px";
				cuadrado.style.backgroundImage = "url('img/robot-up.png')";
				break;
			case "s":
				y -= 50;
				cuadrado.style.top = y + "px";
				cuadrado.style.backgroundImage = "url('img/robot.png')";
				break;
			case "a":
				x += 50
				cuadrado.style.left = x + "px";
				cuadrado.style.backgroundImage = "url('img/robot-left.png')";
				break;
			case "d":
				x -= 50
				cuadrado.style.left = x + "px";
				cuadrado.style.backgroundImage = "url('img/robot-right.png')";
				break;
		} 
	},
	abrir : function(puerta, tecla){
		if(llaves>0){
			llaves--;
			puerta.className = "p8 panel";
			document.getElementById("puntaje").innerHTML = '<img src="img/llave.png" alt="" srcset="">' + llaves;
		}else{
			eventos.colision(tecla)
		}
	},
	ganar : function(){
		movimiento=false;
		clearInterval(conteoT);	
		
		let a = document.getElementById("aspiId").value;
		let s = document.getElementById("salaId").value;
		let t = document.getElementById("tiempoC").innerHTML;

		$(".loader").fadeIn("slow");
		try{
			swal.fire("PRUEBA COMPLETADA","seras redirigido a tus resultados","success");
		}catch(e){
			alert("PRUEBA COMPLETADA","seras redirigido a tus resultados");
		}
		
		setTimeout(()=>{window.location.href = "aspirante-resultados.php?a="+a+"&s="+s+"&t="+parseFloat(t)+"&pr="+p_resueltas},3000);
		
	},
	terminar : function(a,s){
		movimiento=false;
		clearInterval(conteoT);

		let t = document.getElementById("tiempoC").innerHTML;

		$(".loader").fadeIn("slow");
		try{
			swal.fire("SE ACABO EL TIEMPO","seras redirigido a tus resultados","error");
		}catch(e){
			alert("SE ACABO EL TIEMPO","seras redirigido a tus resultados");
		}
		
		setTimeout(()=>{window.location.href = "aspirante-resultados.php?a="+a+"&s="+s+"&t="+parseFloat(t)+"&pr="+p_resueltas},3000);
			
	},
	hacer_prueba: function(cofre){
		if(movimiento){
			let main = document.getElementById("principal");
    	
			let c = main.insertBefore(document.createElement("canvas"),null); c.id = "canvas";
			
			movimiento = false;
			//cofre.className = "p9 panel"
			
			iniciarPrueba(Iprueba);
		}
		
	}
}
var rot = 0;
var llaves = eventos.llavesR();
var frutas = 0;
var v = 1;
var w = 1;
var Iprueba = 1;
var p_resueltas = 0;