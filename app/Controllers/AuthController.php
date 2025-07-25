<?php

namespace App\Controllers;

// require_once __DIR__ . '/../Core/Database.php';
// require_once __DIR__ . '/../Models/User.php';
use Model\User;
use Core\Request;


class AuthController {

    public function index(Request $request){
        echo $request->id;
        return view('auth/login');
    }


    public function authenticate(Request $request){
        echo $request->email;
        print_r($request->all());die;
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!$email || !$password){
            $this->errorMessage("Email and Password Both field are required");
        }
        $user = new User;
        session_start();
        $user_data = $user->findMyEmail($email);
        if($user_data){
            if(password_verify($password, $user_data['password'])){
                $_SESSION['user'] = [
                    'id' => $user_data['id'],
                    'name' => $user_data['name'],
                    'email' => $user_data['email'],
                ];

            
                // Redirect to home page
                header("Location: /financebuddy/add-expense");
                exit;
            }

        }
       return $this->errorMessage("Wrong Credential. Please Try Again");
    }


    private function errorMessage($message){
        $_SESSION['error'] = $message;
        header("Location: /financebuddy/login");
        exit;
    }

    public function logout(){
        if (isset($_SESSION['user'])) {
            session_destroy();
            header("Location: /financebuddy/login");
        }
    }


    
}