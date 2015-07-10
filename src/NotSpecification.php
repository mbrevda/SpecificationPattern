<?php

namespace Mbrevda\SpecificationPattern;

use \Mbrevda\SpecificationPattern\SpecificationInterface;
use \Mbrevda\SpecificationPattern\CompositeSpecification;

class NotSpecification extends CompositeSpecification
{
    private $specification;

    public function __construct(
        SpecificationInterface $specification
    ) {
        $this->specification = $specification;
    }

    public function isSatisfiedBy($candidate)
    {
        return !$this->specification->isSatisfiedBy($candidate);
    }
}
