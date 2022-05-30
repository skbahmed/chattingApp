const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}


sendBtn.onclick = ()=>{
    // AJAX STARTED

    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = ""; //once message sent to database blank the inputfield
                inputField.focus(); //once message sent refocus on input field
                scrollToBottom();
            }
        }
    }

    // sending form data through ajax to php
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); //sending the form data to php
}

chatBox.onmouseenter = ()=>{ //adding active class to scrollable when mouse enter
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{ //removing active class when mouse remove
    chatBox.classList.remove("active");
}



setInterval(()=>{

    // AJAX STARTED
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){ //if active class not contain in chat box scroll to bottom
                    scrollToBottom();
                }
            }
        }
    }

    // sending form data through ajax to php
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); //sending the form data to php

}, 500); //this function will run frequently after 500ms

function scrollToBottom(){ //automatically scroll to bottom of the chat box
    chatBox.scrollTop = chatBox.scrollHeight;
}