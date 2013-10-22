<?php
function Conectarse() 
{ 
   if (!($link=mysql_connect("localhost", "root", "c1nd3r"))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 
   if (!mysql_select_db("fichas",$link)) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   }   
} 

function desconectar()
{
	mysql_close();
}
?>