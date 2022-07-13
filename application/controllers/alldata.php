<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class alldata extends CI_Controller {

    public function __construct(){
        /******** Start To Load Database and Call Modal  **********/
        parent::__construct();
        $this->load->database();
        $this->load->model('showdata');
        /******** End To Load Database and Call Modal  **********/
      }

    public function alldata() {
        /******** 3.1 Start Count of all active and verified users **********/
        $arr = $this->showdata->getActiveUsers();        
        echo "<br>Active and Verified Users = ".count($arr);
        /******** End Count of all active and verified users **********/

        /******** 3.2 Start Count of active and verified users who have attached active products **********/
        $arr = $this->showdata->getUsers();
        $all_id = array();
        $k = 0;
        foreach($arr as $activeusers){
            $user_id = $activeusers['user_id'];
            if(!in_array($user_id, $all_id)){
                $all_id[$k] = $user_id;
            }
            $k++;
        }
        echo "<br><br>Active Users with Active Products = ".count($all_id);
        /******** End Count of active and verified users who have attached active products **********/

        /******** 3.3 Start Count of all active products **********/
        $active_products = $this->showdata->getActiveProducts();
        echo "<br><br>Active Products = ".count($active_products    );
        /******** End Count of all active products **********/

        /******** 3.4 Count of active products which don't belong to any user **********/        
        $cart = $this->showdata->getCart();
        $count_attach_products = array();
        $i = 0;
        foreach($active_products as $active_prod){
            $product_id = $active_prod['id'];
            foreach($cart as $cart_prod){
                $cart_prod_id = $cart_prod['product_id'];
                if($cart_prod_id == $product_id){
                    $count_attach_products[$i] = $cart_prod_id;
                }
            }
            $i++;
        }
        echo "<br><br>Active Products Which Don't Belong To Any User = ".count($count_attach_products);
        /******** 3.4 End Count of active products which don't belong to any user **********/

        /******** 3.5 Start Amount of all active attached products **********/
        $arr = $this->showdata->getCartProducts();
        $amount = array();
        $all_quantity = array();
        $j = 0;
        foreach($arr as $all_array){
            $product_price = $all_array['price'];
            $product_quantity = $all_array['quantity'];
            $useraname = $all_array['user_name'];
            $new_amount = $product_price * $product_quantity;
            $amount[$j] = $new_amount;
            $all_quantity[$j] = $product_quantity;
            $userid = $all_array['user_id'];
            $j++;
        }

        $total_product_quantity = array_sum($all_quantity);
        echo "<br><br>Amount of Active And Attached Products = ".$total_product_quantity;
        /******** 3.5 End Amount of all active attached products **********/

        /******** 3.6 Start Summarized price of all active attached products **********/
        $total = array_sum($amount);
        echo "<br><br>Summarized Price Of All Active Attached products = ".$total."$";
        /******** 3.6 End Summarized price of all active attached products **********/

        /******** 3.7 Start Summarized prices of all active products per user **********/
        $summarize = $this->showdata->getSummarizeProducts();
        $mydata = array();
        $f = 0;        
        foreach($summarize as $summary){
            $user_total_price = 0;
            foreach($summary as $data){
                $name_user = $data['user_name'];
                $quantity = $data['quantity'];
                $price = $data['price'];
                $user_total = $quantity * $price;
                $user_total_price = $user_total + $user_total_price;                
            }
            echo "<br><br>".$name_user." = ".$user_total_price."$";
        }
        /******** 3.7 End Summarized prices of all active products per user **********/

        /******** 3.8 Start The exchange rates for USD and RON based on Euro **********/
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.apilayer.com/exchangerates_data/latest?symbols=USD,RON&base=Eur',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'apikey: y5KIFAyhJR8SzGscxSijRE8U8JhDXcLA'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $exchange_data = json_decode($response);
        $exchange_rates = $exchange_data->rates;

        if(isset($exchange_rates)){        
            echo "<br><br> Exchange Rate For USD Based On Euro is = ".$exchange_rates->USD;
            echo "<br><br> Exchange Rate For RON Based On Euro is = ".$exchange_rates->RON;
        }
        /******** 3.8 End The exchange rates for USD and RON based on Euro **********/
    }
}
?>