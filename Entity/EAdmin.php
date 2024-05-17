<?php

class EAdmin extends EUser {
    private $sentMessages = array();
    private $receivedMessages = array();

    public function __construct(string $email, string $password) {
        parent::__construct($email, $password);
    }
    public function getId(): string {
        return parent::getId();
    }
    public function setId(string $id) :void{
        parent::setId($id);
    }
    public function setSentMessages(array $sentMessages): void {
        $this->sentMessages = $sentMessages;
    }
    public function getSentMessages(): array {
        return $this->sentMessages;
    }
    public function setReceivedMessages(array $receivedMessages): void {
        $this->receivedMessages = $receivedMessages;
    }
    public function getReceivedMessages(): array {
        return $this->receivedMessages;
    }
}