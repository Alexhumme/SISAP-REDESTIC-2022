function iniciarPrueba(num){ // funcion que se activa al iniciar CUALQUIER PRUEBA
    
    gameSpace.iniciar();
    addItems(100,100);
    consultarFrames();

}
var gameSpace = { // OBJETO QUE DESCRIBE EL FRAME EN EL QUE SE DESPLIEGA EL ESCENARIO
    iniciar: function(){ // SE CREA EL CONTENIDO DEL CANVAS
        this.canva = document.getElementById("canvas");
        this.canva.width = 550;
        this.canva.height = 550;
        this.canva.style.cursor = "none";
        //this.canva.style.cursor = "none";
        
        this.ctx = this.canva.getContext("2d");
        
        this.interval = setInterval(actualizarFrame, 20);


        document.addEventListener("mousemove", (e)=>{ //actualiza la posicion del juego a la del cursor
            
            /*
                esto es necesario para tener una mejor relacion entre el cursor
                y el gameSpace, dado que los valores "x y" del ultimo solo son
                necesarios a la hora de identificar la posicion del cursor en 
                relacion a la prueba
            */
            if(prueba1){
                prueba1.mover();
                prueba1.encajar();
            }
            
            cursor.mover(e.clientX-gameSpace.canva.offsetLeft,e.clientY-gameSpace.canva.offsetTop);
            
        }, false);
        window.addEventListener("mousedown", (e)=>{
            console.log("click");
            
            cursor.inc = true;
            cursor.encajar();

            if(prueba1){
                prueba1.select();
            }else if(prueba2){
                prueba2.select();
            }
            
            
            /*
            for (let ele of Nv2){
                if(
                    cursor.x+cursor.ancho/2 > ele.x &&
                    cursor.y+cursor.alto/2 > ele.y &&
                    cursor.x+cursor.ancho/2 < ele.x+ele.ancho &&
                    cursor.y+cursor.alto/2 < ele.y+ele.alto
                ){
                    ele.sel = true;
                    console.log(Nv2.indexOf(ele))
                }
            }
            */
        }, false);
        window.addEventListener("mouseup",(e)=>{
            
            console.log("offclick");
            cursor.inc = false;
            if (prueba1) {
                prueba1.dselect();
            }else if(prueba2){
                
            }
            

            /*
            gameSpace.x = e.x-gameSpace.canva.offsetLeft;
            gameSpace.y = e.y-gameSpace.canva.offsetTop;
            for (let ele of Nv2){
                if(
                    cursor.x+cursor.ancho/2 > ele.x &&
                    cursor.y+cursor.alto/2 > ele.y &&
                    cursor.x+cursor.ancho/2 < ele.x+ele.ancho &&
                    cursor.y+cursor.alto/2 < ele.y+ele.alto
                ){
                    ele.sel = false;
                }
                
            }
            */
        }, false);
    },
    limpiar: function(){
        this.ctx.clearRect(0,0,this.canva.width,this.canva.height);
        //capa1 = [];
    }
}
function consultarFrames(){
    var seg = Math.floor(Date.now()/1000);
    if (seg != segundo)
    {
        segundo = seg;
        fps = conteoFrames;
        conteoFrames = 1;
    } else {conteoFrames++};

    gameSpace.ctx.font = "bold 10pt sans-serif";
    gameSpace.ctx.fillStyle = "red";
    gameSpace.ctx.textAlign = "center"
    gameSpace.ctx.fillText("FPS: "+ fps /*+ " || cx = "+cursor.x + " || cy = "+cursor.y*/, gameSpace.canva.width/2, 20)
}

function addItems(){ 
    
    let saveX = x;
    let savey = y;
    btnExt = {
        salir : ()=>{
            window.clearInterval(gameSpace.interval);
            movimiento = true;
            document.getElementById("principal").removeChild(document.getElementById("canvas"));
            
            Tbtn = document.getElementById("btx");
            Tbtn.style.display = "none";

            /*
            x = saveX;
            y = savey;
            cuadrado.style.top = y;
            cuadrado.style.left = x;
            */
        },
        dibujar : ()=>{
            Tbtn = document.getElementById("btx");
            Tbtn.style.display = "inline";
            Tbtn.innerHTML = "X";            
        }
    }
    
    cursor = {
        inc : false,
        x,
        y,
        alto : 50,
        ancho :50,
        
        mover : (cursorX,cursorY)=>{
            cursor.x = cursorX;
            cursor.y = cursorY;
            
        },
        dibujar:(color)=>{
            
            gameSpace.ctx.strokeStyle =color;
            
            gameSpace.ctx.strokeRect(cursor.x, cursor.y, cursor.ancho, cursor.alto);
            
            gameSpace.ctx.strokeRect(cursor.x+cursor.ancho/4, cursor.y+cursor.alto/4, cursor.ancho*0.5, cursor.alto*0.5);
            
        },
        encajar : ()=>{
            if (cursor.x%50 == 0 || cursor.y%50 != 0){
                cursor.x = Math.round(cursor.x/50)*50;
                cursor.y = Math.round(cursor.y/50)*50;
            }
        }
    }
    
    bg = {
        dibujar : ()=>{
            for(let yy = 0;yy<=550;yy+=50){
                for(let xx = 0;xx<=550;xx+=50){
                    //gameSpace.ctx.strokeStyle = "green";
                    //gameSpace.ctx.strokeRect(xx,yy,50,50);
                }
            }

        }
    }
    
    btnExt.dibujar();
    
}

function actualizarFrame(){

    gameSpace.limpiar();
    bg.dibujar();

    if (prueba1){
        prueba1.dibujar();
    }else if(prueba2){
        prueba2.dibujar();
        prueba2.compVic();
    }else{
        swal.fire("no mas pruebas disponibles","","error");
        btnExt.salir();
    }
    
    
    cursor.dibujar("yellow");
    
    if (cursor.inc){
        cursor.dibujar("lightyellow")
    }else{
        cursor.dibujar("yellow")
    }
    
    /*
    generarEscenario(fondo,25,25,capa1);
    for(e of Nv1){e.dibujar();}
    for(i of Nv2){i.mover();i.encajar();i.dibujar();}
    cursor.mover();cursor.encajar();cursor.dibujar();
    gp();
    */
   
    consultarFrames();
}

var btnExt, cursor, segundo, conteoFrames = 0;