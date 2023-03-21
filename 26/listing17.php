<?php
    class Student
    {
        private $id;
        private $name;
        private $email;

        // Constructor        
        public function __construct($id, $name, $email)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
        }
    }