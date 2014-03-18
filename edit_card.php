<?php require("template/header.php"); ?>
<h2>Edit A Card</h2>
<form action="updateCard.php" method="post">
<?php require 'connect.php';
	//Display fc_flashcard table
	$sql_stmt = "SELECT * FROM fc_flashcard";
	$result = $dbc->query($sql_stmt);
	if($result){
		while($row = $result->fetch_object()){ 
?>
	<p>Title: <input type="text" name="fc_name" value="<?= $row->flashcard_name ?>" />
	<p>Description: <textarea type="text" name="fc_desc"><?= $row->flashcard_desc ?></textarea>
	<input type="hidden" name="fc_id" value="<?= $row->flashcard_id ?>" />
	<input type="submit" />
<?php }
		$result->free();
	} else {
		echo "<h3>", "You don't have any flashcards!", "</h3>";
	}	
		$dbc->close();
?>
</form>
<?php require("template/footer.php"); ?>