
function mando(){
    let mando = document.getElementsByClassName('mando')[0];
    if (mando.style.opacity == "0"){
        mando.style.opacity = "1";
        mando.style.top = "50%";
    }else{
        mando.style.opacity = "0";
        mando.style.top = "200%";
    }
                
}