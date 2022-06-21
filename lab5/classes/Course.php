<?php

class Course{
	private string $name;
	private bool $status;

	public function __construct(string $name, bool $status){
		$this->name = $name;
		$this->status = $status;
	}

	public function getName(){
		return $this->name;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function setStatus(){
		$this->status = 0;
	}
}