<?php namespace Tests\Repositories;

use App\Models\StockOut;
use App\Repositories\StockOutRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StockOutRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StockOutRepository
     */
    protected $stockOutRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stockOutRepo = \App::make(StockOutRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_stock_out()
    {
        $stockOut = factory(StockOut::class)->make()->toArray();

        $createdStockOut = $this->stockOutRepo->create($stockOut);

        $createdStockOut = $createdStockOut->toArray();
        $this->assertArrayHasKey('id', $createdStockOut);
        $this->assertNotNull($createdStockOut['id'], 'Created StockOut must have id specified');
        $this->assertNotNull(StockOut::find($createdStockOut['id']), 'StockOut with given id must be in DB');
        $this->assertModelData($stockOut, $createdStockOut);
    }

    /**
     * @test read
     */
    public function test_read_stock_out()
    {
        $stockOut = factory(StockOut::class)->create();

        $dbStockOut = $this->stockOutRepo->find($stockOut->id);

        $dbStockOut = $dbStockOut->toArray();
        $this->assertModelData($stockOut->toArray(), $dbStockOut);
    }

    /**
     * @test update
     */
    public function test_update_stock_out()
    {
        $stockOut = factory(StockOut::class)->create();
        $fakeStockOut = factory(StockOut::class)->make()->toArray();

        $updatedStockOut = $this->stockOutRepo->update($fakeStockOut, $stockOut->id);

        $this->assertModelData($fakeStockOut, $updatedStockOut->toArray());
        $dbStockOut = $this->stockOutRepo->find($stockOut->id);
        $this->assertModelData($fakeStockOut, $dbStockOut->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_stock_out()
    {
        $stockOut = factory(StockOut::class)->create();

        $resp = $this->stockOutRepo->delete($stockOut->id);

        $this->assertTrue($resp);
        $this->assertNull(StockOut::find($stockOut->id), 'StockOut should not exist in DB');
    }
}
