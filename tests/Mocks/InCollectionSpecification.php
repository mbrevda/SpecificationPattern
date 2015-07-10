<?php

namespace Mbrevda\SpecificationPattern\Tests\Mocks;

use \Mbrevda\SpecificationPattern\CompositeSpecification;

class InCollectionSpecification extends CompositeSpecification
{

    public function isSatisfiedBy($candidate)
    {
        return $candidate->isInCollection;
    }
}
