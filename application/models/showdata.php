<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class showdata extends CI_Model
{
    /*********** Get All Active and Verified Users ***************/
    public function getActiveUsers() {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where(array('verified'=> 1,'status' => '1'));
        $query = $this->db->get();
        return $query->result_array();
    }

    /*********** Get All Active and Verified Users With Active Products ***************/
    public function getUsers() {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->join('cart', 'users.id = cart.user_id'); 
        $this->db->join('products', 'products.id = cart.product_id');
        $this->db->where(array('verified'=> 1,'users.status' => '1','products.status' => '1'));
        $query = $this->db->get();
        return $query->result_array();
        
    }

    /*********** Get All Active Products ***************/
    public function getActiveProducts() {
        $this->db->select("*");
        $this->db->from("products");
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    /*********** Get Cart Data ***************/
    public function getCart() {
        $this->db->select("*");
        $this->db->from("cart");
        $query = $this->db->get();
        return $query->result_array();
    }

    /*********** Get Cart Data With Active Products And Active Users ***************/
    public function getCartProducts() {
        $this->db->select("*");
        $this->db->from("cart");
        $this->db->join('users', 'users.id = cart.user_id', 'cart.quantity'); 
        $this->db->join('products', 'products.id = cart.product_id',);
        $this->db->where(array('verified'=> 1,'users.status' => '1','products.status' => '1'));
        $query = $this->db->get();
        return $query->result_array();
    }

    /*********** Get Users Products Data ***************/
    public function getSummarizeProducts() {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where(array('verified'=> 1,'users.status' => '1'));
        $query = $this->db->get();
        $user_data = $query->result_array();
        
        $all_product_data = array();
        $g = 0;
        foreach($user_data as $data){
            $userid = $data['id'];
            $this->db->select("*");
            $this->db->from("cart");
            $this->db->join('users', 'users.id = cart.user_id');
            $this->db->join('products', 'products.id = cart.product_id');
            $this->db->where(array('products.status'=> 1,'users.id' => $userid));
            $query = $this->db->get();
            $all_product_data[$g] = $query->result_array();
            $g++;
        }
        return $all_product_data;
    }
}
?>