const meses = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
const labels = dadosRelatorio.map(item => meses[item.mes - 1]);
const valores = dadosRelatorio.map(item => parseFloat(item.total));

const ctx = document.getElementById('graficoGastos').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total Gasto (R$)',
            data: valores,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function exportarExcel() {
    alert("Função de exportação ainda será implementada.");
}
