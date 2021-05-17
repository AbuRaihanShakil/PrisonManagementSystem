<?php

namespace Tests\Unit;

use Tests\TestCase;
use Session;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use DatabaseTransactions;
     public function testAuth(){
         $this->get('/allprisoners')
         ->assertStatus(302);
     }

     public function testAuthWithlogin(){
        $this->login(1);
        $this->get('/allprisoners')
        ->assertStatus(200);
    }

    public function testPrisonerViewRoute(){
        $this->login(1);
        $response = $this->get('/prisoner/9');
        $response = $this->getResponseData($response,'prisoner');
        $this->assertEquals($response->name,'biash');
        

    }

    public function testPrisonerEditInfoRoute(){
        $this->login(1);
        $response = $this->get('/prisoner/5');
        $response = $this->getResponseData($response,'prisoner');
        $this->assertEquals($response->name,'Shakil');


    }

    public function testUpdateRoute(){
        $this->login(1);
        $response=$this->postJson('/editprisoner/5', ['section' => '5','cellno'=>'2']);
        $this->assertDatabaseHas('prisoners', [
            'section'=>5
        ]);
    }
    protected function getResponseData($response, $key){
        $content = $response->getOriginalContent();
        $content = $content->getData();
       return $content[$key];
    
    }

    protected function login($id){
        Session::start();
        $user = User::find($id);
        Auth::login($user);
     }
}
