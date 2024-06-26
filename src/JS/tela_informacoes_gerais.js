const inputNome = document.getElementById('nome');
const inputSobreNome = document.getElementById('sobrenome');
const inputDataNasc = document.getElementById('data-nasc');
const inputsexo = document.getElementById('sexo');
const inputCpf = document.getElementById('cpf');
const inputSenha = document.getElementById('senha');
const inputEstadoCivil = document.getElementById('estado-civil');
const inputEmail = document.getElementById('email');
const inputTel = document.getElementById('celular');
const form = document.querySelector('form');
const inputResposta = document.getElementById('input-Resposta');
const askUsuario = document.getElementById('ask-usuario');
const btnSalvar = document.querySelector('.salvar');
const tooltip = document.querySelector('.tooltip')



// 
inputResposta.addEventListener('keyup', () =>{
    if(inputResposta.value === "") {
        setErro(inputResposta, "Pergunta e resposta são obrigatório")
    }else{
        const formItem = inputResposta.parentElement;
        formItem.className = "box"
    }
})


// Input Nome
inputNome.addEventListener('keyup', () =>{

    if(inputNome.value === ""){
        setErro(inputNome, "Por favor, digite seu nome")
    }else{
        const formItem = inputNome.parentElement;
        formItem.className = "box";
    }
})


// Input Sobrenome
inputSobreNome.addEventListener('keyup', () =>{

    if(inputSobreNome.value === ""){
        setErro(inputSobreNome, "Por favor, digite seu sobrenome")
    }else if(inputSobreNome.value.length < 14){
        setErro(inputSobreNome, "Por favor, digite seu sobrenome")
    }else if (inputSobreNome.value === inputNome.value){
        setErro(inputSobreNome, ("Nome e Sobrenome não pode ser iguais"))
    
    }else{
        const formItem = inputSobreNome.parentElement;
        formItem.className = "box";
    }
})


// Input Data de nascimento

inputDataNasc.addEventListener('keyup', (e) =>{
    mascaraData(e.target);
    
    if(inputDataNasc.value === "" || inputDataNasc.value.length < 10){
        setErro(inputDataNasc, "Por favor, insira uma data válida")
        inputDataNasc.value = inputDataNasc.value.slice(0, 10);
    }else{
        const formItem = inputDataNasc.parentElement;
        formItem.className = "box"
    }

})




// Input CPF

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

// Input Cel

inputTel.addEventListener('keyup', (e) =>{
    validarTelefone(inputTel)
    if(inputTel.value.length <= 15){
        
    }else{
        inputTel.value = inputTel.value.slice(0, 15);
    }
    let valor = e.target.value;
    valor = valor.replace(/\D/g, "");
    valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2");
    valor = valor.replace(/(\d)(\d{4})$/, "$1-$2");
    e.target.value = valor;
});



form.addEventListener('submit', (e) =>{
    isValide = true;

    if(inputNome.value === ""){
        isValide = false;
    }

    if(inputSobreNome.value === "" || inputSobreNome.value === inputNome.value){
        isValide = false;
    }

    if(inputCpf.value === "" || inputCpf.value.length < 14){
        isValide = false;
    }

    if(inputTel.value.length < 15){
        isValide = false;
    }
    


    if(!isValide){
        e.preventDefault();
    }
})






// Funções Globais
const mascaraData = (val) => {
    var pass = val.value;
    var expr = /[0123456789]/;
  
    for (i = 0; i < pass.length; i++) {
      // Testa cada caractere e se não for número, elimina
      if (!expr.test(pass[i]) || pass.length > 10) {
        pass = pass.replace(pass[i], '');
        i--;
      }
    }
  
    pass = pass.replace(/^(\d{2})(\d)/, "$1/$2");
    pass = pass.replace(/^(\d{2}\/\d{2})(\d)/, "$1/$2");
    val.value = pass;
  }

const criaMascaraData = (input) =>{
    const valor = input.value.replace(/\D/g, "");
    if(valor.length === 8){
        const dataFormato = `${valor.slice(0,2)}/${valor.slice(2, 4)}/${valor.slice(4)}`;
        input.value = dataFormato;
    }
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
const validarTelefone = (input) =>{
    const regexTel = /^\(\d{2}\) \d{5}-\d{4}$/;

    if(inputTel.value === ""){
        setErro(inputTel, "Celular deve ser Preenchido")
        
    }else if(!regexTel.test(input.value)){
        setErro(inputTel, "Celular esta Incorreto")

    }else{
           const formItem = inputTel.parentElement;
           formItem.className = "box";
    }
}
const setErro = (input, msg) =>{
    const formItem = input.parentElement;
    const textMsg = formItem.querySelector('span')

    textMsg.innerText = msg;
    formItem.className = "box erro"
}
const errorBorderRed = (input) =>{
        input.style.borderColor = "red"
}
const borderDefault = (input) =>{
    input.style.borderColor = "#3E3C4C";
}



// Modais dos botoes de editar 

const modalContainer = document.querySelector('.modal-container')
const btnEditPassword = document.querySelector('.btn-edit-password')
const modalEditPassword = document.querySelector('.modal-edit-password')
const btnModalPassword = document.querySelector('.btn-modal-password')

const modalContainerEmail = document.querySelector('.modal-container-email')
const btnEditEmail = document.querySelector('.btn-edit-email')
const modalEditEmail = document.querySelector('.modal-edit-email')
const btnModalEmail = document.querySelector('.btn-modal-email')

const inputSenhaAtual = document.getElementById('senha_atual')
const inputNovaSenha = document.getElementById('nova_senha')
const inputConfirmarNovaSenha = document.getElementById('confirmar_nova_senha')

const inputNovoEmail = document.getElementById('novo_email')
const inputConfirmarNovoEmail = document.getElementById('confirmar_novo_email')
const inputSenhaPadrao = document.getElementById('senha_padrao');

const btnSalvarSenha = document.querySelector('.btn-salva-senha')


    inputSenhaAtual.addEventListener('keyup', () =>{
    if(inputSenhaAtual.value === ""){
    errorBorderRed(inputSenhaAtual)
    setErro(inputSenhaAtual, "É preciso colocar a senha!")
    }else if(inputSenhaAtual.value.length < 8){
    errorBorderRed(inputSenhaAtual)
    setErro(inputSenhaAtual, "Use 8 caracters ou mais")
    }
    else{
    borderDefault(inputSenhaAtual)
    const formItem = inputSenhaAtual.parentElement;
    formItem.className = "box"
    }
    })
    inputNovaSenha.addEventListener('keyup', () =>{

    if(inputNovaSenha.value === ""){
    errorBorderRed(inputNovaSenha)
    setErro(inputNovaSenha, "É preciso colocar a senha!")
    }else if(inputNovaSenha.value.length < 8){
    errorBorderRed(inputNovaSenha)
    setErro(inputNovaSenha, "Use 8 caracters ou mais")
    }else if(inputNovaSenha.value === inputSenhaAtual.value){
    errorBorderRed(inputNovaSenha)
    setErro(inputNovaSenha, "senha nova não pode ser igual anterior")
    }
    else{
    borderDefault(inputNovaSenha)
    const formItem = inputNovaSenha.parentElement;
    formItem.className = "box"
    }
    })
    inputConfirmarNovaSenha.addEventListener('keyup', () =>{
    if(inputConfirmarNovaSenha.value === ""){
    errorBorderRed(inputConfirmarNovaSenha)
    setErro(inputConfirmarNovaSenha, "É preciso confirmar a senha")
    }else if(inputConfirmarNovaSenha.value !== inputNovaSenha.value){
    errorBorderRed(inputConfirmarNovaSenha)
    setErro(inputConfirmarNovaSenha, "As senhas devem ser iguais")
    }else{
    borderDefault(inputConfirmarNovaSenha)
    const formItem = inputConfirmarNovaSenha.parentElement;
    formItem.className = "box"
    }
    })


    const formModal = document.querySelector('.form-modal').addEventListener('submit', (e) =>{
        isValide = true;
    
        if(inputSenhaAtual.value === "" || inputSenhaAtual.value.length < 8){
            isValide = false;
        } 
    
        if(inputNovaSenha.value === "" || inputNovaSenha.value.length < 8 || inputNovaSenha.value === inputSenhaAtual.value){
            isValide = false;
        }
    
        if(inputConfirmarNovaSenha.value === "" || inputConfirmarNovaSenha.value !== inputNovaSenha.value){
            isValide = false;
        }
    
        if(!isValide){
            e.preventDefault();
        }
    
        
    })



    inputNovoEmail.addEventListener('keyup', (e) => {
        if (inputNovoEmail.value === "") {
            errorBorderRed(inputNovoEmail);
            setErro(inputNovoEmail, "É preciso colocar um e-mail!");
        } else {
            borderDefault(inputNovoEmail);
            const formItem = inputNovoEmail.parentElement;
            formItem.className = "box";
        }
    });
    
    inputConfirmarNovoEmail.addEventListener('keyup', () => {
        if (inputConfirmarNovoEmail.value === "") {
            errorBorderRed(inputConfirmarNovoEmail);
            setErro(inputConfirmarNovoEmail, "É preciso confirmar o e-mail!");
        } else if (inputConfirmarNovoEmail.value !== inputNovoEmail.value) {
            errorBorderRed(inputConfirmarNovoEmail);
            setErro(inputConfirmarNovoEmail, "Os e-mails devem ser iguais");
        } else {
            borderDefault(inputConfirmarNovoEmail);
            const formItem = inputConfirmarNovoEmail.parentElement;
            formItem.className = "box";
        }
    });
    
    inputSenhaPadrao.addEventListener('keyup', () => {
        if (inputSenhaPadrao.value === "") {
            errorBorderRed(inputSenhaPadrao);
            setErro(inputSenhaPadrao, "É preciso colocar a senha!");
        }else if(inputSenhaPadrao.value !== inputNovaSenha.value){
            
        } 
        else if (inputSenhaPadrao.value.length < 8) {
            errorBorderRed(inputSenhaPadrao);
            setErro(inputSenhaPadrao, "A senha precisa de, no mínimo, 8 caracteres");
        } else {
            borderDefault(inputSenhaPadrao);
            const formItem = inputSenhaPadrao.parentElement;
            formItem.className = "box";
        }
    });
    
    document.querySelector('.form-modal-email').addEventListener('submit', (e) => {
        let isValide = true;
    
        if (inputNovoEmail.value === "") {
            isValide = false;
        }
    
        if (inputConfirmarNovoEmail.value === "" || inputConfirmarNovoEmail.value !== inputNovoEmail.value) {
            isValide = false;
        }
    
        if (inputSenhaPadrao.value === "" || inputSenhaPadrao.value.length < 8) {
            isValide = false;
        }
    
        if (!isValide) {
            e.preventDefault();
        }
    });


const modalBtnPassword = () =>{
    document.addEventListener('click', (e) =>{
        const el = e.target;
        if(el.classList.contains('btn-edit-password')){
            modalContainer.classList.add('show')
            document.body.classList.add('block')
        }else if((!modalEditPassword.contains(el) || (el.classList.contains('btn-modal-password')))){
            modalContainer.classList.remove('show')
            document.body.classList.remove('block')
        }
    })
}
modalBtnPassword();

const modalBtnEmail = () =>{
    document.addEventListener('click', (e) =>{
    const el = e.target;
    if(el.classList.contains('btn-edit-email')){
        modalContainerEmail.classList.add('show');
        document.body.classList.add('blocked');
    }else if((!modalEditEmail.contains(el) || (el.classList.contains('btn-modal-email')))){
        modalContainerEmail.classList.remove('show')
        document.body.classList.remove('blocked')
    }
  })
}
modalBtnEmail();


const btnVisibility = document.querySelector('.visibility-password-email')
const btnSenhaAtual = document.getElementById('senha_atual_btn')
const btnNovaSenha = document.getElementById('nova_senha_btn')
const btnConfirmarNovaSenha = document.getElementById('confirmar_nova_senha_btn')


btnVisibility.addEventListener('click', () =>{
    getTextPassword(inputSenhaPadrao)
})

btnSenhaAtual.addEventListener('click', () =>{
    getTextPassword(inputSenhaAtual)
})
btnNovaSenha.addEventListener('click', () =>{
    getTextPassword(inputNovaSenha)
})

btnConfirmarNovaSenha.addEventListener('click', () =>{
    getTextPassword(inputConfirmarNovaSenha)
})



const getTextPassword = (input) =>{
    if(input.type === "password"){
        input.type = "text"
    }else{
        input.type = "password";
    }
}

