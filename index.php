<?php require("template/header.php"); ?>
<h2>Welcome, User. Here are your flashcards.</h2>
<?php require 'connect.php';
	//Display fc_flashcard table
	$result = $dbc->query("SELECT * FROM fc_flashcard");
	if($result){
		echo "<table>";
		while($row = $result->fetch_object()){
			echo "<tr>", "<td>", $row->flashcard_name, "</td>";
			echo "<td>", $row->flashcard_desc, "</td>", "</tr>";
		}
		echo "</table>";
		$result->free();
	} else {
		echo "<h3>", "You don't have any flashcards!", "</h3>";
	}	
		$dbc->close();
?>
<?php require("template/footer.php"); ?>
