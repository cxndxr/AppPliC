<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	include ("conexion.php");
	
	$IdResev = isset($_GET['IdResev'])? $_GET['IdResev']:'';
	$Opc = isset($_GET['Opc'])? $_GET['Opc']:'';

	function generaNOM059($unom)
	{
		Conectarse();
		$sql = "SELECT * FROM nom059;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='nom'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value=".$registro[0]." " .(($unom==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";		
	}
	
	function generaUICN($uiucn)
	{
		Conectarse();
		$sql = "SELECT * FROM uicn;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='uicn'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($uiucn==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";		
	}
	
	function generaCITES($ucites)
	{
		Conectarse();
		$sql = "SELECT * FROM cites;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='cites'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($ucites==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";	
	}
	
	function generaOrigen($uorigen)
	{
		Conectarse();
		$sql = "SELECT * FROM origen;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='origen'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($uorigen==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function generaPais($upais)
	{
		Conectarse();
		$sql = "SELECT * FROM pai_pais ORDER BY pai_nombre;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select data-placeholder='...' class='chosen-select' multiple style='width:420px;' tabindex='4' name='pais[]' id='pais'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .((in_array($registro[0], $upais))?'selected':"")." >".$registro[4]." (".$registro[3].")</option>";
		}
		echo "</select>";
	}
	
	function generaEstado($uedo)
	{
		Conectarse();
		$sql = "SELECT CVE_EDO, EDO_NOM10 FROM edos_munic GROUP BY EDO_NOM10 ORDER BY CVE_EDO,EDO_NOM10;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select data-placeholder='...' class='chosen-select' multiple style='width:420px;' tabindex='4' name='mexestado[]' id='mxestado'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .((in_array($registro[0], $uedo))?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function generaMunicipio($umunic)
	{
		Conectarse();
		$sql = "SELECT CVE_MUN, MPIO_NOM10 FROM edos_munic WHERE MPIO_NOM10 is not null GROUP BY MPIO_NOM10 ORDER BY MPIO_NOM10;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select data-placeholder='...' class='chosen-select' multiple style='width:420px;' tabindex='4' name='mexmun[]' id='mxmunicipio'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .((in_array($registro[0], $umunic))?'selected':"")." >".$registro[1]." </option>";
		}
		echo "</select>";
	}
	
	function generaPaisEndemica($upaisendemica)
	{
		Conectarse();
		$sql = "SELECT * FROM pai_pais ORDER BY pai_nombre;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='paisendemica'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($upaisendemica==$registro[0])?'selected':"")." >".$registro[4]." (".$registro[3].")</option>";
		}
		echo "</select>";
	}
	
	function generaEcosistema($uecosistema)
	{
		Conectarse();
		$sql = "SELECT * FROM ecosistema;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select data-placeholder='...' class='chosen-select' multiple style='width:420px;' tabindex='4' name='ecosistemas[]' id='ecosistemas'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .((in_array($registro[0], $uecosistema))?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function generaHabitatAntropico($sino, $habit)
	{
		Conectarse();
		$sql = "SELECT * FROM habitat_antropico;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='habitatantropico' id='habitatantropico' ".(($sino=='no')?'disabled':"").">";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($habit==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";	
	}
	
	function generaEcorregiones($uecorregiones)
	{
		Conectarse();
		$sql = "SELECT * FROM ecorregiones;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select data-placeholder='...' class='chosen-select' multiple style='width:420px;' tabindex='4' name='ecorregiones[]'>";
		echo "<option value='0'>Ecorregiones >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .((in_array($registro[0], $uecorregiones))?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function grupoVegetacion($num)
	{
		Conectarse();
		$sql = "SELECT * FROM GrupoVegetacion;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='tipoveg' onChange='slctryole(this,this.form.grupoveg)'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
			//$registro[1]=htmlentities($registro[1]);
			echo "<option value='".$registro[0]."'" .(($num==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
		//echo $num;
	}	
	
	function tipoVegetacion($num, $tipo)
	{
		if($tipo != ""){
			Conectarse();
			$sql = "SELECT * FROM TipoVegetacion WHERE IdVegetacion = '$num';";
			$result = mysql_query($sql);
			desconectar();
			//Voy imprimiendo el primer select compuesto por especie
			//echo $sql;
			echo "<select class='con_estilos' name='grupoveg'>";
			echo "<option value='0'>Update >></option>";
			while($registro=mysql_fetch_row($result))
			{
				// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
				//$registro[1]=htmlentities($registro[1]);
				echo "<option value='".$registro[0]."'" .(($tipo==$registro[0])?'selected':"")." >".$registro[2]."</option>";
			}
			echo "</select>";
			//echo $num;
		}
		else{
			echo "<select class='con_estilos' name='grupoveg'>";
			echo "<option value='0'>- - - - - - -</option>";
			echo "</select>";
		}
	}
	
	function tipoVegetacionFull($num)
	{
		Conectarse();
		$sql = "SELECT descripcion FROM tipovegetacionfull GROUP BY descripcion;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select data-placeholder='...' style='width:420px;' class='chosen-select' multiple tabindex='6' name='tipoveg[]'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<optgroup label='".$registro[0]."'>";
			Conectarse();
			$sql2 = "SELECT * FROM tipovegetacionfull WHERE descripcion='$registro[0]'";
			$result2 = mysql_query($sql2);
			desconectar();
			//Voy imprimiendo el primer select compuesto por especie
			while($registro2=mysql_fetch_row($result2))
			{
				echo "<option value='".$registro2[0]."'" .((in_array($registro2[0], $num))?'selected':"")." >".$registro2[3]."</option>";
			}
			echo "</optgroup>";
		}
		echo "</select>";
	}
		
	function generaClima($uclima)
	{
		Conectarse();
		$sql = "SELECT Clasificacion FROM tipo_clima GROUP BY Clasificacion;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='clima'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<optgroup label='".$registro[0]."'>";
			Conectarse();
			$sql2 = "SELECT * FROM tipo_clima WHERE Clasificacion='$registro[0]'";
			$result2 = mysql_query($sql2);
			desconectar();
			//Voy imprimiendo el primer select compuesto por especie
			while($registro2=mysql_fetch_row($result2))
			{
				echo "<option value='".$registro2[0]."'" .(($uclima==$registro2[0])?'selected':"")." >".$registro2[2]."</option>";
			}
			echo "</optgroup>";
		}
		echo "</select>";
	}
	
	function generaTiposuelo($utiposuelo)
	{
		Conectarse();
		$sql = "SELECT * FROM tiposuelo;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='tiposuelo'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($utiposuelo==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function generaGeoforma($ugeoforma)
	{
		Conectarse();
		$sql = "SELECT * FROM geoforma;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='geoforma'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($ugeoforma==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function generaEstrategiaTrofica($uestrofica)
	{
		Conectarse();
		$sql = "SELECT * FROM estrategia_trofica;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='estrategiatrofica'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($uestrofica==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function generaHabito($uhabito)
	{
		Conectarse();
		$sql = "SELECT * FROM habito;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='habito'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($uhabito==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function generaMes($ins, $tipo, $valor)
	{
		Conectarse();
		$sql = "SELECT * FROM meses;";
		$result = mysql_query($sql);
		desconectar();
		if($ins=='inicial')
		{			
			//Voy imprimiendo el primer select compuesto por especie
			echo "<select class='con_estilos' name='mesinicial".$tipo."'>";			
		}
		else
		{
			echo "<select class='con_estilos' name='mesfinal".$tipo."'>";	
		}
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($valor==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function generaCaracteristicasfruto($carac)
	{
		Conectarse();
		$sql = "SELECT * FROM caracteristica_fruto;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='caracfruto'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($carac==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function generaLatenciasemilla($latsemilla)
	{
		Conectarse();
		$sql = "SELECT * FROM latencia_semilla;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='latsemilla'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($latsemilla==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	function generaEstructuradispersora($opc)
	{
		Conectarse();
		$sql = "SELECT * FROM str_dispersora;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='structdisp'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($opc==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function generaInteracciones($Uinter)
	{
		Conectarse();
		$sql = "SELECT * FROM interacciones;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='interacciones'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($Uinter==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function generaFuncionecologica($ufuneco)
	{
		Conectarse();
		$sql = "SELECT * FROM funcion_ecologica;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='funcionecologica'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($ufuneco==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function generaComercio($com, $sjs)
	{
		Conectarse();
		$sql = "SELECT * FROM comercio;";
		$result = mysql_query($sql);
		desconectar();
		if($com=='nacional')
		{			
			//Voy imprimiendo el primer select compuesto por especie
			echo "<select class='con_estilos' name='comnal'>";			
		}
		else
		{
			echo "<select class='con_estilos' name='cominter'>";	
		}
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<option value='".$registro[0]."'" .(($sjs==$registro[0])?'selected':"")." >".$registro[1]."</option>";
		}
		echo "</select>";
	}
	
	function generaUsos($usos)
	{
		Conectarse();
		$sql = "SELECT uso FROM usos GROUP BY uso;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='usos'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<optgroup label='".$registro[0]."'>";
			Conectarse();
			$sql2 = "SELECT * FROM usos WHERE uso='$registro[0]'";
			$result2 = mysql_query($sql2);
			desconectar();
			//Voy imprimiendo el primer select compuesto por especie
			while($registro2=mysql_fetch_row($result2))
			{
				echo "<option value='".$registro2[0]."'" .(($usos==$registro2[0])?'selected':"")." >".$registro2[2]."</option>";
			}
			echo "</optgroup>";
		}
		echo "</select>";
	}
	
	function generaAmenazas($amena)
	{
		Conectarse();
		$sql = "SELECT amenaza FROM amenazas GROUP BY amenaza;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select data-placeholder='...' style='width:420px;' class='chosen-select' multiple tabindex='6' name='amenaza[]'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<optgroup label='".$registro[0]."'>";
			Conectarse();
			$sql2 = "SELECT * FROM amenazas WHERE amenaza='$registro[0]'";
			$result2 = mysql_query($sql2);
			desconectar();
			//Voy imprimiendo el primer select compuesto por especie
			while($registro2=mysql_fetch_row($result2))
			{
				echo "<option value='".$registro2[0]."'" .((in_array($registro2[0], $amena))?'selected':"")." >".$registro2[2]."</option>";
			}
			echo "</optgroup>";
		}
		echo "</select>";
	}
	
	function generaConservacion($conse)
	{
		Conectarse();
		$sql = "SELECT accion FROM acciones_conservacion GROUP BY accion;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select data-placeholder='...' style='width:420px;' class='chosen-select' multiple tabindex='4' name='conservacion[]'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<optgroup label='".$registro[0]."'>";
			Conectarse();
			$sql2 = "SELECT * FROM acciones_conservacion WHERE accion='$registro[0]'";
			$result2 = mysql_query($sql2);
			desconectar();
			//Voy imprimiendo el primer select compuesto por especie
			while($registro2=mysql_fetch_row($result2))
			{
				echo "<option value='".$registro2[0]."'" .((in_array($registro2[0],$conse))?'selected':"")." >".$registro2[2]."</option>";
			}
			echo "</optgroup>";
		}
		echo "</select>";
	}
	
	function generaAlimentacion($ualimentacion)
	{
		Conectarse();
		$sql = "SELECT tipo FROM alimentacion GROUP BY tipo;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='alimenta'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<optgroup label='".$registro[0]."'>";
			Conectarse();
			$sql2 = "SELECT * FROM alimentacion WHERE tipo='$registro[0]'";
			$result2 = mysql_query($sql2);
			desconectar();
			//Voy imprimiendo el primer select compuesto por especie
			while($registro2=mysql_fetch_row($result2))
			{
				if($registro2[3]!="")
				{
					echo "<option value='".$registro2[0]."'" .(($ualimentacion==$registro2[0])?'selected':"")." >".$registro2[2]."(".$registro2[3].")</option>";
				}else
				echo "<option value='".$registro2[0]."'" .(($ualimentacion==$registro2[0])?'selected':"")." >".$registro2[2]."</option>";
			}
			echo "</optgroup>";
		}
		echo "</select>";
	}
	
	function generaAcuatico($utipohabitat)
	{
		Conectarse();
		$sql = "SELECT tipo FROM habitat_acuatico GROUP BY tipo;";
		$result = mysql_query($sql);
		desconectar();
		//Voy imprimiendo el primer select compuesto por especie
		echo "<select class='con_estilos' name='habitatacuatico'>";
		echo "<option value='0'>Seleccionar >></option>";
		while($registro=mysql_fetch_row($result))
		{
			echo "<optgroup label='".$registro[0]."'>";
			Conectarse();
			$sql2 = "SELECT * FROM habitat_acuatico WHERE tipo='$registro[0]'";
			$result2 = mysql_query($sql2);
			desconectar();
			//Voy imprimiendo el primer select compuesto por especie
			while($registro2=mysql_fetch_row($result2))
			{
				if($registro2[3]!="")
				{
					echo "<option value='".$registro2[0]."'" .(($utipohabitat==$registro2[0])?'selected':"")." >".$registro2[2]."(".$registro2[3].")</option>";
				}else
				echo "<option value='".$registro2[0]."'" .(($utipohabitat==$registro2[0])?'selected':"")." >".$registro2[2]."</option>";
			}
			echo "</optgroup>";
		}
		echo "</select>";
	}
?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Editor de Textos </title>
	<!--script src="http://dl.dropbox.com/u/76575397/jQuery/jquery-1.9.1.min.js"></script-->
	<script type="text/javascript" src="editor/nicEdit.js"></script>
	<!--Esta parte solo es para los tooltips-->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script-->
	<script type="text/javascript" src="formToWizard.js"></script>
    <script type="text/javascript">
		
        function MakeWizard() {
            $("#SignupForm").formToWizard({ submitButton: 'enviar' })
            $("#makeWizard").hide();
            $("#info").fadeIn(400);
        }      
    </script>	
	<script type="text/javascript">

		function slctr(texto,valor){
			this.texto = texto;
			this.valor = valor;
		}
		var opc1=new Array();		
		opc1[0] = new slctr('- - - - - - - - - - - - - - - -Bosque de con\u00edferas- - - - - - - - - - - - - - - -',0)
		opc1[1] = new slctr("Bosque de ayar\u00edn",1)
		opc1[2] = new slctr("Bosque de cedro",2)
		opc1[3] = new slctr("Bosque de oyamel",3)
		opc1[4] = new slctr("Bosque de pino",4)
		opc1[5] = new slctr("Bosque de pino-encino",5)
		opc1[6] = new slctr("Bosque de t\u00e1scate",6)
		opc1[7] = new slctr("Matorral de con\u00ednferas",7)
		
		var opc2=new Array();		
		opc2[0] = new slctr('- - - - - - - - - - - - - - - - - -Bosque de encino- - - - - - - - - - - - - - - - - -',0)
		opc2[1] = new slctr("Bosque de encino",8)
		opc2[2] = new slctr("Bosque de encino-pino",9)
		
		var opc3=new Array();		
		opc3[0] = new slctr('- - - - - - - - - - - - -Bosque mes\u00f3filo de monta\u00f1a- - - - - - - - - - - - -',0)
		opc3[1] = new slctr("Bosque mes\u00f3filo de monta\u00f1a",10)
		
		var opc4=new Array();		
		opc4[0] = new slctr('- - - - - - - - - - - - - - - -Especial (otros tipos)- - - - - - - - - - - - - - - - -',0)
		opc4[1] = new slctr("Bosque de mezquite",11)
		opc4[2] = new slctr("Palmar natural",12)
		opc4[3] = new slctr("Vegetaci\u00f3n de dunas costeras",13)
		
		var opc5=new Array();		
		opc5[0] = new slctr('- - - - - - - - - - - - - - - - -Matorral xer\u00f3filo- - - - - - - - - - - - - - - - -',0)
		opc5[1] = new slctr("Chaparral",14)
		opc5[2] = new slctr("Matorral crasicaule",15)
		opc5[3] = new slctr("Matorral des\u00e9rtico micr\u00f3filo",16)
		opc5[4] = new slctr("Matorral des\u00e9rtico roset\u00f3filo",17)
		opc5[5] = new slctr("Matorral espinoso tamaulipeco",18)
		opc5[6] = new slctr("Matorral roset\u00f3filo costero",19)
		opc5[7] = new slctr("Matorral sarcocaule",20)
		opc5[8] = new slctr("Matorral sarco-crasicaule",21)
		opc5[9] = new slctr("Matorral sarco-crasicaule de neblina",22)
		opc5[10] = new slctr("Matorral submontano",23)
		opc5[11] = new slctr("Mezquital des\u00e9rtico",24)
		opc5[12] = new slctr("Vegetaci\u00f3n de desiertos arenosos",25)
		opc5[13] = new slctr("Vegetaci\u00f3n gips\u00f3fila",26)
		opc5[14] = new slctr("Vegetaci\u00f3n hal\u00f3fila xer\u00f3fila",27)
		
		var opc6=new Array();		
		opc6[0] = new slctr('- - - - - - - - - - - - - - - - - - - -Pastizal- - - - - - - - - - - - - - - - - - - - - -',0)
		opc6[1] = new slctr("Pastizal gips\u00f3filo",28)
		opc6[2] = new slctr("Pastizal hal\u00f3filo",29)
		opc6[3] = new slctr("Pastizal natural",30)
		opc6[4] = new slctr("Pradera de alta monta\u00f1a",31)
		opc6[5] = new slctr("Sabana",32)
		
		var opc7=new Array();		
		opc7[0] = new slctr('- - - - - - - - - - - - - - - - - - -Selva caducifolia- - - - - - - - - - - - - - - - - -',0)
		opc7[1] = new slctr("Matorral subtropical",33)
		opc7[2] = new slctr("Selva baja caducifolia",34)
		opc7[3] = new slctr("Selva mediana caducifolia",35)
		
		var opc8=new Array();		
		opc8[0] = new slctr('- - - - - - - - - - - - - - - - - -Selva espinosa- - - - - - - - - - - - - - - - - - -',0)
		opc8[1] = new slctr("Mezquital tropical",36)
		opc8[2] = new slctr("Selva baja espinosa caducifolia",37)
		opc8[3] = new slctr("Selva baja espinosa subperennifolia",38)
		
		var opc9=new Array();		
		opc9[0] = new slctr('- - - - - - - - - - - - - - - - -Selva perennifolia- - - - - - - - - - - - - - - - -',0)
		opc9[1] = new slctr("Selva alta perennifolia",39)
		opc9[2] = new slctr("Selva alta subperennifolia",40)
		opc9[3] = new slctr("Selva baja perennifolia",41)
		opc9[4] = new slctr("Selva mediana perennifolia",42)
		opc9[5] = new slctr("Selva mediana subperennifolia",43)
		
		var opc10=new Array();		
		opc10[0] = new slctr('- - - - - - - - - - - - - - - - -Selva subcaducifolia- - - - - - - - - - - - - - - - -',0)
		opc10[1] = new slctr("Selva baja subcaducifolia",44)
		opc10[2] = new slctr("Selva mediana subcaducifolia",45)
		
		var opc11=new Array();		
		opc11[0] = new slctr('- - - - - - - - - - - - -Sin vegetaci\u00f3n aparente- - - - - - - - - - - - -',0)
		opc11[1] = new slctr("Sin vegetaci\u00f3n aparente",46)
		
		var opc12=new Array();		
		opc12[0] = new slctr('- - - - - - - - - - - - - - - - -Vegetación hidr\u00f3fila- - - - - - - - - - - - - - - - -',0)
		opc12[1] = new slctr("Bosque de galer\u00eda",47)
		opc12[2] = new slctr("Manglar",48)
		opc12[3] = new slctr("Popal",49)
		opc12[4] = new slctr("Selva de galer\u00eda",50)
		opc12[5] = new slctr("Tular",51)
		opc12[6] = new slctr("Vegetaci\u00f3n de galer\u00eda",52)
		opc12[7] = new slctr("Vegetaci\u00f3n de pet\u00e9n",53)
		opc12[8] = new slctr("Vegetaci\u00f3n hal\u00f3fila hidr\u00f3fila",54)
		
		var opc13=new Array();		
		opc13[0] = new slctr('- - - - - - - - - - - - - - - - -Vegetaci\u00f3n inducida- - - - - - - - - - - - - - - - -',0)
		opc13[1] = new slctr("Bosque inducido",55)
		opc13[2] = new slctr("Palmar inducido",56)
		opc13[3] = new slctr("Pastizal inducido",57)
		opc13[4] = new slctr("Vegetaci\u00f3n sabanoide",58)
		
		function slctryole(cual,donde){
			if(cual.selectedIndex != 0){
				donde.length=0
				cual = eval(cual.value)
				//alert(cual);
				cual= eval("opc"+cual);
				//alert(cual);
				//document.write(cual)
					for(m=0;m<cual.length;m++){
						var nuevaOpcion = new Option(cual[m].texto);
						donde.options[m] = nuevaOpcion;
						if(cual[m].valor != null){
							donde.options[m].value = cual[m].valor
						}
						else{
							donde.options[m].value = cual[m].texto
						}
					}
				
			}
		}
	</script>	
	<script>
  $(function() {
    $( document ).tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });
  });
  </script>
  <style>
  .ui-tooltip, .arrow:after {
    background: white;//#b0232a;
    border: 2px solid #b0232a;
  }
  .ui-tooltip {
    padding: 10px 20px;
    color: black;
    border-radius: 20px;
    font: bold 11px Lucida Sans, Arial, Helvetica, Sans-Serif;//"Helvetica Neue", Sans-Serif;
    //text-transform: uppercase;
    box-shadow: 0 0 7px black;
  }
  .arrow {
    width: 70px;
    height: 16px;
    overflow: hidden;
    position: absolute;
    left: 50%;
    margin-left: -35px;
    bottom: -16px;
  }
  .arrow.top {
    top: -16px;
    bottom: auto;
  }
  .arrow.left {
    left: 20%;
  }
  .arrow:after {
    content: "";
    position: absolute;
    left: 20px;
    top: -20px;
    width: 25px;
    height: 25px;
    box-shadow: 6px 5px 9px -9px black;
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    tranform: rotate(45deg);
  }
  .arrow.top:after {
    bottom: -20px;
    top: auto;
  }
  
 /*body { font-family:Lucida Sans, Arial, Helvetica, Sans-Serif; font-size:13px; margin:20px;}
        #main { width:960px; margin: 0px auto; border:solid 1px #b2b3b5; -moz-border-radius:10px; padding:20px; background-color:#f6f6f6;}
        #header { text-align:center; border-bottom:solid 1px #b2b3b5; margin: 0 0 20px 0; }*/
        fieldset { border:none; width:820px;}
        legend { font-size:18px; margin:0px; padding:10px 0px; color:#b0232a; font-weight:bold;}
        label { display:block; margin:15px 0 5px;}
        /*input[type=text], input[type=password] { width:300px; padding:5px; border:solid 1px #000;}*/
        .prev, .next { background-color:#b0232a; padding:5px 10px; color:#fff; text-decoration:none;}
        .prev:hover, .next:hover { background-color:#000; text-decoration:none;}
        .prev { float:left;}
        .next { float:right;}
        #steps { list-style:none; width:100%; overflow:hidden; margin:0px; padding:0px;}
        #steps li {font-size:12px; float:left; padding:10px; color:#b0b1b3;}
        #steps li span {font-size:11px; display:block;}
        #steps li.current { color:#000;}
        #makeWizard { background-color:#b0232a; color:#fff; padding:5px 10px; text-decoration:none; font-size:18px;}
        #makeWizard:hover { background-color:#000;}
  </style>
	<!--////////////////////////////////////-->
	
	<script type="text/javascript">
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	</script>
	<style type="text/css">
	input[type="text"]{
    background-color: #FFFFFF;
    //border: 1px solid #CCCCCC;
    //box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    //transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s;
     //border-radius: 8px 8px 8px 8px;
	//color: #555555;
    //display: inline-block;
    font-size: 14px;
    height: 20px;
	width: 400px;
    //line-height: 20px;
    margin-bottom: 10px;
    padding: 4px 6px;
    vertical-align: middle;
}
input[type="text"]:focus {
    //border-color: rgba(82, 168, 236, 0.8);
    border-color: rgba(153, 26, 0, 0.8);
	border: 1px solid red;
	outline: 0 none;
    -webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(153,26,0,.6);
    -moz-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(153,26,0,.6);
   box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(153,26,0,.6);
}
textarea:focus {
    outline: none !important;
    border:1px solid red;
    box-shadow: 0 0 10px #719ECE;
}
.con_estilos {
   width: 420px;
   padding: 5px;
   font-size: 13px;
   border: 1px solid #ccc;
   height: 30px;
   
}
a {
    text-decoration: none;
}
.btn {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-image: none;
    border-radius: 4px 4px 4px 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
    cursor: pointer;
    display: inline-block;
    font-size: 14px;
    line-height: 20px;
    margin-bottom: 0;
    padding: 4px 12px;
    text-align: center;
    vertical-align: middle;
}
.btn-info {
    background-color: #8E161E;//#49AFCD;
	background-image: linear-gradient(to bottom, #D51B27, #8E161E);
    //background-image: linear-gradient(to bottom, #5BC0DE, #2F96B4);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    color: #FFFFFF;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.btn:hover{
    color:#333;
    text-decoration:none;
    background-position:0 -15px;
    -webkit-transition:background-position .1s linear;
    -moz-transition:background-position .1s linear;
    -o-transition:background-position .1s linear;
    transition:background-position .1s linear;
}
.btn-info:hover{
    color:#fff;
    background-color:#8E161E//#2f96b4;
}
#contenedor, #contienSinonimos {
    margin-top: 15px;
}
#wrapper {
	//width: 380px;
	//margin: 50px auto 0;
}
.added, .addSinonimo {
    //float: left;
    margin-right: 10px;
}
.eliminar {
   margin: 5px;
}
</style>
<script type="text/javascript">
		function mostrar(num) { 
		  if(num==0) { 
			document.getElementById('f1').style.display = '';
			document.getElementById('f2').style.display = ''; 
			document.getElementById('f3').style.display = '';    
			document.getElementById('f4').style.display = '';    
			document.getElementById('f5').style.display = '';    
			document.getElementById('f6').style.display = '';    
			document.getElementById('f7').style.display = '';    
			document.getElementById('f8').style.display = '';    
			document.getElementById('f9').style.display = '';    
			document.getElementById('f10').style.display = '';    
			document.getElementById('f11').style.display = '';
			document.getElementById('f12').style.display = '';
			document.getElementById('f13').style.display = '';
			document.getElementById('f14').style.display = '';
			document.getElementById('f15').style.display = '';
			document.getElementById('f30').style.display = '';
			document.getElementById('f31').style.display = '';
			document.getElementById('f16').style.display = 'none';
			document.getElementById('f17').style.display = 'none';
			document.getElementById('f18').style.display = 'none';
			document.getElementById('f19').style.display = 'none';
			document.getElementById('f20').style.display = 'none';
			document.getElementById('f21').style.display = 'none';
			document.getElementById('f22').style.display = 'none';
			document.getElementById('f23').style.display = 'none';
			document.getElementById('f24').style.display = 'none';
			document.getElementById('f25').style.display = 'none';
			document.getElementById('f26').style.display = 'none';
		  } 
		  else { 
			document.getElementById('f1').style.display = 'none';  
			document.getElementById('f2').style.display = 'none'; 
			document.getElementById('f3').style.display = 'none';    
			document.getElementById('f4').style.display = 'none';    
			document.getElementById('f5').style.display = 'none';    
			document.getElementById('f6').style.display = 'none';    
			document.getElementById('f7').style.display = 'none';    
			document.getElementById('f8').style.display = 'none';    
			document.getElementById('f9').style.display = 'none';    
			document.getElementById('f10').style.display = 'none';    
			document.getElementById('f11').style.display = 'none';
			document.getElementById('f12').style.display = 'none';
			document.getElementById('f13').style.display = 'none';
			document.getElementById('f14').style.display = 'none';
			document.getElementById('f15').style.display = 'none';
			document.getElementById('f30').style.display = 'none';
			document.getElementById('f31').style.display = 'none';
			document.getElementById('f16').style.display = '';
			document.getElementById('f17').style.display = '';
			document.getElementById('f18').style.display = '';
			document.getElementById('f19').style.display = '';
			document.getElementById('f20').style.display = '';
			document.getElementById('f21').style.display = '';
			document.getElementById('f22').style.display = '';
			document.getElementById('f23').style.display = '';
			document.getElementById('f24').style.display = '';
			document.getElementById('f25').style.display = '';
			document.getElementById('f26').style.display = '';
		  } 
		} 
	function mostrarOcultar(opc) {
		if(opc==1){
			document.getElementById('habitatantropico').disabled = false;
		}
		else document.getElementById('habitatantropico').disabled = true;
	}
	
	function mostrarOcultar2(opci) {
		if(opci==1){
			document.getElementById('tipovegsecu').disabled = false;
		}
		else document.getElementById('tipovegsecu').disabled = true;
	}
	
	function mostrarOcultar3(item) {
		if(item==1){
			document.getElementById('cuidadoparental').disabled = false;
		}
		else document.getElementById('cuidadoparental').disabled = true;
	}
	
	function oculta(jx) { 
	  if(jx==0) { 
		document.getElementById('a1').style.display = '';
		document.getElementById('a2').style.display = ''; 
		document.getElementById('a3').style.display = '';    
		document.getElementById('a4').style.display = '';    
		document.getElementById('a5').style.display = '';    
		document.getElementById('a6').style.display = '';    
		document.getElementById('a7').style.display = '';    
		document.getElementById('a8').style.display = '';    
		document.getElementById('a9').style.display = '';    
		document.getElementById('a10').style.display = '';    
		document.getElementById('a11').style.display = '';
		document.getElementById('a12').style.display = '';
		document.getElementById('a13').style.display = '';
		document.getElementById('a14').style.display = '';
		document.getElementById('a15').style.display = '';
		document.getElementById('a16').style.display = '';
		document.getElementById('a17').style.display = '';
		document.getElementById('a18').style.display = '';
		document.getElementById('a19').style.display = '';
		document.getElementById('a20').style.display = '';
		document.getElementById('a21').style.display = '';
		document.getElementById('v1').style.display = 'none';
		document.getElementById('v2').style.display = 'none';
		document.getElementById('v3').style.display = 'none';
		document.getElementById('v4').style.display = 'none';
		document.getElementById('v5').style.display = 'none';
		document.getElementById('v6').style.display = 'none';
		document.getElementById('v7').style.display = 'none';
		document.getElementById('v8').style.display = 'none';    
		document.getElementById('v9').style.display = 'none';    
		document.getElementById('v10').style.display = 'none';    
		document.getElementById('v11').style.display = 'none';
		document.getElementById('v12').style.display = 'none';
		document.getElementById('v13').style.display = 'none';
		document.getElementById('v14').style.display = 'none';
		document.getElementById('v15').style.display = 'none';
		document.getElementById('v16').style.display = 'none';
		document.getElementById('v17').style.display = 'none';
		document.getElementById('v18').style.display = 'none';
		document.getElementById('v19').style.display = 'none';
		document.getElementById('v20').style.display = 'none';
		document.getElementById('v21').style.display = 'none';
		document.getElementById('v22').style.display = 'none';
		document.getElementById('v23').style.display = 'none';
		document.getElementById('v24').style.display = 'none';
		document.getElementById('v25').style.display = 'none';
		document.getElementById('v26').style.display = 'none';
		document.getElementById('v27').style.display = 'none';
		document.getElementById('v28').style.display = 'none';
		document.getElementById('v29').style.display = 'none';
		document.getElementById('v30').style.display = 'none';
		document.getElementById('v31').style.display = 'none';
		document.getElementById('v32').style.display = 'none';
		document.getElementById('v33').style.display = 'none';
		document.getElementById('v34').style.display = 'none';
		document.getElementById('v35').style.display = 'none';
		document.getElementById('v36').style.display = 'none';
		document.getElementById('v37').style.display = 'none';
	  } 
	  else { 
		document.getElementById('a1').style.display = 'none';
		document.getElementById('a2').style.display = 'none'; 
		document.getElementById('a3').style.display = 'none';    
		document.getElementById('a4').style.display = 'none';    
		document.getElementById('a5').style.display = 'none';    
		document.getElementById('a6').style.display = 'none';    
		document.getElementById('a7').style.display = 'none';    
		document.getElementById('a8').style.display = 'none';    
		document.getElementById('a9').style.display = 'none';    
		document.getElementById('a10').style.display = 'none';    
		document.getElementById('a11').style.display = 'none';
		document.getElementById('a12').style.display = 'none';
		document.getElementById('a13').style.display = 'none';
		document.getElementById('a14').style.display = 'none';
		document.getElementById('a15').style.display = 'none';
		document.getElementById('a16').style.display = 'none';
		document.getElementById('a17').style.display = 'none';
		document.getElementById('a18').style.display = 'none';
		document.getElementById('a19').style.display = 'none';
		document.getElementById('a20').style.display = 'none';
		document.getElementById('a21').style.display = 'none';
		document.getElementById('v1').style.display = '';
		document.getElementById('v2').style.display = '';
		document.getElementById('v3').style.display = '';
		document.getElementById('v4').style.display = '';
		document.getElementById('v5').style.display = '';
		document.getElementById('v6').style.display = '';
		document.getElementById('v7').style.display = '';
		document.getElementById('v8').style.display = '';    
		document.getElementById('v9').style.display = '';    
		document.getElementById('v10').style.display = '';    
		document.getElementById('v11').style.display = '';
		document.getElementById('v12').style.display = '';
		document.getElementById('v13').style.display = '';
		document.getElementById('v14').style.display = '';
		document.getElementById('v15').style.display = '';
		document.getElementById('v16').style.display = '';
		document.getElementById('v17').style.display = '';
		document.getElementById('v18').style.display = '';
		document.getElementById('v19').style.display = '';
		document.getElementById('v20').style.display = '';
		document.getElementById('v21').style.display = '';
		document.getElementById('v22').style.display = '';
		document.getElementById('v23').style.display = '';
		document.getElementById('v24').style.display = '';
		document.getElementById('v25').style.display = '';
		document.getElementById('v26').style.display = '';
		document.getElementById('v27').style.display = '';
		document.getElementById('v28').style.display = '';
		document.getElementById('v29').style.display = '';
		document.getElementById('v30').style.display = '';
		document.getElementById('v31').style.display = '';
		document.getElementById('v32').style.display = '';
		document.getElementById('v33').style.display = '';
		document.getElementById('v34').style.display = '';
		document.getElementById('v35').style.display = '';
		document.getElementById('v36').style.display = '';
		document.getElementById('v37').style.display = '';
	  } 
	} 
</script>
<script type="text/javascript">
			$(document).ready(function() {

				var MaxInputs       = 8; //maximum input boxes allowed
				var contenedor   	= $("#contenedor"); //Input boxes wrapper ID
				var AddButton       = $("#agregarCampo"); //Add button ID
							
				var x = contenedor.length; //initlal text box count
				var x = $("#contenedor div").length + 1;
				var FieldCount = x-1; //to keep track of text box added
				
				$(AddButton).click(function (e)  //on add input button click
				{
						if(x <= MaxInputs) //max input box allowed
						{
							FieldCount++; //text box added increment
							//add input box
							$(contenedor).append('<div class="added"><input type="text" name="nComun[]" id="campo_'+ FieldCount +'" placeholder="Nombre '+ FieldCount +'"/><a href="#" class="eliminar">&times;</a></div>');
							x++; //text box increment
						}
				return false;
				});

				$("body").on("click",".eliminar", function(e){ //user click on remove text
						if( x == 2 ) {
							if(confirm("Esta seguro?, se eliminara el unico elemento restante")){							
								$(this).parent('div').remove(); //remove text box
								x--; //decrement textbox
							}
						}
						else{
							$(this).parent('div').remove(); //remove text box
							x--; //decrement textbox
						}		
				return false;
				});
				
				/************************************************************** Esta parte es para los sinonimos ***********************************/
				
				var conSin   	= $("#contienSinonimos"); //Input boxes wrapper ID
				var AddSin       = $("#agregaSinonimo"); //Add button ID
							
				var NoSin = conSin.length; //initlal text box count
				var NoSin = $("#contienSinonimos div").length + 1;
				var CountSin = NoSin-1; //to keep track of text box added
				
				$(AddSin).click(function (e)  //on add input button click
				{
						if(NoSin <= MaxInputs) //max input box allowed
						{
							CountSin++; //text box added increment
							//add input box
							$(conSin).append('<div class="addSinonimo"><input type="text" name="sinonimos[]" id="sinonimo_'+ CountSin +'" placeholder="Sin\u00f3nimo '+ CountSin +'"/><a href="#" class="delSin">&times;</a></div>');
							NoSin++; //text box increment
						}
				return false;
				});

				$("body").on("click",".delSin", function(e){ //user click on remove text
						if( NoSin == 2 ) {
							if(confirm("Esta seguro?, se eliminara el unico elemento restante")){							
								$(this).parent('div').remove(); //remove text box
								NoSin--; //decrement textbox
							}
						}
						else{
							$(this).parent('div').remove(); //remove text box
							NoSin--; //decrement textbox
						}		
				return false;
				});				
				
				/***********************************************************************************************/
				var Agrega			= $("#agregarCampos");
				var contSel   	= $("#contieneSelect");
				
				var y = contSel.length; //initlal text box count
				var y = $("#contieneSelect div").length + 1;
				var FieldCount2 = y-1; //to keep track of text box added
				
				$(Agrega).click(function (e)  //on add input button click
				{
						//alert('aqui1');
						if(y <= MaxInputs) //max input box allowed
						{
							FieldCount2++; //text box added increment
							//add input box
							$(contSel).append('<div class="agregaSelect"><select name="sel[]"><option value="1">Opci&oacute;n 1</option><option value="2">Opci&oacute;n 2</option><option value="3">Opci&oacute;n 3</option></select><a href="#" class="delSel">&times;</a></div>');
							y++; //text box increment
						}
				return false;
				});	

				$("body").on("click",".delSel", function(e){ //user click on remove text
						if( y == 2 ) {
							if(confirm("Esta seguro?, se eliminara el unico elemento restante")){							
								$(this).parent('div').remove(); //remove text box
								y--; //decrement textbox
							}
						}
						else{
							$(this).parent('div').remove(); //remove text box
							y--; //decrement textbox
						}		
				return false;
				});
			});
		</script>
		<script type='text/javascript'>//<![CDATA[ 
			$(window).load(function(){
			$(function() {
				$('#pais').change(function(e) {
					var selected = $(e.target).val();
					//alert(selected);
					var siesta = $.inArray('146', selected);
					if(siesta!=-1){
					    //alert(':D');
						document.getElementById('1e').style.display = '';
						//alert(':x');
						document.getElementById('2e').style.display = '';
						document.getElementById('1m').style.display = '';
						document.getElementById('2m').style.display = '';
					}
					else{
						//alert(':D');
						document.getElementById('1e').style.display = 'none';
						// alert(':x');
						document.getElementById('2e').style.display = 'none';
						document.getElementById('1m').style.display = 'none';
						document.getElementById('2m').style.display = 'none';
					}
				}); 
			});
			});//]]>  

		</script>
<script type="text/javascript" src="jquery.jcombo.js"></script>	
<link rel="stylesheet" href="css/prism.css">
  <link rel="stylesheet" href="css/chosen.css">
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
  </style>
  <style>
	.LV_validation_message{
		font-weight:bold;
		margin:0 0 0 5px;
	}

	.LV_invalid {
		color:#CC0000;
	}
    
	.LV_invalid_field, 
	input.LV_invalid_field:hover, 
	input.LV_invalid_field:active,
	textarea.LV_invalid_field:hover, 
	textarea.LV_invalid_field:active {
	border: 1px solid #CC0000;
	}
	.ayuda { width:50px; text-align:center; }
	</style>
	<SCRIPT type = "text/javascript" src = "livevalidation_standalone.js"></SCRIPT>
	
</head>
<body>	
<?php 	
					
			$enviar = isset($_POST["enviar"])? $_POST["enviar"]: '';
			$ID = isset($_POST["ID"])? $_POST["ID"]: 0;
			
			$nomcomun = isset($_POST["nComun"])? $_POST["nComun"]: '';
			$reino = isset($_POST["reino"])? $_POST["reino"]: '';
			$phylum = isset($_POST["phylum"])? $_POST["phylum"]: '';
			$clase = isset($_POST["clase"])? $_POST["clase"]: '';
			$orden = isset($_POST["orden"])? $_POST["orden"]: '';
			$familia = isset($_POST["familia"])? $_POST["familia"]: '';
			$nomcient = isset($_POST["nameCient"])? $_POST["nameCient"]: '';
			$sinonimos = isset($_POST["sinonimos"])? $_POST["sinonimos"]: '';
			$resumenesp = isset($_POST["resumen"])? $_POST["resumen"]: '';
			$descripcionesp = isset($_POST["descripcion"])? $_POST["descripcion"]: '';
			$espsimilar = isset($_POST["espsimi"])? $_POST["espsimi"]: '';
			$nom059 = isset($_POST["nom"])? $_POST["nom"]: 0;
			$addinfonom = isset($_POST["addinfonom"])? $_POST["addinfonom"]: '';
			$uicn = isset($_POST["uicn"])? $_POST["uicn"]: '';
			$addinfouicn = isset($_POST["addinfouicn"])? $_POST["addinfouicn"]: '';
			$cites= isset($_POST["cites"])? $_POST["cites"]: 0;
			$addinfocites = isset($_POST["addinfocites"])? $_POST["addinfocites"]: '';
			$origen = isset($_POST["origen"])? $_POST["origen"]: 0;
			$addinforigen = isset($_POST["addinforigen"])? $_POST["addinforigen"]: '';
			$pais = isset($_POST["pais"])? $_POST["pais"]: 0;
			$mexestado = isset($_POST["mexestado"])? $_POST["mexestado"]: 0;
			$addinfomexestado = isset($_POST["addinfomexestado"])? $_POST["addinfomexestado"]: '';
			$mexmun = isset($_POST["mexmun"])? $_POST["mexmun"]: 0;
			$addinfomexmun = isset($_POST["addinfomexmun"])? $_POST["addinfomexmun"]: '';
			$distribucion = isset($_POST["distribucion"])? $_POST["distribucion"]: '';
			$disthisto = isset($_POST["distrihisto"])? $_POST["distrihisto"]: '';
			$distactual = isset($_POST["distactual"])? $_POST["distactual"]: '';
			$endemic = isset($_POST["endemic"])? $_POST["endemic"]: '';
			$paisendemica = isset($_POST["paisendemica"])? $_POST["paisendemica"]: 0;
			$endemica = isset($_POST["endemica"])? $_POST["endemica"]: '';
			$addinfoendemica = isset($_POST["addinfoendemica"])? $_POST["addinfoendemica"]: '';
			$disamprest = isset($_POST["distribucionamprest"])? $_POST["distribucionamprest"]: '';
			$addinfoamp = isset($_POST["addinfoamp"])? $_POST["addinfoamp"]: '';
			$tipoambiente = isset($_POST["tipoambiente"])? $_POST["tipoambiente"]: '';
			$ecosistemas = isset($_POST["ecosistemas"])? $_POST["ecosistemas"]: 0;
			$ecorregiones = isset($_POST["ecorregiones"])? $_POST["ecorregiones"]: 0;
			$tipoveg = isset($_POST["tipoveg"])? $_POST["tipoveg"]: '';
			//$grupoveg = isset($_POST["grupoveg"])? $_POST["grupoveg"]: 0;
			$vegsecu = isset($_POST["vegsecu"])? $_POST["vegsecu"]: '';
			$tipovegsecu = isset($_POST["tipovegsecu"])? $_POST["tipovegsecu"]: '';
			$addinfovegsecu = isset($_POST["addinfovegsecu"])? $_POST["addinfovegsecu"]: '';
			$coverturaveg = isset($_POST["coverturaveg"])? $_POST["coverturaveg"]: '';
			$opchabitropi = isset($_POST["snhabitatantropico"])? $_POST["snhabitatantropico"]: '';
			$habitatantropico = isset($_POST["habitatantropico"])? $_POST["habitatantropico"]: '';
			$rangoaltitudinal = isset($_POST["rangoaltitudinal"])? $_POST["rangoaltitudinal"]: '';
			$clima = isset($_POST["clima"])? $_POST["clima"]: 0;
			$addinfoclima = isset($_POST["addinfoclima"])? $_POST["addinfoclima"]: '';
			$rtemperatura = isset($_POST["rtemperatura"])? $_POST["rtemperatura"]: '';
			$precipitacion = isset($_POST["precipitacion"])? $_POST["precipitacion"]: '';
			$humedad = isset($_POST["humedad"])? $_POST["humedad"]: '';
			$tiposuelo = isset($_POST["tiposuelo"])? $_POST["tiposuelo"]: 0;
			$addinfotiposuelo = isset($_POST["addinfotiposuelo"])? $_POST["addinfotiposuelo"]: '';
			$geoforma = isset($_POST["geoforma"])? $_POST["geoforma"]: 0;
			$addinfogeoforma = isset($_POST["addinfogeoforma"])? $_POST["addinfogeoforma"]: '';
			$habitatacuatico = isset($_POST["habitatacuatico"])? $_POST["habitatacuatico"]: 0;
			$addinfohabitatacuatico = isset($_POST["addinfohabitatacuatico"])? $_POST["addinfohabitatacuatico"]: '';
			$salinidad = isset($_POST["salinidad"])? $_POST["salinidad"]: '';
			$oxigeno = isset($_POST["oxigeno"])? $_POST["oxigeno"]: '';
			$ph = isset($_POST["ph"])? $_POST["ph"]: '';
			$tempagua = isset($_POST["tempagua"])? $_POST["tempagua"]: '';
			$corrientes = isset($_POST["corrientes"])? $_POST["corrientes"]: '';
			$rangoaltitud = isset($_POST["rangoaltitud"])? $_POST["rangoaltitud"]: '';
			$rangoprofundidad = isset($_POST["rangoprofundidad"])? $_POST["rangoprofundidad"]: '';
			$mareas = isset($_POST["mareas"])? $_POST["mareas"]: '';
			$usohabitat = isset($_POST["usohabitat"])? $_POST["usohabitat"]: '';
			$alimentacion = isset($_POST["alimenta"])? $_POST["alimenta"]: 0;
			$addinfoalimenta = isset($_POST["addinfoalimenta"])? $_POST["addinfoalimenta"]: '';
			$estrategiatrofica = isset($_POST["estrategiatrofica"])? $_POST["estrategiatrofica"]: 0;
			$addinfoestrofica = isset($_POST["addinfoestrofica"])? $_POST["addinfoestrofica"]: '';
			$conducta = isset($_POST["conducta"])? $_POST["conducta"]: '';
			$migracion = isset($_POST["migracion"])? $_POST["migracion"]: '0';
			$tipomigracion = isset($_POST["tipomigracion"])? $_POST["tipomigracion"]: '0';
			$habito = isset($_POST["habito"])? $_POST["habito"]: 0;
			$habitock1 = isset($_POST["habitock1"])? $_POST["habitock1"]: '';
			$habitock2 = isset($_POST["habitock2"])? $_POST["habitock2"]: '';
			$hibernacion = isset($_POST["hibernacion"])? $_POST["hibernacion"]: '';
			$terri = isset($_POST["terri"])? $_POST["terri"]: '';
			$ambitohogar = isset($_POST["ambitohogar"])? $_POST["ambitohogar"]: '';
			$tamarea = isset($_POST["tamarea"])? $_POST["tamarea"]: '';
			$tiporep = isset($_POST["tiporep"])? $_POST["tiporep"]: '';
			$reproanimal = isset($_POST["reproanimal"])? $_POST["reproanimal"]: '';
			$dimorfismo = isset($_POST["dimorfismo"])? $_POST["dimorfismo"]: '';
			$addinfodimorfismo = isset($_POST["addinfodimorfismo"])? $_POST["addinfodimorfismo"]: '';
			$longitudmh = isset($_POST["longitudmh"])? $_POST["longitudmh"]: '';
			$pesomh = isset($_POST["pesomh"])? $_POST["pesomh"]: '';
			$sistapareamiento = isset($_POST["sistapareamiento"])? $_POST["sistapareamiento"]: 0;
			$addinfosistaparea = isset($_POST["addinfosistaparea"])? $_POST["addinfosistaparea"]: '';
			$tiporeproduccion = isset($_POST["tiporeproduccion"])? $_POST["tiporeproduccion"]: '';
			$addinfotiporep = isset($_POST["addinfotiporep"])? $_POST["addinfotiporep"]: '';
			$tipofecundacion = isset($_POST["tipofecundacion"])? $_POST["tipofecundacion"]: 0;
			$addinfotipofec = isset($_POST["addinfotipofec"])? $_POST["addinfotipofec"]: '';
			$edadtalla = isset($_POST["edadtalla"])? $_POST["edadtalla"]: '';
			$duracionvida = isset($_POST["duracionvida"])? $_POST["duracionvida"]: '';
			$epoca = isset($_POST["epoca"])? $_POST["epoca"]: '';
			$sitioanidacion = isset($_POST["sitioanidacion"])? $_POST["sitioanidacion"]: '';
			$addinfocrianza = isset($_POST["addinfocrianza"])? $_POST["addinfocrianza"]: '';
			$nohuevos = isset($_POST["nohuevos"])? $_POST["nohuevos"]: '';
			$parental = isset($_POST["parental"])? $_POST["parental"]: '';
			$cuidadoparental = isset($_POST["cuidadoparental"])? $_POST["cuidadoparental"]: 0;
			$addinfoparental = isset($_POST["addinfoparental"])? $_POST["addinfoparental"]: ''; 
			$tiempoparental = isset($_POST["tiempoparental"])? $_POST["tiempoparental"]: ''; 
			$reprovegetal = isset($_POST["reprovegetal"])? $_POST["reprovegetal"]: ''; 
			$arregloespacial = isset($_POST["arregloespacial"])? $_POST["arregloespacial"]: '';
			$addinfoarresp = isset($_POST["addinfoarresp"])? $_POST["addinfoarresp"]: '';
			$aislamientoespacial = isset($_POST["aislamientoespacial"])? $_POST["aislamientoespacial"]: '';
			$addinfoATE = isset($_POST["addinfoATE"])? $_POST["addinfoATE"]: '';
			$sistemasasexuales = isset($_POST["sistemasasexuales"])? $_POST["sistemasasexuales"]: '';
			$addinfosistrepro = isset($_POST["addinfosistrepro"])? $_POST["addinfosistrepro"]: '';
			$tipofecveg = isset($_POST["tipofecveg"])? $_POST["tipofecveg"]: '';
			$addinfofecveg = isset($_POST["addinfofecveg"])? $_POST["addinfofecveg"]: '';
			$agentespolinizacion = isset($_POST["agentespolinizacion"])? $_POST["agentespolinizacion"]: '';
			$addinfoAP = isset($_POST["addinfoAP"])? $_POST["addinfoAP"]: '';
			$floracion = isset($_POST["floracion"])? $_POST["floracion"]: '';
			$addinfofloracion = isset($_POST["addinfofloracion"])? $_POST["addinfofloracion"]: '';
			$timeflora = isset($_POST["timeflora"])? $_POST["timeflora"]: '';
			$mesinicialflora = isset($_POST["mesinicialflora"])? $_POST["mesinicialflora"]: 0;
			$mesfinalflora = isset($_POST["mesfinalflora"])? $_POST["mesfinalflora"]: 0;
			$nectar = isset($_POST["nectar"])? $_POST["nectar"]: '';
			$polen = isset($_POST["polen"])? $_POST["polen"]: '';
			$mesinicialfructi = isset($_POST["mesinicialfructi"])? $_POST["mesinicialfructi"]: 0;
			$mesfinalfructi = isset($_POST["mesfinalfructi"])? $_POST["mesfinalfructi"]: 0;
			$nofrutos = isset($_POST["nofrutos"])? $_POST["nofrutos"]: '';
			$caracfruto = isset($_POST["caracfruto"])? $_POST["caracfruto"]: 0;
			$addinfofruto = isset($_POST["addinfofruto"])? $_POST["addinfofruto"]: '';
			$estfructi = isset($_POST["estfructi"])? $_POST["estfructi"]: '0';
			$addinfoestf = isset($_POST["addinfoestf"])? $_POST["addinfoestf"]: '';
			$nosemillas = isset($_POST["nosemillas"])? $_POST["nosemillas"]: '';
			$tamaniosemillas = isset($_POST["tamaniosemillas"])? $_POST["tamaniosemillas"]: '';
			$latsemilla = isset($_POST["latsemilla"])? $_POST["latsemilla"]: 0;
			$addinfolat = isset($_POST["addinfolat"])? $_POST["addinfolat"]: '';
			$tiempolat = isset($_POST["tiempolat"])? $_POST["tiempolat"]: '';
			$condalmacena = isset($_POST["conalmacena"])? $_POST["conalmacena"]: '';
			$germinacion = isset($_POST["germinacion"])? $_POST["germinacion"]: '';
			$plantulas = isset($_POST["platulas"])? $_POST["platulas"]: '';
			$caractoxicas = isset($_POST["caractoxicas"])? $_POST["caractoxicas"]: '';
			$tipodispersion = isset($_POST["tipodispersion"])? $_POST["tipodispersion"]: '';
			$addinfodisp = isset($_POST["addinfodisp"])? $_POST["addinfodisp"]: '';
			$structdisp = isset($_POST["structdisp"])? $_POST["structdisp"]: '';
			$addinfostruct = isset($_POST["addinfostruct"])? $_POST["addinfostruct"]: '';
			$distanciadisp = isset($_POST["distanciadisp"])? $_POST["distanciadisp"]: '';
			$tamanopoblacion = isset($_POST["tamanopoblacion"])? $_POST["tamanopoblacion"]: '';
			$abundancia = isset($_POST["abundancia"])? $_POST["abundancia"]: '';
			$densidad = isset($_POST["densidad"])? $_POST["densidad"]: '';
			$patronocupacion = isset($_POST["patronocupacion"])? $_POST["patronocupacion"]: '';
			$addinfoocu = isset($_POST["addinfoocu"])? $_POST["addinfoocu"]: '';
			$parapoblacion = isset($_POST["parapoblacion"])? $_POST["parapoblacion"]: '';
			$interacciones = isset($_POST["interacciones"])? $_POST["interacciones"]: 0;
			$addinfointer = isset($_POST["addinfointer"])? $_POST["addinfointer"]: '';
			$vargenetica = isset($_POST["vargenetica"])? $_POST["vargenetica"]: '';
			$marcgeneticos = isset($_POST["marcgeneticos"])? $_POST["marcgeneticos"]: '';
			$funcionecologica = isset($_POST["funcionecologica"])? $_POST["funcionecologica"]: '';
			$addinfofuneco = isset($_POST["addinfofuneco"])? $_POST["addinfofuneco"]: '';
			$impoeco = isset($_POST["impoeco"])? $_POST["impoeco"]: '';
			$comnal = isset($_POST["comnal"])? $_POST["comnal"]: 0;
			$addinfocomnal = isset($_POST["addinfocomnal"])? $_POST["addinfocomnal"]: '';
			$cominter = isset($_POST["cominter"])? $_POST["cominter"]: 0;
			$addinfocominter = isset($_POST["addinfocominter"])? $_POST["addinfocominter"]: '';
			$sncomnal = isset($_POST["sncomnal"])? $_POST["sncomnal"]: '';
			$sncominter = isset($_POST["sncominter"])? $_POST["sncominter"]: '';
			$addinfocom = isset($_POST["addinfocom"])? $_POST["addinfocom"]: '';
			$culturausos = isset($_POST["culturausos"])? $_POST["culturausos"]: '';
			$usos = isset($_POST["usos"])? $_POST["usos"]: '';
			$amenaza = isset($_POST["amenaza"])? $_POST["amenaza"]: '';
			$presiones = isset($_POST["presiones"])? $_POST["presiones"]: '';
			$situacionhabitat = isset($_POST["situacionhabitat"])? $_POST["situacionhabitat"]: '';
			$tendenciapoblacion = isset($_POST["tendenciapoblacion"])? $_POST["tendenciapoblacion"]: '';
			$tendenciapobla = isset($_POST["tendenciapobla"])? $_POST["tendenciapobla"]: '';
			$edoconservacion = isset($_POST["edoconservacion"])? $_POST["edoconservacion"]: '';
			$conservacion = isset($_POST["conservacion"])? $_POST["conservacion"]: '';
			$addinfocons = isset($_POST["addinfocons"])? $_POST["addinfocons"]: '';
			$uma = isset($_POST["uma"])? $_POST["uma"]: '';
			$noejem = isset($_POST["noejem"])? $_POST["noejem"]: '';
			$uno = isset($_POST["uno"])? $_POST["uno"]: '';
			$dos = isset($_POST["dos"])? $_POST["dos"]: '';
			$tres = isset($_POST["tres"])? $_POST["tres"]: '';
			$cuatro = isset($_POST["cuatro"])? $_POST["cuatro"]: '';
			
			
			if($enviar)
			{
				if ($ID)
			   {
					$lonncomun = count($nomcomun);
					$i = 0;
					$nComun = '';
					//recorro cada elemento del vector
					while ($i < $lonncomun)
					{
						$nComun = $nComun.", ".$nomcomun[$i];
						$i++;
					}
					$nComun = substr($nComun,2);
					
					$lonsinonimo = count($sinonimos);
					$j = 0;
					$sinonim = '';
					//recorro cada elemento del vector
					while ($j < $lonsinonimo)
					{
						$sinonim = $sinonim.", ".$sinonimos[$j];
						$j++;
					}
					$sinonim = substr($sinonim,2);
					
					$lonpais = count($pais);
					$k = 0;
					$paises = '';
					//recorro cada elemento del vector
					while ($k < $lonpais)
					{
						$paises = $paises.", ".$pais[$k];
						$k++;
					}
					$paises = substr($paises,2);
					
					$lonmexestado = count($mexestado);
					$l = 0;
					$mxedo = '';
					//recorro cada elemento del vector
					while ($l < $lonmexestado)
					{
						$mxedo = $mxedo.", ".$mexestado[$l];
						$l++;
					}
					$mxedo = substr($mxedo,2);
					
					$lonmexmun = count($mexmun);
					$m = 0;
					$mxmunic = '';
					//recorro cada elemento del vector
					while ($m < $lonmexmun)
					{
						$mxmunic = $mxmunic.", ".$mexmun[$m];
						$m++;
					}
					$mxmunic = substr($mxmunic,2);
					
					$lonecosis = count($ecosistemas);
					$n = 0;
					$ecosist = '';
					//recorro cada elemento del vector
					while ($n < $lonecosis)
					{
						$ecosist = $ecosist.", ".$ecosistemas[$n];
						$n++;
					}
					$ecosist = substr($ecosist,2);
					
					$lonecorregiones = count($ecorregiones);
					$o = 0;
					$ecorreg = '';
					//recorro cada elemento del vector
					while ($o < $lonecorregiones)
					{
						$ecorreg = $ecorreg.", ".$ecorregiones[$o];
						$o++;
					}
					$ecorreg = substr($ecorreg,2);
					
					$lontipoveg = count($tipoveg);
					$p = 0;
					$tipovgt = '';
					//recorro cada elemento del vector
					while ($p < $lontipoveg)
					{
						$tipovgt = $tipovgt.", ".$tipoveg[$p];
						$p++;
					}
					$tipovgt = substr($tipovgt,2);
					
					$lonamenaza = count($amenaza);
					$q = 0;
					$amenazas = '';
					//recorro cada elemento del vector
					while ($q < $lonamenaza)
					{
						$amenazas = $amenazas.", ".$amenaza[$q];
						$q++;
					}
					$amenazas = substr($amenazas,2);
					
					$lonconserva = count($conservacion);
					$r = 0;
					$conservacionx = '';
					//recorro cada elemento del vector
					while ($r < $lonconserva)
					{
						$conservacionx = $conservacionx.", ".$conservacion[$r];
						$r++;
					}
					$conservacionx = substr($conservacionx,2);
					
					//CONEXION CON LA BASE DE DATOS
					Conectarse();
					if($tipoambiente=="terrestre"){
					echo $sql = "UPDATE principal SET nombreComun='$nComun', reino='$reino', phylum='$phylum', clase='$clase', orden='$orden', familia='$familia', nombreCientifico='$nomcient', ".
					" sinonimos='$sinonim', resumenesp='$resumenesp', descripcionesp='$descripcionesp', especiesimilar='$espsimilar', nom059=$nom059, informacionadicionalnom='$addinfonom', ".
					" uicn=$uicn, addinfouicn='$addinfouicn', cites=$cites, addinfocites='$addinfocites', origen=$origen, addinforigen='$addinforigen', pais='$paises', mexestado='$mxedo', ".
					" addinfomexestado='$addinfomexestado', mexmun='$mxmunic', addinfomexmun='$addinfomexmun', distribucion='$distribucion', disthisto='$disthisto', distactual='$distactual', endesino='$endemic', ".
					" paisendemica=$paisendemica, endemica='$endemica', addinfoendemica='$addinfoendemica', disamprest='$disamprest', addinfoamp='$addinfoamp', tipoambiente='$tipoambiente', ".
					" ecosistemas='$ecosist', ecorregiones='$ecorreg', tipoveg='$tipovgt', vegsecu='$vegsecu', tipovegsecu='$tipovegsecu', addinfovegsecu='$addinfovegsecu', ".
					" coverturaveg=$coverturaveg, opchabitropi='$opchabitropi', habitatantropico='$habitatantropico', rangoaltitudinal='$rangoaltitudinal', clima='$clima', addinfoclima='$addinfoclima', ".
					" rtemperatura='$rtemperatura', precipitacion='$precipitacion', humedad='$humedad', tiposuelo='$tiposuelo', addinfotiposuelo='$addinfotiposuelo', geoforma='$geoforma', ".
					" addinfogeoforma='$addinfogeoforma', usohabitat='$usohabitat', alimentacion='$alimentacion', addinfoalimenta='$addinfoalimenta', estrategiatrofica='$estrategiatrofica', ".
					" addinfoestrofica='$addinfoestrofica', conducta='$conducta', migracion='$migracion', tipomigracion='$tipomigracion', habito='$habito', habitock1='$habitock1', habitock2='$habitock2', ".
					" hibernacion='$hibernacion', territorialidad='$terri', ambitohogar='$ambitohogar', tamarea='$tamarea', tiporep='$tiporep', reproanimal='$reproanimal', dimorfismo='$dimorfismo', ".
					" addinfodimorfismo='$addinfodimorfismo', longitudmh='$longitudmh', pesomh='$pesomh', sistapareamiento='$sistapareamiento', addinfosistaparea='$addinfosistaparea', ".
					" tiporeproduccion='$tiporeproduccion', addinfotiporep='$addinfotiporep', tipofecundacion='$tipofecundacion', addinfotipofec='$addinfotipofec', edadtalla='$edadtalla', ".
					" duracionvida='$duracionvida', epoca='$epoca', sitioanidacion='$sitioanidacion', addinfocrianza='$addinfocrianza', nohuevos='$nohuevos', parental='$parental', ".
					" cuidadoparental='$cuidadoparental', addinfoparental='$addinfoparental', tiempoparental='$tiempoparental', reprovegetal='$reprovegetal', arregloespacial='$arregloespacial', ".
					" addinfoarresp='$addinfoarresp', aislamientoespacial='$aislamientoespacial', addinfoATE='$addinfoATE', sistemasasexuales='$sistemasasexuales', addinfosistrepro='$addinfosistrepro', ".
					" tipofecveg='$tipofecveg', addinfofecveg='$addinfofecveg', agentespolinizacion='$agentespolinizacion', addinfoAP='$addinfoAP', floracion='$floracion', ".
					" addinfofloracion='$addinfofloracion', timeflora='$timeflora', mesinicialflora='$mesinicialflora', mesfinalflora='$mesfinalflora', nectar='$nectar', polen='$polen', ".
					" mesinicialfructi='$mesinicialfructi', mesfinalfructi='$mesfinalfructi', nofrutos='$nofrutos', caracfruto='$caracfruto', addinfofruto='$addinfofruto', ".
					" estfructi='$estfructi', addinfoestf='$addinfoestf', nosemillas='$nosemillas', tamaniosemillas='$tamaniosemillas', latsemilla='$latsemilla', addinfolat='$addinfolat', ".
					" tiempolat='$tiempolat', condalmacena='$condalmacena', germinacion='$germinacion', plantulas='$plantulas', caractoxicas='$caractoxicas', ".
					" tipodispersion='$tipodispersion', addinfodisp='$addinfodisp', structdisp='$structdisp', addinfostruct='$addinfostruct', distanciadisp='$distanciadisp', ".
					" tamanopoblacion='$tamanopoblacion', abundancia='$abundancia', densidad='$densidad', patronocupacion='$patronocupacion', addinfoocu='$addinfoocu', ".
					" parapoblacion='$parapoblacion', interacciones='$interacciones', addinfointer='$addinfointer', vargenetica='$vargenetica', marcgeneticos='$marcgeneticos', ".
					" funcionecologica='$funcionecologica', addinfofuneco='$addinfofuneco', impoeco='$impoeco', comnal='$comnal', addinfocomnal='$addinfocomnal', cominter='$cominter', ".
					" addinfocominter='$addinfocominter', sncomnal='$sncomnal', sncominter='$sncominter', addinfocom='$addinfocom', culturausos='$culturausos', usos='$usos', ".
					" amenaza='$amenazas', presiones='$presiones', situacionhabitat='$situacionhabitat', tendenciapoblacion='$tendenciapoblacion', tendenciapobla='$tendenciapobla', ".
					" edoconservacion='$edoconservacion', conservacion='$conservacionx', addinfocons='$addinfocons', uma='$uma', noejem='$noejem', ".
					" uno='$uno', dos='$dos', tres='$tres', cuatro='$cuatro' WHERE Id=$IdResev";
					}
					else{
					echo $sql = "UPDATE principal SET nombreComun='$nComun', reino='$reino', phylum='$phylum', clase='$clase', orden='$orden', familia='$familia', nombreCientifico='$nomcient', ".
					" sinonimos='$sinonim', resumenesp='$resumenesp', descripcionesp='$descripcionesp', especiesimilar='$espsimilar', nom059=$nom059, informacionadicionalnom='$addinfonom', ".
					" uicn=$uicn, addinfouicn='$addinfouicn', cites=$cites, addinfocites='$addinfocites', origen=$origen, addinforigen='$addinforigen', pais='$paises', mexestado='$mxedo', ".
					" addinfomexestado='$addinfomexestado', mexmun='$mxmunic', addinfomexmun='$addinfomexmun', distribucion='$distribucion', disthisto='$disthisto', distactual='$distactual', endesino='$endemic', ".
					" paisendemica=$paisendemica, endemica='$endemica', addinfoendemica='$addinfoendemica', disamprest='$disamprest', addinfoamp='$addinfoamp', tipoambiente='$tipoambiente', ".
					" habitatacuatico='$habitatacuatico', addinfohabitatacuatico='$addinfohabitatacuatico', salinidad='$salinidad', oxigeno='$oxigeno', ph='$ph', tempagua='$tempagua', ".
					" corrientes='$corrientes', rangoaltitud='$rangoaltitud', rangoprofundidad='$rangoprofundidad', mareas='$mareas', usohabitat='$usohabitat', alimentacion='$alimentacion', ".
					" addinfoalimenta='$addinfoalimenta', estrategiatrofica='$estrategiatrofica', addinfoestrofica='$addinfoestrofica', conducta='$conducta', migracion='$migracion', ".
					" tipomigracion='$tipomigracion', habito='$habito', habitock1='$habitock1', habitock2='$habitock2', hibernacion='$hibernacion', territorialidad='$terri', ambitohogar='$ambitohogar', ".
					" tamarea='$tamarea', tiporep='$tiporep', reproanimal='$reproanimal', dimorfismo='$dimorfismo', addinfodimorfismo='$addinfodimorfismo', longitudmh='$longitudmh', pesomh='$pesomh', ".
					" sistapareamiento='$sistapareamiento', addinfosistaparea='$addinfosistaparea', tiporeproduccion='$tiporeproduccion', addinfotiporep='$addinfotiporep', ".
					" tipofecundacion='$tipofecundacion', addinfotipofec='$addinfotipofec', edadtalla='$edadtalla', duracionvida='$duracionvida', epoca='$epoca', sitioanidacion='$sitioanidacion', ".
					" addinfocrianza='$addinfocrianza', nohuevos='$nohuevos', parental='$parental', cuidadoparental='$cuidadoparental', addinfoparental='$addinfoparental', ".
					" tiempoparental='$tiempoparental', reprovegetal='$reprovegetal', arregloespacial='$arregloespacial', addinfoarresp='$addinfoarresp', aislamientoespacial='$aislamientoespacial', ".
					" addinfoATE='$addinfoATE', sistemasasexuales='$sistemasasexuales', addinfosistrepro='$addinfosistrepro', tipofecveg='$tipofecveg', addinfofecveg='$addinfofecveg', ".
					" agentespolinizacion='$agentespolinizacion', addinfoAP='$addinfoAP', floracion='$floracion', addinfofloracion='$addinfofloracion', timeflora='$timeflora', ".
					" mesinicialflora='$mesinicialflora', mesfinalflora='$mesfinalflora', nectar='$nectar', polen='$polen', mesinicialfructi='$mesinicialfructi', mesfinalfructi='$mesfinalfructi', ".
					" nofrutos='$nofrutos', caracfruto='$caracfruto', addinfofruto='$addinfofruto', estfructi='$estfructi', addinfoestf='$addinfoestf', nosemillas='$nosemillas', ".
					" tamaniosemillas='$tamaniosemillas', latsemilla='$latsemilla', addinfolat='$addinfolat', tiempolat='$tiempolat', condalmacena='$condalmacena', germinacion='$germinacion', ".
					" plantulas='$plantulas', caractoxicas='$caractoxicas', tipodispersion='$tipodispersion', addinfodisp='$addinfodisp', structdisp='$structdisp', addinfostruct='$addinfostruct', ".
					" distanciadisp='$distanciadisp', tamanopoblacion='$tamanopoblacion', abundancia='$abundancia', densidad='$densidad', patronocupacion='$patronocupacion', addinfoocu='$addinfoocu', ".
					" parapoblacion='$parapoblacion', interacciones='$interacciones', addinfointer='$addinfointer', vargenetica='$vargenetica', marcgeneticos='$marcgeneticos', ".
					" funcionecologica='$funcionecologica', addinfofuneco='$addinfofuneco', impoeco='$impoeco', comnal='$comnal', addinfocomnal='$addinfocomnal', cominter='$cominter', ".
					" addinfocominter='$addinfocominter', sncomnal='$sncomnal', sncominter='$sncominter', addinfocom='$addinfocom', culturausos='$culturausos', usos='$usos', ".
					" amenaza='$amenazas', presiones='$presiones', situacionhabitat='$situacionhabitat', tendenciapoblacion='$tendenciapoblacion', tendenciapobla='$tendenciapobla', ".
					" edoconservacion='$edoconservacion', conservacion='$conservacionx', addinfocons='$addinfocons', uma='$uma', noejem='$noejem', uno='$uno', dos='$dos', tres='$tres', cuatro='$cuatro' WHERE Id=$IdResev";
					}
					$result = mysql_query($sql);
					desconectar();
					echo "<h3>Actualizaci&oacute;n realizada con &eacute;xito!!!</h3><br />";
					//echo "Gracias por Reservar con nosotros, hemos recibido su informaci&oacute;n satisfactoriamente.\n";
					echo "<br/><a href='index.php'>Regresar</a><br /><br />";
			   }
			   else{
					$lonncomun = count($nomcomun);
					$i = 0;
					$nComun = '';
					//recorro cada elemento del vector
					while ($i < $lonncomun)
					{
						$nComun = $nComun.", ".$nomcomun[$i];
						$i++;
					}
					$nComun = substr($nComun,2);
					
					$lonsinonimo = count($sinonimos);
					$j = 0;
					$sinonim = '';
					//recorro cada elemento del vector
					while ($j < $lonsinonimo)
					{
						$sinonim = $sinonim.", ".$sinonimos[$j];
						$j++;
					}
					$sinonim = substr($sinonim,2);
					
					$lonpais = count($pais);
					$k = 0;
					$paises = '';
					//recorro cada elemento del vector
					while ($k < $lonpais)
					{
						$paises = $paises.", ".$pais[$k];
						$k++;
					}
					$paises = substr($paises,2);
					
					$lonmexestado = count($mexestado);
					$l = 0;
					$mxedo = '';
					//recorro cada elemento del vector
					while ($l < $lonmexestado)
					{
						$mxedo = $mxedo.", ".$mexestado[$l];
						$l++;
					}
					$mxedo = substr($mxedo,2);
					
					$lonmexmun = count($mexmun);
					$m = 0;
					$mxmunic = '';
					//recorro cada elemento del vector
					while ($m < $lonmexmun)
					{
						$mxmunic = $mxmunic.", ".$mexmun[$m];
						$m++;
					}
					$mxmunic = substr($mxmunic,2);
					
					$lonecosis = count($ecosistemas);
					$n = 0;
					$ecosist = '';
					//recorro cada elemento del vector
					while ($n < $lonecosis)
					{
						$ecosist = $ecosist.", ".$ecosistemas[$n];
						$n++;
					}
					$ecosist = substr($ecosist,2);
					
					$lonecorregiones = count($ecorregiones);
					$o = 0;
					$ecorreg = '';
					//recorro cada elemento del vector
					while ($o < $lonecorregiones)
					{
						$ecorreg = $ecorreg.", ".$ecorregiones[$o];
						$o++;
					}
					$ecorreg = substr($ecorreg,2);
					
					$lontipoveg = count($tipoveg);
					$p = 0;
					$tipovgt = '';
					//recorro cada elemento del vector
					while ($p < $lontipoveg)
					{
						$tipovgt = $tipovgt.", ".$tipoveg[$p];
						$p++;
					}
					$tipovgt = substr($tipovgt,2);
					
					$lonamenaza = count($amenaza);
					$q = 0;
					$amenazas = '';
					//recorro cada elemento del vector
					while ($q < $lonamenaza)
					{
						$amenazas = $amenazas.", ".$amenaza[$q];
						$q++;
					}
					$amenazas = substr($amenazas,2);
					
					$lonconserva = count($conservacion);
					$r = 0;
					$conservacionx = '';
					//recorro cada elemento del vector
					while ($r < $lonconserva)
					{
						$conservacionx = $conservacionx.", ".$conservacion[$r];
						$r++;
					}
					$conservacionx = substr($conservacionx,2);
					
					//CONEXION CON LA BASE DE DATOS
					Conectarse();
					if($tipoambiente=="terrestre"){
					echo $sql = "INSERT INTO principal (nombreComun, reino, phylum, clase, orden, familia, nombreCientifico, sinonimos, resumenesp, descripcionesp, especiesimilar, nom059, ". 
					"informacionadicionalnom, uicn, addinfouicn, cites, addinfocites, origen, addinforigen, pais, mexestado, addinfomexestado, mexmun, addinfomexmun, distribucion, disthisto, ".
					"distactual, endesino, paisendemica, endemica, addinfoendemica, disamprest, addinfoamp, tipoambiente, ecosistemas, ecorregiones, tipoveg, vegsecu, tipovegsecu, ".
					"addinfovegsecu, coverturaveg, opchabitropi, habitatantropico, rangoaltitudinal, clima, addinfoclima, rtemperatura, precipitacion, humedad, tiposuelo, addinfotiposuelo, ".
					"geoforma, addinfogeoforma, usohabitat, alimentacion, addinfoalimenta, estrategiatrofica, addinfoestrofica, conducta, migracion, tipomigracion, habito, habitock1, habitock2, ".
					"hibernacion, territorialidad, ambitohogar, tamarea, tiporep, reproanimal, dimorfismo, addinfodimorfismo, longitudmh, pesomh, sistapareamiento, addinfosistaparea, tiporeproduccion, ".
					"addinfotiporep, tipofecundacion, addinfotipofec, edadtalla, duracionvida, epoca, sitioanidacion, addinfocrianza, nohuevos, parental, cuidadoparental, addinfoparental, ".
					"tiempoparental, reprovegetal,arregloespacial, addinfoarresp, aislamientoespacial, addinfoATE, sistemasasexuales, addinfosistrepro, tipofecveg, addinfofecveg, ".
					"agentespolinizacion, addinfoAP, floracion, addinfofloracion, timeflora, mesinicialflora, mesfinalflora, nectar, polen, mesinicialfructi, mesfinalfructi, nofrutos, ".
					"caracfruto, addinfofruto, estfructi, addinfoestf, nosemillas, tamaniosemillas, latsemilla, addinfolat, tiempolat, condalmacena,germinacion, plantulas, caractoxicas, ".
					"tipodispersion, addinfodisp, structdisp, addinfostruct, distanciadisp, tamanopoblacion, abundancia, densidad, patronocupacion, addinfoocu, parapoblacion, interacciones, ".
					"addinfointer, vargenetica, marcgeneticos, funcionecologica, addinfofuneco, impoeco, comnal, addinfocomnal, cominter, addinfocominter, sncomnal, sncominter, ".
					"addinfocom, culturausos, usos, amenaza, presiones, situacionhabitat, tendenciapoblacion, tendenciapobla, edoconservacion, conservacion, addinfocons,  uma, noejem, ".
					"uno, dos, tres, cuatro)". 
					"VALUES ('$nComun','$reino','$phylum','$clase','$orden','$familia','$nomcient','$sinonim','$resumenesp','$descripcionesp','$espsimilar','$nom059','$addinfonom','$uicn',".
					"'$addinfouicn','$cites','$addinfocites','$origen','$addinforigen','$paises','$mxedo','$addinfomexestado','$mxmunic','$addinfomexmun','$distribucion','$disthisto',".
					"'$distactual','$endemic','$paisendemica','$endemica','$addinfoendemica','$disamprest','$addinfoamp','$tipoambiente','$ecosist','$ecorreg','$tipovgt','$vegsecu','$tipovegsecu', ".
					"'$addinfovegsecu','$coverturaveg','$opchabitropi','$habitatantropico','$rangoaltitudinal','$clima','$addinfoclima','$rtemperatura','$precipitacion','$humedad','$tiposuelo', ".
					"'$addinfotiposuelo','$geoforma','$addinfogeoforma','$usohabitat','$alimentacion','$addinfoalimenta','$estrategiatrofica','$addinfoestrofica','$conducta','$migracion', ".
					"'$tipomigracion','$habito','$habitock1','$habitock2','$hibernacion','$terri','$ambitohogar','$tamarea','$tiporep','$reproanimal','$dimorfismo','$addinfodimorfismo','$longitudmh','$pesomh', ".
					"'$sistapareamiento','$addinfosistaparea','$tiporeproduccion','$addinfotiporep','$tipofecundacion','$addinfotipofec','$edadtalla','$duracionvida','$epoca','$sitioanidacion', ".
					"'$addinfocrianza','$nohuevos','$parental','$cuidadoparental','$addinfoparental','$tiempoparental','$reprovegetal','$arregloespacial','$addinfoarresp','$aislamientoespacial', ".
					"'$addinfoATE','$sistemasasexuales','$addinfosistrepro','$tipofecveg','$addinfofecveg','$agentespolinizacion','$addinfoAP','$floracion','$addinfofloracion','$timeflora', ".
					"'$mesinicialflora','$mesfinalflora','$nectar','$polen', '$mesinicialfructi','$mesfinalfructi','$nofrutos','$caracfruto','$addinfofruto','$estfructi','$addinfoestf', ".
					"'$nosemillas','$tamaniosemillas','$latsemilla','$addinfolat','$tiempolat','$condalmacena','$germinacion','$plantulas','$caractoxicas','$tipodispersion','$addinfodisp', ".
					"'$structdisp','$addinfostruct','$distanciadisp','$tamanopoblacion','$abundancia','$densidad','$patronocupacion','$addinfoocu','$parapoblacion','$interacciones','$addinfointer', ".
					"'$vargenetica','$marcgeneticos','$funcionecologica','$addinfofuneco','$impoeco','$comnal','$addinfocomnal','$cominter','$addinfocominter','$sncomnal','$sncominter', ".
					"'$addinfocom','$culturausos','$usos','$amenazas','$presiones','$situacionhabitat','$tendenciapoblacion','$tendenciapobla','$edoconservacion','$conservacionx','$addinfocons', ".
					"'$uma','$noejem','$uno', '$dos', '$tres', '$cuatro')";
					}
					else{
					echo $sql = "INSERT INTO principal (nombreComun, reino, phylum, clase, orden, familia, nombreCientifico, sinonimos, resumenesp, descripcionesp, especiesimilar, nom059, ". 
					"informacionadicionalnom, uicn, addinfouicn, cites, addinfocites, origen, addinforigen, pais, mexestado, addinfomexestado, mexmun, addinfomexmun, distribucion, disthisto, ".
					"distactual, endesino, paisendemica, endemica, addinfoendemica, disamprest, addinfoamp, tipoambiente, habitatacuatico, addinfohabitatacuatico, salinidad, oxigeno, ph, tempagua, ".
					"corrientes, rangoaltitud, rangoprofundidad, mareas, usohabitat, alimentacion, addinfoalimenta, estrategiatrofica, addinfoestrofica, conducta, migracion, tipomigracion, ".
					"habito, habitock1, habitock2, hibernacion, territorialidad, ambitohogar, tamarea, tiporep, reproanimal, dimorfismo, addinfodimorfismo, longitudmh, pesomh, sistapareamiento, addinfosistaparea, ".
					"tiporeproduccion, addinfotiporep, tipofecundacion, addinfotipofec, edadtalla, duracionvida, epoca, sitioanidacion, addinfocrianza, nohuevos, parental,cuidadoparental, ".
					"addinfoparental, tiempoparental, reprovegetal,arregloespacial, addinfoarresp,aislamientoespacial, addinfoATE, sistemasasexuales, addinfosistrepro, tipofecveg, addinfofecveg, ".
					"agentespolinizacion, addinfoAP, floracion, addinfofloracion, timeflora, mesinicialflora, mesfinalflora, nectar, polen, mesinicialfructi, mesfinalfructi, nofrutos, ".
					"caracfruto, addinfofruto, estfructi,addinfoestf, nosemillas, tamaniosemillas, latsemilla, addinfolat, tiempolat, condalmacena,germinacion, plantulas, caractoxicas, ".
					"tipodispersion, addinfodisp, structdisp, addinfostruct, distanciadisp, tamanopoblacion, abundancia, densidad, patronocupacion,  addinfoocu, parapoblacion, interacciones, ".
					"addinfointer, vargenetica, marcgeneticos, funcionecologica, addinfofuneco, impoeco, comnal, addinfocomnal,cominter, addinfocominter, sncomnal, sncominter, ".
					"addinfocom, culturausos, usos, amenaza, presiones, situacionhabitat, tendenciapoblacion, tendenciapobla, edoconservacion, conservacion, addinfocons, uma, noejem, ".
					"uno, dos, tres, cuatro) ".
					"VALUES ('$nComun','$reino','$phylum','$clase','$orden','$familia','$nomcient','$sinonim','$resumenesp','$descripcionesp','$espsimilar','$nom059','$addinfonom','$uicn',".
					"'$addinfouicn','$cites','$addinfocites','$origen','$addinforigen','$paises','$mxedo','$addinfomexestado','$mxmunic','$addinfomexmun','$distribucion','$disthisto',".
					"'$distactual','$endemic','$paisendemica','$endemica','$addinfoendemica','$disamprest','$addinfoamp','$tipoambiente','$habitatacuatico','$addinfohabitatacuatico','$salinidad','$oxigeno',".
					"'$ph','$tempagua','$corrientes','$rangoaltitud','$rangoprofundidad','$mareas','$usohabitat','$alimentacion','$addinfoalimenta','$estrategiatrofica','$addinfoestrofica', ".
					"'$conducta','$migracion','$tipomigracion','$habito','$habitock1','$habitock2','$hibernacion','$terri','$ambitohogar','$tamarea','$tiporep','$reproanimal','$dimorfismo','$addinfodimorfismo', ".
					"'$longitudmh','$pesomh','$sistapareamiento','$addinfosistaparea','$tiporeproduccion','$addinfotiporep','$tipofecundacion','$addinfotipofec','$edadtalla','$duracionvida', ".
					"'$epoca','$sitioanidacion','$addinfocrianza','$nohuevos','$parental','$cuidadoparental','$addinfoparental','$tiempoparental','$reprovegetal','$arregloespacial','$addinfoarresp', ".
					"'$aislamientoespacial','$addinfoATE','$sistemasasexuales','$addinfosistrepro','$tipofecveg','$addinfofecveg','$agentespolinizacion','$addinfoAP','$floracion','$addinfofloracion', ".
					"'$timeflora','$mesinicialflora','$mesfinalflora','$nectar','$polen','$mesinicialfructi','$mesfinalfructi','$nofrutos','$caracfruto','$addinfofruto','$estfructi', ".
					"'$addinfoestf','$nosemillas','$tamaniosemillas','$latsemilla','$addinfolat','$tiempolat','$condalmacena','$germinacion','$plantulas','$caractoxicas','$tipodispersion','$addinfodisp', ".
					"'$structdisp','$addinfostruct','$distanciadisp','$tamanopoblacion','$abundancia','$densidad','$patronocupacion','$addinfoocu','$parapoblacion','$interacciones','$addinfointer', ".
					"'$vargenetica','$marcgeneticos','$funcionecologica','$addinfofuneco', '$impoeco','$comnal','$addinfocomnal','$cominter','$addinfocominter','$sncomnal','$sncominter', ".
					"'$addinfocom','$culturausos','$usos','$amenazas','$presiones','$situacionhabitat','$tendenciapoblacion','$tendenciapobla','$edoconservacion','$conservacionx','$addinfocons', ".
					"'$uma','$noejem', '$uno', '$dos', '$tres', '$cuatro')";
					}
					$result = mysql_query($sql);
					desconectar();
					echo "<h3>Ficha creada con &eacute;xito!!!</h3><br />";
					//echo "Gracias por Reservar con nosotros, hemos recibido su informaci&oacute;n satisfactoriamente.\n";
					echo "<br/><a href='index.php'>Regresar</a><br /><br />";
				}
			}
			elseif ($Opc == "Del")
			{
				Conectarse();
				$sql = "DELETE FROM principal WHERE Id=$IdResev";
				$result = mysql_query($sql);
				desconectar();
				echo "<h3>Ficha cancelada con &eacute;xito!!!</h3><br />";
				echo "<a href='index.php'>Volver</a><br /><br />";
			}
			else{
		?>	
		<a id="makeWizard" href="#" onclick="MakeWizard()">Haga clic aqu&iacute; para convertir el formulario en un wizard.</a>
	<form id="SignupForm" method="POST" action="#">
		<?php
		if( $Opc == "Mod" ){
				//conecto con la base de datos 
				Conectarse();
				
				//Sentencia SQL para buscar un usuario con esos datos 
				$ssql = "SELECT * FROM principal WHERE Id=$IdResev"; 

				//Ejecuto la sentencia 
				$rs = mysql_query($ssql); 
				if ($row = mysql_fetch_array($rs)){
					$Unomcom=$row["nombreComun"];
					$Ureino=$row["reino"];
					$Uphylum=$row["phylum"];
					$Uclase=$row["clase"];
					$Uorden=$row["orden"];
					$Ufamilia=$row["familia"];
					$Unomcient=$row["nombreCientifico"];
					$Usinonimo=$row["sinonimos"];
					$Uresesp=$row["resumenesp"];
					$Udescesp=$row["descripcionesp"];
					$Uespsimilar=$row["especiesimilar"];
					$Unom=$row["nom059"];
					$Uaddinfonom=$row["informacionadicionalnom"];
					$Uicn=$row["uicn"];
					$Uaddinfoiucn=$row["addinfouicn"];
					$Ucites=$row["cites"];
					$Uaddinfocites=$row["addinfocites"];
					$Uorigen=$row["origen"];
					$Uaddinforigen=$row["addinforigen"];
					$Upais=$row["pais"];
					$Umexestado=$row["mexestado"];
					$Uaddinfomexestado=$row["addinfomexestado"];
					$Umexmun=$row["mexmun"];
					$Uaddinfomexmun=$row["addinfomexmun"];
					$Udistribucion=$row["distribucion"];
					$Udisthisto=$row["disthisto"];
					$Udistactual=$row["distactual"];
					$Uendesino=$row["endesino"];
					$Upaisendemica=$row["paisendemica"];
					$Uendemica=$row["endemica"];
					$Uaddinfoendemica=$row["addinfoendemica"];
					$Udisamprest=$row["disamprest"];
					$Uaddinfoamp=$row["addinfoamp"];
					$Utipoambiente=$row["tipoambiente"];
					$Uecosistemas=$row["ecosistemas"];
					$Uecorregiones=$row["ecorregiones"];
					$Utipoveg=$row["tipoveg"];
					//$Ugrupoveg=$row["grupoveg"];
					$Uvegsecu=$row["vegsecu"];
					$Utipovegsecu=$row["tipovegsecu"];
					$Uaddinfovegsecu=$row["addinfovegsecu"];
					$Ucoverturaveg=$row["coverturaveg"];
					$Usnhabitatantropico=$row["opchabitropi"];
					$Uhabitatantropico=$row["habitatantropico"];
					$Urangoaltitudinal=$row["rangoaltitudinal"];
					$Uclima=$row["clima"];
					$Uaddinfoclima=$row["addinfoclima"];
					$Urtemperatura=$row["rtemperatura"];
					$Uprecipitacion=$row["precipitacion"];
					$Uhumedad=$row["humedad"];
					$Utiposuelo=$row["tiposuelo"];
					$Uaddinfotiposuelo=$row["addinfotiposuelo"];
					$Ugeoforma=$row["geoforma"];
					$Uaddinfogeoforma=$row["addinfogeoforma"];
					$Uhabitatacuatico=$row["habitatacuatico"];
					$Uaddinfohabitatacuatico=$row["addinfohabitatacuatico"];
					$Usalinidad=$row["salinidad"];
					$Uoxigeno=$row["oxigeno"];
					$Uph=$row["ph"];
					$Utempagua=$row["tempagua"];
					$Ucorrientes=$row["corrientes"];
					$Urangoaltitud=$row["rangoaltitud"];
					$Urangoprofundidad=$row["rangoprofundidad"];
					$Umareas=$row["mareas"];
					$Uusohabitat=$row["usohabitat"];
					$Ualimentacion=$row["alimentacion"];
					$Uaddinfoalimenta=$row["addinfoalimenta"];
					$Uestrategiatrofica=$row["estrategiatrofica"];
					$Uaddinfoestrofica=$row["addinfoestrofica"];
					$Uconducta=$row["conducta"];
					$Umigracion=$row["migracion"];
					$Utipomigracion=$row["tipomigracion"];
					$Uhabito=$row["habito"];
					$Uhabitock1=$row["habitock1"];
					$Uhabitock2=$row["habitock2"];
					$Uhibernacion=$row["hibernacion"];
					$Uterri=$row["territorialidad"];
					$Uambitohogar=$row["ambitohogar"];
					$Utamarea=$row["tamarea"];
					$Utiporep=$row["tiporep"];
					$Ureproanimal=$row["reproanimal"];
					$Udimorfismo=$row["dimorfismo"];
					$Uaddinfodimorfismo=$row["addinfodimorfismo"];
					$Ulongitudmh=$row["longitudmh"];
					$Upesomh=$row["pesomh"];
					$Usistapareamiento=$row["sistapareamiento"];
					$Uaddinfosistaparea=$row["addinfosistaparea"];
					$Utiporeproduccion=$row["tiporeproduccion"];
					$Uaddinfotiporep=$row["addinfotiporep"];	
					$Utipofecundacion=$row["tipofecundacion"];	
					$Uaddinfotipofec=$row["addinfotipofec"];
					$Uedadtalla=$row["edadtalla"];
					$Uduracionvida=$row["duracionvida"];
					$Uepoca=$row["epoca"];
					$Usitioanidacion=$row["sitioanidacion"];
					$Uaddinfocrianza=$row["addinfocrianza"];
					$Unohuevos=$row["nohuevos"];
					$Uparental=$row["parental"];
					$Ucuidadoparental=$row["cuidadoparental"];
					$Uaddinfoparental=$row["addinfoparental"];
					$Utiempoparental=$row["tiempoparental"];
					$Ureprovegetal=$row["reprovegetal"];
					$Uarregloespacial=$row["arregloespacial"];
					$Uaddinfoarresp=$row["addinfoarresp"];
					$Uaislamientoespacial=$row["aislamientoespacial"];
					$UaddinfoATE=$row["addinfoATE"];
					$Usistemasasexuales=$row["sistemasasexuales"];
					$Uaddinfosistrepro=$row["addinfosistrepro"];
					$Utipofecveg=$row["tipofecveg"];
					$Uaddinfofecveg=$row["addinfofecveg"];
					$Uagentespolinizacion=$row["agentespolinizacion"];
					$UaddinfoAP=$row["addinfoAP"];
					$Ufloracion=$row["floracion"];
					$Uaddinfofloracion=$row["addinfofloracion"];
					$Utimeflora=$row["timeflora"];
					$Umesinicialflora=$row["mesinicialflora"];
					$Umesfinalflora=$row["mesfinalflora"];
					$Unectar=$row["nectar"];
					$Upolen=$row["polen"];
					$Umesinicialfructi=$row["mesinicialfructi"];
					$Umesfinalfructi=$row["mesfinalfructi"];
					$Unofrutos=$row["nofrutos"];
					$Ucaracfruto=$row["caracfruto"];
					$Uaddinfofruto=$row["addinfofruto"];
					$Uestfructi=$row["estfructi"];
					$Uaddinfoestf=$row["addinfoestf"];
					$Unosemillas=$row["nosemillas"];
					$Utamaniosemillas=$row["tamaniosemillas"];
					$Ulatsemilla=$row["latsemilla"];
					$Uaddinfolat=$row["addinfolat"];
					$Utiempolat=$row["tiempolat"];
					$Ucondalmacena=$row["condalmacena"];
					$Ugerminacion=$row["germinacion"];
					$Uplatulas=$row["plantulas"];
					$Ucaractoxicas=$row["caractoxicas"];
					$Utipodispersion=$row["tipodispersion"];
					$Uaddinfodisp=$row["addinfodisp"];
					$Ustructdisp=$row["structdisp"];
					$Uaddinfostruct=$row["addinfostruct"];
					$Udistanciadisp=$row["distanciadisp"];
					$Utamanopoblacion=$row["tamanopoblacion"];
					$Uabundancia=$row["abundancia"];
					$Udensidad=$row["densidad"];
					$Upatronocupacion=$row["patronocupacion"];
					$Uaddinfoocu=$row["addinfoocu"];
					$Uparapoblacion=$row["parapoblacion"];
					$Uinteracciones=$row["interacciones"];
					$Uaddinfointer=$row["addinfointer"];
					$Uvargenetica=$row["vargenetica"];
					$Umarcgeneticos=$row["marcgeneticos"];
					$Ufuncionecologica=$row["funcionecologica"];
					$Uaddinfofuneco=$row["addinfofuneco"];
					$Uimpoeco=$row["impoeco"];
					$Ucomnal=$row["comnal"];
					$Uaddinfocomnal=$row["addinfocomnal"];
					$Ucominter=$row["cominter"];
					$Uaddinfocominter=$row["addinfocominter"];
					$Usncomnal=$row["sncomnal"];
					$Usncominter=$row["sncominter"];
					$Uaddinfocom=$row["addinfocom"];
					$Uculturausos=$row["culturausos"];
					$Uusos=$row["usos"];
					$Uamenazas=$row["amenaza"];
					$Upresiones=$row["presiones"];
					$Usituacionhabitat=$row["situacionhabitat"]; 
					$Utendenciapoblacion=$row["tendenciapoblacion"];
					$Utendenciapobla=$row["tendenciapobla"];
					$Uedoconservacion=$row["edoconservacion"];
					$Uconservacion=$row["conservacion"];
					$Uaddinfocons=$row["addinfocons"];
					$Uuma=$row["uma"];
					$Unoejem=$row["noejem"];
					$Uuno=$row["uno"];
					$Udos=$row["dos"];
					$Utres=$row["tres"];
					$Ucuatro=$row["cuatro"];
				}
				desconectar();
				$UpNcom = explode(",", $Unomcom);
				$UpSino = explode(",", $Usinonimo);
				$Ucountry = explode(",", $Upais);
				$Umxstate = explode(",", $Umexestado);
				$Umxmun = explode(",", $Umexmun);
				$Uecosi = explode(",",$Uecosistemas);
				$Uecorregion = explode(",",$Uecorregiones);
				$Utipoveget = explode(",",$Utipoveg);
				$Uamenazas = explode(",",$Uamenazas);
				$Uconservacion = explode(",", $Uconservacion);
				echo "<input type=hidden name=ID value=$IdResev>";
				echo "<h3>Edici&oacute;n de registro.</h3>";
				echo "<br/><a href='index.php'>Cancelar edici&oacute;n</a><br />";
	
			}
			else{
				$UpNcom[]="";
				$editado="";
				$Ureino="";
				$Uphylum="";
				$Uclase="";
				$Uorden="";
				$Ufamilia="";
				$Unomcient="";
				$UpSino[]="";
				$Uresesp="";
				$Udescesp="";
				$Uespsimilar="";
				$Unom=0;
				$Uaddinfonom="";
				$Uicn=0;
				$Uaddinfoiucn="";
				$Ucites=0;
				$Uaddinfocites="";
				$Uorigen=0;
				$Uaddinforigen="";
				$Ucountry[] = "";
				$Umxstate[]="";
				$Uaddinfomexestado='';
				$Umxmun[] ="";
				$Uaddinfomexmun="";
				$Udistribucion="";
				$Udisthisto="";
				$Udistactual="";
				$Uendesino="";
				$Upaisendemica=0;
				$Uendemica="";
				$Uaddinfoendemica="";
				$Udisamprest="0";
				$Uaddinfoamp="";
				$Utipoambiente="";
				$opc="";
				$Uecosi[]="";
				$Uecorregion[]="";
				$Utipoveget[]="";
				//$Ugrupoveg=0;
				$Uvegsecu="";	
				$Utipovegsecu="0";
				$Uaddinfovegsecu="";
				$Ucoverturaveg="";
				$Usnhabitatantropico="";
				$Uhabitatantropico="";
				$Urangoaltitudinal="";
				$Uclima=0;
				$Uaddinfoclima="";
				$Urtemperatura="";
				$Uprecipitacion="";
				$Uhumedad="";
				$Utiposuelo=0;
				$Uaddinfotiposuelo="";
				$Ugeoforma=0;
				$Uaddinfogeoforma="";
				$Uhabitatacuatico=0;
				$Uaddinfohabitatacuatico="";
				$Usalinidad="";
				$Uoxigeno="";
				$Uph="";
				$Utempagua="";
				$Ucorrientes="";
				$Urangoaltitud="";
				$Urangoprofundidad="";
				$Umareas="";
				$Uusohabitat="";
				$Ualimentacion=0;
				$Uaddinfoalimenta="";
				$Uestrategiatrofica=0;
				$Uaddinfoestrofica="";
				$Uconducta="";
				$Umigracion="0";
				$Utipomigracion="0";
				$Uhabito=0;
				$Uhabitock1="";
				$Uhabitock2="";
				$Uhibernacion="";
				$Uterri="";
				$Uambitohogar="";
				$Utamarea="";
				$Utiporep="";
				$Ureproanimal="";
				$Udimorfismo="";
				$Uaddinfodimorfismo="";
				$Ulongitudmh="";
				$Upesomh="";
				$Usistapareamiento="0";
				$Uaddinfosistaparea="";
				$Utiporeproduccion="0";
				$Uaddinfotiporep="";
				$Utipofecundacion="0";
				$Uaddinfotipofec="";
				$Uedadtalla="";
				$Uduracionvida="";
				$Uepoca="";
				$Usitioanidacion="";
				$Uaddinfocrianza="";
				$Unohuevos="";
				$Uparental="";
				$Ucuidadoparental="0";
				$Uaddinfoparental="";
				$Utiempoparental="";
				$Ureprovegetal="";
				$Uarregloespacial="0";
				$Uaddinfoarresp="";
				$Uaislamientoespacial="0";
				$UaddinfoATE="";
				$Usistemasasexuales="0";
				$Uaddinfosistrepro="";
				$Utipofecveg="0";
				$Uaddinfofecveg="";
				$Uagentespolinizacion="0";
				$UaddinfoAP="";
				$Ufloracion="";
				$Uaddinfofloracion="";
				$Utimeflora="";
				$Umesinicialflora=0;
				$Umesfinalflora=0;
				$Unectar="";
				$Upolen="";
				$Umesinicialfructi=0;
				$Umesfinalfructi=0;
				$Unofrutos='';
				$Ucaracfruto=0;
				$Uaddinfofruto="";
				$Uestfructi="0";
				$Uaddinfoestf="";
				$Unosemillas="";
				$Utamaniosemillas="";
				$Ulatsemilla=0;
				$Uaddinfolat="";
				$Utiempolat="";
				$Ucondalmacena="";
				$Ugerminacion="";
				$Uplatulas="";
				$Ucaractoxicas="";
				$Utipodispersion="0";
				$Uaddinfodisp="";
				$Ustructdisp=0;
				$Uaddinfostruct="";
				$Udistanciadisp="";
				$Utamanopoblacion="";
				$Uabundancia="";
				$Udensidad="";
				$Upatronocupacion="0";
				$Uaddinfoocu="";
			    $Uparapoblacion="";
				$Uinteracciones="";
				$Uaddinfointer="";
				$Uvargenetica="";
				$Umarcgeneticos="";
				$Ufuncionecologica=0;
				$Uaddinfofuneco="";
				$Uimpoeco="";
				$Ucomnal=0;
				$Uaddinfocomnal="";
				$Ucominter=0;
				$Uaddinfocominter="";
				$Usncomnal="";
				$Usncominter="";
				$Uaddinfocom="";
				$Uculturausos="";
				$Uusos=0;
				$Uamenazas[]="";
				$Upresiones="";
				$Usituacionhabitat="";
				$Utendenciapoblacion="";
				$Utendenciapobla="";
				$Uedoconservacion="";
				$Uconservacion[]="";
				$Uaddinfocons="";
				$Uuma="";
				$Unoejem="";
				$Uuno="";
				$Udos="";
				$Utres="";
				$Ucuatro="";
			}
			
		?>
		<h2>Taxon Record</h2>
		<fieldset>
			<legend><strong><h3>I. Clasificaci&oacute;n y descripci&oacute;n de la especie</h3></strong></legend>
			<table width="660">
				<tr>
					<td width="210" valign="baseline" ><p><b>1. Nombres comunes:</b></p></td>
					<td width="450"><a id="agregarCampo" class="btn btn-info" href="#"><b>Agregar nombre</b></a>
						<div id="contenedor">
							<?php
							if(count($UpNcom) == 1 && $UpNcom[0]==""){
							?>
							<div class="added">
								<input type="text" name="nComun[]" id="campo_1" placeholder="Nombre 1" title="Nombres usados en espa&ntilde;ol, ingl&eacute;s y lenguas ind&iacute;genas."/>					
								<SCRIPT type = "text/javascript">
									var f1 = new LiveValidation('campo_1');
									f1.add( Validate.Presence,{ failureMessage: " *Ingrese al menos un nombre com\u00fan " } );
								</SCRIPT>
							</div>	
							<?php
							}
							else{
							$z=0;
								while ($z < count($UpNcom)){
									echo "<div class='added'><input type='text' name='nComun[]' id='campo_$z' placeholder='Nombre ".$z."' value='".trim($UpNcom[$z])."'/><a href='#' class='eliminar'>&times;</a></div>";
									$z++;
								}
							}
							?>		
						</div>
					</td>
				</tr>
				<tr>
					<td><b>2. Reino:</b> </td>
					<td><input type="text" name="reino" id="reino" placeholder="..." value="<?php echo $Ureino;?>"><br /></td>
					<SCRIPT type = "text/javascript">
						var f2 = new LiveValidation('reino');
						f2.add( Validate.Presence,{ failureMessage: " *Ingrese el reino" } );
					</SCRIPT>
				</tr>
				<tr>
					<td><b>3. Phylum:</b></td>
					<td><input type="text" name="phylum" id="phylum" placeholder="..." value="<?php echo $Uphylum;?>"></td>
					<SCRIPT type = "text/javascript">
						var f3 = new LiveValidation('phylum');
						f3.add( Validate.Presence,{ failureMessage: " *Ingrese el phylum" } );
					</SCRIPT>
				</tr>
				<tr>
					<td><b>4. Clase:</b></td>
					<td><input type="text" name="clase" id="clase" placeholder="..." value="<?php echo $Uclase;?>"></td>
					<SCRIPT type = "text/javascript">
						var f4 = new LiveValidation('clase');
						f4.add( Validate.Presence,{ failureMessage: " *Ingrese la clase" } );
					</SCRIPT>
				</tr>
				<tr>
					<td><b>5. Orden:</b></td>
					<td><input type="text" name="orden" id="orden" placeholder="..." value="<?php echo $Uorden;?>"></td>
					<SCRIPT type = "text/javascript">
						var f5 = new LiveValidation('orden');
						f5.add( Validate.Presence,{ failureMessage: " *Ingrese el orden" } );
					</SCRIPT>
				</tr>	
				<tr>
					<td><b>6. Familia:</b></td>
					<td><input type="text" name="familia" id="familia" placeholder="..." value="<?php echo $Ufamilia;?>"></td>
					<SCRIPT type = "text/javascript">
						var f6 = new LiveValidation('familia');
						f6.add( Validate.Presence,{ failureMessage: " *Ingrese la familia" } );
					</SCRIPT>
				</tr>
				<tr>
					<td><b>7. Nombre cient&iacute;fico:</b></td>
					<td><input type="text" name="nameCient" id="nameCient" placeholder="..." value="<?php echo $Unomcient;?>" title="Nombre cient&iacute;fico de la especie. G&eacute;nero y ep&iacute;teto espec&iacute;fico. Si aplica, incluir las categor&iacute;as infraespec&iacute;ficas (variedad, forma o subespecie) acompa&ntilde;adas del autor y el a&ntilde;o."></td>
					<SCRIPT type = "text/javascript">
						var f7 = new LiveValidation('nameCient');
						f7.add( Validate.Presence,{ failureMessage: " *Ingrese el nombre cient\u00edfico" } );
					</SCRIPT>
				</tr>
				<tr>
					<td valign="top"><b>8. Sin&oacute;nimos:</b></td>
					<td><a id="agregaSinonimo" class="btn btn-info" href="#"><b>Agregar sin&oacute;nimo</b></a>
						<div id="contienSinonimos">
							<?php
							if(count($UpSino) == 1 && $UpSino[0]==""){
							?>
							<div class="addSinonimo">
								<input type="text" name="sinonimos[]" id="sinonimo_1" placeholder="Sin&oacute;nimo 1" title="Nombre cient&iacute;fico del o los sin&oacute;nimos asociados al nombre cient&iacute;fico v&aacute;lido o correcto, incluyendo el autor y el a&ntilde;o."/>					
							</div>	
							<?php
							}
							else{
							$z=0;
								while ($z < count($UpSino)){
									echo "<div class='added'><input type='text' name='sinonimos[]' id='campo_$z' placeholder='Name ".$z."' value='".trim($UpSino[$z])."'/><a href='#' class='eliminar'>&times;</a></div>";
									$z++;
								}
							}
							?>		
						</div>
					</td>
				</tr>
				<tr>
					<td valign="top"><b>9. Resumen de la especie:</b></td>
					<td title="Breve descripci&oacute;n coloquial que incluya las caracter&iacute;sticas distintivas de la especie, incluyendo en la medida de lo posible, informaci&oacute;n 
						sobre la morfolog&iacute;a,distribuci&oacute;n, biolog&iacute;a, ecolog&iacute;a, importancia y estado de conservaci&oacute;n.">
						<textarea name="resumen" rows="10" cols="50" ><?php echo $Uresesp;?></textarea>
					</td>
				</tr>
				<tr>
					<td valign="top"><b>10. Descripci&oacute;n de la especie:</b></td>
					<td title="Descripci&oacute;n t&eacute;cnica de los caracteres que distinguen a la especie (tratando de que sea lo m&aacute;s completa posible)."><textarea name="descripcion" rows="10" cols="50" ><?php echo $Udescesp;?></textarea></td>
				</tr>
				<tr>
					<td valign="top"><b>11. Especies similares:</b></td>
					<td title="Mencionar si existen especies similares, cu&aacute;les son y una breve descripci&oacute;n de estas."><textarea name="espsimi" rows="10" cols="50" ><?php echo $Uespsimilar;?></textarea></td>
				</tr>
				<tr>
					<td><b>12. Categor&iacute;a riesgo seg&uacute;n la<br/> NOM-059-SEMARNAT:</b></td>
					<td>
						<?php generaNOM059($Unom); ?>
					</td>
				</tr>
				<tr>
					<td valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td title="Informaci&oacute;n adicional sobre el estatus de riesgo de extinci&oacute;n de la especie."><textarea name="addinfonom" rows="10" cols="50" ><?php echo $Uaddinfonom;?></textarea></td>
				</tr>
				<tr>
					<td valign="top"><b>13. Categor&iacute;a de riesgo seg&uacute;n la<br/> UICN:</b></td>
					<td>
						<?php generaUICN($Uicn); ?>
					</td>
				</tr>
				<tr>
					<td valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td title="Informaci&oacute;n adicional sobre el estatus de riesgo de extinci&oacute;n de la especie."><textarea name="addinfouicn" rows="10" cols="50" ><?php echo $Uaddinfoiucn;?></textarea></td>
				</tr>
				<tr>
					<td valign="top"><b>14. Regulaci&oacute;n del comercio<br/> internacional de la especie (CITES):</b></td>
					<td>
						<?php generaCITES($Ucites); ?>
					</td>
				</tr>
				<tr>
					<td valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td title="Informaci&oacute;n adicional sobre los ap&eacute;ndices. Indicar cualquier nota, o n&uacute;mero de nota al pie o anotaci&oacute;n asociadas al listado en los Ap&eacute;ndices."><textarea name="addinfocites" rows="10" cols="50" ><?php echo $Uaddinfocites;?></textarea></td>
				</tr>
				<tr>
					<td><b>15. Origen:</b></td>
					<td>
						<?php generaOrigen($Uorigen); ?>
					</td>
				</tr>
				<tr>
					<td valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td title="Informaci&oacute;n adicional sobre el origen de la especie."><textarea name="addinforigen" rows="10" cols="50" ><?php echo $Uaddinforigen;?></textarea></td>
				</tr>
			</table>
		</fieldset>		
		<fieldset>
			<legend><strong><h3>II. Distribuci&oacute;n de la especie</h3></strong></legend>
			<table width="660">
				<tr>
					<td width="300"><b>16. Pa&iacute;s:</b> </td>
					<td width="360">
						<?php generaPais($Ucountry); ?>
					</td>
				</tr>
				<tr id='1e' style='display:'>
					<td width="300"><b>M&eacute;xico/Estado:</b> </td>
					<td width="360">
						<!--select class="con_estilos" name="mexestado" id="mexestado" >
						</select-->
						<?php generaEstado($Umxstate); ?>
					</td>
				</tr>
				<tr id='2e' style='display:'>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre la distribuci&oacute;n de la especie en las regiones mencionadas."><textarea name="addinfomexestado" rows="10" cols="50" ><?php echo $Uaddinfomexestado;?></textarea></td>
				</tr>
				<tr id='1m' style='display:'>
					<td width="300"><b>M&eacute;xico/Estado/Municipio:</b> </td>
					<td width="360">
						<!--select class="con_estilos" name="mexmun" id="mexmun" >
						</select-->
						<?php generaMunicipio($Umxmun) ?>
					</td>	
					<!--script type="text/javascript">
						$(function() {
							$("#mexestado").jCombo("getCountries.php", { selected_value : '<?php echo $Umexestado; ?>' } );
							$("#mexmun").jCombo("getStates.php?id_country=", { parent: "#mexestado", selected_value: '<?php echo $Umexmun; ?>'});		
							//$("#list3").jCombo("getCities.php?id_state=", { parent: "#list2" });
						});
					</script-->
				</tr>
				<tr id='2m' style='display:'>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre la distribuci&oacute;n de la especie en las regiones mencionadas."><textarea name="addinfomexmun" rows="10" cols="50" ><?php echo $Uaddinfomexmun;?></textarea></td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>17. Distribuci&oacute;n:</b></td>
					<td width="360" title="Hacer una breve descripci&oacute;n sobre la distribuci&oacute;n de la especie. Cuando no se cuente con la informaci&oacute;n desglosada en hist&oacute;rica o actual escribir un p&aacute;rrafo breve se&ntilde;alando la distribuci&oacute;n que se tiene registrada.">
						<textarea name="distribucion" id="distribucion" rows="10" cols="50" ><?php echo $Udistribucion;?></textarea>
					</td>
					<SCRIPT type = "text/javascript">
						var f8 = new LiveValidation('distribucion');
						f8.add( Validate.Presence,{ failureMessage: " *Ingrese la distribuci\u00f3n" } );
					</SCRIPT>
				</tr>
				<tr>
					<td width="300" valign="top"><b>18. Distribuci&oacute;n hist&oacute;rica:</b></td>
					<td width="360" title="Distribuci&oacute;n original reportada para la especie (antes de 1970)."><textarea name="distrihisto" rows="10" cols="50" ><?php echo $Udisthisto;?></textarea></td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>19. Distribuci&oacute;n actual:</b></td>
					<td width="360" title="Distribuci&oacute;n que tiene la especie hoy en d&iacute;a (despu&eacute;s de 1970). "><textarea name="distactual" rows="10" cols="50" ><?php echo $Udistactual;?></textarea></td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>20. End&eacute;mica:</b> </td>
					<td width="360">
						<input type="radio" name="endemic" value="si" <?php if($Uendesino==="si") echo 'checked'; ?> /> <b>Si</b>
						<input type="radio" name="endemic" value="no" <?php if($Uendesino==="no") echo 'checked'; ?> /> <b>No</b>
					</td>
				</tr>
				<tr>
					<td width="300"><b>End&eacute;mica en:</b> </td>
					<td width="360">
						<?php generaPaisEndemica($Upaisendemica); ?>
					</td>
				</tr>
				<tr>
					<td width="300"><b>End&eacute;mica a:</b> </td>
					<td width="360"><input type="text" name="endemica" value="<?php echo $Uendemica; ?>" placeholder="..." title="Especificar regi&oacute;n (ej. mesoam&eacute;rica, ej. Neovolc&aacute;nico, etc.)."><br /></td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre la distribuci&oacute;n de la especie en las regiones mencionadas."><textarea name="addinfoendemica" rows="10" cols="50" ><?php echo $Uaddinfoendemica;?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>21. Distribuci&oacute;n:</b> </td>
					<td width="360" title="">
						<select class="con_estilos" name="distribucionamprest" >
							<option value="0" <?php if($Udisamprest=="0") echo "selected"; ?> > Seleccionar >></option>
							<option value="Amplia" <?php if($Udisamprest=="Amplia") echo "selected"; ?>> Amplia</option>
							<option value="Restringida" <?php if($Udisamprest=="Restringida") echo "selected"; ?> > Restringida</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre el tipo de distribuci&oacute;n."><textarea name="addinfoamp" rows="10" cols="50" ><?php echo $Uaddinfoamp;?></textarea></td>
				</tr>
			</table>
		</fieldset>		
		<fieldset>
			<legend><strong><h3>III. Tipo de ambiente en donde se desarrolla la especie</h3></strong></legend>
			<input type="radio" name="tipoambiente" value="terrestre" onclick="mostrar(0)" <?php if($Utipoambiente=="terrestre" && $Utipoambiente!="") echo "checked"; elseif($Opc=="Mod" && $Utipoambiente!="terrestre") echo "disabled"; ?> /> <b>A. Ambiente terrestre</b>
			<input type="radio" name="tipoambiente" value="acu&aacute;tico" onclick="mostrar(1)" <?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "checked "; elseif($Opc=="Mod" && $Utipoambiente=="terrestre") echo "disabled"; ?> /> <b>B. Ambiente acu&aacute;tico (dulceacu&iacute;cola, salobre o marino)</b>
			<table width="660">
				<tr id="f1" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300" valign="top"><b>22. Tipo de ecosistema:</b> </td>
					<td width="360">
						<?php generaEcosistema($Uecosi);?><br/>
						
						<?php generaEcorregiones($Uecorregion);?>
					</td>
				</tr>
				<tr id="f2" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300" valign="top"><b>23. Tipo de vegetaci&oacute;n:</b> </td>
					<td width="360">
						<?php //grupoVegetacion($Utipoveg);?>
						<?php //tipoVegetacion($Utipoveg, $Ugrupoveg);?>
						<?php tipoVegetacionFull($Utipoveget); ?>						
					</td>
				<tr id="f30" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300" valign="top"><b>Indicar si se encuentra en vegetaci&oacute;n secundaria:</b></td>
					<td width="360" >
						<input type="radio" name="vegsecu" value="si" onclick="mostrarOcultar2(1);" <?php if($Uvegsecu=="si") echo "checked"; ?> /> <b>Si</b>
						<input type="radio" name="vegsecu" value="no" onclick="mostrarOcultar2(0);" <?php if($Uvegsecu=="no") echo "checked"; ?> /> <b>No</b>						
					</td>
				</tr>	
                <tr id="f31" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300"><b>Tipo de vegetaci&oacute;n secundaria:</b> </td>
					<td width="360">
						<select class="con_estilos" name="tipovegsecu" id="tipovegsecu" <?php if($Uvegsecu=="no") echo "disabled"; ?> >
							<option value="0" <?php if($Utipovegsecu=="0") echo "selected"; ?> > Seleccionar >></option>
							<option value="Arb&oacute;rea" <?php if(substr ($Utipovegsecu,0,3)=="Arb") echo "selected"; ?> > Arb&oacute;rea</option>
							<option value="Arbustiva" <?php if($Utipovegsecu=="Arbustiva") echo "selected"; ?> > Arbustiva</option>
							<option value="Herb&aacute;cea" <?php if(substr ($Utipovegsecu,0,3)=="Her") echo "selected"; ?> > Herb&aacute;cea</option>
						</select>	
					</td>
				</tr>				
				<tr id="f3" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Hacer una breve descripci&oacute;n del tipo de vegetaci&oacute;n y de las comunidades vegetales asociadas a la especie.">
					<textarea name="addinfovegsecu" rows="10" cols="50"  ><?php echo $Uaddinfovegsecu;?></textarea>
					</td>
				</tr>
				<tr id="f4" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300"><b>Porcentaje de cobertura vegetal:</b> </td>
					<td width="360"><input type="text" name="coverturaveg" value="<?php echo $Ucoverturaveg; ?>" placeholder="..." title="Indicar el porcentaje de cobertura vegetal requerida para la permanencia de la especie"><br /></td>
				</tr>
				<tr id="f5" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300" valign="top"><b>H&aacute;bitats antr&oacute;picos:</b> </td>
					<td width="360">
						<input type="radio" name="snhabitatantropico" value="si" onclick="mostrarOcultar(1);" <?php if($Usnhabitatantropico=="si") echo "checked"; ?> /> <b>Si</b>
						<input type="radio" name="snhabitatantropico" value="no" onclick="mostrarOcultar(0);" <?php if($Usnhabitatantropico=="no") echo "checked"; ?> /> <b>No</b>
						<?php generaHabitatAntropico($Usnhabitatantropico, $Uhabitatantropico); ?>
					</td>
				</tr>
				<tr id="f6" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300"><b>24. Rango altitudinal:</b> </td>
					<td width="360"><input type="text" value="<?php echo $Urangoaltitudinal; ?>" name="rangoaltitudinal" id="rangoalti" placeholder="..." title="En msnm." ><br /></td>
					<script type = "text/javascript">
						var f9 = new LiveValidation('rangoalti');
						f9.add( Validate.Numericality );
					</script>
				</tr>
				<tr id="f7" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300"><b>25. Clima:</b> </td>
					<td width="360">
						<?php generaClima($Uclima); ?>
					</td>
				</tr>
				<tr id="f8" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Hacer una breve descripci&oacute;n del tipo de clima en el que se encuentra la especie."><textarea name="addinfoclima" rows="10" cols="50" ><?php echo $Uaddinfoclima;?></textarea></td>
				</tr>
				<tr id="f9" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300"><b>26. Rango de temperatura:</b> </td>
					<td width="360"><input type="text" value="<?php echo $Urtemperatura; ?>" name="rtemperatura" id="rtemperatura" placeholder="..." title="En grados cent&iacute;grados (&#176C)."><br /></td>
					<SCRIPT type = "text/javascript">
						var f9 = new LiveValidation('rtemperatura');
						f9.add( Validate.Numericality );
					</script>
				</tr>
				<tr id="f10" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300"><b>27. Rango de precipitaci&oacute;n:</b> </td>
					<td width="360"><input type="text" value="<?php echo $Uprecipitacion; ?>" name="precipitacion" id="precipitacion" placeholder="..." title="En mil&iacute;metros (mm)."><br /></td>
					<script type = "text/javascript">
						var f9 = new LiveValidation('precipitacion');
						f9.add( Validate.Numericality );
					</script>
				</tr>
				<tr id="f11" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300"><b>28. Rango de humedad relativa:</b> </td>
					<td width="360"><input type="text" value="<?php echo $Uhumedad; ?>" name="humedad" id="humedad" placeholder="..." title="En porcentaje (%)."><br /></td>
					<script type = "text/javascript">
						var f9 = new LiveValidation('humedad');
						f9.add( Validate.Numericality );
					</script>
				</tr>
				<tr id="f12" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300"><b>29. Tipo de suelo:</b> </td>
					<td width="360">
						<?php generaTiposuelo($Utiposuelo); ?>
					</td>
				</tr>
				<tr id="f13" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b> </td>
					<td width="360" title="Hacer una breve descripci&oacute;n. Solo en el caso de especies en las que sea relevante describir las caracter&iacute;sticas del suelo debido a su biolog&iacute;a, se&ntilde;alarlas en un p&aacute;rrafo (p. ej., nivel de humedad, profundidad, clasificaci&oacute;n del suelo dependiendo del porcentaje de materia org&aacute;nica, etc.). Si es posible indicar sobre qu&eacute; tipo de rocas se encuentran y la textura del suelo.">
					<textarea name="addinfotiposuelo" rows="10" cols="50" ><?php echo $Uaddinfotiposuelo;?></textarea>
					</td>
				</tr>				
				<tr id="f14" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300"><b>30. Geoforma:</b> </td>
					<td width="360">
						<?php generaGeoforma($Ugeoforma); ?>
					</td>
				</tr>
				<tr id="f15" style="display:<?php if($Utipoambiente!="terrestre" && $Utipoambiente!="") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b> </td>
					<td width="360" title="Informaci&oacute;n adicional sobre la forma del relieve.">
					<textarea name="addinfogeoforma" rows="10" cols="50" ><?php echo $Uaddinfogeoforma;?></textarea>
					</td>
				</tr>
				<tr id="f16" style="display:<?php if($Utipoambiente=="terrestre") echo "none"; ?>">
					<td width="300"><b>31. Tipo de h&aacute;bitat:</b> </td>
					<td width="360">
						<?php generaAcuatico($Uhabitatacuatico); ?>
					</td>
				</tr>
				<tr id="f17" style="display:<?php if($Utipoambiente=="terrestre") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b> </td>
					<td width="360" title="Hacer una breve descripci&oacute;n del lugar se&ntilde;alando las caracter&iacute;sticas ambientales en donde se desarrolla la especie, incluir el tipo de vegetaci&oacute;n acu&aacute;tica, sustrato, velocidad de la corriente, etc.">
					<textarea name="addinfohabitatacuatico" rows="10" cols="50" ><?php echo $Uaddinfohabitatacuatico;?></textarea>
					</td>
				</tr>				
				<tr id="f18" style="display:<?php if($Utipoambiente=="terrestre") echo "none"; ?>">
					<td width="300"><b>32. Caracterist&iacute;cas del agua</b> </td>
					<td width="360"></td>
				</tr>
				<tr id="f19" style="display:<?php if($Utipoambiente=="terrestre") echo "none"; ?>">
					<td width="300"><b>a. Salinidad:</b> </td>
					<td width="360"><input type="text" name="salinidad" value="<?php echo $Usalinidad; ?>" placeholder="..." title="En porcentaje (%), partes por mil (ppt, &#8240;), gramos por litro (g/L) o unidades pr&aacute;cticas de salinidad (ups, psu). Especificar unidades."><br /></td>
				</tr>
				<tr id="f20" style="display:<?php if($Utipoambiente=="terrestre") echo "none"; ?>">
					<td width="300"><b>b. Ox&iacute;geno disuelto:</b> </td>
					<td width="360"><input type="text" name="oxigeno" id="oxigeno" value="<?php echo $Uoxigeno; ?>" placeholder="..." title="En miligramos por litro (mg/L)."><br /></td>
					<script type = "text/javascript">
						var f9 = new LiveValidation('oxigeno');
						f9.add( Validate.Numericality );
					</script>
				</tr>
				<tr id="f21" style="display:<?php if($Utipoambiente=="terrestre") echo "none"; ?>">
					<td width="300"><b>c. pH:</b> </td>
					<td width="360"><input type="text" name="ph" id="ph" value="<?php echo $Uph; ?>" placeholder="..." title="Indicar con valor num&eacute;rico (p. ej., pH: 6.5)."><br /></td>
					<script type = "text/javascript">
						var f9 = new LiveValidation('ph');
						f9.add( Validate.Numericality );
					</script>
				</tr>
				<tr id="f22" style="display:<?php if($Utipoambiente=="terrestre") echo "none"; ?>">
					<td width="300"><b>d. Temperatura:</b> </td>
					<td width="360"><input type="text" name="tempagua" id="tempagua" value="<?php echo $Utempagua; ?>" placeholder="..." title="En grados cent&iacute;grados (&#176;C)."><br /></td>
					<script type = "text/javascript">
						var f9 = new LiveValidation('tempagua');
						f9.add( Validate.Numericality );
					</script>
				</tr>
				<tr id="f23" style="display:<?php if($Utipoambiente=="terrestre") echo "none"; ?>">
					<td width="300"><b>e. Corrientes:</b> </td>
					<td width="360"><input type="text" value="<?php echo $Ucorrientes; ?>"  name="corrientes" placeholder="..." title="Indicar cu&aacute;l es el sistema general de circulaci&oacute;n horizontal del agua en el mar que est&aacute; relacionado con el h&aacute;bitat de la especie."><br /></td>
				</tr>
				<tr id="f24" style="display:<?php if($Utipoambiente=="terrestre") echo "none"; ?>">
					<td width="300"><b>33. Rango de altitud:</b> </td>
					<td width="360"><input type="text" name="rangoaltitud" id="rangoaltitud" value="<?php echo $Urangoaltitud; ?>" placeholder="..." title="En msnm."><br /></td>
					<script type = "text/javascript">
						var f9 = new LiveValidation('rangoaltitud');
						f9.add( Validate.Numericality );
					</script>
				</tr>
				<tr id="f25" style="display:<?php if($Utipoambiente=="terrestre") echo "none"; ?>">
					<td width="300"><b>34. Rango de profundidad:</b> </td>
					<td width="360"><input type="text" name="rangoprofundidad" id="rangoprofundidad" value="<?php echo $Urangoprofundidad; ?>" placeholder="..." title="En metros (m)."><br /></td>
					<script type = "text/javascript">
						var f9 = new LiveValidation('rangoprofundidad');
						f9.add( Validate.Numericality );
					</script>
				</tr>
				<tr id="f26" style="display:<?php if($Utipoambiente=="terrestre") echo "none"; ?>">
					<td width="300"><b>35. Amplitud de mareas:</b> </td>
					<td width="360"><input type="text" name="mareas" value="<?php echo $Umareas; ?>" placeholder="..." title="En metros (m)."><br /></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend><strong><h3>IV. Biolog&iacute;a de la especie</h3></strong></legend>
			<table width="660">	
				<tr>
					<td width="300" valign="top"><b>36. Uso del h&aacute;bitat:</b></td>
					<td width="360" title="Hacer una breve descripci&oacute;n del uso de los recursos f&iacute;sicos y biol&oacute;gicos del h&aacute;bitat, indicando las &aacute;reas que seleccionan para alimentarse, 
					resguardarse, cortejar, etc.- Para plantas, indicar si son de h&aacute;bito ep&iacute;fito, rup&iacute;cola, par&aacute;sitas, trepadoras, etc.">
					<textarea name="usohabitat" rows="10" cols="50" ><?php echo $Uusohabitat;?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>37. Alimentaci&oacute;n:</b> </td>
					<td width="360">
						<?php generaAlimentacion($Ualimentacion); ?>
					</td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Describir en un p&aacute;rrafo la principal fuente alimenticia, y si se tienen los datos, otras fuentes de alimentaci&oacute;n.">
					<textarea name="addinfoalimenta" rows="10" cols="50" ><?php echo $Uaddinfoalimenta;?></textarea>
					</td>
				</tr>
				<tr>
					<td width="300"><b>38. Estrategia tr&oacute;fica:</b> </td>
					<td width="360">
						<?php generaEstrategiaTrofica($Uestrategiatrofica); ?>
					</td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Describir en un p&aacute;rrafo la estrategia tr&oacute;fica utilizada.">
					<textarea name="addinfoestrofica" rows="10" cols="50" ><?php echo $Uaddinfoestrofica;?></textarea>
					</td>
				</tr>
				<tr>
					<td width="300"><b>39. Conducta</b></td>
					<td width="360"></td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>a. Conducta:</b></td>
					<td width="360" title="Indicar en un p&aacute;rrafo las principales caracter&iacute;sticas conductuales de la especie.">
					<textarea name="conducta" rows="10" cols="50" ><?php echo $Uconducta;?></textarea>
					</td>
				</tr>
				<tr>
					<td width="300"><b>b. Migraci&oacute;n:</b> </td>
					<td width="360">
						<select class="con_estilos" name="migracion">
							<option value="0" <?php if($Umigracion=="0") echo 'selected'; ?> > seleccionar >></option>
							<option value="Residente" <?php if($Umigracion=="Residente") echo 'selected'; ?> > Residente</option>
							<option value="Migratoria" <?php if($Umigracion=="Migratoria") echo 'selected'; ?> > Migratoria</option>
							
						</select>
					</td>
				</tr>
				<tr>
					<td width="300"><b>b.1. Tipo de migraci&oacute;n:</b> </td>
					<td width="360">
						<select class="con_estilos" name="tipomigracion">
							<option value="0" <?php if($Utipomigracion=="0") echo 'selected'; ?> > Selecionar >></option>
							<option value="Latitudinal" <?php if($Utipomigracion=="Latitudinal") echo 'selected'; ?> > Latitudinal</option>
							<option value="Longitudinal" <?php if($Utipomigracion=="Longitudinal") echo 'selected'; ?> > Longitudinal</option>
							<option value="Altitudinal" <?php if($Utipomigracion=="Altitudinal") echo 'selected'; ?> > Altitudinal</option>
							<option value="Vertical en columnas de agua" <?php if($Utipomigracion=="Vertical en columnas de agua") echo 'selected'; ?> > Vertical en columnas de agua</option>
							<option value="Migrante local" <?php if($Utipomigracion=="Migrante local") echo 'selected'; ?> > Migrante local</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>c. H&aacute;bito:</b> </td>
					<td width="360">
						<?php generaHabito($Uhabito); ?>
						<input type="checkbox" name="habitock1" value="diurna" <?php if($Uhabitock1=="diurna") echo 'checked'; ?> /> <b>Diurna</b>
						<input type="checkbox" name="habitock2" value="nocturna" <?php if($Uhabitock2=="nocturna") echo 'checked'; ?> /> <b>Nocturna</b>
					</td>
				</tr>
				<tr>
					<td width="300"><b>d. Hibernaci&oacute;n:</b></td>
					<td width="300"><input type="radio" name="hibernacion" value="si" <?php if($Uhibernacion=="si") echo 'checked'; ?> /> <b>Si</b>
					<input type="radio" name="hibernacion" value="no" <?php if($Uhibernacion=="no") echo 'checked'; ?> /> <b>No</b></td>
				</tr>
				<tr>
					<td width="300"><b>e. Territorialidad:</b></td>
					<td width="300"><input type="radio" name="terri" value="si" <?php if($Uterri=="si") echo 'checked'; ?> /> <b>Si</b>
					<input type="radio" name="terri" value="no" <?php if($Uterri=="no") echo 'checked'; ?> /> <b>No</b></td>
				</tr>
				<tr>
					<td width="300"><b>f. &Aacute;mbito hogare&ntilde;o:</b> </td>
					<td width="300" title="Indicar el &aacute;rea utilizada por los individuos de la especie"><textarea name="ambitohogar" rows="10" cols="50" ><?php echo $Uambitohogar; ?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>g. Tama&ntilde;o m&iacute;nimo del &aacute;rea requerida para la permanencia de la especie:</b> </td>
					<td width="300" title="Indicar el &aacute;rea m&iacute;nima (ha, km2)"><textarea name="tamarea" rows="10" cols="50" ><?php echo $Utamarea; ?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>40. Reproducci&oacute;n </b></td>
					<td width="360"></td>
				</tr>
				<tr>
					<td><input type="radio" name="tiporep" value="animal" onclick="oculta(0)" <?php if($Utiporep=="animal") echo 'checked'; elseif($Opc=="Mod" && $Utiporep=="veget") echo "disabled";  ?> /> <b>A. Reproducci&oacute;n animal</b></td>
					<td><input type="radio" name="tiporep" value="veget" onclick="oculta(1)" <?php if($Utiporep=="veget") echo 'checked'; elseif($Opc=="Mod" && $Utiporep=="animal") echo "disabled";?> /> <b>B. Reproducci&oacute;n vegetal</b></td>
				</tr>
				<tr id="a1" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300" valign="top"><b>a. Reproducci&oacute;n:</b></td>
					<td width="360" title="Indicar en un p&aacute;rrafo las particularidades de reproducci&oacute;n de la especie.">
					<textarea name="reproanimal" rows="10" cols="50" ><?php echo $Ureproanimal;?></textarea>
					</td>
				</tr>
				<tr id="a2" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300"><b>b. Dimorfismo sexual</b></td>
					<td width="300"></td>
				</tr>
				<tr id="a3" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300"><b>a)</b></td>
					<td width="300"><input type="radio" name="dimorfismo" value="si" <?php if($Udimorfismo=="si") echo 'checked'; ?> /> <b>Si</b>
					<input type="radio" name="dimorfismo" value="no" <?php if($Udimorfismo=="no") echo 'checked'; ?> /> <b>No</b></td>
				</tr>
				<tr id="a4" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Describir en un p&aacute;rrafo el dimorfismo sexual">
					<textarea name="addinfodimorfismo" rows="10" cols="50" ><?php echo $Uaddinfodimorfismo;?></textarea>
					</td>
				</tr>
				<tr id="a5" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300"><b>b) Longitud machos / hembras:</b> </td>
					<td width="300" title="Indicar en cm."><textarea name="longitudmh" rows="10" cols="50" ><?php echo $Ulongitudmh ?></textarea></td>
				</tr>
				<tr id="a6" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300"><b>c) Peso corporal machos / hembras:</b></td>
					<td width="300" title="Indicar en g."><textarea name="pesomh" rows="10" cols="50" ><?php echo $Upesomh ?></textarea></td>
				</tr>
				<tr id="a7" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300"><b>c. Sistemas de apareamiento:</b> </td>
					<td width="360">
						<select class="con_estilos" name="sistapareamiento">
							<option value="0" <?php if($Usistapareamiento=="0") echo 'selected'; ?> > Seleccionar >></option>
							<option value="Monogamia" <?php if($Usistapareamiento=="Monogamia") echo 'selected'; ?> > Monogamia</option>
							<option value="Poliandria" <?php if($Usistapareamiento=="Poliandria") echo 'selected'; ?> > Poliandria</option>
							<option value="Poliginia" <?php if($Usistapareamiento=="Poliginia") echo 'selected'; ?> > Poliginia</option>
							<option value="Otro" <?php if($Usistapareamiento=="Otro") echo 'selected'; ?> > Otro</option>
						</select>
					</td>
				</tr>
				<tr id="a8" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Breve descripci&oacute;n del sistema de apareamiento.">
					<textarea name="addinfosistaparea" rows="10" cols="50" ><?php echo $Uaddinfosistaparea;?></textarea>
					</td>
				</tr>				
				<tr id="a9" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300"><b>d. Tipo de reproducci&oacute;n:</b> </td>
					<td width="360">
						<select class="con_estilos" name="tiporeproduccion">
							<option value="0" <?php if($Utiporeproduccion=="0") echo "selected"; ?> > Seleccionar >></option>
							<option value="Iter&oacute;paros" <?php if(substr ($Utiporeproduccion,0,3)=="Ite") echo "selected"; ?> > Iter&oacute;paros</option>
							<option value="Sem&eacute;lparos" <?php if(substr ($Utiporeproduccion,0,3)=="Sem") echo "selected"; ?> > Sem&eacute;lparos</option>							
						</select>
					</td>
				</tr>
				<tr id="a10" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre el tipo de reproducci&oacute;n.">
					<textarea name="addinfotiporep" rows="10" cols="50" ><?php echo $Uaddinfotiporep;?></textarea>
					</td>
				</tr>
				<tr id="a11" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300"><b>e. Tipo de fecundaci&oacute;n:</b> </td>
					<td width="360">
						<select class="con_estilos" name="tipofecundacion">
							<option value="0" <?php if($Utipofecundacion=="0") echo "selected"; ?> > Seleccinar >></option>
							<option value="Interna" <?php if($Utipofecundacion=="Interna") echo "selected"; ?> > Interna</option>
							<option value="Externa" <?php if($Utipofecundacion=="Externa") echo "selected"; ?> > Externa</option>
						</select>
					</td>
				</tr>
				<tr id="a12" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre el tipo de fecundaci&oacute;n.">
					<textarea name="addinfotipofec" rows="10" cols="50" ><?php echo $Uaddinfotipofec;?></textarea>
					</td>
				</tr>
				<tr id="a13" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300"><b>f. Edad o talla de la primera reproducci&oacute;n:</b></td>
					<td width="360"><input type="text" name="edadtalla" value="<?php echo $Uedadtalla ?>" placeholder="..." title="Indicar el par&aacute;metro y la unidad para especificar la edad o la talla (p. ej., 7 meses; 180 mm longitud patr&oacute;n)."><br /></td>
				</tr>
				<tr id="a14" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300"><b>g. Duraci&oacute;n de vida reproductiva:</b></td>
					<td width="360"><input type="text" name="duracionvida" value="<?php echo $Uduracionvida ?>" placeholder="..." title="Indicar el per&iacute;odo en lapsos de d&iacute;as, meses o a&ntilde;os, seg&uacute;n sea el caso."/></td>
				</tr>
				<tr id="a15" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300"><b>h. Epoca del a&ntilde;o y frecuencia de apareamiento:</b></td>
					<td width="360" title="Indicar la &eacute;poca con el nombre del o los meses en los que ocurra. Se&ntilde;alar la frecuencia indicando las veces que ocurre en un per&iacute;odo de tiempo espec&iacute;fico.">
					<textarea name="epoca" rows="10" cols="50" ><?php echo $Uepoca;?></textarea>
					</td>
				</tr>
				<tr id="a16" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300"><b>i. Sitios de anidaci&oacute;n o de crianza:</b> </td>
					<td width="360">
						<select class="con_estilos" name="sitioanidacion">
							<option value="0" <?php if($Usitioanidacion=="0") echo "selected"; ?> > Seleccionar >></option>
							<option value="&Aacute;rboles" <?php if($Usitioanidacion!="0" && $Usitioanidacion!="") echo "selected"; ?> > &Aacute;rboles</option>
							<option value="Hoyos" <?php if($Usitioanidacion=="Hoyos") echo "selected"; ?> > Hoyos</option>
							<option value="Madrigueras" <?php if($Usitioanidacion=="Madrigueras") echo "selected"; ?> > Madrigueras</option>
							<option value="Paneles de insectos" <?php if($Usitioanidacion=="Paneles de insectos") echo "selected"; ?> > Paneles de insectos</option>
							<option value="Piedras" <?php if($Usitioanidacion=="Piedras") echo "selected"; ?> > Piedras</option>
							<option value="Troncos" <?php if($Usitioanidacion=="Troncos") echo "selected"; ?> > Troncos</option>
							<option value="Suelo" <?php if($Usitioanidacion=="Suelo") echo "selected"; ?> > Suelo</option>
							<option value="Acantilados" <?php if($Usitioanidacion=="Acantilados") echo "selected"; ?> > Acantilados</option>
						</select>
					</td>
				</tr>
				<tr id="a17" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360"><input type="text" name="addinfocrianza" value="<?php echo $Uaddinfocrianza; ?>" placeholder="..." title="Se&ntilde;alar los sitios donde depositan sus huevos o tienen a sus cr&iacute;as, p. ej., troncos, suelo, piedras, etc."/></td>
				</tr>
				<tr id="a18" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300" valign="top"><b>j. N&uacute;mero de huevos o crias:</b></td>
					<td width="360" title="Especificar el tama&ntilde;o de la puesta o n&uacute;mero de cr&iacute;as por  cohorte.">
					<textarea name="nohuevos" rows="10" cols="50" ><?php echo $Unohuevos;?></textarea>
					</td>
				</tr>
				<tr id="a19" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300"><b>k. Cuidado parental:</b> </td>
					<td width="360">
						<input type="radio" name="parental" value="si" onClick="mostrarOcultar3(1);" <?php if($Uparental=="si") echo 'checked'; ?> /> <b>Si</b>
						<input type="radio" name="parental" value="no" onClick="mostrarOcultar3(0);" <?php if($Uparental=="no") echo 'checked'; ?> /> <b>No</b>
						<select class="con_estilos" name="cuidadoparental" id="cuidadoparental" <?php if($Uparental=="no") echo 'disabled'; ?> >
							<option value="0" <?php if($Ucuidadoparental=="0") echo 'selected'; ?>> Seleccionar >></option>
							<option value="hembra" <?php if($Ucuidadoparental=="hembra") echo 'selected'; ?>> Hembra</option>
							<option value="macho" <?php if($Ucuidadoparental=="macho") echo 'selected'; ?>> Macho</option>
							<option value="ambos" <?php if($Ucuidadoparental=="ambos") echo 'selected'; ?>> Ambos</option>
						</select>
					</td>
				</tr>
				<tr id="a20" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre cuidado parental">
					<textarea name="addinfoparental" rows="10" cols="50" ><?php echo $Uaddinfoparental;?></textarea>
					</td>
				</tr>
				<tr id="a21" style="display:<?php if($Utiporep=="veget") echo "none"; ?>">
					<td width="300" valign="top"><b>Tiempo del cuidado parental:</b></td>
					<td width="360" title="Indicar tiempo y fracuencia del cuidado parental">
					<textarea name="tiempoparental" rows="10" cols="50" ><?php echo $Utiempoparental;?></textarea>
					</td>
				</tr>
				<!--tr>
					<td width="300"><b>41. Reproducci&oacute;n vegetal</b></td>
					<td width="360"></td>
				</tr-->
				<tr id="v1" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300" valign="top"><b>a. Reproducci&oacute;n:</b></td>
					<td width="360" title="A&ntilde;adir un peque&ntilde;o p&aacute;rrafo en el que se haga una descripci&oacute;n general de las principales caracter&iacute;sticas reproductivas de la especie">
					<textarea name="reprovegetal" rows="10" cols="50" ><?php echo $Ureprovegetal;?></textarea>
					</td>
				</tr>
				<tr id="v2" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>b. Arreglo espacial &oacute;rganos:</b> </td>
					<td width="360">
						<select class="con_estilos" name="arregloespacial">
							<option value="0" <?php if($Uarregloespacial=="0") echo 'selected' ?> > Seleccionar >></option>
							<option value="Monoicos" <?php if($Uarregloespacial=="Monoicos") echo 'selected' ?> > Monoicos</option>
							<option value="Dioicos" <?php if($Uarregloespacial=="Dioicos") echo 'selected' ?> > Dioicos</option>
							<option value="Androdioicos" <?php if($Uarregloespacial=="Androdioicos") echo 'selected' ?> > Androdioicos</option>
							<option value="Ginodioicos" <?php if($Uarregloespacial=="Ginodioicos") echo 'selected' ?> > Ginodioicos</option>
							<option value="Poligamodioicas" <?php if($Uarregloespacial=="Poligamodioicas") echo 'selected' ?> > Poligamodioicas</option>
						</select>
					</td>
				</tr>
				<tr id="v3" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre los &oacute;rganos reproductores.">
					<textarea name="addinfoarresp" rows="10" cols="50" ><?php echo $Uaddinfoarresp;?></textarea>
					</td>
				</tr>
				<tr id="v4" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>c. Aislamiento temporal o espacial de los &oacute;rganos reproductores:</b> </td>
					<td width="360">
						<select class="con_estilos" name="aislamientoespacial">
							<option value="0" <?php if($Uaislamientoespacial=="0") echo 'selected' ?> > Seleccionar >></option>
							<option value="Dicogamia" <?php if($Uaislamientoespacial=="Dicogamia") echo 'selected' ?> > Dicogamia</option>
							<option value="Protandria" <?php if($Uaislamientoespacial=="Protandria") echo 'selected' ?> > Protandria</option>
							<option value="Protoginia" <?php if($Uaislamientoespacial=="Protoginia") echo 'selected' ?> > Protoginia</option>
							<option value="Hercogamia" <?php if($Uaislamientoespacial=="Hercogamia") echo 'selected' ?> > Hercogamia</option>
						</select>
					</td>
				</tr>
				<tr id="v5" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional."><textarea name="addinfoATE" rows="10" cols="50" ><?php echo $UaddinfoATE;?></textarea></td>
				</tr>
				<tr id="v6" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>d. Sistemas reproductivos asexuales:</b> </td>
					<td width="360">
						<select class="con_estilos" name="sistemasasexuales">
							<option value="0" <?php if($Usistemasasexuales=="0") echo 'selected' ?> > Seleccionar >></option>
							<option value="Clonaci&oacute;n" <?php if(substr ($Usistemasasexuales,0,3)=="Clo") echo "selected"; ?> > Clonaci&oacute;n</option>
							<option value="Estolones" <?php if($Usistemasasexuales=="Estolones") echo 'selected' ?> > Estolones</option>
							<option value="Hijuelos" <?php if($Usistemasasexuales=="Hijuelos") echo 'selected' ?> > Hijuelos</option>
							<option value="Apomixis" <?php if($Usistemasasexuales=="Apomixis") echo 'selected' ?> > Apomixis</option>
							<option value="Partenog&eacute;nesis" <?php if(substr ($Usistemasasexuales,0,3)=="Par") echo "selected"; ?> > Partenog&eacute;nesis</option>
						</select>
					</td>
				</tr>
				<tr id="v7" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Breve descripci&oacute;n sobre la reproducci&oacute;n asexual.">
					<textarea name="addinfosistrepro" rows="10" cols="50" ><?php echo $Uaddinfosistrepro;?></textarea>
					</td>
				</tr>
				<tr id="v8" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>e. Tipo de fecuandaci&oacute;n:</b> </td>
					<td width="360">
						<select class="con_estilos" name="tipofecveg">
							<option value="0" <?php if($Utipofecveg=="0") echo 'selected' ?> > Seleccionar >></option>
							<option value="Fecundaci&oacute;n cruzada" <?php if(substr ($Utipofecveg,0,3)=="Fec") echo "selected"; ?> > Fecundaci&oacute;n cruzada </option>
							<option value="Autopolinizaci&oacute;n" <?php if(substr ($Utipofecveg,0,3)=="Aut") echo "selected"; ?> > Autopolinizaci&oacute;n </option>
						</select>
					</td>
				</tr>
				<tr id="v9" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre el tipo de fecundaci&oacute;n.">
					<textarea name="addinfofecveg" rows="10" cols="50" ><?php echo $Uaddinfofecveg;?></textarea>
					</td>
				</tr>
				<tr id="v10" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>f. Agentes de polinizaci&oacute;n:</b> </td>
					<td width="360">
						<select class="con_estilos" name="agentespolinizacion">
							<option value="0" <?php if($Uagentespolinizacion=="0") echo 'selected' ?> > Seleccionar >></option>
							<option value="Viento" <?php if($Uagentespolinizacion=="Viento") echo 'selected' ?> > Viento</option>
							<option value="Agua" <?php if($Uagentespolinizacion=="Agua") echo 'selected' ?> > Agua</option>
							<option value="Animales" <?php if($Uagentespolinizacion=="Animales") echo 'selected' ?> > Animales</option>
						</select>
					</td>
				</tr>
				<tr id="v11" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre la polinizaci&oacute;n.">
					<textarea name="addinfoAP" rows="10" cols="50" ><?php echo $UaddinfoAP;?></textarea>
					</td>
				</tr>
				<tr id="v12" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>g. Floraci&oacute;n:</b></td>
					<td width="360"></td>
				</tr>
				<tr id="v13" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>a) Per&iacute;odo de floraci&oacute;n:</b> </td>
					<td width="360">
						<select class="con_estilos" name="floracion">
							<option value="0" <?php if($Ufloracion=="0") echo 'selected' ?> > Seleccionar >></option>
							<option value="Diurno" <?php if($Ufloracion=="Diurno") echo 'selected' ?> > Diurno</option>
							<option value="Crepuscular" <?php if($Ufloracion=="Crepuscular") echo 'selected' ?> > Crepuscular</option>
							<option value="Nocturno" <?php if($Ufloracion=="Nocturno") echo 'selected' ?> > Nocturno</option>
						</select>
					</td>
				</tr>
				<tr id="v14" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre el per&iacute;odo de floraci&oacute;n.">
					<textarea name="addinfofloracion" rows="10" cols="50" ><?php echo $Uaddinfofloracion;?></textarea>
					</td>
				</tr>
				<tr id="v15" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>b) Tiempo de floraci&oacute;n:</b> </td>
					<td width="360"><input type="text" name="timeflora" value="<?php echo $Utimeflora; ?>" placeholder="..." title="Se&ntilde;alar el tiempo en que las flores permanecen abiertas (horas o d&iacute;as)."><br /></td>
				</tr>
				<tr id="v16" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>c) Tiempo de floraci&oacute;n (mes inicio):</b> </td>
					<td width="360">
						<?php generaMes('inicial','flora',$Umesinicialflora); ?>
					</td>
				</tr>
				<tr id="v17" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>Tiempo de floraci&oacute;n (mes t&eacute;rmino):</b> </td>
					<td width="360">
						<?php generaMes('final','flora', $Umesfinalflora); ?>
					</td>
				</tr>
				<tr id="v18" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>d) Cantidad de n&eacute;ctar:</b> </td>
					<td width="360"><input type="text" name="nectar" id="nectar" value="<?php echo $Unectar; ?>" placeholder="..." title="Cantidad de n&eacute;ctar producido por las flores (ml)"><br /></td>
					<script type = "text/javascript">
						var f9 = new LiveValidation('nectar');
						f9.add( Validate.Numericality );
					</script>
				</tr>
				<tr id="v19" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>e) Cantidad de polen:</b> </td>
					<td width="360"><input type="text" name="polen" value="<?php echo $Upolen; ?>" placeholder="..." title="Cantidad de polen producido por cada antera"><br /></td>
				</tr>
				<tr id="v20" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>h. Frutificaci&oacute;n</b></td>
					<td width="360"></td>
				</tr>
				<tr id="v21" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>a) Tiempo de fructificaci&oacute;n (mes inicio):</b> </td>
					<td width="360">
						<?php generaMes('inicial','fructi',$Umesinicialfructi); ?>
					</td>
				</tr>
				<tr id="v22" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>Tiempo de fructificaci&oacute;n (mes t&eacute;rmino):</b> </td>
					<td width="360">
						<?php generaMes('final','fructi',$Umesfinalfructi); ?>
					</td>
				</tr>
				<tr id="v23" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>b) N&uacute;mero de frutos:</b> </td>
					<td width="360"><input type="text" name="nofrutos" id="nofrutos" value="<?php echo $Unofrutos; ?>" placeholder="..." ><br /></td>
					<script type = "text/javascript">
						var f9 = new LiveValidation('nofrutos');
						f9.add( Validate.Numericality );
					</script>
				</tr>
				<tr id="v24" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>c) Caracter&iacute;sticas del fruto:</b> </td>
					<td width="360">
						<?php generaCaracteristicasfruto($Ucaracfruto); ?>
					</td>
				</tr>
				<tr id="v25" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre las caracter&iacute;sticas del fruto.">
					<textarea name="addinfofruto" rows="10" cols="50" ><?php echo $Uaddinfofruto;?></textarea>
					</td>
				</tr>
				<tr id="v26" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>d) Estrategias de fructificaci&oacute;n:</b> </td>
					<td width="360">
						<select class="con_estilos" name="estfructi">
							<option value="0" <?php if($Uestfructi=="0") echo "selected"; ?> > Seleccionar >></option>
							<option value="Monoc&aacute;rpico" <?php if(substr ($Uestfructi,0,3)=="Mon") echo "selected"; ?> > Monoc&aacute;rpico</option>
							<option value="Polic&aacute;rpico" <?php if(substr ($Uestfructi,0,3)=="Pol") echo "selected"; ?> > Polic&aacute;rpico</option>
						</select>
					</td>
				</tr>
				<tr id="v27" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre las estrategias de fructificaci&oacute;n.">
					<textarea name="addinfoestf" rows="10" cols="50" ><?php echo $Uaddinfoestf;?></textarea>
					</td>
				</tr>
				<tr id="v28" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>i. Semillas</b></td>
					<td width="360"></td>
				</tr>
				<tr id="v29" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300" valign="top"><b>a) N&uacute;mero de semillas por fruto:</b> </td>
					<td width="360" title="Indicar el n&uacute;mero de semillas por fruto y se&ntilde;alar el tama&ntilde;o promedio de las mismas.">
					<textarea name="nosemillas" rows="10" cols="50" ><?php echo $Unosemillas;?></textarea></td>					
				</tr>
				<tr id="v30" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>b) Tama&ntilde;o promedio de las semillas:</b> </td>
					<td width="360"><input type="text" name="tamaniosemillas" value="<?php echo $Utamaniosemillas; ?>" placeholder="..."><br /></td>
				</tr>
				<tr id="v31" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>c) Latencia de semillas:</b> </td>
					<td width="360">
						<?php generaLatenciasemilla($Ulatsemilla); ?>
					</td>
				</tr>
				<tr id="v32" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre latencia de semillas.">
					<textarea name="addinfolat" rows="10" cols="50" ><?php echo $Uaddinfolat;?></textarea>
					</td>
				</tr>
				<tr id="v33" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>d) Tiempo de latencia:</b> </td>
					<td width="360"><input type="text" name="tiempolat" value="<?php echo $Utiempolat;?>" placeholder="..." title="Indicar el tiempo de latencia en d&iacute;as, meses o a&ntilde;os."><br /></td>
				</tr>
				<tr id="v34" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>e) Condiciones de almacenamiento:</b> </td>
					<td width="360"><input type="text"  name="conalmacena" value="<?php echo $Ucondalmacena;?>" placeholder="..." title="Condiciones de temperatura (&#176;C), de humedad (%)y de la luz (%) para su almacenamiento."><br /></td>
				</tr>
				<tr id="v35" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>f) Porcentaje de germinaci&oacute;n:</b> </td>
					<td width="360"><input type="text" name="germinacion" id="germinacion" value="<?php echo $Ugerminacion;?>" placeholder="..."><br /></td>
					<script type = "text/javascript">
						var f9 = new LiveValidation('germinacion');
						f9.add( Validate.Numericality );
					</script>
				</tr>
				<tr id="v36" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300"><b>g) Porcentaje de emergencia de pl&aacute;ntulas:</b> </td>
					<td width="360"><input type="text" name="platulas" id="platulas" value="<?php echo $Uplatulas;?>" placeholder="..."><br /></td>
					<script type = "text/javascript">
						var f9 = new LiveValidation('platulas');
						f9.add( Validate.Numericality );
					</script>
				</tr>
				<tr id="v37" style="display:<?php if($Utiporep=="animal") echo "none"; ?>">
					<td width="300" valign="top"><b>h) Caracter&iacute;sticas t&oacute;xicas:</b></td>
					<td width="360" title="Se&ntilde;alar si poseen caracter&iacute;sticas t&oacute;xicas. ">
					<textarea name="caractoxicas" rows="10" cols="50" ><?php echo $Ucaractoxicas;?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>42. Dispersi&oacute;n</b></td>
					<td width="360"></td>
				</tr>
				<tr>
					<td width="300"><b>a) Tipo de dispersi&oacute;n:</b> </td>
					<td width="360">
						<select class="con_estilos" name="tipodispersion">
							<option value="0" <?php if($Utipodispersion=="0") echo "selected"; ?> > Seleccionar >></option>
							<option value="Zoocoria" <?php if($Utipodispersion=="Zoocoria") echo "selected"; ?> > Zoocoria</option>
							<option value="Anemocoria" <?php if($Utipodispersion=="Anemocoria") echo "selected"; ?>> Anemocoria</option>
							<option value="Hidrocoria" <?php if($Utipodispersion=="Hidrocoria") echo "selected"; ?>> Hidrocoria</option>
							<option value="Barocoria" <?php if($Utipodispersion=="Barocoria") echo "selected"; ?>> Barocoria</option>
							<option value="Autocoria" <?php if($Utipodispersion=="Autocoria") echo "selected"; ?>> Autocoria</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre el tipo de dispersi&oacute;n (indicar prop&oacute;sito de dispersi&oacute;n)">
					<textarea name="addinfodisp" rows="10" cols="50" ><?php echo $Uaddinfodisp;?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>b) Estructura dispersora:</b> </td>
					<td width="360">
						<?php generaEstructuradispersora($Ustructdisp); ?>
					</td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre la estructura dispersora">
					<textarea name="addinfostruct" rows="10" cols="50" ><?php echo $Uaddinfostruct;?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>c) Distancia de dispersi&oacute;n:</b> </td>
					<td width="360"><input type="text" name="distanciadisp" id="distanciadisp" value="<?php echo $Udistanciadisp;?>" placeholder="..." title="Indicar la distancia de dispersi&oacute;n en unidad de medida (m)"><br /></td>
					<script type = "text/javascript">
						var f9 = new LiveValidation('distanciadisp');
						f9.add( Validate.Numericality );
					</script>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend><strong><h3>V. Ecolog&iacute;a y demograf&iacute;a de la especie</h3></strong></legend>
			<table width="660">
				<tr>
					<td width="300" valign="top"><b>43. Tama&ntilde;o poblacional por localidad o regi&oacute;n:</b></td>
					<td width="360" title="Breve descripci&oacute;n sobre el tama&ntilde;o poblacional y las densidades reportadas en distintos lugares. 
					"><textarea name="tamanopoblacion" rows="10" cols="50" ><?php echo $Utamanopoblacion;?></textarea></td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Abundancia de individuos por regi&oacute;n:</b></td>
					<td width="360" ><textarea name="abundancia" rows="10" cols="50" ><?php echo $Uabundancia;?></textarea></td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Densidad (n&uacute;mero de individuos por &aacute;rea):</b></td>
					<td width="360" ><textarea name="densidad" rows="10" cols="50" ><?php echo $Udensidad;?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>Descripci&oacute;n del patr&oacute;n de ocupaci&oacute;n:</b> </td>
					<td width="360">
						<select class="con_estilos" name="patronocupacion">
							<option value="0" <?php if($Upatronocupacion=="0") echo "selected"; ?> > Seleccionar >></option>
							<option value="Agregada" <?php if($Upatronocupacion=="Agregada") echo "selected"; ?>> Agregada</option>
							<option value="Uniforme" <?php if($Upatronocupacion=="Uniforme") echo "selected"; ?> > Uniforme</option>
							<option value="Al azar" <?php if($Upatronocupacion=="Al azar") echo "selected"; ?>> Al azar</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Informaci&oacute;n adicional sobre el patr&oacute;n de ocupaci&oacute;n">
					<textarea name="addinfoocu" rows="10" cols="50" ><?php echo $Uaddinfoocu;?></textarea></td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>44. Parametros poblacionales:</b></td>
					<td width="360" title="Breve descripci&oacute;n de los par&aacute;metros poblacionales, incluyendo proporci&oacute;n de sexos, edades, estructura de tallas, tasa de mortalidad,
					natalidad, fecundidad, supervivencia, tasa de reclutamiento y de crecimiento poblacional. ">
					<textarea name="parapoblacion" rows="10" cols="50" ><?php echo $Uparapoblacion;?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>45. Interacciones:</b> </td>
					<td width="360">
						<?php generaInteracciones($Uinteracciones); ?>
					</td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Redactar en un p&aacute;rrafo la naturaleza de las interacciones intraespec&iacute;ficas y/o interespec&iacute;ficas">
					<textarea name="addinfointer" rows="10" cols="50" ><?php echo $Uaddinfointer;?></textarea></td>
				</tr>	
			</table>
		</fieldset>
		<fieldset>
			<legend><strong><h3>VI. Gen&eacute;tica de la especie</h3></strong></legend>
			<table width="660">
				<tr>
					<td width="300" valign="top"><b>46. Variabilidad gen&eacute;tica:</b></td>
					<td width="360" title="Describir en un p&aacute;rrafo la variabilidad gen&eacute;tica de la poblaci&oacute;n tomando en cuenta la heterocigosidad observada (Ho), 
					la heterocigosidad esperada (He), el tama&ntilde;o efectivo de la poblaci&oacute;n (Ne), la diversidad nucleot&iacute;dica (&#8719;) y la diversidad haplot&iacute;pica (&#94;H).">
					<textarea name="vargenetica" rows="10" cols="50" ><?php echo $Uvargenetica;?></textarea></td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>47. Marcadores gen&eacute;ticos:</b></td>
					<td width="360" title="Indicar el tipo de tejido o muestra, el tipo de marcador y el m&eacute;todo utilizado para obtener la variabilidad gen&eacute;tica de la poblaci&oacute;n.">
					<textarea name="marcgeneticos" rows="10" cols="50" ><?php echo $Umarcgeneticos;?></textarea></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend><strong><h3>VII. Importancia de la especie</h3></strong></legend>
			<table width="660">
				<tr>
					<td width="300"><b>48. Importancia biol&oacute;gica y funci&oacute;n ecol&oacute;gica:</b> </td>
					<td width="360">
						<?php generaFuncionecologica($Ufuncionecologica); ?>
					</td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Describir en un p&aacute;rrafo los beneficios que la especie otorga al ambiente y sus funciones en el ecosistema 
					(p. ej., como control de poblaciones de insectos, como fuente de alimento para otros organismos, etc.).">
					<textarea name="addinfofuneco" rows="10" cols="50" ><?php echo $Uaddinfofuneco;?></textarea></td>
				</tr>	
				<tr>
					<td width="300" valign="top"><b>49. Impotancia ecom&oacute;mica:</b></td>
					<td width="360" title="Describir los beneficios econ&oacute;micos que la especie brinda al ser humano 
					(p. ej., al generar recursos econ&oacute;micos por su comercio, como fuente de alimento, como polinizador, por mencionar algunos).">
					<textarea name="impoeco" rows="10" cols="50" ><?php echo $Uimpoeco;?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>50. Comercio</b> </td>
					<td width="360"></td>
				</tr>
				<tr>
					<td width="300"><b>a) Comercio nacional:</b> </td>
					<td width="360">
						<?php generaComercio('nacional', $Ucomnal); ?>
					</td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Describir el comercio nacional, indicando el origen de los espec&iacute;menes, tipo de productos en el comercio, 
					prop&oacute;sito del comercio y las cantidades (especificando unidades, ej. kg, m3, unidades, etc.)">
					<textarea name="addinfocomnal" rows="10" cols="50" ><?php echo $Uaddinfocomnal;?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>b) Comercio internacional:</b> </td>
					<td width="360">
						<?php generaComercio('inter', $Ucominter); ?>
					</td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Describir el comercio internacional l&iacute;cito, indicando el origen de los espec&iacute;menes, tipo de productos en el comercio, 
					prop&oacute;sito del comercio las cantidades (especificando unidades, p.e. kg, m3, unidades, etc.) y los principales pa&iacute;ses exportadores e importadores. ">
					<textarea name="addinfocominter" rows="10" cols="50" ><?php echo $Uaddinfocominter;?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>Comercio il&iacute;cito nacional:</b> </td>
					<td width="360">
						<input type="radio" name="sncomnal" value="si" <?php if($Usncomnal=="si") echo 'checked'; ?> /> <b>Si</b>
						<input type="radio" name="sncomnal" value="no" <?php if($Usncomnal=="no") echo 'checked'; ?>/> <b>No</b>
					</td>
				</tr>
				<tr>
					<td width="300"><b>Comercio il&iacute;cito internacional:</b> </td>
					<td width="360">
						<input type="radio" name="sncominter" value="si" <?php if($Usncominter=="si") echo 'checked'; ?> /> <b>Si</b>
						<input type="radio" name="sncominter" value="no"  <?php if($Usncominter=="no") echo 'checked'; ?>/> <b>No</b>
					</td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Describir los efectos reales o potenciales del comercio en el manejo y la conservaci&oacute;n de la especie.">
					<textarea name="addinfocom" rows="10" cols="50" ><?php echo $Uaddinfocom;?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>51. Importancia cultural y usos:</b> </td>
					<td width="360">
						<?php generaUsos($Uusos); ?>
					</td>
				</tr>				
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Describir los usos que se le da y ha dado a la especie">
					<textarea name="culturausos" rows="10" cols="50" ><?php echo $Uculturausos;?></textarea></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend><strong><h3>VIII. Estado de conservaci&oacute;n de la especie</h3></strong></legend>
			<table width="660">
				<tr>
					<td width="300"><b>52. Presiones o amenazas sobre la especie:</b> </td>
					<td width="360">
						<?php generaAmenazas($Uamenazas); ?>
					</td>
				</tr>	
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title="Redactar un p&aacute;rrafo donde se describan las presiones o amenazas a las que se encuentra sometida la especie, 
					y cu&aacute;l es el impacto de las actividades humanas sobre la especie. ">
					<textarea name="presiones" rows="10" cols="50" ><?php echo $Upresiones;?></textarea></td>
				</tr>	
				<tr>
					<td width="300" valign="top"><b>53. Situaci&oacute;n del h&aacute;bitat con respecto a las necesidades de la especie:</b></td>
					<td width="360" title="Desarrollar un p&aacute;rrafo en el que se describa la situaci&oacute;n del h&aacute;bitat (extensi&oacute;n, calidad, tendencias etc.) 
					en las principales poblaciones, o sobre aquellas que se encuentran en condiciones cr&iacute;ticas.">
					<textarea name="situacionhabitat" rows="10" cols="50" ><?php echo $Usituacionhabitat;?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>54. Tendencia poblacional:</b> </td>
					<td width="360">
						<select class="con_estilos" name="tendenciapobla">
							<option value="0" <?php if($Utendenciapobla=="0") echo 'selected'; ?> > Seleccionar >></option>
							<option value="Estable" <?php if($Utendenciapobla=="Estable") echo 'selected'; ?> > Estable</option>
							<option value="Aumenta" <?php if($Utendenciapobla=="Aumenta") echo 'selected'; ?> > Aumenta</option>
							<option value="Decrece" <?php if($Utendenciapobla=="Decrece") echo 'selected'; ?> > Decrece</option>
						</select>
					</td>
				</tr>	
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title=" Indicar si la poblaci&oacute;n se encuentra estable, aumenta o decrece, incluyendo, de ser posible, los datos que respaldan esta informaci&oacute;n.">
					<textarea name="tendenciapoblacion" rows="10" cols="50" ><?php echo $Utendenciapoblacion;?></textarea></td>
				</tr>
				<tr>
					<td width="300" Valign="top"><b>55. Estado de conservaci&oacute;n:</b></td>
					<td width="360" title="Hacer una breve descripci&oacute;n de la situaci&oacute;n general de la especie, indicando su grado de conservaci&oacute;n o 
					riesgo de extinci&oacute;n y las principales razones que provocan esto.">
					<textarea name="edoconservacion" rows="10" cols="50" ><?php echo $Uedoconservacion;?></textarea></td>
				</tr>
				<tr>
					<td width="300"><b>56. Manejo y acciones de conservaci&oacute;n</b> </td>
					<td width="360"></td>
				</tr>	
				<tr>
					<td width="300"><b>a) Indicar cualquier acci&oacute;n encaminada al manejo y conservaci&oacute;n de la especie:</b> </td>
					<td width="360">
						<?php generaConservacion($Uconservacion); ?>
					</td>
				</tr>	
				<tr>
					<td width="300" valign="top"><b>Informaci&oacute;n adicional:</b></td>
					<td width="360" title=" Redactar un p&aacute;rrafo breve en el que se indiquen las acciones de manejo y de conservaci&oacute;n a las que se encuentra sometida la especie. ">
					<textarea name="addinfocons" rows="10" cols="50" ><?php echo $Uaddinfocons;?></textarea></td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>b) Indicar si la especie se reproduce y/o es aprovechada bajo los esquemas de UMA, PIMVS u otro similar para especies pesqueras 
					o maderables:</b></td>
					<td width="360" ><textarea name="uma" rows="10" cols="50" ><?php echo $Uuma;?></textarea></td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>c)Si existe la informaci&oacute;n, mencionar origen y n&uacute;mero de ejemplares autorizados para aprovechamiento (a partir de 2002):</b></td>
					<td width="360" ><textarea name="noejem" rows="10" cols="50" ><?php echo $Unoejem;?></textarea></td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>d) Mencionar los estados de la Rep&uacute;blica en los que se encuentra bajo dichos esquemas de manejo:</b></td>
					<td width="360" ><textarea name="uno" rows="10" cols="50" ><?php echo $Uuno;?></textarea></td>
				</tr>
				<tr>
					<td width="300" valign="top"><b>57. Marco legal nacional e internacional:</b></td>
					<td width="360" title="Indicar las principales regulaciones aplicables a la especie (p.e. LGEEPA, LGVS, LGDFS, NOM-059-SEMARNAT-2010, NOM-029-PESC-2006, CITES, ESA, etc.)">
					<textarea name="dos" rows="10" cols="50" ><?php echo $Udos;?></textarea></td>
				</tr>				
			</table>
		</fieldset>
		<fieldset>
			<legend><strong><h3>IX. Diagn&oacute;stico sobre las necesidades de informaci&oacute;n de la especie</h3></strong></legend>
			<table width="660">
				<tr>
					<td width="660" title="A partir de la informaci&oacute;n documentada en la ficha, se&ntilde;alar en un p&aacute;rrafo cu&aacute;les son los aspectos en los 
					que es necesario generar informaci&oacute;n y emitir recomendaciones sobre medidas que permitan un manejo y conservaci&oacute;n adecuados de la especie.">
					<textarea name="tres" rows="10" cols="85" ><?php echo $Utres;?></textarea></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend><strong><h3>XI. Referencias</h3></strong></legend>
			<table width="660">
				<tr>
					<td width="660" title="Toda la informaci&oacute;n vertida en la ficha deber&aacute; ser respaldada con documentos que deber&aacute;n 
					citarse al final de la misma, el formato a seguir es el recomendado por la revista Conservation Biology.">
					<textarea name="cuatro" rows="10" cols="85" ><?php echo $Ucuatro;?></textarea></td>
				</tr>
			</table>
		</fieldset>
		<br/>			
		<INPUT id="enviar" name="enviar" type="submit" value="enviar">
		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script-->
    <script src="chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Elemento no encontrado!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script> 
	</form>
	<?php } ?>
</body>
</html>
