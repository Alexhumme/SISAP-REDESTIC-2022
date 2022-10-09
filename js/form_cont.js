function formCont(n){
    switch(n){
        case 0 : 
            document.getElementsByClassName("mensajec")[0].style.display = "flex";
            break;
        case 1:
        document.getElementsByClassName("mensajec")[0].style.display = "none";
            break;
    }
}