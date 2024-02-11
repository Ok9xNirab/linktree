<?php

test('required fields', function () {
    /** @var Tests\TestCase $this */
    $response = $this->post('/signup', [], [
        'accept' => 'application/json',
    ]);
    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['username', 'name', 'email', 'password']);
    $response->assertJsonStructure([
        'message',
        'errors' => [
            'username',
            'name',
            'email',
            'password'
        ],
    ]);
});

// working
test('username & email existence validation', function () {
    /** @var Tests\TestCase $this */

    \App\Models\User::create([
        'name' => 'Istiaq Nirab',
        'username' => 'ok9xnirab',
        'email' => 'user@test.com',
        'password' => bcrypt('password'),
    ]);

    $response = $this->post('/signup', [
        'name' => 'Istiaq Nirab',
        'username' => 'ok9xnirab',
        'email' => 'user@test.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ], [
        'accept' => 'application/json',
    ]);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['username', 'email']);
});

test('registration', function () {
    /** @var Tests\TestCase $this */
    $name = 'Istiaq Nirab';
    $username = 'ok9xnirab';
    $email = 'user@test.com';

    $response = $this->post('/signup', [
        'name' => $name,
        'username' => $username,
        'email' => $email,
        'password' => 'password',
        'password_confirmation' => 'password',
    ], [
        'accept' => 'application/json',
    ]);

    $response->assertStatus(201);
    $res_data = $response->decodeResponseJson()['data'];
    $this->assertArrayHasKey('token', $res_data);

    $this->assertArrayHasKey('name', $res_data);
    $this->assertEquals($name, $res_data['name']);

    $this->assertArrayHasKey('username', $res_data);
    $this->assertEquals($username, $res_data['username']);

    $this->assertArrayHasKey('email', $res_data);
    $this->assertEquals($email, $res_data['email']);
});
