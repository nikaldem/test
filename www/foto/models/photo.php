<?php

require_once __DIR__ . '/../functions/sql.php';

function Photo_getAll()
{
	$sql = 'SELECT * FROM images';
	return Sql_query($sql);

	/*	return [
		['title' => 'Foto 1', 'path' => '/img/photo1.jpg'],
		['title' => 'Foto 2', 'path' => '/img/photo2.jpg'],
		['title' => 'Foto 3', 'path' => '/img/photo3.jpg'],
	]; */
}

function Photo_insert($data) {
	$sql = "INSERT INTO images (title, path) VALUES ('" . $data['title'] ."', '" . $data['image'] ."')";
	//echo $sql;
	Sql_exec($sql);
}
?>