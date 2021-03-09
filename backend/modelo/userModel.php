<?php
    class UserModelo {
        private $userNome;
        private $userEmail;
        private $userSenha;

        public function setUserNome($userNome) {
            $this->userNome = $userNome;
        }
        public function getUserNome() {
            return $this->userNome;
        }

        public function setUserEmail($userEmail) {
            $this->userEmail = $userEmail;
        }
        public function getUserEmail() {
            return $this->userEmail;
        }

        public function setUserSenha($userSenha) {
            $this->userSenha = $userSenha;
        }
        public function getUserSenha() {
            return $this->userSenha;
        }


    }


?>