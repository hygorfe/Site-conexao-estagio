// Tela de Informação da Empresa
const form = document.querySelector('form');
const inputRazaoSocial = document.getElementById('razao-social');
const inputNomeFantasia = document.getElementById('nome-fantasia');
const inputEmail = document.getElementById('email');
const inputSenha = document.getElementById('senha');
const inputTel = document.getElementById('telefone');
const inputCnpj = document.getElementById('cnpj')
const inputQltEstagiario = document.getElementById('qlt-estagiarios')


// 
// Input Razão social
    inputRazaoSocial.addEventListener('keyup', () =>{

        if(inputRazaoSocial.value === ""){
            setErro(inputRazaoSocial, "Razão social deve ser Preenchido");
            
        }else{
            const formItem = inputRazaoSocial.parentElement;
            formItem.className = "box";
        }
    })


// Input Nome Fantasia
inputNomeFantasia.addEventListener('keyup', () =>{
    
    if(inputNomeFantasia.value === ""){
        setErro(inputNomeFantasia, "Nome fantasia deve ser Preenchido")
    }
    else{
        const formItem = inputNomeFantasia.parentElement;
        formItem.className = "box"
    }
})


// Input Email
inputEmail.addEventListener('keyup', () =>{

    if(inputEmail.value === ""){
        setErro(inputEmail, "Email deve ser Preenchido")
    }else{
        const formItem = inputEmail.parentElement;
        formItem.className = "box";
    }
})


// Input senha
inputSenha.addEventListener('keyup', () =>{

    if(inputSenha.value === ""){
        setErro(inputSenha, "Senha deve ser Preenchida")
    }else{
        const formItem = inputSenha.parentElement;
        formItem.className = "box";
    }
})


    


// Input Telefone
inputTel.addEventListener('keyup', () =>{
    validarTelefone(inputTel);

})


form.addEventListener('submit', (event) =>{
    isValid = true;

    if(inputRazaoSocial.value === ""){
        isValid = false;
    }

    if(inputNomeFantasia.value === ""){
        isValid = false;
    }

    if(inputEmail.value === ""){
        isValid = false;
    }

    if(inputSenha.value === ""){
        isValid = false;
    }

    if(inputCnpj.value === "" || inputCnpj.value.length < 18){
        isValid = false;
    }

    if(!isValid){
        event.preventDefault();
    }
   
})

// Input CNPJ

inputCnpj.addEventListener('keyup', () =>{

    const isValid = validateCNPJ(inputCnpj.value)

    if(inputCnpj.value.length <= 18){
        formateCNPJ(inputCnpj);
        
    }
    
    if(inputCnpj.value.length <= 18){
        formateCNPJ(inputCnpj);
    }

    if(inputCnpj.value === ""){
        setErro(inputCnpj, "CNPJ deve ser Preenchido");
    }
    else if(inputCnpj.value.length > 18){
        inputCnpj.value = inputCnpj.value.slice(0, 18);
    }
    else if(!validateCNPJ(inputCnpj.value)){
        setErro(inputCnpj, "CNPJ Inválido");
    }
    else{
        const formItem = inputCnpj.parentElement;
        formItem.className = "box";
    }
})
    
    
   

// 
inputQltEstagiario.addEventListener('keyup', () =>{
    validarNumero(inputQltEstagiario)
})




// Funções Globais

const validarNumero = (input) =>{
    const regexNum = /^[0-9]+$/;

    if(inputQltEstagiario.value === ""){
        setErro(inputQltEstagiario, "O campo deve ser Preenchido")

    }else if(!regexNum.test(input.value)){
        setErro(inputQltEstagiario, "Apenas Número")
    }
    else{
        const formItem = inputQltEstagiario.parentElement;
        formItem.className = "box";
    }
}


const validarTelefone = (input) =>{
    const regexTel = /^\(\d{2}\) \d{5}-\d{4}$/;

    if(!regexTel.test(input.value)){
        setErro(inputTel, "Telefone esta Incorreto")
    }else if(inputTel.value === ""){
        setErro(inputTel, "Telefone deve ser Preenchido")
    }else{
           const formItem = inputTel.parentElement;
           formItem.className = "box";
    }
}

const validateCNPJ = (cnpj) =>{
    cnpj = cnpj.replace(/[^\d]+/g, '');

    if(cnpj == '')return false;
    if(cnpj.length !== 14) return false;

    if(/^(\d)\1+$/.test(cnpj)) return false;

    let tamanho = cnpj.length - 2;
    let numeros = cnpj.substring(0, tamanho);
    let digitos = cnpj.substring(tamanho);
    let soma = 0;
    let pos = tamanho - 7;

    for(let i = tamanho; i >= 1; i--){
        soma += numeros.charAt(tamanho - i) * pos--;
        if(pos < 2) pos = 9;
    }

    let resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if(resultado != digitos.charAt(0)) return false;


    tamanho = tamanho + 1;
    numeros = cnpj.substring(0, tamanho);
    soma = 0
    pos = tamanho - 7;

    for (let i = tamanho; i >= 1; i--){
        soma += numeros.charAt(tamanho - i) * pos--;
        if(pos < 2) pos = 9
    }

    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11; 
    if(resultado != digitos.charAt(1)) return false

    return true;
}

const formateCNPJ = (input) =>{
    let v = input.value.replace(/\D/g, '');

    v = v.replace(/^(\d{2})(\d)/, '$1.$2');
    v = v.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
    v = v.replace(/\.(\d{3})(\d)/, '.$1/$2');
    v = v.replace(/(\d{4})(\d)/, '$1-$2');

    input.value = v
}


const setErro = (input, msg) =>{
const formItem = input.parentElement;
const textMsg = formItem.querySelector('span')

textMsg.innerText = msg;

formItem.className = "box erro";
}
