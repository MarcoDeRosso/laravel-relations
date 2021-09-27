<?php
use App\Article;
use App\Author;
use App\Comment;
use App\Tag;
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
        $tagList=[
            'Sport',
            'Cronaca',
            'Mondo',
            'Economia',
            'Ambiente',
            'Covid',
            'Politica'
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

        $listOfTags=[];
        foreach($tagList as $tag){
            $tagObject = new Tag();
            $tagObject->tag=$tag;
            $tagObject->save();
            $listOfTags[]=$tagObject->id;
        }
        
        for($i=0; $i<50; $i++){
            $comment = new Comment();
            $comment->comment_text = $faker->text(100);
            $comment->user_name = $faker->words(2, true);
            $comment->save();



            $article= new Article();
            $article->title=$faker->words(4, true);
            $article->text=$faker->paragraphs(3, true);
            $article->picture=$faker->imageUrl(640, 480, 'animals', true);

            $article->comment_id=$comment->id;

            $randAuthorKey= array_rand($listOfAuthorID, 1);
            $authorID = $listOfAuthorID[$randAuthorKey];
            $article->author_id= $authorID;

            $randTagKey = array_rand($listOfTags, 2);
            $tag1= $listOfTags[$randTagKey[0]];
            $tag2= $listOfTags[$randTagKey[1]];

            $article->save();

            $article->tag()->attach($tag1);
            $article->tag()->attach($tag2);

        }
      
    }
}
