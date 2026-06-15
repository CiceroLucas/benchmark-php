<?php
declare(strict_types=1);

function lerArquivoPorPedacos(string $caminho): Generator {
    $handle = fopen($caminho, 'r');
    if (!$handle) {
        throw new Exception("Não foi possível abrir o arquivo.");
    }

    while (($linha = fgetcsv($handle)) !== false) {
        yield $linha; 
    }

    fclose($handle);
}

function processarDadosRapido(): void {
    $inicio = microtime(true);
    
    $caminhoArquivo = 'dados_producao.csv';
    $totalProcessado = 0;

    $taxaOtimizada = 1.1;

    foreach (lerArquivoPorPedacos($caminhoArquivo) as $dados) {
        
        $id = (int)$dados[0];
        $status = $dados[1];
        $valor = (float)$dados[2];

        $valorCalculado = $valor * $taxaOtimizada;
        $totalProcessado++;
    }

    $fim = microtime(true);
    echo "Tempo de Execução (Rápido): " . round($fim - $inicio, 4) . " segundos\n";
    echo "Memória Consumida: " . round(memory_get_peak_usage() / 1024 / 1024, 2) . " MB\n";
}

processarDadosRapido();