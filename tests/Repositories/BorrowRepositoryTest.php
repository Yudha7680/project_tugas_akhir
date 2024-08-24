<?php namespace Tests\Repositories;

use App\Models\Borrow;
use App\Repositories\BorrowRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BorrowRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BorrowRepository
     */
    protected $borrowRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->borrowRepo = \App::make(BorrowRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_borrow()
    {
        $borrow = factory(Borrow::class)->make()->toArray();

        $createdBorrow = $this->borrowRepo->create($borrow);

        $createdBorrow = $createdBorrow->toArray();
        $this->assertArrayHasKey('id', $createdBorrow);
        $this->assertNotNull($createdBorrow['id'], 'Created Borrow must have id specified');
        $this->assertNotNull(Borrow::find($createdBorrow['id']), 'Borrow with given id must be in DB');
        $this->assertModelData($borrow, $createdBorrow);
    }

    /**
     * @test read
     */
    public function test_read_borrow()
    {
        $borrow = factory(Borrow::class)->create();

        $dbBorrow = $this->borrowRepo->find($borrow->id);

        $dbBorrow = $dbBorrow->toArray();
        $this->assertModelData($borrow->toArray(), $dbBorrow);
    }

    /**
     * @test update
     */
    public function test_update_borrow()
    {
        $borrow = factory(Borrow::class)->create();
        $fakeBorrow = factory(Borrow::class)->make()->toArray();

        $updatedBorrow = $this->borrowRepo->update($fakeBorrow, $borrow->id);

        $this->assertModelData($fakeBorrow, $updatedBorrow->toArray());
        $dbBorrow = $this->borrowRepo->find($borrow->id);
        $this->assertModelData($fakeBorrow, $dbBorrow->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_borrow()
    {
        $borrow = factory(Borrow::class)->create();

        $resp = $this->borrowRepo->delete($borrow->id);

        $this->assertTrue($resp);
        $this->assertNull(Borrow::find($borrow->id), 'Borrow should not exist in DB');
    }
}
