<?php

namespace Mbrevda\Specification\Tests\Mocks;

use \Mbrevda\Specification\CompositeSpecification;

class NoticeNotSentSpecification extends CompositeSpecification
{

    public function isSatisfiedBy($candidate)
    {
        return $candidate->hasSentNotice == false;
    }
}
