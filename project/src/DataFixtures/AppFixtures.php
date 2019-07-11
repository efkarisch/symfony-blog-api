<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Article;
use App\Entity\Comment;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setApiKey('test_api_key');
        $user->setUsername('test');
        $user->setPassword('test');
        $manager->persist($user);

        for($i = 0; $i<10; $i++){ //Article and Comment Loop

            $article = new Article();

            $article->setBody('This is the body of article ' . $i);

            for($j=0; $j < 5; $j++ ){ //Create Comments

                $comment = new Comment();
                $comment->setBody('This is the body of comment ' . $j . ' of article ' . $i );
                $comment->setArticle($article);
                $manager->persist($comment);

            }// End Comment Loop

            $manager->persist($article);


        }//end Article & Comment Loop

        $manager->flush();
    }
}
