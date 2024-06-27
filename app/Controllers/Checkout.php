<?php

namespace App\Controllers;

use App\Libraries\Mycart;
use App\Libraries\Weight_shipping;
use App\Libraries\Zone_rate_shipping;
use App\Libraries\Zone_shipping;
use App\Libraries\Flat_shipping;
use App\Models\ProductsModel;



class Checkout extends BaseController
{

    protected $validation;
    protected $session;
    protected $productsModel;
    protected $zone_shipping;
    protected $flat_shipping;
    protected $weight_shipping;
    protected $zone_rate_shipping;
    protected $cart;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->productsModel = new ProductsModel();
        $this->zone_shipping = new Zone_shipping();
        $this->flat_shipping = new Flat_shipping();
        $this->weight_shipping = new Weight_shipping();
        $this->zone_rate_shipping = new Zone_rate_shipping();
        $this->cart = new Mycart();
    }

    public function index()
    {
        if (!empty($this->cart->contents())) {
            $settings = get_settings();
            $table = DB()->table('cc_customer');
            $data['customer'] = $table->where('customer_id', $this->session->cusUserId)->get()->getRow();

            $tableSet = DB()->table('cc_payment_settings');
            $data['paypalEmail'] = $tableSet->where('payment_method_id', '3')->where('label', 'email')->get()->getRow();

            $data['keywords'] = $settings['meta_keyword'];
            $data['description'] = $settings['meta_description'];
            $data['title'] = 'Checkout';

            $data['check_free_delivery'] = $this->check_free_delivery();

            $data['page_title'] = 'Checkout';
            echo view('Theme/' . $settings['Theme'] . '/header', $data);
            echo view('Theme/' . $settings['Theme'] . '/Checkout/index', $data);
            echo view('Theme/' . $settings['Theme'] . '/footer');
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert" style="color: #fff;" >Your cart is empty!</div>');
            return redirect()->to('cart');
        }
    }

    public function coupon_action()
    {
        $coupon_code = $this->request->getPost('coupon');

        $table = DB()->table('cc_coupon');
        $query = $table->where('code', $coupon_code)->where('status', 'Active')->where('total_useable >', 'total_used')->where('date_start <', date('Y-m-d'))->where('date_end >', date('Y-m-d'))->get()->getRow();

        if (!empty($query)) {
            if ($query->for_registered_user == '1') {
                $isLoggedInCustomer = $this->session->isLoggedInCustomer;
                if (isset($isLoggedInCustomer) || $isLoggedInCustomer == TRUE) {
                    if (!empty($this->cart->contents())) {
                        $couponArray = array(
                            'coupon_discount' => $query->discount
                        );
                        $this->session->set($couponArray);
                        $this->session->setFlashdata('message', '<div class="alert-success-m alert-success alert-dismissible" role="alert">Coupon code applied successfully </div>');
                        return redirect()->to('cart');
                    } else {
                        $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible text-white" role="alert">your cart is currently empty </div>');
                        return redirect()->to('cart');
                    }
                } else {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Coupon code not working </div>');
                    return redirect()->to('cart');
                }
            }

            if ($query->for_subscribed_user == '1') {
                $isLoggedInCustomer = $this->session->isLoggedInCustomer;
                if (isset($isLoggedInCustomer) || $isLoggedInCustomer == TRUE) {
                    $checkSub = is_exists('cc_newsletter', 'customer_id', $this->session->cusUserId);
                    if ($checkSub == false) {
                        if (!empty($this->cart->contents())) {
                            $couponArray = array(
                                'coupon_discount' => $query->discount
                            );
                            $this->session->set($couponArray);
                            $this->session->setFlashdata('message', '<div class="alert-success-m alert-success alert-dismissible" role="alert">Coupon code applied successfully </div>');
                            return redirect()->to('cart');
                        } else {
                            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible text-white" role="alert">your cart is currently empty </div>');
                            return redirect()->to('cart');
                        }
                    } else {
                        $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Coupon code not working </div>');
                        return redirect()->to('cart');
                    }
                } else {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Coupon code not working </div>');
                    return redirect()->to('cart');
                }
            }

            if (($query->for_registered_user == '0') && ($query->for_subscribed_user == '0')) {
                if (!empty($this->cart->contents())) {
                    $couponArray = array(
                        'coupon_discount' => $query->discount
                    );
                    $this->session->set($couponArray);
                    $this->session->setFlashdata('message', '<div class="alert-success-m alert-success alert-dismissible" role="alert">Coupon code applied successfully </div>');
                    return redirect()->to('cart');
                } else {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible text-white" role="alert">your cart is currently empty </div>');
                    return redirect()->to('cart');
                }
            }
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible text-white" role="alert">Coupon code not working </div>');
            return redirect()->to('cart');
        }
    }

    public function country_zoon()
    {
        $country_id = $this->request->getPost('country_id');

        $table = DB()->table('cc_zone');
        $data = $table->where('country_id', $country_id)->get()->getResult();
        $options = '';
        foreach ($data as $value) {
            $options .= '<option value="' . $value->zone_id . '" ';
            $options .= '>' . $value->name . '</option>';
        }
        print $options;
    }

    public function checkout_action(){
        if (!empty($this->cart->contents())) {
            $data['payment_firstname'] = $this->request->getPost('payment_firstname');
            $data['payment_phone'] = $this->request->getPost('payment_phone');
            $data['payment_address_1'] = $this->request->getPost('payment_address_1');

            $data['shipping_method'] = $this->request->getPost('shipping_method');
            $data['shipping_charge'] = $this->request->getPost('shipping_charge');
            $data['payment_method'] = $this->request->getPost('payment_method');

            $data['store_id'] = get_data_by_id('store_id', 'cc_stores', 'is_default', '1');


            $this->validation->setRules([
                'payment_firstname' => ['label' => 'Name', 'rules' => 'required'],
                'payment_phone' => ['label' => 'Phone', 'rules' => 'required'],
                'payment_address_1' => ['label' => 'Address', 'rules' => 'required'],
            ]);

            if ($this->validation->run($data) == FALSE) {
                $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert" style="color: #fff;" >' . $this->validation->listErrors() . ' </div>');
                return redirect()->to('checkout');
            } else {
                $otp = rand(1000, 9999);
                $sessionArray = array(
                    'payment_firstname' => $data['payment_firstname'],
                    'payment_phone' => $data['payment_phone'],
                    'payment_address_1' => $data['payment_address_1'],
                    'shipping_method' => $data['shipping_method'],
                    'payment_method' => $data['payment_method'],
                    'shipping_charge' => $data['shipping_charge'],
                    'store_id' => $data['store_id'],
                    'orderOtp' => $otp,
                );
                $this->session->set($sessionArray);


                $store_name = get_lebel_by_value_in_settings('store_name');
                $message = "Your " . $store_name . " OTP Is: " . $otp;
                //send_sms($data['payment_phone'], $message);

                return redirect()->to('otpSubmit');
            }
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert" style="color: #fff;" >Your cart is empty!</div>');
            return redirect()->to('checkout');
        }
    }

    public function otpSubmit(){

        if (!empty($this->session->orderOtp)) {
            $settings = get_settings();
            $table = DB()->table('cc_customer');
            $data['customer'] = $table->where('customer_id', $this->session->cusUserId)->get()->getRow();

            $tableSet = DB()->table('cc_payment_settings');
            $data['paypalEmail'] = $tableSet->where('payment_method_id', '3')->where('label', 'email')->get()->getRow();

            $data['keywords'] = $settings['meta_keyword'];
            $data['description'] = $settings['meta_description'];
            $data['title'] = 'Otp Submit';

            $data['page_title'] = 'Otp Submit';
            echo view('Theme/' . $settings['Theme'] . '/header', $data);
            echo view('Theme/' . $settings['Theme'] . '/Checkout/otp_submit', $data);
            echo view('Theme/' . $settings['Theme'] . '/footer');
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert" style="color: #fff;" > Otp not sending </div>');
            return redirect()->to('checkout');
        }

    }

    public function resend_otp(){
        $otp = rand(1000, 9999);
        $data = array(
            'orderOtp'=>$otp
        );
        $this->session->set($data);
        $store_name = get_lebel_by_value_in_settings('store_name');
        $message = "Your ".$store_name." OTP Is: " . $otp;
        send_sms($this->session->payment_phone, $message);

        $this->session->setFlashdata('message', '<div class="alert-success-m alert-success alert-dismissible" role="alert">Your otp has been successfully Send </div>');
        return redirect()->to('otpSubmit');
    }

    public function otpCheck(){
        $otp = $this->session->orderOtp;
        $recivedOtp = $this->request->getPost('otp[]');
        $inputOtp = implode("", $recivedOtp);

        if ($inputOtp == $otp){
            return redirect()->to('checkout_done');
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert" style="color: #fff;" >Your otp does not match!</div>');
            return redirect()->to('otpSubmit');
        }


    }

    public function checkout_done(){

        if(!empty($this->session->payment_firstname)) {
            $data['payment_firstname'] = $this->session->payment_firstname;
            $data['payment_phone'] = $this->session->payment_phone;
            $data['payment_address_1'] = $this->session->payment_address_1;

            $data['shipping_method'] = 'zone';
            $data['shipping_charge'] = $this->session->shipping_charge;
            $data['payment_method'] = $this->session->payment_method;
            $data['store_id'] = $this->session->store_id;

            $shipping_charge = $this->session->shipping_charge;

            if (isset($this->session->cusUserId)) {
                $data['customer_id'] = $this->session->cusUserId;
            }

            $disc = null;
            if (isset($this->session->coupon_discount)) {
                $disc = round(($this->cart->total() * $this->session->coupon_discount) / 100);
            }
            $finalAmo = $this->cart->total() - $disc;
            if (!empty($shipping_charge)) {
                $finalAmo = ($this->cart->total() + $shipping_charge) - $disc;
            }

            if ($data['payment_method'] == '8') {
                $balCus = get_data_by_id('balance', 'cc_customer', 'customer_id', $this->session->cusUserId);
                if ($balCus < $finalAmo) {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert" style="color: #fff;" >Not enough balance </div>');
                    return redirect()->to('checkout');
                }
            }


            DB()->transStart();


            $data['total'] = $this->cart->total();
            $data['discount'] = $disc;
            $data['final_amount'] = $finalAmo;


            $table = DB()->table('cc_order');
            $table->insert($data);
            $order_id = DB()->insertID();


            //order cc_order_history
            $order_status_id = get_data_by_id('order_status_id', 'cc_order_status', 'name', 'Pending');
            $dataOrderHistory['order_id'] = $order_id;
            $dataOrderHistory['order_status_id'] = $order_status_id;
            $tabHistOr = DB()->table('cc_order_history');
            $tabHistOr->insert($dataOrderHistory);


            foreach ($this->cart->contents() as $val) {
                $oldQty = get_data_by_id('quantity', 'cc_products', 'product_id', $val['id']);
                $dataOrder['order_id'] = $order_id;
                $dataOrder['product_id'] = $val['id'];
                $dataOrder['price'] = $val['price'];
                $dataOrder['quantity'] = $val['qty'];
                $dataOrder['total_price'] = $val['subtotal'];
                $dataOrder['final_price'] = $val['subtotal'];
                $tableOrder = DB()->table('cc_order_item');
                $tableOrder->insert($dataOrder);
                $order_item_id = DB()->insertID();

                $newqty['quantity'] = $oldQty - $val['qty'];
                $tablePro = DB()->table('cc_products');
                $tablePro->where('product_id', $val['id'])->update($newqty);

                foreach (get_all_data_array('cc_option') as $vl) {
                    if (!empty($val['op_' . strtolower($vl->name)])) {
                        $data[strtolower($vl->name)] = $val['op_' . strtolower($vl->name)];

                        $table = DB()->table('cc_product_option');
                        $option = $table->where('option_value_id', $data[strtolower($vl->name)])->where('product_id', $val['id'])->get()->getRow();

                        if (!empty($option)) {
                            $dataOptino['order_id'] = $order_id;
                            $dataOptino['order_item_id'] = $order_item_id;
                            $dataOptino['product_id'] = $option->product_id;
                            $dataOptino['option_id'] = $option->option_id;
                            $dataOptino['option_value_id'] = $option->option_value_id;
                            $dataOptino['name'] = strtolower($vl->name);
                            $dataOptino['value'] = get_data_by_id('name', 'cc_option_value', 'option_value_id', $option->option_value_id);
                            $tableOption = DB()->table('cc_order_option');
                            $tableOption->insert($dataOptino);
                        }
                    }
                }
            }


            DB()->transComplete();

            $store_name = get_lebel_by_value_in_settings('store_name');
            $message = $store_name.".com: অর্ডার টি কনফার্ম করা হলো। ".$finalAmo." টাকা ক্যাশ অন ডেলিভারি।";
            send_sms($this->session->payment_phone, $message);

            unset($_SESSION['coupon_discount']);
            unset($_SESSION['payment_firstname']);
            unset($_SESSION['payment_phone']);
            unset($_SESSION['payment_address_1']);
            unset($_SESSION['shipping_method']);
            unset($_SESSION['shipping_charge']);
            unset($_SESSION['payment_method']);
            unset($_SESSION['store_id']);
            $this->cart->destroy();

            $order = array('order_id'=>$order_id);
            $this->session->set($order);

            $this->session->setFlashdata('message', '<div class="alert-success-m alert-success alert-dismissible" role="alert">Your order has been successfully placed </div>');
            return redirect()->to('checkout_success');
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert" style="color: #fff;" >invalid entry!</div>');
            return redirect()->to('checkout');
        }
    }



    public function shipping_rate()
    {

        $city_id = $this->request->getPost('city_id');
        $shipCityId = $this->request->getPost('shipCityId');
        $paymethod = $this->request->getPost('paymethod');
        if (!empty($shipCityId)) {
            $city_id = $shipCityId;
        }

        if ($paymethod == 'flat') {
            $data['charge'] = $this->flat_shipping->getSettings()->calculateShipping();
        }
        if ($paymethod == 'zone') {
            $data['charge'] = $this->zone_shipping->getSettings()->calculateShipping($city_id);
        }
        if ($paymethod == 'weight') {
            $data['charge'] = $this->weight_shipping->getSettings();
        }
        if ($paymethod == 'zone_rate') {
            $data['charge'] = $this->zone_rate_shipping->getSettings($city_id);
        }

        return $this->response->setJSON($data);
    }

    public function success()
    {
        if (isset($_SESSION['order_id'])) {
            $table = DB()->table('cc_order');
            $data['order'] = $table->where('order_id', $_SESSION['order_id'])->get()->getRow();

            $tableItem = DB()->table('cc_order_item');
            $tableItem->select('cc_order_item.*');
            $tableItem->select('cc_products.name');
            $tableItem->select('cc_products.brand_id');
            $tableItem->join('cc_products', 'cc_products.product_id = cc_order_item.product_id');
            $data['orderItem'] = $tableItem->where('cc_order_item.order_id', $_SESSION['order_id'])->get()->getResult();


        }
        $settings = get_settings();

        $data['keywords'] = $settings['meta_keyword'];
        $data['description'] = $settings['meta_description'];
        $data['title'] = 'Order Success';

        $data['page_title'] = 'Checkout Success';
        echo view('Theme/' . $settings['Theme'] . '/header', $data);
        echo view('Theme/' . $settings['Theme'] . '/Checkout/success', $data);
        echo view('Theme/' . $settings['Theme'] . '/footer');


    }

    public function failed()
    {
        $settings = get_settings();
        $data['keywords'] = $settings['meta_keyword'];
        $data['description'] = $settings['meta_description'];
        $data['title'] = 'Order Failed';

        $data['page_title'] = 'Checkout Failed';
        echo view('Theme/' . $settings['Theme'] . '/header', $data);
        echo view('Theme/' . $settings['Theme'] . '/Checkout/failed', $data);
        echo view('Theme/' . $settings['Theme'] . '/footer');
    }

    public function canceled()
    {
        $settings = get_settings();
        $data['keywords'] = $settings['meta_keyword'];
        $data['description'] = $settings['meta_description'];
        $data['title'] = 'Order Canceled';

        $data['page_title'] = 'Checkout Canceled';
        echo view('Theme/' . $settings['Theme'] . '/header', $data);
        echo view('Theme/' . $settings['Theme'] . '/Checkout/canceled', $data);
        echo view('Theme/' . $settings['Theme'] . '/footer');
    }


    public function payment_instruction()
    {
        $payment_method_id = $this->request->getPost('id');

        $table = DB()->table('cc_payment_settings');
        $query = $table->where('payment_method_id', $payment_method_id)->where('label', 'instruction')->get()->getRow();
        $view = '';
        if (!empty($query)) {
            $view .= '<div class="title-checkout">
                           <label class="btn bg-custom-color text-white w-100 rounded-0"><span class="text-label">' . $query->title . '</span></label>
                       </div>';
            $view .= '<div class="payment-method group-check mb-4 pb-4">
                           <p>' . $query->value . '</p>
                     </div>';
        }
        print $view;
    }

    private function shipping_charge($city_id,$shipCityId,$shipping_method)
    {

        $city_id = $city_id;
        $shipCityId = $shipCityId;
        $shipping_method = $shipping_method;

        if (!empty($shipCityId)) {
            $city_id = $shipCityId;
        }
        $charge = 0;
        if ($shipping_method == 'flat') {
            $charge = $this->flat_shipping->getSettings()->calculateShipping();
        }
        if ($shipping_method == 'zone') {
            $charge = $this->zone_shipping->getSettings()->calculateShipping($city_id);
        }
        if ($shipping_method == 'weight') {
            $charge = $this->weight_shipping->getSettings();
        }
        if ($shipping_method == 'zone_rate') {
            $charge = $this->zone_rate_shipping->getSettings($city_id);
        }

        return $charge;
    }


    private function check_free_delivery(){
        $cart = $this->cart->contents();
        $result = 0;

        foreach ($cart as $val){
            $table = DB()->table('cc_product_free_delivery');
            $count = $table->where('product_id',$val['id'])->countAllResults();

            if (empty($count)){
                $result += 1;
            }
        }
        return $result;
    }

}
