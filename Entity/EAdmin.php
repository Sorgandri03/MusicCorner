<?php
/**
 * The EAdmin class represents the admin in the MusicCorner application.
 */
class EAdmin extends EUser {
    /**
     * Create a new admin
     * @param string $email the email of the admin
     * @param string $password the password of the admin
     */
    public function __construct(string $email, string $password) {
        parent::__construct($email, $password);
    }

    /**
     * Get the id of the admin
     * @return string the id of the admin
     */
    public function getId(): string {
        return parent::getId();
    }
}