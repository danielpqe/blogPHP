<?php
namespace App\Controllers;

use App\Log;
use App\Models\User;
use Sirius\Validation\Validator;

class AuthController extends BaseController  {

    public function getLogin(){
        return $this->render('login.twig');
    }

    public function postLogin(){
        $validator= new Validator();
        $validator->add('email','required');
        $validator->add('email','email');
        $validator->add('password','required');
        if ($validator->validate($_POST)){
            $user=User::where('email',$_POST['email'])->first();
            if($user){
                if (password_verify($_POST['password'],$user->password)){
                    $_SESSION['userId']=$user->id;
                    Log::logInfo('Login userId:'.$user->id);
                            header('Location:'.BASE_URL.'admin');                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                header('location:'.BASE_URL.'admin');
                    return null;
                }
            }
        $validator->addMessage('email','Username and/or password dont match');
        }
        $errors=$validator->getMessages();
        return $this->render('login.twig',[
            'errors'=>$errors,
            'post'=>$_POST
        ]);
    }

    public function getLogout(){
        Log::logError('Logout:'.$_SESSION['userId']);

        unset($_SESSION['userId']);
        header('Location: '.BASE_URL.'auth/login');
    }
}