<?php
/**
 * The EArticleDescription class represents an article in the MusicCorner application.
 */
class EArticleDescription {
    private string $ean;
    private string $name;
    private string $artist;
    private int $format;
    private $stocks = array();
    private $reviews = array();

   /* Create a new address
    * @param string $ean the ean of the article
    * @param string $name the name of the article
    * @param string $artist the artist of the article
    * @param string $format the format of the article
    * @param string $stocks the list of stocks where the article is present
    * @param string $reviews the list of reviews about the article
    */
    public function __construct(string $ean, string $name, string $artist, int $format) {
        $this->ean = $ean;
        $this->name = $name;
        $this->artist = $artist;
        $this->format = $format;
    }
    
    /**
     * Get the ID of the article.
     * 
     * @return string The ID of the article.
     */
    public function getId(): string {
        return $this->ean;
    }
    
    /**
     * Get the name of the article.
     * 
     * @return string The name of the article.
     */
    public function getName(): string {
        return $this->name;
    }
    
    /**
     * Get the artist of the article.
     * 
     * @return string The artist of the article.
     */
    public function getArtist(): string {
        return $this->artist;
    }
    
    /**
     * Get the format of the article.
     * 
     * @return int The format of the article.
     */
    public function getFormat(): int {
        return $this->format;
    }
    
    /**
     * Get the format string of the article.
     * 
     * @return string The format string of the article.
     */
    public function getFormatString(): string {
        return Format[$this->format];
    }
    
    /**
     * Set the artist of the article.
     * 
     * @param string $artist The artist of the article.
     */
    public function setArtist(string $artist) {
        $this->artist = $artist;
    }
    
    /**
     * Set the name of the article.
     * 
     * @param string $name The name of the article.
     */
    public function setName(string $name) {
        $this->name = $name;
    }
    
    /**
     * Set the format of the article.
     * 
     * @param int $format The format of the article.
     */
    public function setFormat(int $format) {
        $this->format = $format;
    }
    
    /**
     * Get the stocks where is present the article.
     * 
     * @return array The stocks of the article.
     */
    public function getStocks(): array {
        return $this->stocks;
    }
    
    /**
     * Set the stocks of the article.
     * 
     * @param array $stocks The stocks of the article.
     */
    public function setStocks(array $stocks) {
        $this->stocks = $stocks;
        usort($this->stocks, "EArticleDescription::cmp");
    }
    
    /**
     * Get the lowest price of the article.
     * 
     * @return int The lowest price of the article.
     */
    public function getLowestPrice(){
        $lowestPrice = 0;
        foreach($this->stocks as $stock){
            if($stock->getQuantity() == 0){
                continue;
            }
            if($lowestPrice == 0 || $stock->getPrice() < $lowestPrice){
                $lowestPrice = $stock->getPrice();
            }
        }
        return $lowestPrice;   
    }
    
    /**
     * Compare two articles based on their price.
     * 
     * @param mixed $a The first article.
     * @param mixed $b The second article.
     * 
     * @return int The result of the comparison.
     */
    public static function cmp($a, $b) {
        return strcmp($a->getPrice(), $b->getPrice());
    }
    
    /**
     * Get the reviews of the article.
     * 
     * @return array The reviews of the article.
     */
    public function getReviews(): array {
        return $this->reviews;
    }
    
    /**
     * Set the reviews of the article.
     * 
     * @param array $reviews The reviews of the article.
     */
    public function setReviews(array $reviews) {
        $this->reviews = $reviews;
    }
    
    /**
     * Get the average rating of the article as an integer.
     * 
     * @return int The average rating of the article.
     */
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
    
    /**
     * Get the average rating of the article as a decimal.
     * 
     * @return float The average rating of the article.
     */
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
    
    /**
     * Get the number of five-star ratings for the article.
     * 
     * @return int The number of five-star ratings.
     */
    public function fivestars(): int {
        $count = 0;
        foreach ($this->reviews as $review) {
            if ($review->getArticleRating() == 5) {
                $count++;
            }
        }
        return $count;
    }
    
    /**
     * Get the number of four-star ratings for the article.
     * 
     * @return int The number of four-star ratings.
     */
    public function fourstars(): int {
        $count = 0;
        foreach ($this->reviews as $review) {
            if ($review->getArticleRating() == 4) {
                $count++;
            }
        }
        return $count;
    }
    
    /**
     * Get the number of three-star ratings for the article.
     * 
     * @return int The number of three-star ratings.
     */
    public function threestars(): int {
        $count = 0;
        foreach ($this->reviews as $review) {
            if ($review->getArticleRating() == 3) {
                $count++;
            }
        }
        return $count;
    }
    
    /**
     * Get the number of two-star ratings for the article.
     * 
     * @return int The number of two-star ratings.
     */
    public function twostars(): int {
        $count = 0;
        foreach ($this->reviews as $review) {
            if ($review->getArticleRating() == 2) {
                $count++;
            }
        }
        return $count;
    }
    
    /**
     * Get the number of one-star ratings for the article.
     * 
     * @return int The number of one-star ratings.
     */
    public function onestar(): int {
        $count = 0;
        foreach ($this->reviews as $review) {
            if ($review->getArticleRating() == 1) {
                $count++;
            }
        }
        return $count;
    }
    
    /**
     * Check if the article is in stock.
     * 
     * @return bool True if the article is in stock, false otherwise.
     */
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