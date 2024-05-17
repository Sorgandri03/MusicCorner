<?php

class EMessage{
    private int $id;
    private string $text;
    private string $sender;
    private string $receiver;
    private DateTime $timestamp;

    public function __construct(string $sender, string $receiver, string $text) {
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
    public function setTimestamp(DateTime $timestamp): void {
        $this->timestamp = $timestamp;
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
    


    /*
    PER ORDINARE MESSAGGI:
    function cmp($a, $b){
            if ($a->getTimestamp() == $b->getTimestamp()) {
                return 0;
            }
            return ($a->getTimestamp() < $b->getTimestamp()) ? -1 : 1;
        }
        usort($messages, "cmp");
        foreach ($messages as $message){
            echo $message->getSender() . " " . $message->getText() . " " . $message->getTimestamp() . "\n";
        }
    */
}
