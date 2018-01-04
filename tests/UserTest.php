<?
        
use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
    
    protected $user;

    public function SetUp()
    {
        echo "setup has been called".PHP_EOL;
        $this->user = new User;
    }

    public function test_it_can_get_firstname()
    {
        $this->user->setFirstName('sb');

        $this->assertEquals($this->user->getFirstName(), 'sb');
    }

    public function test_it_can_get_lastname()
    {
        $this->user->setLastName('sb');
        $this->assertEquals($this->user->getLastName(), 'sb');
    }

    /** @test */
    public function it_should_can_get_fullname()
    {
        $this->user->setFirstName('xu');
        $this->user->setLastName('dong');


        $this->assertEquals($this->user->getFullName(), 'xu dong');
    }

    /** @test */
    public function it_should_be_trimed_when_set_firstname_and_lastname()
    {
        $this->user->setFirstName(' sb     ');
        $this->user->setLastName('    dong ');
        $this->assertEquals($this->user->getFullName(), 'sb dong');
    }

    /** @test */
    public function it_can_set_email()
    {
        $this->user->setEmail('sb@qq.com');

        $this->assertEquals($this->user->getEmail(), 'sb@qq.com');
    }

    /** @test */
    public function it_can_contain_correct_variables()
    {
        $this->user->setFirstName('xu');
        $this->user->setLastName('dong');
        $this->user->setEmail('xudong7930@126.com');

        $profile = $this->user->getProfile();

        $this->assertArrayHasKey('fullname', $profile);
        $this->assertArrayHasKey('email', $profile);
    }
}