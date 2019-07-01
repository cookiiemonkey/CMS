<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => Hash::make('password')
        ]);
        $author2 = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@doe.com',
            'password' => Hash::make('password')
        ]);
        $category1 = Category::create([
            'name' => 'Laravel'
        ]);
        $category2 = Category::create([
            'name' => 'Wordpress'
        ]);
        $category3 = Category::create([
            'name' => 'Javascript'
        ]);
        $category4 = Category::create([
            'name' => 'CSS'
        ]);
        $post1 = $author1->posts()->create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Dignissimos dolore aperiam.',
            'content' => 'Et magni architecto est. Id corporis quibusdam at aspernatur et molestiae rerum voluptatem eum. Nihil modi voluptas. Omnis molestiae earum quia voluptas quam non. Sit et quam optio neque reprehenderit possimus consequatur sequi. Sed quo aut modi. Necessitatibus rerum et exercitationem perspiciatis nisi ab fugiat delectus. Aut impedit ex quos voluptatem voluptas aut voluptates. Nobis exercitationem et sunt. Expedita quo vel consectetur a. Provident et dolores accusantium. Rerum consectetur recusandae quis ullam saepe. Exercitationem distinctio sed rerum error nisi velit in. Explicabo sapiente consequatur labore fugit beatae.',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg'
        ]);
        $post2 = $author2->posts()->create([
            'title' => 'dignissimos enim ut',
            'description' => 'Vel architecto id aliquam amet.',
            'content' => 'Error a vel qui sapiente omnis atque. Ex corporis id quasi fugiat nobis minima. Voluptatem quasi corporis nostrum ab sint quis. Est officia et dolor quia. Hic unde non odio itaque sunt sed dolores. Illo perferendis eum consequatur ab. Ea vero suscipit sunt dolores quam quia sit aut. Ad quod necessitatibus. Cupiditate nam quis a eum magnam ad doloribus.',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'
        ]);
        $post3 = $author1->posts()->create([
            'title' => 'doloribus eius velit',
            'description' => 'Veritatis beatae molestias ut sed voluptas.',
            'content' => 'ipsam sint doloribus Quis accusantium consequatur culpa dolores quidem sed. Non exercitationem sequi provident. Nobis assumenda enim voluptatem fugit eos. Voluptatem eum dolorum dolorem nostrum et ullam non. Eos qui placeat est tempore sit.',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'
        ]);
        $post4 = $author2->posts()->create([
            'title' => 'ut laboriosam quisquam',
            'description' => 'Reprehenderit eveniet quod cupiditate.',
            'content' => 'Ut sunt repellat enim consequuntur nostrum alias hic. Iste sunt enim nihil quam asperiores omnis. Amet occaecati fugiat expedita. Saepe quisquam similique. Sed architecto non saepe deleniti. Et et aut consequatur sed recusandae doloribus enim sed.',
            'category_id' => $category4->id,
            'image' => 'posts/4.jpg'
        ]);
        $tag1 = Tag::create([
            'name' => 'Job'
        ]);
        $tag2 = Tag::create([
            'name' => 'Fun'
        ]);
        $tag3 = Tag::create([
            'name' => 'Creatif'
        ]);
        $tag4 = Tag::create([
            'name' => 'Bugs'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag3->id, $tag4->id]);
        $post4->tags()->attach([$tag4->id, $tag1->id]);

    }
}
