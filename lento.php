<?php

function processarDadosLento() {
    $inicio = microtime(true);
    
    $linhas = file('dados_producao.csv'); 
    $resultado = [];

    foreach ($linhas as $linha) {
        $dados = str_getcsv($linha);
        
        usleep(100); 
        
        $resultado[] = [
            'id' => $dados[0],
            'status' => strtoupper($dados[1]),
            'valor' => (float)$dados[2] * 1.1 
        ];
    }

    $fim = microtime(true);
    echo "Tempo de Execução (Lento): " . round($fim - $inicio, 4) . " segundos\n";
    echo "Memória Consumida: " . round(memory_get_peak_usage() / 1024 / 1024, 2) . " MB\n";
}

processarDadosLento();