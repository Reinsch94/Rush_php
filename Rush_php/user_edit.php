<?php

$instance = new User();
		$var = $instance->getUser();
		echo "<table>
		<tr>
		<th>id</th>
		<th>username</th>
		<th>email</th>
		</tr>";


?>
<!DOCTYPE html>
<html>
	<body>
		<form method=post>
			<tr>
			<td> <?= $row['id'] ?></td>
			<td> <?= $row['username'] ?></td>
			<td> <?= $row['email'] ?></td>
			<td> <a href="admin_edit_user.php?id=<?=$row['id']?>">Edit</a></td>
			<td> <a href="admin_delete_user.php?id=<?=$row['id']?>">Delete</a></td>
			</tr>
		</form>
	</body>
</html>
