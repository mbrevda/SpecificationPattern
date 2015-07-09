<?php

namespace Mbrevda\Specification\Tests;

use Mbrevda\Specification\NotSpecification;
use Mbrevda\Specification\Tests\Mocks\OverDueSpecification;
use Mbrevda\Specification\Tests\Mocks\NoticeNotSentSpecification;
use Mbrevda\Specification\Tests\Mocks\InCollectionSpecification;

class Tests extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->invoices       = json_decode(file_get_contents(__DIR__ . '/db.json'));
        $this->overDue        = new OverDueSpecification(time());
        $this->noticeNotSent  = new NoticeNotSentSpecification();
        $this->inCollection   = new InCollectionSpecification();
    }

    public function usingSpec($spec)
    {
        $res = [];
        foreach ($this->invoices as $invoice) {
            if ($spec->isSatisfiedBy($invoice)) {
                $res[] = $invoice;
            }
        }

        return $res;
    }

    public function testOverDueSpecification(){
        $this->assertFalse($this->overDue->isSatisfiedBy($this->invoices[0]));
        $this->assertTrue($this->overDue->isSatisfiedBy($this->invoices[1]));
        $this->assertTrue($this->overDue->isSatisfiedBy($this->invoices[2]));
        $this->assertTrue($this->overDue->isSatisfiedBy($this->invoices[3]));
    }

    public function testNoticeSentSpecification(){
        $this->assertTrue($this->noticeNotSent->isSatisfiedBy($this->invoices[0]));
        $this->assertTrue($this->noticeNotSent->isSatisfiedBy($this->invoices[1]));
        $this->assertFalse($this->noticeNotSent->isSatisfiedBy($this->invoices[2]));
        $this->assertTrue($this->noticeNotSent->isSatisfiedBy($this->invoices[3]));
    }

    public function testInCollectionSpecification(){
        $this->assertFalse($this->inCollection->isSatisfiedBy($this->invoices[0]));
        $this->assertTrue($this->inCollection->isSatisfiedBy($this->invoices[1]));
        $this->assertFalse($this->inCollection->isSatisfiedBy($this->invoices[2]));
        $this->assertFalse($this->inCollection->isSatisfiedBy($this->invoices[3]));
    }

    public function testAndX()
    {
        $spec = $this->overDue->andX($this->noticeNotSent);
        $this->assertCount(2, $this->usingSpec($spec));
    }

    public function testAndXandNot()
    {
        $spec = $this->overDue
            ->andX($this->noticeNotSent)
            ->not(new NotSpecification($this->inCollection));
        $this->assertCount(2, $this->usingSpec($spec));
    }

    public function testAndandNot()
    {
        $spec = $this->overDue
            ->andX($this->noticeNotSent)
            ->not(new NotSpecification($this->inCollection));
        $this->assertCount(2, $this->usingSpec($spec));
    }

    public function testOr()
    {
        $spec = $this->overDue
            ->orX(new NotSpecification($this->overDue));

        $this->assertCount(4, $this->usingSpec($spec));
    }
}
