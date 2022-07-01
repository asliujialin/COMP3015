<?php
class LocalReadWriter implements IReadWritable{
	public function getCourses(){
		return "coursessss";
	}

	public function addCourse($course){
		return "course added";
	}

	public function deleteCourse($courseName){
		return "course deleted";
	}

	public function completeCourse($courseName){
		return "course completed";
	}
}