<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\users;
use App\Models\categories;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToDoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    //  test insert / check user
    /** @test */
    public function it_can_check_user_and_store_in_database()
    {
        $data = [
            'name' => 'Test User4',
            'email' => 'test4@example.com',
            'username' => 'testuser4',
        ];

        $response = $this->postJson('/api/checkUser', $data);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message',
            'user_id',
        ]);

        // Periksa apakah user telah tersimpan di database
        $this->assertDatabaseHas('users', [
            'name' => 'Test User4',
            'email' => 'test4@example.com',
            'username' => 'testuser4',
        ]);
    }

    /** @test */
    public function it_fails_if_name_email_or_username_is_already_taken()
    {
        // Buat user yang sudah ada di database
        $existingUser = users::factory()->create([
            'name' => 'Test User5',
            'email' => 'test5@example.com',
            'username' => 'testuser5',
        ]);

        // Data untuk pengujian
        $data = [
            'name' => 'Test User5',
            'email' => 'test5@example.com',
            'username' => 'testuser5',
        ];

        // Panggil API checkUser
        $response = $this->postJson('/api/checkUser', $data);

        // Periksa apakah response status 422 (validation error)
        $response->assertStatus(422);

        // Periksa apakah response memiliki message yang sesuai
        $response->assertJsonValidationErrors(['name', 'email', 'username']);
    }

    /** @test */
    // test insert tasks
    public function it_can_store_a_task_in_database()
    {
        // Buat user dan category untuk pengujian
        $user = users::factory()->create();

        // Data untuk pengujian
        $data = [
            'user_id' => $user->id,
            'category_id' => 1,
            'description' => 'Test Task Description',
            'created_at' => now(),
        ];

        // Panggil API store
        $response = $this->postJson('/api/create', $data);

        // Periksa apakah response status 201
        $response->assertStatus(201);

        // Periksa apakah task benar-benar disimpan di database
        $this->assertDatabaseHas('tasks', [
            'user_id' => $user->id,
            'category_id' => 1,
            'description' => 'Test Task Description',
            'created_at' => now(),
        ]);
    }

    /** @test */
    public function it_fails_if_description_or_category_id_is_missing()
    {
        // Buat user untuk pengujian
        $user = users::factory()->create();

        // Data yang salah untuk pengujian (tanpa category_id)
        $data = [
            'user_id' => $user->id,
            'description' => 'Test Task Description',
        ];

        // Panggil API store dengan data yang salah
        $response = $this->postJson('/api/create', $data);

        // Periksa apakah response status 422 (validation error)
        $response->assertStatus(422);

        // Periksa apakah response memiliki pesan validasi yang tepat
        $response->assertJsonValidationErrors(['category_id']);
    }
}
