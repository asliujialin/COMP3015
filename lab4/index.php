<php
$picture = "lab4/".md5(time().$_FILES["upload_pic"]["name"])."jpeg";
move_uploaded_file($_FILES["upload_pic"]["tmp_name"],$picture);

(new ImageTag('sample'))
  ->delivery(Delivery::format(Format::auto()));

$cloudinary->uploadApi()->upload($picture, [ 
  "eager" => [
    ["width" => 400, "height" => 300, "crop" => "pad"],
    ["width" => 260, "height" => 200, "crop" => "crop", "gravity" => "north"]]]);


