<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of Cart
 *
 * @author Shahjalal Shaju
 */
class Cart {
    
    public $items = null;
    public $total_price = 0;
    public $total_qty = 0;
    // check old Cart with Constructor
    
    function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->total_price = $oldCart->total_price;
            $this->total_qty = $oldCart->total_qty;
        }
    }
    
    // Add Item in the Cart 
    public function addCart($item,$id,$qty) {
        $cartItem = ['id'=>$id,'productName'=>$item->product->productName,'qty'=>0,'price'=>$item->product->sellingPriceWithDiscount,'image'=>$item->image,'productSize'=>$item->productSize,'poductColor'=>$item->productColor];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $cartItem = $this->items[$id];
            }
        }
        
        $cartItem['qty'] += $qty;
        $this->total_price += $item->product->sellingPriceWithDiscount * $qty;
        $this->items[$id] = $cartItem;
        $this->total_qty += $qty;
    }
    
    public function RemoveQty($id){
        $item = $this->items[$id];
        $item['qty']--;
        if($item['qty'] ==0)
        {
            unset($this->items[$id]);
        }
        else{
            $this->items[$id] = $item;
        }
        $this->total_price -=$item['price'];
        $this->total_qty--;
    }
}
