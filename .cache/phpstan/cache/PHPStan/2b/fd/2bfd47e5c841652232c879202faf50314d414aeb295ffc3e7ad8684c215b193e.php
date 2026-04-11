<?php declare(strict_types = 1);

// ftm-/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v4-2.3.2',
   'data' => 
  array (
    0 => 
    array (
      'd4947906dafef58b20c26c46c556a355' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
          'TModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 2,
                'endLine' => 2,
              ),
            )),
          ),
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '8917b25cceb0d6f8f73a2ed6c9339214' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
          'TValue' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TValue',
               'bound' => NULL,
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 2,
                'endLine' => 2,
              ),
            )),
          ),
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '4a4c176026b730b2b2ca2dd016031772' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Support\\Traits',
         'uses' => 
        array (
          'closure' => 'Closure',
          'higherorderwhenproxy' => 'Illuminate\\Support\\HigherOrderWhenProxy',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Support\\Traits\\Conditionable',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Support\\Traits\\Conditionable',
          3 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          4 => NULL,
        ),
      )),
      '69a04ed9a54e7e1acd656c2130565976' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Support\\Traits',
         'uses' => 
        array (
          'closure' => 'Closure',
          'higherorderwhenproxy' => 'Illuminate\\Support\\HigherOrderWhenProxy',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'when',
         'templatePhpDocNodes' => 
        array (
          'TWhenParameter' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TWhenParameter',
               'bound' => NULL,
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
          'TWhenReturnType' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TWhenReturnType',
               'bound' => NULL,
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 5,
                'endLine' => 5,
              ),
            )),
          ),
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Support\\Traits\\Conditionable',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Support\\Traits\\Conditionable',
          3 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          4 => NULL,
        ),
      )),
      '51146ab23e5f9b869819de57e82f61a0' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Support\\Traits',
         'uses' => 
        array (
          'closure' => 'Closure',
          'higherorderwhenproxy' => 'Illuminate\\Support\\HigherOrderWhenProxy',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'unless',
         'templatePhpDocNodes' => 
        array (
          'TUnlessParameter' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TUnlessParameter',
               'bound' => NULL,
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
          'TUnlessReturnType' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TUnlessReturnType',
               'bound' => NULL,
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 5,
                'endLine' => 5,
              ),
            )),
          ),
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Support\\Traits\\Conditionable',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Support\\Traits\\Conditionable',
          3 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          4 => NULL,
        ),
      )),
      'd00f50f4ada435c5e705a8accd2462d3' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'chunk',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'd027783216524a93d0ff3b29fe291cc4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'chunkMap',
         'templatePhpDocNodes' => 
        array (
          'TReturn' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TReturn',
               'bound' => NULL,
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '1d1d37dfa5476747ebd11db6c7ec43fe' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'each',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'eca0098e89ae5e1c7f0f55dcdc9b5877' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'chunkById',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '88248dd11e4070a2b4ff37020b286ed7' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'chunkByIdDesc',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'bccedaf6072137acb1569a08f106d2b4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orderedChunkById',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'b5e6639143dfbeef6b009a820d945d19' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'eachById',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'f9b38cab27397c9372af341f847e7b74' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'lazy',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '37d934f1948b73a31abdbb3055c7452d' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'lazyById',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '3541f903f72ff90e453dc6513afeff45' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'lazyByIdDesc',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '7716ac3963722331864fd65086f0c181' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orderedLazyById',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '76182173b0dd2eaab321b626b3a82baf' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'first',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'de6ad4482ad4f4efff1eb65ece96d305' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'firstOrFail',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '1f6754ff5ed07842a83d13e7c85676dc' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'baseSole',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '984d743d36fc77221111e09252a71a06' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'paginateUsingCursor',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'd4a79a25afc8fcfc7dae8706f22fe878' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getOriginalColumnNameForCursorPagination',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'e7f4bbc27489828db50fba70660718e0' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'paginator',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '570777e9af5be5a908c18586f61e3d52' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'simplePaginator',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'dd26bcc63684eb6c272557ff6c62744f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'cursorPaginator',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '92a40dd1128b56fbdd04c860c760bce9' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'tap',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'd18300ccf028e1b36e249382e2c0f143' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Concerns',
         'uses' => 
        array (
          'container' => 'Illuminate\\Container\\Container',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'cursor' => 'Illuminate\\Pagination\\Cursor',
          'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
          'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'collection' => 'Illuminate\\Support\\Collection',
          'lazycollection' => 'Illuminate\\Support\\LazyCollection',
          'str' => 'Illuminate\\Support\\Str',
          'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
          'invalidargumentexception' => 'InvalidArgumentException',
          'runtimeexception' => 'RuntimeException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'pipe',
         'templatePhpDocNodes' => 
        array (
          'TReturn' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TReturn',
               'bound' => NULL,
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Concerns',
           'uses' => 
          array (
            'container' => 'Illuminate\\Container\\Container',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'multiplerecordsfoundexception' => 'Illuminate\\Database\\MultipleRecordsFoundException',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'recordnotfoundexception' => 'Illuminate\\Database\\RecordNotFoundException',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'cursor' => 'Illuminate\\Pagination\\Cursor',
            'cursorpaginator' => 'Illuminate\\Pagination\\CursorPaginator',
            'lengthawarepaginator' => 'Illuminate\\Pagination\\LengthAwarePaginator',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'collection' => 'Illuminate\\Support\\Collection',
            'lazycollection' => 'Illuminate\\Support\\LazyCollection',
            'str' => 'Illuminate\\Support\\Str',
            'conditionable' => 'Illuminate\\Support\\Traits\\Conditionable',
            'invalidargumentexception' => 'InvalidArgumentException',
            'runtimeexception' => 'RuntimeException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TValue' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TValue',
                 'bound' => NULL,
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '3bd4c6cd44b537557c18694820784b90' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Support\\Traits',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'error' => 'Error',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '4a507a6b8df81376461f2dbd287d97c2' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Support\\Traits',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'error' => 'Error',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'forwardCallTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '6db30fef78af4549cea097bda2c6bc8a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Support\\Traits',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'error' => 'Error',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'forwardDecoratedCallTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'f9a435ad605a91ec16692ce8371c7bc5' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Support\\Traits',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'error' => 'Error',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'throwBadMethodCallException',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '7a5f0e3ab4cfee64f36fec2c87fec4d4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'f3be56fc9e8940a35c9cd2e33a3dddf4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'has',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'dbacbb27137c5390659a06d74c302519' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'hasNested',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'f43d443b544edae19330f92480e19f2c' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orHas',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '1afa1332e58fc8389c26352b86013075' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'doesntHave',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'd0a5dc6e05d6be48e1c84736c7bcc874' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orDoesntHave',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '6457493735a9c67bcd5d6935dc9a7b92' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereHas',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '18fb2fca1ccd74c9f19f1261bccdaa59' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withWhereHas',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '69ff2cbd39856c45c0666f020f389668' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhereHas',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'ddbd8b91a412fccedfcfa2b04478c487' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereDoesntHave',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'b3f6ecbb5c33f5f7f8f410d0f97f7529' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhereDoesntHave',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'ff539c18ff5f7342e5ed8eb7df132c09' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'hasMorph',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '7a1f60bd1919b573b777f73227d01b60' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getBelongsToRelation',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
          'TDeclaringModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TDeclaringModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 5,
                  'endLine' => 5,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 5,
                'endLine' => 5,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '3fcf142874c0b2c59d72c53975330be5' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orHasMorph',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'fada55829994408556dd0574d0183d95' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'doesntHaveMorph',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '29dce80dc94d8d446d8b74b748623e49' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orDoesntHaveMorph',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '1fc1656dff840b6475647bfbb2dacfa4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereHasMorph',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '3874d0ce637e57b0b4f45e65c6232572' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhereHasMorph',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'fe40c2a76b00cbdb9ae2e5890e8dbba6' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereDoesntHaveMorph',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '1af6f343077b8e8f1f0418e55c0d6714' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhereDoesntHaveMorph',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '5ea6881262d2f38b99f9500290076f3b' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereRelation',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '30f2dcfcbcf38103b55230eb881d9ace' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withWhereRelation',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'c4542c965ffa87f3ef280da2b8d445c1' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhereRelation',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '7e87afe6a181c66271233c1784172f13' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereDoesntHaveRelation',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '4e4b0b770c17f4e45ffc1d374321955c' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhereDoesntHaveRelation',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '16a94da1af15d5a3225fb19799b5c671' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereMorphRelation',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'd2b218260a71feb1f8e34ffbd4b4d82b' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhereMorphRelation',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'c6116d71fca1acd88a11cdc15f607497' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereMorphDoesntHaveRelation',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '14c6bd2f1497a4f1292b6b9287cb48f4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhereMorphDoesntHaveRelation',
         'templatePhpDocNodes' => 
        array (
          'TRelatedModel' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TRelatedModel',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '7824bb4f8ced1e519f88b30567b39eb4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereMorphedTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '0144a5410d1fc041438c6604f87d1100' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereNotMorphedTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '25bd4093da4f3e0a118fbd2e371d625c' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhereMorphedTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'f9340d4614583f2df9ca3363b04ab2b2' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhereNotMorphedTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '3e473d355e52abd5327b45bd1cb4d4de' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereBelongsTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '35bd4131eb16c5c27d1f579e72b796d9' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhereBelongsTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'a6c46c0ea92ff224d9342f77025d09f4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereAttachedTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '35abb3332b91990f0fcaf26c0b14f78d' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhereAttachedTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'da8ecf44ee82347e039c6cb9307cc327' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withAggregate',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '20081c01e5f40c131dee615f523bc847' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getRelationHashedColumn',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'd4497265c1662facad82a3bc9a4787d7' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withCount',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '8205d375f566594a06fd69185e7ea111' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withMax',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'c37aaed858f020ea02c461424cb0b486' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withMin',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '13514081b961fda7505acd19e173e17c' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withSum',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '7c77da786ea609b9379517bac86a76dd' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withAvg',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'd75bf05280aaceaabdea558f569f88e3' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withExists',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'aaf2abac37250b40973df0b0c17dcb51' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'addHasWhere',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '408fd347919949945799d44f2bdeeca7' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'mergeConstraintsFrom',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '4aa930ab3da26288adb151de6ae84277' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'requalifyWhereTables',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '6223f7a8c21ab1c7778d5bdacec0392f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'addWhereCountQuery',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'd92ffd765d303105bc1eb5d6b32adcee' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getRelationWithoutConstraints',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      'b246784edb31b9cc23a567d657c613bd' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'expression' => 'Illuminate\\Database\\Query\\Expression',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'canUseExistsForExistenceCheck',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Concerns',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'relationnotfoundexception' => 'Illuminate\\Database\\Eloquent\\RelationNotFoundException',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'expression' => 'Illuminate\\Database\\Query\\Expression',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'invalidargumentexception' => 'InvalidArgumentException',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
         'traitData' => 
        array (
          0 => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',
          1 => 'Illuminate\\Database\\Eloquent\\Builder',
          2 => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          3 => NULL,
          4 => '/** @use \\Illuminate\\Database\\Concerns\\BuildsQueries<TModel> */',
        ),
      )),
      '1decaea7b31023803798752f9b48823d' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => '__construct',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '1c38924aa7851009cb49f0a0e2f5656e' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'make',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '13b096c9afb136899084132ff80b1277' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withGlobalScope',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '50b2628e75b03edab234fb39c5b4dcee' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withoutGlobalScope',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'b0cb20aa8f0da75e0ba8e162ad8a5231' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withoutGlobalScopes',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '20973a36039a3d47f3ac873ca0846266' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withoutGlobalScopesExcept',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '15b2fe480c3b84a3ea566a57455a798d' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'removedScopes',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '657d0ca9f02469d681c04503420c3fa8' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereKey',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'e08e6dacb501e38ce6a8ad7d554e97f3' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereKeyNot',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '236e73e9a756ad3a6dcfd72a7359c788' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'except',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'b93f975ad22ad1b11faad0674a128933' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'where',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '366a25915eb74f480817499f2abb0cc6' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'firstWhere',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '3a7d315334cd2ec571180e8681685260' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhere',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '8bd68c1211114eb74e2b022c1b647720' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'whereNot',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'd85301a7d183d6069a3b5be0d8267cab' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'orWhereNot',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'e3ce61f842fac6e6d6ddbe7e6720eda6' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'latest',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '837ce2469c5491b8526228323f0fec2c' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'oldest',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '4aed1b39aca47aa99e2fa302263df469' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'hydrate',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '3e63e2abd7d194bd4005eb053fddb984' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'fillAndInsert',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'f7035815ca4c55430975ff19d62de7e0' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'fillAndInsertOrIgnore',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '3d680b33624014d255cf90a8bda8d7d6' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'fillAndInsertGetId',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '80e9ded55ecd41a335869f42fb7d01f7' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'fillForInsert',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '39124b68f4db91f934f827aa2bb28df1' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'fromQuery',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '5b59357ed9896f1d33c10e70463d6d3a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'find',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'c9d988ad28ceeb3a08b2669e8f03ed8d' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'findSole',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '15f3e3a99c5df73fbfa59dc6618d6360' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'findMany',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'c17fbe66798e161a88186285da754a41' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'findOrFail',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'c3f8c6a65865e37faecae0517b1a5d16' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'findOrNew',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '3416ca46b80d6ded1b60a6c786385f15' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'findOr',
         'templatePhpDocNodes' => 
        array (
          'TValue' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TValue',
               'bound' => NULL,
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'a0eb34bdd0379d7c913c97fc9f553acc' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'firstOrNew',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '6192d1583bfc6a5ff169c3905badb3cd' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'firstOrCreate',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '76ef6a0b2775333c49594ea8ba39c420' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'createOrFirst',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '74e2614b87b1a46a21eea032062bc510' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'updateOrCreate',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '897fb0ca940cb180c9ac2bd5f00de883' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'incrementOrCreate',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'f53b9f7ffa731b40959e4c420860d801' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'firstOrFail',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'c0e8d446ac930cd2f1342939dd40d41f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'firstOr',
         'templatePhpDocNodes' => 
        array (
          'TValue' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TValue',
               'bound' => NULL,
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '6b6587e0e5e55f373db118bad931b3ce' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'sole',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'cd5060bef29a015668e9b53fb3764522' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'value',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '057590e7612b76380f9bdd43475f8e54' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'soleValue',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '562be6b5f8cc3f555c6bc8de9fe0090e' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'valueOrFail',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'dc303c438b10b67ee076fbe014ea89dc' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'get',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '06225cd0aa907de87612d74ad4b83f60' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getModels',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'ce028e9175b6e17f53fdfc38a2856040' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'eagerLoadRelations',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'd1b163a32cad6b1f4c31b2644484f6b8' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'eagerLoadRelation',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '8932af3cd4b28b6ccfd2b906e023fd39' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getRelation',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '7986013d95756fb539a5378b4fe679db' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'relationsNestedUnder',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'cff8f32400ccaca101237c02e40d157d' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'isNestedUnder',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '1726be0bda7b0974b6b6269af660e43e' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'afterQuery',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '6361e89d87f37d6950d22883453f3d58' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'applyAfterQueryCallbacks',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'a0923e5e3325a8cbf03d14f8fc6f9b10' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'cursor',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'eceec6f164371ce3b2e194706c892237' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'enforceOrderBy',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '077bea3982cf57fd559a5665dca17b6e' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'pluck',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '20f154a47ab698bafcd0c6275a5761f7' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'paginate',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '506dd6b1c42ddf0d29b18f0cd7d4e456' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'simplePaginate',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'b7bdaaed0c4063ab893f3734b7080287' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'cursorPaginate',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'b1c2400cea82d8c36adc212654829ddb' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'ensureOrderForCursorPagination',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '55f2458d7f06432dceca29b63e500087' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'create',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'b1678076c34e17f679de9d104920b30c' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'createQuietly',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '611ec108a3c525cc10444a4c3e2e062d' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'forceCreate',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '6753d751b48675922574fd81689645db' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'forceCreateQuietly',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '3e395d8917eaadd9b61b32952e121c16' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'update',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '3460840b72ddaeb9bcc727b5072f5ca3' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'upsert',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'da21e2bd049b205f668462b85c3f259a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'touch',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '75f47f2696433c933901bdda59b3f9ee' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'increment',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '52ed706bbcbbd89a59a73454096fd7a4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'decrement',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '521472a29c97574d19bb6e62b44867c6' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'addUpdatedAtColumn',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '55a2d387b6965974bb3d79124a90b18f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'addUniqueIdsToUpsertValues',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '33606f332fe4716062b617a3a5b1060a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'addTimestampsToUpsertValues',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'd6337acb9d5d606f02c31c812165f51a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'addUpdatedAtToUpsertColumns',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '015ba7921c99ee93d03596d6867cb7af' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'delete',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'da42ef49f52af155dc6346bc7e7da79c' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'forceDelete',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '53c4ef1a8fd461750fabb92b033cf3e8' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'onDelete',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '8e47eae24fce53270bce5a7d55864abb' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'hasNamedScope',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '05a5ef9426f7b466ea3927937aa1a59f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'scopes',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'b434b0ecc6b58e3c0323495facbbb125' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'applyScopes',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '744d553d1af7308944ea77bd1e5b07e5' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'callScope',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '85ec040d5abb43c2490629598ffbe362' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'callNamedScope',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '2a15c30c4ca763c8198c7846895b57b4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'addNewWheresWithinGroup',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'aecf934e618df7ac1d73df5a17865421' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'groupWhereSliceForScope',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'f9d35d70406dcf00f0e852cae98b8d75' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'createNestedWhere',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '6a73eadc3358bad897b9c2d725d27320' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'with',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'd77492669b58e9c9519f7683841666e6' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'without',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'ce813b5621a3ae20f68d4514824513ea' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withOnly',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'a63d60989da0b077c288810a45413457' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'newModelInstance',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '24398f59b38256124e6e121ac99fd427' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'parseWithRelations',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'e9cef5d4f5d7ba8bea72be0a09fde235' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'prepareNestedWithRelationships',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '954faf2db9d94cbb9c28e5aa281c555a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'combineConstraints',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'e678d3a8139a1810cf681367ef9316d8' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'parseNameAndAttributeSelectionConstraint',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '41ed7afed0401a7acf3e520727342fb5' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'createSelectWithConstraint',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'ebe896acaa2704cf2ea8a49b5ee2d241' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'addNestedWiths',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '587dc0a36a12ef3f7662cfb3b7088d3b' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withAttributes',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '5c6f4f20e9cb15721e9c6b6dc502a0a2' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withCasts',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '842a01bc6df2e5645257cbbf1c79a7d9' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withSavepointIfNeeded',
         'templatePhpDocNodes' => 
        array (
          'TModelValue' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TModelValue',
               'bound' => NULL,
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'c694f7e2f534c1e861826c6d40651020' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getUnionBuilders',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'd2378d751c5e6ae9227c12314e4e130d' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getQuery',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'c8ce5075249cfd68328374d22831c8ba' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'setQuery',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '897d1cf847258b33c7fff14f0953524f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'toBase',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '76ce960c08aad47a8e7dd22b65526cbf' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getEagerLoads',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '3f2b371279ba8f3eeed608071b7592bf' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'setEagerLoads',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '933011bdc69210a547332362d529748a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withoutEagerLoad',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '54313ba5b3b9f1bfbe72646663dcab15' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'withoutEagerLoads',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '3e0a0d86af54cc2a6491df1e642e30f8' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getLimit',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '71e9cb8fdf30947610fc608c4fa8d170' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getOffset',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '4e24340b94e7e539c58056c1fcf68c6f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'defaultKeyName',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'd07476fd88a23fbb521873ef07171dbf' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getModel',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'e525aa2d620bb0a7f3867be74453a25a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'setModel',
         'templatePhpDocNodes' => 
        array (
          'TModelNew' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TModelNew',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                 'attributes' => 
                array (
                  'startLine' => 4,
                  'endLine' => 4,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 4,
                'endLine' => 4,
              ),
            )),
          ),
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '2461ee9c24b0029dccceb21ea864d1bd' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'qualifyColumn',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '7a3fb72884a95bf841a8326bf8a3521f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'qualifyColumns',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '28e267612301ae6f056b625397a8c359' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getMacro',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '673c6f8ee7e7fa6d01b90faf548bfdd1' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'hasMacro',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '4392f7e759dd5ff8d9e3d012616050c2' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'getGlobalMacro',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '64d76de1014e7ab96ad3d5edc37b9a9f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'hasGlobalMacro',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '1f248c44b30ee380c52613213fd79c47' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => '__get',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '07e17faa8c32924e5b30ad75facdd81e' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => '__call',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '1d509dddfac7f50d14a684deed895d66' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => '__callStatic',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '35147139d4ee9e1fb41e09c95605a34f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'registerMixin',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'a1d263dca5da2e5ba201ef617cf2f089' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'clone',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '5667f64787e684f69e3bcb53616d4f29' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => 'onClone',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '77ff436fa7008ba2df04fa414a988851' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'badmethodcallexception' => 'BadMethodCallException',
          'closure' => 'Closure',
          'exception' => 'Exception',
          'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
          'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
          'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
          'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
          'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
          'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
          'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
          'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
          'paginator' => 'Illuminate\\Pagination\\Paginator',
          'arr' => 'Illuminate\\Support\\Arr',
          'basecollection' => 'Illuminate\\Support\\Collection',
          'str' => 'Illuminate\\Support\\Str',
          'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
          'reflectionclass' => 'ReflectionClass',
          'reflectionmethod' => 'ReflectionMethod',
        ),
         'className' => 'Illuminate\\Database\\Eloquent\\Builder',
         'functionName' => '__clone',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'badmethodcallexception' => 'BadMethodCallException',
            'closure' => 'Closure',
            'exception' => 'Exception',
            'buildercontract' => 'Illuminate\\Contracts\\Database\\Eloquent\\Builder',
            'expression' => 'Illuminate\\Contracts\\Database\\Query\\Expression',
            'arrayable' => 'Illuminate\\Contracts\\Support\\Arrayable',
            'buildsqueries' => 'Illuminate\\Database\\Concerns\\BuildsQueries',
            'queriesrelationships' => 'Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'relation' => 'Illuminate\\Database\\Eloquent\\Relations\\Relation',
            'querybuilder' => 'Illuminate\\Database\\Query\\Builder',
            'recordsnotfoundexception' => 'Illuminate\\Database\\RecordsNotFoundException',
            'uniqueconstraintviolationexception' => 'Illuminate\\Database\\UniqueConstraintViolationException',
            'paginator' => 'Illuminate\\Pagination\\Paginator',
            'arr' => 'Illuminate\\Support\\Arr',
            'basecollection' => 'Illuminate\\Support\\Collection',
            'str' => 'Illuminate\\Support\\Str',
            'forwardscalls' => 'Illuminate\\Support\\Traits\\ForwardsCalls',
            'reflectionclass' => 'ReflectionClass',
            'reflectionmethod' => 'ReflectionMethod',
          ),
           'className' => 'Illuminate\\Database\\Eloquent\\Builder',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TModel' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TModel',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Model',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
    ),
    1 => 
    array (
      '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php' => '5d1306bb2bd622b57befc10b8e4d7c892a95cbcd82a6b0a99e1beed81f30fa65',
      '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../laravel/framework/src/Illuminate/Database/Concerns/BuildsQueries.php' => '8ea5428ad1592fca250ef6724cbb4384185c5f95ef7bda850062a0d20e56bec1',
      '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../laravel/framework/src/Illuminate/Conditionable/Traits/Conditionable.php' => '5697fdba0acb78ca0b4e122e5c459cd5d97d000ed9b14fed31271cb7ffd44225',
      '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../laravel/framework/src/Illuminate/Support/Traits/ForwardsCalls.php' => 'b90103bc7248a11bd7629c525e064a45a50dd93ae0d836bcb79937e63f0b3568',
      '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../laravel/framework/src/Illuminate/Database/Eloquent/Concerns/QueriesRelationships.php' => 'b626da7e9eeec6cb14e573d43765f9466bb286f5d2dc7bbb274bc057044a6df4',
    ),
  ),
));