<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 18/03/2018
 * Time: 11:45
 */
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;
use Sirius\Validation\Validator;
use function Sodium\add;

class UserController extends BaseController{
    public function getIndex(){
        $users=User::all();
        return $this->render('admin/users.twig',[
            'users'=>$users,
        ]);
    }

    public  function getCreate(){

        return $this->render('admin/insert-user.twig');
    }

    public function postCreate(){
        $errors =[];
        $result=false;
        $validator= new Validator();
        $validator->add('name','required');
        $validator->add('email','required');
        $validator->add('email','email');
        $validator->add('password','required');

        if ($validator->validate($_POST)){
            $user= new User();
            $user->name=$_POST['name'];
            $user->email=$_POST['email'];
            $user->password=password_hash($_POST['password'],PASSWORD_DEFAULT);

            $user->save();
            $result=true;

        }else{
            $errors=$validator->getMessages();
        }
        return $this->render('admin/insert-user.twig',[
            'result'=>$result,
            'errros'=>$errors
        ]);

    }
}