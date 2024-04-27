<?php

class EAdmin extends EUser {
    private String $adminId;

    public function __construct(string $adminId, string $email, string $password) {
        parent::__construct($email, $password);
        $this->adminId = $adminId;
    }
    
    public function getAdminId(): string {
        return $this->adminId;
    }

    public function setAdminId(string $adminId): void {
        $this->adminId = $adminId;
    }
}