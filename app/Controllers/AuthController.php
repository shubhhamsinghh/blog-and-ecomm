<?php

namespace App\Controllers;

use App\Models\User;
use App\Libraries\Hash;
use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper(['url','form']);
    }

    public function index()
    {
       
        return view('register');
    }

    public function postRegister()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]|max_length[12]',
            'confirm_password' => 'required|min_length[5]|max_length[12]|matches[password]'
        ];
        $error = [
             'name' => ['required' => 'Name is required'],
             'email' => [
                'required' => 'Email is required',
                'valid_email' => 'You must enter a valid email',
                'is_unique' => 'Email already taken',
                        ],
             'password' =>  [
                 'required' => 'Password is required',
                 'min_length' => 'Password must have atleast 5 characters in length',
                 'max_length'=> 'Password must not have characters more then 12 in length'
                        ],
             'confirm_password' => [
                'required' => 'Confirm password is required',
                'min_length' => 'Confirm Password must have atleast 5 characters in length',
                'max_length' => 'Confirm Password must not have characters more then 12 in length',
                'matches'=> 'Confirm Password is not match to password'
             ]
             
        ];

        if(!$this->validate($rules, $error)){
            $data['validation'] = $this->validator ;
        }else{
               $user = new User();
               $data = [
                   'name' => $this->request->getPost('name'),
                   'email' => $this->request->getPost('email'),
                   'password' => password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
               ];
               $user->save($data);
               return redirect()->to('login');
           }

           return  view('register',$data);
    }

    public function login()
    {
        return view('login');
    }

    public function postLogin()
    {
         $rules = [
                'email' => 'required|valid_email|is_not_unique[users.email]',
                'password' => 'required|min_length[5]|max_length[12]',
            ];

            $errors = [
                'email' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Enter a valid email address',
                    'is_not_unique' => 'This email is not registered on our service'

                ],
                'password' => [
                 'required' => 'Password is required',
                 'min_length' => 'Password must have atleast 5 characters in length',
                 'max_length'=> 'Password must not have characters more then 12 in length'

                ]
                ];
            if(!$this->validate($rules, $errors)){
                $data['validation'] = $this->validator;
            }else{
                $model = new User();
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $user = $model->where('email',$email)->first();
                $check_password = Hash::checkUser($password,$user['password']);
                if(!$check_password)
                {
                    session()->setFlashdata('fail', 'Incorrect password');
                    return redirect()->to('login')->withInput();
                }else {
                    $user_id = $user['id'];
                    session()->set('loggedUser',$user_id); 
                    return redirect()->to('dashboard');
           }
    }

            return view('login',$data);
    }

    
}
