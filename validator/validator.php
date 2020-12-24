<?php

    class Validator{

        private $data;
        private $error = [];
        private static $fields = ['username', 'email'];

        public function __construct($post_data){
            $this->data = $post_data;
        }

        public function validateForm(){
            foreach(self::$fields as $field){
                if(!array_key_exists($field, $this->data)){
                    trigger_error("$field is missing");
                    return;
                }
            }
            $this->validateUsername();
            $this->validateEmail();
            return $this->error;
        }

        private function validateUsername(){
            $val = trim($this->data['username']);
            if(empty($val)){
                $this->addError('username', 'username cannot be empty');
            } else {
                if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
                    $this->addError('username', 'username must be alphanumeric & 6-12 chars');
                }
            }
        }

        private function validateEmail(){
            $val = trim($this->data['email']);
            if(empty($val)){
                $this->addError('email', 'email cannot be empty');
            } else {
                if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
                    $this->addError('email', 'invalid email format');
                }
            }
        }

        private function addError($key, $val){
            $this->error[$key] = $val;
        }

    }
?>