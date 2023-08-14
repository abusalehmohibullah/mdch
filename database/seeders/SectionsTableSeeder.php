<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            ['section_key' => 'about',          'title' => 'About',                 'slug' => 'about',                      'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', 'created_at' => now(), 'updated_at' => now()],
            ['section_key' => 'facilities',     'title' => 'Our Facilities',        'slug' => 'facilities',                 'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', 'created_at' => now(), 'updated_at' => now()],
            ['section_key' => 'administration', 'title' => 'Administration',        'slug' => 'administration',             'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', 'created_at' => now(), 'updated_at' => now()],
            ['section_key' => 'office-stuff',   'title' => 'Office Stuff',          'slug' => 'office-stuff',               'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', 'created_at' => now(), 'updated_at' => now()],
            ['section_key' => 'messages',        'title' => "Chairman's Message",   'slug' => 'chairmans-message',          'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', 'created_at' => now(), 'updated_at' => now()],
            ['section_key' => 'messages',        'title' => "Director's Message",   'slug' => 'directors-message',          'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', 'created_at' => now(), 'updated_at' => now()],
            ['section_key' => 'messages',        'title' => "Principal's Message",  'slug' => 'principals-message',         'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', 'created_at' => now(), 'updated_at' => now()],
            ['section_key' => 'admission',      'title' => 'Local Students',        'slug' => 'local-students',             'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', 'created_at' => now(), 'updated_at' => now()],
            ['section_key' => 'admission',      'title' => 'International Students','slug' => 'international-students',     'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', 'created_at' => now(), 'updated_at' => now()],
            ['section_key' => 'bds-course',     'title' => '1st Phase',             'slug' => '1st-phase',                  'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', 'created_at' => now(), 'updated_at' => now()],
            ['section_key' => 'bds-course',     'title' => '2nd Phase',             'slug' => '2nd-phase',                  'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', 'created_at' => now(), 'updated_at' => now()],
            ['section_key' => 'bds-course',     'title' => '3rd Phase',             'slug' => '3rd-phase',                  'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', 'created_at' => now(), 'updated_at' => now()],
            ['section_key' => 'bds-course',     'title' => '4th Phase',             'slug' => '4th-phase',                  'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
