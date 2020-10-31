<?php

namespace Tests\Feature;

use App\Medicine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use App\User;
use Illuminate\Support\Str;
use JWTAuth;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testLogin()
    {
        $baseUrl = Config::get('app.url') . '/api/login';
        $email = 'test@test.test';
        $password = 123456;

        $response = $this->json('POST', $baseUrl, [
            'email' => $email,
            'password' => $password
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'token'
            ]);
    }

    public function testLogout()
    {
        $email = 'test@test.test';
        $user = User::where('email', $email)->first();
        $token = JWTAuth::fromUser($user);
        $baseUrl = Config::get('app.url') . '/api/logout/?token=' . $token;

        $response = $this->json('GET', $baseUrl);
        $response->assertStatus(200);
    }

    public function testGetMedicines()
    {
        $email = 'test@test.test';
        $user = User::where('email', $email)->first();
        $token = JWTAuth::fromUser($user);
        $baseUrl = Config::get('app.url') . '/api/medicine?token=' . $token;

        $response = $this->json('GET', $baseUrl, []);

        $response->assertStatus(200);
    }

    public function testGetOneMedicine()
    {
        $email = 'test@test.test';
        $user = User::where('email', $email)->first();
        $token = JWTAuth::fromUser($user);
        $medicine = Medicine::first();
        $baseUrl = Config::get('app.url') . '/api/medicine/show/' . $medicine->id . '?token=' . $token;

        $response = $this->json('GET', $baseUrl, []);

        $response->assertStatus(200);
    }

    public function testCreateMedicine()
    {
        $email = 'test@test.test';
        $user = User::where('email', $email)->first();
        $token = JWTAuth::fromUser($user);
        $baseUrl = Config::get('app.url') . '/api/medicine/create/?token=' . $token;

        $response = $this->json('POST', $baseUrl, [
            'name' => Str::random(5),
            'substance_id' => rand(1, 10),
            'manufacturer_id' => rand(1, 10),
            'price' => rand(1, 10) . '.' . rand(1, 10)
        ]);
        $response
            ->assertStatus(200);
    }

    public function testUpdateMedicine()
    {
        $email = 'test@test.test';
        $user = User::where('email', $email)->first();
        $token = JWTAuth::fromUser($user);
        $medicine = Medicine::first();
        $baseUrl = Config::get('app.url') . '/api/medicine/update/' . $medicine->id . '?token=' . $token;

        $response = $this->json('PUT', $baseUrl, [
            'name' => Str::random(5),
            'substance_id' => rand(1, 10),
            'manufacturer_id' => rand(1, 10),
            'price' => rand(1, 10) . '.' . rand(1, 10)
        ]);
        $response
            ->assertStatus(200);
    }

    public function testDeleteMedicine()
    {
        $email = 'test@test.test';
        $user = User::where('email', $email)->first();
        $token = JWTAuth::fromUser($user);
        $medicine = Medicine::first();
        $baseUrl = Config::get('app.url') . '/api/medicine/delete/' . $medicine->id . '?token=' . $token;

        $response = $this->json('DELETE', $baseUrl);
        $response
            ->assertStatus(200);
    }
    public function testGetSubstance()
    {
        $email = 'test@test.test';
        $user = User::where('email', $email)->first();
        $token = JWTAuth::fromUser($user);
        $baseUrl = Config::get('app.url') . '/api/substance?token=' . $token;

        $response = $this->json('GET', $baseUrl, []);

        $response->assertStatus(200);
    }
    public function testGetManufacturer()
    {
        $email = 'test@test.test';
        $user = User::where('email', $email)->first();
        $token = JWTAuth::fromUser($user);
        $baseUrl = Config::get('app.url') . '/api/manufacturer?token=' . $token;

        $response = $this->json('GET', $baseUrl, []);

        $response->assertStatus(200);
    }
}
