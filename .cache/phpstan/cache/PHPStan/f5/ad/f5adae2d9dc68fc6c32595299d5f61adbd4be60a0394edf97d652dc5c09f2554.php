<?php declare(strict_types = 1);

// odsl-/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/RouteGroupArrayToMethodsRector.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Hihaho\RectorRules\Rector\Routing\RouteGroupArrayToMethodsRector
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.5.4-57d22c613368c9df767e64f00e03b0b7f245074ab573d434f23ea9754ffbd95c',
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
    'endLine' => 207,
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
        'docComment' => '/** @return array<class-string<Node>> */',
        'startLine' => 63,
        'endLine' => 66,
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
            'startLine' => 68,
            'endLine' => 68,
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
        'startLine' => 68,
        'endLine' => 99,
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
            'startLine' => 101,
            'endLine' => 101,
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
        'startLine' => 101,
        'endLine' => 116,
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
            'startLine' => 123,
            'endLine' => 123,
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
        'startLine' => 123,
        'endLine' => 160,
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
          'routeClass' => 
          array (
            'name' => 'routeClass',
            'default' => NULL,
            'type' => 
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
                      'name' => 'PhpParser\\Node\\Expr',
                      'isIdentifier' => false,
                    ),
                  ),
                  1 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'PhpParser\\Node\\Name',
                      'isIdentifier' => false,
                    ),
                  ),
                ),
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 165,
            'endLine' => 165,
            'startColumn' => 39,
            'endColumn' => 64,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
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
            'startLine' => 165,
            'endLine' => 165,
            'startColumn' => 67,
            'endColumn' => 84,
            'parameterIndex' => 1,
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
            'startLine' => 165,
            'endLine' => 165,
            'startColumn' => 87,
            'endColumn' => 101,
            'parameterIndex' => 2,
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
        'startLine' => 165,
        'endLine' => 188,
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
            'startLine' => 190,
            'endLine' => 190,
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
        'startLine' => 190,
        'endLine' => 197,
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
            'startLine' => 199,
            'endLine' => 199,
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
        'startLine' => 199,
        'endLine' => 206,
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