<?php

	include("conexion.php");	
	Conectarse();
	  // Get parameters from Array
    $id_country = !empty($_GET['id_country'])?intval($_GET['id_country']):0;
	
	$query = "SELECT CVE_MUN, MPIO_NOM10 FROM edos_munic WHERE CVE_EDO = $id_country AND MPIO_NOM10 is not null GROUP BY CVE_MUN, MPIO_NOM10 ORDER BY MPIO_NOM10;";
	//if($id_country>0) $query.=" WHERE id_country = '$id_country'";
	
	$result = mysql_query($query);
	//mylog($_SERVER['REQUEST_URI']);
	//mylog($query);
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
	if(isset($_GET['callback'])) { //json padding
		echo $_GET['callback']."(".$response.")";  
	} else {
		echo $response;	
	}
	
?>