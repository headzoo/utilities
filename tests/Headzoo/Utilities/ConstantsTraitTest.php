<?php
use Headzoo\Utilities\ConstantsTrait;

class DaysTestClass
{
    use ConstantsTrait;
    
    const SUNDAY    = "Sunday";
    const MONDAY    = "Monday";
    const TUESDAY   = "Tuesday";
    const WEDNESDAY = "Wednesday";
    const THURSDAY  = "Thursday";
    const FRIDAY    = "Friday";
    const SATURDAY  = "Saturday";
}

class HolidaysTestClass
{
    use ConstantsTrait;
    
    const CHRISTMAS = "Christmas";
    const EASTER    = "Easter";
    const NEW_YEARS = "New Years";
}

class ConstantsTraitTest
    extends PHPUnit_Framework_TestCase
{
    private static $days_constants = [
        "SUNDAY"    => "Sunday",
        "MONDAY"    => "Monday",
        "TUESDAY"   => "Tuesday",
        "WEDNESDAY" => "Wednesday",
        "THURSDAY"  => "Thursday",
        "FRIDAY"    => "Friday",
        "SATURDAY"  => "Saturday"
    ];
    
    private static $holidays_constants = [
        "CHRISTMAS" => "Christmas",
        "EASTER"    => "Easter",
        "NEW_YEARS" => "New Years"
    ];

    /**
     * @covers Headzoo\Utilities\ConstantsTrait::constants
     */
    public function testConstants()
    {
        $this->assertEquals(
            self::$days_constants,
            DaysTestClass::constants()
        );
        $this->assertEquals(
            self::$holidays_constants,
            HolidaysTestClass::constants()
        );
        
        $days = new DaysTestClass();
        $this->assertEquals(
            self::$days_constants,
            $days->constants()
        );
    }

    /**
     * @covers Headzoo\Utilities\ConstantsTrait::constant
     */
    public function testConstant()
    {
        $this->assertEquals(
            "Tuesday",
            DaysTestClass::constant("TUESDAY")
        );
        $this->assertEquals(
            "Tuesday",
            DaysTestClass::constant("tuesday")
        );
        $this->assertEquals(
            "Christmas",
            HolidaysTestClass::constant("CHRISTMAS")
        );
        $this->assertEquals(
            "Christmas",
            HolidaysTestClass::constant("christmas")
        );

        $days = new DaysTestClass();
        $this->assertEquals(
            "Tuesday",
            $days->constant("tuesday")
        );
    }

    /**
     * @covers Headzoo\Utilities\ConstantsTrait::constant
     * @expectedException Headzoo\Utilities\Exceptions\UndefinedConstantException
     */
    public function testConstant_Undefined()
    {
        DaysTestClass::constant("LUNCHDAY");
    }

    /**
     * @covers Headzoo\Utilities\ConstantsTrait::constantNames
     */
    public function testConstantNames()
    {
        $this->assertEquals(
            array_keys(self::$days_constants),
            DaysTestClass::constantNames()
        );
        $this->assertEquals(
            array_keys(self::$holidays_constants),
            HolidaysTestClass::constantNames()
        );
    }

    /**
     * @covers Headzoo\Utilities\ConstantsTrait::constantValues
     */
    public function testConstantValues()
    {
        $this->assertEquals(
            array_values(self::$days_constants),
            DaysTestClass::constantValues()
        );
        $this->assertEquals(
            array_values(self::$holidays_constants),
            HolidaysTestClass::constantValues()
        );
    }
}
