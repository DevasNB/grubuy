<?php

use LDAP\Result;

    class EditProfileControlers extends SendProfile {

        private $profile_website;
        private $profile_location;
        private $profile_phone;
        private $profile_birthday;
        private $profile_image;
        
        //as variaveis dentro do construct não são as mesmas do private
        public function __construct($profile_website, $profile_location, $profile_phone, $profile_birthday, $profile_image) {
            $this->profile_website = $profile_website;
            $this->profile_location = $profile_location;
            $this->profile_phone = $profile_phone; 
            $this->profile_birthday = $profile_birthday;
            $this->profile_image = $profile_image;
        }

        public function EditUser() {
            $this->setUserEdited($this->profile_website, $this->profile_location, $this->profile_phone, $this->profile_birthday, $this->profile_image);
        }
    }
?>