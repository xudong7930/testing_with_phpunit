<?

        
use App\Support\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase {
    
    public function test_it_should_correct_when_count_passed_in_items()
    {
        $collection = new Collection(['one', 'two', 'three']);

        $this->assertEquals(3, $collection->count());
        $this->assertEquals($collection->get()[0], 'one');
        $this->assertCount(3, $collection->get());
    }
    public function test_it_should_return_no_items_when_empty_instance()
    {
        $collection = new Collection;

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function it_should_be_instance_from_iterator()
    {
        $collection = new Collection;
        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    public function test_it_can_be_iterated()
    {
        $collection = new Collection(['one', 'two', 'three']);
        $items = [];
        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }


    public function test_it_can_be_merged_with_another_collection()
    {
        $collection = new Collection(['one', 'two', 'three']);
        $collection2 = new Collection(['four', 'five', 'six']);

        $newCollection = $collection->merge($collection2);

        $items = [];
        foreach ($newCollection as $item) {
            $items[] = $item;
        }

        $this->assertCount(6, $items);
        $this->assertInstanceOf(IteratorAggregate::class, $newCollection);
    }


    public function test_it_can_be_added_to_existed_item()
    {
        $collection = new Collection(['one']);
        $collection->add(['two']);
        $this->assertCount(2, $collection->get());
    }

    /** @test */
    public function it_should_return_json_string()
    {
        $collection = new Collection(['one']);
        $this->assertInternalType('string', $collection->toJson());
        $this->assertEquals(json_encode(['one']), $collection->toJson());
    }

    /** @test */
    public function it_can_be_jsonencoded_with_instance_collection()
    {
        $collection = new Collection(['one']);
        $encoded = json_encode($collection);

        $this->assertInternalType('string', $encoded);
        $this->assertEquals(json_encode(['one']), $encoded);
    }
}