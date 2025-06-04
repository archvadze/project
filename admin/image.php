<? 
// Access the $_FILES global variable for this specific file being uploaded
// and create local PHP variables from the $_FILES array of information
$fileName = $_FILES["img"]["name"]; // The file name
$fileTmpLoc = $_FILES["img"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["img"]["type"]; // The type of file it is
$fileSize = $_FILES["img"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["img"]["error"]; // 0 for false... and 1 for true
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension
// START PHP Image Upload Error Handling --------------------------------------------------
if (!$fileTmpLoc) { // if file not chosen
echo "შეცდომა: აირჩჰიეთ ფაილი ასატვირთად."; exit(); } else if($fileSize > 5242880) { // if file size is larger than 5 Megabytes
echo "შეცდომა: თქვენი ფაილი მეტია ვიდრე 5 მეგაბაიტი."; unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
exit(); } else if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) { // This condition is only if you wish to allow uploading of specific file types
echo "შეცდომა: ფაილი არ შეესაბამება სურათის ფაილის გაფართოვებებს:  .gif, .jpg, or .png."; 
unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
exit(); } else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
echo "შეცდომა: ატვირთვის პროცესში დაფიქსირდა შეცდომა. სცადეთ თავიდან."; exit(); } // END PHP Image Upload Error Handling ----------------------------------------------------
// Place it into your "uploads" folder mow using the move_uploaded_file() function
$moveResult = move_uploaded_file($fileTmpLoc, "photos/pages/".$fileName); // Check to make sure the move result is true before continuing
if ($moveResult != true) { echo "შეცდომა: ფაილი არ აიტვირთა. სცადეთ თავიდან."; 
unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
exit(); } unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
// ---------- Include Universal Image Resizing Function --------
$target_file = "photos/pages/".$fileName; 
$resized_file = "photos/pages/small_".$fileName; 
$wmax = 800; $hmax = 600; 
img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt); // ----------- End Universal Image Resizing Function -----------

?>