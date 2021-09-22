<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ProductControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    
    
    public function test_can_create_product()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzMjIyMjcxMiwiZXhwIjoxNjMyMjI2MzEyLCJuYmYiOjE2MzIyMjI3MTIsImp0aSI6IlNqaExlOTFzQ1lCdFQwOEQiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.I4TY304iL71PzBG7_j30KOVpR6XWO49pPnrYGoAUnq4';
        
        $data = [
            'name' => 'first product',
            'description' => 'first product description'
        ];

        $response = $this->json('POST', '/api/products', $data, [
            'Authorization' => 'Bearer '.$token,
        ]);

        $response->seeStatusCode(201);
        $response->seeJsonStructure([
            'status',
            'message'
        ]);

    }

    public function test_can_get_products()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzMjIyMjcxMiwiZXhwIjoxNjMyMjI2MzEyLCJuYmYiOjE2MzIyMjI3MTIsImp0aSI6IlNqaExlOTFzQ1lCdFQwOEQiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.I4TY304iL71PzBG7_j30KOVpR6XWO49pPnrYGoAUnq4';
        
        $response = $this->json('GET', '/api/products', [], [
            'Authorization' => 'Bearer '.$token,
        ]);

        $response->seeStatusCode(200);
    }

    public function test_can_get_product()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzMjIyMjcxMiwiZXhwIjoxNjMyMjI2MzEyLCJuYmYiOjE2MzIyMjI3MTIsImp0aSI6IlNqaExlOTFzQ1lCdFQwOEQiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.I4TY304iL71PzBG7_j30KOVpR6XWO49pPnrYGoAUnq4';
        
        $response = $this->json('GET', '/api/products/1', [], [
            'Authorization' => 'Bearer '.$token,
        ]);

        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function test_can_update_product()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzMjIyMjcxMiwiZXhwIjoxNjMyMjI2MzEyLCJuYmYiOjE2MzIyMjI3MTIsImp0aSI6IlNqaExlOTFzQ1lCdFQwOEQiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.I4TY304iL71PzBG7_j30KOVpR6XWO49pPnrYGoAUnq4';
        
        $data = [
            'name' => 'product',
            'description' => 'product description'
        ];

        $response = $this->json('PUT', '/api/products/15', $data, [
            'Authorization' => 'Bearer '.$token,
        ]);

        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            'status',
            'message'
        ]);

    }

    public function test_can_delete_product()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzMjIyMjcxMiwiZXhwIjoxNjMyMjI2MzEyLCJuYmYiOjE2MzIyMjI3MTIsImp0aSI6IlNqaExlOTFzQ1lCdFQwOEQiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.I4TY304iL71PzBG7_j30KOVpR6XWO49pPnrYGoAUnq4';
        
        $response = $this->json('DELETE', '/api/products/66', [], [
            'Authorization' => 'Bearer '.$token,
        ]);

        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            'status',
            'message'
        ]);
    }

    public function testDatabase()
    {
       $this->seeInDatabase('users', ['email' => 'vikash@gmail.com']);
       $this->seeInDatabase('products',['name' => 'first product']);
    }

}
