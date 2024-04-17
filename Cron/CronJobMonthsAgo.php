<?php

date_default_timezone_set('America/Sao_Paulo');

$pasta = dir(__DIR__);

$dataLimite = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")."-3 month"));

while (($arquivos = $pasta->read()) !== false) {
    $files = new SplFileInfo($arquivos);
    $dataArquivo = date("Y-m-d H:i:s", $files->getMTime());
    if(strtotime($dataArquivo) <= strtotime($dataLimite)){
        echo $dataArquivo . " menor que ". $dataLimite.PHP_EOL;
        @unlink($arquivos);
        echo $arquivos . " foi excluído".PHP_EOL;
    }
 }