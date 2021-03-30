<?php

use App\Author;
use App\AuthorSpecs;
use App\Comment;
use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) {
            $newAuthor= new Author();
            $newAuthor->name = $faker->firstName();
            $newAuthor->surname = $faker->lastName();
            $newAuthor->save();

            $authorSpecs= new AuthorSpecs;
            $authorSpecs->mail = $faker->email();
            $authorSpecs->address=$faker->streetAddress();
            $authorSpecs->pic='https://picsum.photos/seed/'.rand(0,1000).'/200/300';

            $newAuthor->specs()->save($authorSpecs);

            for ($x=0; $x < rand(1,5); $x++) {
                $newPost= new Post();
                $newPost->title = $faker->text(50);
                $newPost->content=$faker->text(500);

                $newAuthor->posts()->save($newPost);

                for ($y=0; $y < rand(1,5); $y++) {
                    $newComment= new Comment();
                    $newComment->content=$faker->text(150);

                    $newPost->comments()->save($newComment);
                }
            }
        }
    }
}
