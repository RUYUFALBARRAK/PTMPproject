<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions; 
use Tests\TestCase;
use App\Models\company;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\database\factories\companyFactory;
use App\Http\Controllers\companyController;
class CompanyTest extends TestCase
{ 
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    //1
    public function test_ValidateFieldsEmpty()
    {
    $data = [
        'orgnizationName' => null,
    ];
    
    $response = $this->post('/Authreg', $data);
    $response->assertSessionHasErrors(['orgnizationName']);
    }
    //2,3
    public function test_ValidateFieldOnlyNumbers()
    {
        $data = ['OrganizationPhone' => '966123456789' ];
        $data1 = ['OrganizationPhone' => 'ABC' ];
    $response = $this->post('/Authreg', $data);
    //2
    $response->assertSessionDoesntHaveErrors(['OrganizationPhone']);
    $response = $this->post('/Authreg', $data1);
    //3
    $response->assertSessionHasErrors(['OrganizationPhone']);

    }
    //4,5
    public function test_ValidateFieldOnlyCharactersAndSpace()
    {
    $data = ['orgnizationName' => 'SNB Bank' ];
    $data1 = ['orgnizationName' => 'SNB Bank5' ];
    $response = $this->post('/Authreg', $data);
    //4
    $response->assertSessionDoesntHaveErrors(['orgnizationName']);
    
    $response = $this->post('/Authreg', $data1);
    //5
    $response->assertSessionHasErrors(['orgnizationName']);
    }
    //6,7
    public function test_ValidateFieldOnlyCharacters()
    {
    $data = ['website' => 'https://alahli.com' ];
    $data1 = ['website' => 'https://alahli.co m’' ];
    $response = $this->post('/Authreg', $data);
    //6
    $response->assertSessionDoesntHaveErrors(['website']);
    $response = $this->post('/Authreg', $data1);
    //7
    $response->assertSessionHasErrors(['website']);
    }
    //8
    public function test_ValidateDeleteCompany()
    {

    $post = company::factory()->create();
    $company = new companyController();
    $company->deleteCompany($post->id);
    $this->assertModelMissing($post);
    }
    //9
    public function test_ValidateRejectCompany()
    {
    $post = company::factory()->create();
    $company = new companyController();
    $company->rejectCompany($post->id);
    $this->assertDatabaseHas('company', [
    'status' => 'reject',
]);
    }
    //10
    public function test_ValidateAcceptCompany()
    {
    $post = company::factory()->create();
    $company = new companyController();
    $company->AcceptCompany($post->id);
    $this->assertDatabaseHas('company', [
    'status' => 'accept',
]);
    }
}
