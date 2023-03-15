<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    # #[Route('/app', name: 'app_app')] for PHP 8
    /** PHP Documentation
     * @Route("/singin/",name="app_app_singin ")
     * @return Response
     */
    public function index(): Response
    {
        #  return new Response(sprintf("Welcome to My project ya %s ",$request->get('name')));
        # dump($name);
        #dd($name);

        return $this->render('base.html.twig', [
            'name' => 'mypage'

        ]);
    }

    /**
     * @Route("/singup",name="app_app_singup")
     * @return Response
     */
    public function singup(): Response
    {
        return $this->render('singup.html.twig');
    }

    /**
     * @Route ("/post/{name}",name="app_app_post")
     * @param $name
     * @return Response
     */
    public function post($name): Response
    {
        $posts=[
            ['name' => 'Sahbi',
            'likes'=>100,
            'comments'=>100,
            'share'=>50],
            ['name' => 'Sana',
            'likes'=>200,
            'comments'=>200,
            'share'=>100],
            ['name' => 'ahmed',
            'likes'=>300,
            'comments'=>300,
            'share'=>0]
        ];
        return $this->render('post.html.twig',['posts'=> $posts,'data'=>'testData']);
    }
    /**
     * @Route ("/addlike/{count}",name="app_app_addlike",methods={"POST"})
     * @return Response
     */
    public function addlike($count)
    {
         //$this->addFlash('success','your like has been added');
        return $this->json(['totalLikesCount'=>$count +rand(1,5)]);
    }
}
