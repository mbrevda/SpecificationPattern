<?php

namespace Mbrevda\SpecificationPattern;

use \Mbrevda\SpecificationPattern\SpecificationInterface;
use \Mbrevda\SpecificationPattern\AndSpecification;
use \Mbrevda\SpecificationPattern\OrSpecification;
use \Mbrevda\SpecificationPattern\NotSpecification;

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
