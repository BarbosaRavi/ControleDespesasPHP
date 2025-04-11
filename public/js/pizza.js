const categorias = dadosCategorias.map(item => item.categoria);
const totais = dadosCategorias.map(item => item.total);

const ctxPizza = document.getElementById('graficoPizza').getContext('2d');
new Chart(ctxPizza, {
    type: 'pie',
    data: {
        labels: categorias,
        datasets: [{
            label: 'Gastos por Categoria',
            data: totais,
            backgroundColor: categorias.map(() =>
                '#' + Math.floor(Math.random()*16777215).toString(16)
            ),
            borderWidth: 1
        }]
    }
});
