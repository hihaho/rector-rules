<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\BaseDocumentModel;

// parent:: resolves to the parent class, where the matching constant lives.
class ContractDocumentModel extends BaseDocumentModel
{
    public static function withAttachments(): void
    {
        parent::with('attachments');
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\BaseDocumentModel;

// parent:: resolves to the parent class, where the matching constant lives.
class ContractDocumentModel extends BaseDocumentModel
{
    public static function withAttachments(): void
    {
        parent::with(parent::ATTACHMENTS);
    }
}
