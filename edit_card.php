<?php require("template/header.php"); ?>
<h2>Edit A Card</h2>
<form action="updateCard.php" method="post">
<?php require 'connect.php';
	$fc_id = $_GET['id'];
	$sql = "SELECT flashcard_name, flashcard_desc FROM fc_flashcard WHERE flashcard_id=?";
	$stmt = $dbc->prepare($sql);
	$stmt->bind_param("i", $fc_id);
	$stmt->execute();
	$stmt->bind_result($fc_name, $fc_desc);
	if($row = $stmt->fetch()){
?>
	<h1>Sup</h1>
	<p>Title: <input type="text" name="fc_name" value="<?= $fc_name ?>" />
	<p>Description: <textarea type="text" name="fc_desc"><?= $fc_desc ?></textarea>
	<input type="hidden" name="fc_id" value="<?= $fc_id ?>" />
	<input type="submit" />
<?php
	}
	$stmt->close();
	$dbc->close();
?>
</form>
<?php require("template/footer.php"); ?>