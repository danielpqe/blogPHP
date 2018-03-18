<?php
namespace App\Controllers;
use App\Models\BlogPost;

class IndexController extends BaseController {
    public function getIndex(){
        $blogposts=BlogPost::query()->orderBy('id','desc')->get();

        return $this->render('index.twig',[
            'blogposts'=>$blogposts
        ]);
    }
}