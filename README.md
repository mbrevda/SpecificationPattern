# Specification Pattern

Sample implementation for the Specification Pattern in PHP, based on https://en.wikipedia.org/wiki/Specification_pattern.

# Usage

An example of how this might be used. Also check out the tests.

```php
$invoices       = /* load invoices from somewhere*/;
$overDue        = new OverDueSpecification(time());
$noticeNotSent  = new NoticeNotSentSpecification();
$inCollection   = new InCollectionSpecification();

// we want a list of invoices that need to be remitted
// show all invoices that are overdue, no notice has been sent, and isn't in collection
$needsToBeRemitted = $overDue
    ->andX($noticeNotSent)
    ->andX(new NotSpecification($inCollection));

$satisfying = array_filter($invoices, function($invoice) {
    return $needsToBeRemitted->isSatisfyableBy($invoice);
})
```
