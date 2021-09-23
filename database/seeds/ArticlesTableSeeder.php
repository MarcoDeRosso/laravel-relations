<?php
use App\Article;
use App\Author;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $authorNameList=[
            'Vittorio Feltri',
            'Marco Travaglio',
            'Francesco Abate',
            'Carmelo Abbate',
            'Lirio Abbate',
            'Anja Niedringhaus',
            'Dorothy Thompson',
            'Lilli Gruber',
        ];
        $listOfAuthorID=[];
        
        for($i=0; $i<8;$i++){
            
            $author = new Author();
            $randNameKey = array_rand($authorNameList, 1);
            $name = $authorNameList[$randNameKey];
            $author->name =$name;
            $author->email= $faker->email();
            $author->save();
            $listOfAuthorID[]=$author->id;
            
        }
        
        for($i=0; $i<50; $i++){
            $article= new Article();
            $article->title=$faker->words(4, true);
            $article->text=$faker->paragraph(5);
            $article->picture=$faker->imageUrl(640, 480, 'animals', true);

            $randAuthorKey= array_rand($listOfAuthorID, 1);
            $authorID = $listOfAuthorID[$randAuthorKey];
            $article->author_id= $authorID;
            $article->save();
        }
      
    }
}
