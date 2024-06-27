<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ShippingMethod extends Seeder
{
    public function run()
    {
        $data = [
            [
                'shipping_method_id' => 1,
                'name' => 'Flat Rate Shipping',
                'code' => 'flat',
                'status' => '1',
            ],
            [
                'shipping_method_id' => 2,
                'name' => 'Zone Based Shipping',
                'code' => 'zone',
                'status' => '1',
            ],
            [
                'shipping_method_id' => 3,
                'name' => 'Weight Based Shipping',
                'code' => 'weight',
                'status' => '1',
            ],
            [
                'shipping_method_id' => 4,
                'name' => 'Zone Rate Shipping',
                'code' => 'zone_rate',
                'status' => '1',
            ],
        ];
        // Using Query Builder
        $this->db->table('cc_shipping_method')->insertBatch($data);
    }
}
