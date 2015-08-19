<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Article;
use App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call('ArticleTableSeeder');

        Model::reguard();
    }
}

class ArticleTableSeeder extends Seeder
{
    public function run()
    {

        /**
         * Checks if the `comments` table exists.
         * If it exists, delete it.
         */
        if (Schema::hasTable('comments'))
        {
            $this->command->info('Old table comments detected!');
            Schema::drop('comments');
            $this->command->info('Old table comments deleted!');

            /**
             * If after deletion the table still exists, then I'm fucked.
             */
            if (Schema::hasTable('comments'))
            {
                $this->command->info('Im fucked');
            }
        }

        /**
         * Checks if the `articles` table exists.
         * If it exists, delete it.
         */
        if (Schema::hasTable('articles'))
        {
            $this->command->info('Old table articles detected!');
//            DB::table('articles')->delete();
            Schema::drop('articles');
            $this->command->info('Old table articles deleted!');

            /**
             * If after deletion the table still exists, then I'm fucked.
             */
            if (Schema::hasTable('articles'))
            {
                $this->command->info('Im fucked');
            }
        }

        /**
         * Checks if the `users` table exists.
         * If it exists, delete it.
         */
        if (Schema::hasTable('users'))
        {
            $this->command->info('Old table users detected!');
//            DB::table('articles')->delete();
            Schema::drop('users');
            $this->command->info('Old table users deleted!');

            /**
             * If after deletion the table still exists, then I'm fucked.
             */
            if (Schema::hasTable('users'))
            {
                $this->command->info('Im fucked');
            }
        }

        /**
         * Recreate the articles table
         */
        Schema::create('users', function($table)
        {
            $table->increments('id');
//            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('remember_token');
            $table->timestamps();
        });
        $this->command->info('Recreation of users succeeded!');

        /**
         * Recreate the articles table
         */
        Schema::create('articles', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->string('content');
            $table->timestamps();
        });
        $this->command->info('Recreation of articles succeeded!');

        /**
         * Recreate the comments table
         */
        Schema::create('comments', function($table)
        {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->string('content');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        $this->command->info('Recreation of comments succeeded!');

        /**
         * Insert columns into the table.
         */
//        Schema::table('articles', function($table)
//        {
//
//        });

        User::create([
            'email' => 'foo@bar.com',
            'name' => 'Hu Zheng',
            'password' => Hash::Make('password'),
        ]);

        User::create([
            'email' => 'foobar@bar.com',
            'name' => 'Your Daddy',
            'password' => Hash::Make('password'),
        ]);

        Article::create([
            'title' => 'Hi!',
            'user_id' => 1,
            'content' => 'This is the very first article',
        ]);
        Article::create([
            'title' => 'Hi!',
            'user_id' => 2,
            'content' => 'This is the very second article',
        ]);

        Comment::create([
            'article_id' => 1,
            'content' => 'This is the very first comment',
            'user_id' => 1,
        ]);
        Comment::create([
            'article_id' => 1,
            'content' => 'This is the very second comment',
            'user_id' => 2,
        ]);
        Comment::create([
            'article_id' => 2,
            'content' => 'This is the very third comment',
            'user_id' => 2,
        ]);
        Comment::create([
            'article_id' => 1,
            'content' => 'This is the very fourth comment',
            'user_id' => 2,
        ]);
        Comment::create([
            'article_id' => 2,
            'content' => 'This is the very fifth comment',
            'user_id' => 1,
        ]);
    }
}