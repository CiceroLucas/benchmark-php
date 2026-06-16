<?php

$handle = fopen('dados_producao.csv', 'w');
for ($i = 1; $i <= 1000; $i++) {
    fputcsv($handle, [$i, "status_disponivel_{$i}", rand(10, 500)]);
}
fclose($handle);
echo "Arquivo de teste com 1000 linhas gerado com sucesso!\n";
