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
<table>
	<tr>
		<th>Title</th>
		<th colspan="3">Description</th>
	</tr>
<?php	while($row = $result->fetch_object()){ ?>
	<tr>
		<td><?= $row->flashcard_name ?></td>
		<td><?= $row->flashcard_desc ?></td>
		<td><a href="edit_card.php?id=<?= $row->flashcard_id ?>">Edit</a></td>
		<td><a href="delete_card.php?id=<?= $row->flashcard_id ?>">Delete</a></td>
	</tr>
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
