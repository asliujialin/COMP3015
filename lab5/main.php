<?php
include("./interfaces/IReadWritable.php");
include("./classes/CourseManager.php");
include("./classes/Course.php");
include("./classes/IO/LocalReadWriter.php");
include("./classes/IO/RemoteReadWriter.php");


//set background picure in session
session_start();
//session_destroy();
$picture = $_SESSION['currentpic'];
if($_POST["newCourse"]!=null){
    $_SESSION['nameList'][] = $_POST["newCourse"];
}

print_r($_SESSION);
print_r($_POST);
const MAX_FILESIZE = 2000000000;
const FILE_TYPE = "image/png";




$courseApp = new CourseManager("david", new LocalReadWriter());

foreach($_SESSION['nameList'] as $name){
    $newCourse1 = new Course($name, false);
    $courseApp->addCourse($newCourse1);
}


if(!empty($_POST['check'])){
    foreach($_POST['check'] as $selected){
        $courseApp->completeCourse($selected);
    }
}
$array = $courseApp->showcourselist();

//data from json file
//$courses = json_decode(file_get_contents("./data.json", true));
//print_r($courses);

//functions testing
//$courseApp = new CourseManager("david", new LocalReadWriter());
//$newCourse1 = new Course("comp2323", false);
//$newCourse2 = new Course("comp2324", false);
//$newCourse3 = new Course("comp2325", false);
//$courseApp->addCourse($newCourse1);
//$courseApp->addCourse($newCourse2);
//$courseApp->addCourse($newCourse3);
//echo $courseApp->showUsername();
//echo $courseApp->getCourses();
//$array = $courseApp->showcourselist();
//$courseApp->deleteCourse("comp2324");
//$array = $courseApp->showcourselist();
//print_r($array);
//$courseApp->completeCourse("comp2325");
//$array = $courseApp->showcourselist();
//print_r($array);

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
               placeholder="ex-COMP2525"
        />


        <?php
            $counter = 0;
            echo '<ul>';
            foreach($array as $p){
                if ($p->getStatus() == false){
                    echo '<li> 
                        <input type="checkbox" name="check[]" value="'.$p->getName().'">'.
                            $p->getName().
                        '<button type="button" class="button">DELETE</button>
                        <button type="button" class="button">UPDATE</button>
                        </li>';
                    $counter++;
                }else {
                    echo '<li> 
                        <input type="checkbox" checked="true" name="check[]">'.
                            $p->getName().
                        '<button type="button" class="button">DELETE</button>
                        <button type="button" class="button">UPDATE</button>
                        </li>';
                    $counter++;
                }

            }
            echo '</ul>';
        ?>
        <input type="submit" class="button" value="submit" />
    </form>

    

    <form enctype="multipart/form-data" action="setbg.php" method="post">
        <input type="file" name="background_picture" />

        <input type="submit" class="button" value="Upload" />
    </form>



</body>
</html>