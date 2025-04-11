    const inputValor = document.querySelector('input[name="valor"]');

    inputValor.addEventListener('input', function () {
        let value = this.value.replace(/\D/g, ''); // remove tudo que não for número

        // Se não houver valor, define como '0,00'
        if (value === '') {
            this.value = '';
            return;
        }

        // Divide por 100 para transformar centavos e fixa com 2 casas decimais
        value = (parseInt(value, 10) / 100).toFixed(2);

        // Troca ponto por vírgula e adiciona os pontos de milhar
        value = value.replace('.', ',');
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        this.value = value;
    });

    inputValor.addEventListener('blur', function () {
        if (this.value === '') {
            this.value = '0,00';
        }
    });

    // Inicializa o campo se estiver vazio ao carregar
    window.addEventListener('DOMContentLoaded', () => {
        if (inputValor.value === '') {
            inputValor.value = '0,00';
        }
    });
