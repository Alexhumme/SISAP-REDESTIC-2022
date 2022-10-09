function generarFormulario(type){
    var formEst = document.getElementsByClassName("container-form asp")[0];
    var formPro = document.getElementsByClassName("container-form pro")[0];
    var formAdm = document.getElementsByClassName("container-form adm")[0];
    var descESt = document.getElementById("desc-asp");
    var descPro = document.getElementById("desc-pro");
    var descAdm = document.getElementById("desc-adm");
    var btnESt = document.getElementsByClassName("btnEst")[0];
    var btnPro = document.getElementsByClassName("btnPro")[0];
    var btnAdm = document.getElementsByClassName("btnAdm")[0];
    
    switch(type){
        case 0: 
        
        formPro.style.marginLeft = "335px";
        formAdm.style.marginLeft = "670px";
        formEst.style.marginLeft = "0px";
        
        
        formEst.style.opacity = 1;
        
        
        
        btnESt.checked = true;
        descESt.checked = true;
        break;
        case 1:
        
        formPro.style.marginLeft = "0px"
        formAdm.style.marginLeft = "335px"
        formEst.style.marginLeft = "-335px"

        formPro.style.opacity = 1;
        
        
        btnPro.checked = true;
        descPro.checked = true;
        break;
        case 2:
        
        formPro.style.marginLeft = "-335px"
        formEst.style.marginLeft = "-670px"
        formAdm.style.marginLeft = "0px"

        
        formAdm.style.opacity = 1;
        
        
        btnAdm.checked = true;
        descAdm.checked = true;
        break;
    } 
}
generarFormulario(0);