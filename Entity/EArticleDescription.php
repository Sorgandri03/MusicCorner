<?php

class EArticleDescription {
    private string $ean;
    private string $name;
    private string $artist;
    private int $format;
    private $stocks = array();
    private $reviews = array();

    public function __construct(string $ean, string $name, string $artist, int $format) {
        $this->ean = $ean;
        $this->name = $name;
        $this->artist = $artist;
        $this->format = $format;
    }
    
    public function getId(): string {
        return $this->ean;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getArtist(): string {
        return $this->artist;
    }

    public function getFormat(): int {
        return $this->format;
    }
    public function getFormatString(): string {
        return Format[$this->format];
    }
    public function setArtist(string $artist) {
        $this->artist = $artist;
    }
    public function setName(string $name) {
        $this->name = $name;
    }

    public function setFormat(int $format) {
        $this->format = $format;
    }
    public function getStocks(): array {
        return $this->stocks;
    }
    public function setStocks(array $stocks) {
        $this->stocks = $stocks;
        usort($this->stocks, "EArticleDescription::cmp");
    }
    public function getLowestPrice(){
        $lowestPrice = 0;
        foreach($this->stocks as $stock){
            if($lowestPrice == 0 || $stock->getPrice() < $lowestPrice){
                $lowestPrice = $stock->getPrice();
            }
        }
        return $lowestPrice;   
    }
    public static function cmp($a, $b) {
        return strcmp($a->getPrice(), $b->getPrice());
    }

    public function getReviews(): array {
        return $this->reviews;
    }

    public function setReviews(array $reviews) {
        $this->reviews = $reviews;
    }

    public function averageRatingInt(): int {
        $sum = 0;
        $count = 0;
        foreach ($this->reviews as $review) {
            $sum += $review->getArticleRating();
            $count++;
        }
        if ($count == 0) {
            return 0;
        }
        return floor($sum / $count);
    }

    public function averageRatingDecimal(): float {
        $sum = 0;
        $count = 0;
        foreach ($this->reviews as $review) {
            $sum += $review->getArticleRating();
            $count++;
        }
        if ($count == 0) {
            return 0;
        }
        return $sum/$count - floor($sum / $count);
    }

    public function fivestars(): int {
        $count = 0;
        foreach ($this->reviews as $review) {
            if ($review->getArticleRating() == 5) {
                $count++;
            }
        }
        return $count;
    }

    public function fourstars(): int {
        $count = 0;
        foreach ($this->reviews as $review) {
            if ($review->getArticleRating() == 4) {
                $count++;
            }
        }
        return $count;
    }

    public function threestars(): int {
        $count = 0;
        foreach ($this->reviews as $review) {
            if ($review->getArticleRating() == 3) {
                $count++;
            }
        }
        return $count;
    }

    public function twostars(): int {
        $count = 0;
        foreach ($this->reviews as $review) {
            if ($review->getArticleRating() == 2) {
                $count++;
            }
        }
        return $count;
    }

    public function onestar(): int {
        $count = 0;
        foreach ($this->reviews as $review) {
            if ($review->getArticleRating() == 1) {
                $count++;
            }
        }
        return $count;
    }

    public function isInStock() :bool {
        if(count($this->stocks) > 0){
            foreach($this->stocks as $stock){
                if($stock->getQuantity() > 0){
                    return true;
                }
            }
        }
        return false;
    }

}