function atualizarTexto() {
    var textoDigitado = document.getElementById('text').value;
  
    document.getElementById('texto-refletido').innerText = textoDigitado;
  }

  function atualizarValor() {
    var textoDigitado = document.getElementById('val').value;
  
    document.getElementById('valor-refletido').innerText = textoDigitado;
  }

  function atualizarDesc() {
    var textoDigitado = document.getElementById('descri').value;
  
    document.getElementById('descricao-refletida').innerText = textoDigitado;
  }

  function trocarSrcImagem() {
    var imagemInput = document.getElementById('imagem-cria');
    var imagemRefletida = document.getElementById('Imagem-refletida');
  
    if (imagemInput.files && imagemInput.files[0]) {
      var reader = new FileReader();
  
      reader.onload = function(e) {
        imagemRefletida.style.backgroundImage = `url(${e.target.result})`;
      }
  
      reader.readAsDataURL(imagemInput.files[0]);
    }
  }