<?php require 'connect.php';
if($_POST){
	$fc_name = $_POST["fc_name"];
	$fc_desc = $_POST["fc_desc"];
}

$sql = "INSERT INTO fc_flashcard (flashcard_name, flashcard_desc) VALUES (?, ?)";
$p_stmt = $dbc->prepare($sql);
$p_stmt->bind_param("ss", $fc_name, $fc_desc);
$p_stmt->execute();
$p_stmt->close();
$dbc->close();
echo "<br><br>Your query has run successfully!"
//redirect to newflashcard.php with a success message or error message
?>