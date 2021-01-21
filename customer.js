let viewButton = document.getElementById('view-one-customer');
let viewForm = document.getElementById('view-customer-form');
let isViewFormDisplaying = false;

viewButton.onclick = function(){
    if(isViewFormDisplaying==false){
        viewForm.style.display = 'block';
        isViewFormDisplaying = true;
    }
    else{
        viewForm.style.display = 'none';
        isViewFormDisplaying = false;
    }
}