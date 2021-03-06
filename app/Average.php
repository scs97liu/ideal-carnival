<?php namespace App;

class Average
{
    private $values;
    private $average;
    private $count;
    private $high;
    private $low;

    public function __construct()
    {
        $this->values = [];
        $this->average = 0;
        $this->count = 0;
        $this->high = null;
        $this->low = null;
    }


    public function addValue($value)
    {
        if($this->high === null || $this->high < $value) $this->high = $value;
        if($this->low === null || $this->low > $value) $this->low = $value;
        $this->values[] = $value;
        $this->count++;
        $this->average = round($this->total() / $this->count,   1);
    }

    private function total()
    {
        $total = 0;
        foreach($this->values as $value)
        {
            $total += $value;
        }
        return $total;
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param array $values
     */
    public function setValues($values)
    {
        $this->values = $values;
    }

    /**
     * @return int
     */
    public function getAverage()
    {
        return round($this->average, 1);
    }

    /**
     * @param int $average
     */
    public function setAverage($average)
    {
        $this->average = $average;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return null
     */
    public function getHigh()
    {
        return round($this->high, 1);
    }

    /**
     * @param null $high
     */
    public function setHigh($high)
    {
        $this->high = $high;
    }

    /**
     * @return null
     */
    public function getLow()
    {
        return round($this->low, 1);
    }

    /**
     * @param null $low
     */
    public function setLow($low)
    {
        $this->low = $low;
    }

    

}