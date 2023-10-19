const masks = {
    numeric: () => {
        // Obtém uma referência para todos os elementos com a classe "numerics_values"
        const numericInputs = document.querySelectorAll(".numerics_values");

        // Itera sobre os elementos e adiciona um ouvinte de evento de entrada a cada um
        numericInputs.forEach(function(input) {
            input.addEventListener("input", function() {
                // Obtém o valor do campo de entrada
                const inputValue = this.value;

                // Verifica se o valor contém letras usando uma expressão regular
                if (/[^0-9]/.test(inputValue)) {
                    // Se o valor contiver letras, notifique o usuário e remova as letras
                    $.notify("Digite apenas números.", "error");
                    this.value = inputValue.replace(/[^0-9]/g, "");
                    input.style.border = '1px solid red'; 
                } else {
                    input.style.border = '1px solid blue';  
                }
            });
        });
    } 
}


// PARA APLICAR MASCARA NUMERICA, BASTA COLOCAR COMO CLASSE "numerics_values"
masks.numeric();