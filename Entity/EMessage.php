<?php

class EMessage{
    private int $id;
    private string $text;
    private string $sender;
    private string $receiver;
    private DateTime $timestamp;

    public function __construct(string $text, string $sender, string $receiver, DateTime $timestamp) {
        $this->text = $text;
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->timestamp = new DateTime();
    }
    public function getId(): int {
        return $this->id;
    }
    public function getText(): string {
        return $this->text;
    }
    public function getSender(): string {
        return $this->sender;
    }
    public function getReceiver(): string {
        return $this->receiver;
    }
    public function getTimestamp(): string {
        return $this->timestamp->format('Y-m-d H:i:s');
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function setText(string $text): void {
        $this->text = $text;
    }
    public function setSender(string $sender): void {
        $this->sender = $sender;
    }
    public function setReceiver(string $receiver): void {
        $this->receiver = $receiver;
    }
    
}
