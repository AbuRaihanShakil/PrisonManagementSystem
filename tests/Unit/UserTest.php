<?php

namespace Tests\Unit;

use Tests\TestCase;
use Session;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Prisoners;
use App\Http\Controllers\PagesController;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

     use DatabaseTransactions;

    public function testRegister(){
        
        $data=['name'=>'Biash','phone'=>'0123312321','email'=>'biash@gmail.com','password'=>'motu9999' ,'password_confirmation'=>'motu9999','nid'=>'123123223'];
        $response=$this->json('POST', '/register',$data);
       
        $this->assertDatabaseHas('users', [
            'email'=>'biash@gmail.com'
        ]);
    }


    public function testLogin(){
        $data=['email'=>'staff2@gmail.com','password'=>'123456789'];
        $response=$this->json('POST', '/login',$data);
        $this->assertEquals($data['email'],Auth::user()->email);
    }
}
