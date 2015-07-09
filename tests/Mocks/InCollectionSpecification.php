<?php

namespace Mbrevda\Specification\Tests\Mocks;

use \Mbrevda\Specification\CompositeSpecification;

class InCollectionSpecification extends CompositeSpecification
{

    public function isSatisfiedBy($candidate)
    {
        return $candidate->isInCollection;
    }
}
