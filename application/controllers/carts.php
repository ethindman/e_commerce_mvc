<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Controller {

	public function index()
	{
		$products = $this->cart->retrieveAllProducts();
		$this->load->view('products_listing', array('products' => $products) );
	}

	public function showCart()
	{
		$this->load->view('products_cart');
	}

	public function addToCart()
	{
		$cart = $this->session->userdata('orders');
		$cart[] = $this->input->post();
		$this->session->set_userdata('orders', $cart);
		$this->session->set_flashdata('success', 'Item was added to your cart!');
		redirect('/');	
	}

	public function removeFromCart()
	{
		$key = $this->input->post('key');
		$cart = $this->session->userdata('orders');
		unset($cart[$key]);
		$this->session->set_userdata('orders', $cart);		
		redirect('/cart');
	}
	
}

//end of Carts controller