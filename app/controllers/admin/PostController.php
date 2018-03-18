<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPost;
use Sirius\Validation\Validator;

class PostController extends BaseController {
    public function getIndex(){
        $blogposts=BlogPost::all();
        return $this->render('admin/post.twig',[
            'blogposts'=>$blogposts
        ]);
    }

    public  function getCreate(){
        $result = false;
        return $this->render('admin/insert-post.twig', [
            'result' => $result
        ]);
    }

    public function postCreate(){
        $errors=[];
        $result=false;
        $validator = new Validator();
        $validator->add('title','required');
        $validator->add('content','required');
        if ($validator->validate($_POST)){
            $blogpost= new BlogPost([
                'title'=>$_POST['title'],
                'content'=>$_POST['content']
            ]);
            if ($_POST['img']){
                $blogpost->img_url=$_POST['img'];
            }
            $blogpost->save();
            $result=true;
        }else{
            $errors=$validator->getMessages();
//            var_dump($errors);
        }

        return $this->render('admin/insert-post.twig',[
            'result'=>$result,
            'errors'=>$errors
        ]);
    }


}