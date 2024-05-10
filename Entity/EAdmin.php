<?php

class EAdmin extends EUser {
    public function __construct(string $email, string $password) {
        parent::__construct($email, $password);
    }
}