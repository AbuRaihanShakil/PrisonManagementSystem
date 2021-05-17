<?php


namespace Tests\Unit;

use Tests\TestCase;
use Session;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\PagesController;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAllstaff()
    {
        $pages= new PagesController;
        $results = $pages->allstaff()['staffs'];
        $count = count($results);
        $staff=$results->first();
        $this->assertEquals($count,5);
        $this->assertDatabaseHas('users', [
            'name'=>$staff->name
        ]);

        $this->assertDatabaseHas('users', [
            'email'=>$staff->email
        ]);


        $this->assertDatabaseHas('users', [
            'nid'=>$staff->nid
        ]);

        $this->assertDatabaseHas('users', [
            'role'=>$staff->role
        ]);

        $this->assertDatabaseHas('users', [
            'section'=>$staff->section
        ]);

    }

    public function testStaff(){
        $this->login(1);
        $pages= new PagesController;
        $staff= $pages->staff(2)['staff'];
        $this->assertDatabaseHas('users', [
            'name'=>$staff->name
        ]);

        $this->assertDatabaseHas('users', [
            'email'=>$staff->email
        ]);


        $this->assertDatabaseHas('users', [
            'nid'=>$staff->nid
        ]);

        $this->assertDatabaseHas('users', [
            'role'=>$staff->role
        ]);

        $this->assertDatabaseHas('users', [
            'section'=>$staff->section
        ]);


    }

    public function testAllPrisonerTest(){
        $this->login(1);
        $pages= new PagesController;
        $prisoners= $pages->allPrisoner()['prisoners'];
        $count = count($prisoners);
        $prisoner = $prisoners->first();

        $this->assertEquals($count,4);

        $this->assertDatabaseHas('prisoners', [
            'name'=>$prisoner->name
        ]);

        $this->assertDatabaseHas('prisoners', [
            'nid'=>$prisoner->nid
        ]);


        $this->assertDatabaseHas('prisoners', [
            'caseid'=>$prisoner->caseid
        ]);

        $this->assertDatabaseHas('prisoners', [
            'cellno'=>$prisoner->cellno
        ]);

        $this->assertDatabaseHas('prisoners', [
            'section'=>$prisoner->section
        ]);

        $this->assertDatabaseHas('prisoners', [
            'points'=>$prisoner->points
        ]);
    }

    public function testFilter(){
        $this->login(1);
        $pages= new PagesController;
        $request = new Request;
        $request->replace([
            'section'=>1,
            'cellno'=>0,
        ]);
        $prisoners= $pages->filter($request)['prisoners'];
        $count = count($prisoners);
        $this->assertEquals($count,3);
    }

    public function testSearch(){
        $this->login(1);
        $pages= new PagesController;
        $request = new Request;
        $request->replace([
            'search'=>'Ar'
        ]);
        $prisoners= $pages->search($request)['prisoners'];
        $prisoner = $prisoners->first();
        $this->assertEquals($prisoner->name,"Arman");
    }

    public function testTaskHistory(){
        $this->login(1);
        $pages= new PagesController;
        $tasks = $pages->taskHistory(6)['tasks'];
        $this->assertEquals(count($tasks),2);
    }

    protected function login($id){
        Session::start();
        $user = User::find($id);
        Auth::login($user);
     }
}
