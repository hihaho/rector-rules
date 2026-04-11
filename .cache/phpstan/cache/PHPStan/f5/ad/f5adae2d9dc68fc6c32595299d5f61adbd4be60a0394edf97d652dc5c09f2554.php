<?php declare(strict_types = 1);

// odsl-/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/RouteGroupArrayToMethodsRector.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Hihaho\RectorRules\Rector\Routing\RouteGroupArrayToMethodsRector
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.5.4-8b6c950d51e49f6d02068058aeacfd0bf5d80261bc68b0d42da057303f6fc111',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'filename' => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/RouteGroupArrayToMethodsRector.php',
      ),
    ),
    'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
    'name' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
    'shortName' => 'RouteGroupArrayToMethodsRector',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * @see RouteGroupArrayToMethodsRectorTest
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 24,
    'endLine' => 206,
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
      'KEY_TO_METHOD' => 
      array (
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'name' => 'KEY_TO_METHOD',
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
          'code' => '[\'middleware\' => \'middleware\', \'prefix\' => \'prefix\', \'name\' => \'name\', \'as\' => \'name\', \'namespace\' => \'namespace\', \'domain\' => \'domain\', \'where\' => \'where\', \'excluded_middleware\' => \'withoutMiddleware\', \'scope_bindings\' => \'scopeBindings\']',
          'attributes' => 
          array (
            'startLine' => 29,
            'endLine' => 39,
            'startTokenPos' => 111,
            'startFilePos' => 880,
            'endTokenPos' => 176,
            'endFilePos' => 1197,
          ),
        ),
        'docComment' => '/** @var array<string, string> */',
        'attributes' => 
        array (
        ),
        'startLine' => 29,
        'endLine' => 39,
        'startColumn' => 5,
        'endColumn' => 6,
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
        'startLine' => 41,
        'endLine' => 60,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
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
        'startLine' => 62,
        'endLine' => 65,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
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
            'startLine' => 67,
            'endLine' => 67,
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
        'startLine' => 67,
        'endLine' => 98,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'aliasName' => NULL,
      ),
      'isRouteGroupWithArray' => 
      array (
        'name' => 'isRouteGroupWithArray',
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
                'name' => 'PhpParser\\Node\\Expr\\StaticCall',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 100,
            'endLine' => 100,
            'startColumn' => 44,
            'endColumn' => 59,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 100,
        'endLine' => 115,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'aliasName' => NULL,
      ),
      'buildMethodChain' => 
      array (
        'name' => 'buildMethodChain',
        'parameters' => 
        array (
          'array' => 
          array (
            'name' => 'array',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'PhpParser\\Node\\Expr\\Array_',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 122,
            'endLine' => 122,
            'startColumn' => 39,
            'endColumn' => 51,
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
                  'name' => 'array',
                  'isIdentifier' => true,
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
        'docComment' => '/**
 * Returns null if any array key is unrecognized (to avoid silently dropping options).
 *
 * @return list<array{method: string, args: list<Arg>}>|null
 */',
        'startLine' => 122,
        'endLine' => 159,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'aliasName' => NULL,
      ),
      'createGroupChain' => 
      array (
        'name' => 'createGroupChain',
        'parameters' => 
        array (
          'methodCalls' => 
          array (
            'name' => 'methodCalls',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 164,
            'endLine' => 164,
            'startColumn' => 39,
            'endColumn' => 56,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'closureArg' => 
          array (
            'name' => 'closureArg',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'PhpParser\\Node\\Arg',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 164,
            'endLine' => 164,
            'startColumn' => 59,
            'endColumn' => 73,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'PhpParser\\Node\\Expr\\MethodCall',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param non-empty-list<array{method: string, args: list<Arg>}> $methodCalls
 */',
        'startLine' => 164,
        'endLine' => 187,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'aliasName' => NULL,
      ),
      'resolveArrayKey' => 
      array (
        'name' => 'resolveArrayKey',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'PhpParser\\Node\\Expr',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 189,
            'endLine' => 189,
            'startColumn' => 38,
            'endColumn' => 51,
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
                  'name' => 'string',
                  'isIdentifier' => true,
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
        'startLine' => 189,
        'endLine' => 196,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'aliasName' => NULL,
      ),
      'isFalseValue' => 
      array (
        'name' => 'isFalseValue',
        'parameters' => 
        array (
          'expr' => 
          array (
            'name' => 'expr',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'PhpParser\\Node\\Expr',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 198,
            'endLine' => 198,
            'startColumn' => 35,
            'endColumn' => 49,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 198,
        'endLine' => 205,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
        'declaringClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'implementingClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        'currentClassName' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
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