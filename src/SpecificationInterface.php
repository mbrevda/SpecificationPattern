<?php

namespace Mbrevda\Specification;

interface SpecificationInterface
{
    public function isSatisfiedBy($candidate);
}
