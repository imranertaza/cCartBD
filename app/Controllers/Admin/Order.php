<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Order extends BaseController
{

    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Order';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->crop = \Config\Services::image();
        $this->permission = new Permission();
    }

    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_order');
            $data['order'] = $table->orderBy('order_id', 'DESC')->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Order/index', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function shipped_order()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_order');
            $data['order'] = $table->orderBy('order_id', 'DESC')->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Order/shipped_order', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function order_view($order_id)
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_order');
            $data['order'] = $table->where('order_id', $order_id)->get()->getRow();

            $tableItem = DB()->table('cc_order_item');
            $data['orderItem'] = $tableItem->where('order_id', $order_id)->get()->getResult();

            $tablehistory = DB()->table('cc_order_history');
            $data['orderhistoryLast'] = $tablehistory->where('order_id', $order_id)->get()->getLastRow();
            $data['orderhistory'] = $tablehistory->where('order_id', $order_id)->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Order/order_view', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function history_action()
    {
        $data['order_id'] = $this->request->getPost('order_id');
        $data['order_status_id'] = $this->request->getPost('order_status_id');
        $data['comment'] = $this->request->getPost('comment');

        $this->validation->setRules([
            'order_status_id' => ['label' => 'Status', 'rules' => 'required'],
            'comment' => ['label' => 'Comments', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('order_view/' . $data['order_id'] . '?selTab=history');
        } else {
            $table = DB()->table('cc_order_history');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"> History Add Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('order_view/' . $data['order_id'] . '?selTab=history');
        }
    }

    public function shipped_steadFast($order_id){
        $table = DB()->table('cc_order');
        $order = $table->where('order_id', $order_id)->get()->getRow();


        $data['invoice'] = $order->order_id;
        $data['recipient_name'] = $order->payment_firstname;
        $data['recipient_address'] = $order->payment_address_1;
        $data['recipient_phone'] = $order->payment_phone;
        $data['cod_amount'] = $order->final_amount;
        $data['status'] = 'in_review';
        $data['note'] = '';
//        return $this->bulkCreate(json_encode($data));

        print json_encode($data);
    }

//    public function bulkCreate($data){
//        $api_key = '1m9mwrrwsjbrg0w';
//        $secret_key = 'y196ftazvk9s3';
//        $response = Http::withHeaders([
//            'Api-Key' => $api_key,
//            'Secret-Key' => $secret_key,
//            'Content-Type' => 'application/json'
//        ])->post($this->base_url.'/create_order/bulk-order', [
//            'data' => $data,
//        ]);
//        return json_decode($response->getBody()->getContents());
//    }



}
