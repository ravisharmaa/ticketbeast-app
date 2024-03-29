<?php

use App\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewConcertListingsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function user_can_view_a_concert_listings()
    {
        $concert = Concert::create([
            'title'=>'The Red Chord',
            'subtitle'=>'With Animosity and Lethargy',
            'date'=> Carbon::parse('December 13, 2016 8:00pm'),
            'ticket_price'=>3250,
            'venue' => 'The Mosh Pit',
            'venue_address'=>'123 Example Lane',
            'city'=>'Laraville',
            'state'=>'ON',
            'zip'=>'17916',
            'additional_information'=>'For tickets, call (6556565656)'
        ]);

        $this->visit('/concerts/'.$concert->id);

        $this->see('The Red Chord');
        $this->see('With Animosity and Lethargy');
        $this->see('December 13, 2016');
        $this->see('8:00pm');
        $this->see('32.50');
        $this->see('123 Example Lane');
        $this->see('Laraville');
        $this->see('ON');
        $this->see('17916');
        $this->see('For tickets, call (6556565656)');
    }
}
