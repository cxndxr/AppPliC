<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	include ("conexion.php");
	
	//conecto con la base de datos 
	//Conectarse();
	
	//Sentencia SQL para buscar un usuario con esos datos 
	//$ssql = "SELECT * FROM principal"; 

	//Ejecuto la sentencia 
	/*$rs = mysql_query($ssql); 
	if ($row = mysql_fetch_array($rs)){
		$Id=$row["Id"];
		$edo=$row["estado"];
		$check=$row["check"];		
	}
	desconectar();*/
?> 

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Generador de fichas de especies</title>
		<script type = "text/javascript" src = "../js/livevalidation_standalone.js"></script>		
	</head>
	<body>
		<h2>Fichas almacenadas</h2>
		<?php
			Conectarse();
			$sql = "SELECT * FROM principal";
			$result = mysql_query($sql);
			$numFilas=mysql_num_rows($result);
			$temp=0;
			
			if ( $numFilas > 1 )
			echo "<br/><h3>Se tienen $numFilas fichas</h3> <br /><br />";	
			else if ( $numFilas == 1 ) echo "<br/><h3>Se tiene $numFilas ficha</h3> <br /><br />";
			
			if ( $numFilas == 0 ){
				echo "<br/><h3>Usted no tiene ninguna ficha</h3> <br />";
				echo "No tiene ninguna ficha actualmente, puede crear una <a href='FormReserva.php'>aquí</a>.<br /><br />";				
			}
			desconectar();
			
			if ($row = mysql_fetch_array($result))
			{
				echo "<table align='center' border='0' height=20 width='100%' cellpadding='0' cellspacing='0'> \n";
				echo "<tr bgcolor= '#8E161E'> \n";
					echo "<td align='center' valign='middle'><font color='white'><b>&nbsp&nbsp&nbspId&nbsp&nbsp&nbsp </b></td> \n";
					echo "<td align='center' valign='middle'><font color='white'><b>&nbsp&nbsp&nbspNombres comunes&nbsp&nbsp&nbsp</b></td> \n";
					echo "<td align='center' valign='middle'><font  color='white'><b>&nbsp&nbsp&nbspReino&nbsp&nbsp&nbsp</b></td> \n";	
					echo "<td align='center' valign='middle'><font  color='white'><b>&nbsp&nbsp&nbspPhylum&nbsp&nbsp&nbsp</b></td> \n";	
					echo "<td align='center' valign='middle'><font  color='white'><b>&nbsp&nbsp&nbspClase&nbsp&nbsp&nbsp</b></td> \n";	
					echo "<td align='center' valign='middle'><font  color='white'><b>&nbsp&nbsp&nbspOrden&nbsp&nbsp&nbsp</b></td> \n";
					echo "<td align='center' valign='middle'><font  color='white'><b>&nbsp&nbsp&nbspFamilia&nbsp&nbsp&nbsp</b></td> \n";
					echo "<td align='center' valign='middle'><font  color='white'><b>&nbsp&nbsp&nbspEliminar&nbsp&nbsp&nbsp</b></td> \n";
					echo "<td align='center' valign='middle'><font   color='white'><b>&nbsp&nbsp&nbspModificar&nbsp&nbsp&nbsp</b></td> \n";
                                        echo "<td align='center' valign='middle'><font   color='white'><b>&nbsp&nbsp&nbspXML&nbsp&nbsp&nbsp</b></td> \n";
				echo "</tr> \n";
								
				do
				{
					if(($temp % 2)==0){
						echo "<tr bgcolor= '#F2F2F2'> \n";
						echo "<td align='center' valign='middle'><font >".$row["Id"]."</td> \n";
						echo "<td align='center' valign='middle'><font >".$row["nombreComun"]."</td> \n";
						echo "<td align='center' valign='middle'><font >".$row["reino"]."</td> \n";
						echo "<td align='center' valign='middle'><font >".$row["phylum"]."</td> \n";
						echo "<td align='center' valign='middle'><font >".$row["clase"]."</td> \n";
						echo "<td align='center' valign='middle'><font >".$row["orden"]."</td> \n";
						echo "<td align='center' valign='middle'><font >".$row["familia"]."</td> \n";
						echo "<td align='center' valign='middle'><font ><a href='FormReserva.php?IdResev=".$row["Id"]."&Opc=Del'>Cancelar</a></td> \n";
						echo "<td align='center' valign='middle'><font ><a href='FormReserva.php?IdResev=".$row["Id"]."&Opc=Mod'>Modificar</a></td> \n";
                                                echo "<td align='center' valign='middle'><font ><a href='crearxml.php?IdResev=".$row["Id"]."' target='_blank'>Crea xml</a></td> \n";
						$temp++;
					}
					else{
						echo "<tr bgcolor= '#E6E6E6'> \n";
						echo "<td align='center' valign='middle'><font >".$row["Id"]."</td> \n";
						echo "<td align='center' valign='middle'><font >".$row["nombreComun"]."</td> \n";
						echo "<td align='center' valign='middle'><font >".$row["reino"]."</td> \n";
						echo "<td align='center' valign='middle'><font >".$row["phylum"]."</td> \n";
						echo "<td align='center' valign='middle'><font >".$row["clase"]."</td> \n";
						echo "<td align='center' valign='middle'><font >".$row["orden"]."</td> \n";
						echo "<td align='center' valign='middle'><font >".$row["familia"]."</td> \n";
						echo "<td align='center' valign='middle'><font ><a href='FormReserva.php?IdResev=".$row["Id"]."&Opc=Del'>Cancelar</a></td> \n";
						echo "<td align='center' valign='middle'><font ><a href='FormReserva.php?IdResev=".$row["Id"]."&Opc=Mod'>Modificar</a></td> \n";
                                                echo "<td align='center' valign='middle'><font ><a href='crearxml.php?IdResev=".$row["Id"]."' target='_blank'>Crea xml</a></td> \n";
						$temp++;
					}
				}while ($row = mysql_fetch_array($result));
				echo "</table><br /><br />";
				echo "<a href='FormReserva.php'>Nueva ficha.</a>";
				echo "<br /><br />";
			}
			
		?>
</body>
</html>