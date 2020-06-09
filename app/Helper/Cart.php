<?php
namespace App\Helper;

class Cart {

	public $items;


	public function __construct()
	{
		$this->items = session('cart') ? session('cart') : [];
	}


	public function add($data,$price=0,$quantity=1){
		if(isset($this->items[$data['id']]))
			$this->items[$data['id']]['quantity'] += 1;


		else{
			$this->items[$data['id']]=$data;
			$this->items[$data['id']]['quantity']=$quantity;
			$this->items[$data['id']]['price']=$price;
		}
		session(['cart'=>$this->items]);
	}

	// //update
	public function update($id,$price,$quantity){
		$quantity = is_numeric($quantity) ? $quantity :1;
		$quantity = $quantity > 0 ? ceil($quantity) : 1 ;

		if(isset($this->items[$id])){
			$this->items[$id]['quantity'] = $quantity;
			$this->items[$id]['price'] = $price;
			session(['cart'=>$this->items]);
			return true;
		}
		else{
			return false;
		}
	}

	// //Xoa
	public function remove($id){
		if(isset($this->items[$id])){
			unset($this->items[$id]);
			session(['cart'=>$this->items]);
			return true;
		}
		else{
			return false;
		}
	}

	public function clear(){
		session(['cart'=> []]);
		return true;
	}

	public function total(){
		$tong=0;
		if(count($this->items)){
			foreach ($this->items as $items) {
				$tong = $tong+($items['quantity']*$items['price']);
			}
		}
		return $tong;
	}
	public function quanti(){
		$quanti=0;
		foreach ($this->items as $items) {
			$quanti = $quanti+($items['quantity']);
		}
		return $quanti;
	}
}


?>
