<?

namespace App\Calculator;

use App\Calculator\Exceptions\ZeroDivisionException;

class Division implements OperationInterface
{
    protected $operands;

    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }

    public function calculate()
    {
        if ($this->operands[1] == 0) {
            throw new ZeroDivisionException;
        }

        return $this->operands[0] / $this->operands[1];
    }
}