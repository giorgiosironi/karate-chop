<?php

class ChopTest extends PHPUnit_Framework_TestCase
{
    public function testCorrectElementIsFoundWithIterativeBinarySearch()
    {
        $this->executeAllTestsOn('iterative_search');
    }

    public function testCorrectElementIsFoundWithRecursiveBinarySearch()
    {
        $this->executeAllTestsOn('recursive_search');
    }

    private function executeAllTestsOn($function)
    {
        $this->assertEquals(-1, $function(3, []));
        $this->assertEquals(-1, $function(3, [1]));
        $this->assertEquals(0,  $function(1, [1]));

        $this->assertEquals(0,  $function(1, [1, 3, 5]));
        $this->assertEquals(1,  $function(3, [1, 3, 5]));
        $this->assertEquals(2,  $function(5, [1, 3, 5]));
        $this->assertEquals(-1, $function(0, [1, 3, 5]));
        $this->assertEquals(-1, $function(2, [1, 3, 5]));
        $this->assertEquals(-1, $function(4, [1, 3, 5]));
        $this->assertEquals(-1, $function(6, [1, 3, 5]));

        $this->assertEquals(0,  $function(1, [1, 3, 5, 7]));
        $this->assertEquals(1,  $function(3, [1, 3, 5, 7]));
        $this->assertEquals(2,  $function(5, [1, 3, 5, 7]));
        $this->assertEquals(3,  $function(7, [1, 3, 5, 7]));
        $this->assertEquals(-1, $function(0, [1, 3, 5, 7]));
        $this->assertEquals(-1, $function(2, [1, 3, 5, 7]));
        $this->assertEquals(-1, $function(4, [1, 3, 5, 7]));
        $this->assertEquals(-1, $function(6, [1, 3, 5, 7]));
        $this->assertEquals(-1, $function(8, [1, 3, 5, 7]));
    }
}

function iterative_search($element, $list)
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

function recursive_search($element, $list)
{
    $start = 0;
    $end = count($list) - 1;
    return recursive_loop($element, $list, $start, $end);
}

function recursive_loop($element, $list, $start, $end)
{
    if ($start > $end) {
        return -1;
    }
    $pivot = floor(($start + $end) / 2);
    if ($list[$pivot] == $element) {
        return $pivot;
    } else if ($list[$pivot] > $element) {
        return recursive_loop($element, $list, $start, $pivot - 1);
    } else /* if ($list[$pivot] < $element) */ {
        return recursive_loop($element, $list, $pivot + 1, $end);
    }
}
