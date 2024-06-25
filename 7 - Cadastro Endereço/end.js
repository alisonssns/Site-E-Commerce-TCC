function formatarTelefone(input) {
    // Remove todos os caracteres que não são dígitos
    var numero = input.value.replace(/\D/g, '');
  
    // Verifique se o número de telefone tem pelo menos 10 dígitos
    if (numero.length >= 2) {
      // Formate o número de telefone no formato desejado
      var telefoneFormatado = '(' + numero.substring(0, 2) + ') ' + numero.substring(2, 7) + '-' + numero.substring(7, 11);
      input.value = telefoneFormatado;
    } else {
      // Se o número de telefone não tiver pelo menos 10 dígitos, deixe-o como está
      input.value = numero;
    }
  }


function formatarCEP(input) {
    // Remove todos os caracteres não numéricos
    var cep = input.value.replace(/\D/g, '');
    
    // Formata o CEP como "00000-000"
    if (cep.length >= 5) {
        cep = cep.substring(0, 5) + '-' + cep.substring(5, 9);
    }
    
    // Atualiza o valor do campo
    input.value = cep;
}

function formatarCPF(campo) {
    // Remove caracteres não numéricos
    campo.value = campo.value.replace(/\D/g, '');

    // Adiciona a formatação do CPF
    campo.value = campo.value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
}
 // Função utilizando a API iaCEP para consultar o CEP
 function consultarCEP() {
    const cep = document.querySelector("#cep").value;
    const url = `https://viacep.com.br/ws/${cep}/json/`;

    // Realiza uma solicitação fetch para obter os dados do CEP
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error("Não foi possível consultar o CEP.");
            }
            return response.json();
        })
        .then(data => {
            if (data.erro) {
                alert("CEP não encontrado.");
            } else {
                // Preenche os campos de endereço com os dados obtidos
                document.getElementById("logradouro").value = data.logradouro;
                document.getElementById("bairro").value = data.bairro;
                document.getElementById("localidade").value = data.localidade;
                document.getElementById("uf").value = data.uf;
            }
        })
        .catch(error => {
            console.error("Ocorreu um erro ao consultar o CEP:", error);
        });
}

// Função para salvar o endereço e informações pessoais
function salvarEndereco() {
    const cep = document.querySelector("#cep").value;
    const logradouro = document.querySelector("#logradouro").value;
    const bairro = document.querySelector("#bairro").value;
    const localidade = document.querySelector("#localidade").value;
    const uf = document.querySelector("#uf").value;
    const nomeCompleto = document.querySelector("#nomeCompleto").value;
    const tel = document.querySelector("#tel").value;
    const cpf = document.querySelector("#cpf").value;
    const num = document.querySelector("#num").value;
    const comp = document.querySelector("#comp").value;
    const radio = document.querySelectorAll('input[name="tipo"]:checked');
    const tipo = (radio[0].value);
    // Verifica se todos os campos obrigatórios foram preenchidos
    if (!logradouro || !cep ||!bairro || !localidade || !uf || !nomeCompleto || !tel || !num || !cpf) {
        alert("Preencha todos os campos obrigatórios.");
        return;
    }

    // Cria um objeto FormData (interface JavaScript que permite criar e gerenciar facilmente objetos que representam dados de formulário HTML) para enviar os dados
    const formData = new FormData();
    formData.append("cep", cep); 
    formData.append("logradouro", logradouro);
    formData.append("bairro", bairro);
    formData.append("localidade", localidade);
    formData.append("uf", uf);
    formData.append("nomeCompleto", nomeCompleto);
    formData.append("tel", tel);
    formData.append("cpf", cpf);
    formData.append("num", num);
    formData.append("comp", comp);
    formData.append("tipo", tipo);
    // Envia os dados do endereço e informações pessoais para o servidor usando XMLHttpRequest (API comumente usada para buscar e enviar dados entre um navegador da web e um servidor, sem a necessidade de recarregar a página).
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "save.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                alert("Dados salvos com sucesso!");
            } else {
                alert("Erro ao salvar os dados.");
            }
        }
    };

    xhr.send(formData); // Envie o objeto FormData para o servidor
}