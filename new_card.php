<?php require("template/header.php"); ?>
<h2>Create A New Card</h2>
<form action="insertCard.php" method="post">
	<p>Flash Card Title:<input type="text" name="fc_name"></p>
	<p>Flash Card Description:<textarea type="text" name="fc_desc"></textarea></p>
	<input type="submit">
</form>
<?php require("template/footer.php"); ?>