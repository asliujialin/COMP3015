<?php
class RemoteReadWriter{
	public function getCourses(){
		return "remote courses";
	}

	public function addCourse($course){
		return "remote course added";
	}

	public function deleteCourse($id){
		return "remote course deleted";
	}

	public function completeCourse($id){
		return "remote course completed";
	}
}