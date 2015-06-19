<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<table border="1">
		<tr>
			<th>Название</th>
			<th>ФОТО</th>
		</tr>
		<?php foreach ($items as $item) { ?>
		<tr>
			<td><?php echo $item['title']; ?></td>
			<td><img src="<?php echo '/foto/' . $item['path']; ?>" style="max-width: 80px"></td>
		</tr>
		<?php }; ?>
	</table>

<a href="/test.local/www/foto/add.php">Добавить фото</a>
	
</body>
</html>