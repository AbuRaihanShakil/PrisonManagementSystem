<?php

namespace Tests\Unit;

use Tests\TestCase;
use Session;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Prisoners;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PagesController;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function testStore(){
        $this->login(1);
        $TaskController= new TaskController;
        $request = new Request;
        $request->replace([
            'task'=>'Test Task',
            'points'=>30,
        ]);

        $pid=5;
        $response = $TaskController->storeTask($request,$pid);
        $this->assertDatabaseHas('tasks', [
            'task'=>'Test Task'
        ]);

        $this->assertDatabaseHas('tasks', [
            'prisonerid'=>5
        ]);

        $this->assertDatabaseHas('tasks', [
            'points'=>30
        ]);
    }

    public function testComplete(){
        $this->login(1);
        $pagesController = new PagesController;
        $TaskController= new TaskController;
        $taskid=5;
        $prisonerid=4;
        $response = $TaskController->complete($taskid,$prisonerid);
        $countComplete = $pagesController->viewPrisoner($prisonerid)['completedTask'];
        $this->assertEquals($countComplete,1);
    }

    public function testFail(){
        $this->login(1);
        $pagesController = new PagesController;
        $TaskController= new TaskController;
        $taskid=5;
        $prisonerid=4;
        $response = $TaskController->fail($taskid,$prisonerid);
        $countFail = $pagesController->viewPrisoner($prisonerid)['failedTask'];
        $this->assertEquals($countFail,1);
    }

    protected function login($id){
        Session::start();
        $user = User::find($id);
        Auth::login($user);
     }
}
