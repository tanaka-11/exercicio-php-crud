<?php
function formatarNota(float $nota):string {
    $formatacao = number_format($nota, 2, ",", ".");
    return $formatacao;
}
