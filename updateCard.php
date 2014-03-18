<?php require 'connect.php';

$fc_id = $_POST["fc_id"];
$fc_name = $_POST["fc_name"];
$fc_desc = $_POST["fc_desc"];


$sql = "UPDATE fc_flashcard SET flashcard_name=?, flashcard_desc=? WHERE flashcard_id =?";
$p_stmt = $dbc->prepare($sql);
$p_stmt->bind_param("ssi", $fc_name, $fc_desc, $fc_id);
$status = $p_stmt->execute();
if($status === false){
	trigger_error($p_stmt->error, E_USER_ERROR);
}else {
	echo "Success!!!";
}
printf("%d Row inserted. \n", $p_stmt->affected_rows);
$p_stmt->close();
$dbc->close();
//redirect to newflashcard.php with a success message or error message
?>