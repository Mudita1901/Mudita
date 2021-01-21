

const donePopup = document.querySelector(".transfer_done_popup");

window.addEventListener("load", function(){
    showPopup();
})

function showPopup(){
    const timelimit = 2 ;
    let i = 0;
    const timer = setInterval(function(){
        i++;
        if(i=timelimit){
            clearInterval(timer);
            donePopup.classList.add("show");
        }
        console.log(i)
    }, 1000);
}