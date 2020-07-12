<!DOCTYPE html>
<html>
<head>
	<title>Table</title>
	<style type="text/css">
		body{
			background-color: aliceblue;
		}
		.table1{
			font-family: sans-serif;
			color: #232323;
			border-collapse: collapse;
		}
		.table1, th{
			border: 1px solid #999;
			padding: 8px 20px;
		}
	</style>
</head>
<body>
	<center>
		<h1>Suncoffee Account Registration Data</h1>
	<table class="table1">
		<tr bgcolor="cornflowerblue">
			<th>Name</th>
			<th>Birth</th>
			<th>Gender</th>
			<th>Email</th>
			<th>Phone</th>
		</tr>
		<?php
		$fp = fopen("register1.txt", "r");
		?>
		<?php while ($isi = fgets($fp,100)) {
			$pisah = explode("|",$isi);
			?>
			<tr id="b" bgcolor="mintcream">
				<th><?php echo "$pisah[0]";?></th>
				<th><?php echo "$pisah[1]";?></th>
				<th><?php echo "$pisah[2]";?></th>
				<th><?php echo "$pisah[3]"?>;</th>
				<th><?php echo "$pisah[4]";?></th>
			</tr>
		<?php }?>
	</table>
	<br><br>
	<a href="form.php">Back to Regist</a>
	</center>
	<div>
		<?php
		$fp = fopen("register1.txt", "a+");
		fclose($fp);
		?>
	</div>
</body>
</html>
