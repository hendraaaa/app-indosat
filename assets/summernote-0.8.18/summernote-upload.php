<?php
//all summernote image file goes here
$fname = "summernote-files";
$foldergambar = "../../$fname";		//referensi file dari file ini 
$urlgambar = "http://localhost/nomnom3/$fname";
$errors = "";

if (!empty($_FILES['file']['name'])) {
	$fileku = $_FILES["file"];
	$f = $fileku["name"];		//nama filenya
	$dotpos = strripos($f, '.');
	$len = strlen($f);
	$name = substr($f, 0, $dotpos);
	$ext = strtolower(substr($f, $dotpos-$len+1));
	$filename = $name."_".rand(10,99).".".$ext;
	$extensions= array("jpeg","jpg","png");
	
	if(!in_array($ext,$extensions))
	 $errors .= "Extensi yang diperbolehkan jpeg atau png. ";
	
	//Kirim pesan error jika ukuran file > 500kB
	$file_size = $fileku['size'];
	if($file_size > 2097152) $errors .= "Ukuran file harus lebih kecil dari 2MB. ";
	
	//Upload file
	
	if(empty($errors)){
		if (!is_dir($foldergambar)) {mkdir($foldergambar, 0777, true);}
		$file = $fileku["tmp_name"];
		$destination = "$foldergambar/$filename";
		if(move_uploaded_file($file, $destination))
			echo "$urlgambar/$filename";//ditangkap oleh summer note sebagai src elemen img
	}
	else {
		echo "Error: $errors";
	}
}
?>