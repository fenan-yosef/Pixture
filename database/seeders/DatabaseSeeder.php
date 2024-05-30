<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Database\Factories\CommentFactory;
 //use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        /*User::factory(10)->create();

        User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]); */


        Post::factory(count: 20)->hasComments(rand( min:12, max: 30))->create(attributes: ['type' => 'reel']);
        Post::factory(count: 12)->hasComments(rand( min:12, max: 30))->create(attributes: ['type' => 'post']);

        //create comment replies

        Comment::limit(50)->each(function($comment){


            $comment::factory(rand(1,5))->isReply($comment->commentable)->create(['parent_id'=>$comment->id]);
    
        });


    }
}
