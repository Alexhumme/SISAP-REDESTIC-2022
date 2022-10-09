function generarPruebas(){
    
}
function prueba(tipo){
    this.tipo = tipo,
    this.texto;
    this.generar = ()=>{
        switch (this.tipo){
            case 1: 
            this.texto =
                    [
                        "En esta prueba tendras que completar la cuarta ilera siguiendo ",
                        "el patron de las 3 anteriores y haciendo uso de una de las 4",
                        "opciones"
                    ];
            // generar un multiplo de 6 aleatorio (6-24)
            while(this.n%6 != 0){ this.n = Math.floor( Math.random()*(24-4+1)+4) }
            console.log("objetivo : " + this.n);

            //funcion para generar conjuntos homogeneos de n/6
            this.cn = [];
            function cn(n){
                let arr = [,,,,,];
                for (let o = 0; o < 6; o++){
                    arr[o] = (n/6);
                }
                return arr
            }
            
            

            //crear un array con 4 array vacios

            this.cx = [[],[],[],[]];

            let altIr; // indice aleatorio que al que se le restara
            let altIs; // indice aleatorio que al que se le sumara

            
            
            this.cx[0] = cn(this.n); //el primer array es homogeneo (al inicio)

            for(let i = 0; i < 4 ; i++){ //se deshace la homgeneidad del primer arreglo de manera aleatoria, de este derivan los demas de manera igualmente aleatoria

                altIr = Math.floor( Math.random()*(6));
                altIs = Math.floor( Math.random()*(6));
                
                this.cx[i][altIr] -= i+1;
                this.cx[i][altIs] += i+1;
                
                for(let o = 0; o<6; o++){ if(i<3){ this.cx[i+1][o] = this.cx[i][o]} }

                console.log("conjuntos : ("+this.cx[0]+") - ("+this.cx[1]+") - ("+this.cx[2]+") - ("+this.cx[3]+") - ("+this.cx[4]+") ; cn:"+cn(this.n)+" -"+altIr+"|+"+altIs+"; sumatoria : "+sumar(this.cx[i]))
            }

            // para los 4 conjuntos de 2 numeros

            this.cz = [[],[],[],[]];

            this.cz[0] = this.cx[3].slice(-2);

            for(let i = 0; i < 4 ; i++){ //se deshace la homgeneidad del primer arreglo de manera aleatoria, de este derivan los demas de manera igualmente aleatoria
                
                altIr = Math.floor( Math.random()*(6));
                altIs = Math.floor( Math.random()*(6));
                
                this.cz[i][0] -= altIr;
                this.cz[i][1] += altIs;
                
                for(let o = 0; o<2; o++){ if(i<3){ this.cz[i+1][o] = this.cz[i][o]} }

                console.log("adizores : ("+this.cz[0]+") - ("+this.cz[1]+") - ("+this.cz[2]+") - ("+this.cz[3]+") - ("+this.cz[4]+") ; cn:"+ this.cx[3].slice(-2)+" -"+altIr+"|+"+altIs+"; sumatoria : "+sumar(this.cz[i]))
            }
            let ter = Math.floor( Math.random()*(3))
            this.cz[ter] = this.cx[3].slice(-2);
            console.log("rellenar : "+this.cx[3].slice(0,4)+" ; con : "+this.cz[ter])
            console.log("victoria : " +sumar(this.cx[3].slice(0,4).concat(this.cz[ter])));

            this.generarElementos = (mat, mat2)=>{ // transformar cada valor de los conjuntos en un elemento
                
                let elementos = [];
                let subE=[[],[],[],[]];

                for(let i = 0; i < mat.length; i++){
                    for(let o = 0; o < 6; o++){
                        if(i<mat.length-1){
                            elementos.push(new cElemento("ej", mat[i][o],"img/num.png",(o*50)+200,(i*100)+150))
                        }else if(o<4){
                            elementos.push(new cElemento("pre",mat[i][o],"img/numX.png",(o*50)+200,(i*100)+150))
                        }
                    }
                }
                for(let i = 0; i< mat2.length; i++){
                    let o = 0;
                    let con = (new ccElemento("op",[
                        
                    ],"img/numZ.png",(o*50)+50,(i*100)+150));
                    con.valor = [
                        new cElemento("op",mat2[i][0],"img/numZ.png",con.x,con.y),
                        new cElemento("op",mat2[i][1],"img/numZ.png",con.x+50,con.y+100)
                    ]
                    subE.push(con);
                }
                return elementos.concat((subE).slice(-4));
            }
            
            this.elementos = this.generarElementos(this.cx,this.cz);
            this.select = ()=>{
                for(let elemento of this.elementos){
                    if(elemento.x == cursor.x && elemento.y == cursor.y && elemento.tipo == "op"){
                        elemento.sel = true;
                    }
                }
            }
            this.dselect = ()=>{
                for(let elemento of this.elementos){

                        elemento.sel = false;
                        elemento.x = elemento.x;
                        elemento.y = elemento.y;
                        if(elemento.x == 400 && elemento.y == 450 && elemento.tipo == "op"){
                            elemento.compVic(this.elementos,this.n);
                        }
                }
            }
            this.mover = ()=>{
                
                for(let elemento of this.elementos){
                    if(elemento.sel == true){
                        elemento.x = cursor.x;
                        elemento.y = cursor.y;
                    }
                }
            }
            this.encajar = ()=>{
                for(let elemento of this.elementos){
                    if(elemento.x%50 != 0 || elemento.y%50 != 0){
                        elemento.x = Math.round(elemento.x/50)*50;
                        elemento.y = Math.round(elemento.y/50)*50;
                        
                    }
                }
            }
            
            break;
            case 2:
                this.texto =
                        [
                            "Para completar esta prueba debe encender todas las bombillas ",
                            "usando los interruptores, recuerda que cada interruptor",
                            "enciende/apaga 2 bombillas"
                        ];
                this.bombillas = [];
                let val = [1,0,1,0,0,1,0]
                for (let index = 0; index < 7; index++) {
                    this.bombillas.push( new cElemento("b",val[index],'img/bombilla.png', 125+(index*50),200));
                    
                    this.bombillas[index].sw1 = index-1;
                    this.bombillas[index].sw2 = index;
                }
                this.switches = [];
                for (let index = 0; index < 6; index++) {
                   this.switches.push( new cElemento("sw",index,'img/interruptor.png',150+(index*50),250));
                    
                }
                let vals = [0,1];
                this.select = ()=>{
                    for (let swt of this.switches) {
                        if(swt.x == cursor.x && swt.y == cursor.y){
                            for (let bombilla of this.bombillas) {
                                if (bombilla.sw1 == swt.valor || bombilla.sw2 == swt.valor) {
                                    console.log("cambiar(",bombilla.sw1+","+bombilla.sw2,")")
                                    bombilla.valor +=.5;
                                }
                            }
                        }
                    }
                }
                this.compVic = ()=>{
                    let vic = true;
                    for (const bombilla of this.bombillas) {
                        if(bombilla.valor%2 == 0){
                            vic = false; break;
                        }
                    }
                    if(vic){

                        p_resueltas++;

                        clearInterval(gameSpace.interval);
                        alert("segunda prueba superada");
                        
                        btnExt.salir();
                        
                        llaves++;
                        document.getElementById("puntaje").innerHTML = '<img src="img/llave.png" alt="" srcset="">' + llaves;

                        prueba2 = false;

                        document.getElementsByClassName("p7")[0].className = "p9 panel"
                    }
                }


            break;

            case 3:

            break;

            case 4: 
            
            break;

            case 5:

            break;
        }
    },
    this.dibujar=()=>{
        let talker = new Image(); talker.src = "img/talker-sisap-anim.gif"
        gameSpace.ctx.strokeStyle = "white";
        gameSpace.ctx.drawImage(talker,20,20);
        gameSpace.ctx.strokeRect(10,10,530,125);
        gameSpace.ctx.fillStyle = "white";
        gameSpace.ctx.textAlign = "left";
        for (let index = 0; index < this.texto.length; index++) {
            gameSpace.ctx.fillText(this.texto[index], 130,70+(index*15));
        }
        gameSpace.ctx.textAlign = "center";
        switch (this.tipo){
            case 1:
                
                for(let elementoI = 0; elementoI < this.elementos.length;elementoI++){
                    //try{
                        if(this.elementos[elementoI].tipo != "op"){
                            gameSpace.ctx.drawImage(this.elementos[elementoI].img,this.elementos[elementoI].x,this.elementos[elementoI].y);
                            gameSpace.ctx.font = "bold 15pt sans-serif";
                            gameSpace.ctx.fillStyle = "white";
                            gameSpace.ctx.fillText(this.elementos[elementoI].valor,this.elementos[elementoI].x+24,this.elementos[elementoI].y+27)
                        }else{
                            let cnd = 0;
                            for (let subE of this.elementos[elementoI].valor) {
                                gameSpace.ctx.strokeStyle = "lightblue";
                                gameSpace.ctx.strokeRect(this.elementos[elementoI].x+cnd,this.elementos[elementoI].y,50,50);
                                gameSpace.ctx.drawImage(this.elementos[elementoI].img,this.elementos[elementoI].x+cnd,this.elementos[elementoI].y);
                                gameSpace.ctx.font = "bold 15pt sans-serif";
                                gameSpace.ctx.fillStyle = "white";
                                gameSpace.ctx.fillText(subE.valor,this.elementos[elementoI].x+24+cnd,this.elementos[elementoI].y+27) 
                                cnd+=50;
                            }
                        }
                    //}catch (e){ }//console.log(this.elementos[elementoI]) }
                }
            break;
            case 2:
                for(let bombilla of this.bombillas){
                    if(bombilla.valor%2 == 0){
                        let img = new Image(); img.src = "img/bombilla-off.png"
                        gameSpace.ctx.drawImage(img,bombilla.x,bombilla.y);
                    }else{
                        let img = new Image(); img.src = "img/bombilla-on.png"
                        gameSpace.ctx.drawImage(img,bombilla.x,bombilla.y);
                    }
                    gameSpace.ctx.drawImage(bombilla.img,bombilla.x,bombilla.y);
                    /*
                        gameSpace.ctx.fillStyle = "white";
                        gameSpace.ctx.fillText(bombilla.sw1,bombilla.x+14,bombilla.y+27);
                        gameSpace.ctx.fillText(bombilla.sw2,bombilla.x+34,bombilla.y+27);
                        gameSpace.ctx.fillText(bombilla.valor,bombilla.x+24,bombilla.y+17);
                    */
                        
                    }
                for(let swt of this.switches){
                    gameSpace.ctx.drawImage(swt.img,swt.x,swt.y);
                    gameSpace.ctx.fillText(swt.valor,swt.x+24,swt.y+27);
                }
            break;
        }
        
    }
    
}
function ccElemento(tipo,valores,imgL,x,y){
    this.compVic = (arr1,ob)=>{
        
        let arrx = [];
        for (const el of arr1.slice(-8,-4)) {
            arrx.push(el.valor);
        }
        console.log(arrx.concat([this.valor[0].valor,this.valor[1].valor]) + " = " + sumar(arrx.concat([this.valor[0].valor,this.valor[1].valor])));
        
        if(sumar(arrx.concat([this.valor[0].valor,this.valor[1].valor])) == ob){
            
            p_resueltas++;

            clearInterval(gameSpace.interval);
            alert("prueba 1 completada");
            
            btnExt.salir();
            
            llaves++;
            document.getElementById("puntaje").innerHTML = '<img src="img/llave.png" alt="" srcset="">' + llaves;

            prueba1 = false;

            document.getElementsByClassName("p7")[0].className = "p9 panel"
        }
    }
    this.img = new Image();
    this.img.src = imgL;
    this.tipo = tipo;
    this.valor = valores;
    this.x = x;
    this.y = y;
    this.sel = false;
}
function cElemento(tipo,valor,imgL,x,y){
    this.img = new Image();
    this.img.src = imgL;
    this.tipo = tipo;
    this.valor = valor;
    this.x = x;
    this.y = y;
    this.sel = false;
    this.sw1;
    this.sw2;
}

function sumar(conjunto){ //suma todos los valores en un arreglo
    let sum = 0;
    for(let j = 0; j<conjunto.length ;j++){ sum+=conjunto[j] }
    return sum;
}
var prueba1 = new prueba(1);prueba1.generar();// prueba 1 : patron de operaciones
var prueba2 = new prueba(2);prueba2.generar();// prueba 2 : bombillas


