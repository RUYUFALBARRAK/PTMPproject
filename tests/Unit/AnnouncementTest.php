<?php

namespace Tests\Unit;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions; 
use Tests\TestCase;
use App\Models\announcement;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\database\factories\AnnouncementFactory;
use App\Http\Controllers\BalqeesController;

class AnnouncementTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_ValidateFieldsEmpty()
    {
    $data = [
        'content' => null,
    ];
    
    $response = $this->post('/addAnnouncement', $data);
    $response->assertSessionHasErrors(['content']);
    }

     public function test_ValidateDeleteAnnouncement()
    {

    $post = announcement::factory()->create();
    $company = new BalqeesController();
    $company->deleteAnnouncement($post);
    $this->assertModelMissing($post);
    }
    //9
    public function test_ValidateAddAnnouncement()
    {
$response = $this->json('POST', 
    '/addAnnouncement', 
    ['title' => 'S',
    'content'=>'h'
    ]
);
$response->assertSessionHasErrors(['title']);

    }
    //10
    public function test_ValidateEditAnnouncement ()
    {
    $post = announcement::factory()->create();
    $company = new BalqeesController();
    $company->editAnnouncement($post,['title' => 'S','content'=>'h']);
    $this->assertDatabaseHas('announcements', [
    'title' => 'S',
    'content'=>'h'
]);
    }
}
