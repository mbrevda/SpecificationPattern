<?php

namespace Mbrevda\Specification\Tests\Mocks;

use \Mbrevda\Specification\CompositeSpecification;

class OverDueSpecification extends CompositeSpecification
{
    private $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function isSatisfiedBy($candidate)
    {
        return $candidate->dueDate < $this->date;
    }
}
