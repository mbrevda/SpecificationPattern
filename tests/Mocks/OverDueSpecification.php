<?php

namespace Mbrevda\SpecificationPattern\Tests\Mocks;

use \Mbrevda\SpecificationPattern\CompositeSpecification;

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
