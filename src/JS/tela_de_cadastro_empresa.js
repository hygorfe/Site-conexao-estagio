// Tela de login e cadastro  Empresa
const form = document.querySelector('form')
const inputRazaoSocial = document.getElementById('razaoSocial')
const inputNomeFantasia = document.getElementById('nomeFantasia')
const inputEmailEmpresa = document.getElementById('emailEmpresa')
const inputConfirmarEmailEmpresa = document.getElementById('confirmarEmailEmpresa')
const inputCNPJ = document.getElementById('CNPJ')
const inputTel = document.getElementById('tel')
const inputSenha = document.getElementById('senha')
const inputConfirmarSenha = document.getElementById('confirmar_senha')  
const btnCadastrar = document.querySelector('.btnCadastrar')


// 
btnCadastrar.addEventListener('click', () =>{

    if(inputRazaoSocial.value === ""){
        setErro(inputRazaoSocial,"Razão social é obrigatório")
    }else{
        const formItem = inputRazaoSocial.parentElement;
        formItem.className = "box";
    }

    if(inputNomeFantasia.value === ""){
        setErro(inputNomeFantasia, "Nome fantasia é obrigatório")
    }else{
        const formItem = inputNomeFantasia.parentElement;
        formItem.className = "box";
    }
    
    if(inputEmailEmpresa.value === ""){
        setErro(inputEmailEmpresa, "O email é obrigatório")
    }else{
        const formItem = inputEmailEmpresa.parentElement;
        formItem.className = "box";
    }

    if(inputConfirmarEmailEmpresa.value === "") {
        setErro(inputConfirmarEmailEmpresa, "Confirme o email")
    }else if(inputConfirmarEmailEmpresa.value !== inputEmailEmpresa.value){
        setErro(inputConfirmarEmailEmpresa, "Emails devem ser iguais")
    }
    else{
        const formItem = inputConfirmarEmailEmpresa.parentElement;
        formItem.className = "box";
    }

    if(inputCNPJ.value === ""){
        setErro(inputCNPJ, "O CNPJ é obrigatório")
    }else{
        const formItem = inputCNPJ.parentElement;
        formItem.className = "box";
    }

    if(inputTel.value === ""){
        setErro(inputTel, "O telefone é obrigatório")
    }else{
        const formItem = inputTel.parentElement;
        formItem.className = "box";
    }

    if(inputSenha.value === ""){
        setErro(inputSenha, "Senha é Obrigatório")            
    }else if(inputSenha.value.length < 8){
        setErro(inputSenha, "Senha deve ter no minimo 8 caracteres")

    }else{
        const formItem = inputSenha.parentElement;
        formItem.className = "box";
    }

    if(inputConfirmarSenha.value === ""){
        setErro(inputConfirmarSenha, "Confirmar senha é obrigatoria")
    }
    else if(inputConfirmarSenha.value !== inputSenha.value){
        setErro(inputConfirmarSenha, "Senha precisam ser iguais")
    }else if(inputSenha.value === ""){
        setErro(inputConfirmarSenha, "Senha ainda não preenchida") 
    }
    else{
        const formItem = inputConfirmarSenha.parentElement;
        formItem.className = "box"
    }
})


inputRazaoSocial.addEventListener('keyup', () =>{
    if(inputRazaoSocial.value === ""){
        setErro(inputRazaoSocial,"Razão social é obrigatório")
    }else{
        const formItem = inputRazaoSocial.parentElement;
        formItem.className = "box";
    }
})


inputNomeFantasia.addEventListener('keyup', () =>{
    if(inputNomeFantasia.value === ""){
        setErro(inputNomeFantasia, "Nome fantasia é obrigatório")
    }else{
        const formItem = inputNomeFantasia.parentElement;
        formItem.className = "box";
    }
})

inputEmailEmpresa.addEventListener('keyup', () =>{
    if(inputEmailEmpresa.value === ""){
        setErro(inputEmailEmpresa, "O email é obrigatório")
    }else{
        const formItem = inputEmailEmpresa.parentElement;
        formItem.className = "box";
    }

})

inputConfirmarEmailEmpresa.addEventListener('keyup', () =>{
    if(inputConfirmarEmailEmpresa.value === "") {
        setErro(inputConfirmarEmailEmpresa, "Confirme o email")
    }else if(inputConfirmarEmailEmpresa.value !== inputEmailEmpresa.value){
        setErro(inputConfirmarEmailEmpresa, "Emails devem ser iguais")
    }
    else{
        const formItem = inputConfirmarEmailEmpresa.parentElement;
        formItem.className = "box";
    }
})

inputCNPJ.addEventListener('keyup', () =>{
    const isValid = validateCNPJ(inputCNPJ.value)
    
    if(inputCNPJ.value.length <= 18){
        formateCNPJ(inputCNPJ);
        
    }
    
    if(inputCNPJ.value.length <= 18){
        formateCNPJ(inputCNPJ);
    }

    if(inputCNPJ.value === ""){
        setErro(inputCNPJ, "CNPJ deve ser Preenchido");
    }
    else if(inputCNPJ.value.length > 18){
        inputCNPJ.value = inputCNPJ.value.slice(0, 18);
    }
    else if(!validateCNPJ(inputCNPJ.value)){
        setErro(inputCNPJ, "CNPJ Inválido");
    }
    else{
        const formItem = inputCNPJ.parentElement;
        formItem.className = "box";
    }
})

inputTel.addEventListener('keyup', () =>{
    mascaraTelefone(inputTel)

    if(inputTel.value === ""){
        setErro(inputTel, "Telefone é obrigatório")
    }else if(inputTel.value.length > 15){
        inputTel.value = inputTel.value.slice(0, 15)
    }else if(inputTel.value.length < 15){
        setErro(inputTel, "Telefone inválido")
    }else{
        const formItem = inputTel.parentElement;
        formItem.className = "box";
    }
})

inputSenha.addEventListener('keyup', () =>{
    if(inputSenha.value === ""){
        setErro(inputSenha, "Senha é Obrigatório")            
    }else if(inputSenha.value.length < 8){
        setErro(inputSenha, "Senha deve ter no minimo 8 caracteres")

    }else{
        const formItem = inputSenha.parentElement;
        formItem.className = "box";
    }
    
})


inputConfirmarSenha.addEventListener('keyup', () =>{
    if(inputConfirmarSenha.value === ""){
        setErro(inputConfirmarSenha, "Confirme a senha")
    }
    else if(inputConfirmarSenha.value !== inputSenha.value){
        setErro(inputConfirmarSenha, "Senha precisam ser iguais")
    }else if(inputSenha.value === ""){
        setErro(inputConfirmarSenha, "Senha ainda não preenchida") 
    }
    else{
        const formItem = inputConfirmarSenha.parentElement;
        formItem.className = "box"
    }
})



form.addEventListener('submit', (e) =>{
    let isValide = true;

    if(inputRazaoSocial.value === ""){
        isValide = false;
    }

    if(inputNomeFantasia.value === ""){
        isValide = false;
    }

    if(inputEmailEmpresa.value === ""){
        isValide = false;
    }

    if(inputConfirmarEmailEmpresa.value === "" || inputConfirmarEmailEmpresa.value !== inputEmailEmpresa.value){
        isValide = false;
    }

    if(inputTel.value === "" || inputTel.value.length > 15 || inputTel.value.length < 15){
        isValide = false;
    }

    if(inputSenha.value === "" || inputSenha.value.length < 8){
        isValide = false;
    }

    if(inputConfirmarSenha.value === "" || inputConfirmarSenha.value !== inputSenha.value || inputSenha.value === ""){
        isValide = false;
    }
    
    if(!isValide){
        e.preventDefault();
    }
    
})






const setErro = (input, msg) =>{
    const formItem = input.parentElement;
    const textMsg = formItem.querySelector('span')
    
    textMsg.innerText = msg;
    
    formItem.className = "box erro";
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


function mascaraTelefone(input) {
    var numero = input.value.replace(/\D/g, ''); 
    numero = numero.replace(/^(\d{2})(\d)/g, '($1) $2'); 
    if (numero.length === 11) {
      numero = numero.replace(/(\d{4})(\d)/, '$1-$2');
    } else {
      numero = numero.replace(/(\d{5})(\d)/, '$1-$2'); 
    }
    input.value = numero; 
  }
