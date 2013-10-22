<?php
include ("conexion.php");

$IdResev = isset($_GET['IdResev'])? $_GET['IdResev']:'';
Conectarse();
		$sql = "SELECT * FROM principal where id=$IdResev;";
		$result = mysql_query($sql);
		desconectar();

$name="";
$xml = new SimpleXMLElement("<dataset

    xmlns='http://www.eol.org/transfer/content/0.3'

    xmlns:xsd='http://www.w3.org/2001/XMLSchema'

    xmlns:dc='http://purl.org/dc/elements/1.1/'

    xmlns:dcterms='http://purl.org/dc/terms/'

    xmlns:geo='http://www.w3.org/2003/01/geo/wgs84_pos#'

    xmlns:dwc='http://rs.tdwg.org/dwc/dwcore/'

    xmlns:adw='http://animaldiversity.ummz.umich.edu/morphology/'

    xmlns:eol='http://www.eol.org/transfer/content/0.3'

    xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'	

    xsi:schemaLocation='PliC_3.0-AbstractModel_v5.xsd'>

    </dataset>");

while($registro=mysql_fetch_row($result)){
    
    $taxon = $xml->addChild('TaxonRecord');
    $nc = $taxon->addChild('TaxonRecordId', $registro[7]);
    
    $reino = $taxon->addChild('NameUnstructured', $registro[2]);
    $reino->addAttribute('xml:lang', 'es');
    
    $phylum = $taxon->addChild('NameUnstructured', $registro[3]);
    $phylum->addAttribute('xml:lang', 'es');
    
    $clase = $taxon->addChild('NameUnstructured', $registro[4]);
    $clase->addAttribute('xml:lang', 'es');
    
    $orden = $taxon->addChild('NameUnstructured', $registro[5]);
    $orden->addAttribute('xml:lang', 'es');
    
    $familia = $taxon->addChild('NameUnstructured', $registro[6]);
    $familia->addAttribute('xml:lang', 'es');
    
    $name=$registro[5];
}
header('Content-disposition: attachment; filename='.$name.'.xml');
header('Content-Type: text/xml');

 
/**
 * Para que se vea bien al mirar el código fuente
 * pero si no te importa con tan solo colocar la siguiente línea
 * echo $xml->asXML();
 * es suficiente
 */
$outXML = $xml->asXML(); 
$xml = new DOMDocument(); 
$xml->preserveWhiteSpace = false; 
$xml->formatOutput = true; 
$xml->loadXML($outXML); 
echo $xml->saveXML();
?>