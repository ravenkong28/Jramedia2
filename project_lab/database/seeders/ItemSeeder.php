<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'type_id' => 2,
                'name' => 'sarasa', 
                'price' => 1000,
                'slug' => 'sarasa',
                'image' => 'item-image/pulpen.jpg',
                'desc' => 'Ini adalah Pulpen Sarasa yang terkenal akan lamanya penggunaan dengan tinta khusus yagn dirancang',
            ],[
                'type_id' => 1,
                'name' => 'Love is War vol.10', 
                'price' => 2500,
                'slug' => 'komik-kaguya-sama-love-is-war',
                'image' => 'item-image/komik.jpg',
                'desc' => 'Ini adalah komik kaguya-sama love is war volume ke 10',
            ],
            [
                'type_id' => 1,
                'name' => 'Heroes of olympus', 
                'price' => 20000,
                'slug' => 'heroes-of-olympus-32',
                'image' => 'item-image/novel.jpg',
                'desc' => 'House of Hades',
            ],
            [
                'type_id' => 1,
                'name' => 'Komik Miiko vol.32', 
                'price' => 20000,
                'slug' => 'komik-miiko-vol-32',
                'image' => 'item-image/miiko.jpg',
                'desc' => 'Ini adalah buku komik miiko volume yang ke 32',
            ],
            [
                'type_id' => 2,
                'name' => 'Pulpen Energel', 
                'price' => 1000,
                'slug' => 'pulpen-energel',
                'image' => 'item-image/energel.jpg',
                'desc' => 'Ini adalah Pulpen energel yang terdapat 6 jenis warna',
            ],
            
            
        ]);
    }
}
