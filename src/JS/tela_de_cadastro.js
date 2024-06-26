// Tela de login e cadastro candidato Empresa
const form = document.querySelector('form')
const inputNome = document.getElementById('nome')
const inputSobrenome = document.getElementById('sobrenome')
const inputEmail = document.getElementById('email')
const inputConfirmarEmail = document.getElementById('confirmarEmail')
const inputTel = document.getElementById('tel')
const inputCpf = document.getElementById('CPF')
const inputSenha = document.getElementById('senha')
const inputConfirmarSenha = document.getElementById('confirmar_senha') 
const submitBtn = document.querySelector('.submitBtn')
const btnRedefinir = document.querySelector('.btnRedefinir')
const modal = document.querySelector('.modal')
const formRedefinir = document.querySelector('.form-redefinir')
const emailRedefinir = document.getElementById('emailRedefinir')
const loading = document.querySelector('.loading')
const modalEmailEnviado = document.querySelector('.modal-email-enviado')
const modalEmail = document.querySelector('.modalEmail')
const btnContinuar = document.querySelector('.btnContinuar')
// 







submitBtn.addEventListener('click', () =>{
    if(inputNome.value === ""){
        inputNome.focus();
        setErro(inputNome, "O nome é obrigatório")
    }else{
        const formItem = inputNome.parentElement;
        formItem.className = "box";
    }
    
    if(inputSobrenome.value === ""){
        setErro(inputSobrenome, "O sobrenome é obrigatório")
    }else{
        const formItem = inputSobrenome.parentElement;
        formItem.className = "box";
    }

    if(inputEmail.value === ""){
        setErro(inputEmail, "O email é obrigatório")
    }else{
        const formItem = inputEmail.parentElement;
        formItem.className = "box";
    }

    if(inputConfirmarEmail.value === ""){
        setErro(inputConfirmarEmail, "Confirme o email")
    }else if(inputConfirmarEmail.value !== inputEmail.value){
        setErro(inputConfirmarEmail, "Email não são iguais")
    }else{
        const formItem = inputConfirmarEmail.parentElement;
        formItem.className = "box";
    }

    if(inputTel.value === ""){
        setErro(inputTel, "O telefone é obrigatório")
    }else{
        const formItem = inputTel.parentElement;
        formItem.className = "box";
    }

    if(inputCpf.value === ""){
        setErro(inputCpf, "O CPF é obrigatório")
    }else{
        const formItem = inputCpf.parentElement;
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


inputNome.addEventListener('keyup', () =>{
    if(inputNome.value === ""){
        setErro(inputNome, "O nome é obrigatório")
    }else{
        const formItem = inputNome.parentElement;
        formItem.className = "box";
    }
})


inputSobrenome.addEventListener('keyup', () =>{
    if(inputSobrenome.value === ""){
        setErro(inputSobrenome, "O sobrenome é obrigatório")
    }else if(inputSobrenome.value === inputNome.value){
        setErro(inputSobrenome, "Sobrenome não pode ser igual ao nome")
    }else{
        const formItem = inputSobrenome.parentElement;
        formItem.className = "box";
    }
})


inputEmail.addEventListener('keyup', () =>{
    if(inputEmail.value === ""){
        setErro(inputEmail, "email é obrigatório")
    }else{
        const formItem = inputEmail.parentElement;
        formItem.className = "box";
    }
})

inputConfirmarEmail.addEventListener('keyup', () =>{
    if(inputConfirmarEmail.value === ""){
        setErro(inputConfirmarEmail, "Confirme o email")
    }else if(inputConfirmarEmail.value !== inputEmail.value){
        setErro(inputConfirmarEmail, "Email não são iguais")
    }else{
        const formItem = inputConfirmarEmail.parentElement;
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

inputCpf.addEventListener('keyup', () =>{
    valideCPF(inputCpf)
    if(inputCpf.value.length <= 14){
        formateCPF(inputCpf);
    }else{
        inputCpf.value = inputCpf.value.slice(0, 14);
    }
    if((inputCpf.value === "") || (inputCpf.value.length < 14)){
        setErro(inputCpf, "Digite um CPF válido")
    }else{
        const formItem = inputCpf.parentElement;
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








form.addEventListener('submit', (e) =>{

    let isValide = true;

    if(inputNome.value === ""){
        isValide = false;
    }

    if(inputSobrenome.value === "" || inputSobrenome.value === inputNome.value){
        isValide = false;
    }
    
    if(inputEmail.value === "" || inputEmail.value.length < 6){
        isValide = false;
    }

    if(inputSenha.value === "" || inputSenha.value.length < 8){
        isValide = false;
    }
    
    if(inputConfirmarSenha.value === "" || inputConfirmarSenha.value !== inputSenha.value || inputSenha.value === ""){
        isValide = false;
    }

    if(inputTel.value === "" || inputTel.value.length > 15 || inputTel.value.length < 15){
        isValide = false;
    }

    if(inputCpf.value === "" || inputCpf.value.length < 14){
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

const formateCPF = (input) =>{
    let v = input.value.replace(/\D/g, '');

    if(v.length >= 3){
        v = v.replace(/^(\d{3})(\d)/, '$1.$2');
    }

    if (v.length >= 6) {
        v = v.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
    }
    if (v.length >= 9) {
        v = v.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4');
    }

    input.value = v;
}
const valideCPF = (input) =>{
    const cpfNumeros = input.value.replace(/\D/g, '');
    if(cpfNumeros.length === 11){
        return true
    }else{
        return false
    }
}