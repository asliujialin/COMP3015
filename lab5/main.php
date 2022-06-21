<?php
include("./classes/CourseManager.php");
include("./classes/Course.php");
include("./classes/IO/LocalReadWriter.php");
include("./classes/IO/RemoteReadWriter.php");
include("./interfaces/IReadWrittable.php");

$courseApp = new CourseManager("david", new LocalReadWriter());
echo $courseApp->getCourses();