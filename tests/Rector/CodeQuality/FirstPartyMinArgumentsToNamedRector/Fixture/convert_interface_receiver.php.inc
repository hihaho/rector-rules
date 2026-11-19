<?php

namespace App;

// Named against the interface signature. PHPStan's argument.parameterRenamedInSubtype
// reports an analysed implementation that renames one of these parameters.
use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Renderer;

function run(Renderer $renderer): string
{
    return $renderer->render('card', 320, true);
}

?>
-----
<?php

namespace App;

// Named against the interface signature. PHPStan's argument.parameterRenamedInSubtype
// reports an analysed implementation that renames one of these parameters.
use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Renderer;

function run(Renderer $renderer): string
{
    return $renderer->render(template: 'card', width: 320, inline: true);
}

?>
