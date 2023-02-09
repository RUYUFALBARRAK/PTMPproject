<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Review;
use App\Models\company;
use App\Http\Controllers\companyController;
use App\Http\Controllers\RazanController;


class ReviewTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_ValidateEmptyReview()
    {
        $data = [
            'review' => null,
        ];

        $response = $this->post('/add', $data);
        $response->assertSessionHasErrors(['review']);
    }

    public function test_ValidateAddReview()
    {
        $review = new Review();
        $review -> star_rating = '3';
        $review -> review = 'Great';
        $review -> Create_at = Carbon::now()->toDateTimeString();
        $review -> trainee_id = '1';

        $rev = new RazanController();
        $rev->add($review->id);

    $this->assertDatabaseHas('_review', [
    'review' => 'Great',
    ]);
    }


    public function test_ValidateDeleteReview()
    {
        $review = new Review();
        $review -> star_rating = '3';
        $review -> review = 'Great';
        $review -> Create_at = Carbon::now()->toDateTimeString();
        $review -> trainee_id = '1';

        $rev = new RazanController();

        $rev->destroy();
        $this->assertModelMissing($review);
    }
}
