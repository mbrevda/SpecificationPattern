<?php

namespace Mbrevda\Specification;

use \Mbrevda\Specification\SpecificationInterface;
use \Mbrevda\Specification\CompositeSpecification;

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
