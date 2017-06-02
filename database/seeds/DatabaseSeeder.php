<?php

use App\Category;
use App\Element;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CategoryTableSeeder::class);
         $this->call(ElementTableSeeder::class);
    }
}

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();
        Category::create(['name' => 'Motore', 'description'=>'categoria dei componenti motore']);
        Category::create(['name' => 'Frizione', 'description'=>'categoria dei componenti frizione']);
        Category::create(['name' => 'Cambio', 'description'=>'categoria dei componenti cambio']);
        Category::create(['name' => 'Freni', 'description'=>'categoria dei componenti freni']);
        Category::create(['name' => 'Sospensioni', 'description'=>'categoria dei componenti sospensioni']);
        Category::create(['name' => 'Telaio', 'description'=>'categoria dei componenti telaio']);

    }
}

class ElementTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('elements')->delete();
        $category = App\Category::whereName('Motore')->first();
        $category2 = App\Category::whereName('Frizione')->first();
        $category3 = App\Category::whereName('Cambio')->first();

        $category->elements()->create([
            'name' => 'Primo',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Secondo',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Terzo',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Quarto',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Quinto',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Sesto',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Settimo',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Ottavo',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Nono',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Decimo',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Undicesimo',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Dodicesimo',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Tredicesimo',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Quattordicesimo',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => 'Quindicesimo',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '16',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '17',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '18',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '19',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '20',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '21',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '22',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '23',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '24',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '25',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '26',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '27',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '28',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '29',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '30',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category->elements()->create([
            'name' => '31',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);



        $category->elements()->create([
            'name' => '32',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);

        $category2->elements()->create([
            'name' => 'CAT2-1',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category2->elements()->create([
            'name' => 'CAT2-2',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category2->elements()->create([
            'name' => 'CAT2-3',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category3->elements()->create([
            'name' => 'CAT3-1',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category3->elements()->create([
            'name' => 'CAT3-2',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category3->elements()->create([
            'name' => 'CAT3-3',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category3->elements()->create([
            'name' => 'CAT3-4',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category3->elements()->create([
            'name' => 'CAT3-5',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category3->elements()->create([
            'name' => 'CAT3-6',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);
        $category3->elements()->create([
            'name' => 'CAT3-7',
            'description'=>'codice XYZU <br> Riferiemento abc.def',
            'thumbnail'=>'http://magal.li/i/60/60',
            'image'=>'http://magal.li/i/300/300'
        ]);


    }
}