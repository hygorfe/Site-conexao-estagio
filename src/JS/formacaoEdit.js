const dataTermino = document.getElementById("data-termino");
dataTermino.addEventListener('keypress', function(e) {

    var valor = e.target.value;
  
  // Permitir apenas números
  var charCode = (e.which) ? e.which : e.keyCode;
  if (charCode < 48 || charCode > 57) {
    e.preventDefault();
    return;
  }
  
  // Permitir apenas 4 números
  if (valor.length >= 4) {
    e.preventDefault();
  }
});

// 