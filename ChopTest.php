<?php

class ChopTest extends PHPUnit_Framework_TestCase
{
    public function testCorrectElementIsFoundWithBinarySearch()
    {
        $this->assertEquals(-1, search(3, []));
        $this->assertEquals(-1, search(3, [1]));
        $this->assertEquals(0,  search(1, [1]));

        $this->assertEquals(0,  search(1, [1, 3, 5]));
        $this->assertEquals(1,  search(3, [1, 3, 5]));
        $this->assertEquals(2,  search(5, [1, 3, 5]));
        $this->assertEquals(-1, search(0, [1, 3, 5]));
        $this->assertEquals(-1, search(2, [1, 3, 5]));
        $this->assertEquals(-1, search(4, [1, 3, 5]));
        $this->assertEquals(-1, search(6, [1, 3, 5]));

        $this->assertEquals(0,  search(1, [1, 3, 5, 7]));
        $this->assertEquals(1,  search(3, [1, 3, 5, 7]));
        $this->assertEquals(2,  search(5, [1, 3, 5, 7]));
        $this->assertEquals(3,  search(7, [1, 3, 5, 7]));
        $this->assertEquals(-1, search(0, [1, 3, 5, 7]));
        $this->assertEquals(-1, search(2, [1, 3, 5, 7]));
        $this->assertEquals(-1, search(4, [1, 3, 5, 7]));
        $this->assertEquals(-1, search(6, [1, 3, 5, 7]));
        $this->assertEquals(-1, search(8, [1, 3, 5, 7]));
    }
}

function search($element, $list)
{
    $start = 0;
    $end = count($list) - 1;
    while ($start <= $end) {
        $pivot = floor(($start + $end) / 2);
        if ($list[$pivot] == $element) {
            return $pivot;
        } else if ($list[$pivot] > $element) {
            $end = $pivot - 1;
        } else /* if ($list[$pivot] < $element) */ {
            $start = $pivot + 1;
        }
    }
    return -1;
}

