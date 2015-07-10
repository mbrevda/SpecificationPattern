<?php

namespace Mbrevda\SpecificationPattern\Tests\Mocks;

use \Mbrevda\SpecificationPattern\CompositeSpecification;

class NoticeNotSentSpecification extends CompositeSpecification
{

    public function isSatisfiedBy($candidate)
    {
        return $candidate->hasSentNotice == false;
    }
}
