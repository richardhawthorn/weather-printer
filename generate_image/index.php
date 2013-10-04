<?
//code to convert my html content (content.php) into a black and white bitmap image, ready for printing

//show all errors, for testing
ini_set('display_errors', '1');
error_reporting(E_ALL);

// The URL to get your HTML
$url = "content.php";
 
// Image folder and name
$imageDir = "/var/www/miniprinter/";
$imageName = "image.bmp";

// Command to execute, this loads an x window, and runs wkhtmltoimage
$command = '/usr/bin/xvfb-run --server-args="-screen 0, 1280x1024x24" /usr/bin/wkhtmltoimage-amd64 --load-error-handling ignore --width 384';

// Putting together the command including the page and image reference
$ex = "$command $url " . $imageDir . $imageName;

// Actually run the code to generate the image
$output = exec($ex);

//make sure the image is readable
exec("chmod 755 ".$imageDir.$imageName);

//use imagemagick to convert it to 2bit black and white, and a maximum width of 384px
exec("convert -quality 100 ".$imageDir.$imageName." -threshold 60% -trim -resize '384x200^' -gravity Center -flop -monochrome -type Bilevel ".$imageDir.$imageName."");

// Prepare header to send the image
header('Content-type: image/x-ms-bmp');

// specify the file to be sent
header('Content-Disposition: attachment; filename="'.$imageName.'"');

// Grb the file and send it
readfile(''.$imageName.'');

?>