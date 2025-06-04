<?php
function getex($filename) {
    $tere = explode(".", $filename);
	return end($tere);
}
if ($_FILES['upload']) {
    if (($_FILES['upload'] == "none") OR ( empty($_FILES['upload']['name']))) {
        $message = "თქვენ არ მოგინიშნავთ ფაილი";
    } else if ($_FILES['upload']["size"] == 0 OR $_FILES['upload']["size"] > 2050000) {
        $message = "ფაილის ზომა არ შეესაბამება ნორმებს (მაქსიმუმ 2 მეგაბაიტი)";
    } else if (($_FILES['upload']["type"] != "image/jpeg") AND ( $_FILES['upload']["type"] != "image/gif") AND ( $_FILES['upload']["type"] != "image/png")) {
        $message = "დაშვებულია მხოლოდ JPEG,JPG, PNG,GIF გაფართოვების მქონე ფაილების ატვირთვა.";
    } else if (!is_uploaded_file($_FILES['upload']["tmp_name"])) {
        $message = "რაღაც ისე არ გამოვიდა. თავიდან სცადეთ.";
    } else {
        $name = rand(1, 1000) . '-' . md5($_FILES['upload']['name']) . '.' . getex($_FILES['upload']['name']);
        move_uploaded_file($_FILES['upload']['tmp_name'], "photos/content/" . $name);
        $full_path = $site_host . $site_path . '/photos/content/' . $name;
        $message = "ფაილი " . $_FILES['upload']['name'] . " ატვირთულია";
        $size = @getimagesize('photos/content/' . $name);
        if ($size[0] < 50 OR $size[1] < 50) {
            unlink('photos/content/' . $name);
            $message = "ამ ფაილის ატვირთვა ნებადართული არაა!";
            $full_path = "";
        }
    }
    $callback = $_REQUEST['CKEditorFuncNum'];
    echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("' . $callback . '", "' . $full_path . '", "' . $message . '" );</script>';
}
?>