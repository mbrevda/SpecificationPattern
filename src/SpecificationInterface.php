<?php

namespace Mbrevda\SpecificationPattern;

interface SpecificationInterface
{
    public function isSatisfiedBy($candidate);
}
