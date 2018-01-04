<?

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;
use App\Calculator\OperationInterface;

class Addition implements OperationInterface
{
    protected $operands;

    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }

    public function calculate()
    {
        if (!is_array($this->operands)) {
            throw new NoOperandsException;
        }
        return array_sum($this->operands);
    }
}