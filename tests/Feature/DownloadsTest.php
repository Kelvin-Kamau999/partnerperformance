<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use \App\User;
use InteractsWithAuthentication;

class DownloadsTest extends TestCase
{

    public function setUp(): void
    {
        /*parent::setUp();

        $user = new User([
            'name' => 'Test',
            'email' => 'test@email.com',
            'password' => '123456'
        ]);

        $user->save();*/


        // $user = User::first();
        // Auth::login($user);
        // $partner = $user->partner;
        // $this->actingAs($user)->withSession(['session_partner' => $partner]);
    }

    public function testLoggedStatus()
    {
        $user = User::first();
        // Auth::login($user);
        $this->actingAs($user)->assertAuthenticatedAs($user);
        // $u = auth()->user();
        // $this->assertTrue($u);
    }


    public function testDownloadNonMer()
    {
        $response = $this->get('/download/non_mer/2019');

        $response->assertStatus(200);
    }


    public function testDownloadIndicator()
    {
        $response = $this->get('/download/non_mer/2019');

        $response->assertStatus(200);
    }

    public function testDownloadSurge()
    {
        $response = $this->call('POST', '/upload/surge', [
            'week_id' => 40,
        ]);

        $response->assertOk();
    }


}
