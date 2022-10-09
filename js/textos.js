var txts = document.getElementById("txts");
let texto;
var txt_intro = 
(
    "Bienvenido a SISAP <br>"+
    "para completar este test, deberas llevar al robot "+
    "a traves de este laberinto hacia la salida."+
    "Para desplazarte por la pantalla, utilliza las teclas <span class='dir'> ↑ ↓ → ← </span>"
);
var txt_pruebas = 
(
    "Para pasar a traves de las puertas, utiliza las llaves que se"+
    "encuentran dentro de los cofres. Al interactuar con un cofre, se"+
    "te mostrara un desafio que deberas superar para obtener la llave "+
    "(recuerda que tu cantidad de intentos tendran un efecto en tu resultado"+
    "final)."
);
var txt_tiempo =
(
    "Recuerda que tienes un tiempo limite para acabar el test, cada vez que "+
    "resuelvas una prueba se te dara un tiempo extra, el tiempo que te sobre"+
    "tambien afecara tu resultado final."
)
var txt_prueba1 = 
(
    ""
);
let textos = [txt_intro,txt_pruebas,txt_tiempo];

function cambTxt(txtI){
    /*
    texto = textos[txtI];
    document.getElementById("texto-prueba").innerHTML = texto;
    */
}