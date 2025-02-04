<?php

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_product()
    {
        $response = $this->postJson('/api/products', [
            'name' => 'Test Product',
            'price' => 99.99,
            'stock' => 10,
        ]);

        $response->assertStatus(201)->assertJson(['name' => 'Test Product']);
    }
}
