<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\InvoiceDocumentModel;

// The matching constant is inherited from the parent — still a valid reference.
function loadInvoiceAttachments(InvoiceDocumentModel $invoice): void
{
    $invoice->loadMissing('attachments');
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\InvoiceDocumentModel;

// The matching constant is inherited from the parent — still a valid reference.
function loadInvoiceAttachments(InvoiceDocumentModel $invoice): void
{
    $invoice->loadMissing(InvoiceDocumentModel::ATTACHMENTS);
}
