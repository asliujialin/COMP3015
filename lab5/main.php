<?php
include("./classes/CourseManager.php");
include("./classes/Course.php");
include("./classes/IO/LocalReadWriter.php");
include("./classes/IO/RemoteReadWriter.php");
include("./interfaces/IReadWritable.php");


//class FakeReaderWriter{
//	public function getItems(){
//		return "get items remote";
//	}
//}

$courseApp = new CourseManager("david", new LocalReadWriter());
echo $courseApp->getCourses();
