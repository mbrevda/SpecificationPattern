<?php

namespace Mbrevda\Specification;

use \Mbrevda\Specification\SpecificationInterface;
use \Mbrevda\Specification\CompositeSpecification;

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
