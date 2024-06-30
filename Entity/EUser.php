<?php

/**
 * Represents a user entity.
 */
class EUser{
    
    private String $email;
    private String $password;
    
    /**
     * Constructs a new EUser object.
     *
     * @param string $email The user's email address.
     * @param string $password The user's password.
     */
    public function __construct(string $email, string $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->email = $email;
        $this->password = $hashedPassword;
    }
    
    /**
     * Gets the user's email address.
     *
     * @return string The user's email address.
     */
    public function getId(): string {
        return $this->email;
    }
    
    /**
     * Sets the user's email address.
     *
     * @param string $email The user's email address.
     * @return void
     */
    public function setId(string $email): void {
        $this->email = $email;
    }
    
    /**
     * Gets the user's hashed password.
     *
     * @return string The user's hashed password.
     */
    public function getPassword(): string {
        return $this->password;
    }
    
    /**
     * Sets the user's password and hases it.
     *
     * @param string $password The user's hashed password.
     * @return void
     */
    public function setPassword(string $password): void {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
    }
}