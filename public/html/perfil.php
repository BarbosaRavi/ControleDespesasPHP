<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: /html/login.php");
    exit;
}

require_once __DIR__ . '/../../app/controllers/RelatorioController.php';

$relatorioController = new RelatorioController();
$dadosRelatorio = $relatorioController->gerarRelatorio($_SESSION['usuario']['id']);
$dadosCategorias = $relatorioController->gastosPorCategoria($_SESSION['usuario']['id']);
$dadosDetalhados = $relatorioController->listarTodasDespesas($_SESSION['usuario']['id']);

$usuario = $_SESSION['usuario'];
?> 

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil de <?= htmlspecialchars($usuario['nome']) ?></title>
    <link rel="stylesheet" href="../css/perfil.css">
</head>
<body>
    <h1>Bem-vindo, <?= htmlspecialchars($usuario['nome']) ?>!</h1>
    <hr>
    <h2>Relatório de Gastos</h2>
    <a href="../index.php">Voltar</a>
    <button onclick="exportarResumoExcel()">Exportar Resumo para Excel</button>

    <div class="relatorio-container">
        <div class="grafico-container">
            <h3>Proporção de Gastos por Categoria</h3>
            <canvas id="graficoPizza" width="350" height="350"></canvas>
        </div>

        <div class="grafico-container">
            <h3>Gastos Mensais</h3>
            <canvas id="graficoGastos" width="350" height="350"></canvas>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const dadosRelatorio = <?= json_encode($dadosRelatorio) ?>;
        const dadosCategorias = <?= json_encode($dadosCategorias) ?>;
        const dadosDetalhados = <?= json_encode($dadosDetalhados) ?>;

        function exportarResumoExcel() {
            const titulo = ['Título', 'Valor', 'Categoria', 'Data'];
            const linhas = dadosDetalhados.map(d => [d.titulo, d.valor, d.categoria, d.data]);

            let csv = titulo.join(",") + "\n";
            linhas.forEach(l => {
                csv += l.join(",") + "\n";
            });

            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.setAttribute('href', url);
            a.setAttribute('download', 'resumo_despesas.csv');
            a.click();
        }
    </script>
    <script src="../js/graficoPerfil.js"></script>
    <script src="../js/pizza.js"></script>
</body>
</html>
