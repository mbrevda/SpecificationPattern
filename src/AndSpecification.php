<?php

namespace Mbrevda\SpecificationPattern;

use \Mbrevda\SpecificationPattern\SpecificationInterface;
use \Mbrevda\SpecificationPattern\CompositeSpecification;

class AndSpecification extends CompositeSpecification
{
    private $specification1;
    private $specification2;

    public function __construct(
        SpecificationInterface $specification1,
        SpecificationInterface $specification2
    ) {
        $this->specification1 = $specification1;
        $this->specification2 = $specification2;
    }

    public function isSatisfiedBy($candidate)
    {
        return $this->specification1->isSatisfiedBy($candidate)
            && $this->specification2->isSatisfiedBy($candidate);
    }
}
