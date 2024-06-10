document.addEventListener("DOMContentLoaded", ()=>{
    document.querySelector(".register").addEventListener("click", toggleSelection);
    document.querySelector(".search").addEventListener("click", toggleSelection);
    document.querySelector("#btSearch").addEventListener("click", searchByNis);
    handleSearchParams();
});

const handleSearchParams = () => {
    const params = new URLSearchParams(window.location.search);
    let nis;
    if(params.size == 1 && (nis = params.get('nis'))){
        document.getElementById('searchResult')
                .innerText = `NIS gerado: ${nis}`;
    } else if(params.size == 1 && (msg = params.get('msg'))){
        if(msg == "invalid-name")
            document.getElementById('searchResult')
                .innerText = `Invalid name!`;
    }
};

const toggleSelection = (e)=>{
    clearMessageBox();
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


const searchByNis = () => {
    let nis = document.getElementById("nis").value;
    clearMessageBox();
    if(nis.length != 11) {
        document.querySelector(".messages")
                .innerText = "O NIS deve conter 11 dígitos";
        return;
    }

    fetch(`http://localhost:8080/backend/controller/searchController.php?nis=${nis}`)
    .then(data => {
        return data.json();
    })
    .then(cidadao => {
        showSearchResult(cidadao);
    })
}

const showSearchResult = (cidadao) => {
    const searchResult = document.getElementById("searchResult");
    
    if(!cidadao.error){
        searchResult.innerHTML = `
            <p><span>Id: </span>${cidadao.id}</p>
            <p><span>Name: </span>${cidadao.name}</p>
            <p><span>NIS: </span>${cidadao.nis}</p>
        `;

    } else {
        searchResult.innerHTML = `<p class="error">${cidadao.error}</p>`;
    }
}

clearMessageBox = () => {
    document.querySelector(".messages").innerText = "";
    document.querySelector("#searchResult").innerText = "";
    document.querySelector("#nis").value = "";
}