<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\StockIn;

class StockInApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_stock_in()
    {
        $stockIn = factory(StockIn::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/stock_ins', $stockIn
        );

        $this->assertApiResponse($stockIn);
    }

    /**
     * @test
     */
    public function test_read_stock_in()
    {
        $stockIn = factory(StockIn::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/stock_ins/'.$stockIn->id
        );

        $this->assertApiResponse($stockIn->toArray());
    }

    /**
     * @test
     */
    public function test_update_stock_in()
    {
        $stockIn = factory(StockIn::class)->create();
        $editedStockIn = factory(StockIn::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/stock_ins/'.$stockIn->id,
            $editedStockIn
        );

        $this->assertApiResponse($editedStockIn);
    }

    /**
     * @test
     */
    public function test_delete_stock_in()
    {
        $stockIn = factory(StockIn::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/stock_ins/'.$stockIn->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/stock_ins/'.$stockIn->id
        );

        $this->response->assertStatus(404);
    }
}
