<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LeveranciersCreateTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreatePass() //testExample
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/leveranciers/create')              
                    ->type('supplier_name', 'SampleTest')
                    ->press('Create')
                    ->assertPathIs('/leveranciers');
        }); 
    }

    public function testCreateFail() //testExample
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/leveranciers/create')
                    ->type('supplier_name', '')
                    ->press('Create')
                    ->assertPathIs('/leveranciers/create');
        }); 
    }
}
