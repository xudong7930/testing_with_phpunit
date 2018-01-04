<?
        
use App\Calculator\Division;
use App\Calculator\Exceptions\ZeroDivisionException;
use PHPUnit\Framework\TestCase;

class DivitionTest extends TestCase {

    /** @test */
    public function it_can_be_divide_with_array()
    {
        $division = new Division;
        $division->setOperands([1,2]);
        $this->assertEquals(0.5, $division->calculate());
    }


    /** @test */
    public function it_should_throw_zeroexception_when_divideby_zero()
    {
        $this->expectException(ZeroDivisionException::class);

        $division = new Division;
        $division->setOperands([1, 0]);
        $division->calculate();
    }

}