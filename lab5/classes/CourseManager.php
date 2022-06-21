<?php
class CourseManager{
	private string $username;
	private IReadWritable $persister;
	private array $course = [];

	public function __construct(string $username, IReadWritable $persister){
		$this->username = $username;
		$this->persister = $persister;
	}

	public function getCourses(){
		$this->persister->getCourses();
	}

	public function addCourse($course){
		$this->persister->addCourse($course);
	}

	public function deleteCourse($id){
		$this->persister->deleteCourse($id);
	}

	public function completeCourse($id){
		$this->persister->completeCourse($id);
	}
}