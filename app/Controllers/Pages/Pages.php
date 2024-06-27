<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

class Pages extends BaseController {

    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function page($slug){
        $settings = get_settings();
        $table = DB()->table('cc_pages');
        $page = $table->where('slug',$slug)->get()->getRow();

        $data['page_title'] = $page->page_title;
        $data['pageData'] = $page;

        $data['keywords'] = !empty($page->meta_keyword)?$page->meta_keyword:$settings['meta_keyword'];
        $data['description'] = !empty($page->meta_description)?$page->meta_description:$settings['meta_description'];
        $data['title'] = !empty($page->meta_title)?$page->meta_title:$page->page_title;

        if ($page->landing_page == '0') {
            echo view('Theme/' . $settings['Theme'] . '/header', $data);
            if (!empty($page->temp)) {
                echo view('Theme/' . $settings['Theme'] . '/Page/' . $page->temp);
            } else {
                echo view('Theme/' . $settings['Theme'] . '/Page/default', $data);
            }
            echo view('Theme/' . $settings['Theme'] . '/footer');
        }else{

            $table = DB()->table('cc_products');
            $table->join('cc_product_description', 'cc_product_description.product_id = cc_products.product_id ');
            $data['products'] = $table->where('cc_products.product_id',$page->product_id)->get()->getRow();

            //image
            $imgTable = DB()->table('cc_product_image');
            $data['proImg'] = $imgTable->where('product_id',$page->product_id)->where('Product_option_id',null)->get()->getResult();

            echo view('Theme/' . $settings['Theme'] . '/Page/'.$page->temp , $data);
        }

    }




}
