<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Article;

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
         * Checks if the `articles` table exists.
         * If it exists, delete it.
         */
        if (Schema::hasTable('articles'))
        {
            $this->command->info('Old table detected!');
//            DB::table('articles')->delete();
            Schema::drop('articles');
            $this->command->info('Old table deleted!');

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
            $this->command->info('Old table detected!');
//            DB::table('articles')->delete();
            Schema::drop('users');
            $this->command->info('Old table deleted!');

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
        Schema::create('articles', function($table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('content');
            $table->string('author');
            $table->timestamps();
        });
        $this->command->info('Recreation of articles succeeded!');

        /**
         * Recreate the articles table
         */
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('remember_token');
            $table->timestamps();
        });
        $this->command->info('Recreation of users succeeded!');

        /**
         * Insert columns into the table.
         */
//        Schema::table('articles', function($table)
//        {
//
//        });

//        User::create(['email' => 'foo@bar.com']);
        Article::create(['title' => 'Hi!']);
    }
}