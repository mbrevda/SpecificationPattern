<?php

namespace Mbrevda\Specification;

use \Mbrevda\Specification\SpecificationInterface;
use \Mbrevda\Specification\AndSpecification;
use \Mbrevda\Specification\OrSpecification;
use \Mbrevda\Specification\NotSpecification;

abstract class CompositeSpecification implements SpecificationInterface
{
    public abstract function isSatisfiedBy($candidate);

    public function andX(SpecificationInterface $specification)
    {
        return new AndSpecification($this, $specification);
    }

    public function orX(SpecificationInterface $specification)
    {
        return new OrSpecification($this, $specification);
    }

    public function not()
    {
        return new NotSpecification($this);
    }
}
