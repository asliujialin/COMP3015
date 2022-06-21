<?php
class LocalReadWriter implements IReadWritable{
	public function getCourses(){
		return "courses";
	}

	public function addCourse($course){
		return "course added";
	}

	public function deleteCourse($id){
		return "course deleted";
	}

	public function completeCourse($id){
		return "course completed";
	}
}