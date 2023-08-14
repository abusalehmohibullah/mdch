<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informations')->insert([
            ['info_type' => 'slogan',           'slug' => 'slogan',         'content' => 'Institution for the study of dentistry.', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'chairmans-name',   'slug' => 'chairman',       'content' => 'Name of the Chairman', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'directors-name',   'slug' => 'director',       'content' => 'Name of the Director', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'principals-name',  'slug' => 'principal',      'content' => 'Name of the Principal', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'video-id',         'slug' => 'video-id',       'content' => 'ID', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'contact',          'slug' => 'contact',        'content' => '0123456789', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'contact',          'slug' => 'recieption',     'content' => '0123456789', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'contact',          'slug' => 'patient-query',  'content' => '0123456789', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'contact',          'slug' => 'email',          'content' => 'knock.mdch@gmail.com', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'address',          'slug' => 'address',        'content' => '295/Jha/14, Sikder Real Estate, West Dhanmondi, Dhaka-1209', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'opd-in-charge',    'slug' => 'opd-in-charge',  'content' => 'name of in-charge', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'socials',          'slug' => 'facebook',       'content' => 'facebook account link', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'socials',          'slug' => 'x',              'content' => 'x account link', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'socials',          'slug' => 'instagram',      'content' => 'instagram account link', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'socials',          'slug' => 'linkedin',       'content' => 'linkedin account link', 'created_at' => now(), 'updated_at' => now()],
            ['info_type' => 'socials',          'slug' => 'youtube',        'content' => 'youtube channel link', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
