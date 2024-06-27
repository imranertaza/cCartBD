<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Modules extends Seeder
{
    public function run()
    {
        $data = [
            [
                'module_id' => 1,
                'module_name' => 'Top Search',
                'module_key' => 'top_search',
                'status' => 1,
            ],
            [
                'module_id' => 2,
                'module_name' => 'Wishlist',
                'module_key' => 'wishlist',
                'status' => 1,
            ],
            [
                'module_id' => 3,
                'module_name' => 'Compare',
                'module_key' => 'compare',
                'status' => 1,
            ],
            [
                'module_id' => 4,
                'module_name' => 'Bulk Edit Products',
                'module_key' => 'bulk_edit_products',
                'status' => 1,
            ],
            [
                'module_id' => 5,
                'module_name' => 'Contact With Whatsapp',
                'module_key' => 'contact_with_whatsapp',
                'status' => 1,
            ],
            [
                'module_id' => 6,
                'module_name' => 'Coupon',
                'module_key' => 'coupon',
                'status' => 1,
            ],
        ];

        // Using Query Builder
        $this->db->table('cc_modules')->insertBatch($data);
    }
}
