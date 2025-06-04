<?php  
require('config.php');
db_connect();
if($_POST['id']){
$id=(int)$_POST['id'];
        $this_file = getFile($id);
        $delete_file = $_SERVER['DOCUMENT_ROOT']."/photos/files/bear_" . $this_file['filename'];
        if (file_exists($delete_file)){
            unlink($delete_file);
        } 
		$result = mysql_query("DELETE FROM files WHERE id='" . $id . "'");
}
?>