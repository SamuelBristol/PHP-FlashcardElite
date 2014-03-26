<?php require("template/header.php");
	require 'connect.php';
	$result = $dbc->query("SELECT * FROM fc_flashcard");
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];
	} else {
		$msg = "";
	}
	if($result){
		echo $msg;
?>
<h2>Welcome, User. Here are your flashcards.</h2>
<?php	while($row = $result->fetch_object()){ ?>
	<div class="flashcard">
		<p class="title"><?= $row->flashcard_name ?></p>
		<a class="delete" href="delete_card.php?id=<?= $row->flashcard_id ?>">X</a>
		<hr>
		<p><?= $row->flashcard_desc ?></p>
		<a class="edit" href="edit_card.php?id=<?= $row->flashcard_id ?>">Edit</a>
	</div>
<?php }
			$result->free();
	} else {
?>
		<h3>You don't have any flashcards! <a href="new_card.php">Create a new one</a></h3>
<?php
	}	
		$dbc->close();
?>
</table>
<?php require("template/footer.php"); ?>
