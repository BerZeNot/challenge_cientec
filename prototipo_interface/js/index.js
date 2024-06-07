document.addEventListener("DOMContentLoaded", ()=>{
    document.querySelector(".register").addEventListener("click", toggleSelection);
    document.querySelector(".search").addEventListener("click", toggleSelection);
});

const toggleSelection = (e)=>{
    console.log(e.target.innerText);

    const register = document.querySelector(".register");
    const search = document.querySelector(".search");
    const formSearch = document.querySelector("form#search")
    const formRegister = document.querySelector("form#register")
    
    if(e.target.innerText == "Register"){
        register.classList.add("selected");
        search.classList.remove("selected");
        formSearch.hidden  = true;
        formRegister.hidden = false;

    } else {
        search.classList.add("selected");
        register.classList.remove("selected");
        formSearch.hidden  = false;
        formRegister.hidden = true;
    }

}