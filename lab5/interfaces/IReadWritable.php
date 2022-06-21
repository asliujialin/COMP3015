<?php
interface IReadWriteable{
	public function getCourses();
	public function addCourses(Course $course);
	public function deleteCourses(string $id);
	public function completeCourses(string $id);
}