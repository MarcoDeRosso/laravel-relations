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
            'Vittorio',
            'Marco',
            'Francesco',
            'Carmelo',
            'Lirio',
            'Anja',
            'Dorothy',
            'Lilli',
        ];
        $authorSurnameList=[
            'Feltri',
            'Travaglio',
            'Abate',
            'Abbate',
            'Abbate',
            'Niedringhaus',
            'Thompson',
            'Gruber',
        ];
        $listOfAuthorID=[];
        
        for($i=0; $i<8;$i++){
            
            $author = new Author();
            $randNameKey = array_rand($authorNameList, 1);
            $name = $authorNameList[$randNameKey];
            $author->name =$name;
            $randSurnameKey = array_rand($authorSurnameList, 1);
            $surname = $authorSurnameList[$randSurnameKey];
            $author->surname =$surname;
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
