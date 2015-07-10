<?php

namespace Mbrevda\SpecificationPattern;

use \Mbrevda\SpecificationPattern\SpecificationInterface;
use \Mbrevda\SpecificationPattern\CompositeSpecification;

class OrSpecification extends CompositeSpecification
{
    private $one;
    private $other;

    public function __construct(
        SpecificationInterface $one,
        SpecificationInterface $other
    ) {
        $this->one = $one;
        $this->other = $other;
    }

    public function isSatisfiedBy($candidate)
    {
        return $this->one->isSatisfiedBy($candidate)
            || $this->other->isSatisfiedBy($candidate);
    }
}
