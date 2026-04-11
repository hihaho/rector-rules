<?php declare(strict_types = 1);

// odsl-/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/RemoveAfterColumnPositioningRector.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Hihaho\RectorRules\Rector\Migration\RemoveAfterColumnPositioningRector
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.5.4-a7a0a4aaca1d27698bf955d824e7abfcd396037e43ccb14f466c52fa3a299040',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
        'filename' => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/RemoveAfterColumnPositioningRector.php',
      ),
    ),
    'namespace' => 'Hihaho\\RectorRules\\Rector\\Migration',
    'name' => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
    'shortName' => 'RemoveAfterColumnPositioningRector',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * @see RemoveAfterColumnPositioningRectorTest
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 19,
    'endLine' => 66,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Rector\\Rector\\AbstractRector',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Hihaho\\RectorRules\\Rector\\Migration\\Concerns\\ChecksMigrationContext',
    ),
    'immediateConstants' => 
    array (
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
        'startLine' => 23,
        'endLine' => 38,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Migration',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
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
        'docComment' => '/** @return array<class-string<Node>> */',
        'startLine' => 41,
        'endLine' => 44,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Migration',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
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
            'startLine' => 46,
            'endLine' => 46,
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
        'startLine' => 46,
        'endLine' => 65,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Migration',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
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