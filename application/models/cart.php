<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Model {

	public function retrieveAllProducts()
	{
		$query = "SELECT * FROM products ORDER BY created_at DESC";
		$products = $this->db->query( $query )->result_array();
		return $products;
	}
}

//End of Cart Model