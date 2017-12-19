<?php
    class usuario{
        public $user;
        public $pass;
        public $email;

        function __construct($user,$pass,$email){
            $this->user=$user;
            $this->pass=$pass;
            $this->email=$email;
        }
    }
?>