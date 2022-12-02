function canLoginIn(){
    let unblockTime = $("#hora").data('hourblock');
    const date = new Date().toLocaleTimeString();
    let blockTime = date.substring(0, 5)
    if(unblockTime == blockTime){
       return true;
    }    
    return false;
}

function reloadPage() {
    if(canLoginIn()){
        location.reload();    
    }
}

setInterval(reloadPage, 1000);
