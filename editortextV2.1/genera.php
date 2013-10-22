<?php 
	$texto = isset($_POST["mitexto"])? $_POST["mitexto"]: '';
	$mensaje = isset($_POST["mensaje"])? $_POST["mensaje"]: '';
	$group = isset($_POST["group1"])? $_POST["group1"]: '';
	$seleccion = isset($_POST["sel"])? $_POST["sel"]: '';
	
	echo "<br>".$mensaje;
	
	for ($i = 0; $i < count($texto); $i++)    
	{     
		echo "<br> Texto " . $i . ": " . $texto[$i];    
	}	
	
	for ($i = 0; $i < count($group); $i++)    
	{     
		echo "<br> Opción seleccionada " . $i . ": " . $group[$i];    
	}
	
	for ($i = 0; $i < count($seleccion); $i++)    
	{     
		echo "<br> Opción " . $i . ": " . $seleccion[$i];    
	}
?>