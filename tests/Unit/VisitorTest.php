<?php

namespace Tests\Unit;

use Tests\TestCase;
use Session;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Prisoners;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\PagesController;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitorTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function teststoreVisitor(){
        $request = new Request;
        $request->replace([
            'name'=>'Test',
            'nid'=>11231322312,
           'relation'=>'Tester',
            'phone'=>012312323,
        ]);
        $prisonerid=4;
        $visitorController = new VisitorController;
        $response = $visitorController->storeVisitore($request,$prisonerid);
        $this->assertDatabaseHas('visitors', [
            'name'=>'Test'
        ]);

        $this->assertDatabaseHas('visitors', [
            'nid'=>11231322312
        ]);

        $this->assertDatabaseHas('visitors', [
            'relation'=>'Tester'
        ]);

    }
}
