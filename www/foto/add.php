<?php
require __DIR__ . '/models/photo.php';
require __DIR__ . '/functions/file.php';

if (!empty($_POST)) {
	//var_dump($_FILES);
	
	$data = [];
	if (!empty($_POST['title'])) {
		$data['title'] = $_POST['title'];
		//var_dump($data);
	}
	if (!empty($_FILES)) {
		$res = File_upload('image');
		
		//var_dump($res);
		if (false !== $res) {
			//var_dump($data);
			$data['image'] = $res;
		}
	}
	
//	var_dump($data);die;
	if (isset($data['title']) && isset($data['image'])) {
		Photo_insert($data);
		//die;
		header('Location: /../test.local/www/foto/');
		die;
	}
}

include __DIR__ . '/views/add.php';

?>