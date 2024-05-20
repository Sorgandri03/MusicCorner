<?php

class CPlaceOrders{
    public function addToCart(int $idProduct, int $quantity){
        // Prendo carrello da sessione
        if(FSession::getInstance()->verifyCart()){
            $cart = FSession::getInstance()->retrieveCart();
        }
        else{
            $cart = new ECart();
        }
        
        // Trasformo idProduct in prodotto
        $product = FPersistentManager::getInstance()->retrieveObj('EStock', $idProduct);
        // Aggiungo prodotto al carrello
        $cart->addArticle($product, $quantity);
        // Salvo carrello in sessione
        FSession::getInstance()->saveCart($cart);
        // Decidere quale messaggio stampare a video
    }

}
