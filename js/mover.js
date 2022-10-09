//variables que guardan al personaje y su posicion
var x = 460, y = -500;
var cuadrado = document.getElementById("cuadradoRojo");
var senial = document.getElementById("robotSign");
var movimiento = true;
// posicion y apariencia iniciales
cuadrado.style.top = y + "px"
cuadrado.style.left = x + "px"
senial.style.top = (y-100) + "px";
senial.style.left = x + "px";
cuadrado.style.backgroundImage = "url('img/robot.png')"

function mover(tecla){
	if(movimiento){
	switch (tecla){
		case "ArrowUp":
			y -= 50;
			cuadrado.style.top = y + "px";
			cuadrado.style.left = x + "px";
			cuadrado.style.backgroundImage = "url('img/robot-up.png')";
			senial.style.top = (y-100) + "px";
			senial.style.left = (x) + "px";
			break;
		case "ArrowDown":
			y += 50;
			cuadrado.style.top = y + "px";
			cuadrado.style.left = x + "px";
			cuadrado.style.backgroundImage = "url('img/robot.png')";
			senial.style.top = (y-100) + "px";
			senial.style.left = x + "px";
			break;
		case "ArrowLeft":
			x -= 50;
			cuadrado.style.top = y + "px";
			cuadrado.style.left = x + "px";
			cuadrado.style.backgroundImage = "url('img/robot-left.png')";
			senial.style.top = (y-100) + "px";
			senial.style.left = x + "px";
			break;
		case "ArrowRight":
			x += 50;
			cuadrado.style.top = y + "px";
			cuadrado.style.left = x + "px";
			cuadrado.style.backgroundImage = "url('img/robot-right.png')";
			senial.style.top = (y-100) + "px";
			senial.style.left = x + "px";
			break;
		case "w":
			y -= 50;
			cuadrado.style.top = y + "px";
			cuadrado.style.left = x + "px";
			cuadrado.style.backgroundImage = "url('img/robot-up.png')";
			senial.style.top = (y-100) + "px";
			senial.style.left = x + "px";
			break;
		case "s":
			y += 50;
			cuadrado.style.top = y + "px";
			cuadrado.style.left = x + "px";
			cuadrado.style.backgroundImage = "url('img/robot.png')";
			senial.style.top = (y-100) + "px";
			senial.style.left = x + "px";
			break;
		case "a":
			x -= 50;
			cuadrado.style.top = y + "px";
			cuadrado.style.left = x + "px";
			cuadrado.style.backgroundImage = "url('img/robot-left.png')";
			senial.style.top = (y-100) + "px";
			senial.style.left = x + "px";
			break;
		case "d":
			x += 50;
			cuadrado.style.top = y + "px";
			cuadrado.style.left = x + "px";
			cuadrado.style.backgroundImage = "url('img/robot-right.png')";
			senial.style.top = (y-100) + "px";
			senial.style.left = x + "px";
			break;
		case "r": eventos.morir(nivel); break;
		case "R": eventos.morir(nivel); break;
	} //document.getElementById("posc").innerHTML = "x: "+x+", y: "+y;
	}
}

function iniciarMovimiento(){                                     
	
		document.addEventListener("keydown", ()=>{mover(event.key)}, false)
	
}