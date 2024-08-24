<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Borrow;

class BorrowApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_borrow()
    {
        $borrow = factory(Borrow::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/borrows', $borrow
        );

        $this->assertApiResponse($borrow);
    }

    /**
     * @test
     */
    public function test_read_borrow()
    {
        $borrow = factory(Borrow::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/borrows/'.$borrow->id
        );

        $this->assertApiResponse($borrow->toArray());
    }

    /**
     * @test
     */
    public function test_update_borrow()
    {
        $borrow = factory(Borrow::class)->create();
        $editedBorrow = factory(Borrow::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/borrows/'.$borrow->id,
            $editedBorrow
        );

        $this->assertApiResponse($editedBorrow);
    }

    /**
     * @test
     */
    public function test_delete_borrow()
    {
        $borrow = factory(Borrow::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/borrows/'.$borrow->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/borrows/'.$borrow->id
        );

        $this->response->assertStatus(404);
    }
}
