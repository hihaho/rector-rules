<?php declare(strict_types = 1);

// odsl-/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/NormalizeRoutePathRector.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Hihaho\RectorRules\Rector\Routing\NormalizeRoutePathRector
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.5.4-93461ee459aae7836991d852ffd57fb5d1c9728576eda8bcbb98a8b8ca87696d',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
        'filename' => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/NormalizeRoutePathRector.php',
      ),
    ),
    'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
    'name' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
    'shortName' => 'NormalizeRoutePathRector',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * @see NormalizeRoutePathRectorTest
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 19,
    'endLine' => 102,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Rector\\Rector\\AbstractRector',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Hihaho\\RectorRules\\Rector\\Routing\\Concerns\\ChecksRouteContext',
    ),
    'immediateConstants' => 
    array (
      'ROUTE_METHODS' => 
      array (
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
        'name' => 'ROUTE_METHODS',
        'modifiers' => 4,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'value' => 
        array (
          'code' => '[\'get\', \'post\', \'put\', \'patch\', \'delete\', \'any\', \'head\']',
          'attributes' => 
          array (
            'startLine' => 24,
            'endLine' => 24,
            'startTokenPos' => 86,
            'startFilePos' => 699,
            'endTokenPos' => 106,
            'endFilePos' => 754,
          ),
        ),
        'docComment' => '/** @var list<string> */',
        'attributes' => 
        array (
        ),
        'startLine' => 24,
        'endLine' => 24,
        'startColumn' => 5,
        'endColumn' => 97,
      ),
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'getRuleDefinition' => 
      array (
        'name' => 'getRuleDefinition',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 26,
        'endLine' => 45,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
        'aliasName' => NULL,
      ),
      'getNodeTypes' => 
      array (
        'name' => 'getNodeTypes',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 47,
        'endLine' => 50,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
        'aliasName' => NULL,
      ),
      'refactor' => 
      array (
        'name' => 'refactor',
        'parameters' => 
        array (
          'node' => 
          array (
            'name' => 'node',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'PhpParser\\Node',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 52,
            'endLine' => 52,
            'startColumn' => 30,
            'endColumn' => 39,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionUnionType',
          'data' => 
          array (
            'types' => 
            array (
              0 => 
              array (
                'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                'data' => 
                array (
                  'name' => 'PhpParser\\Node',
                  'isIdentifier' => false,
                ),
              ),
              1 => 
              array (
                'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                'data' => 
                array (
                  'name' => 'null',
                  'isIdentifier' => true,
                ),
              ),
            ),
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 52,
        'endLine' => 101,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
        'aliasName' => NULL,
      ),
    ),
    'traitsData' => 
    array (
      'aliases' => 
      array (
      ),
      'modifiers' => 
      array (
      ),
      'precedences' => 
      array (
      ),
      'hashes' => 
      array (
      ),
    ),
  ),
));