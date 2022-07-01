<?php
class CourseManager{
	private string $username;
	private IReadWritable $persister;
	//private array $courses = ["Peter"=>"35", "Ben"=>"37", "Joe"=>"43"];
	private array $courses = [];

	public function __construct(string $username, IReadWritable $persister){
		$this->username = $username;
		$this->persister = $persister;
	}

	public function getCourses(){
		return $this->persister->getCourses();
	}

	public function addCourse($course){
		array_push($this->courses, $course);
		$this->persister->addCourse($course);
	}

	public function deleteCourse($courseName){
		$index = 0;
		foreach ($this->courses as $key => $value) {
			if ($value->getName() == $courseName) {
				$index = $key;
			}
		}
		unset($this->courses[$index]);
		$this->persister->deleteCourse($courseName);
	}

	public function completeCourse($courseName){
		foreach ($this->courses as $key => $value) {
			if ($value->getName() == $courseName) {
				$value->setStatus(true);
			}
		}
		$this->persister->completeCourse($CourseName);
	}

	public function showUsername(){
		return $this->username;
	}

	public function showcourselist(){
		return $this->courses;
	}

}