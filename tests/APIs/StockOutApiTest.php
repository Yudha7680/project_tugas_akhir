<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\StockOut;

class StockOutApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_stock_out()
    {
        $stockOut = factory(StockOut::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/stock_outs', $stockOut
        );

        $this->assertApiResponse($stockOut);
    }

    /**
     * @test
     */
    public function test_read_stock_out()
    {
        $stockOut = factory(StockOut::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/stock_outs/'.$stockOut->id
        );

        $this->assertApiResponse($stockOut->toArray());
    }

    /**
     * @test
     */
    public function test_update_stock_out()
    {
        $stockOut = factory(StockOut::class)->create();
        $editedStockOut = factory(StockOut::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/stock_outs/'.$stockOut->id,
            $editedStockOut
        );

        $this->assertApiResponse($editedStockOut);
    }

    /**
     * @test
     */
    public function test_delete_stock_out()
    {
        $stockOut = factory(StockOut::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/stock_outs/'.$stockOut->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/stock_outs/'.$stockOut->id
        );

        $this->response->assertStatus(404);
    }
}
