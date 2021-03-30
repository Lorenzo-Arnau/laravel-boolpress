<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Faker\Generator as Faker;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tags=['tecnologia','motori','salute','cronaca','gossip','notizie dal mondo'];
        foreach ($tags as $tag) {
            $newTag= new Tag();
            $newTag->name = $tag;
            $newTag->save();
        }
    }
}
