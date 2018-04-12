<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
        public function __construct(){
                $this->middleware('auth');
        }

        public function index(){
                $users = User::latest()->get();
                return view('users.index', compact('users'));
        }
        public function show($id){
                $user = User::find($id);
                return view('users.show', compact('user'));
        }
        public function create(){
                return view('users.create');
        }
        public function add(){
                User::create([
                   'name' => request('name'),
                   'email' => request('email'),
                   'password' => bcrypt(request('password')),
                ]);
                return redirect('/users');
        }        
        public function update(){
                $user = User::find(request('id'));
                $user->name = request('name');
                $user->email = request('email');
                $user->password = bcrypt(request('password'));
                $user->save();
                return redirect('/users');

        }
        public function delete($id){
                User::destroy($id);
                return redirect('/users');
        }
        
}
