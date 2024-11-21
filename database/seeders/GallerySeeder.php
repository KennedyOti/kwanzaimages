<?php

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run()
    {
        Gallery::create(['image_path' => 'uploads/gallery/sample1.jpg']);
        Gallery::create(['image_path' => 'uploads/gallery/sample2.jpg']);
        Gallery::create(['image_path' => 'uploads/gallery/sample3.jpg']);
    }
}
