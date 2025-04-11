function exportarResumoExcel() {
    const categorias = window.dadosCategorias || [];
    const meses = window.dadosRelatorio || [];
    const despesas = window.todasDespesas || [];

    const wb = XLSX.utils.book_new();

    // Aba 1: Despesas detalhadas
    const dadosDespesas = [["Nome", "Valor (R$)", "Categoria", "Data"]];
    despesas.forEach(d => {
        dadosDespesas.push([
            d.nome,
            parseFloat(d.valor),
            d.categoria,
            formatarData(d.data)
        ]);
    });
    const wsDespesas = XLSX.utils.aoa_to_sheet(dadosDespesas);
    XLSX.utils.book_append_sheet(wb, wsDespesas, "Todas as Despesas");

    // (Opcional) Outras abas se quiser manter resumo por categoria e mês
    // ...

    XLSX.writeFile(wb, "despesas_completas.xlsx");
}

function formatarData(dataISO) {
    const data = new Date(dataISO);
    return data.toLocaleDateString("pt-BR");
}
