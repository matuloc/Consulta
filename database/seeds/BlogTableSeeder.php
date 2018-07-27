<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog')->delete();

        Blog::create([
          	'titulo' => 'Sample blog post',
          	'descripcion' => 'This blog post shows a few different types of content thats supported and styled with Bootstrap. Basic typography, images, and code are all supported.
          	Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.',
          	'ruta_imagen' => '18501771_matt',
          	'id_users' => '18501771_matt',
          	'created_at' => date('Y-m-d h:i:s')
        ]);
    }
}
