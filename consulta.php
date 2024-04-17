<?php require_once('Connections/conmonte.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO consulta (Nombres, Apellidos, Consulta) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['Nombres'], "text"),
                       GetSQLValueString($_POST['Apellidos'], "text"),
                       GetSQLValueString($_POST['Consulta'], "text"));

  mysql_select_db($database_conmonte, $conmonte);
  $Result1 = mysql_query($insertSQL, $conmonte) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
body {
	background-color: #CCC;
	background-image: url(img/f6.jpg);
}
#form1 h3 strong {
}
.centro {
	text-align: center;
}
</style>
</head>

<body bgcolor="#0033CC">
  <hr color="red" size=10>
<p><a href="index.php" target="_parent"><img src="img/flecha.gif" width="100" height="100" /></a></p>
<form id="form1" name="form1" method="post" action="">
  <h3 class="centro" style="color:#FFF"><strong>Ingresar su Consulta en poco tiempo la Institucion se encargara de responderle, Gracias por la espera  </strong></h3>
</form>
<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" style="color:#FFF"><h4>Nombres:</h4></td>
      <td><input type="text" name="Nombres" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" style="color:#FFF"><h4>Apellidos:</h4></td>
      <td><input type="text" name="Apellidos" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top" style="color:#FFF"><h4><br />
        Consulta:</h4></td>
      <td><textarea name="Consulta" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td align="center"><input type="submit" value="Insertar Consulta" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form2" />
</form>
<p>&nbsp;</p>
 <hr color="red" size=10>
 <footer>
  <p>&copy; Otras Consulta Comunicarse:</p>
  <ul>
    <li>9176678888</a></li>
    <li><a href="/conectar">Whatsapp</a></li>
    <li><a href="https://web.facebook.com/profile.php?id=100064709483330" target="new">Redes Sociales</a></li>
  </ul>
</footer>
</body>
</html>