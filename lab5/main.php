<?php
include("./interfaces/IReadWritable.php");
include("./classes/CourseManager.php");
include("./classes/Course.php");
include("./classes/IO/LocalReadWriter.php");
include("./classes/IO/RemoteReadWriter.php");


const MAX_FILESIZE = 2000000000;
const FILE_TYPE = "image/png";

$picture = "";

if ($_FILES["background_picture"]["type"] == FILE_TYPE && $_FILES["background_picture"]["size"] <= MAX_FILESIZE){
	$picture = "upload/" .md5(time() . $_FILES["background_picture"]["name"]);
	move_uploaded_file($_FILES["background_picture"]["tmp_name"], $picture);
}else {
	echo "Invalid background picture(png only)";
	exit;
}



//$courseApp = new CourseManager("david", new LocalReadWriter());
//echo $courseApp->getCourses();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .button {
            border: none;
            color: cornflowerblue;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
        }

        #inputText {
            width: 30%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid red;
            border-radius: 10px;
        }
    </style>
    <title>Lab5</title>
    <h1>Course Manager</h1>
</head>
<body>
    <div>
        <img src ="<?php echo $picture;?>" />
    </div>
    <form action="main.php" method="post">
        <input type="text"
               name="newCourse"
               id="inputText"
               placeholder="ex-COMP2525" />

        <input type="submit" class="button" value="ADD" />
    </form>

    <ul>
        <li>
            <input type="checkbox" checked="checked">
            COMP3015
            <button type="button" class="button">DELETE</button>
            <button type="button" class="button">UPDATE</button>
        </li>

        <li>
            <input type="checkbox" checked="checked">
            COMP3015
            <button type="button" class="button">DELETE</button>
            <button type="button" class="button">UPDATE</button>
        </li>

        <li>
            <input type="checkbox" checked="checked">
            COMP3015
            <button type="button" class="button">DELETE</button>
            <button type="button" class="button">UPDATE</button>
        </li>
    </ul>

    <form enctype="multipart/form-data" action="main.php" method="post">
        <input type="file" name="background_picture" />

        <input type="submit" class="button" value="Upload" />
    </form>
</body>
</html>