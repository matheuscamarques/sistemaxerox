


<?php



/**
 * Esta función devuelve el número de páginas de un archivo pdf
 * Tiene que recibir la ubicación y nombre del archivo
 */
function numeroPaginasPdf(String $archivoPDF)
{
    $stream = fopen($archivoPDF, "r");
    $content = fread ($stream, filesize($archivoPDF));

    if(!$stream || !$content)
        return 0;

    $count = 0;

    $regex  = "/\/Count\s+(\d+)/";
    $regex2 = "/\/Page\W*(\d+)/";
    $regex3 = "/\/N\s+(\d+)/";

    if(preg_match_all($regex, $content, $matches))
        $count = max($matches);

    return $count[0];
}



//echo number_format(retornaValorPedido("file1.pdf","PB","FV"), 2, '.', ',')."R$";

?>




