<?php
if(!empty($_FILES)){
	$path = "imgs/" . $_FILES['newfile']['name'];
	if(move_uploaded_file($_FILES['newfile']['tmp_name'], $path)){
		$message = "ok";
	} else {
		$message = "err";
	}
	header("Location: index.php?status=$message");
	die();
}

function checkStatus(){
	$messages = [
		'ok' => 'Файл загружен',
		'err'=> 'Ошибка загрузки'
	];
	if (array_key_exists('status',$_GET)){
		$message = $messages[$_GET['status']];
	} else { 
		$message = '';
	}
	return $message;
}


function printGallery($mydir){
	$result = '';
	$gallery = scandir($mydir);
	$images = array_splice($gallery,2);
	foreach($images as $image){
		$result .= '<a rel="gallery" class="photo" href="imgs/' . $image . '"><img src="imgs/' . $image . '" width="150" height="100" /></a>';
	}
	return $result;
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ImageGallery</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
	<? print checkStatus() ?><br>	
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="newfile" autofocus/>
		<input type="submit" value="Загрузить" />
	</form>
</header>
<main>
<?php print printGallery('imgs')?>
</main>
</body>
</html>