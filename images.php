<?
if($_POST['file']) {
	$path = $_POST['file'];
}
else {
	$path = $_GET['file'];
}
$type = pathinfo($path, PATHINFO_EXTENSION);
// define widescreen dimensions
$width = 160;
$height = 90;
// load an image
$i = new Imagick($path);
// get the current image dimensions
$geo = $i->getImageGeometry();
// thumbnail the image
$i->ThumbnailImage($width,$height,true);
$output = base64_encode($i->getImage());
echo  'data:image/' . $type . ';base64,' . $output;
?>
