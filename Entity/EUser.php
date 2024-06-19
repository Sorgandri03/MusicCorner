<?php

class EUser{
    private String $email;
    private String $password;
    
    public function __construct(string $email, string $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->email = $email;
        $this->password = $hashedPassword;
    }
    
    public function getId(): string {
        return $this->email;
    }

    public function setId(string $email): void {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
    }

    public function setHashedPassword($hashedPassword)
    {
        $this->password = $hashedPassword;
    }

}