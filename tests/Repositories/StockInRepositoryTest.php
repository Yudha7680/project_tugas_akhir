<?php namespace Tests\Repositories;

use App\Models\StockIn;
use App\Repositories\StockInRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StockInRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StockInRepository
     */
    protected $stockInRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stockInRepo = \App::make(StockInRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_stock_in()
    {
        $stockIn = factory(StockIn::class)->make()->toArray();

        $createdStockIn = $this->stockInRepo->create($stockIn);

        $createdStockIn = $createdStockIn->toArray();
        $this->assertArrayHasKey('id', $createdStockIn);
        $this->assertNotNull($createdStockIn['id'], 'Created StockIn must have id specified');
        $this->assertNotNull(StockIn::find($createdStockIn['id']), 'StockIn with given id must be in DB');
        $this->assertModelData($stockIn, $createdStockIn);
    }

    /**
     * @test read
     */
    public function test_read_stock_in()
    {
        $stockIn = factory(StockIn::class)->create();

        $dbStockIn = $this->stockInRepo->find($stockIn->id);

        $dbStockIn = $dbStockIn->toArray();
        $this->assertModelData($stockIn->toArray(), $dbStockIn);
    }

    /**
     * @test update
     */
    public function test_update_stock_in()
    {
        $stockIn = factory(StockIn::class)->create();
        $fakeStockIn = factory(StockIn::class)->make()->toArray();

        $updatedStockIn = $this->stockInRepo->update($fakeStockIn, $stockIn->id);

        $this->assertModelData($fakeStockIn, $updatedStockIn->toArray());
        $dbStockIn = $this->stockInRepo->find($stockIn->id);
        $this->assertModelData($fakeStockIn, $dbStockIn->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_stock_in()
    {
        $stockIn = factory(StockIn::class)->create();

        $resp = $this->stockInRepo->delete($stockIn->id);

        $this->assertTrue($resp);
        $this->assertNull(StockIn::find($stockIn->id), 'StockIn should not exist in DB');
    }
}
