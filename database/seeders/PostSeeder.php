<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'This is a sample blog post title',
                'slug' => 'this-is-a-sample-blog-post-title',
                'short_description' => 'Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei.',
                'description' => '
                <p>Lorem ipsum dolor sit amet, eos ea dolor commune iudicabit. In dicant dolore adversarium vix. Sed ei magna diceret, id mei possit maiestatis. Iusto detraxit perpetua vis no, duo ea esse adversarium. Eloquentiam reprehendunt et mea, molestie recusabo consetetur at vix.</p>
 <p>Ad eam prima fabellas, ei feugait incorrupte dissentiet vel. Quo cu lorem admodum. Cu omnesque deserunt antiopam quo, ex abhorreant definitionem qui, quando deserunt id duo. Cibo augue pro eu.</p>
 <p>Mel essent vocibus cu. Numquam splendide pro ut, probo apeirian mediocrem et vim. Ex nam dicant hendrerit, ad lorem singulis est, sed quod erroribus an. His cu quidam detraxit salutatus. At sit prompta inermis theophrastus.</p>
 <p>Oblique disputando quo at, et probo illum salutandi sed. Ei dicta voluptua assentior sit, id usu perfecto patrioque. Has nostrud efficiantur no, eu sed posse zril. Ius odio adipiscing inciderint at, vide nemore explicari eos id. Harum homero euismod sea eu. Eum praesent sapientem scribentur ei.</p>
                ',
                'image' => 'banner1.jpg'
            ],
            [
                'title' => 'This is a sample blog post',
                'slug' => 'this-is-a-sample-blog-post',
                'short_description' => 'Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei.',
                'description' => '
                <p>Lorem ipsum dolor sit amet, eos ea dolor commune iudicabit. In dicant dolore adversarium vix. Sed ei magna diceret, id mei possit maiestatis. Iusto detraxit perpetua vis no, duo ea esse adversarium. Eloquentiam reprehendunt et mea, molestie recusabo consetetur at vix.</p>
 <p>Ad eam prima fabellas, ei feugait incorrupte dissentiet vel. Quo cu lorem admodum. Cu omnesque deserunt antiopam quo, ex abhorreant definitionem qui, quando deserunt id duo. Cibo augue pro eu.</p>
 <p>Mel essent vocibus cu. Numquam splendide pro ut, probo apeirian mediocrem et vim. Ex nam dicant hendrerit, ad lorem singulis est, sed quod erroribus an. His cu quidam detraxit salutatus. At sit prompta inermis theophrastus.</p>
 <p>Oblique disputando quo at, et probo illum salutandi sed. Ei dicta voluptua assentior sit, id usu perfecto patrioque. Has nostrud efficiantur no, eu sed posse zril. Ius odio adipiscing inciderint at, vide nemore explicari eos id. Harum homero euismod sea eu. Eum praesent sapientem scribentur ei.</p>
                ',
                'image' => 'banner3.jpg'
            ],
            [
                'title' => 'This is a sample blog',
                'slug' => 'this-is-a-sample-blog',
                'short_description' => 'Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei.',
                'description' => '
                <p>Lorem ipsum dolor sit amet, eos ea dolor commune iudicabit. In dicant dolore adversarium vix. Sed ei magna diceret, id mei possit maiestatis. Iusto detraxit perpetua vis no, duo ea esse adversarium. Eloquentiam reprehendunt et mea, molestie recusabo consetetur at vix.</p>
 <p>Ad eam prima fabellas, ei feugait incorrupte dissentiet vel. Quo cu lorem admodum. Cu omnesque deserunt antiopam quo, ex abhorreant definitionem qui, quando deserunt id duo. Cibo augue pro eu.</p>
 <p>Mel essent vocibus cu. Numquam splendide pro ut, probo apeirian mediocrem et vim. Ex nam dicant hendrerit, ad lorem singulis est, sed quod erroribus an. His cu quidam detraxit salutatus. At sit prompta inermis theophrastus.</p>
 <p>Oblique disputando quo at, et probo illum salutandi sed. Ei dicta voluptua assentior sit, id usu perfecto patrioque. Has nostrud efficiantur no, eu sed posse zril. Ius odio adipiscing inciderint at, vide nemore explicari eos id. Harum homero euismod sea eu. Eum praesent sapientem scribentur ei.</p>
                ',
                'image' => 'banner2.jpg'
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate($post);
        }
    }
}