<?

namespace App\Support;

use IteratorAggregate;
use ArrayIterator;
use JsonSerializable;

class Collection implements IteratorAggregate, JsonSerializable
{

    protected $items = [];

    public function __construct(array $items=[])
    {
        $this->items = $items;
    }

    public function get()
    {
        return $this->items;
    }

    public function count()
    {
        return count($this->items);
    }

    public function getIterator()
    {
        // return [];
        return new ArrayIterator($this->items);
    }

    public function merge(Collection $collection)
    {
        // return new Collection(array_merge($this->get(), $collection->get()));
        return $this->add($collection->get());
    }

    public function add(array $items)
    {
        $this->items = array_merge($this->get(), $items);
        return $this;
    }

    public function toJson()
    {
        return json_encode($this->get());
    }

    public function jsonSerialize()
    {
        return $this->get();
    }
}