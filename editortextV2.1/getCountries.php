<?php

	include("conexion.php");	
	Conectarse();
	$query = "SELECT CVE_EDO, EDO_NOM10 FROM edos_munic GROUP BY EDO_NOM10 ORDER BY CVE_EDO,EDO_NOM10;";
    $result = mysql_query($query);
    $items = array();
    if($result && 
       mysql_num_rows($result)>0) {
        while($row = mysql_fetch_array($result)) {
            $items[$row[0]] = $row[1];
        }        
    }
    mysql_close();	
	header('content-type: application/json; charset=utf-8');
    // convert into JSON format and print
	$response = json_encode($items);
	if(isset($_GET['callback'])) {
		echo $_GET['callback']."(".$response.")";  
	} else {
		echo $response;	
	}
    
	
?>