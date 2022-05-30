const pswrdField = document.querySelector(".form input[type='password']"),
toggleBtn = document.querySelector(".form .field i");

toggleBtn.onclick = ()=>{
    if(pswrdField.type == "password"){
        pswrdField.type = "text";
        toggleBtn.classList.add("active");
        toggleBtn.setAttribute("title", "Hide Password");
    } else{
        pswrdField.type = "password";
        toggleBtn.classList.remove("active");
        toggleBtn.setAttribute("title", "Show Password");
    }
}


const rePswrdField = document.querySelector(".form .rePassword input[type='password']"),
reToggleBtn = document.querySelector(".form .field.rePassword i");

reToggleBtn.onclick = ()=>{
    if(rePswrdField.type == "password"){
        rePswrdField.type = "text";
        reToggleBtn.classList.add("active");
        reToggleBtn.setAttribute("title", "Hide Password");
    } else{
        rePswrdField.type = "password";
        reToggleBtn.classList.remove("active");
        reToggleBtn.setAttribute("title", "Show Password");
    }
}