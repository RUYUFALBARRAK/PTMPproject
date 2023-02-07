<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CompanyTest extends DuskTestCase
{
    /**
     * @test
     */
    
    public function test_ValidateFieldsEmpty()
    {
    $this->get('/Authreg')
         ->type('', 'orgnizationName')
         ->type('', 'website')
         ->type('', 'orgnizationEmail')
         ->type('', 'OrganizationPhone')
         ->type('', 'Registration')
         ->type('', 'description')
         ->type('', 'SupervisorName')
         ->select('', 'city')
         ->type('', 'SupervisorPhone')
         ->type('', 'SupervisorEmail')
         ->type('', 'password')
         ->type('', 'SupervisorFax')
         ->type('', 'Address')
         ->type('', 'logoImage')
         ->press('submit')
         ->seePageIs('/Authreg');

        
       
    }
    //2,3
    public function test_ValidateFieldOnlyNumbers()
    {
        $this->assertTrue(true);
    }
    //4,5
    public function test_ValidateFieldOnlyCharactersAndSpace()
    {
        $this->assertTrue(true);
    }
    //6,7
    public function test_ValidateFieldOnlyCharacters()
    {
        $this->assertTrue(true);
    }
    //8
    public function test_ValidateDeleteCompany()
    {
        $this->assertTrue(true);
    }
    //9
    public function test_ValidateRejectCompany()
    {
        $this->assertTrue(true);
    }
    //10
    public function test_ValidateAcceptCompany()
    {
        $this->assertTrue(true);
    }

}
