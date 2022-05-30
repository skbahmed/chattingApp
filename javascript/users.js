const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){ //if searchTerm not blank
        searchBar.classList.add("active");
        searchBtn.classList.add("active");
    }else {
        searchBar.classList.remove("active"); //if blank
        searchBtn.classList.remove("active");
    }

    // AJAX STARTED
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(()=>{

    // AJAX STARTED
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("GET", "php/users.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){ //if active classList not contain
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();


}, 800); //this function will run frequently after 500ms