<?

use App\Calculator\Addition;
use App\Calculator\Exceptions\NoOperandsException;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase {
    
    public function test_it_can_addup_when_given_addition()
    {    
        $addition = new Addition;
        $addition->setOperands([10, 5]);

        $this->assertEquals(15, $addition->calculate());
    }    

    /** @test */
    public function it_should_be_exception_when_novalue_given()
    {
        $this->expectException(NoOperandsException::class);
        
        $addition = new Addition;
        $addition->calculate();
    }

}