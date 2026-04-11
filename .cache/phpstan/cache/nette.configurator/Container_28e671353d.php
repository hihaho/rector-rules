<?php
// source: phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.neon
// source: phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.levelmax.neon
// source: /Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/extension-installer/src/../../phpstan-strict-rules/rules.neon
// source: /Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/extension-installer/src/../../../rector/type-perfect/config/extension.neon
// source: /Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/extension-installer/src/../../../tomasvotruba/cognitive-complexity/config/extension.neon
// source: /Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/extension-installer/src/../../../tomasvotruba/type-coverage/config/extension.neon
// source: /Users/sandermuller/Documents/GitHub/rector-rules/phpstan.neon.dist
// source: array

/** @noinspection PhpParamsInspection,PhpMethodMayBeStaticInspection */

declare(strict_types=1);

class Container_28e671353d extends _PHPStan_5a70c2d68\Nette\DI\Container
{
	protected $tags = [
		'phpstan.parser.richParserNodeVisitor' => [
			'01' => true,
			'02' => true,
			'03' => true,
			'04' => true,
			'05' => true,
			'06' => true,
			'07' => true,
			'08' => true,
			'09' => true,
			'010' => true,
			'012' => true,
			'013' => true,
			'014' => true,
			'015' => true,
			'016' => true,
			'017' => true,
			'018' => true,
			'019' => true,
			'020' => true,
			'021' => true,
			'022' => true,
		],
		'phpstan.exprHandler' => [
			'040' => true,
			'041' => true,
			'042' => true,
			'043' => true,
			'044' => true,
			'045' => true,
			'046' => true,
			'047' => true,
			'048' => true,
			'049' => true,
			'050' => true,
			'051' => true,
			'052' => true,
			'053' => true,
			'054' => true,
			'055' => true,
			'056' => true,
			'057' => true,
			'058' => true,
			'059' => true,
			'060' => true,
			'061' => true,
			'062' => true,
			'063' => true,
			'064' => true,
			'065' => true,
			'069' => true,
			'070' => true,
			'071' => true,
			'072' => true,
			'073' => true,
			'074' => true,
			'075' => true,
			'076' => true,
			'077' => true,
			'078' => true,
			'079' => true,
			'080' => true,
			'081' => true,
			'082' => true,
			'083' => true,
			'084' => true,
			'085' => true,
			'086' => true,
			'087' => true,
			'088' => true,
			'089' => true,
			'090' => true,
			'091' => true,
			'092' => true,
			'093' => true,
			'094' => true,
			'095' => true,
			'096' => true,
			'097' => true,
			'098' => true,
			'099' => true,
			'0100' => true,
			'0101' => true,
			'0102' => true,
			'0103' => true,
			'0104' => true,
			'0105' => true,
			'0106' => true,
			'0107' => true,
			'0108' => true,
			'0109' => true,
		],
		'phpstan.broker.dynamicMethodReturnTypeExtension' => [
			'0129' => true,
			'0145' => true,
			'0195' => true,
			'0205' => true,
			'0221' => true,
			'0223' => true,
			'0227' => true,
			'0244' => true,
			'0259' => true,
			'0286' => true,
			'0288' => true,
			'0320' => true,
			'0786' => true,
			'0787' => true,
			'0788' => true,
			'0789' => true,
			'0790' => true,
			'0791' => true,
			'0792' => true,
			'0793' => true,
			'0794' => true,
			'0795' => true,
			'0796' => true,
		],
		'phpstan.dynamicStaticMethodThrowTypeExtension' => [
			'0130' => true,
			'0134' => true,
			'0186' => true,
			'0212' => true,
			'0218' => true,
			'0222' => true,
			'0243' => true,
			'0303' => true,
		],
		'phpstan.broker.dynamicFunctionReturnTypeExtension' => [
			'0131' => true,
			'0132' => true,
			'0133' => true,
			'0135' => true,
			'0136' => true,
			'0137' => true,
			'0138' => true,
			'0140' => true,
			'0141' => true,
			'0143' => true,
			'0144' => true,
			'0146' => true,
			'0147' => true,
			'0148' => true,
			'0149' => true,
			'0150' => true,
			'0152' => true,
			'0153' => true,
			'0156' => true,
			'0157' => true,
			'0159' => true,
			'0163' => true,
			'0164' => true,
			'0167' => true,
			'0168' => true,
			'0169' => true,
			'0170' => true,
			'0171' => true,
			'0172' => true,
			'0173' => true,
			'0175' => true,
			'0177' => true,
			'0178' => true,
			'0179' => true,
			'0180' => true,
			'0181' => true,
			'0182' => true,
			'0184' => true,
			'0187' => true,
			'0189' => true,
			'0190' => true,
			'0191' => true,
			'0192' => true,
			'0194' => true,
			'0200' => true,
			'0202' => true,
			'0203' => true,
			'0206' => true,
			'0207' => true,
			'0208' => true,
			'0209' => true,
			'0211' => true,
			'0213' => true,
			'0214' => true,
			'0219' => true,
			'0220' => true,
			'0226' => true,
			'0228' => true,
			'0229' => true,
			'0230' => true,
			'0232' => true,
			'0233' => true,
			'0234' => true,
			'0236' => true,
			'0237' => true,
			'0238' => true,
			'0239' => true,
			'0240' => true,
			'0241' => true,
			'0242' => true,
			'0245' => true,
			'0246' => true,
			'0249' => true,
			'0250' => true,
			'0253' => true,
			'0254' => true,
			'0255' => true,
			'0257' => true,
			'0258' => true,
			'0259' => true,
			'0263' => true,
			'0269' => true,
			'0270' => true,
			'0271' => true,
			'0273' => true,
			'0276' => true,
			'0277' => true,
			'0278' => true,
			'0281' => true,
			'0282' => true,
			'0283' => true,
			'0284' => true,
			'0285' => true,
			'0289' => true,
			'0290' => true,
			'0291' => true,
			'0292' => true,
			'0293' => true,
			'0295' => true,
			'0296' => true,
			'0297' => true,
			'0298' => true,
			'0300' => true,
			'0301' => true,
		],
		'phpstan.broker.dynamicStaticMethodReturnTypeExtension' => [
			'0139' => true,
			'0155' => true,
			'0162' => true,
			'0185' => true,
			'0193' => true,
			'0217' => true,
			'0267' => true,
			'0286' => true,
		],
		'phpstan.functionParameterClosureTypeExtension' => ['0142' => true],
		'phpstan.typeSpecifier.functionTypeSpecifyingExtension' => [
			'0151' => true,
			'0154' => true,
			'0160' => true,
			'0166' => true,
			'0174' => true,
			'0176' => true,
			'0183' => true,
			'0204' => true,
			'0235' => true,
			'0248' => true,
			'0251' => true,
			'0260' => true,
			'0266' => true,
			'0272' => true,
			'0274' => true,
			'0279' => true,
			'0280' => true,
			'0299' => true,
			'0302' => true,
			'0304' => true,
		],
		'phpstan.dynamicMethodThrowTypeExtension' => ['0161' => true, '0215' => true, '0225' => true, '0262' => true],
		'phpstan.functionParameterOutTypeExtension' => ['0165' => true, '0224' => true, '0261' => true],
		'phpstan.dynamicFunctionThrowTypeExtension' => [
			'0188' => true,
			'0216' => true,
			'0247' => true,
			'0256' => true,
			'0264' => true,
			'0287' => true,
		],
		'phpstan.typeSpecifier.methodTypeSpecifyingExtension' => ['0196' => true],
		'phpstan.broker.propertiesClassReflectionExtension' => ['0201' => true],
		'phpstan.broker.operatorTypeSpecifyingExtension' => ['0275' => true],
		'phpstan.broker.allowedSubTypesClassReflectionExtension' => ['0329' => true, '0330' => true],
		'phpstan.rules.rule' => [
			'0363' => true,
			'0364' => true,
			'0365' => true,
			'0366' => true,
			'0367' => true,
			'0379' => true,
			'0380' => true,
			'0381' => true,
			'0382' => true,
			'0383' => true,
			'0384' => true,
			'0385' => true,
			'0386' => true,
			'0387' => true,
			'0388' => true,
			'0448' => true,
			'0449' => true,
			'0450' => true,
			'0451' => true,
			'0452' => true,
			'0453' => true,
			'0454' => true,
			'0455' => true,
			'0456' => true,
			'0457' => true,
			'0458' => true,
			'0459' => true,
			'0460' => true,
			'0461' => true,
			'0462' => true,
			'0463' => true,
			'0464' => true,
			'0465' => true,
			'0466' => true,
			'0467' => true,
			'0468' => true,
			'0469' => true,
			'0470' => true,
			'0471' => true,
			'0472' => true,
			'0473' => true,
			'0474' => true,
			'0475' => true,
			'0476' => true,
			'0477' => true,
			'0478' => true,
			'0479' => true,
			'0480' => true,
			'0481' => true,
			'0482' => true,
			'0483' => true,
			'0484' => true,
			'0485' => true,
			'0486' => true,
			'0487' => true,
			'0488' => true,
			'0489' => true,
			'0490' => true,
			'0491' => true,
			'0492' => true,
			'0493' => true,
			'0494' => true,
			'0495' => true,
			'0496' => true,
			'0497' => true,
			'0498' => true,
			'0499' => true,
			'0500' => true,
			'0501' => true,
			'0502' => true,
			'0503' => true,
			'0504' => true,
			'0505' => true,
			'0506' => true,
			'0507' => true,
			'0508' => true,
			'0509' => true,
			'0510' => true,
			'0511' => true,
			'0512' => true,
			'0513' => true,
			'0514' => true,
			'0515' => true,
			'0516' => true,
			'0517' => true,
			'0518' => true,
			'0519' => true,
			'0520' => true,
			'0521' => true,
			'0522' => true,
			'0523' => true,
			'0524' => true,
			'0525' => true,
			'0526' => true,
			'0527' => true,
			'0528' => true,
			'0529' => true,
			'0530' => true,
			'0531' => true,
			'0532' => true,
			'0533' => true,
			'0534' => true,
			'0535' => true,
			'0536' => true,
			'0537' => true,
			'0538' => true,
			'0539' => true,
			'0540' => true,
			'0541' => true,
			'0542' => true,
			'0543' => true,
			'0544' => true,
			'0545' => true,
			'0546' => true,
			'0547' => true,
			'0548' => true,
			'0549' => true,
			'0550' => true,
			'0551' => true,
			'0552' => true,
			'0553' => true,
			'0554' => true,
			'0555' => true,
			'0556' => true,
			'0557' => true,
			'0558' => true,
			'0559' => true,
			'0560' => true,
			'0561' => true,
			'0562' => true,
			'0563' => true,
			'0564' => true,
			'0565' => true,
			'0566' => true,
			'0567' => true,
			'0568' => true,
			'0569' => true,
			'0570' => true,
			'0571' => true,
			'0572' => true,
			'0573' => true,
			'0574' => true,
			'0575' => true,
			'0576' => true,
			'0577' => true,
			'0578' => true,
			'0579' => true,
			'0580' => true,
			'0581' => true,
			'0582' => true,
			'0583' => true,
			'0584' => true,
			'0585' => true,
			'0586' => true,
			'0587' => true,
			'0588' => true,
			'0589' => true,
			'0590' => true,
			'0591' => true,
			'0592' => true,
			'0593' => true,
			'0594' => true,
			'0595' => true,
			'0596' => true,
			'0597' => true,
			'0598' => true,
			'0599' => true,
			'0600' => true,
			'0601' => true,
			'0602' => true,
			'0603' => true,
			'0604' => true,
			'0605' => true,
			'0606' => true,
			'0607' => true,
			'0608' => true,
			'0609' => true,
			'0610' => true,
			'0611' => true,
			'0612' => true,
			'0613' => true,
			'0614' => true,
			'0615' => true,
			'0616' => true,
			'0617' => true,
			'0618' => true,
			'0619' => true,
			'0620' => true,
			'0621' => true,
			'0622' => true,
			'0623' => true,
			'0624' => true,
			'0625' => true,
			'0626' => true,
			'0627' => true,
			'0628' => true,
			'0629' => true,
			'0630' => true,
			'0631' => true,
			'0632' => true,
			'0633' => true,
			'0634' => true,
			'0635' => true,
			'0636' => true,
			'0637' => true,
			'0638' => true,
			'0639' => true,
			'0640' => true,
			'0641' => true,
			'0642' => true,
			'0643' => true,
			'0644' => true,
			'0645' => true,
			'0646' => true,
			'0647' => true,
			'0648' => true,
			'0649' => true,
			'0650' => true,
			'0651' => true,
			'0652' => true,
			'0653' => true,
			'0654' => true,
			'0655' => true,
			'0656' => true,
			'0657' => true,
			'0658' => true,
			'0659' => true,
			'0660' => true,
			'0661' => true,
			'0662' => true,
			'0663' => true,
			'0664' => true,
			'0665' => true,
			'0666' => true,
			'0667' => true,
			'0668' => true,
			'0669' => true,
			'0670' => true,
			'0671' => true,
			'0672' => true,
			'0673' => true,
			'0674' => true,
			'0675' => true,
			'0676' => true,
			'0677' => true,
			'0678' => true,
			'0679' => true,
			'0680' => true,
			'0681' => true,
			'0682' => true,
			'0683' => true,
			'0684' => true,
			'0685' => true,
			'0686' => true,
			'0687' => true,
			'0688' => true,
			'0689' => true,
			'0690' => true,
			'0691' => true,
			'0692' => true,
			'0693' => true,
			'0694' => true,
			'0695' => true,
			'0696' => true,
			'0697' => true,
			'0698' => true,
			'0699' => true,
			'0700' => true,
			'0701' => true,
			'0702' => true,
			'0703' => true,
			'0704' => true,
			'0705' => true,
			'0706' => true,
			'0707' => true,
			'0708' => true,
			'0709' => true,
			'0710' => true,
			'0711' => true,
			'0712' => true,
			'0713' => true,
			'0714' => true,
			'0715' => true,
			'0716' => true,
			'0717' => true,
			'0718' => true,
			'0719' => true,
			'0720' => true,
			'0721' => true,
			'0722' => true,
			'0723' => true,
			'0724' => true,
			'0725' => true,
			'0726' => true,
			'0727' => true,
			'0728' => true,
			'0729' => true,
			'0730' => true,
			'0731' => true,
			'0732' => true,
			'0733' => true,
			'0734' => true,
			'0735' => true,
			'0736' => true,
			'0737' => true,
			'0738' => true,
			'0739' => true,
			'0740' => true,
			'0741' => true,
			'0742' => true,
			'0743' => true,
			'0744' => true,
			'0745' => true,
			'0746' => true,
			'0747' => true,
			'0748' => true,
			'0749' => true,
			'0750' => true,
			'0751' => true,
			'0752' => true,
			'0753' => true,
			'0754' => true,
			'0811' => true,
			'0812' => true,
			'0813' => true,
			'0818' => true,
			'0819' => true,
			'0820' => true,
			'0821' => true,
			'0822' => true,
			'0824' => true,
			'0825' => true,
			'0826' => true,
			'0828' => true,
			'0829' => true,
			'0830' => true,
			'0831' => true,
			'0832' => true,
			'0833' => true,
			'0834' => true,
			'0835' => true,
			'0836' => true,
			'0837' => true,
			'0838' => true,
			'0839' => true,
			'0840' => true,
			'0841' => true,
			'0842' => true,
			'0843' => true,
			'0844' => true,
			'0847' => true,
			'0848' => true,
			'0849' => true,
			'0850' => true,
			'0851' => true,
			'0852' => true,
			'0853' => true,
			'0854' => true,
			'0855' => true,
			'0856' => true,
			'0857' => true,
			'0858' => true,
			'0859' => true,
			'0860' => true,
			'0861' => true,
			'0862' => true,
			'rules.0' => true,
			'rules.1' => true,
			'rules.10' => true,
			'rules.11' => true,
			'rules.12' => true,
			'rules.13' => true,
			'rules.14' => true,
			'rules.15' => true,
			'rules.16' => true,
			'rules.17' => true,
			'rules.2' => true,
			'rules.3' => true,
			'rules.4' => true,
			'rules.5' => true,
			'rules.6' => true,
			'rules.7' => true,
			'rules.8' => true,
			'rules.9' => true,
		],
		'phpstan.diagnoseExtension' => ['0419' => true],
		'phpstan.stubFilesExtension' => ['0427' => true, '0430' => true, '0431' => true, '0433' => true, '0434' => true],
		'phpstan.collector' => [
			'0755' => true,
			'0756' => true,
			'0757' => true,
			'0758' => true,
			'0759' => true,
			'0760' => true,
			'0761' => true,
			'0762' => true,
			'0763' => true,
			'0875' => true,
			'0876' => true,
			'0877' => true,
			'0889' => true,
			'0890' => true,
			'0891' => true,
			'0892' => true,
			'0893' => true,
		],
	];

	protected $types = ['container' => '_PHPStan_5a70c2d68\Nette\DI\Container'];
	protected $aliases = [];

	protected $wiring = [
		'_PHPStan_5a70c2d68\Nette\DI\Container' => [['container']],
		'PHPStan\Rules\Rule' => [
			[
				'0363',
				'0364',
				'0365',
				'0366',
				'0367',
				'0379',
				'0380',
				'0381',
				'0382',
				'0383',
				'0384',
				'0385',
				'0386',
				'0387',
				'0388',
				'0785',
				'0799',
				'0800',
				'0801',
				'0802',
				'0803',
				'0804',
				'0808',
				'0811',
				'0812',
				'0813',
				'0814',
				'0815',
				'0818',
				'0819',
				'0820',
				'0821',
				'0822',
				'0823',
				'0824',
				'0825',
				'0826',
				'0827',
				'0828',
				'0829',
				'0830',
				'0831',
				'0832',
				'0833',
				'0834',
				'0835',
				'0836',
				'0837',
				'0838',
				'0839',
				'0840',
				'0841',
				'0842',
				'0843',
				'0844',
				'0845',
				'0846',
				'0847',
				'0848',
				'0849',
				'0850',
				'0851',
				'0852',
				'0853',
				'0854',
				'0855',
				'0856',
				'0857',
				'0858',
				'0859',
				'0860',
				'0861',
				'0862',
			],
			[
				'rules.0',
				'rules.1',
				'rules.2',
				'rules.3',
				'rules.4',
				'rules.5',
				'rules.6',
				'rules.7',
				'rules.8',
				'rules.9',
				'rules.10',
				'rules.11',
				'rules.12',
				'rules.13',
				'rules.14',
				'rules.15',
				'rules.16',
				'rules.17',
				'0448',
				'0449',
				'0450',
				'0451',
				'0452',
				'0453',
				'0454',
				'0455',
				'0456',
				'0457',
				'0458',
				'0459',
				'0460',
				'0461',
				'0462',
				'0463',
				'0464',
				'0465',
				'0466',
				'0467',
				'0468',
				'0469',
				'0470',
				'0471',
				'0472',
				'0473',
				'0474',
				'0475',
				'0476',
				'0477',
				'0478',
				'0479',
				'0480',
				'0481',
				'0482',
				'0483',
				'0484',
				'0485',
				'0486',
				'0487',
				'0488',
				'0489',
				'0490',
				'0491',
				'0492',
				'0493',
				'0494',
				'0495',
				'0496',
				'0497',
				'0498',
				'0499',
				'0500',
				'0501',
				'0502',
				'0503',
				'0504',
				'0505',
				'0506',
				'0507',
				'0508',
				'0509',
				'0510',
				'0511',
				'0512',
				'0513',
				'0514',
				'0515',
				'0516',
				'0517',
				'0518',
				'0519',
				'0520',
				'0521',
				'0522',
				'0523',
				'0524',
				'0525',
				'0526',
				'0527',
				'0528',
				'0529',
				'0530',
				'0531',
				'0532',
				'0533',
				'0534',
				'0535',
				'0536',
				'0537',
				'0538',
				'0539',
				'0540',
				'0541',
				'0542',
				'0543',
				'0544',
				'0545',
				'0546',
				'0547',
				'0548',
				'0549',
				'0550',
				'0551',
				'0552',
				'0553',
				'0554',
				'0555',
				'0556',
				'0557',
				'0558',
				'0559',
				'0560',
				'0561',
				'0562',
				'0563',
				'0564',
				'0565',
				'0566',
				'0567',
				'0568',
				'0569',
				'0570',
				'0571',
				'0572',
				'0573',
				'0574',
				'0575',
				'0576',
				'0577',
				'0578',
				'0579',
				'0580',
				'0581',
				'0582',
				'0583',
				'0584',
				'0585',
				'0586',
				'0587',
				'0588',
				'0589',
				'0590',
				'0591',
				'0592',
				'0593',
				'0594',
				'0595',
				'0596',
				'0597',
				'0598',
				'0599',
				'0600',
				'0601',
				'0602',
				'0603',
				'0604',
				'0605',
				'0606',
				'0607',
				'0608',
				'0609',
				'0610',
				'0611',
				'0612',
				'0613',
				'0614',
				'0615',
				'0616',
				'0617',
				'0618',
				'0619',
				'0620',
				'0621',
				'0622',
				'0623',
				'0624',
				'0625',
				'0626',
				'0627',
				'0628',
				'0629',
				'0630',
				'0631',
				'0632',
				'0633',
				'0634',
				'0635',
				'0636',
				'0637',
				'0638',
				'0639',
				'0640',
				'0641',
				'0642',
				'0643',
				'0644',
				'0645',
				'0646',
				'0647',
				'0648',
				'0649',
				'0650',
				'0651',
				'0652',
				'0653',
				'0654',
				'0655',
				'0656',
				'0657',
				'0658',
				'0659',
				'0660',
				'0661',
				'0662',
				'0663',
				'0664',
				'0665',
				'0666',
				'0667',
				'0668',
				'0669',
				'0670',
				'0671',
				'0672',
				'0673',
				'0674',
				'0675',
				'0676',
				'0677',
				'0678',
				'0679',
				'0680',
				'0681',
				'0682',
				'0683',
				'0684',
				'0685',
				'0686',
				'0687',
				'0688',
				'0689',
				'0690',
				'0691',
				'0692',
				'0693',
				'0694',
				'0695',
				'0696',
				'0697',
				'0698',
				'0699',
				'0700',
				'0701',
				'0702',
				'0703',
				'0704',
				'0705',
				'0706',
				'0707',
				'0708',
				'0709',
				'0710',
				'0711',
				'0712',
				'0713',
				'0714',
				'0715',
				'0716',
				'0717',
				'0718',
				'0719',
				'0720',
				'0721',
				'0722',
				'0723',
				'0724',
				'0725',
				'0726',
				'0727',
				'0728',
				'0729',
				'0730',
				'0731',
				'0732',
				'0733',
				'0734',
				'0735',
				'0736',
				'0737',
				'0738',
				'0739',
				'0740',
				'0741',
				'0742',
				'0743',
				'0744',
				'0745',
				'0746',
				'0747',
				'0748',
				'0749',
				'0750',
				'0751',
				'0752',
				'0753',
				'0754',
			],
		],
		'Rector\TypePerfect\Rules\NoParamTypeRemovalRule' => [['rules.0']],
		'Rector\TypePerfect\Rules\NoArrayAccessOnObjectRule' => [['rules.1']],
		'Rector\TypePerfect\Rules\NoIssetOnObjectRule' => [['rules.2']],
		'Rector\TypePerfect\Rules\NoEmptyOnObjectRule' => [['rules.3']],
		'Rector\TypePerfect\Rules\NarrowPublicClassMethodParamTypeRule' => [['rules.4']],
		'Rector\TypePerfect\Rules\NarrowPrivateClassMethodParamTypeRule' => [['rules.5']],
		'Rector\TypePerfect\Rules\NarrowReturnObjectTypeRule' => [['rules.6']],
		'Rector\TypePerfect\Rules\NoMixedPropertyFetcherRule' => [['rules.7']],
		'Rector\TypePerfect\Rules\NoMixedMethodCallerRule' => [['rules.8']],
		'Rector\TypePerfect\Rules\ReturnNullOverFalseRule' => [['rules.9']],
		'TomasVotruba\CognitiveComplexity\Rules\ClassLikeCognitiveComplexityRule' => [['rules.10']],
		'TomasVotruba\CognitiveComplexity\Rules\FunctionLikeCognitiveComplexityRule' => [['rules.11']],
		'TomasVotruba\CognitiveComplexity\Rules\ClassDependencyTreeRule' => [['rules.12']],
		'TomasVotruba\TypeCoverage\Rules\ParamTypeCoverageRule' => [['rules.13']],
		'TomasVotruba\TypeCoverage\Rules\ReturnTypeCoverageRule' => [['rules.14']],
		'TomasVotruba\TypeCoverage\Rules\PropertyTypeCoverageRule' => [['rules.15']],
		'TomasVotruba\TypeCoverage\Rules\ConstantTypeCoverageRule' => [['rules.16']],
		'TomasVotruba\TypeCoverage\Rules\DeclareCoverageRule' => [['rules.17']],
		'PhpParser\NodeVisitorAbstract' => [
			[
				'01',
				'02',
				'03',
				'04',
				'05',
				'06',
				'07',
				'08',
				'09',
				'010',
				'012',
				'013',
				'014',
				'015',
				'016',
				'017',
				'018',
				'019',
				'020',
				'021',
				'022',
				'0765',
				'0774',
				'0775',
				'0881',
				'0882',
			],
		],
		'PhpParser\NodeVisitor' => [
			[
				'01',
				'02',
				'03',
				'04',
				'05',
				'06',
				'07',
				'08',
				'09',
				'010',
				'012',
				'013',
				'014',
				'015',
				'016',
				'017',
				'018',
				'019',
				'020',
				'021',
				'022',
				'0765',
				'0774',
				'0775',
				'0881',
				'0882',
			],
		],
		'PHPStan\Parser\AnonymousClassVisitor' => [['01']],
		'PHPStan\Parser\ClosureArgVisitor' => [['02']],
		'PHPStan\Parser\ArrayFilterArgVisitor' => [['03']],
		'PHPStan\Parser\ArrayFindArgVisitor' => [['04']],
		'PHPStan\Parser\ClosureBindArgVisitor' => [['05']],
		'PHPStan\Parser\CurlSetOptArrayArgVisitor' => [['06']],
		'PHPStan\Parser\ParentStmtTypesVisitor' => [['07']],
		'PHPStan\Parser\DeclarePositionVisitor' => [['08']],
		'PHPStan\Parser\ArrayWalkArgVisitor' => [['09']],
		'PHPStan\Parser\NewAssignedToPropertyVisitor' => [['010']],
		'PHPStan\Parser\LexerFactory' => [['011']],
		'PHPStan\Parser\ImmediatelyInvokedClosureVisitor' => [['012']],
		'PHPStan\Parser\StandaloneThrowExprVisitor' => [['013']],
		'PHPStan\Parser\TryCatchTypeVisitor' => [['014']],
		'PHPStan\Parser\TypeTraverserInstanceofVisitor' => [['015']],
		'PHPStan\Parser\MagicConstantParamDefaultVisitor' => [['016']],
		'PHPStan\Parser\CurlSetOptArgVisitor' => [['017']],
		'PHPStan\Parser\ArrowFunctionArgVisitor' => [['018']],
		'PHPStan\Parser\ArrayMapArgVisitor' => [['019']],
		'PHPStan\Parser\ImplodeArgVisitor' => [['020']],
		'PHPStan\Parser\ClosureBindToVarVisitor' => [['021']],
		'PHPStan\Parser\LastConditionVisitor' => [['022']],
		'PHPStan\Broker\AnonymousClassNameHelper' => [['023']],
		'PHPStan\Collectors\Registry' => [['024']],
		'PHPStan\Collectors\RegistryFactory' => [['025']],
		'PHPStan\Analyser\RuleErrorTransformer' => [['026']],
		'PHPStan\Analyser\FileAnalyser' => [['027']],
		'PHPStan\Analyser\ScopeFactory' => [['028']],
		'PHPStan\Analyser\Ignore\IgnoreLexer' => [['029']],
		'PHPStan\Analyser\Ignore\IgnoredErrorHelper' => [['030']],
		'PHPStan\Analyser\TypeSpecifierFactory' => [['typeSpecifierFactory']],
		'PHPStan\Analyser\Analyser' => [['031']],
		'PHPStan\Analyser\ResultCache\ResultCacheClearer' => [['032']],
		'PHPStan\Analyser\NodeScopeResolver' => [0 => ['033'], 2 => [1 => '0110']],
		'PHPStan\Analyser\Fiber\FiberNodeScopeResolver' => [['033']],
		'PHPStan\Analyser\AnalyserResultFinalizer' => [['034']],
		'PHPStan\Analyser\ConstantResolverFactory' => [['035']],
		'PHPStan\Analyser\IgnoreErrorExtensionProvider' => [['036']],
		'PHPStan\Analyser\LocalIgnoresProcessor' => [['037']],
		'PHPStan\Analyser\TypeSpecifier' => [['typeSpecifier']],
		'PHPStan\Analyser\RicherScopeGetTypeHelper' => [['038']],
		'PHPStan\Analyser\ConstantResolver' => [['039']],
		'PHPStan\Analyser\ExprHandler' => [
			[
				'040',
				'041',
				'042',
				'043',
				'044',
				'045',
				'046',
				'047',
				'048',
				'049',
				'050',
				'051',
				'052',
				'053',
				'054',
				'055',
				'056',
				'057',
				'058',
				'059',
				'060',
				'061',
				'062',
				'063',
				'064',
				'065',
				'069',
				'070',
				'071',
				'072',
				'073',
				'074',
				'075',
				'076',
				'077',
				'078',
				'079',
				'080',
				'081',
				'082',
				'083',
				'084',
				'085',
				'086',
				'087',
				'088',
				'089',
				'090',
				'091',
				'092',
				'093',
				'094',
				'095',
				'096',
				'097',
				'098',
				'099',
				'0100',
				'0101',
				'0102',
				'0103',
				'0104',
				'0105',
				'0106',
				'0107',
				'0108',
				'0109',
			],
		],
		'PHPStan\Analyser\ExprHandler\PostDecHandler' => [['040']],
		'PHPStan\Analyser\ExprHandler\BinaryOpHandler' => [['041']],
		'PHPStan\Analyser\ExprHandler\UnaryMinusHandler' => [['042']],
		'PHPStan\Analyser\ExprHandler\StaticPropertyFetchHandler' => [['043']],
		'PHPStan\Analyser\ExprHandler\Virtual\GetOffsetValueTypeExprHandler' => [['044']],
		'PHPStan\Analyser\ExprHandler\Virtual\FunctionCallableNodeHandler' => [['045']],
		'PHPStan\Analyser\ExprHandler\Virtual\MethodCallableNodeHandler' => [['046']],
		'PHPStan\Analyser\ExprHandler\Virtual\AlwaysRememberedExprHandler' => [['047']],
		'PHPStan\Analyser\ExprHandler\Virtual\GetIterableValueTypeExprHandler' => [['048']],
		'PHPStan\Analyser\ExprHandler\Virtual\SetExistingOffsetValueTypeExprHandler' => [['049']],
		'PHPStan\Analyser\ExprHandler\Virtual\UnsetOffsetExprHandler' => [['050']],
		'PHPStan\Analyser\ExprHandler\Virtual\NativeTypeExprHandler' => [['051']],
		'PHPStan\Analyser\ExprHandler\Virtual\ExistingArrayDimFetchHandler' => [['052']],
		'PHPStan\Analyser\ExprHandler\Virtual\GetIterableKeyTypeExprHandler' => [['053']],
		'PHPStan\Analyser\ExprHandler\Virtual\InstantiationCallableNodeHandler' => [['054']],
		'PHPStan\Analyser\ExprHandler\Virtual\StaticMethodCallableNodeHandler' => [['055']],
		'PHPStan\Analyser\ExprHandler\Virtual\TypeExprHandler' => [['056']],
		'PHPStan\Analyser\ExprHandler\Virtual\OriginalPropertyTypeExprHandler' => [['057']],
		'PHPStan\Analyser\ExprHandler\Virtual\SetOffsetValueTypeExprHandler' => [['058']],
		'PHPStan\Analyser\ExprHandler\EvalHandler' => [['059']],
		'PHPStan\Analyser\ExprHandler\FirstClassCallableMethodCallHandler' => [['060']],
		'PHPStan\Analyser\ExprHandler\FirstClassCallableFuncCallHandler' => [['061']],
		'PHPStan\Analyser\ExprHandler\PreIncHandler' => [['062']],
		'PHPStan\Analyser\ExprHandler\ClosureHandler' => [['063']],
		'PHPStan\Analyser\ExprHandler\CastStringHandler' => [['064']],
		'PHPStan\Analyser\ExprHandler\ConstFetchHandler' => [['065']],
		'PHPStan\Analyser\ExprHandler\Helper\MethodCallReturnTypeHelper' => [['066']],
		'PHPStan\Analyser\ExprHandler\Helper\NonNullabilityHelper' => [['067']],
		'PHPStan\Analyser\ExprHandler\Helper\ClosureTypeResolver' => [['068']],
		'PHPStan\Analyser\ExprHandler\EmptyHandler' => [['069']],
		'PHPStan\Analyser\ExprHandler\ThrowHandler' => [['070']],
		'PHPStan\Analyser\ExprHandler\YieldFromHandler' => [['071']],
		'PHPStan\Analyser\ExprHandler\ArrayDimFetchHandler' => [['072']],
		'PHPStan\Analyser\ExprHandler\ArrowFunctionHandler' => [['073']],
		'PHPStan\Analyser\ExprHandler\PropertyFetchHandler' => [['074']],
		'PHPStan\Analyser\ExprHandler\IssetHandler' => [['075']],
		'PHPStan\Analyser\ExprHandler\MethodCallHandler' => [['076']],
		'PHPStan\Analyser\ExprHandler\CastHandler' => [['077']],
		'PHPStan\Analyser\ExprHandler\YieldHandler' => [['078']],
		'PHPStan\Analyser\ExprHandler\MatchHandler' => [['079']],
		'PHPStan\Analyser\ExprHandler\ErrorSuppressHandler' => [['080']],
		'PHPStan\Analyser\ExprHandler\TernaryHandler' => [['081']],
		'PHPStan\Analyser\ExprHandler\AssignOpHandler' => [['082']],
		'PHPStan\Analyser\ExprHandler\VariableHandler' => [['083']],
		'PHPStan\Analyser\ExprHandler\StaticCallHandler' => [['084']],
		'PHPStan\Analyser\ExprHandler\NullsafePropertyFetchHandler' => [['085']],
		'PHPStan\Analyser\ExprHandler\InterpolatedStringHandler' => [['086']],
		'PHPStan\Analyser\ExprHandler\CoalesceHandler' => [['087']],
		'PHPStan\Analyser\ExprHandler\FirstClassCallableNewHandler' => [['088']],
		'PHPStan\Analyser\ExprHandler\ArrayHandler' => [['089']],
		'PHPStan\Analyser\ExprHandler\BooleanAndHandler' => [['090']],
		'PHPStan\Analyser\ExprHandler\AssignHandler' => [['091']],
		'PHPStan\Analyser\ExprHandler\BitwiseNotHandler' => [['092']],
		'PHPStan\Analyser\ExprHandler\BooleanOrHandler' => [['093']],
		'PHPStan\Analyser\ExprHandler\FirstClassCallableStaticCallHandler' => [['094']],
		'PHPStan\Analyser\ExprHandler\PipeHandler' => [['095']],
		'PHPStan\Analyser\ExprHandler\PreDecHandler' => [['096']],
		'PHPStan\Analyser\ExprHandler\BooleanNotHandler' => [['097']],
		'PHPStan\Analyser\ExprHandler\IncludeHandler' => [['098']],
		'PHPStan\Analyser\ExprHandler\UnaryPlusHandler' => [['099']],
		'PHPStan\Analyser\ExprHandler\NullsafeMethodCallHandler' => [['0100']],
		'PHPStan\Analyser\ExprHandler\ScalarHandler' => [['0101']],
		'PHPStan\Analyser\ExprHandler\PrintHandler' => [['0102']],
		'PHPStan\Analyser\ExprHandler\PostIncHandler' => [['0103']],
		'PHPStan\Analyser\ExprHandler\ExitHandler' => [['0104']],
		'PHPStan\Analyser\ExprHandler\InstanceofHandler' => [['0105']],
		'PHPStan\Analyser\ExprHandler\NewHandler' => [['0106']],
		'PHPStan\Analyser\ExprHandler\FuncCallHandler' => [['0107']],
		'PHPStan\Analyser\ExprHandler\CloneHandler' => [['0108']],
		'PHPStan\Analyser\ExprHandler\ClassConstFetchHandler' => [['0109']],
		'PHPStan\DependencyInjection\Type\UnaryOperatorTypeSpecifyingExtensionRegistryProvider' => [['0111']],
		'PHPStan\DependencyInjection\Type\LazyUnaryOperatorTypeSpecifyingExtensionRegistryProvider' => [['0111']],
		'PHPStan\DependencyInjection\Type\DynamicThrowTypeExtensionProvider' => [['0112']],
		'PHPStan\DependencyInjection\Type\LazyDynamicThrowTypeExtensionProvider' => [['0112']],
		'PHPStan\DependencyInjection\Type\DynamicReturnTypeExtensionRegistryProvider' => [['0113']],
		'PHPStan\DependencyInjection\Type\LazyDynamicReturnTypeExtensionRegistryProvider' => [['0113']],
		'PHPStan\DependencyInjection\Type\ParameterOutTypeExtensionProvider' => [['0114']],
		'PHPStan\DependencyInjection\Type\LazyParameterOutTypeExtensionProvider' => [['0114']],
		'PHPStan\DependencyInjection\Type\ExpressionTypeResolverExtensionRegistryProvider' => [['0115']],
		'PHPStan\DependencyInjection\Type\LazyExpressionTypeResolverExtensionRegistryProvider' => [['0115']],
		'PHPStan\DependencyInjection\Type\ParameterClosureTypeExtensionProvider' => [['0116']],
		'PHPStan\DependencyInjection\Type\LazyParameterClosureTypeExtensionProvider' => [['0116']],
		'PHPStan\DependencyInjection\Type\ParameterClosureThisExtensionProvider' => [['0117']],
		'PHPStan\DependencyInjection\Type\LazyParameterClosureThisExtensionProvider' => [['0117']],
		'PHPStan\DependencyInjection\Type\OperatorTypeSpecifyingExtensionRegistryProvider' => [['0118']],
		'PHPStan\DependencyInjection\Type\LazyOperatorTypeSpecifyingExtensionRegistryProvider' => [['0118']],
		'PHPStan\DependencyInjection\Container' => [['0119'], ['0120']],
		'PHPStan\DependencyInjection\MemoizingContainer' => [['0119']],
		'PHPStan\DependencyInjection\Nette\NetteContainer' => [['0120']],
		'PHPStan\DependencyInjection\Reflection\ClassReflectionExtensionRegistryProvider' => [['0121']],
		'PHPStan\DependencyInjection\Reflection\LazyClassReflectionExtensionRegistryProvider' => [['0121']],
		'PHPStan\DependencyInjection\DerivativeContainerFactory' => [['0122']],
		'PHPStan\Fixable\Patcher' => [['0123']],
		'PHPStan\Fixable\PhpDoc\PhpDocEditor' => [['0124']],
		'PHPStan\Dependency\ExportedNodeResolver' => [['0125']],
		'PHPStan\Dependency\ExportedNodeFetcher' => [['0126']],
		'PHPStan\Dependency\DependencyResolver' => [['0127']],
		'PHPStan\Type\TypeAliasResolver' => [['0128']],
		'PHPStan\Type\UsefulTypeAliasResolver' => [['0128']],
		'PHPStan\Type\DynamicMethodReturnTypeExtension' => [
			[
				'0129',
				'0145',
				'0195',
				'0205',
				'0221',
				'0223',
				'0227',
				'0244',
				'0259',
				'0286',
				'0288',
				'0320',
				'0786',
				'0787',
				'0788',
				'0789',
				'0790',
				'0791',
				'0792',
				'0793',
				'0794',
				'0795',
				'0796',
			],
		],
		'PHPStan\Type\PHPStan\ClassNameUsageLocationCreateIdentifierDynamicReturnTypeExtension' => [['0129']],
		'PHPStan\Type\DynamicStaticMethodThrowTypeExtension' => [
			['0130', '0134', '0186', '0212', '0218', '0222', '0243', '0303'],
		],
		'PHPStan\Type\Php\ReflectionPropertyConstructorThrowTypeExtension' => [['0130']],
		'PHPStan\Type\DynamicFunctionReturnTypeExtension' => [
			[
				'0131',
				'0132',
				'0133',
				'0135',
				'0136',
				'0137',
				'0138',
				'0140',
				'0141',
				'0143',
				'0144',
				'0146',
				'0147',
				'0148',
				'0149',
				'0150',
				'0152',
				'0153',
				'0156',
				'0157',
				'0159',
				'0163',
				'0164',
				'0167',
				'0168',
				'0169',
				'0170',
				'0171',
				'0172',
				'0173',
				'0175',
				'0177',
				'0178',
				'0179',
				'0180',
				'0181',
				'0182',
				'0184',
				'0187',
				'0189',
				'0190',
				'0191',
				'0192',
				'0194',
				'0200',
				'0202',
				'0203',
				'0206',
				'0207',
				'0208',
				'0209',
				'0211',
				'0213',
				'0214',
				'0219',
				'0220',
				'0226',
				'0228',
				'0229',
				'0230',
				'0232',
				'0233',
				'0234',
				'0236',
				'0237',
				'0238',
				'0239',
				'0240',
				'0241',
				'0242',
				'0245',
				'0246',
				'0249',
				'0250',
				'0253',
				'0254',
				'0255',
				'0257',
				'0258',
				'0259',
				'0263',
				'0269',
				'0270',
				'0271',
				'0273',
				'0276',
				'0277',
				'0278',
				'0281',
				'0282',
				'0283',
				'0284',
				'0285',
				'0289',
				'0290',
				'0291',
				'0292',
				'0293',
				'0295',
				'0296',
				'0297',
				'0298',
				'0300',
				'0301',
			],
		],
		'PHPStan\Type\Php\StrtotimeFunctionReturnTypeExtension' => [['0131']],
		'PHPStan\Type\Php\ArrayMergeFunctionDynamicReturnTypeExtension' => [['0132']],
		'PHPStan\Type\Php\HrtimeFunctionReturnTypeExtension' => [['0133']],
		'PHPStan\Type\Php\ReflectionMethodConstructorThrowTypeExtension' => [['0134']],
		'PHPStan\Type\Php\ArrayValuesFunctionDynamicReturnTypeExtension' => [['0135']],
		'PHPStan\Type\Php\LtrimFunctionReturnTypeExtension' => [['0136']],
		'PHPStan\Type\Php\IdateFunctionReturnTypeExtension' => [['0137']],
		'PHPStan\Type\Php\FilterVarDynamicReturnTypeExtension' => [['0138']],
		'PHPStan\Type\DynamicStaticMethodReturnTypeExtension' => [
			['0139', '0155', '0162', '0185', '0193', '0217', '0267', '0286'],
		],
		'PHPStan\Type\Php\ClosureBindDynamicReturnTypeExtension' => [['0139']],
		'PHPStan\Type\Php\DioStatDynamicFunctionReturnTypeExtension' => [['0140']],
		'PHPStan\Type\Php\GettypeFunctionReturnTypeExtension' => [['0141']],
		'PHPStan\Type\FunctionParameterClosureTypeExtension' => [['0142']],
		'PHPStan\Type\Php\PregReplaceCallbackClosureTypeExtension' => [['0142']],
		'PHPStan\Type\Php\ArrayFirstLastDynamicReturnTypeExtension' => [['0143']],
		'PHPStan\Type\Php\ArrayPopFunctionReturnTypeExtension' => [['0144']],
		'PHPStan\Type\Php\ThrowableReturnTypeExtension' => [['0145']],
		'PHPStan\Type\Php\PowFunctionReturnTypeExtension' => [['0146']],
		'PHPStan\Type\Php\StrIncrementDecrementFunctionReturnTypeExtension' => [['0147']],
		'PHPStan\Type\Php\HashFunctionsReturnTypeExtension' => [['0148']],
		'PHPStan\Type\Php\StrSplitFunctionReturnTypeExtension' => [['0149']],
		'PHPStan\Type\Php\StrTokFunctionReturnTypeExtension' => [['0150']],
		'PHPStan\Type\FunctionTypeSpecifyingExtension' => [
			[
				'0151',
				'0154',
				'0160',
				'0166',
				'0174',
				'0176',
				'0183',
				'0204',
				'0235',
				'0248',
				'0251',
				'0260',
				'0266',
				'0272',
				'0274',
				'0279',
				'0280',
				'0299',
				'0302',
				'0304',
			],
		],
		'PHPStan\Analyser\TypeSpecifierAwareExtension' => [
			[
				'0151',
				'0154',
				'0160',
				'0166',
				'0174',
				'0176',
				'0183',
				'0196',
				'0204',
				'0235',
				'0248',
				'0251',
				'0254',
				'0260',
				'0266',
				'0272',
				'0274',
				'0279',
				'0280',
				'0299',
				'0302',
				'0304',
			],
		],
		'PHPStan\Type\Php\IsIterableFunctionTypeSpecifyingExtension' => [['0151']],
		'PHPStan\Type\Php\PregSplitDynamicReturnTypeExtension' => [['0152']],
		'PHPStan\Type\Php\IteratorToArrayFunctionReturnTypeExtension' => [['0153']],
		'PHPStan\Type\Php\AssertFunctionTypeSpecifyingExtension' => [['0154']],
		'PHPStan\Type\Php\ClosureGetCurrentDynamicReturnTypeExtension' => [['0155']],
		'PHPStan\Type\Php\ParseUrlFunctionDynamicReturnTypeExtension' => [['0156']],
		'PHPStan\Type\Php\OpensslCipherFunctionsReturnTypeExtension' => [['0157']],
		'PHPStan\Type\Php\ArrayFilterFunctionReturnTypeHelper' => [['0158']],
		'PHPStan\Type\Php\SprintfFunctionDynamicReturnTypeExtension' => [['0159']],
		'PHPStan\Type\Php\PropertyExistsTypeSpecifyingExtension' => [['0160']],
		'PHPStan\Type\DynamicMethodThrowTypeExtension' => [['0161', '0215', '0225', '0262']],
		'PHPStan\Type\Php\DateTimeModifyMethodThrowTypeExtension' => [['0161']],
		'PHPStan\Type\Php\ClosureFromCallableDynamicReturnTypeExtension' => [['0162']],
		'PHPStan\Type\Php\ArraySumFunctionDynamicReturnTypeExtension' => [['0163']],
		'PHPStan\Type\Php\SscanfFunctionDynamicReturnTypeExtension' => [['0164']],
		'PHPStan\Type\FunctionParameterOutTypeExtension' => [['0165', '0224', '0261']],
		'PHPStan\Type\Php\PregMatchParameterOutTypeExtension' => [['0165']],
		'PHPStan\Type\Php\IsCallableFunctionTypeSpecifyingExtension' => [['0166']],
		'PHPStan\Type\Php\ArraySearchFunctionDynamicReturnTypeExtension' => [['0167']],
		'PHPStan\Type\Php\NumberFormatFunctionDynamicReturnTypeExtension' => [['0168']],
		'PHPStan\Type\Php\MicrotimeFunctionReturnTypeExtension' => [['0169']],
		'PHPStan\Type\Php\ReplaceFunctionsDynamicReturnTypeExtension' => [['0170']],
		'PHPStan\Type\Php\ArraySliceFunctionReturnTypeExtension' => [['0171']],
		'PHPStan\Type\Php\ClassImplementsFunctionReturnTypeExtension' => [['0172']],
		'PHPStan\Type\Php\SubstrDynamicReturnTypeExtension' => [['0173']],
		'PHPStan\Type\Php\DefinedConstantTypeSpecifyingExtension' => [['0174']],
		'PHPStan\Type\Php\GetParentClassDynamicFunctionReturnTypeExtension' => [['0175']],
		'PHPStan\Type\Php\ArraySearchFunctionTypeSpecifyingExtension' => [['0176']],
		'PHPStan\Type\Php\FilterVarArrayDynamicReturnTypeExtension' => [['0177']],
		'PHPStan\Type\Php\ArrayPadDynamicReturnTypeExtension' => [['0178']],
		'PHPStan\Type\Php\TriggerErrorDynamicReturnTypeExtension' => [['0179']],
		'PHPStan\Type\Php\ArrayChangeKeyCaseFunctionReturnTypeExtension' => [['0180']],
		'PHPStan\Type\Php\GetDefinedVarsFunctionReturnTypeExtension' => [['0181']],
		'PHPStan\Type\Php\ArrayCurrentDynamicReturnTypeExtension' => [['0182']],
		'PHPStan\Type\Php\ArrayKeyExistsFunctionTypeSpecifyingExtension' => [['0183']],
		'PHPStan\Type\Php\ArrayFlipFunctionReturnTypeExtension' => [['0184']],
		'PHPStan\Type\Php\BackedEnumFromMethodDynamicReturnTypeExtension' => [['0185']],
		'PHPStan\Type\Php\DateIntervalConstructorThrowTypeExtension' => [['0186']],
		'PHPStan\Type\Php\StrCaseFunctionsReturnTypeExtension' => [['0187']],
		'PHPStan\Type\DynamicFunctionThrowTypeExtension' => [['0188', '0216', '0247', '0256', '0264', '0287']],
		'PHPStan\Type\Php\FilterVarThrowTypeExtension' => [['0188']],
		'PHPStan\Type\Php\PregFilterFunctionReturnTypeExtension' => [['0189']],
		'PHPStan\Type\Php\ArraySpliceFunctionReturnTypeExtension' => [['0190']],
		'PHPStan\Type\Php\GettimeofdayDynamicFunctionReturnTypeExtension' => [['0191']],
		'PHPStan\Type\Php\CountCharsFunctionDynamicReturnTypeExtension' => [['0192']],
		'PHPStan\Type\Php\DateIntervalDynamicReturnTypeExtension' => [['0193']],
		'PHPStan\Type\Php\ArrayFillFunctionReturnTypeExtension' => [['0194']],
		'PHPStan\Type\Php\DsMapDynamicReturnTypeExtension' => [['0195']],
		'PHPStan\Type\MethodTypeSpecifyingExtension' => [['0196']],
		'PHPStan\Type\Php\ReflectionClassIsSubclassOfTypeSpecifyingExtension' => [['0196']],
		'PHPStan\Type\Php\ConstantHelper' => [['0197']],
		'PHPStan\Type\Php\RegexArrayShapeMatcher' => [['0198']],
		'PHPStan\Type\Php\IdateFunctionReturnTypeHelper' => [['0199']],
		'PHPStan\Type\Php\ArgumentBasedFunctionReturnTypeExtension' => [['0200']],
		'PHPStan\Reflection\PropertiesClassReflectionExtension' => [['0201', '0778', '0779', '0781']],
		'PHPStan\Type\Php\SimpleXMLElementClassPropertyReflectionExtension' => [['0201']],
		'PHPStan\Type\Php\NonEmptyStringFunctionsReturnTypeExtension' => [['0202']],
		'PHPStan\Type\Php\CountFunctionReturnTypeExtension' => [['0203']],
		'PHPStan\Type\Php\CountFunctionTypeSpecifyingExtension' => [['0204']],
		'PHPStan\Type\Php\SimpleXMLElementAsXMLMethodReturnTypeExtension' => [['0205']],
		'PHPStan\Type\Php\ArrayCombineFunctionReturnTypeExtension' => [['0206']],
		'PHPStan\Type\Php\ArrayFindKeyFunctionReturnTypeExtension' => [['0207']],
		'PHPStan\Type\Php\ArrayFilterFunctionReturnTypeExtension' => [['0208']],
		'PHPStan\Type\Php\MbConvertEncodingFunctionReturnTypeExtension' => [['0209']],
		'PHPStan\Type\Php\OpenSslCipherMethodsProvider' => [['0210']],
		'PHPStan\Type\Php\BcMathStringOrNullReturnTypeExtension' => [['0211']],
		'PHPStan\Type\Php\SimpleXMLElementConstructorThrowTypeExtension' => [['0212']],
		'PHPStan\Type\Php\StrlenFunctionReturnTypeExtension' => [['0213']],
		'PHPStan\Type\Php\DateTimeDynamicReturnTypeExtension' => [['0214']],
		'PHPStan\Type\Php\DomDocumentCreateElementDynamicThrowTypeExtension' => [['0215']],
		'PHPStan\Type\Php\AssertThrowTypeExtension' => [['0216']],
		'PHPStan\Type\Php\DatePeriodConstructorReturnTypeExtension' => [['0217']],
		'PHPStan\Type\Php\DateTimeConstructorThrowTypeExtension' => [['0218']],
		'PHPStan\Type\Php\JsonThrowOnErrorDynamicReturnTypeExtension' => [['0219']],
		'PHPStan\Type\Php\CompactFunctionReturnTypeExtension' => [['0220']],
		'PHPStan\Type\Php\DomDocumentCreateElementDynamicReturnTypeExtension' => [['0221']],
		'PHPStan\Type\Php\ReflectionFunctionConstructorThrowTypeExtension' => [['0222']],
		'PHPStan\Type\Php\ClosureBindToDynamicReturnTypeExtension' => [['0223']],
		'PHPStan\Type\Php\ParseStrParameterOutTypeExtension' => [['0224']],
		'PHPStan\Type\Php\DateTimeSubMethodThrowTypeExtension' => [['0225']],
		'PHPStan\Type\Php\ArrayKeyDynamicReturnTypeExtension' => [['0226']],
		'PHPStan\Type\Php\SimpleXMLElementXpathMethodReturnTypeExtension' => [['0227']],
		'PHPStan\Type\Php\IniGetReturnTypeExtension' => [['0228']],
		'PHPStan\Type\Php\ArrayRandFunctionReturnTypeExtension' => [['0229']],
		'PHPStan\Type\Php\StrPadFunctionReturnTypeExtension' => [['0230']],
		'PHPStan\Type\Php\ArrayCombineHelper' => [['0231']],
		'PHPStan\Type\Php\ArrayIntersectKeyFunctionReturnTypeExtension' => [['0232']],
		'PHPStan\Type\Php\MinMaxFunctionReturnTypeExtension' => [['0233']],
		'PHPStan\Type\Php\ArrayShiftFunctionReturnTypeExtension' => [['0234']],
		'PHPStan\Type\Php\CtypeDigitFunctionTypeSpecifyingExtension' => [['0235']],
		'PHPStan\Type\Php\GetDebugTypeFunctionReturnTypeExtension' => [['0236']],
		'PHPStan\Type\Php\DateTimeCreateDynamicReturnTypeExtension' => [['0237']],
		'PHPStan\Type\Php\HighlightStringDynamicReturnTypeExtension' => [['0238']],
		'PHPStan\Type\Php\ArrayFindFunctionReturnTypeExtension' => [['0239']],
		'PHPStan\Type\Php\ArrayChunkFunctionReturnTypeExtension' => [['0240']],
		'PHPStan\Type\Php\RoundFunctionReturnTypeExtension' => [['0241']],
		'PHPStan\Type\Php\FilterInputDynamicReturnTypeExtension' => [['0242']],
		'PHPStan\Type\Php\DateTimeZoneConstructorThrowTypeExtension' => [['0243']],
		'PHPStan\Type\Php\DateFormatMethodReturnTypeExtension' => [['0244']],
		'PHPStan\Type\Php\ConstantFunctionReturnTypeExtension' => [['0245']],
		'PHPStan\Type\Php\ExplodeFunctionDynamicReturnTypeExtension' => [['0246']],
		'PHPStan\Type\Php\ArrayCombineFunctionThrowTypeExtension' => [['0247']],
		'PHPStan\Type\Php\MethodExistsTypeSpecifyingExtension' => [['0248']],
		'PHPStan\Type\Php\CurlGetinfoFunctionDynamicReturnTypeExtension' => [['0249']],
		'PHPStan\Type\Php\TrimFunctionDynamicReturnTypeExtension' => [['0250']],
		'PHPStan\Type\Php\ClassExistsFunctionTypeSpecifyingExtension' => [['0251']],
		'PHPStan\Type\Php\IsAFunctionTypeSpecifyingHelper' => [['0252']],
		'PHPStan\Type\Php\ImplodeFunctionReturnTypeExtension' => [['0253']],
		'PHPStan\Type\Php\TypeSpecifyingFunctionsDynamicReturnTypeExtension' => [['0254']],
		'PHPStan\Type\Php\ArrayReplaceFunctionReturnTypeExtension' => [['0255']],
		'PHPStan\Type\Php\IntdivThrowTypeExtension' => [['0256']],
		'PHPStan\Type\Php\ArrayFillKeysFunctionReturnTypeExtension' => [['0257']],
		'PHPStan\Type\Php\Base64DecodeDynamicFunctionReturnTypeExtension' => [['0258']],
		'PHPStan\Type\Php\StatDynamicReturnTypeExtension' => [['0259']],
		'PHPStan\Type\Php\DefineConstantTypeSpecifyingExtension' => [['0260']],
		'PHPStan\Type\Php\OpenSslEncryptParameterOutTypeExtension' => [['0261']],
		'PHPStan\Type\Php\DsMapDynamicMethodThrowTypeExtension' => [['0262']],
		'PHPStan\Type\Php\StrrevFunctionReturnTypeExtension' => [['0263']],
		'PHPStan\Type\Php\VersionCompareFunctionDynamicThrowTypeExtension' => [['0264']],
		'PHPStan\Type\Php\DateFunctionReturnTypeHelper' => [['0265']],
		'PHPStan\Type\Php\SetTypeFunctionTypeSpecifyingExtension' => [['0266']],
		'PHPStan\Type\Php\PDOConnectReturnTypeExtension' => [['0267']],
		'PHPStan\Type\Php\ArrayColumnHelper' => [['0268']],
		'PHPStan\Type\Php\ArrayMapFunctionReturnTypeExtension' => [['0269']],
		'PHPStan\Type\Php\StrWordCountFunctionDynamicReturnTypeExtension' => [['0270']],
		'PHPStan\Type\Php\GetClassDynamicReturnTypeExtension' => [['0271']],
		'PHPStan\Type\Php\IsArrayFunctionTypeSpecifyingExtension' => [['0272']],
		'PHPStan\Type\Php\ArrayCountValuesDynamicReturnTypeExtension' => [['0273']],
		'PHPStan\Type\Php\InArrayFunctionTypeSpecifyingExtension' => [['0274']],
		'PHPStan\Type\OperatorTypeSpecifyingExtension' => [['0275']],
		'PHPStan\Type\Php\BcMathNumberOperatorTypeSpecifyingExtension' => [['0275']],
		'PHPStan\Type\Php\ArrayReverseFunctionReturnTypeExtension' => [['0276']],
		'PHPStan\Type\Php\MbSubstituteCharacterDynamicReturnTypeExtension' => [['0277']],
		'PHPStan\Type\Php\RangeFunctionReturnTypeExtension' => [['0278']],
		'PHPStan\Type\Php\IsSubclassOfFunctionTypeSpecifyingExtension' => [['0279']],
		'PHPStan\Type\Php\IsAFunctionTypeSpecifyingExtension' => [['0280']],
		'PHPStan\Type\Php\ArrayNextDynamicReturnTypeExtension' => [['0281']],
		'PHPStan\Type\Php\ArrayColumnFunctionReturnTypeExtension' => [['0282']],
		'PHPStan\Type\Php\ArrayReduceFunctionReturnTypeExtension' => [['0283']],
		'PHPStan\Type\Php\VersionCompareFunctionDynamicReturnTypeExtension' => [['0284']],
		'PHPStan\Type\Php\StrRepeatFunctionReturnTypeExtension' => [['0285']],
		'PHPStan\Type\Php\XMLReaderOpenReturnTypeExtension' => [['0286']],
		'PHPStan\Type\Php\JsonThrowTypeExtension' => [['0287']],
		'PHPStan\Type\Php\DateIntervalFormatDynamicReturnTypeExtension' => [['0288']],
		'PHPStan\Type\Php\DateFormatFunctionReturnTypeExtension' => [['0289']],
		'PHPStan\Type\Php\ArrayPointerFunctionsDynamicReturnTypeExtension' => [['0290']],
		'PHPStan\Type\Php\MbFunctionsReturnTypeExtension' => [['0291']],
		'PHPStan\Type\Php\MbStrlenFunctionReturnTypeExtension' => [['0292']],
		'PHPStan\Type\Php\DateFunctionReturnTypeExtension' => [['0293']],
		'PHPStan\Type\Php\FilterFunctionReturnTypeHelper' => [['0294']],
		'PHPStan\Type\Php\GetCalledClassDynamicReturnTypeExtension' => [['0295']],
		'PHPStan\Type\Php\ArrayKeysFunctionDynamicReturnTypeExtension' => [['0296']],
		'PHPStan\Type\Php\PathinfoFunctionDynamicReturnTypeExtension' => [['0297']],
		'PHPStan\Type\Php\AbsFunctionDynamicReturnTypeExtension' => [['0298']],
		'PHPStan\Type\Php\FunctionExistsFunctionTypeSpecifyingExtension' => [['0299']],
		'PHPStan\Type\Php\RandomIntFunctionReturnTypeExtension' => [['0300']],
		'PHPStan\Type\Php\StrvalFamilyFunctionReturnTypeExtension' => [['0301']],
		'PHPStan\Type\Php\PregMatchTypeSpecifyingExtension' => [['0302']],
		'PHPStan\Type\Php\ReflectionClassConstructorThrowTypeExtension' => [['0303']],
		'PHPStan\Type\Php\StrContainingTypeSpecifyingExtension' => [['0304']],
		'PHPStan\Type\BitwiseFlagHelper' => [['0305']],
		'PHPStan\Type\ClosureTypeFactory' => [['0306']],
		'PHPStan\Type\Regex\RegexExpressionHelper' => [['0307']],
		'PHPStan\Type\Regex\RegexGroupParser' => [['0308']],
		'PHPStan\Type\Constant\OversizedArrayBuilder' => [['0309']],
		'PHPStan\Type\FileTypeMapper' => [0 => ['0310'], 2 => [1 => 'stubFileTypeMapper']],
		'PHPStan\Type\TypeAliasResolverProvider' => [['0311']],
		'PHPStan\Type\LazyTypeAliasResolverProvider' => [['0311']],
		'PHPStan\Php\PhpVersionFactoryFactory' => [['0312']],
		'PHPStan\Php\PhpVersionFactory' => [['0313']],
		'PHPStan\Php\PhpVersion' => [['0314']],
		'PHPStan\Php\ComposerPhpVersionFactory' => [['0315']],
		'PhpParser\PrettyPrinter\Standard' => [1 => ['0316']],
		'PhpParser\PrettyPrinterAbstract' => [1 => ['0316']],
		'PhpParser\PrettyPrinter' => [1 => ['0316']],
		'PHPStan\Node\Printer\Printer' => [['0316']],
		'PHPStan\Node\Printer\ExprPrinter' => [['0317']],
		'PHPStan\Node\DeepNodeCloner' => [['0318']],
		'PHPStan\BetterReflection\Reflector\Reflector' => [
			0 => ['betterReflectionReflector'],
			2 => [1 => 'originalBetterReflectionReflector', 'nodeScopeResolverReflector'],
		],
		'PHPStan\Reflection\BetterReflection\Reflector\MemoizingReflector' => [
			0 => ['betterReflectionReflector'],
			2 => [1 => 'nodeScopeResolverReflector'],
		],
		'PHPStan\Reflection\BetterReflection\BetterReflectionSourceLocatorFactory' => [['0319']],
		'PHPStan\Reflection\BetterReflection\Type\AdapterReflectionEnumDynamicReturnTypeExtension' => [['0320']],
		'PHPStan\Reflection\BetterReflection\SourceStubber\ReflectionSourceStubberFactory' => [['0321']],
		'PHPStan\Reflection\BetterReflection\SourceStubber\PhpStormStubsSourceStubberFactory' => [['0322']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorRepository' => [['0323']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorRepository' => [['0324']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorFactory' => [['0325']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\ComposerJsonAndInstalledJsonSourceLocatorMaker' => [['0326']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\FileNodesFetcher' => [['0327']],
		'PHPStan\Reflection\AttributeReflectionFactory' => [['0328']],
		'PHPStan\Reflection\AllowedSubTypesClassReflectionExtension' => [['0329', '0330']],
		'PHPStan\Reflection\Php\SealedAllowedSubTypesClassReflectionExtension' => [['0329']],
		'PHPStan\Reflection\Php\EnumAllowedSubTypesClassReflectionExtension' => [['0330']],
		'PHPStan\Reflection\InitializerExprTypeResolver' => [['0331']],
		'PHPStan\Reflection\Deprecation\DeprecationProvider' => [['0332']],
		'PHPStan\Reflection\ConstructorsHelper' => [['0333']],
		'PHPStan\Reflection\ReflectionProvider\ReflectionProviderFactory' => [['reflectionProviderFactory']],
		'PHPStan\Reflection\ReflectionProvider\ReflectionProviderProvider' => [['0334']],
		'PHPStan\Reflection\ReflectionProvider\LazyReflectionProviderProvider' => [['0334']],
		'PHPStan\Reflection\SignatureMap\SignatureMapProvider' => [['0339'], ['0335', '0338']],
		'PHPStan\Reflection\SignatureMap\Php8SignatureMapProvider' => [['0335']],
		'PHPStan\Reflection\SignatureMap\NativeFunctionReflectionProvider' => [['0336']],
		'PHPStan\Reflection\SignatureMap\SignatureMapParser' => [['0337']],
		'PHPStan\Reflection\SignatureMap\FunctionSignatureMapProvider' => [['0338']],
		'PHPStan\Reflection\SignatureMap\SignatureMapProviderFactory' => [['0340']],
		'PHPStan\Process\CpuCoreCounter' => [['0341']],
		'PHPStan\Rules\UnusedFunctionParametersCheck' => [['0342']],
		'PHPStan\Rules\Exceptions\MissingCheckedExceptionInThrowsCheck' => [['0343']],
		'PHPStan\Rules\Exceptions\ExceptionTypeResolver' => [1 => ['0344'], [1 => 'exceptionTypeResolver']],
		'PHPStan\Rules\Exceptions\DefaultExceptionTypeResolver' => [['0344']],
		'PHPStan\Rules\Exceptions\TooWideThrowTypeCheck' => [['0345']],
		'PHPStan\Rules\Constants\AlwaysUsedClassConstantsExtensionProvider' => [['0346']],
		'PHPStan\Rules\Constants\LazyAlwaysUsedClassConstantsExtensionProvider' => [['0346']],
		'PHPStan\Rules\FunctionDefinitionCheck' => [['0347']],
		'PHPStan\Rules\Api\ApiRuleHelper' => [['0348']],
		'PHPStan\Rules\Functions\PrintfHelper' => [['0349']],
		'PHPStan\Rules\Pure\FunctionPurityCheck' => [['0350']],
		'PHPStan\Rules\AttributesCheck' => [['0351']],
		'PHPStan\Rules\IssetCheck' => [['0352']],
		'PHPStan\Rules\Playground\NeverRuleHelper' => [['0353']],
		'PHPStan\Rules\Comparison\PossiblyImpureTipHelper' => [['0354']],
		'PHPStan\Rules\Comparison\ConstantConditionRuleHelper' => [['0355']],
		'PHPStan\Rules\Comparison\ImpossibleCheckTypeHelper' => [['0356']],
		'PHPStan\Rules\Properties\PropertyDescriptor' => [['0357']],
		'PHPStan\Rules\Properties\PropertyReflectionFinder' => [['0358']],
		'PHPStan\Rules\Properties\AccessPropertiesCheck' => [['0359']],
		'PHPStan\Rules\Properties\ReadWritePropertiesExtensionProvider' => [['0360']],
		'PHPStan\Rules\Properties\LazyReadWritePropertiesExtensionProvider' => [['0360']],
		'PHPStan\Rules\Properties\AccessStaticPropertiesCheck' => [['0361']],
		'PHPStan\Rules\ClassCaseSensitivityCheck' => [['0362']],
		'PHPStan\Rules\Debug\FileAssertRule' => [['0363']],
		'PHPStan\Rules\Debug\DumpTypeRule' => [['0364']],
		'PHPStan\Rules\Debug\DumpPhpDocTypeRule' => [['0365']],
		'PHPStan\Rules\Debug\DumpNativeTypeRule' => [['0366']],
		'PHPStan\Rules\Debug\DebugScopeRule' => [['0367']],
		'PHPStan\Rules\MissingTypehintCheck' => [['0368']],
		'PHPStan\Rules\ClassNameCheck' => [['0369']],
		'PHPStan\Rules\ClassForbiddenNameCheck' => [['0370']],
		'PHPStan\Rules\FunctionReturnTypeCheck' => [['0371']],
		'PHPStan\Rules\Registry' => [['registry']],
		'PHPStan\Rules\LazyRegistry' => [['registry']],
		'PHPStan\Rules\FunctionCallParametersCheck' => [['0372']],
		'PHPStan\Rules\Classes\LocalTypeAliasesCheck' => [['0373']],
		'PHPStan\Rules\Classes\ConsistentConstructorHelper' => [['0374']],
		'PHPStan\Rules\Classes\MixinCheck' => [['0375']],
		'PHPStan\Rules\Classes\PropertyTagCheck' => [['0376']],
		'PHPStan\Rules\Classes\MethodTagCheck' => [['0377']],
		'PHPStan\Rules\Classes\DuplicateDeclarationHelper' => [['0378']],
		'PHPStan\Rules\RestrictedUsage\RestrictedMethodCallableUsageRule' => [['0379']],
		'PHPStan\Rules\RestrictedUsage\RestrictedStaticMethodUsageRule' => [['0380']],
		'PHPStan\Rules\RestrictedUsage\RestrictedFunctionUsageRule' => [['0381']],
		'PHPStan\Rules\RestrictedUsage\RestrictedFunctionCallableUsageRule' => [['0382']],
		'PHPStan\Rules\RestrictedUsage\RestrictedMethodUsageRule' => [['0383']],
		'PHPStan\Rules\RestrictedUsage\RestrictedClassConstantUsageRule' => [['0384']],
		'PHPStan\Rules\RestrictedUsage\RestrictedUsageOfDeprecatedStringCastRule' => [['0385']],
		'PHPStan\Rules\RestrictedUsage\RestrictedPropertyUsageRule' => [['0386']],
		'PHPStan\Rules\RestrictedUsage\RestrictedStaticPropertyUsageRule' => [['0387']],
		'PHPStan\Rules\RestrictedUsage\RestrictedStaticMethodCallableUsageRule' => [['0388']],
		'PHPStan\Rules\NullsafeCheck' => [['0389']],
		'PHPStan\Rules\RuleLevelHelper' => [['0390']],
		'PHPStan\Rules\Methods\StaticMethodCallCheck' => [['0391']],
		'PHPStan\Rules\Methods\ParentMethodHelper' => [['0392']],
		'PHPStan\Rules\Methods\MethodCallCheck' => [['0393']],
		'PHPStan\Rules\Methods\MethodPrototypeFinder' => [['0394']],
		'PHPStan\Rules\Methods\MethodVisibilityComparisonHelper' => [['0395']],
		'PHPStan\Rules\Methods\MethodParameterComparisonHelper' => [['0396']],
		'PHPStan\Rules\Methods\AlwaysUsedMethodExtensionProvider' => [['0397']],
		'PHPStan\Rules\Methods\LazyAlwaysUsedMethodExtensionProvider' => [['0397']],
		'PHPStan\Rules\ParameterCastableToStringCheck' => [['0398']],
		'PHPStan\Rules\TooWideTypehints\TooWideTypeCheck' => [['0399']],
		'PHPStan\Rules\TooWideTypehints\TooWideParameterOutTypeCheck' => [['0400']],
		'PHPStan\Rules\InternalTag\RestrictedInternalUsageHelper' => [['0401']],
		'PHPStan\Rules\Generics\TemplateTypeCheck' => [['0402']],
		'PHPStan\Rules\Generics\MethodTagTemplateTypeCheck' => [['0403']],
		'PHPStan\Rules\Generics\GenericObjectTypeCheck' => [['0404']],
		'PHPStan\Rules\Generics\GenericAncestorsCheck' => [['0405']],
		'PHPStan\Rules\Generics\CrossCheckInterfacesHelper' => [['0406']],
		'PHPStan\Rules\Generics\VarianceCheck' => [['0407']],
		'PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchCheck' => [['0408']],
		'PHPStan\Rules\PhpDoc\GenericCallableRuleHelper' => [['0409']],
		'PHPStan\Rules\PhpDoc\ConditionalReturnTypeRuleHelper' => [['0410']],
		'PHPStan\Rules\PhpDoc\RequireExtendsCheck' => [['0411']],
		'PHPStan\Rules\PhpDoc\UnresolvableTypeHelper' => [['0412']],
		'PHPStan\Rules\PhpDoc\AssertRuleHelper' => [['0413']],
		'PHPStan\Rules\PhpDoc\VarTagTypeRuleHelper' => [['0414']],
		'PHPStan\Rules\PhpDoc\IncompatiblePhpDocTypeCheck' => [['0415']],
		'PHPStan\File\FileHelper' => [['0416']],
		'PHPStan\File\FileMonitor' => [['0417']],
		'PHPStan\File\FileExcluderFactory' => [['0418']],
		'PHPStan\File\RelativePathHelper' => [
			0 => ['relativePathHelper'],
			2 => [1 => 'simpleRelativePathHelper', 'parentDirectoryRelativePathHelper'],
		],
		'PHPStan\File\FuzzyRelativePathHelper' => [['relativePathHelper']],
		'PHPStan\Diagnose\DiagnoseExtension' => [0 => ['0419'], 2 => [1 => 'phpstanDiagnoseExtension']],
		'PHPStan\Parallel\Scheduler' => [['0419']],
		'PHPStan\Parallel\ParallelAnalyser' => [['0420']],
		'PHPStan\Command\FixerApplication' => [['0421']],
		'PHPStan\Command\AnalyserRunner' => [['0422']],
		'PHPStan\Command\AnalyseApplication' => [['0423']],
		'PHPStan\Command\ErrorFormatter\ErrorFormatter' => [
			[
				'errorFormatter.gitlab',
				'errorFormatter.raw',
				'errorFormatter.checkstyle',
				'errorFormatter.table',
				'errorFormatter.github',
				'errorFormatter.teamcity',
				'errorFormatter.junit',
				'errorFormatter.json',
				'errorFormatter.prettyJson',
			],
			['0424'],
		],
		'PHPStan\Command\ErrorFormatter\GitlabErrorFormatter' => [['errorFormatter.gitlab']],
		'PHPStan\Command\ErrorFormatter\RawErrorFormatter' => [['errorFormatter.raw']],
		'PHPStan\Command\ErrorFormatter\CheckstyleErrorFormatter' => [['errorFormatter.checkstyle']],
		'PHPStan\Command\ErrorFormatter\TableErrorFormatter' => [['errorFormatter.table']],
		'PHPStan\Command\ErrorFormatter\GithubErrorFormatter' => [['errorFormatter.github']],
		'PHPStan\Command\ErrorFormatter\TeamcityErrorFormatter' => [['errorFormatter.teamcity']],
		'PHPStan\Command\ErrorFormatter\CiDetectedErrorFormatter' => [['0424']],
		'PHPStan\Command\ErrorFormatter\JunitErrorFormatter' => [['errorFormatter.junit']],
		'PHPStan\PhpDoc\PhpDocNodeResolver' => [['0425']],
		'PHPStan\PhpDoc\StubValidator' => [['0426']],
		'PHPStan\PhpDoc\StubFilesExtension' => [['0427', '0430', '0431', '0433', '0434']],
		'PHPStan\PhpDoc\SocketSelectStubFilesExtension' => [['0427']],
		'PHPStan\PhpDoc\TypeStringResolver' => [['0428']],
		'PHPStan\PhpDoc\PhpDocInheritanceResolver' => [['0429']],
		'PHPStan\PhpDoc\ReflectionClassStubFilesExtension' => [['0430']],
		'PHPStan\PhpDoc\ReflectionEnumStubFilesExtension' => [['0431']],
		'PHPStan\PhpDoc\StubPhpDocProvider' => [['stubPhpDocProvider']],
		'PHPStan\PhpDoc\StubFilesProvider' => [['0432']],
		'PHPStan\PhpDoc\DefaultStubFilesProvider' => [['0432']],
		'PHPStan\PhpDoc\JsonValidateStubFilesExtension' => [['0433']],
		'PHPStan\PhpDoc\BcMathNumberStubFilesExtension' => [['0434']],
		'PHPStan\PhpDoc\PhpDocStringResolver' => [['0435']],
		'PHPStan\PhpDoc\TypeNodeResolverExtensionRegistryProvider' => [['0436']],
		'PHPStan\PhpDoc\LazyTypeNodeResolverExtensionRegistryProvider' => [['0436']],
		'PHPStan\PhpDoc\TypeNodeResolver' => [['0437']],
		'PHPStan\PhpDoc\ConstExprNodeResolver' => [['0438']],
		'PHPStan\Cache\Cache' => [['0439']],
		'PHPStan\Reflection\ReflectionProvider' => [0 => ['reflectionProvider'], 2 => ['betterReflectionProvider']],
		'PHPStan\Reflection\BetterReflection\BetterReflectionProvider' => [2 => ['betterReflectionProvider']],
		'PHPStan\File\SimpleRelativePathHelper' => [2 => ['simpleRelativePathHelper']],
		'PHPStan\File\ParentDirectoryRelativePathHelper' => [2 => ['parentDirectoryRelativePathHelper']],
		'PHPStan\Analyser\ResultCache\ResultCacheManagerFactory' => [['0440']],
		'PHPStan\Analyser\InternalScopeFactoryFactory' => [['0441']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorFactory' => [['0442']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedPsrAutoloaderLocatorFactory' => [['0443']],
		'PHPStan\Reflection\Php\PhpMethodReflectionFactory' => [['0444']],
		'PHPStan\Reflection\FunctionReflectionFactory' => [['0445']],
		'PHPStan\Reflection\ClassReflectionFactory' => [['0446']],
		'PHPStan\File\FileExcluderRawFactory' => [['0447']],
		'PHPStan\Rules\Variables\UnsetRule' => [['0448']],
		'PHPStan\Rules\Variables\ParameterOutExecutionEndTypeRule' => [['0449']],
		'PHPStan\Rules\Variables\InvalidVariableAssignRule' => [['0450']],
		'PHPStan\Rules\Variables\ParameterOutAssignedTypeRule' => [['0451']],
		'PHPStan\Rules\Variables\VariableCloningRule' => [['0452']],
		'PHPStan\Rules\Variables\CompactVariablesRule' => [['0453']],
		'PHPStan\Rules\Variables\IssetRule' => [['0454']],
		'PHPStan\Rules\Variables\ThisInGlobalStatementRule' => [['0455']],
		'PHPStan\Rules\Variables\EmptyRule' => [['0456']],
		'PHPStan\Rules\Variables\NullCoalesceRule' => [['0457']],
		'PHPStan\Rules\Variables\DefinedVariableRule' => [['0458']],
		'PHPStan\Rules\Variables\ThisInStaticStatementRule' => [['0459']],
		'PHPStan\Rules\Exceptions\ThrowsVoidMethodWithExplicitThrowPointRule' => [['0460']],
		'PHPStan\Rules\Exceptions\NoncapturingCatchRule' => [['0461']],
		'PHPStan\Rules\Exceptions\CaughtExceptionExistenceRule' => [['0462']],
		'PHPStan\Rules\Exceptions\OverwrittenExitPointByFinallyRule' => [['0463']],
		'PHPStan\Rules\Exceptions\ThrowsVoidPropertyHookWithExplicitThrowPointRule' => [['0464']],
		'PHPStan\Rules\Exceptions\CatchWithUnthrownExceptionRule' => [['0465']],
		'PHPStan\Rules\Exceptions\ThrowExpressionRule' => [['0466']],
		'PHPStan\Rules\Exceptions\ThrowsVoidFunctionWithExplicitThrowPointRule' => [['0467']],
		'PHPStan\Rules\Exceptions\ThrowExprTypeRule' => [['0468']],
		'PHPStan\Rules\Ignore\IgnoreParseErrorRule' => [['0469']],
		'PHPStan\Rules\Constants\ClassAsClassConstantRule' => [['0470']],
		'PHPStan\Rules\Constants\OverridingConstantRule' => [['0471']],
		'PHPStan\Rules\Constants\MagicConstantContextRule' => [['0472']],
		'PHPStan\Rules\Constants\FinalConstantRule' => [['0473']],
		'PHPStan\Rules\Constants\NativeTypedClassConstantRule' => [['0474']],
		'PHPStan\Rules\Constants\DynamicClassConstantFetchRule' => [['0475']],
		'PHPStan\Rules\Constants\ValueAssignedToClassConstantRule' => [['0476']],
		'PHPStan\Rules\Constants\ConstantRule' => [['0477']],
		'PHPStan\Rules\Constants\FinalPrivateConstantRule' => [['0478']],
		'PHPStan\Rules\Constants\MissingClassConstantTypehintRule' => [['0479']],
		'PHPStan\Rules\Constants\ConstantAttributesRule' => [['0480']],
		'PHPStan\Rules\EnumCases\EnumCaseAttributesRule' => [['0481']],
		'PHPStan\Rules\EnumCases\EnumCaseOutsideEnumRule' => [['0482']],
		'PHPStan\Rules\Namespaces\ExistingNamesInUseRule' => [['0483']],
		'PHPStan\Rules\Namespaces\ExistingNamesInGroupUseRule' => [['0484']],
		'PHPStan\Rules\Api\ApiInstanceofTypeRule' => [['0485']],
		'PHPStan\Rules\Api\ApiClassExtendsRule' => [['0486']],
		'PHPStan\Rules\Api\RuntimeReflectionInstantiationRule' => [['0487']],
		'PHPStan\Rules\Api\ApiMethodCallRule' => [['0488']],
		'PHPStan\Rules\Api\PhpStanNamespaceIn3rdPartyPackageRule' => [['0489']],
		'PHPStan\Rules\Api\ApiClassConstFetchRule' => [['0490']],
		'PHPStan\Rules\Api\RuntimeReflectionFunctionRule' => [['0491']],
		'PHPStan\Rules\Api\NodeConnectingVisitorAttributesRule' => [['0492']],
		'PHPStan\Rules\Api\OldPhpParser4ClassRule' => [['0493']],
		'PHPStan\Rules\Api\GetTemplateTypeRule' => [['0494']],
		'PHPStan\Rules\Api\ApiInterfaceExtendsRule' => [['0495']],
		'PHPStan\Rules\Api\ApiStaticCallRule' => [['0496']],
		'PHPStan\Rules\Api\ApiInstanceofRule' => [['0497']],
		'PHPStan\Rules\Api\ApiInstantiationRule' => [['0498']],
		'PHPStan\Rules\Api\ApiClassImplementsRule' => [['0499']],
		'PHPStan\Rules\Api\ApiTraitUseRule' => [['0500']],
		'PHPStan\Rules\Functions\ArrowFunctionReturnNullsafeByRefRule' => [['0501']],
		'PHPStan\Rules\Functions\FunctionCallableRule' => [['0502']],
		'PHPStan\Rules\Functions\SortParameterCastableToStringRule' => [['0503']],
		'PHPStan\Rules\Functions\ReturnNullsafeByRefRule' => [['0504']],
		'PHPStan\Rules\Functions\FunctionAttributesRule' => [['0505']],
		'PHPStan\Rules\Functions\ClosureReturnTypeRule' => [['0506']],
		'PHPStan\Rules\Functions\CallCallablesRule' => [['0507']],
		'PHPStan\Rules\Functions\ReturnTypeRule' => [['0508']],
		'PHPStan\Rules\Functions\CallToFunctionStatementWithoutSideEffectsRule' => [['0509']],
		'PHPStan\Rules\Functions\PrintfArrayParametersRule' => [['0510']],
		'PHPStan\Rules\Functions\FilterVarRule' => [['0511']],
		'PHPStan\Rules\Functions\CallToNonExistentFunctionRule' => [['0512']],
		'PHPStan\Rules\Functions\ParameterCastableToStringRule' => [['0513']],
		'PHPStan\Rules\Functions\ArrowFunctionReturnTypeRule' => [['0514']],
		'PHPStan\Rules\Functions\CallToFunctionParametersRule' => [['0515']],
		'PHPStan\Rules\Functions\UnusedClosureUsesRule' => [['0516']],
		'PHPStan\Rules\Functions\CallUserFuncRule' => [['0517']],
		'PHPStan\Rules\Functions\UselessFunctionReturnValueRule' => [['0518']],
		'PHPStan\Rules\Functions\ArrowFunctionAttributesRule' => [['0519']],
		'PHPStan\Rules\Functions\ArrayValuesRule' => [['0520']],
		'PHPStan\Rules\Functions\InvalidParameterNameRule' => [['0521']],
		'PHPStan\Rules\Functions\MissingFunctionReturnTypehintRule' => [['0522']],
		'PHPStan\Rules\Functions\RedefinedParametersRule' => [['0523']],
		'PHPStan\Rules\Functions\DefineParametersRule' => [['0524']],
		'PHPStan\Rules\Functions\ExistingClassesInTypehintsRule' => [['0525']],
		'PHPStan\Rules\Functions\InvalidLexicalVariablesInClosureUseRule' => [['0526']],
		'PHPStan\Rules\Functions\ArrayFilterRule' => [['0527']],
		'PHPStan\Rules\Functions\CallToFunctionStatementWithNoDiscardRule' => [['0528']],
		'PHPStan\Rules\Functions\IncompatibleArrowFunctionDefaultParameterTypeRule' => [['0529']],
		'PHPStan\Rules\Functions\ParamAttributesRule' => [['0530']],
		'PHPStan\Rules\Functions\InnerFunctionRule' => [['0531']],
		'PHPStan\Rules\Functions\ClosureAttributesRule' => [['0532']],
		'PHPStan\Rules\Functions\ExistingClassesInArrowFunctionTypehintsRule' => [['0533']],
		'PHPStan\Rules\Functions\MissingFunctionParameterTypehintRule' => [['0534']],
		'PHPStan\Rules\Functions\PrintfParametersRule' => [['0535']],
		'PHPStan\Rules\Functions\VariadicParametersDeclarationRule' => [['0536']],
		'PHPStan\Rules\Functions\ImplodeParameterCastableToStringRule' => [['0537']],
		'PHPStan\Rules\Functions\ExistingClassesInClosureTypehintsRule' => [['0538']],
		'PHPStan\Rules\Functions\IncompatibleClosureDefaultParameterTypeRule' => [['0539']],
		'PHPStan\Rules\Functions\RandomIntParametersRule' => [['0540']],
		'PHPStan\Rules\Functions\IncompatibleDefaultParameterTypeRule' => [['0541']],
		'PHPStan\Rules\Pure\PureFunctionRule' => [['0542']],
		'PHPStan\Rules\Pure\PureMethodRule' => [['0543']],
		'PHPStan\Rules\Types\InvalidTypesInUnionRule' => [['0544']],
		'PHPStan\Rules\DeadCode\UnusedPrivateConstantRule' => [['0545']],
		'PHPStan\Rules\DeadCode\CallToConstructorStatementWithoutImpurePointsRule' => [['0546']],
		'PHPStan\Rules\DeadCode\CallToMethodStatementWithoutImpurePointsRule' => [['0547']],
		'PHPStan\Rules\DeadCode\CallToStaticMethodStatementWithoutImpurePointsRule' => [['0548']],
		'PHPStan\Rules\DeadCode\UnusedPrivateMethodRule' => [['0549']],
		'PHPStan\Rules\DeadCode\CallToFunctionStatementWithoutImpurePointsRule' => [['0550']],
		'PHPStan\Rules\DeadCode\NoopRule' => [['0551']],
		'PHPStan\Rules\DeadCode\UnusedPrivatePropertyRule' => [['0552']],
		'PHPStan\Rules\DeadCode\UnreachableStatementRule' => [['0553']],
		'PHPStan\Rules\Comparison\IfConstantConditionRule' => [['0554']],
		'PHPStan\Rules\Comparison\DoWhileLoopConstantConditionRule' => [['0555']],
		'PHPStan\Rules\Comparison\UsageOfVoidMatchExpressionRule' => [['0556']],
		'PHPStan\Rules\Comparison\BooleanOrConstantConditionRule' => [['0557']],
		'PHPStan\Rules\Comparison\LogicalXorConstantConditionRule' => [['0558']],
		'PHPStan\Rules\Comparison\WhileLoopAlwaysTrueConditionRule' => [['0559']],
		'PHPStan\Rules\Comparison\ElseIfConstantConditionRule' => [['0560']],
		'PHPStan\Rules\Comparison\ImpossibleCheckTypeStaticMethodCallRule' => [['0561']],
		'PHPStan\Rules\Comparison\BooleanNotConstantConditionRule' => [['0562']],
		'PHPStan\Rules\Comparison\ConstantLooseComparisonRule' => [['0563']],
		'PHPStan\Rules\Comparison\BooleanAndConstantConditionRule' => [['0564']],
		'PHPStan\Rules\Comparison\TernaryOperatorConstantConditionRule' => [['0565']],
		'PHPStan\Rules\Comparison\ImpossibleCheckTypeMethodCallRule' => [['0566']],
		'PHPStan\Rules\Comparison\NumberComparisonOperatorsConstantConditionRule' => [['0567']],
		'PHPStan\Rules\Comparison\StrictComparisonOfDifferentTypesRule' => [['0568']],
		'PHPStan\Rules\Comparison\WhileLoopAlwaysFalseConditionRule' => [['0569']],
		'PHPStan\Rules\Comparison\MatchExpressionRule' => [['0570']],
		'PHPStan\Rules\Comparison\ImpossibleCheckTypeFunctionCallRule' => [['0571']],
		'PHPStan\Rules\Keywords\ContinueBreakInLoopRule' => [['0572']],
		'PHPStan\Rules\Keywords\RequireFileExistsRule' => [['0573']],
		'PHPStan\Rules\Keywords\DeclareStrictTypesRule' => [['0574']],
		'PHPStan\Rules\Properties\SetPropertyHookParameterRule' => [['0575']],
		'PHPStan\Rules\Properties\InvalidCallablePropertyTypeRule' => [['0576']],
		'PHPStan\Rules\Properties\AccessPrivatePropertyThroughStaticRule' => [['0577']],
		'PHPStan\Rules\Properties\WritingToReadOnlyPropertiesRule' => [['0578']],
		'PHPStan\Rules\Properties\PropertyAssignRefRule' => [['0579']],
		'PHPStan\Rules\Properties\MissingReadOnlyByPhpDocPropertyAssignRule' => [['0580']],
		'PHPStan\Rules\Properties\ReadOnlyPropertyAssignRefRule' => [['0581']],
		'PHPStan\Rules\Properties\OverridingPropertyRule' => [['0582']],
		'PHPStan\Rules\Properties\AccessPropertiesRule' => [['0583']],
		'PHPStan\Rules\Properties\AccessStaticPropertiesRule' => [['0584']],
		'PHPStan\Rules\Properties\GetNonVirtualPropertyHookReadRule' => [['0585']],
		'PHPStan\Rules\Properties\TypesAssignedToPropertiesRule' => [['0586']],
		'PHPStan\Rules\Properties\PropertiesInInterfaceRule' => [['0587']],
		'PHPStan\Rules\Properties\MissingPropertyTypehintRule' => [['0588']],
		'PHPStan\Rules\Properties\ExistingClassesInPropertyHookTypehintsRule' => [['0589']],
		'PHPStan\Rules\Properties\NullsafePropertyFetchRule' => [['0590']],
		'PHPStan\Rules\Properties\SetNonVirtualPropertyHookAssignRule' => [['0591']],
		'PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyAssignRefRule' => [['0592']],
		'PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyAssignRule' => [['0593']],
		'PHPStan\Rules\Properties\AccessStaticPropertiesInAssignRule' => [['0594']],
		'PHPStan\Rules\Properties\PropertyAttributesRule' => [['0595']],
		'PHPStan\Rules\Properties\DefaultValueTypesAssignedToPropertiesRule' => [['0596']],
		'PHPStan\Rules\Properties\ReadingWriteOnlyPropertiesRule' => [['0597']],
		'PHPStan\Rules\Properties\AccessPropertiesInAssignRule' => [['0598']],
		'PHPStan\Rules\Properties\ExistingClassesInPropertiesRule' => [['0599']],
		'PHPStan\Rules\Properties\ReadOnlyPropertyRule' => [['0600']],
		'PHPStan\Rules\Properties\ReadOnlyPropertyAssignRule' => [['0601']],
		'PHPStan\Rules\Properties\MissingReadOnlyPropertyAssignRule' => [['0602']],
		'PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyRule' => [['0603']],
		'PHPStan\Rules\Properties\PropertyInClassRule' => [['0604']],
		'PHPStan\Rules\Properties\PropertyHookAttributesRule' => [['0605']],
		'PHPStan\Rules\Traits\NotAnalysedTraitRule' => [['0606']],
		'PHPStan\Rules\Traits\ConflictingTraitConstantsRule' => [['0607']],
		'PHPStan\Rules\Traits\TraitAttributesRule' => [['0608']],
		'PHPStan\Rules\Traits\ConstantsInTraitsRule' => [['0609']],
		'PHPStan\Rules\Generators\YieldInGeneratorRule' => [['0610']],
		'PHPStan\Rules\Generators\YieldTypeRule' => [['0611']],
		'PHPStan\Rules\Generators\YieldFromTypeRule' => [['0612']],
		'PHPStan\Rules\Missing\MissingReturnRule' => [['0613']],
		'PHPStan\Rules\Classes\RequireExtendsRule' => [['0614']],
		'PHPStan\Rules\Classes\MethodTagTraitUseRule' => [['0615']],
		'PHPStan\Rules\Classes\ClassConstantAttributesRule' => [['0616']],
		'PHPStan\Rules\Classes\ExistingClassInTraitUseRule' => [['0617']],
		'PHPStan\Rules\Classes\DuplicateDeclarationRule' => [['0618']],
		'PHPStan\Rules\Classes\ClassConstantRule' => [['0619']],
		'PHPStan\Rules\Classes\ImpossibleInstanceOfRule' => [['0620']],
		'PHPStan\Rules\Classes\LocalTypeTraitAliasesRule' => [['0621']],
		'PHPStan\Rules\Classes\LocalTypeTraitUseAliasesRule' => [['0622']],
		'PHPStan\Rules\Classes\MethodTagRule' => [['0623']],
		'PHPStan\Rules\Classes\InvalidPromotedPropertiesRule' => [['0624']],
		'PHPStan\Rules\Classes\LocalTypeAliasesRule' => [['0625']],
		'PHPStan\Rules\Classes\EnumSanityRule' => [['0626']],
		'PHPStan\Rules\Classes\ExistingClassesInEnumImplementsRule' => [['0627']],
		'PHPStan\Rules\Classes\PropertyTagTraitRule' => [['0628']],
		'PHPStan\Rules\Classes\DuplicateTraitDeclarationRule' => [['0629']],
		'PHPStan\Rules\Classes\AccessPrivateConstantThroughStaticRule' => [['0630']],
		'PHPStan\Rules\Classes\ExistingClassInClassExtendsRule' => [['0631']],
		'PHPStan\Rules\Classes\ExistingClassesInClassImplementsRule' => [['0632']],
		'PHPStan\Rules\Classes\NonClassAttributeClassRule' => [['0633']],
		'PHPStan\Rules\Classes\PropertyTagRule' => [['0634']],
		'PHPStan\Rules\Classes\ExistingClassInInstanceOfRule' => [['0635']],
		'PHPStan\Rules\Classes\AllowedSubTypesRule' => [['0636']],
		'PHPStan\Rules\Classes\ExistingClassesInInterfaceExtendsRule' => [['0637']],
		'PHPStan\Rules\Classes\MixinRule' => [['0638']],
		'PHPStan\Rules\Classes\NewStaticRule' => [['0639']],
		'PHPStan\Rules\Classes\InstantiationCallableRule' => [['0640']],
		'PHPStan\Rules\Classes\MethodTagTraitRule' => [['0641']],
		'PHPStan\Rules\Classes\InstantiationRule' => [['0642']],
		'PHPStan\Rules\Classes\MixinTraitUseRule' => [['0643']],
		'PHPStan\Rules\Classes\ReadOnlyClassRule' => [['0644']],
		'PHPStan\Rules\Classes\UnusedConstructorParametersRule' => [['0645']],
		'PHPStan\Rules\Classes\PropertyTagTraitUseRule' => [['0646']],
		'PHPStan\Rules\Classes\MixinTraitRule' => [['0647']],
		'PHPStan\Rules\Classes\TraitAttributeClassRule' => [['0648']],
		'PHPStan\Rules\Classes\ClassAttributesRule' => [['0649']],
		'PHPStan\Rules\Classes\RequireImplementsRule' => [['0650']],
		'PHPStan\Rules\DateTimeInstantiationRule' => [['0651']],
		'PHPStan\Rules\Names\UsedNamesRule' => [['0652']],
		'PHPStan\Rules\Methods\MethodVisibilityInInterfaceRule' => [['0653']],
		'PHPStan\Rules\Methods\MissingMethodImplementationRule' => [['0654']],
		'PHPStan\Rules\Methods\CallToMethodStatementWithoutSideEffectsRule' => [['0655']],
		'PHPStan\Rules\Methods\NullsafeMethodCallRule' => [['0656']],
		'PHPStan\Rules\Methods\MissingMethodReturnTypehintRule' => [['0657']],
		'PHPStan\Rules\Methods\CallStaticMethodsRule' => [['0658']],
		'PHPStan\Rules\Methods\MethodAttributesRule' => [['0659']],
		'PHPStan\Rules\Methods\CallToConstructorStatementWithoutSideEffectsRule' => [['0660']],
		'PHPStan\Rules\Methods\CallMethodsRule' => [['0661']],
		'PHPStan\Rules\Methods\MethodCallableRule' => [['0662']],
		'PHPStan\Rules\Methods\MissingMethodSelfOutTypeRule' => [['0663']],
		'PHPStan\Rules\Methods\CallPrivateMethodThroughStaticRule' => [['0664']],
		'PHPStan\Rules\Methods\FinalPrivateMethodRule' => [['0665']],
		'PHPStan\Rules\Methods\ReturnTypeRule' => [['0666']],
		'PHPStan\Rules\Methods\AbstractPrivateMethodRule' => [['0667']],
		'PHPStan\Rules\Methods\MissingMagicSerializationMethodsRule' => [['0668']],
		'PHPStan\Rules\Methods\ConsistentConstructorRule' => [['0669']],
		'PHPStan\Rules\Methods\ConstructorReturnTypeRule' => [['0670']],
		'PHPStan\Rules\Methods\OverridingMethodRule' => [['0671']],
		'PHPStan\Rules\Methods\CallToStaticMethodStatementWithNoDiscardRule' => [['0672']],
		'PHPStan\Rules\Methods\CallToStaticMethodStatementWithoutSideEffectsRule' => [['0673']],
		'PHPStan\Rules\Methods\AbstractMethodInNonAbstractClassRule' => [['0674']],
		'PHPStan\Rules\Methods\ExistingClassesInTypehintsRule' => [['0675']],
		'PHPStan\Rules\Methods\StaticMethodCallableRule' => [['0676']],
		'PHPStan\Rules\Methods\MissingMethodParameterTypehintRule' => [['0677']],
		'PHPStan\Rules\Methods\ConsistentConstructorDeclarationRule' => [['0678']],
		'PHPStan\Rules\Methods\IncompatibleDefaultParameterTypeRule' => [['0679']],
		'PHPStan\Rules\Methods\CallToMethodStatementWithNoDiscardRule' => [['0680']],
		'PHPStan\Rules\Whitespace\FileWhitespaceRule' => [['0681']],
		'PHPStan\Rules\Operators\InvalidComparisonOperationRule' => [['0682']],
		'PHPStan\Rules\Operators\InvalidUnaryOperationRule' => [['0683']],
		'PHPStan\Rules\Operators\InvalidBinaryOperationRule' => [['0684']],
		'PHPStan\Rules\Operators\PipeOperatorRule' => [['0685']],
		'PHPStan\Rules\Operators\InvalidIncDecOperationRule' => [['0686']],
		'PHPStan\Rules\Operators\BacktickRule' => [['0687']],
		'PHPStan\Rules\Operators\InvalidAssignVarRule' => [['0688']],
		'PHPStan\Rules\Regexp\RegularExpressionPatternRule' => [['0689']],
		'PHPStan\Rules\Regexp\RegularExpressionQuotingRule' => [['0690']],
		'PHPStan\Rules\TooWideTypehints\TooWidePropertyTypeRule' => [['0691']],
		'PHPStan\Rules\TooWideTypehints\TooWideFunctionReturnTypehintRule' => [['0692']],
		'PHPStan\Rules\TooWideTypehints\TooWideMethodReturnTypehintRule' => [['0693']],
		'PHPStan\Rules\TooWideTypehints\TooWideFunctionParameterOutTypeRule' => [['0694']],
		'PHPStan\Rules\TooWideTypehints\TooWideMethodParameterOutTypeRule' => [['0695']],
		'PHPStan\Rules\TooWideTypehints\TooWideClosureReturnTypehintRule' => [['0696']],
		'PHPStan\Rules\TooWideTypehints\TooWideArrowFunctionReturnTypehintRule' => [['0697']],
		'PHPStan\Rules\Generics\FunctionTemplateTypeRule' => [['0698']],
		'PHPStan\Rules\Generics\EnumTemplateTypeRule' => [['0699']],
		'PHPStan\Rules\Generics\MethodTemplateTypeRule' => [['0700']],
		'PHPStan\Rules\Generics\InterfaceAncestorsRule' => [['0701']],
		'PHPStan\Rules\Generics\FunctionSignatureVarianceRule' => [['0702']],
		'PHPStan\Rules\Generics\InterfaceTemplateTypeRule' => [['0703']],
		'PHPStan\Rules\Generics\MethodTagTemplateTypeRule' => [['0704']],
		'PHPStan\Rules\Generics\EnumAncestorsRule' => [['0705']],
		'PHPStan\Rules\Generics\ClassAncestorsRule' => [['0706']],
		'PHPStan\Rules\Generics\UsedTraitsRule' => [['0707']],
		'PHPStan\Rules\Generics\PropertyVarianceRule' => [['0708']],
		'PHPStan\Rules\Generics\MethodTagTemplateTypeTraitRule' => [['0709']],
		'PHPStan\Rules\Generics\TraitTemplateTypeRule' => [['0710']],
		'PHPStan\Rules\Generics\ClassTemplateTypeRule' => [['0711']],
		'PHPStan\Rules\Generics\MethodSignatureVarianceRule' => [['0712']],
		'PHPStan\Rules\Arrays\ArrayDestructuringRule' => [['0713']],
		'PHPStan\Rules\Arrays\OffsetAccessValueAssignmentRule' => [['0714']],
		'PHPStan\Rules\Arrays\InvalidKeyInArrayDimFetchRule' => [['0715']],
		'PHPStan\Rules\Arrays\IterableInForeachRule' => [['0716']],
		'PHPStan\Rules\Arrays\OffsetAccessAssignOpRule' => [['0717']],
		'PHPStan\Rules\Arrays\OffsetAccessWithoutDimForReadingRule' => [['0718']],
		'PHPStan\Rules\Arrays\DuplicateKeysInLiteralArraysRule' => [['0719']],
		'PHPStan\Rules\Arrays\InvalidKeyInArrayItemRule' => [['0720']],
		'PHPStan\Rules\Arrays\ArrayUnpackingRule' => [['0721']],
		'PHPStan\Rules\Arrays\OffsetAccessAssignmentRule' => [['0722']],
		'PHPStan\Rules\Arrays\UnpackIterableInArrayRule' => [['0723']],
		'PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchRule' => [['0724']],
		'PHPStan\Rules\Arrays\DeadForeachRule' => [['0725']],
		'PHPStan\Rules\Cast\EchoRule' => [['0726']],
		'PHPStan\Rules\Cast\UnsetCastRule' => [['0727']],
		'PHPStan\Rules\Cast\VoidCastRule' => [['0728']],
		'PHPStan\Rules\Cast\PrintRule' => [['0729']],
		'PHPStan\Rules\Cast\InvalidCastRule' => [['0730']],
		'PHPStan\Rules\Cast\InvalidPartOfEncapsedStringRule' => [['0731']],
		'PHPStan\Rules\Cast\DeprecatedCastRule' => [['0732']],
		'PHPStan\Rules\PhpDoc\IncompatibleSelfOutTypeRule' => [['0733']],
		'PHPStan\Rules\PhpDoc\VarTagChangedExpressionTypeRule' => [['0734']],
		'PHPStan\Rules\PhpDoc\FunctionAssertRule' => [['0735']],
		'PHPStan\Rules\PhpDoc\WrongVariableNameInVarTagRule' => [['0736']],
		'PHPStan\Rules\PhpDoc\InvalidThrowsPhpDocValueRule' => [['0737']],
		'PHPStan\Rules\PhpDoc\IncompatiblePhpDocTypeRule' => [['0738']],
		'PHPStan\Rules\PhpDoc\FunctionConditionalReturnTypeRule' => [['0739']],
		'PHPStan\Rules\PhpDoc\SealedDefinitionClassRule' => [['0740']],
		'PHPStan\Rules\PhpDoc\RequireImplementsDefinitionTraitRule' => [['0741']],
		'PHPStan\Rules\PhpDoc\SealedDefinitionTraitRule' => [['0742']],
		'PHPStan\Rules\PhpDoc\IncompatibleParamImmediatelyInvokedCallableRule' => [['0743']],
		'PHPStan\Rules\PhpDoc\IncompatiblePropertyPhpDocTypeRule' => [['0744']],
		'PHPStan\Rules\PhpDoc\MethodConditionalReturnTypeRule' => [['0745']],
		'PHPStan\Rules\PhpDoc\IncompatibleClassConstantPhpDocTypeRule' => [['0746']],
		'PHPStan\Rules\PhpDoc\RequireExtendsDefinitionClassRule' => [['0747']],
		'PHPStan\Rules\PhpDoc\RequireImplementsDefinitionClassRule' => [['0748']],
		'PHPStan\Rules\PhpDoc\IncompatiblePropertyHookPhpDocTypeRule' => [['0749']],
		'PHPStan\Rules\PhpDoc\InvalidPHPStanDocTagRule' => [['0750']],
		'PHPStan\Rules\PhpDoc\RequireExtendsDefinitionTraitRule' => [['0751']],
		'PHPStan\Rules\PhpDoc\InvalidPhpDocVarTagTypeRule' => [['0752']],
		'PHPStan\Rules\PhpDoc\InvalidPhpDocTagValueRule' => [['0753']],
		'PHPStan\Rules\PhpDoc\MethodAssertRule' => [['0754']],
		'PHPStan\Collectors\Collector' => [
			['0875', '0876', '0877', '0889', '0890', '0891', '0892', '0893'],
			['0755', '0756', '0757', '0758', '0759', '0760', '0761', '0762', '0763'],
		],
		'PHPStan\Rules\DeadCode\ConstructorWithoutImpurePointsCollector' => [['0755']],
		'PHPStan\Rules\DeadCode\MethodWithoutImpurePointsCollector' => [['0756']],
		'PHPStan\Rules\DeadCode\PossiblyPureMethodCallCollector' => [['0757']],
		'PHPStan\Rules\DeadCode\FunctionWithoutImpurePointsCollector' => [['0758']],
		'PHPStan\Rules\DeadCode\PossiblyPureStaticCallCollector' => [['0759']],
		'PHPStan\Rules\DeadCode\PossiblyPureNewCollector' => [['0760']],
		'PHPStan\Rules\DeadCode\PossiblyPureFuncCallCollector' => [['0761']],
		'PHPStan\Rules\Traits\TraitDeclarationCollector' => [['0762']],
		'PHPStan\Rules\Traits\TraitUseCollector' => [['0763']],
		'PhpParser\BuilderFactory' => [['0764']],
		'PhpParser\NodeVisitor\NameResolver' => [['0765']],
		'PHPStan\PhpDocParser\ParserConfig' => [['0766']],
		'PHPStan\PhpDocParser\Lexer\Lexer' => [['0767']],
		'PHPStan\PhpDocParser\Parser\TypeParser' => [['0768']],
		'PHPStan\PhpDocParser\Parser\ConstExprParser' => [['0769']],
		'PHPStan\PhpDocParser\Parser\PhpDocParser' => [['0770']],
		'PHPStan\PhpDocParser\Printer\Printer' => [['0771']],
		'PHPStan\BetterReflection\SourceLocator\SourceStubber\SourceStubber' => [1 => ['0772', '0773']],
		'PHPStan\BetterReflection\SourceLocator\SourceStubber\PhpStormStubsSourceStubber' => [['0772']],
		'PHPStan\BetterReflection\SourceLocator\SourceStubber\ReflectionSourceStubber' => [['0773']],
		'PHPStan\BetterReflection\Reflector\DefaultReflector' => [2 => ['originalBetterReflectionReflector']],
		'PHPStan\Dependency\ExportedNodeVisitor' => [['0774']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\CachingVisitor' => [['0775']],
		'PHPStan\Reflection\Php\PhpClassReflectionExtension' => [['0776']],
		'PHPStan\Reflection\MethodsClassReflectionExtension' => [['0777', '0780', '0782', '0783']],
		'PHPStan\Reflection\Annotations\AnnotationsMethodsClassReflectionExtension' => [['0777']],
		'PHPStan\Reflection\Annotations\AnnotationsPropertiesClassReflectionExtension' => [['0778']],
		'PHPStan\Reflection\Php\UniversalObjectCratesClassReflectionExtension' => [['0779']],
		'PHPStan\Reflection\Mixin\MixinMethodsClassReflectionExtension' => [['0780']],
		'PHPStan\Reflection\Mixin\MixinPropertiesClassReflectionExtension' => [['0781']],
		'PHPStan\Reflection\Php\Soap\SoapClientMethodsClassReflectionExtension' => [['0782']],
		'PHPStan\Reflection\RequireExtension\RequireExtendsMethodsClassReflectionExtension' => [['0783']],
		'PHPStan\Reflection\RequireExtension\RequireExtendsPropertiesClassReflectionExtension' => [['0784']],
		'PHPStan\Rules\Methods\MethodSignatureRule' => [['0785']],
		'PHPStan\Diagnose\PHPStanDiagnoseExtension' => [2 => ['phpstanDiagnoseExtension']],
		'PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension' => [['0786', '0787', '0788', '0789', '0790']],
		'PHPStan\Type\Php\DateTimeModifyReturnTypeExtension' => [['0791', '0792']],
		'PHPStan\Reflection\PHPStan\NativeReflectionEnumReturnDynamicReturnTypeExtension' => [['0793', '0794']],
		'PHPStan\Reflection\BetterReflection\Type\AdapterReflectionEnumCaseDynamicReturnTypeExtension' => [
			['0795', '0796'],
		],
		'PHPStan\Command\ErrorFormatter\JsonErrorFormatter' => [['errorFormatter.json', 'errorFormatter.prettyJson']],
		'PHPStan\File\FileExcluder' => [2 => ['fileExcluderAnalyse', 'fileExcluderScan']],
		'PHPStan\File\FileFinder' => [2 => ['fileFinderAnalyse', 'fileFinderScan']],
		'PHPStan\Cache\CacheStorage' => [2 => ['cacheStorage']],
		'PHPStan\Cache\FileCacheStorage' => [2 => ['cacheStorage']],
		'PHPStan\BetterReflection\SourceLocator\Type\SourceLocator' => [2 => ['betterReflectionSourceLocator']],
		'PHPStan\Parser\Parser' => [
			2 => [
				'php8Parser',
				'currentPhpVersionSimpleDirectParser',
				'currentPhpVersionSimpleParser',
				'currentPhpVersionRichParser',
				'pathRoutingParser',
				'defaultAnalysisParser',
				'freshStubParser',
				'stubParser',
			],
		],
		'PHPStan\Parser\SimpleParser' => [2 => ['php8Parser', 'currentPhpVersionSimpleDirectParser']],
		'PhpParser\Lexer' => [2 => ['php8Lexer', 'currentPhpVersionLexer']],
		'PhpParser\Lexer\Emulative' => [2 => ['php8Lexer']],
		'PhpParser\ParserAbstract' => [2 => ['php8PhpParser', 'currentPhpVersionPhpParser']],
		'PhpParser\Parser' => [2 => ['php8PhpParser', 'currentPhpVersionPhpParser', 'phpParserDecorator']],
		'PhpParser\Parser\Php8' => [2 => ['php8PhpParser']],
		'PHPStan\Parser\PhpParserFactory' => [2 => ['currentPhpVersionPhpParserFactory']],
		'PHPStan\Parser\CleaningParser' => [2 => ['currentPhpVersionSimpleParser']],
		'PHPStan\Parser\RichParser' => [2 => ['currentPhpVersionRichParser']],
		'PHPStan\Parser\PathRoutingParser' => [2 => ['pathRoutingParser']],
		'PHPStan\Parser\PhpParserDecorator' => [2 => ['phpParserDecorator']],
		'PHPStan\Parser\CachedParser' => [2 => ['defaultAnalysisParser', 'stubParser']],
		'PHPStan\Parser\StubParser' => [2 => ['freshStubParser']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\SymbolFinderInFiles' => [['0797']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\PhpFileCleaner' => [['0798']],
		'PHPStan\Rules\Exceptions\MissingCheckedExceptionInFunctionThrowsRule' => [['0799']],
		'PHPStan\Rules\Exceptions\MissingCheckedExceptionInMethodThrowsRule' => [['0800']],
		'PHPStan\Rules\Exceptions\MissingCheckedExceptionInPropertyHookThrowsRule' => [['0801']],
		'PHPStan\Rules\Properties\UninitializedPropertyRule' => [['0802']],
		'PHPStan\Rules\Exceptions\MethodThrowTypeCovarianceRule' => [['0803']],
		'PHPStan\Rules\Classes\NewStaticInAbstractClassStaticMethodRule' => [['0804']],
		'PHPStan\Rules\RestrictedUsage\RestrictedClassConstantUsageExtension' => [['0805']],
		'PHPStan\Rules\InternalTag\RestrictedInternalClassConstantUsageExtension' => [['0805']],
		'PHPStan\Rules\RestrictedUsage\RestrictedClassNameUsageExtension' => [['0806']],
		'PHPStan\Rules\InternalTag\RestrictedInternalClassNameUsageExtension' => [['0806']],
		'PHPStan\Rules\RestrictedUsage\RestrictedFunctionUsageExtension' => [['0807']],
		'PHPStan\Rules\InternalTag\RestrictedInternalFunctionUsageExtension' => [['0807']],
		'PHPStan\Rules\Variables\AssignToByRefExprFromForeachRule' => [['0808']],
		'PHPStan\Rules\RestrictedUsage\RestrictedPropertyUsageExtension' => [['0809']],
		'PHPStan\Rules\InternalTag\RestrictedInternalPropertyUsageExtension' => [['0809']],
		'PHPStan\Rules\RestrictedUsage\RestrictedMethodUsageExtension' => [['0810']],
		'PHPStan\Rules\InternalTag\RestrictedInternalMethodUsageExtension' => [['0810']],
		'PHPStan\Rules\Exceptions\TooWideFunctionThrowTypeRule' => [['0811']],
		'PHPStan\Rules\Exceptions\TooWideMethodThrowTypeRule' => [['0812']],
		'PHPStan\Rules\Exceptions\TooWidePropertyHookThrowTypeRule' => [['0813']],
		'PHPStan\Rules\Functions\ParameterCastableToNumberRule' => [['0814']],
		'PHPStan\Rules\Functions\PrintfParameterTypeRule' => [['0815']],
		'PHPStan\Rules\BooleansInConditions\BooleanRuleHelper' => [['0816']],
		'PHPStan\Rules\Operators\OperatorRuleHelper' => [['0817']],
		'PHPStan\Rules\VariableVariables\VariablePropertyFetchRule' => [['0818']],
		'PHPStan\Rules\DisallowedConstructs\DisallowedLooseComparisonRule' => [['0819']],
		'PHPStan\Rules\BooleansInConditions\BooleanInBooleanAndRule' => [['0820']],
		'PHPStan\Rules\BooleansInConditions\BooleanInBooleanNotRule' => [['0821']],
		'PHPStan\Rules\BooleansInConditions\BooleanInBooleanOrRule' => [['0822']],
		'PHPStan\Rules\BooleansInConditions\BooleanInDoWhileConditionRule' => [['0823']],
		'PHPStan\Rules\BooleansInConditions\BooleanInElseIfConditionRule' => [['0824']],
		'PHPStan\Rules\BooleansInConditions\BooleanInIfConditionRule' => [['0825']],
		'PHPStan\Rules\BooleansInConditions\BooleanInTernaryOperatorRule' => [['0826']],
		'PHPStan\Rules\BooleansInConditions\BooleanInWhileConditionRule' => [['0827']],
		'PHPStan\Rules\Cast\UselessCastRule' => [['0828']],
		'PHPStan\Rules\Classes\RequireParentConstructCallRule' => [['0829']],
		'PHPStan\Rules\DisallowedConstructs\DisallowedBacktickRule' => [['0830']],
		'PHPStan\Rules\DisallowedConstructs\DisallowedEmptyRule' => [['0831']],
		'PHPStan\Rules\DisallowedConstructs\DisallowedImplicitArrayCreationRule' => [['0832']],
		'PHPStan\Rules\DisallowedConstructs\DisallowedShortTernaryRule' => [['0833']],
		'PHPStan\Rules\ForeachLoop\OverwriteVariablesWithForeachRule' => [['0834']],
		'PHPStan\Rules\ForLoop\OverwriteVariablesWithForLoopInitRule' => [['0835']],
		'PHPStan\Rules\Functions\ArrayFilterStrictRule' => [['0836']],
		'PHPStan\Rules\Functions\ClosureUsesThisRule' => [['0837']],
		'PHPStan\Rules\Methods\WrongCaseOfInheritedMethodRule' => [['0838']],
		'PHPStan\Rules\Methods\IllegalConstructorMethodCallRule' => [['0839']],
		'PHPStan\Rules\Methods\IllegalConstructorStaticCallRule' => [['0840']],
		'PHPStan\Rules\Operators\OperandInArithmeticIncrementOrDecrementRule' => [['0841', '0842', '0843', '0844']],
		'PHPStan\Rules\Operators\OperandInArithmeticPostDecrementRule' => [['0841']],
		'PHPStan\Rules\Operators\OperandInArithmeticPostIncrementRule' => [['0842']],
		'PHPStan\Rules\Operators\OperandInArithmeticPreDecrementRule' => [['0843']],
		'PHPStan\Rules\Operators\OperandInArithmeticPreIncrementRule' => [['0844']],
		'PHPStan\Rules\Operators\OperandInArithmeticUnaryMinusRule' => [['0845']],
		'PHPStan\Rules\Operators\OperandInArithmeticUnaryPlusRule' => [['0846']],
		'PHPStan\Rules\Operators\OperandsInArithmeticAdditionRule' => [['0847']],
		'PHPStan\Rules\Operators\OperandsInArithmeticDivisionRule' => [['0848']],
		'PHPStan\Rules\Operators\OperandsInArithmeticExponentiationRule' => [['0849']],
		'PHPStan\Rules\Operators\OperandsInArithmeticModuloRule' => [['0850']],
		'PHPStan\Rules\Operators\OperandsInArithmeticMultiplicationRule' => [['0851']],
		'PHPStan\Rules\Operators\OperandsInArithmeticSubtractionRule' => [['0852']],
		'PHPStan\Rules\StrictCalls\DynamicCallOnStaticMethodsRule' => [['0853']],
		'PHPStan\Rules\StrictCalls\DynamicCallOnStaticMethodsCallableRule' => [['0854']],
		'PHPStan\Rules\StrictCalls\StrictFunctionCallsRule' => [['0855']],
		'PHPStan\Rules\SwitchConditions\MatchingTypeInSwitchCaseConditionRule' => [['0856']],
		'PHPStan\Rules\VariableVariables\VariableMethodCallRule' => [['0857']],
		'PHPStan\Rules\VariableVariables\VariableMethodCallableRule' => [['0858']],
		'PHPStan\Rules\VariableVariables\VariableStaticMethodCallRule' => [['0859']],
		'PHPStan\Rules\VariableVariables\VariableStaticMethodCallableRule' => [['0860']],
		'PHPStan\Rules\VariableVariables\VariableStaticPropertyFetchRule' => [['0861']],
		'PHPStan\Rules\VariableVariables\VariableVariablesRule' => [['0862']],
		'Rector\TypePerfect\Configuration' => [['0863']],
		'Rector\TypePerfect\NodeFinder\ClassMethodNodeFinder' => [['0864']],
		'Rector\TypePerfect\NodeFinder\MethodCallNodeFinder' => [['0865']],
		'Rector\TypePerfect\NodeFinder\ReturnNodeFinder' => [['0866']],
		'Rector\TypePerfect\PhpDoc\ApiDocStmtAnalyzer' => [['0867']],
		'Rector\TypePerfect\Printer\NodeComparator' => [['0868']],
		'Rector\TypePerfect\Reflection\ReflectionParser' => [['0869']],
		'Rector\TypePerfect\Reflection\MethodNodeAnalyser' => [['0870']],
		'Rector\TypePerfect\Matcher\Collector\PublicClassMethodMatcher' => [['0871']],
		'Rector\TypePerfect\Matcher\ClassMethodCallReferenceResolver' => [['0872']],
		'Rector\TypePerfect\Printer\CollectorMetadataPrinter' => [['0873']],
		'Rector\TypePerfect\Guard\EmptyIssetGuard' => [['0874']],
		'Rector\TypePerfect\Collector\ClassMethod\PublicClassMethodParamTypesCollector' => [['0875']],
		'Rector\TypePerfect\Collector\MethodCall\MethodCallArgTypesCollector' => [['0876']],
		'Rector\TypePerfect\Collector\MethodCallableNode\MethodCallableCollector' => [['0877']],
		'TomasVotruba\CognitiveComplexity\DataCollector\CognitiveComplexityDataCollector' => [['0878']],
		'TomasVotruba\CognitiveComplexity\AstCognitiveComplexityAnalyzer' => [['0879']],
		'TomasVotruba\CognitiveComplexity\NodeTraverser\ComplexityNodeTraverserFactory' => [['0880']],
		'TomasVotruba\CognitiveComplexity\NodeVisitor\NestingNodeVisitor' => [['0881']],
		'TomasVotruba\CognitiveComplexity\NodeVisitor\ComplexityNodeVisitor' => [['0882']],
		'TomasVotruba\CognitiveComplexity\NodeAnalyzer\ComplexityAffectingNodeFinder' => [['0883']],
		'TomasVotruba\CognitiveComplexity\ClassReflectionParser' => [['0884']],
		'TomasVotruba\CognitiveComplexity\Configuration' => [['0885']],
		'TomasVotruba\TypeCoverage\Formatter\TypeCoverageFormatter' => [['0886']],
		'TomasVotruba\TypeCoverage\CollectorDataNormalizer' => [['0887']],
		'TomasVotruba\TypeCoverage\Configuration' => [['0888']],
		'TomasVotruba\TypeCoverage\Collectors\ReturnTypeDeclarationCollector' => [['0889']],
		'TomasVotruba\TypeCoverage\Collectors\ParamTypeDeclarationCollector' => [['0890']],
		'TomasVotruba\TypeCoverage\Collectors\PropertyTypeDeclarationCollector' => [['0891']],
		'TomasVotruba\TypeCoverage\Collectors\ConstantTypeDeclarationCollector' => [['0892']],
		'TomasVotruba\TypeCoverage\Collectors\DeclareCollector' => [['0893']],
	];


	public function __construct(array $params = [])
	{
		parent::__construct($params);
	}


	public function createService01(): PHPStan\Parser\AnonymousClassVisitor
	{
		return new PHPStan\Parser\AnonymousClassVisitor;
	}


	public function createService02(): PHPStan\Parser\ClosureArgVisitor
	{
		return new PHPStan\Parser\ClosureArgVisitor;
	}


	public function createService03(): PHPStan\Parser\ArrayFilterArgVisitor
	{
		return new PHPStan\Parser\ArrayFilterArgVisitor;
	}


	public function createService04(): PHPStan\Parser\ArrayFindArgVisitor
	{
		return new PHPStan\Parser\ArrayFindArgVisitor;
	}


	public function createService05(): PHPStan\Parser\ClosureBindArgVisitor
	{
		return new PHPStan\Parser\ClosureBindArgVisitor;
	}


	public function createService06(): PHPStan\Parser\CurlSetOptArrayArgVisitor
	{
		return new PHPStan\Parser\CurlSetOptArrayArgVisitor;
	}


	public function createService07(): PHPStan\Parser\ParentStmtTypesVisitor
	{
		return new PHPStan\Parser\ParentStmtTypesVisitor;
	}


	public function createService08(): PHPStan\Parser\DeclarePositionVisitor
	{
		return new PHPStan\Parser\DeclarePositionVisitor;
	}


	public function createService09(): PHPStan\Parser\ArrayWalkArgVisitor
	{
		return new PHPStan\Parser\ArrayWalkArgVisitor;
	}


	public function createService010(): PHPStan\Parser\NewAssignedToPropertyVisitor
	{
		return new PHPStan\Parser\NewAssignedToPropertyVisitor;
	}


	public function createService011(): PHPStan\Parser\LexerFactory
	{
		return new PHPStan\Parser\LexerFactory($this->getService('0314'));
	}


	public function createService012(): PHPStan\Parser\ImmediatelyInvokedClosureVisitor
	{
		return new PHPStan\Parser\ImmediatelyInvokedClosureVisitor;
	}


	public function createService013(): PHPStan\Parser\StandaloneThrowExprVisitor
	{
		return new PHPStan\Parser\StandaloneThrowExprVisitor;
	}


	public function createService014(): PHPStan\Parser\TryCatchTypeVisitor
	{
		return new PHPStan\Parser\TryCatchTypeVisitor;
	}


	public function createService015(): PHPStan\Parser\TypeTraverserInstanceofVisitor
	{
		return new PHPStan\Parser\TypeTraverserInstanceofVisitor;
	}


	public function createService016(): PHPStan\Parser\MagicConstantParamDefaultVisitor
	{
		return new PHPStan\Parser\MagicConstantParamDefaultVisitor;
	}


	public function createService017(): PHPStan\Parser\CurlSetOptArgVisitor
	{
		return new PHPStan\Parser\CurlSetOptArgVisitor;
	}


	public function createService018(): PHPStan\Parser\ArrowFunctionArgVisitor
	{
		return new PHPStan\Parser\ArrowFunctionArgVisitor;
	}


	public function createService019(): PHPStan\Parser\ArrayMapArgVisitor
	{
		return new PHPStan\Parser\ArrayMapArgVisitor;
	}


	public function createService020(): PHPStan\Parser\ImplodeArgVisitor
	{
		return new PHPStan\Parser\ImplodeArgVisitor;
	}


	public function createService021(): PHPStan\Parser\ClosureBindToVarVisitor
	{
		return new PHPStan\Parser\ClosureBindToVarVisitor;
	}


	public function createService022(): PHPStan\Parser\LastConditionVisitor
	{
		return new PHPStan\Parser\LastConditionVisitor;
	}


	public function createService023(): PHPStan\Broker\AnonymousClassNameHelper
	{
		return new PHPStan\Broker\AnonymousClassNameHelper($this->getService('0416'), $this->getService('simpleRelativePathHelper'));
	}


	public function createService024(): PHPStan\Collectors\Registry
	{
		return $this->getService('025')->create();
	}


	public function createService025(): PHPStan\Collectors\RegistryFactory
	{
		return new PHPStan\Collectors\RegistryFactory($this->getService('0119'));
	}


	public function createService026(): PHPStan\Analyser\RuleErrorTransformer
	{
		return new PHPStan\Analyser\RuleErrorTransformer($this->getService('currentPhpVersionPhpParser'));
	}


	public function createService027(): PHPStan\Analyser\FileAnalyser
	{
		return new PHPStan\Analyser\FileAnalyser(
			$this->getService('028'),
			$this->getService('033'),
			$this->getService('defaultAnalysisParser'),
			$this->getService('0127'),
			$this->getService('036'),
			$this->getService('026'),
			$this->getService('037'),
			false
		);
	}


	public function createService028(): PHPStan\Analyser\ScopeFactory
	{
		return new PHPStan\Analyser\ScopeFactory($this->getService('0441'));
	}


	public function createService029(): PHPStan\Analyser\Ignore\IgnoreLexer
	{
		return new PHPStan\Analyser\Ignore\IgnoreLexer;
	}


	public function createService030(): PHPStan\Analyser\Ignore\IgnoredErrorHelper
	{
		return new PHPStan\Analyser\Ignore\IgnoredErrorHelper($this->getService('0416'), [], true);
	}


	public function createService031(): PHPStan\Analyser\Analyser
	{
		return new PHPStan\Analyser\Analyser(
			$this->getService('027'),
			$this->getService('registry'),
			$this->getService('024'),
			$this->getService('033'),
			50
		);
	}


	public function createService032(): PHPStan\Analyser\ResultCache\ResultCacheClearer
	{
		return new PHPStan\Analyser\ResultCache\ResultCacheClearer('/Users/sandermuller/Documents/GitHub/rector-rules/.cache/phpstan/resultCache.php');
	}


	public function createService033(): PHPStan\Analyser\Fiber\FiberNodeScopeResolver
	{
		return new PHPStan\Analyser\Fiber\FiberNodeScopeResolver(
			$this->getService('0119'),
			$this->getService('reflectionProvider'),
			$this->getService('0331'),
			$this->getService('nodeScopeResolverReflector'),
			$this->getService('0446'),
			$this->getService('0114'),
			$this->getService('defaultAnalysisParser'),
			$this->getService('0310'),
			$this->getService('0429'),
			$this->getService('0416'),
			$this->getService('typeSpecifier'),
			$this->getService('0360'),
			$this->getService('0117'),
			$this->getService('0116'),
			$this->getService('028'),
			$this->getService('0318'),
			false,
			false,
			false,
			[],
			[],
			true,
			true
		);
	}


	public function createService034(): PHPStan\Analyser\AnalyserResultFinalizer
	{
		return new PHPStan\Analyser\AnalyserResultFinalizer(
			$this->getService('registry'),
			$this->getService('036'),
			$this->getService('026'),
			$this->getService('028'),
			$this->getService('037'),
			true
		);
	}


	public function createService035(): PHPStan\Analyser\ConstantResolverFactory
	{
		return new PHPStan\Analyser\ConstantResolverFactory($this->getService('0334'), $this->getService('0119'));
	}


	public function createService036(): PHPStan\Analyser\IgnoreErrorExtensionProvider
	{
		return new PHPStan\Analyser\IgnoreErrorExtensionProvider($this->getService('0119'));
	}


	public function createService037(): PHPStan\Analyser\LocalIgnoresProcessor
	{
		return new PHPStan\Analyser\LocalIgnoresProcessor;
	}


	public function createService038(): PHPStan\Analyser\RicherScopeGetTypeHelper
	{
		return new PHPStan\Analyser\RicherScopeGetTypeHelper($this->getService('0331'), $this->getService('0358'));
	}


	public function createService039(): PHPStan\Analyser\ConstantResolver
	{
		return $this->getService('035')->create();
	}


	public function createService040(): PHPStan\Analyser\ExprHandler\PostDecHandler
	{
		return new PHPStan\Analyser\ExprHandler\PostDecHandler;
	}


	public function createService041(): PHPStan\Analyser\ExprHandler\BinaryOpHandler
	{
		return new PHPStan\Analyser\ExprHandler\BinaryOpHandler(
			$this->getService('0331'),
			$this->getService('038'),
			$this->getService('0314')
		);
	}


	public function createService042(): PHPStan\Analyser\ExprHandler\UnaryMinusHandler
	{
		return new PHPStan\Analyser\ExprHandler\UnaryMinusHandler($this->getService('0331'));
	}


	public function createService043(): PHPStan\Analyser\ExprHandler\StaticPropertyFetchHandler
	{
		return new PHPStan\Analyser\ExprHandler\StaticPropertyFetchHandler($this->getService('0358'));
	}


	public function createService044(): PHPStan\Analyser\ExprHandler\Virtual\GetOffsetValueTypeExprHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\GetOffsetValueTypeExprHandler;
	}


	public function createService045(): PHPStan\Analyser\ExprHandler\Virtual\FunctionCallableNodeHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\FunctionCallableNodeHandler;
	}


	public function createService046(): PHPStan\Analyser\ExprHandler\Virtual\MethodCallableNodeHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\MethodCallableNodeHandler;
	}


	public function createService047(): PHPStan\Analyser\ExprHandler\Virtual\AlwaysRememberedExprHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\AlwaysRememberedExprHandler;
	}


	public function createService048(): PHPStan\Analyser\ExprHandler\Virtual\GetIterableValueTypeExprHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\GetIterableValueTypeExprHandler;
	}


	public function createService049(): PHPStan\Analyser\ExprHandler\Virtual\SetExistingOffsetValueTypeExprHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\SetExistingOffsetValueTypeExprHandler;
	}


	public function createService050(): PHPStan\Analyser\ExprHandler\Virtual\UnsetOffsetExprHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\UnsetOffsetExprHandler;
	}


	public function createService051(): PHPStan\Analyser\ExprHandler\Virtual\NativeTypeExprHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\NativeTypeExprHandler;
	}


	public function createService052(): PHPStan\Analyser\ExprHandler\Virtual\ExistingArrayDimFetchHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\ExistingArrayDimFetchHandler;
	}


	public function createService053(): PHPStan\Analyser\ExprHandler\Virtual\GetIterableKeyTypeExprHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\GetIterableKeyTypeExprHandler;
	}


	public function createService054(): PHPStan\Analyser\ExprHandler\Virtual\InstantiationCallableNodeHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\InstantiationCallableNodeHandler;
	}


	public function createService055(): PHPStan\Analyser\ExprHandler\Virtual\StaticMethodCallableNodeHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\StaticMethodCallableNodeHandler;
	}


	public function createService056(): PHPStan\Analyser\ExprHandler\Virtual\TypeExprHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\TypeExprHandler;
	}


	public function createService057(): PHPStan\Analyser\ExprHandler\Virtual\OriginalPropertyTypeExprHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\OriginalPropertyTypeExprHandler($this->getService('0358'));
	}


	public function createService058(): PHPStan\Analyser\ExprHandler\Virtual\SetOffsetValueTypeExprHandler
	{
		return new PHPStan\Analyser\ExprHandler\Virtual\SetOffsetValueTypeExprHandler;
	}


	public function createService059(): PHPStan\Analyser\ExprHandler\EvalHandler
	{
		return new PHPStan\Analyser\ExprHandler\EvalHandler;
	}


	public function createService060(): PHPStan\Analyser\ExprHandler\FirstClassCallableMethodCallHandler
	{
		return new PHPStan\Analyser\ExprHandler\FirstClassCallableMethodCallHandler($this->getService('0331'));
	}


	public function createService061(): PHPStan\Analyser\ExprHandler\FirstClassCallableFuncCallHandler
	{
		return new PHPStan\Analyser\ExprHandler\FirstClassCallableFuncCallHandler($this->getService('0331'));
	}


	public function createService062(): PHPStan\Analyser\ExprHandler\PreIncHandler
	{
		return new PHPStan\Analyser\ExprHandler\PreIncHandler;
	}


	public function createService063(): PHPStan\Analyser\ExprHandler\ClosureHandler
	{
		return new PHPStan\Analyser\ExprHandler\ClosureHandler($this->getService('068'));
	}


	public function createService064(): PHPStan\Analyser\ExprHandler\CastStringHandler
	{
		return new PHPStan\Analyser\ExprHandler\CastStringHandler($this->getService('0331'));
	}


	public function createService065(): PHPStan\Analyser\ExprHandler\ConstFetchHandler
	{
		return new PHPStan\Analyser\ExprHandler\ConstFetchHandler($this->getService('039'));
	}


	public function createService066(): PHPStan\Analyser\ExprHandler\Helper\MethodCallReturnTypeHelper
	{
		return new PHPStan\Analyser\ExprHandler\Helper\MethodCallReturnTypeHelper($this->getService('0113'));
	}


	public function createService067(): PHPStan\Analyser\ExprHandler\Helper\NonNullabilityHelper
	{
		return new PHPStan\Analyser\ExprHandler\Helper\NonNullabilityHelper;
	}


	public function createService068(): PHPStan\Analyser\ExprHandler\Helper\ClosureTypeResolver
	{
		return new PHPStan\Analyser\ExprHandler\Helper\ClosureTypeResolver($this->getService('033'));
	}


	public function createService069(): PHPStan\Analyser\ExprHandler\EmptyHandler
	{
		return new PHPStan\Analyser\ExprHandler\EmptyHandler($this->getService('067'));
	}


	public function createService070(): PHPStan\Analyser\ExprHandler\ThrowHandler
	{
		return new PHPStan\Analyser\ExprHandler\ThrowHandler;
	}


	public function createService071(): PHPStan\Analyser\ExprHandler\YieldFromHandler
	{
		return new PHPStan\Analyser\ExprHandler\YieldFromHandler;
	}


	public function createService072(): PHPStan\Analyser\ExprHandler\ArrayDimFetchHandler
	{
		return new PHPStan\Analyser\ExprHandler\ArrayDimFetchHandler;
	}


	public function createService073(): PHPStan\Analyser\ExprHandler\ArrowFunctionHandler
	{
		return new PHPStan\Analyser\ExprHandler\ArrowFunctionHandler($this->getService('068'));
	}


	public function createService074(): PHPStan\Analyser\ExprHandler\PropertyFetchHandler
	{
		return new PHPStan\Analyser\ExprHandler\PropertyFetchHandler($this->getService('0314'), $this->getService('0358'));
	}


	public function createService075(): PHPStan\Analyser\ExprHandler\IssetHandler
	{
		return new PHPStan\Analyser\ExprHandler\IssetHandler($this->getService('067'));
	}


	public function createService076(): PHPStan\Analyser\ExprHandler\MethodCallHandler
	{
		return new PHPStan\Analyser\ExprHandler\MethodCallHandler($this->getService('0112'), $this->getService('066'), true, true);
	}


	public function createService077(): PHPStan\Analyser\ExprHandler\CastHandler
	{
		return new PHPStan\Analyser\ExprHandler\CastHandler($this->getService('0331'));
	}


	public function createService078(): PHPStan\Analyser\ExprHandler\YieldHandler
	{
		return new PHPStan\Analyser\ExprHandler\YieldHandler;
	}


	public function createService079(): PHPStan\Analyser\ExprHandler\MatchHandler
	{
		return new PHPStan\Analyser\ExprHandler\MatchHandler(true);
	}


	public function createService080(): PHPStan\Analyser\ExprHandler\ErrorSuppressHandler
	{
		return new PHPStan\Analyser\ExprHandler\ErrorSuppressHandler;
	}


	public function createService081(): PHPStan\Analyser\ExprHandler\TernaryHandler
	{
		return new PHPStan\Analyser\ExprHandler\TernaryHandler($this->getService('033'));
	}


	public function createService082(): PHPStan\Analyser\ExprHandler\AssignOpHandler
	{
		return new PHPStan\Analyser\ExprHandler\AssignOpHandler($this->getService('091'), $this->getService('0331'));
	}


	public function createService083(): PHPStan\Analyser\ExprHandler\VariableHandler
	{
		return new PHPStan\Analyser\ExprHandler\VariableHandler;
	}


	public function createService084(): PHPStan\Analyser\ExprHandler\StaticCallHandler
	{
		return new PHPStan\Analyser\ExprHandler\StaticCallHandler($this->getService('0112'), $this->getService('066'), true, true);
	}


	public function createService085(): PHPStan\Analyser\ExprHandler\NullsafePropertyFetchHandler
	{
		return new PHPStan\Analyser\ExprHandler\NullsafePropertyFetchHandler($this->getService('067'));
	}


	public function createService086(): PHPStan\Analyser\ExprHandler\InterpolatedStringHandler
	{
		return new PHPStan\Analyser\ExprHandler\InterpolatedStringHandler($this->getService('0331'));
	}


	public function createService087(): PHPStan\Analyser\ExprHandler\CoalesceHandler
	{
		return new PHPStan\Analyser\ExprHandler\CoalesceHandler($this->getService('067'));
	}


	public function createService088(): PHPStan\Analyser\ExprHandler\FirstClassCallableNewHandler
	{
		return new PHPStan\Analyser\ExprHandler\FirstClassCallableNewHandler($this->getService('0331'));
	}


	public function createService089(): PHPStan\Analyser\ExprHandler\ArrayHandler
	{
		return new PHPStan\Analyser\ExprHandler\ArrayHandler($this->getService('0331'));
	}


	public function createService090(): PHPStan\Analyser\ExprHandler\BooleanAndHandler
	{
		return new PHPStan\Analyser\ExprHandler\BooleanAndHandler($this->getService('033'));
	}


	public function createService091(): PHPStan\Analyser\ExprHandler\AssignHandler
	{
		return new PHPStan\Analyser\ExprHandler\AssignHandler($this->getService('typeSpecifier'), $this->getService('0314'));
	}


	public function createService092(): PHPStan\Analyser\ExprHandler\BitwiseNotHandler
	{
		return new PHPStan\Analyser\ExprHandler\BitwiseNotHandler($this->getService('0331'));
	}


	public function createService093(): PHPStan\Analyser\ExprHandler\BooleanOrHandler
	{
		return new PHPStan\Analyser\ExprHandler\BooleanOrHandler($this->getService('033'));
	}


	public function createService094(): PHPStan\Analyser\ExprHandler\FirstClassCallableStaticCallHandler
	{
		return new PHPStan\Analyser\ExprHandler\FirstClassCallableStaticCallHandler($this->getService('0331'));
	}


	public function createService095(): PHPStan\Analyser\ExprHandler\PipeHandler
	{
		return new PHPStan\Analyser\ExprHandler\PipeHandler;
	}


	public function createService096(): PHPStan\Analyser\ExprHandler\PreDecHandler
	{
		return new PHPStan\Analyser\ExprHandler\PreDecHandler;
	}


	public function createService097(): PHPStan\Analyser\ExprHandler\BooleanNotHandler
	{
		return new PHPStan\Analyser\ExprHandler\BooleanNotHandler;
	}


	public function createService098(): PHPStan\Analyser\ExprHandler\IncludeHandler
	{
		return new PHPStan\Analyser\ExprHandler\IncludeHandler;
	}


	public function createService099(): PHPStan\Analyser\ExprHandler\UnaryPlusHandler
	{
		return new PHPStan\Analyser\ExprHandler\UnaryPlusHandler($this->getService('0331'));
	}


	public function createService0100(): PHPStan\Analyser\ExprHandler\NullsafeMethodCallHandler
	{
		return new PHPStan\Analyser\ExprHandler\NullsafeMethodCallHandler($this->getService('067'));
	}


	public function createService0101(): PHPStan\Analyser\ExprHandler\ScalarHandler
	{
		return new PHPStan\Analyser\ExprHandler\ScalarHandler($this->getService('0331'));
	}


	public function createService0102(): PHPStan\Analyser\ExprHandler\PrintHandler
	{
		return new PHPStan\Analyser\ExprHandler\PrintHandler;
	}


	public function createService0103(): PHPStan\Analyser\ExprHandler\PostIncHandler
	{
		return new PHPStan\Analyser\ExprHandler\PostIncHandler;
	}


	public function createService0104(): PHPStan\Analyser\ExprHandler\ExitHandler
	{
		return new PHPStan\Analyser\ExprHandler\ExitHandler;
	}


	public function createService0105(): PHPStan\Analyser\ExprHandler\InstanceofHandler
	{
		return new PHPStan\Analyser\ExprHandler\InstanceofHandler;
	}


	public function createService0106(): PHPStan\Analyser\ExprHandler\NewHandler
	{
		return new PHPStan\Analyser\ExprHandler\NewHandler(
			$this->getService('reflectionProvider'),
			$this->getService('0112'),
			$this->getService('0113'),
			true
		);
	}


	public function createService0107(): PHPStan\Analyser\ExprHandler\FuncCallHandler
	{
		return new PHPStan\Analyser\ExprHandler\FuncCallHandler(
			$this->getService('reflectionProvider'),
			$this->getService('0112'),
			$this->getService('0113'),
			true,
			true
		);
	}


	public function createService0108(): PHPStan\Analyser\ExprHandler\CloneHandler
	{
		return new PHPStan\Analyser\ExprHandler\CloneHandler;
	}


	public function createService0109(): PHPStan\Analyser\ExprHandler\ClassConstFetchHandler
	{
		return new PHPStan\Analyser\ExprHandler\ClassConstFetchHandler($this->getService('0331'));
	}


	public function createService0110(): PHPStan\Analyser\NodeScopeResolver
	{
		return new PHPStan\Analyser\NodeScopeResolver(
			$this->getService('0119'),
			$this->getService('reflectionProvider'),
			$this->getService('0331'),
			$this->getService('nodeScopeResolverReflector'),
			$this->getService('0446'),
			$this->getService('0114'),
			$this->getService('defaultAnalysisParser'),
			$this->getService('0310'),
			$this->getService('0429'),
			$this->getService('0416'),
			$this->getService('typeSpecifier'),
			$this->getService('0360'),
			$this->getService('0117'),
			$this->getService('0116'),
			$this->getService('028'),
			$this->getService('0318'),
			false,
			false,
			false,
			[],
			[],
			true,
			true
		);
	}


	public function createService0111(): PHPStan\DependencyInjection\Type\LazyUnaryOperatorTypeSpecifyingExtensionRegistryProvider
	{
		return new PHPStan\DependencyInjection\Type\LazyUnaryOperatorTypeSpecifyingExtensionRegistryProvider($this->getService('0119'));
	}


	public function createService0112(): PHPStan\DependencyInjection\Type\LazyDynamicThrowTypeExtensionProvider
	{
		return new PHPStan\DependencyInjection\Type\LazyDynamicThrowTypeExtensionProvider($this->getService('0119'));
	}


	public function createService0113(): PHPStan\DependencyInjection\Type\LazyDynamicReturnTypeExtensionRegistryProvider
	{
		return new PHPStan\DependencyInjection\Type\LazyDynamicReturnTypeExtensionRegistryProvider($this->getService('0119'));
	}


	public function createService0114(): PHPStan\DependencyInjection\Type\LazyParameterOutTypeExtensionProvider
	{
		return new PHPStan\DependencyInjection\Type\LazyParameterOutTypeExtensionProvider($this->getService('0119'));
	}


	public function createService0115(): PHPStan\DependencyInjection\Type\LazyExpressionTypeResolverExtensionRegistryProvider
	{
		return new PHPStan\DependencyInjection\Type\LazyExpressionTypeResolverExtensionRegistryProvider($this->getService('0119'));
	}


	public function createService0116(): PHPStan\DependencyInjection\Type\LazyParameterClosureTypeExtensionProvider
	{
		return new PHPStan\DependencyInjection\Type\LazyParameterClosureTypeExtensionProvider($this->getService('0119'));
	}


	public function createService0117(): PHPStan\DependencyInjection\Type\LazyParameterClosureThisExtensionProvider
	{
		return new PHPStan\DependencyInjection\Type\LazyParameterClosureThisExtensionProvider($this->getService('0119'));
	}


	public function createService0118(): PHPStan\DependencyInjection\Type\LazyOperatorTypeSpecifyingExtensionRegistryProvider
	{
		return new PHPStan\DependencyInjection\Type\LazyOperatorTypeSpecifyingExtensionRegistryProvider($this->getService('0119'));
	}


	public function createService0119(): PHPStan\DependencyInjection\MemoizingContainer
	{
		return new PHPStan\DependencyInjection\MemoizingContainer($this->getService('0120'));
	}


	public function createService0120(): PHPStan\DependencyInjection\Nette\NetteContainer
	{
		return new PHPStan\DependencyInjection\Nette\NetteContainer($this);
	}


	public function createService0121(): PHPStan\DependencyInjection\Reflection\LazyClassReflectionExtensionRegistryProvider
	{
		return new PHPStan\DependencyInjection\Reflection\LazyClassReflectionExtensionRegistryProvider($this->getService('0119'));
	}


	public function createService0122(): PHPStan\DependencyInjection\DerivativeContainerFactory
	{
		return new PHPStan\DependencyInjection\DerivativeContainerFactory(
			'/Users/sandermuller/Documents/GitHub/rector-rules',
			'/Users/sandermuller/Documents/GitHub/rector-rules/.cache/phpstan',
			[
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.levelmax.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/extension-installer/src/../../phpstan-strict-rules/rules.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/extension-installer/src/../../../rector/type-perfect/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/extension-installer/src/../../../tomasvotruba/cognitive-complexity/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/extension-installer/src/../../../tomasvotruba/type-coverage/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/phpstan.neon.dist',
			],
			$this->getParameter('analysedPaths'),
			['/Users/sandermuller/Documents/GitHub/rector-rules'],
			$this->getParameter('analysedPathsFromConfig'),
			'max',
			null,
			null,
			$this->getParameter('singleReflectionFile'),
			$this->getParameter('singleReflectionInsteadOfFile')
		);
	}


	public function createService0123(): PHPStan\Fixable\Patcher
	{
		return new PHPStan\Fixable\Patcher;
	}


	public function createService0124(): PHPStan\Fixable\PhpDoc\PhpDocEditor
	{
		return new PHPStan\Fixable\PhpDoc\PhpDocEditor($this->getService('0771'), $this->getService('0767'), $this->getService('0770'));
	}


	public function createService0125(): PHPStan\Dependency\ExportedNodeResolver
	{
		return new PHPStan\Dependency\ExportedNodeResolver(
			$this->getService('reflectionProvider'),
			$this->getService('0310'),
			$this->getService('0317')
		);
	}


	public function createService0126(): PHPStan\Dependency\ExportedNodeFetcher
	{
		return new PHPStan\Dependency\ExportedNodeFetcher($this->getService('defaultAnalysisParser'), $this->getService('0774'));
	}


	public function createService0127(): PHPStan\Dependency\DependencyResolver
	{
		return new PHPStan\Dependency\DependencyResolver(
			$this->getService('0416'),
			$this->getService('reflectionProvider'),
			$this->getService('0125'),
			$this->getService('0310')
		);
	}


	public function createService0128(): PHPStan\Type\UsefulTypeAliasResolver
	{
		return new PHPStan\Type\UsefulTypeAliasResolver(
			[],
			$this->getService('0428'),
			$this->getService('0437'),
			$this->getService('reflectionProvider')
		);
	}


	public function createService0129(): PHPStan\Type\PHPStan\ClassNameUsageLocationCreateIdentifierDynamicReturnTypeExtension
	{
		return new PHPStan\Type\PHPStan\ClassNameUsageLocationCreateIdentifierDynamicReturnTypeExtension;
	}


	public function createService0130(): PHPStan\Type\Php\ReflectionPropertyConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionPropertyConstructorThrowTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0131(): PHPStan\Type\Php\StrtotimeFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrtotimeFunctionReturnTypeExtension;
	}


	public function createService0132(): PHPStan\Type\Php\ArrayMergeFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayMergeFunctionDynamicReturnTypeExtension;
	}


	public function createService0133(): PHPStan\Type\Php\HrtimeFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\HrtimeFunctionReturnTypeExtension;
	}


	public function createService0134(): PHPStan\Type\Php\ReflectionMethodConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionMethodConstructorThrowTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0135(): PHPStan\Type\Php\ArrayValuesFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayValuesFunctionDynamicReturnTypeExtension($this->getService('0314'));
	}


	public function createService0136(): PHPStan\Type\Php\LtrimFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\LtrimFunctionReturnTypeExtension;
	}


	public function createService0137(): PHPStan\Type\Php\IdateFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\IdateFunctionReturnTypeExtension($this->getService('0199'));
	}


	public function createService0138(): PHPStan\Type\Php\FilterVarDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\FilterVarDynamicReturnTypeExtension($this->getService('0294'));
	}


	public function createService0139(): PHPStan\Type\Php\ClosureBindDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ClosureBindDynamicReturnTypeExtension;
	}


	public function createService0140(): PHPStan\Type\Php\DioStatDynamicFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\DioStatDynamicFunctionReturnTypeExtension;
	}


	public function createService0141(): PHPStan\Type\Php\GettypeFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\GettypeFunctionReturnTypeExtension;
	}


	public function createService0142(): PHPStan\Type\Php\PregReplaceCallbackClosureTypeExtension
	{
		return new PHPStan\Type\Php\PregReplaceCallbackClosureTypeExtension($this->getService('0198'));
	}


	public function createService0143(): PHPStan\Type\Php\ArrayFirstLastDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayFirstLastDynamicReturnTypeExtension;
	}


	public function createService0144(): PHPStan\Type\Php\ArrayPopFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayPopFunctionReturnTypeExtension;
	}


	public function createService0145(): PHPStan\Type\Php\ThrowableReturnTypeExtension
	{
		return new PHPStan\Type\Php\ThrowableReturnTypeExtension;
	}


	public function createService0146(): PHPStan\Type\Php\PowFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\PowFunctionReturnTypeExtension;
	}


	public function createService0147(): PHPStan\Type\Php\StrIncrementDecrementFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrIncrementDecrementFunctionReturnTypeExtension;
	}


	public function createService0148(): PHPStan\Type\Php\HashFunctionsReturnTypeExtension
	{
		return new PHPStan\Type\Php\HashFunctionsReturnTypeExtension($this->getService('0314'));
	}


	public function createService0149(): PHPStan\Type\Php\StrSplitFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrSplitFunctionReturnTypeExtension($this->getService('0314'));
	}


	public function createService0150(): PHPStan\Type\Php\StrTokFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrTokFunctionReturnTypeExtension;
	}


	public function createService0151(): PHPStan\Type\Php\IsIterableFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsIterableFunctionTypeSpecifyingExtension;
	}


	public function createService0152(): PHPStan\Type\Php\PregSplitDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\PregSplitDynamicReturnTypeExtension($this->getService('0305'));
	}


	public function createService0153(): PHPStan\Type\Php\IteratorToArrayFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\IteratorToArrayFunctionReturnTypeExtension;
	}


	public function createService0154(): PHPStan\Type\Php\AssertFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\AssertFunctionTypeSpecifyingExtension;
	}


	public function createService0155(): PHPStan\Type\Php\ClosureGetCurrentDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ClosureGetCurrentDynamicReturnTypeExtension;
	}


	public function createService0156(): PHPStan\Type\Php\ParseUrlFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ParseUrlFunctionDynamicReturnTypeExtension;
	}


	public function createService0157(): PHPStan\Type\Php\OpensslCipherFunctionsReturnTypeExtension
	{
		return new PHPStan\Type\Php\OpensslCipherFunctionsReturnTypeExtension($this->getService('0314'), $this->getService('0210'));
	}


	public function createService0158(): PHPStan\Type\Php\ArrayFilterFunctionReturnTypeHelper
	{
		return new PHPStan\Type\Php\ArrayFilterFunctionReturnTypeHelper(
			$this->getService('reflectionProvider'),
			$this->getService('0314')
		);
	}


	public function createService0159(): PHPStan\Type\Php\SprintfFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\SprintfFunctionDynamicReturnTypeExtension;
	}


	public function createService0160(): PHPStan\Type\Php\PropertyExistsTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\PropertyExistsTypeSpecifyingExtension($this->getService('0358'));
	}


	public function createService0161(): PHPStan\Type\Php\DateTimeModifyMethodThrowTypeExtension
	{
		return new PHPStan\Type\Php\DateTimeModifyMethodThrowTypeExtension($this->getService('0314'));
	}


	public function createService0162(): PHPStan\Type\Php\ClosureFromCallableDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ClosureFromCallableDynamicReturnTypeExtension;
	}


	public function createService0163(): PHPStan\Type\Php\ArraySumFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArraySumFunctionDynamicReturnTypeExtension;
	}


	public function createService0164(): PHPStan\Type\Php\SscanfFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\SscanfFunctionDynamicReturnTypeExtension;
	}


	public function createService0165(): PHPStan\Type\Php\PregMatchParameterOutTypeExtension
	{
		return new PHPStan\Type\Php\PregMatchParameterOutTypeExtension($this->getService('0198'));
	}


	public function createService0166(): PHPStan\Type\Php\IsCallableFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsCallableFunctionTypeSpecifyingExtension($this->getService('0248'));
	}


	public function createService0167(): PHPStan\Type\Php\ArraySearchFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArraySearchFunctionDynamicReturnTypeExtension($this->getService('0314'));
	}


	public function createService0168(): PHPStan\Type\Php\NumberFormatFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\NumberFormatFunctionDynamicReturnTypeExtension;
	}


	public function createService0169(): PHPStan\Type\Php\MicrotimeFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\MicrotimeFunctionReturnTypeExtension;
	}


	public function createService0170(): PHPStan\Type\Php\ReplaceFunctionsDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ReplaceFunctionsDynamicReturnTypeExtension;
	}


	public function createService0171(): PHPStan\Type\Php\ArraySliceFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArraySliceFunctionReturnTypeExtension($this->getService('0314'));
	}


	public function createService0172(): PHPStan\Type\Php\ClassImplementsFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ClassImplementsFunctionReturnTypeExtension;
	}


	public function createService0173(): PHPStan\Type\Php\SubstrDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\SubstrDynamicReturnTypeExtension($this->getService('0314'));
	}


	public function createService0174(): PHPStan\Type\Php\DefinedConstantTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\DefinedConstantTypeSpecifyingExtension($this->getService('0197'));
	}


	public function createService0175(): PHPStan\Type\Php\GetParentClassDynamicFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\GetParentClassDynamicFunctionReturnTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0176(): PHPStan\Type\Php\ArraySearchFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\ArraySearchFunctionTypeSpecifyingExtension;
	}


	public function createService0177(): PHPStan\Type\Php\FilterVarArrayDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\FilterVarArrayDynamicReturnTypeExtension(
			$this->getService('0294'),
			$this->getService('reflectionProvider')
		);
	}


	public function createService0178(): PHPStan\Type\Php\ArrayPadDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayPadDynamicReturnTypeExtension;
	}


	public function createService0179(): PHPStan\Type\Php\TriggerErrorDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\TriggerErrorDynamicReturnTypeExtension($this->getService('0314'));
	}


	public function createService0180(): PHPStan\Type\Php\ArrayChangeKeyCaseFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayChangeKeyCaseFunctionReturnTypeExtension;
	}


	public function createService0181(): PHPStan\Type\Php\GetDefinedVarsFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\GetDefinedVarsFunctionReturnTypeExtension;
	}


	public function createService0182(): PHPStan\Type\Php\ArrayCurrentDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayCurrentDynamicReturnTypeExtension;
	}


	public function createService0183(): PHPStan\Type\Php\ArrayKeyExistsFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\ArrayKeyExistsFunctionTypeSpecifyingExtension($this->getService('0314'));
	}


	public function createService0184(): PHPStan\Type\Php\ArrayFlipFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayFlipFunctionReturnTypeExtension($this->getService('0314'));
	}


	public function createService0185(): PHPStan\Type\Php\BackedEnumFromMethodDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\BackedEnumFromMethodDynamicReturnTypeExtension;
	}


	public function createService0186(): PHPStan\Type\Php\DateIntervalConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\DateIntervalConstructorThrowTypeExtension($this->getService('0314'));
	}


	public function createService0187(): PHPStan\Type\Php\StrCaseFunctionsReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrCaseFunctionsReturnTypeExtension;
	}


	public function createService0188(): PHPStan\Type\Php\FilterVarThrowTypeExtension
	{
		return new PHPStan\Type\Php\FilterVarThrowTypeExtension($this->getService('reflectionProvider'), $this->getService('0314'));
	}


	public function createService0189(): PHPStan\Type\Php\PregFilterFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\PregFilterFunctionReturnTypeExtension;
	}


	public function createService0190(): PHPStan\Type\Php\ArraySpliceFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArraySpliceFunctionReturnTypeExtension($this->getService('0314'));
	}


	public function createService0191(): PHPStan\Type\Php\GettimeofdayDynamicFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\GettimeofdayDynamicFunctionReturnTypeExtension;
	}


	public function createService0192(): PHPStan\Type\Php\CountCharsFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\CountCharsFunctionDynamicReturnTypeExtension($this->getService('0314'));
	}


	public function createService0193(): PHPStan\Type\Php\DateIntervalDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\DateIntervalDynamicReturnTypeExtension;
	}


	public function createService0194(): PHPStan\Type\Php\ArrayFillFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayFillFunctionReturnTypeExtension($this->getService('0314'));
	}


	public function createService0195(): PHPStan\Type\Php\DsMapDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\DsMapDynamicReturnTypeExtension;
	}


	public function createService0196(): PHPStan\Type\Php\ReflectionClassIsSubclassOfTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\ReflectionClassIsSubclassOfTypeSpecifyingExtension;
	}


	public function createService0197(): PHPStan\Type\Php\ConstantHelper
	{
		return new PHPStan\Type\Php\ConstantHelper;
	}


	public function createService0198(): PHPStan\Type\Php\RegexArrayShapeMatcher
	{
		return new PHPStan\Type\Php\RegexArrayShapeMatcher(
			$this->getService('0308'),
			$this->getService('0307'),
			$this->getService('0314')
		);
	}


	public function createService0199(): PHPStan\Type\Php\IdateFunctionReturnTypeHelper
	{
		return new PHPStan\Type\Php\IdateFunctionReturnTypeHelper;
	}


	public function createService0200(): PHPStan\Type\Php\ArgumentBasedFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArgumentBasedFunctionReturnTypeExtension;
	}


	public function createService0201(): PHPStan\Type\Php\SimpleXMLElementClassPropertyReflectionExtension
	{
		return new PHPStan\Type\Php\SimpleXMLElementClassPropertyReflectionExtension;
	}


	public function createService0202(): PHPStan\Type\Php\NonEmptyStringFunctionsReturnTypeExtension
	{
		return new PHPStan\Type\Php\NonEmptyStringFunctionsReturnTypeExtension;
	}


	public function createService0203(): PHPStan\Type\Php\CountFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\CountFunctionReturnTypeExtension;
	}


	public function createService0204(): PHPStan\Type\Php\CountFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\CountFunctionTypeSpecifyingExtension;
	}


	public function createService0205(): PHPStan\Type\Php\SimpleXMLElementAsXMLMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\SimpleXMLElementAsXMLMethodReturnTypeExtension;
	}


	public function createService0206(): PHPStan\Type\Php\ArrayCombineFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayCombineFunctionReturnTypeExtension($this->getService('0231'), $this->getService('0314'));
	}


	public function createService0207(): PHPStan\Type\Php\ArrayFindKeyFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayFindKeyFunctionReturnTypeExtension;
	}


	public function createService0208(): PHPStan\Type\Php\ArrayFilterFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayFilterFunctionReturnTypeExtension($this->getService('0158'));
	}


	public function createService0209(): PHPStan\Type\Php\MbConvertEncodingFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\MbConvertEncodingFunctionReturnTypeExtension($this->getService('0314'));
	}


	public function createService0210(): PHPStan\Type\Php\OpenSslCipherMethodsProvider
	{
		return new PHPStan\Type\Php\OpenSslCipherMethodsProvider;
	}


	public function createService0211(): PHPStan\Type\Php\BcMathStringOrNullReturnTypeExtension
	{
		return new PHPStan\Type\Php\BcMathStringOrNullReturnTypeExtension($this->getService('0314'));
	}


	public function createService0212(): PHPStan\Type\Php\SimpleXMLElementConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\SimpleXMLElementConstructorThrowTypeExtension;
	}


	public function createService0213(): PHPStan\Type\Php\StrlenFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrlenFunctionReturnTypeExtension;
	}


	public function createService0214(): PHPStan\Type\Php\DateTimeDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\DateTimeDynamicReturnTypeExtension;
	}


	public function createService0215(): PHPStan\Type\Php\DomDocumentCreateElementDynamicThrowTypeExtension
	{
		return new PHPStan\Type\Php\DomDocumentCreateElementDynamicThrowTypeExtension;
	}


	public function createService0216(): PHPStan\Type\Php\AssertThrowTypeExtension
	{
		return new PHPStan\Type\Php\AssertThrowTypeExtension;
	}


	public function createService0217(): PHPStan\Type\Php\DatePeriodConstructorReturnTypeExtension
	{
		return new PHPStan\Type\Php\DatePeriodConstructorReturnTypeExtension;
	}


	public function createService0218(): PHPStan\Type\Php\DateTimeConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\DateTimeConstructorThrowTypeExtension($this->getService('0314'));
	}


	public function createService0219(): PHPStan\Type\Php\JsonThrowOnErrorDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\JsonThrowOnErrorDynamicReturnTypeExtension(
			$this->getService('reflectionProvider'),
			$this->getService('0305')
		);
	}


	public function createService0220(): PHPStan\Type\Php\CompactFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\CompactFunctionReturnTypeExtension(true);
	}


	public function createService0221(): PHPStan\Type\Php\DomDocumentCreateElementDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\DomDocumentCreateElementDynamicReturnTypeExtension;
	}


	public function createService0222(): PHPStan\Type\Php\ReflectionFunctionConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionFunctionConstructorThrowTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0223(): PHPStan\Type\Php\ClosureBindToDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ClosureBindToDynamicReturnTypeExtension;
	}


	public function createService0224(): PHPStan\Type\Php\ParseStrParameterOutTypeExtension
	{
		return new PHPStan\Type\Php\ParseStrParameterOutTypeExtension;
	}


	public function createService0225(): PHPStan\Type\Php\DateTimeSubMethodThrowTypeExtension
	{
		return new PHPStan\Type\Php\DateTimeSubMethodThrowTypeExtension($this->getService('0314'));
	}


	public function createService0226(): PHPStan\Type\Php\ArrayKeyDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayKeyDynamicReturnTypeExtension;
	}


	public function createService0227(): PHPStan\Type\Php\SimpleXMLElementXpathMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\SimpleXMLElementXpathMethodReturnTypeExtension;
	}


	public function createService0228(): PHPStan\Type\Php\IniGetReturnTypeExtension
	{
		return new PHPStan\Type\Php\IniGetReturnTypeExtension;
	}


	public function createService0229(): PHPStan\Type\Php\ArrayRandFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayRandFunctionReturnTypeExtension;
	}


	public function createService0230(): PHPStan\Type\Php\StrPadFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrPadFunctionReturnTypeExtension;
	}


	public function createService0231(): PHPStan\Type\Php\ArrayCombineHelper
	{
		return new PHPStan\Type\Php\ArrayCombineHelper;
	}


	public function createService0232(): PHPStan\Type\Php\ArrayIntersectKeyFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayIntersectKeyFunctionReturnTypeExtension($this->getService('0314'));
	}


	public function createService0233(): PHPStan\Type\Php\MinMaxFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\MinMaxFunctionReturnTypeExtension($this->getService('0314'));
	}


	public function createService0234(): PHPStan\Type\Php\ArrayShiftFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayShiftFunctionReturnTypeExtension;
	}


	public function createService0235(): PHPStan\Type\Php\CtypeDigitFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\CtypeDigitFunctionTypeSpecifyingExtension;
	}


	public function createService0236(): PHPStan\Type\Php\GetDebugTypeFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\GetDebugTypeFunctionReturnTypeExtension;
	}


	public function createService0237(): PHPStan\Type\Php\DateTimeCreateDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\DateTimeCreateDynamicReturnTypeExtension;
	}


	public function createService0238(): PHPStan\Type\Php\HighlightStringDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\HighlightStringDynamicReturnTypeExtension($this->getService('0314'));
	}


	public function createService0239(): PHPStan\Type\Php\ArrayFindFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayFindFunctionReturnTypeExtension($this->getService('0158'));
	}


	public function createService0240(): PHPStan\Type\Php\ArrayChunkFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayChunkFunctionReturnTypeExtension($this->getService('0314'));
	}


	public function createService0241(): PHPStan\Type\Php\RoundFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\RoundFunctionReturnTypeExtension($this->getService('0314'));
	}


	public function createService0242(): PHPStan\Type\Php\FilterInputDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\FilterInputDynamicReturnTypeExtension($this->getService('0294'));
	}


	public function createService0243(): PHPStan\Type\Php\DateTimeZoneConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\DateTimeZoneConstructorThrowTypeExtension($this->getService('0314'));
	}


	public function createService0244(): PHPStan\Type\Php\DateFormatMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\DateFormatMethodReturnTypeExtension($this->getService('0265'));
	}


	public function createService0245(): PHPStan\Type\Php\ConstantFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ConstantFunctionReturnTypeExtension($this->getService('0197'));
	}


	public function createService0246(): PHPStan\Type\Php\ExplodeFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ExplodeFunctionDynamicReturnTypeExtension($this->getService('0314'));
	}


	public function createService0247(): PHPStan\Type\Php\ArrayCombineFunctionThrowTypeExtension
	{
		return new PHPStan\Type\Php\ArrayCombineFunctionThrowTypeExtension($this->getService('0231'));
	}


	public function createService0248(): PHPStan\Type\Php\MethodExistsTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\MethodExistsTypeSpecifyingExtension;
	}


	public function createService0249(): PHPStan\Type\Php\CurlGetinfoFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\CurlGetinfoFunctionDynamicReturnTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0250(): PHPStan\Type\Php\TrimFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\TrimFunctionDynamicReturnTypeExtension;
	}


	public function createService0251(): PHPStan\Type\Php\ClassExistsFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\ClassExistsFunctionTypeSpecifyingExtension;
	}


	public function createService0252(): PHPStan\Type\Php\IsAFunctionTypeSpecifyingHelper
	{
		return new PHPStan\Type\Php\IsAFunctionTypeSpecifyingHelper;
	}


	public function createService0253(): PHPStan\Type\Php\ImplodeFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ImplodeFunctionReturnTypeExtension;
	}


	public function createService0254(): PHPStan\Type\Php\TypeSpecifyingFunctionsDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\TypeSpecifyingFunctionsDynamicReturnTypeExtension(
			$this->getService('reflectionProvider'),
			true,
			['stdClass']
		);
	}


	public function createService0255(): PHPStan\Type\Php\ArrayReplaceFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayReplaceFunctionReturnTypeExtension;
	}


	public function createService0256(): PHPStan\Type\Php\IntdivThrowTypeExtension
	{
		return new PHPStan\Type\Php\IntdivThrowTypeExtension;
	}


	public function createService0257(): PHPStan\Type\Php\ArrayFillKeysFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayFillKeysFunctionReturnTypeExtension($this->getService('0314'));
	}


	public function createService0258(): PHPStan\Type\Php\Base64DecodeDynamicFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\Base64DecodeDynamicFunctionReturnTypeExtension;
	}


	public function createService0259(): PHPStan\Type\Php\StatDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\StatDynamicReturnTypeExtension;
	}


	public function createService0260(): PHPStan\Type\Php\DefineConstantTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\DefineConstantTypeSpecifyingExtension;
	}


	public function createService0261(): PHPStan\Type\Php\OpenSslEncryptParameterOutTypeExtension
	{
		return new PHPStan\Type\Php\OpenSslEncryptParameterOutTypeExtension($this->getService('0210'));
	}


	public function createService0262(): PHPStan\Type\Php\DsMapDynamicMethodThrowTypeExtension
	{
		return new PHPStan\Type\Php\DsMapDynamicMethodThrowTypeExtension;
	}


	public function createService0263(): PHPStan\Type\Php\StrrevFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrrevFunctionReturnTypeExtension;
	}


	public function createService0264(): PHPStan\Type\Php\VersionCompareFunctionDynamicThrowTypeExtension
	{
		return new PHPStan\Type\Php\VersionCompareFunctionDynamicThrowTypeExtension($this->getService('0314'));
	}


	public function createService0265(): PHPStan\Type\Php\DateFunctionReturnTypeHelper
	{
		return new PHPStan\Type\Php\DateFunctionReturnTypeHelper;
	}


	public function createService0266(): PHPStan\Type\Php\SetTypeFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\SetTypeFunctionTypeSpecifyingExtension;
	}


	public function createService0267(): PHPStan\Type\Php\PDOConnectReturnTypeExtension
	{
		return new PHPStan\Type\Php\PDOConnectReturnTypeExtension($this->getService('0314'));
	}


	public function createService0268(): PHPStan\Type\Php\ArrayColumnHelper
	{
		return new PHPStan\Type\Php\ArrayColumnHelper($this->getService('0314'));
	}


	public function createService0269(): PHPStan\Type\Php\ArrayMapFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayMapFunctionReturnTypeExtension;
	}


	public function createService0270(): PHPStan\Type\Php\StrWordCountFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrWordCountFunctionDynamicReturnTypeExtension;
	}


	public function createService0271(): PHPStan\Type\Php\GetClassDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\GetClassDynamicReturnTypeExtension;
	}


	public function createService0272(): PHPStan\Type\Php\IsArrayFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsArrayFunctionTypeSpecifyingExtension;
	}


	public function createService0273(): PHPStan\Type\Php\ArrayCountValuesDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayCountValuesDynamicReturnTypeExtension;
	}


	public function createService0274(): PHPStan\Type\Php\InArrayFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\InArrayFunctionTypeSpecifyingExtension;
	}


	public function createService0275(): PHPStan\Type\Php\BcMathNumberOperatorTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\BcMathNumberOperatorTypeSpecifyingExtension($this->getService('0314'));
	}


	public function createService0276(): PHPStan\Type\Php\ArrayReverseFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayReverseFunctionReturnTypeExtension($this->getService('0314'));
	}


	public function createService0277(): PHPStan\Type\Php\MbSubstituteCharacterDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\MbSubstituteCharacterDynamicReturnTypeExtension($this->getService('0314'));
	}


	public function createService0278(): PHPStan\Type\Php\RangeFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\RangeFunctionReturnTypeExtension;
	}


	public function createService0279(): PHPStan\Type\Php\IsSubclassOfFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsSubclassOfFunctionTypeSpecifyingExtension($this->getService('0252'));
	}


	public function createService0280(): PHPStan\Type\Php\IsAFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsAFunctionTypeSpecifyingExtension($this->getService('0252'));
	}


	public function createService0281(): PHPStan\Type\Php\ArrayNextDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayNextDynamicReturnTypeExtension;
	}


	public function createService0282(): PHPStan\Type\Php\ArrayColumnFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayColumnFunctionReturnTypeExtension($this->getService('0268'));
	}


	public function createService0283(): PHPStan\Type\Php\ArrayReduceFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayReduceFunctionReturnTypeExtension;
	}


	public function createService0284(): PHPStan\Type\Php\VersionCompareFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\VersionCompareFunctionDynamicReturnTypeExtension(
			null,
			$this->getService('0315'),
			$this->getService('0314')
		);
	}


	public function createService0285(): PHPStan\Type\Php\StrRepeatFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrRepeatFunctionReturnTypeExtension;
	}


	public function createService0286(): PHPStan\Type\Php\XMLReaderOpenReturnTypeExtension
	{
		return new PHPStan\Type\Php\XMLReaderOpenReturnTypeExtension;
	}


	public function createService0287(): PHPStan\Type\Php\JsonThrowTypeExtension
	{
		return new PHPStan\Type\Php\JsonThrowTypeExtension($this->getService('reflectionProvider'), $this->getService('0305'));
	}


	public function createService0288(): PHPStan\Type\Php\DateIntervalFormatDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\DateIntervalFormatDynamicReturnTypeExtension;
	}


	public function createService0289(): PHPStan\Type\Php\DateFormatFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\DateFormatFunctionReturnTypeExtension($this->getService('0265'));
	}


	public function createService0290(): PHPStan\Type\Php\ArrayPointerFunctionsDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayPointerFunctionsDynamicReturnTypeExtension;
	}


	public function createService0291(): PHPStan\Type\Php\MbFunctionsReturnTypeExtension
	{
		return new PHPStan\Type\Php\MbFunctionsReturnTypeExtension($this->getService('0314'));
	}


	public function createService0292(): PHPStan\Type\Php\MbStrlenFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\MbStrlenFunctionReturnTypeExtension($this->getService('0314'));
	}


	public function createService0293(): PHPStan\Type\Php\DateFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\DateFunctionReturnTypeExtension($this->getService('0265'));
	}


	public function createService0294(): PHPStan\Type\Php\FilterFunctionReturnTypeHelper
	{
		return new PHPStan\Type\Php\FilterFunctionReturnTypeHelper($this->getService('reflectionProvider'), $this->getService('0314'));
	}


	public function createService0295(): PHPStan\Type\Php\GetCalledClassDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\GetCalledClassDynamicReturnTypeExtension;
	}


	public function createService0296(): PHPStan\Type\Php\ArrayKeysFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayKeysFunctionDynamicReturnTypeExtension($this->getService('0314'));
	}


	public function createService0297(): PHPStan\Type\Php\PathinfoFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\PathinfoFunctionDynamicReturnTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0298(): PHPStan\Type\Php\AbsFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\AbsFunctionDynamicReturnTypeExtension;
	}


	public function createService0299(): PHPStan\Type\Php\FunctionExistsFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\FunctionExistsFunctionTypeSpecifyingExtension;
	}


	public function createService0300(): PHPStan\Type\Php\RandomIntFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\RandomIntFunctionReturnTypeExtension;
	}


	public function createService0301(): PHPStan\Type\Php\StrvalFamilyFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrvalFamilyFunctionReturnTypeExtension;
	}


	public function createService0302(): PHPStan\Type\Php\PregMatchTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\PregMatchTypeSpecifyingExtension($this->getService('0198'));
	}


	public function createService0303(): PHPStan\Type\Php\ReflectionClassConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionClassConstructorThrowTypeExtension;
	}


	public function createService0304(): PHPStan\Type\Php\StrContainingTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\StrContainingTypeSpecifyingExtension;
	}


	public function createService0305(): PHPStan\Type\BitwiseFlagHelper
	{
		return new PHPStan\Type\BitwiseFlagHelper($this->getService('reflectionProvider'));
	}


	public function createService0306(): PHPStan\Type\ClosureTypeFactory
	{
		return new PHPStan\Type\ClosureTypeFactory(
			$this->getService('0331'),
			$this->getService('0773'),
			$this->getService('betterReflectionReflector'),
			$this->getService('0334'),
			$this->getService('currentPhpVersionPhpParser')
		);
	}


	public function createService0307(): PHPStan\Type\Regex\RegexExpressionHelper
	{
		return new PHPStan\Type\Regex\RegexExpressionHelper($this->getService('0331'));
	}


	public function createService0308(): PHPStan\Type\Regex\RegexGroupParser
	{
		return new PHPStan\Type\Regex\RegexGroupParser($this->getService('0314'), $this->getService('0307'));
	}


	public function createService0309(): PHPStan\Type\Constant\OversizedArrayBuilder
	{
		return new PHPStan\Type\Constant\OversizedArrayBuilder;
	}


	public function createService0310(): PHPStan\Type\FileTypeMapper
	{
		return new PHPStan\Type\FileTypeMapper(
			$this->getService('0334'),
			$this->getService('defaultAnalysisParser'),
			$this->getService('0435'),
			$this->getService('0425'),
			$this->getService('023'),
			$this->getService('0416'),
			$this->getService('0439'),
			2048,
			2048
		);
	}


	public function createService0311(): PHPStan\Type\LazyTypeAliasResolverProvider
	{
		return new PHPStan\Type\LazyTypeAliasResolverProvider($this->getService('0119'));
	}


	public function createService0312(): PHPStan\Php\PhpVersionFactoryFactory
	{
		return new PHPStan\Php\PhpVersionFactoryFactory(null, ['/Users/sandermuller/Documents/GitHub/rector-rules']);
	}


	public function createService0313(): PHPStan\Php\PhpVersionFactory
	{
		return $this->getService('0312')->create();
	}


	public function createService0314(): PHPStan\Php\PhpVersion
	{
		return $this->getService('0313')->create();
	}


	public function createService0315(): PHPStan\Php\ComposerPhpVersionFactory
	{
		return new PHPStan\Php\ComposerPhpVersionFactory(['/Users/sandermuller/Documents/GitHub/rector-rules']);
	}


	public function createService0316(): PHPStan\Node\Printer\Printer
	{
		return new PHPStan\Node\Printer\Printer;
	}


	public function createService0317(): PHPStan\Node\Printer\ExprPrinter
	{
		return new PHPStan\Node\Printer\ExprPrinter($this->getService('0316'));
	}


	public function createService0318(): PHPStan\Node\DeepNodeCloner
	{
		return new PHPStan\Node\DeepNodeCloner;
	}


	public function createService0319(): PHPStan\Reflection\BetterReflection\BetterReflectionSourceLocatorFactory
	{
		return new PHPStan\Reflection\BetterReflection\BetterReflectionSourceLocatorFactory(
			$this->getService('phpParserDecorator'),
			$this->getService('php8PhpParser'),
			$this->getService('0314'),
			$this->getService('0772'),
			$this->getService('0773'),
			$this->getService('0324'),
			$this->getService('0323'),
			$this->getService('0326'),
			$this->getService('0443'),
			$this->getService('0327'),
			[],
			[],
			$this->getParameter('analysedPaths'),
			['/Users/sandermuller/Documents/GitHub/rector-rules'],
			$this->getParameter('analysedPathsFromConfig'),
			false,
			$this->getParameter('singleReflectionFile')
		);
	}


	public function createService0320(): PHPStan\Reflection\BetterReflection\Type\AdapterReflectionEnumDynamicReturnTypeExtension
	{
		return new PHPStan\Reflection\BetterReflection\Type\AdapterReflectionEnumDynamicReturnTypeExtension($this->getService('0314'));
	}


	public function createService0321(): PHPStan\Reflection\BetterReflection\SourceStubber\ReflectionSourceStubberFactory
	{
		return new PHPStan\Reflection\BetterReflection\SourceStubber\ReflectionSourceStubberFactory(
			$this->getService('0316'),
			$this->getService('0314')
		);
	}


	public function createService0322(): PHPStan\Reflection\BetterReflection\SourceStubber\PhpStormStubsSourceStubberFactory
	{
		return new PHPStan\Reflection\BetterReflection\SourceStubber\PhpStormStubsSourceStubberFactory(
			$this->getService('php8PhpParser'),
			$this->getService('0316'),
			$this->getService('0314')
		);
	}


	public function createService0323(): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorRepository
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorRepository($this->getService('0325'));
	}


	public function createService0324(): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorRepository
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorRepository($this->getService('0442'));
	}


	public function createService0325(): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorFactory
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorFactory(
			$this->getService('0327'),
			$this->getService('fileFinderScan'),
			$this->getService('0314'),
			$this->getService('0797'),
			$this->getService('0439')
		);
	}


	public function createService0326(): PHPStan\Reflection\BetterReflection\SourceLocator\ComposerJsonAndInstalledJsonSourceLocatorMaker
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\ComposerJsonAndInstalledJsonSourceLocatorMaker(
			$this->getService('0323'),
			$this->getService('0443'),
			$this->getService('0325'),
			$this->getService('0314')
		);
	}


	public function createService0327(): PHPStan\Reflection\BetterReflection\SourceLocator\FileNodesFetcher
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\FileNodesFetcher(
			$this->getService('0775'),
			$this->getService('defaultAnalysisParser')
		);
	}


	public function createService0328(): PHPStan\Reflection\AttributeReflectionFactory
	{
		return new PHPStan\Reflection\AttributeReflectionFactory($this->getService('0331'), $this->getService('0334'));
	}


	public function createService0329(): PHPStan\Reflection\Php\SealedAllowedSubTypesClassReflectionExtension
	{
		return new PHPStan\Reflection\Php\SealedAllowedSubTypesClassReflectionExtension;
	}


	public function createService0330(): PHPStan\Reflection\Php\EnumAllowedSubTypesClassReflectionExtension
	{
		return new PHPStan\Reflection\Php\EnumAllowedSubTypesClassReflectionExtension;
	}


	public function createService0331(): PHPStan\Reflection\InitializerExprTypeResolver
	{
		return new PHPStan\Reflection\InitializerExprTypeResolver(
			$this->getService('039'),
			$this->getService('0334'),
			$this->getService('0314'),
			$this->getService('0118'),
			$this->getService('0111'),
			$this->getService('0309'),
			false
		);
	}


	public function createService0332(): PHPStan\Reflection\Deprecation\DeprecationProvider
	{
		return new PHPStan\Reflection\Deprecation\DeprecationProvider($this->getService('0119'));
	}


	public function createService0333(): PHPStan\Reflection\ConstructorsHelper
	{
		return new PHPStan\Reflection\ConstructorsHelper($this->getService('0119'), []);
	}


	public function createService0334(): PHPStan\Reflection\ReflectionProvider\LazyReflectionProviderProvider
	{
		return new PHPStan\Reflection\ReflectionProvider\LazyReflectionProviderProvider($this->getService('0119'));
	}


	public function createService0335(): PHPStan\Reflection\SignatureMap\Php8SignatureMapProvider
	{
		return new PHPStan\Reflection\SignatureMap\Php8SignatureMapProvider(
			$this->getService('0338'),
			$this->getService('0327'),
			$this->getService('0310'),
			$this->getService('0314'),
			$this->getService('0331'),
			$this->getService('0334')
		);
	}


	public function createService0336(): PHPStan\Reflection\SignatureMap\NativeFunctionReflectionProvider
	{
		return new PHPStan\Reflection\SignatureMap\NativeFunctionReflectionProvider(
			$this->getService('0339'),
			$this->getService('betterReflectionReflector'),
			$this->getService('0310'),
			$this->getService('stubPhpDocProvider'),
			$this->getService('0328')
		);
	}


	public function createService0337(): PHPStan\Reflection\SignatureMap\SignatureMapParser
	{
		return new PHPStan\Reflection\SignatureMap\SignatureMapParser($this->getService('0428'));
	}


	public function createService0338(): PHPStan\Reflection\SignatureMap\FunctionSignatureMapProvider
	{
		return new PHPStan\Reflection\SignatureMap\FunctionSignatureMapProvider(
			$this->getService('0337'),
			$this->getService('0331'),
			$this->getService('0314'),
			false
		);
	}


	public function createService0339(): PHPStan\Reflection\SignatureMap\SignatureMapProvider
	{
		return $this->getService('0340')->create();
	}


	public function createService0340(): PHPStan\Reflection\SignatureMap\SignatureMapProviderFactory
	{
		return new PHPStan\Reflection\SignatureMap\SignatureMapProviderFactory(
			$this->getService('0314'),
			$this->getService('0338'),
			$this->getService('0335')
		);
	}


	public function createService0341(): PHPStan\Process\CpuCoreCounter
	{
		return new PHPStan\Process\CpuCoreCounter(1.0);
	}


	public function createService0342(): PHPStan\Rules\UnusedFunctionParametersCheck
	{
		return new PHPStan\Rules\UnusedFunctionParametersCheck($this->getService('reflectionProvider'), false);
	}


	public function createService0343(): PHPStan\Rules\Exceptions\MissingCheckedExceptionInThrowsCheck
	{
		return new PHPStan\Rules\Exceptions\MissingCheckedExceptionInThrowsCheck($this->getService('exceptionTypeResolver'));
	}


	public function createService0344(): PHPStan\Rules\Exceptions\DefaultExceptionTypeResolver
	{
		return new PHPStan\Rules\Exceptions\DefaultExceptionTypeResolver($this->getService('reflectionProvider'), [], [], [], []);
	}


	public function createService0345(): PHPStan\Rules\Exceptions\TooWideThrowTypeCheck
	{
		return new PHPStan\Rules\Exceptions\TooWideThrowTypeCheck(true);
	}


	public function createService0346(): PHPStan\Rules\Constants\LazyAlwaysUsedClassConstantsExtensionProvider
	{
		return new PHPStan\Rules\Constants\LazyAlwaysUsedClassConstantsExtensionProvider($this->getService('0119'));
	}


	public function createService0347(): PHPStan\Rules\FunctionDefinitionCheck
	{
		return new PHPStan\Rules\FunctionDefinitionCheck(
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			$this->getService('0412'),
			$this->getService('0314'),
			true,
			false
		);
	}


	public function createService0348(): PHPStan\Rules\Api\ApiRuleHelper
	{
		return new PHPStan\Rules\Api\ApiRuleHelper;
	}


	public function createService0349(): PHPStan\Rules\Functions\PrintfHelper
	{
		return new PHPStan\Rules\Functions\PrintfHelper($this->getService('0314'));
	}


	public function createService0350(): PHPStan\Rules\Pure\FunctionPurityCheck
	{
		return new PHPStan\Rules\Pure\FunctionPurityCheck;
	}


	public function createService0351(): PHPStan\Rules\AttributesCheck
	{
		return new PHPStan\Rules\AttributesCheck(
			$this->getService('reflectionProvider'),
			$this->getService('0372'),
			$this->getService('0369'),
			false
		);
	}


	public function createService0352(): PHPStan\Rules\IssetCheck
	{
		return new PHPStan\Rules\IssetCheck($this->getService('0357'), $this->getService('0358'), true, true);
	}


	public function createService0353(): PHPStan\Rules\Playground\NeverRuleHelper
	{
		return new PHPStan\Rules\Playground\NeverRuleHelper;
	}


	public function createService0354(): PHPStan\Rules\Comparison\PossiblyImpureTipHelper
	{
		return new PHPStan\Rules\Comparison\PossiblyImpureTipHelper(true);
	}


	public function createService0355(): PHPStan\Rules\Comparison\ConstantConditionRuleHelper
	{
		return new PHPStan\Rules\Comparison\ConstantConditionRuleHelper($this->getService('0356'), true);
	}


	public function createService0356(): PHPStan\Rules\Comparison\ImpossibleCheckTypeHelper
	{
		return new PHPStan\Rules\Comparison\ImpossibleCheckTypeHelper(
			$this->getService('reflectionProvider'),
			$this->getService('typeSpecifier'),
			['stdClass'],
			true
		);
	}


	public function createService0357(): PHPStan\Rules\Properties\PropertyDescriptor
	{
		return new PHPStan\Rules\Properties\PropertyDescriptor;
	}


	public function createService0358(): PHPStan\Rules\Properties\PropertyReflectionFinder
	{
		return new PHPStan\Rules\Properties\PropertyReflectionFinder;
	}


	public function createService0359(): PHPStan\Rules\Properties\AccessPropertiesCheck
	{
		return new PHPStan\Rules\Properties\AccessPropertiesCheck(
			$this->getService('reflectionProvider'),
			$this->getService('0390'),
			$this->getService('0314'),
			true,
			true,
			false
		);
	}


	public function createService0360(): PHPStan\Rules\Properties\LazyReadWritePropertiesExtensionProvider
	{
		return new PHPStan\Rules\Properties\LazyReadWritePropertiesExtensionProvider($this->getService('0119'));
	}


	public function createService0361(): PHPStan\Rules\Properties\AccessStaticPropertiesCheck
	{
		return new PHPStan\Rules\Properties\AccessStaticPropertiesCheck(
			$this->getService('reflectionProvider'),
			$this->getService('0390'),
			$this->getService('0369'),
			$this->getService('0314'),
			true
		);
	}


	public function createService0362(): PHPStan\Rules\ClassCaseSensitivityCheck
	{
		return new PHPStan\Rules\ClassCaseSensitivityCheck($this->getService('reflectionProvider'), true);
	}


	public function createService0363(): PHPStan\Rules\Debug\FileAssertRule
	{
		return new PHPStan\Rules\Debug\FileAssertRule($this->getService('reflectionProvider'), $this->getService('0428'));
	}


	public function createService0364(): PHPStan\Rules\Debug\DumpTypeRule
	{
		return new PHPStan\Rules\Debug\DumpTypeRule($this->getService('reflectionProvider'));
	}


	public function createService0365(): PHPStan\Rules\Debug\DumpPhpDocTypeRule
	{
		return new PHPStan\Rules\Debug\DumpPhpDocTypeRule($this->getService('reflectionProvider'), $this->getService('0771'));
	}


	public function createService0366(): PHPStan\Rules\Debug\DumpNativeTypeRule
	{
		return new PHPStan\Rules\Debug\DumpNativeTypeRule($this->getService('reflectionProvider'));
	}


	public function createService0367(): PHPStan\Rules\Debug\DebugScopeRule
	{
		return new PHPStan\Rules\Debug\DebugScopeRule($this->getService('reflectionProvider'));
	}


	public function createService0368(): PHPStan\Rules\MissingTypehintCheck
	{
		return new PHPStan\Rules\MissingTypehintCheck(false, ['DOMNamedNodeMap'], false);
	}


	public function createService0369(): PHPStan\Rules\ClassNameCheck
	{
		return new PHPStan\Rules\ClassNameCheck(
			$this->getService('0362'),
			$this->getService('0370'),
			$this->getService('reflectionProvider'),
			$this->getService('0119')
		);
	}


	public function createService0370(): PHPStan\Rules\ClassForbiddenNameCheck
	{
		return new PHPStan\Rules\ClassForbiddenNameCheck($this->getService('0119'));
	}


	public function createService0371(): PHPStan\Rules\FunctionReturnTypeCheck
	{
		return new PHPStan\Rules\FunctionReturnTypeCheck($this->getService('0390'));
	}


	public function createService0372(): PHPStan\Rules\FunctionCallParametersCheck
	{
		return new PHPStan\Rules\FunctionCallParametersCheck(
			$this->getService('0390'),
			$this->getService('0389'),
			$this->getService('0412'),
			$this->getService('0358'),
			$this->getService('reflectionProvider'),
			true,
			true,
			true,
			true
		);
	}


	public function createService0373(): PHPStan\Rules\Classes\LocalTypeAliasesCheck
	{
		return new PHPStan\Rules\Classes\LocalTypeAliasesCheck(
			[],
			$this->getService('reflectionProvider'),
			$this->getService('0437'),
			$this->getService('0368'),
			$this->getService('0369'),
			$this->getService('0412'),
			$this->getService('0404'),
			true,
			true,
			true
		);
	}


	public function createService0374(): PHPStan\Rules\Classes\ConsistentConstructorHelper
	{
		return new PHPStan\Rules\Classes\ConsistentConstructorHelper;
	}


	public function createService0375(): PHPStan\Rules\Classes\MixinCheck
	{
		return new PHPStan\Rules\Classes\MixinCheck(
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			$this->getService('0404'),
			$this->getService('0368'),
			$this->getService('0412'),
			true,
			true,
			true
		);
	}


	public function createService0376(): PHPStan\Rules\Classes\PropertyTagCheck
	{
		return new PHPStan\Rules\Classes\PropertyTagCheck(
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			$this->getService('0404'),
			$this->getService('0368'),
			$this->getService('0412'),
			true,
			true,
			true
		);
	}


	public function createService0377(): PHPStan\Rules\Classes\MethodTagCheck
	{
		return new PHPStan\Rules\Classes\MethodTagCheck(
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			$this->getService('0404'),
			$this->getService('0368'),
			$this->getService('0412'),
			true,
			true,
			true
		);
	}


	public function createService0378(): PHPStan\Rules\Classes\DuplicateDeclarationHelper
	{
		return new PHPStan\Rules\Classes\DuplicateDeclarationHelper;
	}


	public function createService0379(): PHPStan\Rules\RestrictedUsage\RestrictedMethodCallableUsageRule
	{
		return new PHPStan\Rules\RestrictedUsage\RestrictedMethodCallableUsageRule(
			$this->getService('0119'),
			$this->getService('reflectionProvider')
		);
	}


	public function createService0380(): PHPStan\Rules\RestrictedUsage\RestrictedStaticMethodUsageRule
	{
		return new PHPStan\Rules\RestrictedUsage\RestrictedStaticMethodUsageRule(
			$this->getService('0119'),
			$this->getService('reflectionProvider'),
			$this->getService('0390')
		);
	}


	public function createService0381(): PHPStan\Rules\RestrictedUsage\RestrictedFunctionUsageRule
	{
		return new PHPStan\Rules\RestrictedUsage\RestrictedFunctionUsageRule(
			$this->getService('0119'),
			$this->getService('reflectionProvider')
		);
	}


	public function createService0382(): PHPStan\Rules\RestrictedUsage\RestrictedFunctionCallableUsageRule
	{
		return new PHPStan\Rules\RestrictedUsage\RestrictedFunctionCallableUsageRule(
			$this->getService('0119'),
			$this->getService('reflectionProvider')
		);
	}


	public function createService0383(): PHPStan\Rules\RestrictedUsage\RestrictedMethodUsageRule
	{
		return new PHPStan\Rules\RestrictedUsage\RestrictedMethodUsageRule(
			$this->getService('0119'),
			$this->getService('reflectionProvider')
		);
	}


	public function createService0384(): PHPStan\Rules\RestrictedUsage\RestrictedClassConstantUsageRule
	{
		return new PHPStan\Rules\RestrictedUsage\RestrictedClassConstantUsageRule(
			$this->getService('0119'),
			$this->getService('reflectionProvider'),
			$this->getService('0390')
		);
	}


	public function createService0385(): PHPStan\Rules\RestrictedUsage\RestrictedUsageOfDeprecatedStringCastRule
	{
		return new PHPStan\Rules\RestrictedUsage\RestrictedUsageOfDeprecatedStringCastRule(
			$this->getService('0119'),
			$this->getService('reflectionProvider')
		);
	}


	public function createService0386(): PHPStan\Rules\RestrictedUsage\RestrictedPropertyUsageRule
	{
		return new PHPStan\Rules\RestrictedUsage\RestrictedPropertyUsageRule(
			$this->getService('0119'),
			$this->getService('reflectionProvider')
		);
	}


	public function createService0387(): PHPStan\Rules\RestrictedUsage\RestrictedStaticPropertyUsageRule
	{
		return new PHPStan\Rules\RestrictedUsage\RestrictedStaticPropertyUsageRule(
			$this->getService('0119'),
			$this->getService('reflectionProvider'),
			$this->getService('0390')
		);
	}


	public function createService0388(): PHPStan\Rules\RestrictedUsage\RestrictedStaticMethodCallableUsageRule
	{
		return new PHPStan\Rules\RestrictedUsage\RestrictedStaticMethodCallableUsageRule(
			$this->getService('0119'),
			$this->getService('reflectionProvider'),
			$this->getService('0390')
		);
	}


	public function createService0389(): PHPStan\Rules\NullsafeCheck
	{
		return new PHPStan\Rules\NullsafeCheck;
	}


	public function createService0390(): PHPStan\Rules\RuleLevelHelper
	{
		return new PHPStan\Rules\RuleLevelHelper($this->getService('reflectionProvider'), true, false, true, true, true, false, true);
	}


	public function createService0391(): PHPStan\Rules\Methods\StaticMethodCallCheck
	{
		return new PHPStan\Rules\Methods\StaticMethodCallCheck(
			$this->getService('reflectionProvider'),
			$this->getService('0390'),
			$this->getService('0369'),
			true,
			true,
			true
		);
	}


	public function createService0392(): PHPStan\Rules\Methods\ParentMethodHelper
	{
		return new PHPStan\Rules\Methods\ParentMethodHelper($this->getService('0776'));
	}


	public function createService0393(): PHPStan\Rules\Methods\MethodCallCheck
	{
		return new PHPStan\Rules\Methods\MethodCallCheck($this->getService('reflectionProvider'), $this->getService('0390'), true, true);
	}


	public function createService0394(): PHPStan\Rules\Methods\MethodPrototypeFinder
	{
		return new PHPStan\Rules\Methods\MethodPrototypeFinder($this->getService('0314'), $this->getService('0776'));
	}


	public function createService0395(): PHPStan\Rules\Methods\MethodVisibilityComparisonHelper
	{
		return new PHPStan\Rules\Methods\MethodVisibilityComparisonHelper;
	}


	public function createService0396(): PHPStan\Rules\Methods\MethodParameterComparisonHelper
	{
		return new PHPStan\Rules\Methods\MethodParameterComparisonHelper($this->getService('0314'));
	}


	public function createService0397(): PHPStan\Rules\Methods\LazyAlwaysUsedMethodExtensionProvider
	{
		return new PHPStan\Rules\Methods\LazyAlwaysUsedMethodExtensionProvider($this->getService('0119'));
	}


	public function createService0398(): PHPStan\Rules\ParameterCastableToStringCheck
	{
		return new PHPStan\Rules\ParameterCastableToStringCheck($this->getService('0390'));
	}


	public function createService0399(): PHPStan\Rules\TooWideTypehints\TooWideTypeCheck
	{
		return new PHPStan\Rules\TooWideTypehints\TooWideTypeCheck($this->getService('0358'), false, false);
	}


	public function createService0400(): PHPStan\Rules\TooWideTypehints\TooWideParameterOutTypeCheck
	{
		return new PHPStan\Rules\TooWideTypehints\TooWideParameterOutTypeCheck($this->getService('0399'));
	}


	public function createService0401(): PHPStan\Rules\InternalTag\RestrictedInternalUsageHelper
	{
		return new PHPStan\Rules\InternalTag\RestrictedInternalUsageHelper;
	}


	public function createService0402(): PHPStan\Rules\Generics\TemplateTypeCheck
	{
		return new PHPStan\Rules\Generics\TemplateTypeCheck(
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			$this->getService('0404'),
			$this->getService('0128'),
			true
		);
	}


	public function createService0403(): PHPStan\Rules\Generics\MethodTagTemplateTypeCheck
	{
		return new PHPStan\Rules\Generics\MethodTagTemplateTypeCheck($this->getService('0310'), $this->getService('0402'));
	}


	public function createService0404(): PHPStan\Rules\Generics\GenericObjectTypeCheck
	{
		return new PHPStan\Rules\Generics\GenericObjectTypeCheck;
	}


	public function createService0405(): PHPStan\Rules\Generics\GenericAncestorsCheck
	{
		return new PHPStan\Rules\Generics\GenericAncestorsCheck(
			$this->getService('reflectionProvider'),
			$this->getService('0404'),
			$this->getService('0407'),
			$this->getService('0412'),
			['DOMNamedNodeMap'],
			true
		);
	}


	public function createService0406(): PHPStan\Rules\Generics\CrossCheckInterfacesHelper
	{
		return new PHPStan\Rules\Generics\CrossCheckInterfacesHelper;
	}


	public function createService0407(): PHPStan\Rules\Generics\VarianceCheck
	{
		return new PHPStan\Rules\Generics\VarianceCheck;
	}


	public function createService0408(): PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchCheck
	{
		return new PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchCheck($this->getService('0390'), true, false, false);
	}


	public function createService0409(): PHPStan\Rules\PhpDoc\GenericCallableRuleHelper
	{
		return new PHPStan\Rules\PhpDoc\GenericCallableRuleHelper($this->getService('0402'));
	}


	public function createService0410(): PHPStan\Rules\PhpDoc\ConditionalReturnTypeRuleHelper
	{
		return new PHPStan\Rules\PhpDoc\ConditionalReturnTypeRuleHelper;
	}


	public function createService0411(): PHPStan\Rules\PhpDoc\RequireExtendsCheck
	{
		return new PHPStan\Rules\PhpDoc\RequireExtendsCheck(
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			true,
			true
		);
	}


	public function createService0412(): PHPStan\Rules\PhpDoc\UnresolvableTypeHelper
	{
		return new PHPStan\Rules\PhpDoc\UnresolvableTypeHelper;
	}


	public function createService0413(): PHPStan\Rules\PhpDoc\AssertRuleHelper
	{
		return new PHPStan\Rules\PhpDoc\AssertRuleHelper(
			$this->getService('reflectionProvider'),
			$this->getService('0412'),
			$this->getService('0369'),
			$this->getService('0368'),
			$this->getService('0404'),
			true,
			true
		);
	}


	public function createService0414(): PHPStan\Rules\PhpDoc\VarTagTypeRuleHelper
	{
		return new PHPStan\Rules\PhpDoc\VarTagTypeRuleHelper(
			$this->getService('0437'),
			$this->getService('0310'),
			$this->getService('reflectionProvider'),
			true,
			false
		);
	}


	public function createService0415(): PHPStan\Rules\PhpDoc\IncompatiblePhpDocTypeCheck
	{
		return new PHPStan\Rules\PhpDoc\IncompatiblePhpDocTypeCheck(
			$this->getService('0404'),
			$this->getService('0412'),
			$this->getService('0409')
		);
	}


	public function createService0416(): PHPStan\File\FileHelper
	{
		return new PHPStan\File\FileHelper('/Users/sandermuller/Documents/GitHub/rector-rules');
	}


	public function createService0417(): PHPStan\File\FileMonitor
	{
		return new PHPStan\File\FileMonitor(
			$this->getService('fileFinderAnalyse'),
			$this->getService('fileFinderScan'),
			$this->getParameter('analysedPaths'),
			$this->getParameter('analysedPathsFromConfig'),
			[],
			[]
		);
	}


	public function createService0418(): PHPStan\File\FileExcluderFactory
	{
		return new PHPStan\File\FileExcluderFactory($this->getService('0447'), ['analyseAndScan' => [], 'analyse' => []]);
	}


	public function createService0419(): PHPStan\Parallel\Scheduler
	{
		return new PHPStan\Parallel\Scheduler(20, 8, 2);
	}


	public function createService0420(): PHPStan\Parallel\ParallelAnalyser
	{
		return new PHPStan\Parallel\ParallelAnalyser(50, 600.0, 134217728);
	}


	public function createService0421(): PHPStan\Command\FixerApplication
	{
		return new PHPStan\Command\FixerApplication(
			$this->getService('0417'),
			$this->getService('030'),
			$this->getService('0432'),
			$this->getParameter('analysedPaths'),
			'/Users/sandermuller/Documents/GitHub/rector-rules',
			($this->getParameter('sysGetTempDir')) . '/phpstan-fixer',
			['/Users/sandermuller/Documents/GitHub/rector-rules'],
			[
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/parametersSchema.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.levelmax.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level10.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level9.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level8.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level7.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level6.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level5.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level4.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level3.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level2.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level1.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level0.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan-strict-rules/rules.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/rector/type-perfect/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/tomasvotruba/cognitive-complexity/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/tomasvotruba/type-coverage/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/phpstan.neon.dist',
			],
			null,
			[
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionUnionType.php',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionAttribute.php',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/Attribute85.php',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionIntersectionType.php',
			],
			null,
			'max'
		);
	}


	public function createService0422(): PHPStan\Command\AnalyserRunner
	{
		return new PHPStan\Command\AnalyserRunner(
			$this->getService('0419'),
			$this->getService('031'),
			$this->getService('0420'),
			$this->getService('0341')
		);
	}


	public function createService0423(): PHPStan\Command\AnalyseApplication
	{
		return new PHPStan\Command\AnalyseApplication(
			$this->getService('0422'),
			$this->getService('034'),
			$this->getService('0426'),
			$this->getService('0440'),
			$this->getService('030'),
			$this->getService('0432')
		);
	}


	public function createService0424(): PHPStan\Command\ErrorFormatter\CiDetectedErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\CiDetectedErrorFormatter(
			$this->getService('errorFormatter.github'),
			$this->getService('errorFormatter.teamcity')
		);
	}


	public function createService0425(): PHPStan\PhpDoc\PhpDocNodeResolver
	{
		return new PHPStan\PhpDoc\PhpDocNodeResolver($this->getService('0437'), $this->getService('0438'), $this->getService('0412'));
	}


	public function createService0426(): PHPStan\PhpDoc\StubValidator
	{
		return new PHPStan\PhpDoc\StubValidator($this->getService('0122'), $this->getService('0432'));
	}


	public function createService0427(): PHPStan\PhpDoc\SocketSelectStubFilesExtension
	{
		return new PHPStan\PhpDoc\SocketSelectStubFilesExtension($this->getService('0314'));
	}


	public function createService0428(): PHPStan\PhpDoc\TypeStringResolver
	{
		return new PHPStan\PhpDoc\TypeStringResolver($this->getService('0767'), $this->getService('0768'), $this->getService('0437'));
	}


	public function createService0429(): PHPStan\PhpDoc\PhpDocInheritanceResolver
	{
		return new PHPStan\PhpDoc\PhpDocInheritanceResolver($this->getService('0310'));
	}


	public function createService0430(): PHPStan\PhpDoc\ReflectionClassStubFilesExtension
	{
		return new PHPStan\PhpDoc\ReflectionClassStubFilesExtension($this->getService('0314'));
	}


	public function createService0431(): PHPStan\PhpDoc\ReflectionEnumStubFilesExtension
	{
		return new PHPStan\PhpDoc\ReflectionEnumStubFilesExtension($this->getService('0314'));
	}


	public function createService0432(): PHPStan\PhpDoc\DefaultStubFilesProvider
	{
		return new PHPStan\PhpDoc\DefaultStubFilesProvider(
			$this->getService('0119'),
			$this->getService('0416'),
			[
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/Redis.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionAttribute.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionClassConstant.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionFunctionAbstract.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionMethod.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionParameter.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionProperty.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/iterable.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ArrayObject.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/WeakReference.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ext-ds.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ImagickPixel.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/PDOStatement.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/date.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ibm_db2.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/mysqli.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/zip.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/dom.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/spl.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/SplObjectStorage.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/Exception.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/arrayFunctions.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/core.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/typeCheckingFunctions.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/Countable.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/file.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/stream_socket_client.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/stream_socket_server.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ctype.stub',
			],
			['/Users/sandermuller/Documents/GitHub/rector-rules']
		);
	}


	public function createService0433(): PHPStan\PhpDoc\JsonValidateStubFilesExtension
	{
		return new PHPStan\PhpDoc\JsonValidateStubFilesExtension($this->getService('0314'));
	}


	public function createService0434(): PHPStan\PhpDoc\BcMathNumberStubFilesExtension
	{
		return new PHPStan\PhpDoc\BcMathNumberStubFilesExtension($this->getService('0314'));
	}


	public function createService0435(): PHPStan\PhpDoc\PhpDocStringResolver
	{
		return new PHPStan\PhpDoc\PhpDocStringResolver($this->getService('0767'), $this->getService('0770'));
	}


	public function createService0436(): PHPStan\PhpDoc\LazyTypeNodeResolverExtensionRegistryProvider
	{
		return new PHPStan\PhpDoc\LazyTypeNodeResolverExtensionRegistryProvider($this->getService('0119'));
	}


	public function createService0437(): PHPStan\PhpDoc\TypeNodeResolver
	{
		return new PHPStan\PhpDoc\TypeNodeResolver(
			$this->getService('0436'),
			$this->getService('0334'),
			$this->getService('0311'),
			$this->getService('039'),
			$this->getService('0331')
		);
	}


	public function createService0438(): PHPStan\PhpDoc\ConstExprNodeResolver
	{
		return new PHPStan\PhpDoc\ConstExprNodeResolver($this->getService('0334'), $this->getService('0331'));
	}


	public function createService0439(): PHPStan\Cache\Cache
	{
		return new PHPStan\Cache\Cache($this->getService('cacheStorage'));
	}


	public function createService0440(): PHPStan\Analyser\ResultCache\ResultCacheManagerFactory
	{
		return new class ($this) implements PHPStan\Analyser\ResultCache\ResultCacheManagerFactory {
			private $container;


			public function __construct(Container_28e671353d $container)
			{
				$this->container = $container;
			}


			public function create(array $fileReplacements): PHPStan\Analyser\ResultCache\ResultCacheManager
			{
				return new PHPStan\Analyser\ResultCache\ResultCacheManager(
					$this->container->getService('0119'),
					$this->container->getService('0126'),
					$this->container->getService('fileFinderScan'),
					$this->container->getService('0432'),
					$this->container->getService('0416'),
					'/Users/sandermuller/Documents/GitHub/rector-rules/.cache/phpstan/resultCache.php',
					$this->container->getParameter('analysedPaths'),
					$this->container->getParameter('analysedPathsFromConfig'),
					['/Users/sandermuller/Documents/GitHub/rector-rules'],
					'max',
					null,
					[
						'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionUnionType.php',
						'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionAttribute.php',
						'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/Attribute85.php',
						'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionIntersectionType.php',
					],
					[],
					[],
					$fileReplacements,
					false,
					[
						['parameters', 'editorUrl'],
						['parameters', 'editorUrlTitle'],
						['parameters', 'errorFormat'],
						['parameters', 'ignoreErrors'],
						['parameters', 'reportUnmatchedIgnoredErrors'],
						['parameters', 'tipsOfTheDay'],
						['parameters', 'parallel'],
						['parameters', 'internalErrorsCountLimit'],
						['parameters', 'cache'],
						['parameters', 'memoryLimitFile'],
						['parameters', 'pro'],
						'parametersSchema',
					],
					7
				);
			}
		};
	}


	public function createService0441(): PHPStan\Analyser\InternalScopeFactoryFactory
	{
		return new class ($this) implements PHPStan\Analyser\InternalScopeFactoryFactory {
			private $container;


			public function __construct(Container_28e671353d $container)
			{
				$this->container = $container;
			}


			public function create(?callable $nodeCallback): PHPStan\Analyser\InternalScopeFactory
			{
				return new PHPStan\Analyser\LazyInternalScopeFactory($this->container->getService('0119'), $nodeCallback);
			}
		};
	}


	public function createService0442(): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorFactory
	{
		return new class ($this) implements PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorFactory {
			private $container;


			public function __construct(Container_28e671353d $container)
			{
				$this->container = $container;
			}


			public function create(string $fileName): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocator
			{
				return new PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocator(
					$this->container->getService('0327'),
					$this->container->getService('0439'),
					$this->container->getService('0314'),
					$fileName
				);
			}
		};
	}


	public function createService0443(): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedPsrAutoloaderLocatorFactory
	{
		return new class ($this) implements PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedPsrAutoloaderLocatorFactory {
			private $container;


			public function __construct(Container_28e671353d $container)
			{
				$this->container = $container;
			}


			public function create(PHPStan\BetterReflection\SourceLocator\Type\Composer\Psr\PsrAutoloaderMapping $mapping): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedPsrAutoloaderLocator
			{
				return new PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedPsrAutoloaderLocator($mapping, $this->container->getService('0324'));
			}
		};
	}


	public function createService0444(): PHPStan\Reflection\Php\PhpMethodReflectionFactory
	{
		return new class ($this) implements PHPStan\Reflection\Php\PhpMethodReflectionFactory {
			private $container;


			public function __construct(Container_28e671353d $container)
			{
				$this->container = $container;
			}


			public function create(
				PHPStan\Reflection\ClassReflection $declaringClass,
				?PHPStan\Reflection\ClassReflection $declaringTrait,
				PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection,
				PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap,
				array $phpDocParameterTypes,
				?PHPStan\Type\Type $phpDocReturnType,
				?PHPStan\Type\Type $phpDocThrowType,
				?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock,
				?string $deprecatedDescription,
				bool $isDeprecated,
				bool $isInternal,
				bool $isFinal,
				?bool $isPure,
				PHPStan\Reflection\Assertions $asserts,
				?PHPStan\Type\Type $selfOutType,
				?string $phpDocComment,
				array $phpDocParameterOutTypes,
				array $immediatelyInvokedCallableParameters,
				array $phpDocClosureThisTypeParameters,
				bool $acceptsNamedArguments,
				array $attributes
			): PHPStan\Reflection\Php\PhpMethodReflection {
				return new PHPStan\Reflection\Php\PhpMethodReflection(
					$this->container->getService('0331'),
					$declaringClass,
					$declaringTrait,
					$reflection,
					$this->container->getService('reflectionProvider'),
					$this->container->getService('0328'),
					$templateTypeMap,
					$phpDocParameterTypes,
					$phpDocReturnType,
					$phpDocThrowType,
					$resolvedPhpDocBlock,
					$deprecatedDescription,
					$isDeprecated,
					$isInternal,
					$isFinal,
					$isPure,
					$asserts,
					$acceptsNamedArguments,
					$selfOutType,
					$phpDocComment,
					$phpDocParameterOutTypes,
					$immediatelyInvokedCallableParameters,
					$phpDocClosureThisTypeParameters,
					$attributes
				);
			}
		};
	}


	public function createService0445(): PHPStan\Reflection\FunctionReflectionFactory
	{
		return new class ($this) implements PHPStan\Reflection\FunctionReflectionFactory {
			private $container;


			public function __construct(Container_28e671353d $container)
			{
				$this->container = $container;
			}


			public function create(
				PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection,
				PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap,
				array $phpDocParameterTypes,
				?PHPStan\Type\Type $phpDocReturnType,
				?PHPStan\Type\Type $phpDocThrowType,
				?string $deprecatedDescription,
				bool $isDeprecated,
				bool $isInternal,
				?string $filename,
				?bool $isPure,
				PHPStan\Reflection\Assertions $asserts,
				bool $acceptsNamedArguments,
				?string $phpDocComment,
				array $phpDocParameterOutTypes,
				array $phpDocParameterImmediatelyInvokedCallable,
				array $phpDocParameterClosureThisTypes,
				array $attributes
			): PHPStan\Reflection\Php\PhpFunctionReflection {
				return new PHPStan\Reflection\Php\PhpFunctionReflection(
					$this->container->getService('0331'),
					$reflection,
					$this->container->getService('0328'),
					$templateTypeMap,
					$phpDocParameterTypes,
					$phpDocReturnType,
					$phpDocThrowType,
					$deprecatedDescription,
					$isDeprecated,
					$isInternal,
					$filename,
					$isPure,
					$asserts,
					$acceptsNamedArguments,
					$phpDocComment,
					$phpDocParameterOutTypes,
					$phpDocParameterImmediatelyInvokedCallable,
					$phpDocParameterClosureThisTypes,
					$attributes
				);
			}
		};
	}


	public function createService0446(): PHPStan\Reflection\ClassReflectionFactory
	{
		return new class ($this) implements PHPStan\Reflection\ClassReflectionFactory {
			private $container;


			public function __construct(Container_28e671353d $container)
			{
				$this->container = $container;
			}


			public function create(
				string $displayName,
				ReflectionClass $reflection,
				?string $anonymousFilename,
				?PHPStan\Type\Generic\TemplateTypeMap $resolvedTemplateTypeMap,
				?PHPStan\PhpDoc\ResolvedPhpDocBlock $stubPhpDocBlock,
				?string $extraCacheKey = null,
				?PHPStan\Type\Generic\TemplateTypeVarianceMap $resolvedCallSiteVarianceMap = null,
				?bool $finalByKeywordOverride = null
			): PHPStan\Reflection\ClassReflection {
				return new PHPStan\Reflection\ClassReflection(
					$this->container->getService('0446'),
					$this->container->getService('reflectionProvider'),
					$this->container->getService('0331'),
					$this->container->getService('0310'),
					$this->container->getService('stubPhpDocProvider'),
					$this->container->getService('0429'),
					$this->container->getService('0314'),
					$this->container->getService('0339'),
					$this->container->getService('0332'),
					$this->container->getService('0328'),
					$this->container->getService('0121'),
					$displayName,
					$reflection,
					$anonymousFilename,
					$resolvedTemplateTypeMap,
					$stubPhpDocBlock,
					$extraCacheKey,
					$resolvedCallSiteVarianceMap,
					$finalByKeywordOverride
				);
			}
		};
	}


	public function createService0447(): PHPStan\File\FileExcluderRawFactory
	{
		return new class ($this) implements PHPStan\File\FileExcluderRawFactory {
			private $container;


			public function __construct(Container_28e671353d $container)
			{
				$this->container = $container;
			}


			public function create(array $analyseExcludes): PHPStan\File\FileExcluder
			{
				return new PHPStan\File\FileExcluder($this->container->getService('0416'), $analyseExcludes);
			}
		};
	}


	public function createService0448(): PHPStan\Rules\Variables\UnsetRule
	{
		return new PHPStan\Rules\Variables\UnsetRule($this->getService('0358'), $this->getService('0314'));
	}


	public function createService0449(): PHPStan\Rules\Variables\ParameterOutExecutionEndTypeRule
	{
		return new PHPStan\Rules\Variables\ParameterOutExecutionEndTypeRule($this->getService('0390'));
	}


	public function createService0450(): PHPStan\Rules\Variables\InvalidVariableAssignRule
	{
		return new PHPStan\Rules\Variables\InvalidVariableAssignRule;
	}


	public function createService0451(): PHPStan\Rules\Variables\ParameterOutAssignedTypeRule
	{
		return new PHPStan\Rules\Variables\ParameterOutAssignedTypeRule($this->getService('0390'));
	}


	public function createService0452(): PHPStan\Rules\Variables\VariableCloningRule
	{
		return new PHPStan\Rules\Variables\VariableCloningRule($this->getService('0390'));
	}


	public function createService0453(): PHPStan\Rules\Variables\CompactVariablesRule
	{
		return new PHPStan\Rules\Variables\CompactVariablesRule(true);
	}


	public function createService0454(): PHPStan\Rules\Variables\IssetRule
	{
		return new PHPStan\Rules\Variables\IssetRule($this->getService('0352'));
	}


	public function createService0455(): PHPStan\Rules\Variables\ThisInGlobalStatementRule
	{
		return new PHPStan\Rules\Variables\ThisInGlobalStatementRule;
	}


	public function createService0456(): PHPStan\Rules\Variables\EmptyRule
	{
		return new PHPStan\Rules\Variables\EmptyRule($this->getService('0352'));
	}


	public function createService0457(): PHPStan\Rules\Variables\NullCoalesceRule
	{
		return new PHPStan\Rules\Variables\NullCoalesceRule($this->getService('0352'));
	}


	public function createService0458(): PHPStan\Rules\Variables\DefinedVariableRule
	{
		return new PHPStan\Rules\Variables\DefinedVariableRule(false, true);
	}


	public function createService0459(): PHPStan\Rules\Variables\ThisInStaticStatementRule
	{
		return new PHPStan\Rules\Variables\ThisInStaticStatementRule;
	}


	public function createService0460(): PHPStan\Rules\Exceptions\ThrowsVoidMethodWithExplicitThrowPointRule
	{
		return new PHPStan\Rules\Exceptions\ThrowsVoidMethodWithExplicitThrowPointRule(
			$this->getService('exceptionTypeResolver'),
			false
		);
	}


	public function createService0461(): PHPStan\Rules\Exceptions\NoncapturingCatchRule
	{
		return new PHPStan\Rules\Exceptions\NoncapturingCatchRule;
	}


	public function createService0462(): PHPStan\Rules\Exceptions\CaughtExceptionExistenceRule
	{
		return new PHPStan\Rules\Exceptions\CaughtExceptionExistenceRule(
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			true,
			true
		);
	}


	public function createService0463(): PHPStan\Rules\Exceptions\OverwrittenExitPointByFinallyRule
	{
		return new PHPStan\Rules\Exceptions\OverwrittenExitPointByFinallyRule;
	}


	public function createService0464(): PHPStan\Rules\Exceptions\ThrowsVoidPropertyHookWithExplicitThrowPointRule
	{
		return new PHPStan\Rules\Exceptions\ThrowsVoidPropertyHookWithExplicitThrowPointRule(
			$this->getService('exceptionTypeResolver'),
			false
		);
	}


	public function createService0465(): PHPStan\Rules\Exceptions\CatchWithUnthrownExceptionRule
	{
		return new PHPStan\Rules\Exceptions\CatchWithUnthrownExceptionRule($this->getService('exceptionTypeResolver'), true);
	}


	public function createService0466(): PHPStan\Rules\Exceptions\ThrowExpressionRule
	{
		return new PHPStan\Rules\Exceptions\ThrowExpressionRule($this->getService('0314'));
	}


	public function createService0467(): PHPStan\Rules\Exceptions\ThrowsVoidFunctionWithExplicitThrowPointRule
	{
		return new PHPStan\Rules\Exceptions\ThrowsVoidFunctionWithExplicitThrowPointRule(
			$this->getService('exceptionTypeResolver'),
			false
		);
	}


	public function createService0468(): PHPStan\Rules\Exceptions\ThrowExprTypeRule
	{
		return new PHPStan\Rules\Exceptions\ThrowExprTypeRule($this->getService('0390'));
	}


	public function createService0469(): PHPStan\Rules\Ignore\IgnoreParseErrorRule
	{
		return new PHPStan\Rules\Ignore\IgnoreParseErrorRule;
	}


	public function createService0470(): PHPStan\Rules\Constants\ClassAsClassConstantRule
	{
		return new PHPStan\Rules\Constants\ClassAsClassConstantRule;
	}


	public function createService0471(): PHPStan\Rules\Constants\OverridingConstantRule
	{
		return new PHPStan\Rules\Constants\OverridingConstantRule(true);
	}


	public function createService0472(): PHPStan\Rules\Constants\MagicConstantContextRule
	{
		return new PHPStan\Rules\Constants\MagicConstantContextRule;
	}


	public function createService0473(): PHPStan\Rules\Constants\FinalConstantRule
	{
		return new PHPStan\Rules\Constants\FinalConstantRule($this->getService('0314'));
	}


	public function createService0474(): PHPStan\Rules\Constants\NativeTypedClassConstantRule
	{
		return new PHPStan\Rules\Constants\NativeTypedClassConstantRule($this->getService('0314'));
	}


	public function createService0475(): PHPStan\Rules\Constants\DynamicClassConstantFetchRule
	{
		return new PHPStan\Rules\Constants\DynamicClassConstantFetchRule($this->getService('0314'), $this->getService('0390'));
	}


	public function createService0476(): PHPStan\Rules\Constants\ValueAssignedToClassConstantRule
	{
		return new PHPStan\Rules\Constants\ValueAssignedToClassConstantRule;
	}


	public function createService0477(): PHPStan\Rules\Constants\ConstantRule
	{
		return new PHPStan\Rules\Constants\ConstantRule(true);
	}


	public function createService0478(): PHPStan\Rules\Constants\FinalPrivateConstantRule
	{
		return new PHPStan\Rules\Constants\FinalPrivateConstantRule;
	}


	public function createService0479(): PHPStan\Rules\Constants\MissingClassConstantTypehintRule
	{
		return new PHPStan\Rules\Constants\MissingClassConstantTypehintRule($this->getService('0368'));
	}


	public function createService0480(): PHPStan\Rules\Constants\ConstantAttributesRule
	{
		return new PHPStan\Rules\Constants\ConstantAttributesRule($this->getService('0351'), $this->getService('0314'));
	}


	public function createService0481(): PHPStan\Rules\EnumCases\EnumCaseAttributesRule
	{
		return new PHPStan\Rules\EnumCases\EnumCaseAttributesRule($this->getService('0351'));
	}


	public function createService0482(): PHPStan\Rules\EnumCases\EnumCaseOutsideEnumRule
	{
		return new PHPStan\Rules\EnumCases\EnumCaseOutsideEnumRule;
	}


	public function createService0483(): PHPStan\Rules\Namespaces\ExistingNamesInUseRule
	{
		return new PHPStan\Rules\Namespaces\ExistingNamesInUseRule(
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			true,
			true
		);
	}


	public function createService0484(): PHPStan\Rules\Namespaces\ExistingNamesInGroupUseRule
	{
		return new PHPStan\Rules\Namespaces\ExistingNamesInGroupUseRule(
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			true,
			true
		);
	}


	public function createService0485(): PHPStan\Rules\Api\ApiInstanceofTypeRule
	{
		return new PHPStan\Rules\Api\ApiInstanceofTypeRule($this->getService('reflectionProvider'));
	}


	public function createService0486(): PHPStan\Rules\Api\ApiClassExtendsRule
	{
		return new PHPStan\Rules\Api\ApiClassExtendsRule($this->getService('0348'), $this->getService('reflectionProvider'));
	}


	public function createService0487(): PHPStan\Rules\Api\RuntimeReflectionInstantiationRule
	{
		return new PHPStan\Rules\Api\RuntimeReflectionInstantiationRule($this->getService('reflectionProvider'));
	}


	public function createService0488(): PHPStan\Rules\Api\ApiMethodCallRule
	{
		return new PHPStan\Rules\Api\ApiMethodCallRule($this->getService('0348'));
	}


	public function createService0489(): PHPStan\Rules\Api\PhpStanNamespaceIn3rdPartyPackageRule
	{
		return new PHPStan\Rules\Api\PhpStanNamespaceIn3rdPartyPackageRule($this->getService('0348'));
	}


	public function createService0490(): PHPStan\Rules\Api\ApiClassConstFetchRule
	{
		return new PHPStan\Rules\Api\ApiClassConstFetchRule($this->getService('0348'), $this->getService('reflectionProvider'));
	}


	public function createService0491(): PHPStan\Rules\Api\RuntimeReflectionFunctionRule
	{
		return new PHPStan\Rules\Api\RuntimeReflectionFunctionRule($this->getService('reflectionProvider'));
	}


	public function createService0492(): PHPStan\Rules\Api\NodeConnectingVisitorAttributesRule
	{
		return new PHPStan\Rules\Api\NodeConnectingVisitorAttributesRule;
	}


	public function createService0493(): PHPStan\Rules\Api\OldPhpParser4ClassRule
	{
		return new PHPStan\Rules\Api\OldPhpParser4ClassRule;
	}


	public function createService0494(): PHPStan\Rules\Api\GetTemplateTypeRule
	{
		return new PHPStan\Rules\Api\GetTemplateTypeRule($this->getService('reflectionProvider'));
	}


	public function createService0495(): PHPStan\Rules\Api\ApiInterfaceExtendsRule
	{
		return new PHPStan\Rules\Api\ApiInterfaceExtendsRule($this->getService('0348'), $this->getService('reflectionProvider'));
	}


	public function createService0496(): PHPStan\Rules\Api\ApiStaticCallRule
	{
		return new PHPStan\Rules\Api\ApiStaticCallRule($this->getService('0348'), $this->getService('reflectionProvider'));
	}


	public function createService0497(): PHPStan\Rules\Api\ApiInstanceofRule
	{
		return new PHPStan\Rules\Api\ApiInstanceofRule($this->getService('0348'), $this->getService('reflectionProvider'));
	}


	public function createService0498(): PHPStan\Rules\Api\ApiInstantiationRule
	{
		return new PHPStan\Rules\Api\ApiInstantiationRule($this->getService('0348'), $this->getService('reflectionProvider'));
	}


	public function createService0499(): PHPStan\Rules\Api\ApiClassImplementsRule
	{
		return new PHPStan\Rules\Api\ApiClassImplementsRule($this->getService('0348'), $this->getService('reflectionProvider'));
	}


	public function createService0500(): PHPStan\Rules\Api\ApiTraitUseRule
	{
		return new PHPStan\Rules\Api\ApiTraitUseRule($this->getService('0348'), $this->getService('reflectionProvider'));
	}


	public function createService0501(): PHPStan\Rules\Functions\ArrowFunctionReturnNullsafeByRefRule
	{
		return new PHPStan\Rules\Functions\ArrowFunctionReturnNullsafeByRefRule($this->getService('0389'));
	}


	public function createService0502(): PHPStan\Rules\Functions\FunctionCallableRule
	{
		return new PHPStan\Rules\Functions\FunctionCallableRule(
			$this->getService('reflectionProvider'),
			$this->getService('0390'),
			$this->getService('0314'),
			true,
			true
		);
	}


	public function createService0503(): PHPStan\Rules\Functions\SortParameterCastableToStringRule
	{
		return new PHPStan\Rules\Functions\SortParameterCastableToStringRule(
			$this->getService('reflectionProvider'),
			$this->getService('0398')
		);
	}


	public function createService0504(): PHPStan\Rules\Functions\ReturnNullsafeByRefRule
	{
		return new PHPStan\Rules\Functions\ReturnNullsafeByRefRule($this->getService('0389'));
	}


	public function createService0505(): PHPStan\Rules\Functions\FunctionAttributesRule
	{
		return new PHPStan\Rules\Functions\FunctionAttributesRule($this->getService('0351'));
	}


	public function createService0506(): PHPStan\Rules\Functions\ClosureReturnTypeRule
	{
		return new PHPStan\Rules\Functions\ClosureReturnTypeRule($this->getService('0371'));
	}


	public function createService0507(): PHPStan\Rules\Functions\CallCallablesRule
	{
		return new PHPStan\Rules\Functions\CallCallablesRule($this->getService('0372'), $this->getService('0390'), true);
	}


	public function createService0508(): PHPStan\Rules\Functions\ReturnTypeRule
	{
		return new PHPStan\Rules\Functions\ReturnTypeRule($this->getService('0371'));
	}


	public function createService0509(): PHPStan\Rules\Functions\CallToFunctionStatementWithoutSideEffectsRule
	{
		return new PHPStan\Rules\Functions\CallToFunctionStatementWithoutSideEffectsRule($this->getService('reflectionProvider'));
	}


	public function createService0510(): PHPStan\Rules\Functions\PrintfArrayParametersRule
	{
		return new PHPStan\Rules\Functions\PrintfArrayParametersRule($this->getService('0349'), $this->getService('reflectionProvider'));
	}


	public function createService0511(): PHPStan\Rules\Functions\FilterVarRule
	{
		return new PHPStan\Rules\Functions\FilterVarRule(
			$this->getService('reflectionProvider'),
			$this->getService('0294'),
			$this->getService('0314')
		);
	}


	public function createService0512(): PHPStan\Rules\Functions\CallToNonExistentFunctionRule
	{
		return new PHPStan\Rules\Functions\CallToNonExistentFunctionRule($this->getService('reflectionProvider'), true, true);
	}


	public function createService0513(): PHPStan\Rules\Functions\ParameterCastableToStringRule
	{
		return new PHPStan\Rules\Functions\ParameterCastableToStringRule(
			$this->getService('reflectionProvider'),
			$this->getService('0398')
		);
	}


	public function createService0514(): PHPStan\Rules\Functions\ArrowFunctionReturnTypeRule
	{
		return new PHPStan\Rules\Functions\ArrowFunctionReturnTypeRule($this->getService('0371'));
	}


	public function createService0515(): PHPStan\Rules\Functions\CallToFunctionParametersRule
	{
		return new PHPStan\Rules\Functions\CallToFunctionParametersRule(
			$this->getService('reflectionProvider'),
			$this->getService('0372')
		);
	}


	public function createService0516(): PHPStan\Rules\Functions\UnusedClosureUsesRule
	{
		return new PHPStan\Rules\Functions\UnusedClosureUsesRule($this->getService('0342'));
	}


	public function createService0517(): PHPStan\Rules\Functions\CallUserFuncRule
	{
		return new PHPStan\Rules\Functions\CallUserFuncRule($this->getService('reflectionProvider'), $this->getService('0372'));
	}


	public function createService0518(): PHPStan\Rules\Functions\UselessFunctionReturnValueRule
	{
		return new PHPStan\Rules\Functions\UselessFunctionReturnValueRule($this->getService('reflectionProvider'));
	}


	public function createService0519(): PHPStan\Rules\Functions\ArrowFunctionAttributesRule
	{
		return new PHPStan\Rules\Functions\ArrowFunctionAttributesRule($this->getService('0351'));
	}


	public function createService0520(): PHPStan\Rules\Functions\ArrayValuesRule
	{
		return new PHPStan\Rules\Functions\ArrayValuesRule($this->getService('reflectionProvider'), true, true);
	}


	public function createService0521(): PHPStan\Rules\Functions\InvalidParameterNameRule
	{
		return new PHPStan\Rules\Functions\InvalidParameterNameRule;
	}


	public function createService0522(): PHPStan\Rules\Functions\MissingFunctionReturnTypehintRule
	{
		return new PHPStan\Rules\Functions\MissingFunctionReturnTypehintRule($this->getService('0368'));
	}


	public function createService0523(): PHPStan\Rules\Functions\RedefinedParametersRule
	{
		return new PHPStan\Rules\Functions\RedefinedParametersRule;
	}


	public function createService0524(): PHPStan\Rules\Functions\DefineParametersRule
	{
		return new PHPStan\Rules\Functions\DefineParametersRule($this->getService('0314'));
	}


	public function createService0525(): PHPStan\Rules\Functions\ExistingClassesInTypehintsRule
	{
		return new PHPStan\Rules\Functions\ExistingClassesInTypehintsRule($this->getService('0347'));
	}


	public function createService0526(): PHPStan\Rules\Functions\InvalidLexicalVariablesInClosureUseRule
	{
		return new PHPStan\Rules\Functions\InvalidLexicalVariablesInClosureUseRule;
	}


	public function createService0527(): PHPStan\Rules\Functions\ArrayFilterRule
	{
		return new PHPStan\Rules\Functions\ArrayFilterRule($this->getService('reflectionProvider'), true, true);
	}


	public function createService0528(): PHPStan\Rules\Functions\CallToFunctionStatementWithNoDiscardRule
	{
		return new PHPStan\Rules\Functions\CallToFunctionStatementWithNoDiscardRule(
			$this->getService('reflectionProvider'),
			$this->getService('0314')
		);
	}


	public function createService0529(): PHPStan\Rules\Functions\IncompatibleArrowFunctionDefaultParameterTypeRule
	{
		return new PHPStan\Rules\Functions\IncompatibleArrowFunctionDefaultParameterTypeRule;
	}


	public function createService0530(): PHPStan\Rules\Functions\ParamAttributesRule
	{
		return new PHPStan\Rules\Functions\ParamAttributesRule($this->getService('0351'));
	}


	public function createService0531(): PHPStan\Rules\Functions\InnerFunctionRule
	{
		return new PHPStan\Rules\Functions\InnerFunctionRule;
	}


	public function createService0532(): PHPStan\Rules\Functions\ClosureAttributesRule
	{
		return new PHPStan\Rules\Functions\ClosureAttributesRule($this->getService('0351'));
	}


	public function createService0533(): PHPStan\Rules\Functions\ExistingClassesInArrowFunctionTypehintsRule
	{
		return new PHPStan\Rules\Functions\ExistingClassesInArrowFunctionTypehintsRule(
			$this->getService('0347'),
			$this->getService('0314')
		);
	}


	public function createService0534(): PHPStan\Rules\Functions\MissingFunctionParameterTypehintRule
	{
		return new PHPStan\Rules\Functions\MissingFunctionParameterTypehintRule($this->getService('0368'));
	}


	public function createService0535(): PHPStan\Rules\Functions\PrintfParametersRule
	{
		return new PHPStan\Rules\Functions\PrintfParametersRule($this->getService('0349'), $this->getService('reflectionProvider'));
	}


	public function createService0536(): PHPStan\Rules\Functions\VariadicParametersDeclarationRule
	{
		return new PHPStan\Rules\Functions\VariadicParametersDeclarationRule;
	}


	public function createService0537(): PHPStan\Rules\Functions\ImplodeParameterCastableToStringRule
	{
		return new PHPStan\Rules\Functions\ImplodeParameterCastableToStringRule(
			$this->getService('reflectionProvider'),
			$this->getService('0398')
		);
	}


	public function createService0538(): PHPStan\Rules\Functions\ExistingClassesInClosureTypehintsRule
	{
		return new PHPStan\Rules\Functions\ExistingClassesInClosureTypehintsRule($this->getService('0347'));
	}


	public function createService0539(): PHPStan\Rules\Functions\IncompatibleClosureDefaultParameterTypeRule
	{
		return new PHPStan\Rules\Functions\IncompatibleClosureDefaultParameterTypeRule;
	}


	public function createService0540(): PHPStan\Rules\Functions\RandomIntParametersRule
	{
		return new PHPStan\Rules\Functions\RandomIntParametersRule(
			$this->getService('reflectionProvider'),
			$this->getService('0314'),
			true
		);
	}


	public function createService0541(): PHPStan\Rules\Functions\IncompatibleDefaultParameterTypeRule
	{
		return new PHPStan\Rules\Functions\IncompatibleDefaultParameterTypeRule;
	}


	public function createService0542(): PHPStan\Rules\Pure\PureFunctionRule
	{
		return new PHPStan\Rules\Pure\PureFunctionRule($this->getService('0350'));
	}


	public function createService0543(): PHPStan\Rules\Pure\PureMethodRule
	{
		return new PHPStan\Rules\Pure\PureMethodRule($this->getService('0350'));
	}


	public function createService0544(): PHPStan\Rules\Types\InvalidTypesInUnionRule
	{
		return new PHPStan\Rules\Types\InvalidTypesInUnionRule;
	}


	public function createService0545(): PHPStan\Rules\DeadCode\UnusedPrivateConstantRule
	{
		return new PHPStan\Rules\DeadCode\UnusedPrivateConstantRule($this->getService('0346'));
	}


	public function createService0546(): PHPStan\Rules\DeadCode\CallToConstructorStatementWithoutImpurePointsRule
	{
		return new PHPStan\Rules\DeadCode\CallToConstructorStatementWithoutImpurePointsRule;
	}


	public function createService0547(): PHPStan\Rules\DeadCode\CallToMethodStatementWithoutImpurePointsRule
	{
		return new PHPStan\Rules\DeadCode\CallToMethodStatementWithoutImpurePointsRule;
	}


	public function createService0548(): PHPStan\Rules\DeadCode\CallToStaticMethodStatementWithoutImpurePointsRule
	{
		return new PHPStan\Rules\DeadCode\CallToStaticMethodStatementWithoutImpurePointsRule;
	}


	public function createService0549(): PHPStan\Rules\DeadCode\UnusedPrivateMethodRule
	{
		return new PHPStan\Rules\DeadCode\UnusedPrivateMethodRule($this->getService('0397'));
	}


	public function createService0550(): PHPStan\Rules\DeadCode\CallToFunctionStatementWithoutImpurePointsRule
	{
		return new PHPStan\Rules\DeadCode\CallToFunctionStatementWithoutImpurePointsRule;
	}


	public function createService0551(): PHPStan\Rules\DeadCode\NoopRule
	{
		return new PHPStan\Rules\DeadCode\NoopRule($this->getService('0317'));
	}


	public function createService0552(): PHPStan\Rules\DeadCode\UnusedPrivatePropertyRule
	{
		return new PHPStan\Rules\DeadCode\UnusedPrivatePropertyRule($this->getService('0360'), [], [], false);
	}


	public function createService0553(): PHPStan\Rules\DeadCode\UnreachableStatementRule
	{
		return new PHPStan\Rules\DeadCode\UnreachableStatementRule;
	}


	public function createService0554(): PHPStan\Rules\Comparison\IfConstantConditionRule
	{
		return new PHPStan\Rules\Comparison\IfConstantConditionRule($this->getService('0355'), $this->getService('0354'), true, true);
	}


	public function createService0555(): PHPStan\Rules\Comparison\DoWhileLoopConstantConditionRule
	{
		return new PHPStan\Rules\Comparison\DoWhileLoopConstantConditionRule(
			$this->getService('0355'),
			$this->getService('0354'),
			true,
			true
		);
	}


	public function createService0556(): PHPStan\Rules\Comparison\UsageOfVoidMatchExpressionRule
	{
		return new PHPStan\Rules\Comparison\UsageOfVoidMatchExpressionRule;
	}


	public function createService0557(): PHPStan\Rules\Comparison\BooleanOrConstantConditionRule
	{
		return new PHPStan\Rules\Comparison\BooleanOrConstantConditionRule(
			$this->getService('0355'),
			$this->getService('0354'),
			true,
			false,
			true
		);
	}


	public function createService0558(): PHPStan\Rules\Comparison\LogicalXorConstantConditionRule
	{
		return new PHPStan\Rules\Comparison\LogicalXorConstantConditionRule(
			$this->getService('0355'),
			$this->getService('0354'),
			true,
			false,
			true
		);
	}


	public function createService0559(): PHPStan\Rules\Comparison\WhileLoopAlwaysTrueConditionRule
	{
		return new PHPStan\Rules\Comparison\WhileLoopAlwaysTrueConditionRule(
			$this->getService('0355'),
			$this->getService('0354'),
			true,
			true
		);
	}


	public function createService0560(): PHPStan\Rules\Comparison\ElseIfConstantConditionRule
	{
		return new PHPStan\Rules\Comparison\ElseIfConstantConditionRule(
			$this->getService('0355'),
			$this->getService('0354'),
			true,
			false,
			true
		);
	}


	public function createService0561(): PHPStan\Rules\Comparison\ImpossibleCheckTypeStaticMethodCallRule
	{
		return new PHPStan\Rules\Comparison\ImpossibleCheckTypeStaticMethodCallRule(
			$this->getService('0356'),
			$this->getService('0354'),
			true,
			false,
			true
		);
	}


	public function createService0562(): PHPStan\Rules\Comparison\BooleanNotConstantConditionRule
	{
		return new PHPStan\Rules\Comparison\BooleanNotConstantConditionRule(
			$this->getService('0355'),
			$this->getService('0354'),
			true,
			false,
			true
		);
	}


	public function createService0563(): PHPStan\Rules\Comparison\ConstantLooseComparisonRule
	{
		return new PHPStan\Rules\Comparison\ConstantLooseComparisonRule($this->getService('0354'), true, false, true);
	}


	public function createService0564(): PHPStan\Rules\Comparison\BooleanAndConstantConditionRule
	{
		return new PHPStan\Rules\Comparison\BooleanAndConstantConditionRule(
			$this->getService('0355'),
			$this->getService('0354'),
			true,
			false,
			true
		);
	}


	public function createService0565(): PHPStan\Rules\Comparison\TernaryOperatorConstantConditionRule
	{
		return new PHPStan\Rules\Comparison\TernaryOperatorConstantConditionRule(
			$this->getService('0355'),
			$this->getService('0354'),
			true,
			true
		);
	}


	public function createService0566(): PHPStan\Rules\Comparison\ImpossibleCheckTypeMethodCallRule
	{
		return new PHPStan\Rules\Comparison\ImpossibleCheckTypeMethodCallRule(
			$this->getService('0356'),
			$this->getService('0354'),
			true,
			false,
			true
		);
	}


	public function createService0567(): PHPStan\Rules\Comparison\NumberComparisonOperatorsConstantConditionRule
	{
		return new PHPStan\Rules\Comparison\NumberComparisonOperatorsConstantConditionRule($this->getService('0354'), true, true);
	}


	public function createService0568(): PHPStan\Rules\Comparison\StrictComparisonOfDifferentTypesRule
	{
		return new PHPStan\Rules\Comparison\StrictComparisonOfDifferentTypesRule(
			$this->getService('038'),
			$this->getService('0354'),
			true,
			false,
			true
		);
	}


	public function createService0569(): PHPStan\Rules\Comparison\WhileLoopAlwaysFalseConditionRule
	{
		return new PHPStan\Rules\Comparison\WhileLoopAlwaysFalseConditionRule(
			$this->getService('0355'),
			$this->getService('0354'),
			true,
			true
		);
	}


	public function createService0570(): PHPStan\Rules\Comparison\MatchExpressionRule
	{
		return new PHPStan\Rules\Comparison\MatchExpressionRule($this->getService('0355'), $this->getService('0354'), true);
	}


	public function createService0571(): PHPStan\Rules\Comparison\ImpossibleCheckTypeFunctionCallRule
	{
		return new PHPStan\Rules\Comparison\ImpossibleCheckTypeFunctionCallRule(
			$this->getService('0356'),
			$this->getService('0354'),
			true,
			false,
			true
		);
	}


	public function createService0572(): PHPStan\Rules\Keywords\ContinueBreakInLoopRule
	{
		return new PHPStan\Rules\Keywords\ContinueBreakInLoopRule;
	}


	public function createService0573(): PHPStan\Rules\Keywords\RequireFileExistsRule
	{
		return new PHPStan\Rules\Keywords\RequireFileExistsRule('/Users/sandermuller/Documents/GitHub/rector-rules');
	}


	public function createService0574(): PHPStan\Rules\Keywords\DeclareStrictTypesRule
	{
		return new PHPStan\Rules\Keywords\DeclareStrictTypesRule($this->getService('0317'));
	}


	public function createService0575(): PHPStan\Rules\Properties\SetPropertyHookParameterRule
	{
		return new PHPStan\Rules\Properties\SetPropertyHookParameterRule($this->getService('0368'), true, true);
	}


	public function createService0576(): PHPStan\Rules\Properties\InvalidCallablePropertyTypeRule
	{
		return new PHPStan\Rules\Properties\InvalidCallablePropertyTypeRule;
	}


	public function createService0577(): PHPStan\Rules\Properties\AccessPrivatePropertyThroughStaticRule
	{
		return new PHPStan\Rules\Properties\AccessPrivatePropertyThroughStaticRule;
	}


	public function createService0578(): PHPStan\Rules\Properties\WritingToReadOnlyPropertiesRule
	{
		return new PHPStan\Rules\Properties\WritingToReadOnlyPropertiesRule(
			$this->getService('0390'),
			$this->getService('0357'),
			$this->getService('0358'),
			false
		);
	}


	public function createService0579(): PHPStan\Rules\Properties\PropertyAssignRefRule
	{
		return new PHPStan\Rules\Properties\PropertyAssignRefRule($this->getService('0314'), $this->getService('0358'));
	}


	public function createService0580(): PHPStan\Rules\Properties\MissingReadOnlyByPhpDocPropertyAssignRule
	{
		return new PHPStan\Rules\Properties\MissingReadOnlyByPhpDocPropertyAssignRule($this->getService('0333'));
	}


	public function createService0581(): PHPStan\Rules\Properties\ReadOnlyPropertyAssignRefRule
	{
		return new PHPStan\Rules\Properties\ReadOnlyPropertyAssignRefRule($this->getService('0358'));
	}


	public function createService0582(): PHPStan\Rules\Properties\OverridingPropertyRule
	{
		return new PHPStan\Rules\Properties\OverridingPropertyRule($this->getService('0314'), true, true, null, false);
	}


	public function createService0583(): PHPStan\Rules\Properties\AccessPropertiesRule
	{
		return new PHPStan\Rules\Properties\AccessPropertiesRule($this->getService('0359'));
	}


	public function createService0584(): PHPStan\Rules\Properties\AccessStaticPropertiesRule
	{
		return new PHPStan\Rules\Properties\AccessStaticPropertiesRule($this->getService('0361'));
	}


	public function createService0585(): PHPStan\Rules\Properties\GetNonVirtualPropertyHookReadRule
	{
		return new PHPStan\Rules\Properties\GetNonVirtualPropertyHookReadRule;
	}


	public function createService0586(): PHPStan\Rules\Properties\TypesAssignedToPropertiesRule
	{
		return new PHPStan\Rules\Properties\TypesAssignedToPropertiesRule($this->getService('0390'), $this->getService('0358'));
	}


	public function createService0587(): PHPStan\Rules\Properties\PropertiesInInterfaceRule
	{
		return new PHPStan\Rules\Properties\PropertiesInInterfaceRule($this->getService('0314'));
	}


	public function createService0588(): PHPStan\Rules\Properties\MissingPropertyTypehintRule
	{
		return new PHPStan\Rules\Properties\MissingPropertyTypehintRule($this->getService('0368'));
	}


	public function createService0589(): PHPStan\Rules\Properties\ExistingClassesInPropertyHookTypehintsRule
	{
		return new PHPStan\Rules\Properties\ExistingClassesInPropertyHookTypehintsRule($this->getService('0347'));
	}


	public function createService0590(): PHPStan\Rules\Properties\NullsafePropertyFetchRule
	{
		return new PHPStan\Rules\Properties\NullsafePropertyFetchRule;
	}


	public function createService0591(): PHPStan\Rules\Properties\SetNonVirtualPropertyHookAssignRule
	{
		return new PHPStan\Rules\Properties\SetNonVirtualPropertyHookAssignRule;
	}


	public function createService0592(): PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyAssignRefRule
	{
		return new PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyAssignRefRule($this->getService('0358'));
	}


	public function createService0593(): PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyAssignRule
	{
		return new PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyAssignRule($this->getService('0358'), $this->getService('0333'));
	}


	public function createService0594(): PHPStan\Rules\Properties\AccessStaticPropertiesInAssignRule
	{
		return new PHPStan\Rules\Properties\AccessStaticPropertiesInAssignRule($this->getService('0361'));
	}


	public function createService0595(): PHPStan\Rules\Properties\PropertyAttributesRule
	{
		return new PHPStan\Rules\Properties\PropertyAttributesRule($this->getService('0351'), $this->getService('0314'));
	}


	public function createService0596(): PHPStan\Rules\Properties\DefaultValueTypesAssignedToPropertiesRule
	{
		return new PHPStan\Rules\Properties\DefaultValueTypesAssignedToPropertiesRule($this->getService('0390'));
	}


	public function createService0597(): PHPStan\Rules\Properties\ReadingWriteOnlyPropertiesRule
	{
		return new PHPStan\Rules\Properties\ReadingWriteOnlyPropertiesRule(
			$this->getService('0357'),
			$this->getService('0358'),
			$this->getService('0390'),
			false
		);
	}


	public function createService0598(): PHPStan\Rules\Properties\AccessPropertiesInAssignRule
	{
		return new PHPStan\Rules\Properties\AccessPropertiesInAssignRule($this->getService('0359'));
	}


	public function createService0599(): PHPStan\Rules\Properties\ExistingClassesInPropertiesRule
	{
		return new PHPStan\Rules\Properties\ExistingClassesInPropertiesRule(
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			$this->getService('0412'),
			$this->getService('0314'),
			true,
			false,
			true
		);
	}


	public function createService0600(): PHPStan\Rules\Properties\ReadOnlyPropertyRule
	{
		return new PHPStan\Rules\Properties\ReadOnlyPropertyRule($this->getService('0314'));
	}


	public function createService0601(): PHPStan\Rules\Properties\ReadOnlyPropertyAssignRule
	{
		return new PHPStan\Rules\Properties\ReadOnlyPropertyAssignRule($this->getService('0358'), $this->getService('0333'));
	}


	public function createService0602(): PHPStan\Rules\Properties\MissingReadOnlyPropertyAssignRule
	{
		return new PHPStan\Rules\Properties\MissingReadOnlyPropertyAssignRule($this->getService('0333'));
	}


	public function createService0603(): PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyRule
	{
		return new PHPStan\Rules\Properties\ReadOnlyByPhpDocPropertyRule;
	}


	public function createService0604(): PHPStan\Rules\Properties\PropertyInClassRule
	{
		return new PHPStan\Rules\Properties\PropertyInClassRule($this->getService('0314'));
	}


	public function createService0605(): PHPStan\Rules\Properties\PropertyHookAttributesRule
	{
		return new PHPStan\Rules\Properties\PropertyHookAttributesRule($this->getService('0351'));
	}


	public function createService0606(): PHPStan\Rules\Traits\NotAnalysedTraitRule
	{
		return new PHPStan\Rules\Traits\NotAnalysedTraitRule;
	}


	public function createService0607(): PHPStan\Rules\Traits\ConflictingTraitConstantsRule
	{
		return new PHPStan\Rules\Traits\ConflictingTraitConstantsRule(
			$this->getService('0331'),
			$this->getService('reflectionProvider')
		);
	}


	public function createService0608(): PHPStan\Rules\Traits\TraitAttributesRule
	{
		return new PHPStan\Rules\Traits\TraitAttributesRule($this->getService('0351'), $this->getService('0314'));
	}


	public function createService0609(): PHPStan\Rules\Traits\ConstantsInTraitsRule
	{
		return new PHPStan\Rules\Traits\ConstantsInTraitsRule($this->getService('0314'));
	}


	public function createService0610(): PHPStan\Rules\Generators\YieldInGeneratorRule
	{
		return new PHPStan\Rules\Generators\YieldInGeneratorRule(true);
	}


	public function createService0611(): PHPStan\Rules\Generators\YieldTypeRule
	{
		return new PHPStan\Rules\Generators\YieldTypeRule($this->getService('0390'));
	}


	public function createService0612(): PHPStan\Rules\Generators\YieldFromTypeRule
	{
		return new PHPStan\Rules\Generators\YieldFromTypeRule($this->getService('0390'), true);
	}


	public function createService0613(): PHPStan\Rules\Missing\MissingReturnRule
	{
		return new PHPStan\Rules\Missing\MissingReturnRule(true, true);
	}


	public function createService0614(): PHPStan\Rules\Classes\RequireExtendsRule
	{
		return new PHPStan\Rules\Classes\RequireExtendsRule;
	}


	public function createService0615(): PHPStan\Rules\Classes\MethodTagTraitUseRule
	{
		return new PHPStan\Rules\Classes\MethodTagTraitUseRule($this->getService('0377'));
	}


	public function createService0616(): PHPStan\Rules\Classes\ClassConstantAttributesRule
	{
		return new PHPStan\Rules\Classes\ClassConstantAttributesRule($this->getService('0351'));
	}


	public function createService0617(): PHPStan\Rules\Classes\ExistingClassInTraitUseRule
	{
		return new PHPStan\Rules\Classes\ExistingClassInTraitUseRule(
			$this->getService('0369'),
			$this->getService('reflectionProvider'),
			true
		);
	}


	public function createService0618(): PHPStan\Rules\Classes\DuplicateDeclarationRule
	{
		return new PHPStan\Rules\Classes\DuplicateDeclarationRule($this->getService('0378'));
	}


	public function createService0619(): PHPStan\Rules\Classes\ClassConstantRule
	{
		return new PHPStan\Rules\Classes\ClassConstantRule(
			$this->getService('reflectionProvider'),
			$this->getService('0390'),
			$this->getService('0369'),
			$this->getService('0314'),
			false
		);
	}


	public function createService0620(): PHPStan\Rules\Classes\ImpossibleInstanceOfRule
	{
		return new PHPStan\Rules\Classes\ImpossibleInstanceOfRule($this->getService('0390'), true, false, true);
	}


	public function createService0621(): PHPStan\Rules\Classes\LocalTypeTraitAliasesRule
	{
		return new PHPStan\Rules\Classes\LocalTypeTraitAliasesRule($this->getService('0373'), $this->getService('reflectionProvider'));
	}


	public function createService0622(): PHPStan\Rules\Classes\LocalTypeTraitUseAliasesRule
	{
		return new PHPStan\Rules\Classes\LocalTypeTraitUseAliasesRule($this->getService('0373'));
	}


	public function createService0623(): PHPStan\Rules\Classes\MethodTagRule
	{
		return new PHPStan\Rules\Classes\MethodTagRule($this->getService('0377'));
	}


	public function createService0624(): PHPStan\Rules\Classes\InvalidPromotedPropertiesRule
	{
		return new PHPStan\Rules\Classes\InvalidPromotedPropertiesRule($this->getService('0314'));
	}


	public function createService0625(): PHPStan\Rules\Classes\LocalTypeAliasesRule
	{
		return new PHPStan\Rules\Classes\LocalTypeAliasesRule($this->getService('0373'));
	}


	public function createService0626(): PHPStan\Rules\Classes\EnumSanityRule
	{
		return new PHPStan\Rules\Classes\EnumSanityRule($this->getService('0331'));
	}


	public function createService0627(): PHPStan\Rules\Classes\ExistingClassesInEnumImplementsRule
	{
		return new PHPStan\Rules\Classes\ExistingClassesInEnumImplementsRule(
			$this->getService('0369'),
			$this->getService('reflectionProvider'),
			true
		);
	}


	public function createService0628(): PHPStan\Rules\Classes\PropertyTagTraitRule
	{
		return new PHPStan\Rules\Classes\PropertyTagTraitRule($this->getService('0376'), $this->getService('reflectionProvider'));
	}


	public function createService0629(): PHPStan\Rules\Classes\DuplicateTraitDeclarationRule
	{
		return new PHPStan\Rules\Classes\DuplicateTraitDeclarationRule($this->getService('0378'));
	}


	public function createService0630(): PHPStan\Rules\Classes\AccessPrivateConstantThroughStaticRule
	{
		return new PHPStan\Rules\Classes\AccessPrivateConstantThroughStaticRule;
	}


	public function createService0631(): PHPStan\Rules\Classes\ExistingClassInClassExtendsRule
	{
		return new PHPStan\Rules\Classes\ExistingClassInClassExtendsRule(
			$this->getService('0369'),
			$this->getService('reflectionProvider'),
			true
		);
	}


	public function createService0632(): PHPStan\Rules\Classes\ExistingClassesInClassImplementsRule
	{
		return new PHPStan\Rules\Classes\ExistingClassesInClassImplementsRule(
			$this->getService('0369'),
			$this->getService('reflectionProvider'),
			true
		);
	}


	public function createService0633(): PHPStan\Rules\Classes\NonClassAttributeClassRule
	{
		return new PHPStan\Rules\Classes\NonClassAttributeClassRule;
	}


	public function createService0634(): PHPStan\Rules\Classes\PropertyTagRule
	{
		return new PHPStan\Rules\Classes\PropertyTagRule($this->getService('0376'));
	}


	public function createService0635(): PHPStan\Rules\Classes\ExistingClassInInstanceOfRule
	{
		return new PHPStan\Rules\Classes\ExistingClassInInstanceOfRule(
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			true,
			true
		);
	}


	public function createService0636(): PHPStan\Rules\Classes\AllowedSubTypesRule
	{
		return new PHPStan\Rules\Classes\AllowedSubTypesRule;
	}


	public function createService0637(): PHPStan\Rules\Classes\ExistingClassesInInterfaceExtendsRule
	{
		return new PHPStan\Rules\Classes\ExistingClassesInInterfaceExtendsRule(
			$this->getService('0369'),
			$this->getService('reflectionProvider'),
			true
		);
	}


	public function createService0638(): PHPStan\Rules\Classes\MixinRule
	{
		return new PHPStan\Rules\Classes\MixinRule($this->getService('0375'));
	}


	public function createService0639(): PHPStan\Rules\Classes\NewStaticRule
	{
		return new PHPStan\Rules\Classes\NewStaticRule($this->getService('0314'), $this->getService('0374'));
	}


	public function createService0640(): PHPStan\Rules\Classes\InstantiationCallableRule
	{
		return new PHPStan\Rules\Classes\InstantiationCallableRule;
	}


	public function createService0641(): PHPStan\Rules\Classes\MethodTagTraitRule
	{
		return new PHPStan\Rules\Classes\MethodTagTraitRule($this->getService('0377'), $this->getService('reflectionProvider'));
	}


	public function createService0642(): PHPStan\Rules\Classes\InstantiationRule
	{
		return new PHPStan\Rules\Classes\InstantiationRule(
			$this->getService('0119'),
			$this->getService('reflectionProvider'),
			$this->getService('0372'),
			$this->getService('0369'),
			$this->getService('0374'),
			true
		);
	}


	public function createService0643(): PHPStan\Rules\Classes\MixinTraitUseRule
	{
		return new PHPStan\Rules\Classes\MixinTraitUseRule($this->getService('0375'));
	}


	public function createService0644(): PHPStan\Rules\Classes\ReadOnlyClassRule
	{
		return new PHPStan\Rules\Classes\ReadOnlyClassRule($this->getService('0314'));
	}


	public function createService0645(): PHPStan\Rules\Classes\UnusedConstructorParametersRule
	{
		return new PHPStan\Rules\Classes\UnusedConstructorParametersRule($this->getService('0342'));
	}


	public function createService0646(): PHPStan\Rules\Classes\PropertyTagTraitUseRule
	{
		return new PHPStan\Rules\Classes\PropertyTagTraitUseRule($this->getService('0376'));
	}


	public function createService0647(): PHPStan\Rules\Classes\MixinTraitRule
	{
		return new PHPStan\Rules\Classes\MixinTraitRule($this->getService('0375'), $this->getService('reflectionProvider'));
	}


	public function createService0648(): PHPStan\Rules\Classes\TraitAttributeClassRule
	{
		return new PHPStan\Rules\Classes\TraitAttributeClassRule;
	}


	public function createService0649(): PHPStan\Rules\Classes\ClassAttributesRule
	{
		return new PHPStan\Rules\Classes\ClassAttributesRule($this->getService('0351'));
	}


	public function createService0650(): PHPStan\Rules\Classes\RequireImplementsRule
	{
		return new PHPStan\Rules\Classes\RequireImplementsRule;
	}


	public function createService0651(): PHPStan\Rules\DateTimeInstantiationRule
	{
		return new PHPStan\Rules\DateTimeInstantiationRule;
	}


	public function createService0652(): PHPStan\Rules\Names\UsedNamesRule
	{
		return new PHPStan\Rules\Names\UsedNamesRule;
	}


	public function createService0653(): PHPStan\Rules\Methods\MethodVisibilityInInterfaceRule
	{
		return new PHPStan\Rules\Methods\MethodVisibilityInInterfaceRule;
	}


	public function createService0654(): PHPStan\Rules\Methods\MissingMethodImplementationRule
	{
		return new PHPStan\Rules\Methods\MissingMethodImplementationRule;
	}


	public function createService0655(): PHPStan\Rules\Methods\CallToMethodStatementWithoutSideEffectsRule
	{
		return new PHPStan\Rules\Methods\CallToMethodStatementWithoutSideEffectsRule($this->getService('0390'));
	}


	public function createService0656(): PHPStan\Rules\Methods\NullsafeMethodCallRule
	{
		return new PHPStan\Rules\Methods\NullsafeMethodCallRule;
	}


	public function createService0657(): PHPStan\Rules\Methods\MissingMethodReturnTypehintRule
	{
		return new PHPStan\Rules\Methods\MissingMethodReturnTypehintRule($this->getService('0368'));
	}


	public function createService0658(): PHPStan\Rules\Methods\CallStaticMethodsRule
	{
		return new PHPStan\Rules\Methods\CallStaticMethodsRule($this->getService('0391'), $this->getService('0372'));
	}


	public function createService0659(): PHPStan\Rules\Methods\MethodAttributesRule
	{
		return new PHPStan\Rules\Methods\MethodAttributesRule($this->getService('0351'));
	}


	public function createService0660(): PHPStan\Rules\Methods\CallToConstructorStatementWithoutSideEffectsRule
	{
		return new PHPStan\Rules\Methods\CallToConstructorStatementWithoutSideEffectsRule($this->getService('reflectionProvider'));
	}


	public function createService0661(): PHPStan\Rules\Methods\CallMethodsRule
	{
		return new PHPStan\Rules\Methods\CallMethodsRule($this->getService('0393'), $this->getService('0372'));
	}


	public function createService0662(): PHPStan\Rules\Methods\MethodCallableRule
	{
		return new PHPStan\Rules\Methods\MethodCallableRule($this->getService('0393'), $this->getService('0314'));
	}


	public function createService0663(): PHPStan\Rules\Methods\MissingMethodSelfOutTypeRule
	{
		return new PHPStan\Rules\Methods\MissingMethodSelfOutTypeRule($this->getService('0368'));
	}


	public function createService0664(): PHPStan\Rules\Methods\CallPrivateMethodThroughStaticRule
	{
		return new PHPStan\Rules\Methods\CallPrivateMethodThroughStaticRule;
	}


	public function createService0665(): PHPStan\Rules\Methods\FinalPrivateMethodRule
	{
		return new PHPStan\Rules\Methods\FinalPrivateMethodRule;
	}


	public function createService0666(): PHPStan\Rules\Methods\ReturnTypeRule
	{
		return new PHPStan\Rules\Methods\ReturnTypeRule($this->getService('0371'));
	}


	public function createService0667(): PHPStan\Rules\Methods\AbstractPrivateMethodRule
	{
		return new PHPStan\Rules\Methods\AbstractPrivateMethodRule;
	}


	public function createService0668(): PHPStan\Rules\Methods\MissingMagicSerializationMethodsRule
	{
		return new PHPStan\Rules\Methods\MissingMagicSerializationMethodsRule($this->getService('0314'));
	}


	public function createService0669(): PHPStan\Rules\Methods\ConsistentConstructorRule
	{
		return new PHPStan\Rules\Methods\ConsistentConstructorRule(
			$this->getService('0374'),
			$this->getService('0396'),
			$this->getService('0395')
		);
	}


	public function createService0670(): PHPStan\Rules\Methods\ConstructorReturnTypeRule
	{
		return new PHPStan\Rules\Methods\ConstructorReturnTypeRule;
	}


	public function createService0671(): PHPStan\Rules\Methods\OverridingMethodRule
	{
		return new PHPStan\Rules\Methods\OverridingMethodRule(
			$this->getService('0314'),
			$this->getService('0785'),
			true,
			$this->getService('0396'),
			$this->getService('0395'),
			$this->getService('0394'),
			false
		);
	}


	public function createService0672(): PHPStan\Rules\Methods\CallToStaticMethodStatementWithNoDiscardRule
	{
		return new PHPStan\Rules\Methods\CallToStaticMethodStatementWithNoDiscardRule(
			$this->getService('0390'),
			$this->getService('reflectionProvider'),
			$this->getService('0314')
		);
	}


	public function createService0673(): PHPStan\Rules\Methods\CallToStaticMethodStatementWithoutSideEffectsRule
	{
		return new PHPStan\Rules\Methods\CallToStaticMethodStatementWithoutSideEffectsRule(
			$this->getService('0390'),
			$this->getService('reflectionProvider')
		);
	}


	public function createService0674(): PHPStan\Rules\Methods\AbstractMethodInNonAbstractClassRule
	{
		return new PHPStan\Rules\Methods\AbstractMethodInNonAbstractClassRule;
	}


	public function createService0675(): PHPStan\Rules\Methods\ExistingClassesInTypehintsRule
	{
		return new PHPStan\Rules\Methods\ExistingClassesInTypehintsRule($this->getService('0347'));
	}


	public function createService0676(): PHPStan\Rules\Methods\StaticMethodCallableRule
	{
		return new PHPStan\Rules\Methods\StaticMethodCallableRule($this->getService('0391'), $this->getService('0314'));
	}


	public function createService0677(): PHPStan\Rules\Methods\MissingMethodParameterTypehintRule
	{
		return new PHPStan\Rules\Methods\MissingMethodParameterTypehintRule($this->getService('0368'));
	}


	public function createService0678(): PHPStan\Rules\Methods\ConsistentConstructorDeclarationRule
	{
		return new PHPStan\Rules\Methods\ConsistentConstructorDeclarationRule;
	}


	public function createService0679(): PHPStan\Rules\Methods\IncompatibleDefaultParameterTypeRule
	{
		return new PHPStan\Rules\Methods\IncompatibleDefaultParameterTypeRule;
	}


	public function createService0680(): PHPStan\Rules\Methods\CallToMethodStatementWithNoDiscardRule
	{
		return new PHPStan\Rules\Methods\CallToMethodStatementWithNoDiscardRule($this->getService('0390'), $this->getService('0314'));
	}


	public function createService0681(): PHPStan\Rules\Whitespace\FileWhitespaceRule
	{
		return new PHPStan\Rules\Whitespace\FileWhitespaceRule;
	}


	public function createService0682(): PHPStan\Rules\Operators\InvalidComparisonOperationRule
	{
		return new PHPStan\Rules\Operators\InvalidComparisonOperationRule($this->getService('0390'), $this->getService('0118'), false);
	}


	public function createService0683(): PHPStan\Rules\Operators\InvalidUnaryOperationRule
	{
		return new PHPStan\Rules\Operators\InvalidUnaryOperationRule($this->getService('0390'));
	}


	public function createService0684(): PHPStan\Rules\Operators\InvalidBinaryOperationRule
	{
		return new PHPStan\Rules\Operators\InvalidBinaryOperationRule($this->getService('0317'), $this->getService('0390'));
	}


	public function createService0685(): PHPStan\Rules\Operators\PipeOperatorRule
	{
		return new PHPStan\Rules\Operators\PipeOperatorRule($this->getService('0390'));
	}


	public function createService0686(): PHPStan\Rules\Operators\InvalidIncDecOperationRule
	{
		return new PHPStan\Rules\Operators\InvalidIncDecOperationRule($this->getService('0390'), $this->getService('0314'));
	}


	public function createService0687(): PHPStan\Rules\Operators\BacktickRule
	{
		return new PHPStan\Rules\Operators\BacktickRule($this->getService('0314'));
	}


	public function createService0688(): PHPStan\Rules\Operators\InvalidAssignVarRule
	{
		return new PHPStan\Rules\Operators\InvalidAssignVarRule($this->getService('0389'));
	}


	public function createService0689(): PHPStan\Rules\Regexp\RegularExpressionPatternRule
	{
		return new PHPStan\Rules\Regexp\RegularExpressionPatternRule($this->getService('0307'));
	}


	public function createService0690(): PHPStan\Rules\Regexp\RegularExpressionQuotingRule
	{
		return new PHPStan\Rules\Regexp\RegularExpressionQuotingRule($this->getService('reflectionProvider'), $this->getService('0307'));
	}


	public function createService0691(): PHPStan\Rules\TooWideTypehints\TooWidePropertyTypeRule
	{
		return new PHPStan\Rules\TooWideTypehints\TooWidePropertyTypeRule($this->getService('0360'), $this->getService('0399'));
	}


	public function createService0692(): PHPStan\Rules\TooWideTypehints\TooWideFunctionReturnTypehintRule
	{
		return new PHPStan\Rules\TooWideTypehints\TooWideFunctionReturnTypehintRule($this->getService('0399'));
	}


	public function createService0693(): PHPStan\Rules\TooWideTypehints\TooWideMethodReturnTypehintRule
	{
		return new PHPStan\Rules\TooWideTypehints\TooWideMethodReturnTypehintRule(false, $this->getService('0399'));
	}


	public function createService0694(): PHPStan\Rules\TooWideTypehints\TooWideFunctionParameterOutTypeRule
	{
		return new PHPStan\Rules\TooWideTypehints\TooWideFunctionParameterOutTypeRule($this->getService('0400'));
	}


	public function createService0695(): PHPStan\Rules\TooWideTypehints\TooWideMethodParameterOutTypeRule
	{
		return new PHPStan\Rules\TooWideTypehints\TooWideMethodParameterOutTypeRule($this->getService('0400'), false);
	}


	public function createService0696(): PHPStan\Rules\TooWideTypehints\TooWideClosureReturnTypehintRule
	{
		return new PHPStan\Rules\TooWideTypehints\TooWideClosureReturnTypehintRule($this->getService('0399'));
	}


	public function createService0697(): PHPStan\Rules\TooWideTypehints\TooWideArrowFunctionReturnTypehintRule
	{
		return new PHPStan\Rules\TooWideTypehints\TooWideArrowFunctionReturnTypehintRule($this->getService('0399'));
	}


	public function createService0698(): PHPStan\Rules\Generics\FunctionTemplateTypeRule
	{
		return new PHPStan\Rules\Generics\FunctionTemplateTypeRule($this->getService('0310'), $this->getService('0402'));
	}


	public function createService0699(): PHPStan\Rules\Generics\EnumTemplateTypeRule
	{
		return new PHPStan\Rules\Generics\EnumTemplateTypeRule;
	}


	public function createService0700(): PHPStan\Rules\Generics\MethodTemplateTypeRule
	{
		return new PHPStan\Rules\Generics\MethodTemplateTypeRule($this->getService('0310'), $this->getService('0402'));
	}


	public function createService0701(): PHPStan\Rules\Generics\InterfaceAncestorsRule
	{
		return new PHPStan\Rules\Generics\InterfaceAncestorsRule($this->getService('0405'), $this->getService('0406'));
	}


	public function createService0702(): PHPStan\Rules\Generics\FunctionSignatureVarianceRule
	{
		return new PHPStan\Rules\Generics\FunctionSignatureVarianceRule($this->getService('0407'));
	}


	public function createService0703(): PHPStan\Rules\Generics\InterfaceTemplateTypeRule
	{
		return new PHPStan\Rules\Generics\InterfaceTemplateTypeRule($this->getService('0402'));
	}


	public function createService0704(): PHPStan\Rules\Generics\MethodTagTemplateTypeRule
	{
		return new PHPStan\Rules\Generics\MethodTagTemplateTypeRule($this->getService('0403'));
	}


	public function createService0705(): PHPStan\Rules\Generics\EnumAncestorsRule
	{
		return new PHPStan\Rules\Generics\EnumAncestorsRule($this->getService('0405'), $this->getService('0406'));
	}


	public function createService0706(): PHPStan\Rules\Generics\ClassAncestorsRule
	{
		return new PHPStan\Rules\Generics\ClassAncestorsRule($this->getService('0405'), $this->getService('0406'));
	}


	public function createService0707(): PHPStan\Rules\Generics\UsedTraitsRule
	{
		return new PHPStan\Rules\Generics\UsedTraitsRule($this->getService('0310'), $this->getService('0405'));
	}


	public function createService0708(): PHPStan\Rules\Generics\PropertyVarianceRule
	{
		return new PHPStan\Rules\Generics\PropertyVarianceRule($this->getService('0407'));
	}


	public function createService0709(): PHPStan\Rules\Generics\MethodTagTemplateTypeTraitRule
	{
		return new PHPStan\Rules\Generics\MethodTagTemplateTypeTraitRule(
			$this->getService('0403'),
			$this->getService('reflectionProvider')
		);
	}


	public function createService0710(): PHPStan\Rules\Generics\TraitTemplateTypeRule
	{
		return new PHPStan\Rules\Generics\TraitTemplateTypeRule($this->getService('0310'), $this->getService('0402'));
	}


	public function createService0711(): PHPStan\Rules\Generics\ClassTemplateTypeRule
	{
		return new PHPStan\Rules\Generics\ClassTemplateTypeRule($this->getService('0402'));
	}


	public function createService0712(): PHPStan\Rules\Generics\MethodSignatureVarianceRule
	{
		return new PHPStan\Rules\Generics\MethodSignatureVarianceRule($this->getService('0407'));
	}


	public function createService0713(): PHPStan\Rules\Arrays\ArrayDestructuringRule
	{
		return new PHPStan\Rules\Arrays\ArrayDestructuringRule($this->getService('0390'), $this->getService('0408'));
	}


	public function createService0714(): PHPStan\Rules\Arrays\OffsetAccessValueAssignmentRule
	{
		return new PHPStan\Rules\Arrays\OffsetAccessValueAssignmentRule($this->getService('0390'));
	}


	public function createService0715(): PHPStan\Rules\Arrays\InvalidKeyInArrayDimFetchRule
	{
		return new PHPStan\Rules\Arrays\InvalidKeyInArrayDimFetchRule($this->getService('0390'), $this->getService('0314'), true, false);
	}


	public function createService0716(): PHPStan\Rules\Arrays\IterableInForeachRule
	{
		return new PHPStan\Rules\Arrays\IterableInForeachRule($this->getService('0390'));
	}


	public function createService0717(): PHPStan\Rules\Arrays\OffsetAccessAssignOpRule
	{
		return new PHPStan\Rules\Arrays\OffsetAccessAssignOpRule($this->getService('0390'));
	}


	public function createService0718(): PHPStan\Rules\Arrays\OffsetAccessWithoutDimForReadingRule
	{
		return new PHPStan\Rules\Arrays\OffsetAccessWithoutDimForReadingRule;
	}


	public function createService0719(): PHPStan\Rules\Arrays\DuplicateKeysInLiteralArraysRule
	{
		return new PHPStan\Rules\Arrays\DuplicateKeysInLiteralArraysRule($this->getService('0317'));
	}


	public function createService0720(): PHPStan\Rules\Arrays\InvalidKeyInArrayItemRule
	{
		return new PHPStan\Rules\Arrays\InvalidKeyInArrayItemRule($this->getService('0390'), $this->getService('0314'), false);
	}


	public function createService0721(): PHPStan\Rules\Arrays\ArrayUnpackingRule
	{
		return new PHPStan\Rules\Arrays\ArrayUnpackingRule($this->getService('0314'), $this->getService('0390'));
	}


	public function createService0722(): PHPStan\Rules\Arrays\OffsetAccessAssignmentRule
	{
		return new PHPStan\Rules\Arrays\OffsetAccessAssignmentRule($this->getService('0390'));
	}


	public function createService0723(): PHPStan\Rules\Arrays\UnpackIterableInArrayRule
	{
		return new PHPStan\Rules\Arrays\UnpackIterableInArrayRule($this->getService('0390'));
	}


	public function createService0724(): PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchRule
	{
		return new PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchRule($this->getService('0390'), $this->getService('0408'), true);
	}


	public function createService0725(): PHPStan\Rules\Arrays\DeadForeachRule
	{
		return new PHPStan\Rules\Arrays\DeadForeachRule;
	}


	public function createService0726(): PHPStan\Rules\Cast\EchoRule
	{
		return new PHPStan\Rules\Cast\EchoRule($this->getService('0390'));
	}


	public function createService0727(): PHPStan\Rules\Cast\UnsetCastRule
	{
		return new PHPStan\Rules\Cast\UnsetCastRule($this->getService('0314'));
	}


	public function createService0728(): PHPStan\Rules\Cast\VoidCastRule
	{
		return new PHPStan\Rules\Cast\VoidCastRule($this->getService('0314'));
	}


	public function createService0729(): PHPStan\Rules\Cast\PrintRule
	{
		return new PHPStan\Rules\Cast\PrintRule($this->getService('0390'));
	}


	public function createService0730(): PHPStan\Rules\Cast\InvalidCastRule
	{
		return new PHPStan\Rules\Cast\InvalidCastRule($this->getService('reflectionProvider'), $this->getService('0390'));
	}


	public function createService0731(): PHPStan\Rules\Cast\InvalidPartOfEncapsedStringRule
	{
		return new PHPStan\Rules\Cast\InvalidPartOfEncapsedStringRule($this->getService('0317'), $this->getService('0390'));
	}


	public function createService0732(): PHPStan\Rules\Cast\DeprecatedCastRule
	{
		return new PHPStan\Rules\Cast\DeprecatedCastRule($this->getService('0314'));
	}


	public function createService0733(): PHPStan\Rules\PhpDoc\IncompatibleSelfOutTypeRule
	{
		return new PHPStan\Rules\PhpDoc\IncompatibleSelfOutTypeRule($this->getService('0412'), $this->getService('0404'));
	}


	public function createService0734(): PHPStan\Rules\PhpDoc\VarTagChangedExpressionTypeRule
	{
		return new PHPStan\Rules\PhpDoc\VarTagChangedExpressionTypeRule($this->getService('0414'));
	}


	public function createService0735(): PHPStan\Rules\PhpDoc\FunctionAssertRule
	{
		return new PHPStan\Rules\PhpDoc\FunctionAssertRule($this->getService('0413'));
	}


	public function createService0736(): PHPStan\Rules\PhpDoc\WrongVariableNameInVarTagRule
	{
		return new PHPStan\Rules\PhpDoc\WrongVariableNameInVarTagRule($this->getService('0310'), $this->getService('0414'));
	}


	public function createService0737(): PHPStan\Rules\PhpDoc\InvalidThrowsPhpDocValueRule
	{
		return new PHPStan\Rules\PhpDoc\InvalidThrowsPhpDocValueRule($this->getService('0310'));
	}


	public function createService0738(): PHPStan\Rules\PhpDoc\IncompatiblePhpDocTypeRule
	{
		return new PHPStan\Rules\PhpDoc\IncompatiblePhpDocTypeRule($this->getService('0310'), $this->getService('0415'));
	}


	public function createService0739(): PHPStan\Rules\PhpDoc\FunctionConditionalReturnTypeRule
	{
		return new PHPStan\Rules\PhpDoc\FunctionConditionalReturnTypeRule($this->getService('0410'));
	}


	public function createService0740(): PHPStan\Rules\PhpDoc\SealedDefinitionClassRule
	{
		return new PHPStan\Rules\PhpDoc\SealedDefinitionClassRule(
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			true,
			true
		);
	}


	public function createService0741(): PHPStan\Rules\PhpDoc\RequireImplementsDefinitionTraitRule
	{
		return new PHPStan\Rules\PhpDoc\RequireImplementsDefinitionTraitRule(
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			true,
			true
		);
	}


	public function createService0742(): PHPStan\Rules\PhpDoc\SealedDefinitionTraitRule
	{
		return new PHPStan\Rules\PhpDoc\SealedDefinitionTraitRule($this->getService('reflectionProvider'));
	}


	public function createService0743(): PHPStan\Rules\PhpDoc\IncompatibleParamImmediatelyInvokedCallableRule
	{
		return new PHPStan\Rules\PhpDoc\IncompatibleParamImmediatelyInvokedCallableRule($this->getService('0310'));
	}


	public function createService0744(): PHPStan\Rules\PhpDoc\IncompatiblePropertyPhpDocTypeRule
	{
		return new PHPStan\Rules\PhpDoc\IncompatiblePropertyPhpDocTypeRule(
			$this->getService('0404'),
			$this->getService('0412'),
			$this->getService('0409')
		);
	}


	public function createService0745(): PHPStan\Rules\PhpDoc\MethodConditionalReturnTypeRule
	{
		return new PHPStan\Rules\PhpDoc\MethodConditionalReturnTypeRule($this->getService('0410'));
	}


	public function createService0746(): PHPStan\Rules\PhpDoc\IncompatibleClassConstantPhpDocTypeRule
	{
		return new PHPStan\Rules\PhpDoc\IncompatibleClassConstantPhpDocTypeRule($this->getService('0404'), $this->getService('0412'));
	}


	public function createService0747(): PHPStan\Rules\PhpDoc\RequireExtendsDefinitionClassRule
	{
		return new PHPStan\Rules\PhpDoc\RequireExtendsDefinitionClassRule($this->getService('0411'));
	}


	public function createService0748(): PHPStan\Rules\PhpDoc\RequireImplementsDefinitionClassRule
	{
		return new PHPStan\Rules\PhpDoc\RequireImplementsDefinitionClassRule;
	}


	public function createService0749(): PHPStan\Rules\PhpDoc\IncompatiblePropertyHookPhpDocTypeRule
	{
		return new PHPStan\Rules\PhpDoc\IncompatiblePropertyHookPhpDocTypeRule($this->getService('0310'), $this->getService('0415'));
	}


	public function createService0750(): PHPStan\Rules\PhpDoc\InvalidPHPStanDocTagRule
	{
		return new PHPStan\Rules\PhpDoc\InvalidPHPStanDocTagRule($this->getService('0767'), $this->getService('0770'));
	}


	public function createService0751(): PHPStan\Rules\PhpDoc\RequireExtendsDefinitionTraitRule
	{
		return new PHPStan\Rules\PhpDoc\RequireExtendsDefinitionTraitRule(
			$this->getService('reflectionProvider'),
			$this->getService('0411')
		);
	}


	public function createService0752(): PHPStan\Rules\PhpDoc\InvalidPhpDocVarTagTypeRule
	{
		return new PHPStan\Rules\PhpDoc\InvalidPhpDocVarTagTypeRule(
			$this->getService('0310'),
			$this->getService('reflectionProvider'),
			$this->getService('0369'),
			$this->getService('0404'),
			$this->getService('0368'),
			$this->getService('0412'),
			true,
			true,
			true
		);
	}


	public function createService0753(): PHPStan\Rules\PhpDoc\InvalidPhpDocTagValueRule
	{
		return new PHPStan\Rules\PhpDoc\InvalidPhpDocTagValueRule($this->getService('0767'), $this->getService('0770'));
	}


	public function createService0754(): PHPStan\Rules\PhpDoc\MethodAssertRule
	{
		return new PHPStan\Rules\PhpDoc\MethodAssertRule($this->getService('0413'));
	}


	public function createService0755(): PHPStan\Rules\DeadCode\ConstructorWithoutImpurePointsCollector
	{
		return new PHPStan\Rules\DeadCode\ConstructorWithoutImpurePointsCollector;
	}


	public function createService0756(): PHPStan\Rules\DeadCode\MethodWithoutImpurePointsCollector
	{
		return new PHPStan\Rules\DeadCode\MethodWithoutImpurePointsCollector;
	}


	public function createService0757(): PHPStan\Rules\DeadCode\PossiblyPureMethodCallCollector
	{
		return new PHPStan\Rules\DeadCode\PossiblyPureMethodCallCollector;
	}


	public function createService0758(): PHPStan\Rules\DeadCode\FunctionWithoutImpurePointsCollector
	{
		return new PHPStan\Rules\DeadCode\FunctionWithoutImpurePointsCollector;
	}


	public function createService0759(): PHPStan\Rules\DeadCode\PossiblyPureStaticCallCollector
	{
		return new PHPStan\Rules\DeadCode\PossiblyPureStaticCallCollector;
	}


	public function createService0760(): PHPStan\Rules\DeadCode\PossiblyPureNewCollector
	{
		return new PHPStan\Rules\DeadCode\PossiblyPureNewCollector($this->getService('reflectionProvider'));
	}


	public function createService0761(): PHPStan\Rules\DeadCode\PossiblyPureFuncCallCollector
	{
		return new PHPStan\Rules\DeadCode\PossiblyPureFuncCallCollector($this->getService('reflectionProvider'));
	}


	public function createService0762(): PHPStan\Rules\Traits\TraitDeclarationCollector
	{
		return new PHPStan\Rules\Traits\TraitDeclarationCollector;
	}


	public function createService0763(): PHPStan\Rules\Traits\TraitUseCollector
	{
		return new PHPStan\Rules\Traits\TraitUseCollector;
	}


	public function createService0764(): PhpParser\BuilderFactory
	{
		return new PhpParser\BuilderFactory;
	}


	public function createService0765(): PhpParser\NodeVisitor\NameResolver
	{
		return new PhpParser\NodeVisitor\NameResolver(options: ['preserveOriginalNames' => true]);
	}


	public function createService0766(): PHPStan\PhpDocParser\ParserConfig
	{
		return new PHPStan\PhpDocParser\ParserConfig(['lines' => true]);
	}


	public function createService0767(): PHPStan\PhpDocParser\Lexer\Lexer
	{
		return new PHPStan\PhpDocParser\Lexer\Lexer($this->getService('0766'));
	}


	public function createService0768(): PHPStan\PhpDocParser\Parser\TypeParser
	{
		return new PHPStan\PhpDocParser\Parser\TypeParser($this->getService('0766'), $this->getService('0769'));
	}


	public function createService0769(): PHPStan\PhpDocParser\Parser\ConstExprParser
	{
		return new PHPStan\PhpDocParser\Parser\ConstExprParser($this->getService('0766'));
	}


	public function createService0770(): PHPStan\PhpDocParser\Parser\PhpDocParser
	{
		return new PHPStan\PhpDocParser\Parser\PhpDocParser(
			$this->getService('0766'),
			$this->getService('0768'),
			$this->getService('0769')
		);
	}


	public function createService0771(): PHPStan\PhpDocParser\Printer\Printer
	{
		return new PHPStan\PhpDocParser\Printer\Printer;
	}


	public function createService0772(): PHPStan\BetterReflection\SourceLocator\SourceStubber\PhpStormStubsSourceStubber
	{
		return $this->getService('0322')->create();
	}


	public function createService0773(): PHPStan\BetterReflection\SourceLocator\SourceStubber\ReflectionSourceStubber
	{
		return $this->getService('0321')->create();
	}


	public function createService0774(): PHPStan\Dependency\ExportedNodeVisitor
	{
		return new PHPStan\Dependency\ExportedNodeVisitor($this->getService('0125'));
	}


	public function createService0775(): PHPStan\Reflection\BetterReflection\SourceLocator\CachingVisitor
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\CachingVisitor;
	}


	public function createService0776(): PHPStan\Reflection\Php\PhpClassReflectionExtension
	{
		return new PHPStan\Reflection\Php\PhpClassReflectionExtension(
			$this->getService('028'),
			$this->getService('033'),
			$this->getService('0444'),
			$this->getService('0429'),
			$this->getService('0332'),
			$this->getService('0777'),
			$this->getService('0778'),
			$this->getService('0339'),
			$this->getService('defaultAnalysisParser'),
			$this->getService('stubPhpDocProvider'),
			$this->getService('0334'),
			$this->getService('0310'),
			$this->getService('0328'),
			false
		);
	}


	public function createService0777(): PHPStan\Reflection\Annotations\AnnotationsMethodsClassReflectionExtension
	{
		return new PHPStan\Reflection\Annotations\AnnotationsMethodsClassReflectionExtension;
	}


	public function createService0778(): PHPStan\Reflection\Annotations\AnnotationsPropertiesClassReflectionExtension
	{
		return new PHPStan\Reflection\Annotations\AnnotationsPropertiesClassReflectionExtension;
	}


	public function createService0779(): PHPStan\Reflection\Php\UniversalObjectCratesClassReflectionExtension
	{
		return new PHPStan\Reflection\Php\UniversalObjectCratesClassReflectionExtension(
			$this->getService('reflectionProvider'),
			['stdClass'],
			$this->getService('0778')
		);
	}


	public function createService0780(): PHPStan\Reflection\Mixin\MixinMethodsClassReflectionExtension
	{
		return new PHPStan\Reflection\Mixin\MixinMethodsClassReflectionExtension([]);
	}


	public function createService0781(): PHPStan\Reflection\Mixin\MixinPropertiesClassReflectionExtension
	{
		return new PHPStan\Reflection\Mixin\MixinPropertiesClassReflectionExtension([]);
	}


	public function createService0782(): PHPStan\Reflection\Php\Soap\SoapClientMethodsClassReflectionExtension
	{
		return new PHPStan\Reflection\Php\Soap\SoapClientMethodsClassReflectionExtension;
	}


	public function createService0783(): PHPStan\Reflection\RequireExtension\RequireExtendsMethodsClassReflectionExtension
	{
		return new PHPStan\Reflection\RequireExtension\RequireExtendsMethodsClassReflectionExtension;
	}


	public function createService0784(): PHPStan\Reflection\RequireExtension\RequireExtendsPropertiesClassReflectionExtension
	{
		return new PHPStan\Reflection\RequireExtension\RequireExtendsPropertiesClassReflectionExtension;
	}


	public function createService0785(): PHPStan\Rules\Methods\MethodSignatureRule
	{
		return new PHPStan\Rules\Methods\MethodSignatureRule($this->getService('0392'), true, true);
	}


	public function createService0786(): PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension('ReflectionClass');
	}


	public function createService0787(): PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension('ReflectionClassConstant');
	}


	public function createService0788(): PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension('ReflectionFunctionAbstract');
	}


	public function createService0789(): PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension('ReflectionParameter');
	}


	public function createService0790(): PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension('ReflectionProperty');
	}


	public function createService0791(): PHPStan\Type\Php\DateTimeModifyReturnTypeExtension
	{
		return new PHPStan\Type\Php\DateTimeModifyReturnTypeExtension($this->getService('0314'), 'DateTime');
	}


	public function createService0792(): PHPStan\Type\Php\DateTimeModifyReturnTypeExtension
	{
		return new PHPStan\Type\Php\DateTimeModifyReturnTypeExtension($this->getService('0314'), 'DateTimeImmutable');
	}


	public function createService0793(): PHPStan\Reflection\PHPStan\NativeReflectionEnumReturnDynamicReturnTypeExtension
	{
		return new PHPStan\Reflection\PHPStan\NativeReflectionEnumReturnDynamicReturnTypeExtension(
			$this->getService('0314'),
			'PHPStan\Reflection\ClassReflection',
			'getNativeReflection'
		);
	}


	public function createService0794(): PHPStan\Reflection\PHPStan\NativeReflectionEnumReturnDynamicReturnTypeExtension
	{
		return new PHPStan\Reflection\PHPStan\NativeReflectionEnumReturnDynamicReturnTypeExtension(
			$this->getService('0314'),
			'PHPStan\Reflection\Php\BuiltinMethodReflection',
			'getDeclaringClass'
		);
	}


	public function createService0795(): PHPStan\Reflection\BetterReflection\Type\AdapterReflectionEnumCaseDynamicReturnTypeExtension
	{
		return new PHPStan\Reflection\BetterReflection\Type\AdapterReflectionEnumCaseDynamicReturnTypeExtension(
			$this->getService('0314'),
			'PHPStan\BetterReflection\Reflection\Adapter\ReflectionEnumBackedCase'
		);
	}


	public function createService0796(): PHPStan\Reflection\BetterReflection\Type\AdapterReflectionEnumCaseDynamicReturnTypeExtension
	{
		return new PHPStan\Reflection\BetterReflection\Type\AdapterReflectionEnumCaseDynamicReturnTypeExtension(
			$this->getService('0314'),
			'PHPStan\BetterReflection\Reflection\Adapter\ReflectionEnumUnitCase'
		);
	}


	public function createService0797(): PHPStan\Reflection\BetterReflection\SourceLocator\SymbolFinderInFiles
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\SymbolFinderInFiles($this->getService('0798'));
	}


	public function createService0798(): PHPStan\Reflection\BetterReflection\SourceLocator\PhpFileCleaner
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\PhpFileCleaner;
	}


	public function createService0799(): PHPStan\Rules\Exceptions\MissingCheckedExceptionInFunctionThrowsRule
	{
		return new PHPStan\Rules\Exceptions\MissingCheckedExceptionInFunctionThrowsRule($this->getService('0343'));
	}


	public function createService0800(): PHPStan\Rules\Exceptions\MissingCheckedExceptionInMethodThrowsRule
	{
		return new PHPStan\Rules\Exceptions\MissingCheckedExceptionInMethodThrowsRule($this->getService('0343'));
	}


	public function createService0801(): PHPStan\Rules\Exceptions\MissingCheckedExceptionInPropertyHookThrowsRule
	{
		return new PHPStan\Rules\Exceptions\MissingCheckedExceptionInPropertyHookThrowsRule($this->getService('0343'));
	}


	public function createService0802(): PHPStan\Rules\Properties\UninitializedPropertyRule
	{
		return new PHPStan\Rules\Properties\UninitializedPropertyRule($this->getService('0333'));
	}


	public function createService0803(): PHPStan\Rules\Exceptions\MethodThrowTypeCovarianceRule
	{
		return new PHPStan\Rules\Exceptions\MethodThrowTypeCovarianceRule($this->getService('0392'), true);
	}


	public function createService0804(): PHPStan\Rules\Classes\NewStaticInAbstractClassStaticMethodRule
	{
		return new PHPStan\Rules\Classes\NewStaticInAbstractClassStaticMethodRule;
	}


	public function createService0805(): PHPStan\Rules\InternalTag\RestrictedInternalClassConstantUsageExtension
	{
		return new PHPStan\Rules\InternalTag\RestrictedInternalClassConstantUsageExtension($this->getService('0401'));
	}


	public function createService0806(): PHPStan\Rules\InternalTag\RestrictedInternalClassNameUsageExtension
	{
		return new PHPStan\Rules\InternalTag\RestrictedInternalClassNameUsageExtension($this->getService('0401'));
	}


	public function createService0807(): PHPStan\Rules\InternalTag\RestrictedInternalFunctionUsageExtension
	{
		return new PHPStan\Rules\InternalTag\RestrictedInternalFunctionUsageExtension($this->getService('0401'));
	}


	public function createService0808(): PHPStan\Rules\Variables\AssignToByRefExprFromForeachRule
	{
		return new PHPStan\Rules\Variables\AssignToByRefExprFromForeachRule($this->getService('0317'));
	}


	public function createService0809(): PHPStan\Rules\InternalTag\RestrictedInternalPropertyUsageExtension
	{
		return new PHPStan\Rules\InternalTag\RestrictedInternalPropertyUsageExtension($this->getService('0401'));
	}


	public function createService0810(): PHPStan\Rules\InternalTag\RestrictedInternalMethodUsageExtension
	{
		return new PHPStan\Rules\InternalTag\RestrictedInternalMethodUsageExtension($this->getService('0401'));
	}


	public function createService0811(): PHPStan\Rules\Exceptions\TooWideFunctionThrowTypeRule
	{
		return new PHPStan\Rules\Exceptions\TooWideFunctionThrowTypeRule($this->getService('0345'));
	}


	public function createService0812(): PHPStan\Rules\Exceptions\TooWideMethodThrowTypeRule
	{
		return new PHPStan\Rules\Exceptions\TooWideMethodThrowTypeRule(
			$this->getService('0310'),
			$this->getService('0345'),
			false,
			false
		);
	}


	public function createService0813(): PHPStan\Rules\Exceptions\TooWidePropertyHookThrowTypeRule
	{
		return new PHPStan\Rules\Exceptions\TooWidePropertyHookThrowTypeRule($this->getService('0345'), false);
	}


	public function createService0814(): PHPStan\Rules\Functions\ParameterCastableToNumberRule
	{
		return new PHPStan\Rules\Functions\ParameterCastableToNumberRule(
			$this->getService('reflectionProvider'),
			$this->getService('0398'),
			$this->getService('0314')
		);
	}


	public function createService0815(): PHPStan\Rules\Functions\PrintfParameterTypeRule
	{
		return new PHPStan\Rules\Functions\PrintfParameterTypeRule(
			$this->getService('0349'),
			$this->getService('reflectionProvider'),
			$this->getService('0390'),
			true
		);
	}


	public function createService0816(): PHPStan\Rules\BooleansInConditions\BooleanRuleHelper
	{
		return new PHPStan\Rules\BooleansInConditions\BooleanRuleHelper($this->getService('0390'));
	}


	public function createService0817(): PHPStan\Rules\Operators\OperatorRuleHelper
	{
		return new PHPStan\Rules\Operators\OperatorRuleHelper($this->getService('0390'));
	}


	public function createService0818(): PHPStan\Rules\VariableVariables\VariablePropertyFetchRule
	{
		return new PHPStan\Rules\VariableVariables\VariablePropertyFetchRule($this->getService('reflectionProvider'), ['stdClass']);
	}


	public function createService0819(): PHPStan\Rules\DisallowedConstructs\DisallowedLooseComparisonRule
	{
		return new PHPStan\Rules\DisallowedConstructs\DisallowedLooseComparisonRule(false);
	}


	public function createService0820(): PHPStan\Rules\BooleansInConditions\BooleanInBooleanAndRule
	{
		return new PHPStan\Rules\BooleansInConditions\BooleanInBooleanAndRule($this->getService('0816'));
	}


	public function createService0821(): PHPStan\Rules\BooleansInConditions\BooleanInBooleanNotRule
	{
		return new PHPStan\Rules\BooleansInConditions\BooleanInBooleanNotRule($this->getService('0816'));
	}


	public function createService0822(): PHPStan\Rules\BooleansInConditions\BooleanInBooleanOrRule
	{
		return new PHPStan\Rules\BooleansInConditions\BooleanInBooleanOrRule($this->getService('0816'));
	}


	public function createService0823(): PHPStan\Rules\BooleansInConditions\BooleanInDoWhileConditionRule
	{
		return new PHPStan\Rules\BooleansInConditions\BooleanInDoWhileConditionRule($this->getService('0816'));
	}


	public function createService0824(): PHPStan\Rules\BooleansInConditions\BooleanInElseIfConditionRule
	{
		return new PHPStan\Rules\BooleansInConditions\BooleanInElseIfConditionRule($this->getService('0816'));
	}


	public function createService0825(): PHPStan\Rules\BooleansInConditions\BooleanInIfConditionRule
	{
		return new PHPStan\Rules\BooleansInConditions\BooleanInIfConditionRule($this->getService('0816'));
	}


	public function createService0826(): PHPStan\Rules\BooleansInConditions\BooleanInTernaryOperatorRule
	{
		return new PHPStan\Rules\BooleansInConditions\BooleanInTernaryOperatorRule($this->getService('0816'));
	}


	public function createService0827(): PHPStan\Rules\BooleansInConditions\BooleanInWhileConditionRule
	{
		return new PHPStan\Rules\BooleansInConditions\BooleanInWhileConditionRule($this->getService('0816'));
	}


	public function createService0828(): PHPStan\Rules\Cast\UselessCastRule
	{
		return new PHPStan\Rules\Cast\UselessCastRule(true, true);
	}


	public function createService0829(): PHPStan\Rules\Classes\RequireParentConstructCallRule
	{
		return new PHPStan\Rules\Classes\RequireParentConstructCallRule;
	}


	public function createService0830(): PHPStan\Rules\DisallowedConstructs\DisallowedBacktickRule
	{
		return new PHPStan\Rules\DisallowedConstructs\DisallowedBacktickRule;
	}


	public function createService0831(): PHPStan\Rules\DisallowedConstructs\DisallowedEmptyRule
	{
		return new PHPStan\Rules\DisallowedConstructs\DisallowedEmptyRule;
	}


	public function createService0832(): PHPStan\Rules\DisallowedConstructs\DisallowedImplicitArrayCreationRule
	{
		return new PHPStan\Rules\DisallowedConstructs\DisallowedImplicitArrayCreationRule;
	}


	public function createService0833(): PHPStan\Rules\DisallowedConstructs\DisallowedShortTernaryRule
	{
		return new PHPStan\Rules\DisallowedConstructs\DisallowedShortTernaryRule;
	}


	public function createService0834(): PHPStan\Rules\ForeachLoop\OverwriteVariablesWithForeachRule
	{
		return new PHPStan\Rules\ForeachLoop\OverwriteVariablesWithForeachRule;
	}


	public function createService0835(): PHPStan\Rules\ForLoop\OverwriteVariablesWithForLoopInitRule
	{
		return new PHPStan\Rules\ForLoop\OverwriteVariablesWithForLoopInitRule;
	}


	public function createService0836(): PHPStan\Rules\Functions\ArrayFilterStrictRule
	{
		return new PHPStan\Rules\Functions\ArrayFilterStrictRule($this->getService('reflectionProvider'), true, true, true);
	}


	public function createService0837(): PHPStan\Rules\Functions\ClosureUsesThisRule
	{
		return new PHPStan\Rules\Functions\ClosureUsesThisRule;
	}


	public function createService0838(): PHPStan\Rules\Methods\WrongCaseOfInheritedMethodRule
	{
		return new PHPStan\Rules\Methods\WrongCaseOfInheritedMethodRule;
	}


	public function createService0839(): PHPStan\Rules\Methods\IllegalConstructorMethodCallRule
	{
		return new PHPStan\Rules\Methods\IllegalConstructorMethodCallRule;
	}


	public function createService0840(): PHPStan\Rules\Methods\IllegalConstructorStaticCallRule
	{
		return new PHPStan\Rules\Methods\IllegalConstructorStaticCallRule;
	}


	public function createService0841(): PHPStan\Rules\Operators\OperandInArithmeticPostDecrementRule
	{
		return new PHPStan\Rules\Operators\OperandInArithmeticPostDecrementRule($this->getService('0817'));
	}


	public function createService0842(): PHPStan\Rules\Operators\OperandInArithmeticPostIncrementRule
	{
		return new PHPStan\Rules\Operators\OperandInArithmeticPostIncrementRule($this->getService('0817'));
	}


	public function createService0843(): PHPStan\Rules\Operators\OperandInArithmeticPreDecrementRule
	{
		return new PHPStan\Rules\Operators\OperandInArithmeticPreDecrementRule($this->getService('0817'));
	}


	public function createService0844(): PHPStan\Rules\Operators\OperandInArithmeticPreIncrementRule
	{
		return new PHPStan\Rules\Operators\OperandInArithmeticPreIncrementRule($this->getService('0817'));
	}


	public function createService0845(): PHPStan\Rules\Operators\OperandInArithmeticUnaryMinusRule
	{
		return new PHPStan\Rules\Operators\OperandInArithmeticUnaryMinusRule($this->getService('0817'));
	}


	public function createService0846(): PHPStan\Rules\Operators\OperandInArithmeticUnaryPlusRule
	{
		return new PHPStan\Rules\Operators\OperandInArithmeticUnaryPlusRule($this->getService('0817'));
	}


	public function createService0847(): PHPStan\Rules\Operators\OperandsInArithmeticAdditionRule
	{
		return new PHPStan\Rules\Operators\OperandsInArithmeticAdditionRule($this->getService('0817'));
	}


	public function createService0848(): PHPStan\Rules\Operators\OperandsInArithmeticDivisionRule
	{
		return new PHPStan\Rules\Operators\OperandsInArithmeticDivisionRule($this->getService('0817'));
	}


	public function createService0849(): PHPStan\Rules\Operators\OperandsInArithmeticExponentiationRule
	{
		return new PHPStan\Rules\Operators\OperandsInArithmeticExponentiationRule($this->getService('0817'));
	}


	public function createService0850(): PHPStan\Rules\Operators\OperandsInArithmeticModuloRule
	{
		return new PHPStan\Rules\Operators\OperandsInArithmeticModuloRule($this->getService('0817'));
	}


	public function createService0851(): PHPStan\Rules\Operators\OperandsInArithmeticMultiplicationRule
	{
		return new PHPStan\Rules\Operators\OperandsInArithmeticMultiplicationRule($this->getService('0817'));
	}


	public function createService0852(): PHPStan\Rules\Operators\OperandsInArithmeticSubtractionRule
	{
		return new PHPStan\Rules\Operators\OperandsInArithmeticSubtractionRule($this->getService('0817'));
	}


	public function createService0853(): PHPStan\Rules\StrictCalls\DynamicCallOnStaticMethodsRule
	{
		return new PHPStan\Rules\StrictCalls\DynamicCallOnStaticMethodsRule($this->getService('0390'));
	}


	public function createService0854(): PHPStan\Rules\StrictCalls\DynamicCallOnStaticMethodsCallableRule
	{
		return new PHPStan\Rules\StrictCalls\DynamicCallOnStaticMethodsCallableRule($this->getService('0390'));
	}


	public function createService0855(): PHPStan\Rules\StrictCalls\StrictFunctionCallsRule
	{
		return new PHPStan\Rules\StrictCalls\StrictFunctionCallsRule($this->getService('reflectionProvider'));
	}


	public function createService0856(): PHPStan\Rules\SwitchConditions\MatchingTypeInSwitchCaseConditionRule
	{
		return new PHPStan\Rules\SwitchConditions\MatchingTypeInSwitchCaseConditionRule($this->getService('0316'));
	}


	public function createService0857(): PHPStan\Rules\VariableVariables\VariableMethodCallRule
	{
		return new PHPStan\Rules\VariableVariables\VariableMethodCallRule;
	}


	public function createService0858(): PHPStan\Rules\VariableVariables\VariableMethodCallableRule
	{
		return new PHPStan\Rules\VariableVariables\VariableMethodCallableRule;
	}


	public function createService0859(): PHPStan\Rules\VariableVariables\VariableStaticMethodCallRule
	{
		return new PHPStan\Rules\VariableVariables\VariableStaticMethodCallRule;
	}


	public function createService0860(): PHPStan\Rules\VariableVariables\VariableStaticMethodCallableRule
	{
		return new PHPStan\Rules\VariableVariables\VariableStaticMethodCallableRule;
	}


	public function createService0861(): PHPStan\Rules\VariableVariables\VariableStaticPropertyFetchRule
	{
		return new PHPStan\Rules\VariableVariables\VariableStaticPropertyFetchRule;
	}


	public function createService0862(): PHPStan\Rules\VariableVariables\VariableVariablesRule
	{
		return new PHPStan\Rules\VariableVariables\VariableVariablesRule;
	}


	public function createService0863(): Rector\TypePerfect\Configuration
	{
		return new Rector\TypePerfect\Configuration([
			'narrow_param' => false,
			'narrow_return' => false,
			'no_mixed' => false,
			'null_over_false' => false,
			'no_mixed_property' => false,
			'no_mixed_caller' => false,
		]);
	}


	public function createService0864(): Rector\TypePerfect\NodeFinder\ClassMethodNodeFinder
	{
		return new Rector\TypePerfect\NodeFinder\ClassMethodNodeFinder($this->getService('0869'));
	}


	public function createService0865(): Rector\TypePerfect\NodeFinder\MethodCallNodeFinder
	{
		return new Rector\TypePerfect\NodeFinder\MethodCallNodeFinder($this->getService('0869'), $this->getService('0868'));
	}


	public function createService0866(): Rector\TypePerfect\NodeFinder\ReturnNodeFinder
	{
		return new Rector\TypePerfect\NodeFinder\ReturnNodeFinder;
	}


	public function createService0867(): Rector\TypePerfect\PhpDoc\ApiDocStmtAnalyzer
	{
		return new Rector\TypePerfect\PhpDoc\ApiDocStmtAnalyzer;
	}


	public function createService0868(): Rector\TypePerfect\Printer\NodeComparator
	{
		return new Rector\TypePerfect\Printer\NodeComparator($this->getService('0316'));
	}


	public function createService0869(): Rector\TypePerfect\Reflection\ReflectionParser
	{
		return new Rector\TypePerfect\Reflection\ReflectionParser;
	}


	public function createService0870(): Rector\TypePerfect\Reflection\MethodNodeAnalyser
	{
		return new Rector\TypePerfect\Reflection\MethodNodeAnalyser;
	}


	public function createService0871(): Rector\TypePerfect\Matcher\Collector\PublicClassMethodMatcher
	{
		return new Rector\TypePerfect\Matcher\Collector\PublicClassMethodMatcher;
	}


	public function createService0872(): Rector\TypePerfect\Matcher\ClassMethodCallReferenceResolver
	{
		return new Rector\TypePerfect\Matcher\ClassMethodCallReferenceResolver;
	}


	public function createService0873(): Rector\TypePerfect\Printer\CollectorMetadataPrinter
	{
		return new Rector\TypePerfect\Printer\CollectorMetadataPrinter;
	}


	public function createService0874(): Rector\TypePerfect\Guard\EmptyIssetGuard
	{
		return new Rector\TypePerfect\Guard\EmptyIssetGuard;
	}


	public function createService0875(): Rector\TypePerfect\Collector\ClassMethod\PublicClassMethodParamTypesCollector
	{
		return new Rector\TypePerfect\Collector\ClassMethod\PublicClassMethodParamTypesCollector(
			$this->getService('0867'),
			$this->getService('0871'),
			$this->getService('0873'),
			$this->getService('0863')
		);
	}


	public function createService0876(): Rector\TypePerfect\Collector\MethodCall\MethodCallArgTypesCollector
	{
		return new Rector\TypePerfect\Collector\MethodCall\MethodCallArgTypesCollector(
			$this->getService('0872'),
			$this->getService('0873'),
			$this->getService('0863')
		);
	}


	public function createService0877(): Rector\TypePerfect\Collector\MethodCallableNode\MethodCallableCollector
	{
		return new Rector\TypePerfect\Collector\MethodCallableNode\MethodCallableCollector(
			$this->getService('0872'),
			$this->getService('0863')
		);
	}


	public function createService0878(): TomasVotruba\CognitiveComplexity\DataCollector\CognitiveComplexityDataCollector
	{
		return new TomasVotruba\CognitiveComplexity\DataCollector\CognitiveComplexityDataCollector;
	}


	public function createService0879(): TomasVotruba\CognitiveComplexity\AstCognitiveComplexityAnalyzer
	{
		return new TomasVotruba\CognitiveComplexity\AstCognitiveComplexityAnalyzer(
			$this->getService('0880'),
			$this->getService('0878'),
			$this->getService('0881')
		);
	}


	public function createService0880(): TomasVotruba\CognitiveComplexity\NodeTraverser\ComplexityNodeTraverserFactory
	{
		return new TomasVotruba\CognitiveComplexity\NodeTraverser\ComplexityNodeTraverserFactory(
			$this->getService('0881'),
			$this->getService('0882')
		);
	}


	public function createService0881(): TomasVotruba\CognitiveComplexity\NodeVisitor\NestingNodeVisitor
	{
		return new TomasVotruba\CognitiveComplexity\NodeVisitor\NestingNodeVisitor($this->getService('0878'), $this->getService('0883'));
	}


	public function createService0882(): TomasVotruba\CognitiveComplexity\NodeVisitor\ComplexityNodeVisitor
	{
		return new TomasVotruba\CognitiveComplexity\NodeVisitor\ComplexityNodeVisitor(
			$this->getService('0878'),
			$this->getService('0883')
		);
	}


	public function createService0883(): TomasVotruba\CognitiveComplexity\NodeAnalyzer\ComplexityAffectingNodeFinder
	{
		return new TomasVotruba\CognitiveComplexity\NodeAnalyzer\ComplexityAffectingNodeFinder;
	}


	public function createService0884(): TomasVotruba\CognitiveComplexity\ClassReflectionParser
	{
		return new TomasVotruba\CognitiveComplexity\ClassReflectionParser;
	}


	public function createService0885(): TomasVotruba\CognitiveComplexity\Configuration
	{
		return new TomasVotruba\CognitiveComplexity\Configuration([
			'class' => 40,
			'function' => 9,
			'dependency_tree' => 150,
			'dependency_tree_types' => [],
		]);
	}


	public function createService0886(): TomasVotruba\TypeCoverage\Formatter\TypeCoverageFormatter
	{
		return new TomasVotruba\TypeCoverage\Formatter\TypeCoverageFormatter;
	}


	public function createService0887(): TomasVotruba\TypeCoverage\CollectorDataNormalizer
	{
		return new TomasVotruba\TypeCoverage\CollectorDataNormalizer;
	}


	public function createService0888(): TomasVotruba\TypeCoverage\Configuration
	{
		return new TomasVotruba\TypeCoverage\Configuration([
			'declare' => 0,
			'return_type' => 99,
			'param_type' => 99,
			'property_type' => 99,
			'constant_type' => 99,
			'print_suggestions' => true,
			'return' => null,
			'param' => null,
			'property' => null,
			'constant' => null,
			'measure' => false,
		]);
	}


	public function createService0889(): TomasVotruba\TypeCoverage\Collectors\ReturnTypeDeclarationCollector
	{
		return new TomasVotruba\TypeCoverage\Collectors\ReturnTypeDeclarationCollector;
	}


	public function createService0890(): TomasVotruba\TypeCoverage\Collectors\ParamTypeDeclarationCollector
	{
		return new TomasVotruba\TypeCoverage\Collectors\ParamTypeDeclarationCollector;
	}


	public function createService0891(): TomasVotruba\TypeCoverage\Collectors\PropertyTypeDeclarationCollector
	{
		return new TomasVotruba\TypeCoverage\Collectors\PropertyTypeDeclarationCollector;
	}


	public function createService0892(): TomasVotruba\TypeCoverage\Collectors\ConstantTypeDeclarationCollector
	{
		return new TomasVotruba\TypeCoverage\Collectors\ConstantTypeDeclarationCollector;
	}


	public function createService0893(): TomasVotruba\TypeCoverage\Collectors\DeclareCollector
	{
		return new TomasVotruba\TypeCoverage\Collectors\DeclareCollector;
	}


	public function createServiceBetterReflectionProvider(): PHPStan\Reflection\BetterReflection\BetterReflectionProvider
	{
		return new PHPStan\Reflection\BetterReflection\BetterReflectionProvider(
			$this->getService('0331'),
			$this->getService('0446'),
			$this->getService('betterReflectionReflector'),
			$this->getService('0310'),
			$this->getService('0332'),
			$this->getService('0314'),
			$this->getService('0336'),
			$this->getService('stubPhpDocProvider'),
			$this->getService('0445'),
			$this->getService('relativePathHelper'),
			$this->getService('023'),
			$this->getService('0416'),
			$this->getService('0772'),
			$this->getService('0328'),
			['stdClass']
		);
	}


	public function createServiceBetterReflectionReflector(): PHPStan\Reflection\BetterReflection\Reflector\MemoizingReflector
	{
		return new PHPStan\Reflection\BetterReflection\Reflector\MemoizingReflector($this->getService('originalBetterReflectionReflector'));
	}


	public function createServiceBetterReflectionSourceLocator(): PHPStan\BetterReflection\SourceLocator\Type\SourceLocator
	{
		return $this->getService('0319')->create();
	}


	public function createServiceCacheStorage(): PHPStan\Cache\FileCacheStorage
	{
		return new PHPStan\Cache\FileCacheStorage('/Users/sandermuller/Documents/GitHub/rector-rules/.cache/phpstan/cache/PHPStan');
	}


	public function createServiceContainer(): Container_28e671353d
	{
		return $this;
	}


	public function createServiceCurrentPhpVersionLexer(): PhpParser\Lexer
	{
		return $this->getService('011')->create();
	}


	public function createServiceCurrentPhpVersionPhpParser(): PhpParser\ParserAbstract
	{
		return $this->getService('currentPhpVersionPhpParserFactory')->create();
	}


	public function createServiceCurrentPhpVersionPhpParserFactory(): PHPStan\Parser\PhpParserFactory
	{
		return new PHPStan\Parser\PhpParserFactory($this->getService('currentPhpVersionLexer'), $this->getService('0314'));
	}


	public function createServiceCurrentPhpVersionRichParser(): PHPStan\Parser\RichParser
	{
		return new PHPStan\Parser\RichParser(
			$this->getService('currentPhpVersionPhpParser'),
			$this->getService('0765'),
			$this->getService('0119'),
			$this->getService('029')
		);
	}


	public function createServiceCurrentPhpVersionSimpleDirectParser(): PHPStan\Parser\SimpleParser
	{
		return new PHPStan\Parser\SimpleParser($this->getService('currentPhpVersionPhpParser'), $this->getService('0765'));
	}


	public function createServiceCurrentPhpVersionSimpleParser(): PHPStan\Parser\CleaningParser
	{
		return new PHPStan\Parser\CleaningParser($this->getService('currentPhpVersionSimpleDirectParser'), $this->getService('0314'));
	}


	public function createServiceDefaultAnalysisParser(): PHPStan\Parser\CachedParser
	{
		return new PHPStan\Parser\CachedParser($this->getService('pathRoutingParser'), 256);
	}


	public function createServiceErrorFormatter__checkstyle(): PHPStan\Command\ErrorFormatter\CheckstyleErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\CheckstyleErrorFormatter($this->getService('simpleRelativePathHelper'));
	}


	public function createServiceErrorFormatter__github(): PHPStan\Command\ErrorFormatter\GithubErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\GithubErrorFormatter($this->getService('simpleRelativePathHelper'));
	}


	public function createServiceErrorFormatter__gitlab(): PHPStan\Command\ErrorFormatter\GitlabErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\GitlabErrorFormatter($this->getService('simpleRelativePathHelper'));
	}


	public function createServiceErrorFormatter__json(): PHPStan\Command\ErrorFormatter\JsonErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\JsonErrorFormatter(false);
	}


	public function createServiceErrorFormatter__junit(): PHPStan\Command\ErrorFormatter\JunitErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\JunitErrorFormatter($this->getService('simpleRelativePathHelper'));
	}


	public function createServiceErrorFormatter__prettyJson(): PHPStan\Command\ErrorFormatter\JsonErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\JsonErrorFormatter(true);
	}


	public function createServiceErrorFormatter__raw(): PHPStan\Command\ErrorFormatter\RawErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\RawErrorFormatter;
	}


	public function createServiceErrorFormatter__table(): PHPStan\Command\ErrorFormatter\TableErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\TableErrorFormatter(
			$this->getService('relativePathHelper'),
			$this->getService('simpleRelativePathHelper'),
			$this->getService('0424'),
			true,
			null,
			null,
			'max'
		);
	}


	public function createServiceErrorFormatter__teamcity(): PHPStan\Command\ErrorFormatter\TeamcityErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\TeamcityErrorFormatter($this->getService('simpleRelativePathHelper'));
	}


	public function createServiceExceptionTypeResolver(): PHPStan\Rules\Exceptions\ExceptionTypeResolver
	{
		return $this->getService('0344');
	}


	public function createServiceFileExcluderAnalyse(): PHPStan\File\FileExcluder
	{
		return $this->getService('0418')->createAnalyseFileExcluder();
	}


	public function createServiceFileExcluderScan(): PHPStan\File\FileExcluder
	{
		return $this->getService('0418')->createScanFileExcluder();
	}


	public function createServiceFileFinderAnalyse(): PHPStan\File\FileFinder
	{
		return new PHPStan\File\FileFinder($this->getService('fileExcluderAnalyse'), $this->getService('0416'), ['php']);
	}


	public function createServiceFileFinderScan(): PHPStan\File\FileFinder
	{
		return new PHPStan\File\FileFinder($this->getService('fileExcluderScan'), $this->getService('0416'), ['php']);
	}


	public function createServiceFreshStubParser(): PHPStan\Parser\StubParser
	{
		return new PHPStan\Parser\StubParser($this->getService('php8PhpParser'), $this->getService('0765'));
	}


	public function createServiceNodeScopeResolverReflector(): PHPStan\Reflection\BetterReflection\Reflector\MemoizingReflector
	{
		return $this->getService('betterReflectionReflector');
	}


	public function createServiceOriginalBetterReflectionReflector(): PHPStan\BetterReflection\Reflector\DefaultReflector
	{
		return new PHPStan\BetterReflection\Reflector\DefaultReflector($this->getService('betterReflectionSourceLocator'));
	}


	public function createServiceParentDirectoryRelativePathHelper(): PHPStan\File\ParentDirectoryRelativePathHelper
	{
		return new PHPStan\File\ParentDirectoryRelativePathHelper('/Users/sandermuller/Documents/GitHub/rector-rules');
	}


	public function createServicePathRoutingParser(): PHPStan\Parser\PathRoutingParser
	{
		return new PHPStan\Parser\PathRoutingParser(
			$this->getService('0416'),
			$this->getService('currentPhpVersionRichParser'),
			$this->getService('currentPhpVersionSimpleParser'),
			$this->getService('php8Parser'),
			$this->getParameter('singleReflectionFile')
		);
	}


	public function createServicePhp8Lexer(): PhpParser\Lexer\Emulative
	{
		return $this->getService('011')->createEmulative();
	}


	public function createServicePhp8Parser(): PHPStan\Parser\SimpleParser
	{
		return new PHPStan\Parser\SimpleParser($this->getService('php8PhpParser'), $this->getService('0765'));
	}


	public function createServicePhp8PhpParser(): PhpParser\Parser\Php8
	{
		return new PhpParser\Parser\Php8($this->getService('php8Lexer'));
	}


	public function createServicePhpParserDecorator(): PHPStan\Parser\PhpParserDecorator
	{
		return new PHPStan\Parser\PhpParserDecorator($this->getService('defaultAnalysisParser'));
	}


	public function createServicePhpstanDiagnoseExtension(): PHPStan\Diagnose\PHPStanDiagnoseExtension
	{
		return new PHPStan\Diagnose\PHPStanDiagnoseExtension(
			$this->getService('0314'),
			null,
			$this->getService('0416'),
			['/Users/sandermuller/Documents/GitHub/rector-rules'],
			[
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/parametersSchema.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.levelmax.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level10.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level9.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level8.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level7.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level6.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level5.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level4.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level3.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level2.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level1.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level0.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan-strict-rules/rules.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/rector/type-perfect/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/tomasvotruba/cognitive-complexity/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/tomasvotruba/type-coverage/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/phpstan.neon.dist',
			],
			$this->getService('0315')
		);
	}


	public function createServiceReflectionProvider(): PHPStan\Reflection\ReflectionProvider
	{
		return $this->getService('reflectionProviderFactory')->create();
	}


	public function createServiceReflectionProviderFactory(): PHPStan\Reflection\ReflectionProvider\ReflectionProviderFactory
	{
		return new PHPStan\Reflection\ReflectionProvider\ReflectionProviderFactory($this->getService('betterReflectionProvider'));
	}


	public function createServiceRegistry(): PHPStan\Rules\LazyRegistry
	{
		return new PHPStan\Rules\LazyRegistry($this->getService('0119'));
	}


	public function createServiceRelativePathHelper(): PHPStan\File\FuzzyRelativePathHelper
	{
		return new PHPStan\File\FuzzyRelativePathHelper(
			$this->getService('parentDirectoryRelativePathHelper'),
			'/Users/sandermuller/Documents/GitHub/rector-rules',
			$this->getParameter('analysedPaths')
		);
	}


	public function createServiceRules__0(): Rector\TypePerfect\Rules\NoParamTypeRemovalRule
	{
		return new Rector\TypePerfect\Rules\NoParamTypeRemovalRule($this->getService('0870'));
	}


	public function createServiceRules__1(): Rector\TypePerfect\Rules\NoArrayAccessOnObjectRule
	{
		return new Rector\TypePerfect\Rules\NoArrayAccessOnObjectRule;
	}


	public function createServiceRules__10(): TomasVotruba\CognitiveComplexity\Rules\ClassLikeCognitiveComplexityRule
	{
		return new TomasVotruba\CognitiveComplexity\Rules\ClassLikeCognitiveComplexityRule(
			$this->getService('0879'),
			$this->getService('0885')
		);
	}


	public function createServiceRules__11(): TomasVotruba\CognitiveComplexity\Rules\FunctionLikeCognitiveComplexityRule
	{
		return new TomasVotruba\CognitiveComplexity\Rules\FunctionLikeCognitiveComplexityRule(
			$this->getService('0879'),
			$this->getService('0885')
		);
	}


	public function createServiceRules__12(): TomasVotruba\CognitiveComplexity\Rules\ClassDependencyTreeRule
	{
		return new TomasVotruba\CognitiveComplexity\Rules\ClassDependencyTreeRule(
			$this->getService('0879'),
			$this->getService('0884'),
			$this->getService('0885'),
			$this->getService('reflectionProvider')
		);
	}


	public function createServiceRules__13(): TomasVotruba\TypeCoverage\Rules\ParamTypeCoverageRule
	{
		return new TomasVotruba\TypeCoverage\Rules\ParamTypeCoverageRule(
			$this->getService('0886'),
			$this->getService('0888'),
			$this->getService('0887')
		);
	}


	public function createServiceRules__14(): TomasVotruba\TypeCoverage\Rules\ReturnTypeCoverageRule
	{
		return new TomasVotruba\TypeCoverage\Rules\ReturnTypeCoverageRule(
			$this->getService('0886'),
			$this->getService('0888'),
			$this->getService('0887')
		);
	}


	public function createServiceRules__15(): TomasVotruba\TypeCoverage\Rules\PropertyTypeCoverageRule
	{
		return new TomasVotruba\TypeCoverage\Rules\PropertyTypeCoverageRule(
			$this->getService('0886'),
			$this->getService('0888'),
			$this->getService('0887')
		);
	}


	public function createServiceRules__16(): TomasVotruba\TypeCoverage\Rules\ConstantTypeCoverageRule
	{
		return new TomasVotruba\TypeCoverage\Rules\ConstantTypeCoverageRule(
			$this->getService('0886'),
			$this->getService('0888'),
			$this->getService('0887')
		);
	}


	public function createServiceRules__17(): TomasVotruba\TypeCoverage\Rules\DeclareCoverageRule
	{
		return new TomasVotruba\TypeCoverage\Rules\DeclareCoverageRule($this->getService('0888'));
	}


	public function createServiceRules__2(): Rector\TypePerfect\Rules\NoIssetOnObjectRule
	{
		return new Rector\TypePerfect\Rules\NoIssetOnObjectRule($this->getService('0874'));
	}


	public function createServiceRules__3(): Rector\TypePerfect\Rules\NoEmptyOnObjectRule
	{
		return new Rector\TypePerfect\Rules\NoEmptyOnObjectRule($this->getService('0874'));
	}


	public function createServiceRules__4(): Rector\TypePerfect\Rules\NarrowPublicClassMethodParamTypeRule
	{
		return new Rector\TypePerfect\Rules\NarrowPublicClassMethodParamTypeRule($this->getService('0863'));
	}


	public function createServiceRules__5(): Rector\TypePerfect\Rules\NarrowPrivateClassMethodParamTypeRule
	{
		return new Rector\TypePerfect\Rules\NarrowPrivateClassMethodParamTypeRule(
			$this->getService('0863'),
			$this->getService('0865'),
			$this->getService('0864')
		);
	}


	public function createServiceRules__6(): Rector\TypePerfect\Rules\NarrowReturnObjectTypeRule
	{
		return new Rector\TypePerfect\Rules\NarrowReturnObjectTypeRule(
			$this->getService('0866'),
			$this->getService('0870'),
			$this->getService('0863')
		);
	}


	public function createServiceRules__7(): Rector\TypePerfect\Rules\NoMixedPropertyFetcherRule
	{
		return new Rector\TypePerfect\Rules\NoMixedPropertyFetcherRule($this->getService('0316'), $this->getService('0863'));
	}


	public function createServiceRules__8(): Rector\TypePerfect\Rules\NoMixedMethodCallerRule
	{
		return new Rector\TypePerfect\Rules\NoMixedMethodCallerRule($this->getService('0316'), $this->getService('0863'));
	}


	public function createServiceRules__9(): Rector\TypePerfect\Rules\ReturnNullOverFalseRule
	{
		return new Rector\TypePerfect\Rules\ReturnNullOverFalseRule($this->getService('0863'));
	}


	public function createServiceSimpleRelativePathHelper(): PHPStan\File\SimpleRelativePathHelper
	{
		return new PHPStan\File\SimpleRelativePathHelper('/Users/sandermuller/Documents/GitHub/rector-rules');
	}


	public function createServiceStubFileTypeMapper(): PHPStan\Type\FileTypeMapper
	{
		return new PHPStan\Type\FileTypeMapper(
			$this->getService('0334'),
			$this->getService('stubParser'),
			$this->getService('0435'),
			$this->getService('0425'),
			$this->getService('023'),
			$this->getService('0416'),
			$this->getService('0439'),
			2048,
			2048
		);
	}


	public function createServiceStubParser(): PHPStan\Parser\CachedParser
	{
		return new PHPStan\Parser\CachedParser($this->getService('freshStubParser'), 256);
	}


	public function createServiceStubPhpDocProvider(): PHPStan\PhpDoc\StubPhpDocProvider
	{
		return new PHPStan\PhpDoc\StubPhpDocProvider(
			$this->getService('stubParser'),
			$this->getService('stubFileTypeMapper'),
			$this->getService('0432')
		);
	}


	public function createServiceTypeSpecifier(): PHPStan\Analyser\TypeSpecifier
	{
		return $this->getService('typeSpecifierFactory')->create();
	}


	public function createServiceTypeSpecifierFactory(): PHPStan\Analyser\TypeSpecifierFactory
	{
		return new PHPStan\Analyser\TypeSpecifierFactory($this->getService('0119'));
	}


	public function initialize(): void
	{
	}


	protected function getStaticParameters(): array
	{
		return [
			'bootstrapFiles' => [
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionUnionType.php',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionAttribute.php',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/Attribute85.php',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionIntersectionType.php',
			],
			'excludePaths' => ['analyseAndScan' => [], 'analyse' => []],
			'level' => 'max',
			'paths' => ['/Users/sandermuller/Documents/GitHub/rector-rules/src'],
			'exceptions' => [
				'implicitThrows' => true,
				'reportUncheckedExceptionDeadCatch' => true,
				'uncheckedExceptionRegexes' => [],
				'uncheckedExceptionClasses' => [],
				'checkedExceptionRegexes' => [],
				'checkedExceptionClasses' => [],
				'check' => [
					'missingCheckedExceptionInThrows' => false,
					'tooWideThrowType' => true,
					'tooWideImplicitThrowType' => false,
					'throwTypeCovariance' => false,
				],
			],
			'featureToggles' => [
				'bleedingEdge' => false,
				'checkNonStringableDynamicAccess' => false,
				'checkParameterCastableToNumberFunctions' => false,
				'skipCheckGenericClasses' => ['DOMNamedNodeMap'],
				'stricterFunctionMap' => false,
				'reportPreciseLineForUnusedFunctionParameter' => false,
				'checkPrintfParameterTypes' => false,
				'internalTag' => false,
				'newStaticInAbstractClassStaticMethod' => false,
				'checkExtensionsForComparisonOperators' => false,
				'checkGenericIterableClasses' => false,
				'reportTooWideBool' => false,
				'rawMessageInBaseline' => false,
				'reportNestedTooWideType' => false,
				'assignToByRefForeachExpr' => false,
				'curlSetOptArrayTypes' => false,
			],
			'fileExtensions' => ['php'],
			'checkAdvancedIsset' => true,
			'reportAlwaysTrueInLastCondition' => false,
			'checkClassCaseSensitivity' => true,
			'checkExplicitMixed' => true,
			'checkImplicitMixed' => true,
			'checkFunctionArgumentTypes' => true,
			'checkFunctionNameCase' => true,
			'checkInternalClassCaseSensitivity' => true,
			'checkMissingCallableSignature' => false,
			'checkMissingVarTagTypehint' => true,
			'checkArgumentsPassedByReference' => true,
			'checkMaybeUndefinedVariables' => true,
			'checkNullables' => true,
			'checkThisOnly' => false,
			'checkUnionTypes' => true,
			'checkBenevolentUnionTypes' => false,
			'checkExplicitMixedMissingReturn' => true,
			'checkPhpDocMissingReturn' => true,
			'checkPhpDocMethodSignatures' => true,
			'checkExtraArguments' => true,
			'checkMissingTypehints' => true,
			'checkTooWideParameterOutInProtectedAndPublicMethods' => false,
			'checkTooWideReturnTypesInProtectedAndPublicMethods' => false,
			'checkTooWideThrowTypesInProtectedAndPublicMethods' => false,
			'checkUninitializedProperties' => false,
			'checkDynamicProperties' => true,
			'strictRulesInstalled' => true,
			'deprecationRulesInstalled' => false,
			'inferPrivatePropertyTypeFromConstructor' => false,
			'checkStrictPrintfPlaceholderTypes' => true,
			'reportMaybes' => true,
			'reportMaybesInMethodSignatures' => true,
			'reportMaybesInPropertyPhpDocTypes' => true,
			'reportStaticMethodSignatures' => true,
			'reportWrongPhpDocTypeInVarTag' => true,
			'reportAnyTypeWideningInVarTag' => false,
			'reportNonIntStringArrayKey' => false,
			'reportPossiblyNonexistentGeneralArrayOffset' => false,
			'reportPossiblyNonexistentConstantArrayOffset' => false,
			'checkMissingOverrideMethodAttribute' => false,
			'checkMissingOverridePropertyAttribute' => null,
			'mixinExcludeClasses' => [],
			'scanFiles' => [],
			'scanDirectories' => [],
			'parallel' => [
				'jobSize' => 20,
				'processTimeout' => 600.0,
				'maximumNumberOfProcesses' => 8,
				'minimumNumberOfJobsPerProcess' => 2,
				'buffer' => 134217728,
				'loadLimit' => 1.0,
			],
			'phpVersion' => null,
			'polluteScopeWithLoopInitialAssignments' => false,
			'polluteScopeWithAlwaysIterableForeach' => false,
			'polluteScopeWithBlock' => false,
			'propertyAlwaysWrittenTags' => [],
			'propertyAlwaysReadTags' => [],
			'additionalConstructors' => [],
			'treatPhpDocTypesAsCertain' => true,
			'usePathConstantsAsConstantString' => false,
			'rememberPossiblyImpureFunctionValues' => true,
			'tips' => ['discoveringSymbols' => true, 'treatPhpDocTypesAsCertain' => true, 'possiblyImpure' => true],
			'tipsOfTheDay' => true,
			'reportMagicMethods' => true,
			'reportMagicProperties' => true,
			'ignoreErrors' => [],
			'internalErrorsCountLimit' => 50,
			'cache' => [
				'nodesByStringCountMax' => 256,
				'resolvedPhpDocBlockCacheCountMax' => 2048,
				'nameScopeMapMemoryCacheCountMax' => 2048,
			],
			'reportUnmatchedIgnoredErrors' => true,
			'reportIgnoresWithoutComments' => false,
			'typeAliases' => [],
			'universalObjectCratesClasses' => ['stdClass'],
			'stubFiles' => [
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/Redis.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionAttribute.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionClassConstant.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionFunctionAbstract.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionMethod.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionParameter.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionProperty.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/iterable.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ArrayObject.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/WeakReference.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ext-ds.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ImagickPixel.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/PDOStatement.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/date.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ibm_db2.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/mysqli.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/zip.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/dom.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/spl.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/SplObjectStorage.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/Exception.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/arrayFunctions.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/core.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/typeCheckingFunctions.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/Countable.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/file.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/stream_socket_client.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/stream_socket_server.stub',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/ctype.stub',
			],
			'earlyTerminatingMethodCalls' => [],
			'earlyTerminatingFunctionCalls' => [],
			'resultCachePath' => '/Users/sandermuller/Documents/GitHub/rector-rules/.cache/phpstan/resultCache.php',
			'resultCacheSkipIfOlderThanDays' => 7,
			'resultCacheChecksProjectExtensionFilesDependencies' => false,
			'dynamicConstantNames' => [
				'ICONV_IMPL',
				'LIBXML_VERSION',
				'LIBXML_DOTTED_VERSION',
				'Memcached::HAVE_ENCODING',
				'Memcached::HAVE_IGBINARY',
				'Memcached::HAVE_JSON',
				'Memcached::HAVE_MSGPACK',
				'Memcached::HAVE_SASL',
				'Memcached::HAVE_SESSION',
				'PHP_VERSION',
				'PHP_MAJOR_VERSION',
				'PHP_MINOR_VERSION',
				'PHP_RELEASE_VERSION',
				'PHP_VERSION_ID',
				'PHP_EXTRA_VERSION',
				'PHP_WINDOWS_VERSION_MAJOR',
				'PHP_WINDOWS_VERSION_MINOR',
				'PHP_WINDOWS_VERSION_BUILD',
				'PHP_ZTS',
				'PHP_DEBUG',
				'PHP_MAXPATHLEN',
				'PHP_OS',
				'PHP_OS_FAMILY',
				'PHP_SAPI',
				'PHP_EOL',
				'PHP_INT_MAX',
				'PHP_INT_MIN',
				'PHP_INT_SIZE',
				'PHP_FLOAT_DIG',
				'PHP_FLOAT_EPSILON',
				'PHP_FLOAT_MIN',
				'PHP_FLOAT_MAX',
				'DEFAULT_INCLUDE_PATH',
				'PEAR_INSTALL_DIR',
				'PEAR_EXTENSION_DIR',
				'PHP_EXTENSION_DIR',
				'PHP_PREFIX',
				'PHP_BINDIR',
				'PHP_BINARY',
				'PHP_MANDIR',
				'PHP_LIBDIR',
				'PHP_DATADIR',
				'PHP_SYSCONFDIR',
				'PHP_LOCALSTATEDIR',
				'PHP_CONFIG_FILE_PATH',
				'PHP_CONFIG_FILE_SCAN_DIR',
				'PHP_SHLIB_SUFFIX',
				'PHP_FD_SETSIZE',
				'OPENSSL_VERSION_NUMBER',
				'ZEND_DEBUG_BUILD',
				'ZEND_THREAD_SAFE',
				'E_ALL',
			],
			'customRulesetUsed' => false,
			'editorUrl' => null,
			'editorUrlTitle' => null,
			'errorFormat' => null,
			'sourceLocatorPlaygroundMode' => false,
			'__validate' => true,
			'parametersNotInvalidatingCache' => [
				['parameters', 'editorUrl'],
				['parameters', 'editorUrlTitle'],
				['parameters', 'errorFormat'],
				['parameters', 'ignoreErrors'],
				['parameters', 'reportUnmatchedIgnoredErrors'],
				['parameters', 'tipsOfTheDay'],
				['parameters', 'parallel'],
				['parameters', 'internalErrorsCountLimit'],
				['parameters', 'cache'],
				['parameters', 'memoryLimitFile'],
				['parameters', 'pro'],
				'parametersSchema',
			],
			'strictRules' => [
				'allRules' => true,
				'disallowedLooseComparison' => true,
				'booleansInConditions' => true,
				'booleansInLoopConditions' => [true, false],
				'uselessCast' => true,
				'requireParentConstructorCall' => true,
				'disallowedBacktick' => true,
				'disallowedEmpty' => true,
				'disallowedImplicitArrayCreation' => true,
				'disallowedShortTernary' => true,
				'overwriteVariablesWithLoop' => true,
				'closureUsesThis' => true,
				'matchingInheritedMethodNames' => true,
				'numericOperandsInArithmeticOperators' => true,
				'strictFunctionCalls' => true,
				'dynamicCallOnStaticMethod' => true,
				'switchConditionsMatchingType' => true,
				'noVariableVariables' => true,
				'strictArrayFilter' => true,
				'illegalConstructorMethodCall' => true,
			],
			'type_perfect' => [
				'narrow_param' => false,
				'narrow_return' => false,
				'no_mixed' => false,
				'null_over_false' => false,
				'no_mixed_property' => false,
				'no_mixed_caller' => false,
			],
			'cognitive_complexity' => ['class' => 40, 'function' => 9, 'dependency_tree' => 150, 'dependency_tree_types' => []],
			'type_coverage' => [
				'declare' => 0,
				'return_type' => 99,
				'param_type' => 99,
				'property_type' => 99,
				'constant_type' => 99,
				'print_suggestions' => true,
				'return' => null,
				'param' => null,
				'property' => null,
				'constant' => null,
				'measure' => false,
			],
			'tmpDir' => '/Users/sandermuller/Documents/GitHub/rector-rules/.cache/phpstan',
			'debugMode' => true,
			'productionMode' => false,
			'tempDir' => '/Users/sandermuller/Documents/GitHub/rector-rules/.cache/phpstan',
			'rootDir' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan',
			'currentWorkingDirectory' => '/Users/sandermuller/Documents/GitHub/rector-rules',
			'cliArgumentsVariablesRegistered' => false,
			'additionalConfigFiles' => [
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.levelmax.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/extension-installer/src/../../phpstan-strict-rules/rules.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/extension-installer/src/../../../rector/type-perfect/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/extension-installer/src/../../../tomasvotruba/cognitive-complexity/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/extension-installer/src/../../../tomasvotruba/type-coverage/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/phpstan.neon.dist',
			],
			'allConfigFiles' => [
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/parametersSchema.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.levelmax.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level10.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level9.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level8.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level7.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level6.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level5.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level4.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level3.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level2.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level1.neon',
				'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/conf/config.level0.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan-strict-rules/rules.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/rector/type-perfect/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/tomasvotruba/cognitive-complexity/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/vendor/tomasvotruba/type-coverage/config/extension.neon',
				'/Users/sandermuller/Documents/GitHub/rector-rules/phpstan.neon.dist',
			],
			'composerAutoloaderProjectPaths' => ['/Users/sandermuller/Documents/GitHub/rector-rules'],
			'generateBaselineFile' => null,
			'usedLevel' => 'max',
			'cliAutoloadFile' => null,
			'env' => [
				'COMMAND_MODE' => 'unix2003',
				'SHELL' => '/bin/zsh',
				'TMPDIR' => '/var/folders/gs/thvp2qg113q3n6lgp3t3jrr40000gn/T/',
				'__CFBundleIdentifier' => 'com.jetbrains.PhpStorm',
				'TOOLBOX_VERSION' => '3.4.1.78303',
				'HOME' => '/Users/sandermuller',
				'SSH_AUTH_SOCK' => '/private/tmp/com.apple.launchd.fV8E3DTP5j/Listeners',
				'XPC_SERVICE_NAME' => '0',
				'PATH' => '/Users/sandermuller/Library/Application Support/Herd/bin:/Users/sandermuller/.bun/bin:/Users/sandermuller/.local/bin:/Users/sandermuller/google-cloud-sdk/bin:/Users/sandermuller/Library/Application Support/Herd/bin/:/Users/sandermuller/Library/Application Support/Herd/config/nvm/versions/node/v22.22.0/bin:/opt/homebrew/bin:/opt/homebrew/sbin:/usr/local/bin:/System/Cryptexes/App/usr/bin:/usr/bin:/bin:/usr/sbin:/sbin:/var/run/com.apple.security.cryptexd/codex.system/bootstrap/usr/local/bin:/var/run/com.apple.security.cryptexd/codex.system/bootstrap/usr/bin:/var/run/com.apple.security.cryptexd/codex.system/bootstrap/usr/appleinternal/bin:/opt/pmk/env/global/bin:/Library/Apple/usr/bin:/Users/sandermuller/Documents/GitHub/hihaho/node_modules/.bin:/Users/sandermuller/Library/Application Support/JetBrains/Toolbox/scripts:/Users/sandermuller/.claude/plugins/cache/claude-plugins-official/php-lsp/1.0.0/bin:/Users/sandermuller/.claude/plugins/cache/claude-plugins-official/context7/unknown/bin:/Users/sandermuller/.claude/plugins/cache/claude-plugins-official/typescript-lsp/1.0.0/bin:/Users/sandermuller/.claude/plugins/cache/claude-plugins-official/security-guidance/unknown/bin:/Users/sandermuller/.claude/plugins/cache/laravel/laravel-simplifier/1.0.0/bin',
				'LOGNAME' => 'sandermuller',
				'USER' => 'sandermuller',
				'OSLogRateLimit' => '64',
				'XPC_FLAGS' => '0x0',
				'__CF_USER_TEXT_ENCODING' => '0x1F5:0x0:0x0',
				'TERM' => 'xterm-256color',
				'ENABLE_IDE_INTEGRATION' => 'true',
				'FIG_TERM' => '1',
				'PROCESS_LAUNCHED_BY_Q' => '1',
				'TERMINAL_EMULATOR' => 'JetBrains-JediTerm',
				'CLAUDE_CODE_SSE_PORT' => '49539',
				'PROCESS_LAUNCHED_BY_CW' => '1',
				'PYTHONUNBUFFERED' => '1',
				'TERM_SESSION_ID' => 'c7fa996c-e0b3-453e-be3c-2ef5584c93e2',
				'LC_CTYPE' => 'UTF-8',
				'SHLVL' => '2',
				'PWD' => '/Users/sandermuller/Documents/GitHub/rector-rules',
				'OLDPWD' => '/Users/sandermuller/Documents/GitHub/hihaho',
				'HIHAHO_REGISTRY_TOKEN' => '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',
				'JIRA_USERNAME' => 'sander@hihaho.com',
				'JIRA_API_TOKEN' => 'ATATT3xFfGF0qWpita6ymjsELPLmjuoXbJeafrbXeckDr8skkubZ56NMsEsdqTzSofMqqN-ueXf7Bkd-4b44L2x2oMdrpRoH_0ZMvL6QDzeDRVRsQztHxHkxpf3Kpy31cZul9bbhnwZU8gQBxmWTCKp5tfaN1wB39Ht6ksAgFcxM1Jgvpf4K1d8=D1794BFD',
				'GITHUB_PAT' => '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',
				'LANG' => 'C.UTF-8',
				'HOMEBREW_PREFIX' => '/opt/homebrew',
				'HOMEBREW_CELLAR' => '/opt/homebrew/Cellar',
				'HOMEBREW_REPOSITORY' => '/opt/homebrew',
				'INFOPATH' => '/opt/homebrew/share/info:',
				'NVM_DIR' => '/Users/sandermuller/Library/Application Support/Herd/config/nvm',
				'HERD_PHP_83_INI_SCAN_DIR' => '/Users/sandermuller/Library/Application Support/Herd/config/php/83/',
				'PHP_BINARY' => '/Users/sandermuller/Library/Application Support/Herd/bin//php',
				'COMPOSER_DEV_MODE' => '1',
				'HERD_PHP_82_INI_SCAN_DIR' => '/Users/sandermuller/Library/Application Support/Herd/config/php/82/',
				'HERD_PHP_84_INI_SCAN_DIR' => '/Users/sandermuller/Library/Application Support/Herd/config/php/84/',
				'HERD_PHP_74_INI_SCAN_DIR' => '/Users/sandermuller/Library/Application Support/Herd/config/php/74/',
				'HERD_PHP_85_INI_SCAN_DIR' => '/Users/sandermuller/Library/Application Support/Herd/config/php/85/',
				'BUN_INSTALL' => '/Users/sandermuller/.bun',
				'NoDefaultCurrentDirectoryInExePath' => '1',
				'COREPACK_ENABLE_AUTO_PIN' => '0',
				'CLAUDE_CODE_ENTRYPOINT' => 'cli',
				'AIKIDO_API_KEY' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhaWtpZG8uZGV2IiwiYXVkIjoiaWRlLmFpa2lkbyIsImlhdCI6MTc3NDk2OTcyMywibmJmIjoxNzc0OTY5NzEzLCJleHAiOjI1NjM4ODgxMjMsImlzX2lkZV90b2tlbiI6dHJ1ZSwidXNlcl9pZCI6MTUzMDk1LCJ0b2tlbl9pZCI6MTg5MDYsInJlZ2lvbiI6ImV1In0.MdfIh_VvWccRatyJO9Ol8OhkPWIP7ONbD9yC8J9kiqs',
				'ENABLE_LSP_TOOL' => '1',
				'OTEL_EXPORTER_OTLP_METRICS_TEMPORALITY_PREFERENCE' => 'delta',
				'GIT_EDITOR' => 'true',
				'CLAUDECODE' => '1',
				'CLAUDE_CODE_EXECPATH' => '/Users/sandermuller/.local/share/claude/versions/2.1.101',
				'_' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/bin/phpstan',
				'LINES' => '50',
				'COLUMNS' => '80',
				'SHELL_VERBOSITY' => '0',
			],
		];
	}


	protected function getDynamicParameter($key)
	{
		switch (true) {
			case $key === 'singleReflectionFile': return null;
			case $key === 'singleReflectionInsteadOfFile': return null;
			case $key === 'analysedPaths': return null;
			case $key === 'analysedPathsFromConfig': return null;
			case $key === 'sysGetTempDir': return sys_get_temp_dir();
			case $key === 'pro': return [
			'dnsServers' => ['1.1.1.2'],
			'tmpDir' => ($this->getParameter('sysGetTempDir')) . '/phpstan-fixer',
		];
			default: return parent::getDynamicParameter($key);
		};
	}


	public function getParameters(): array
	{
		array_map(function ($key) { $this->getParameter($key); }, [
			'singleReflectionFile',
			'singleReflectionInsteadOfFile',
			'analysedPaths',
			'analysedPathsFromConfig',
			'sysGetTempDir',
			'pro',
		]);
		return parent::getParameters();
	}
}
