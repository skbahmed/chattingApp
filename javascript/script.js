var chatArea = document.querySelector(".chat-area"),
footer = chatArea.querySelector("footer"),
msgInputField = chatArea.querySelector(".input-field"),
emojicon = chatArea.querySelector(".emojicon"),
inputContainer = chatArea.querySelector(".chat-input-container"),
emojiContainer = chatArea.querySelector(".emoji-container");

emojicon.onclick = ()=>{
    emojiContainer.classList.toggle("active");
    inputContainer.classList.toggle("active");
}
msgInputField.onfocus = ()=>{
    emojiContainer.classList.remove("active");
    inputContainer.classList.remove("active");
}