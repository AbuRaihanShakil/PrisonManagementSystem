<?php


namespace Tests\Unit;

use Tests\TestCase;
use Session;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Prisoners;
use App\Http\Controllers\PrisonerController;
use App\Http\Controllers\PagesController;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PrisonerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function testStore(){
        $this->login(1);
        $prisonerController= new PrisonerController;
        $request = new Request;
        $request->replace([
            'name'=>'Test',
            'nid'=>2222222,
            'caseid'=>00000,
            'cellno'=>1,
            'section'=>2,
        ]);

        $response = $prisonerController->store($request);
        $this->assertDatabaseHas('prisoners', [
            'name'=>'Test'
        ]);
    }

    public function testUpdate(){
        $this->login(1);
        $prisonerController= new PrisonerController;
        $request = new Request;
        $prisonerID=3;
        $request->replace([
            'cellno'=>4,
            'section'=>5,
        ]);

        $response = $prisonerController->update($request,$prisonerID);
        $this->assertDatabaseHas('prisoners', [
            'section'=>5
        ]);

        $this->assertDatabaseHas('prisoners', [
            'cellno'=>4
        ]);
    }
    public function testPrisonerRelease(){
        $this->login(1);
        $prisonerController= new PrisonerController;
        $prisonerID=5;
        $respone=$prisonerController->prisonerRelease($prisonerID);
        $pages= new PagesController;
        $prisoners= $pages->allPrisoner()['prisoners'];
        $count = count($prisoners);
        $this->assertEquals($count,3);
    }

    protected function login($id){
        Session::start();
        $user = User::find($id);
        Auth::login($user);
     }
}
