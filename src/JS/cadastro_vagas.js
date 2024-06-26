const form = document.querySelector('form')
const inputTituloVaga = document.getElementById('titulo-vaga')
const inputSalario = document.getElementById('salario')
const inputNomeEmpresa = document.getElementById('nome-empresa')
const inputSkillVaga = document.getElementById('skill-vaga')
const inputTamanhoEmpresa = document.getElementById('tamanho-empresa')

// Input Titulo da vaga
inputTituloVaga.addEventListener('keyup', () =>{
    if(inputTituloVaga.value === ""){
        setErro(inputTituloVaga, "Por favor, preencha o titulo da vaga")
    }else{
        const formItem = inputTituloVaga.parentElement;
        formItem.className = "box"
    }
})
// 

// Input Salario
inputSalario.addEventListener('keyup', (e) =>{
    let valor = e.target.value;
    valor = valor.replace(/\D/g, ""); 
    valor = valor.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    e.target.value = valor;
})


const inputSelectValidate = (input) =>{
    if(!input.value){
        setErroSelect(input, "Selecione uma opção")
    }else{
        const formItem = input.parentElement;
        formItem.className = "box-select erro"
    }
}


form.addEventListener('submit', (e) =>{
    isValid = true;

    if(inputTituloVaga.value === ""){
        isValid = false;
    }

    if(inputSalario.value === ""){
        isValid = false;
    }
    inputSelectValidate(inputSkillVaga)

    if(!isValid){
        e.preventDefault();
    }

})


// Função Global
const setErroSelect = (input, msg) =>{
    const formItem = input.parentElement;
    const textMsg = document.querySelector('.erros');

    textMsg.innerText = msg;
    formItem.className = "box-select erro";
}
const setErro = (input, msg) =>{
    const formItem = input.parentElement;
    const textMsg = document.querySelector('a');

    textMsg.innerText = msg;
    formItem.className = "box erro";
}