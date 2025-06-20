<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf106dc40b75b094d8848fab9be239569
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
        '667aeda72477189d0494fecd327c3641' => __DIR__ . '/..' . '/symfony/var-dumper/Resources/functions/dump.php',
        '2df68f9e79c919e2d88506611769ed2e' => __DIR__ . '/..' . '/respect/stringifier/src/stringify.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\VarDumper\\' => 28,
            'Symfony\\Component\\ErrorHandler\\' => 31,
        ),
        'R' => 
        array (
            'Respect\\Validation\\' => 19,
            'Respect\\Stringifier\\' => 20,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Server\\' => 16,
            'Psr\\Http\\Message\\' => 17,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'O' => 
        array (
            'Odan\\Session\\' => 13,
        ),
        'D' => 
        array (
            'DebugBar\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\VarDumper\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/var-dumper',
        ),
        'Symfony\\Component\\ErrorHandler\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/error-handler',
        ),
        'Respect\\Validation\\' => 
        array (
            0 => __DIR__ . '/..' . '/respect/validation/library',
        ),
        'Respect\\Stringifier\\' => 
        array (
            0 => __DIR__ . '/..' . '/respect/stringifier/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Psr\\Http\\Server\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-server-middleware/src',
            1 => __DIR__ . '/..' . '/psr/http-server-handler/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Odan\\Session\\' => 
        array (
            0 => __DIR__ . '/..' . '/odan/session/src',
        ),
        'DebugBar\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-debugbar/php-debugbar/src/DebugBar',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Latte\\Attributes\\TemplateFilter' => __DIR__ . '/..' . '/latte/latte/src/Latte/attributes.php',
        'Latte\\Attributes\\TemplateFunction' => __DIR__ . '/..' . '/latte/latte/src/Latte/attributes.php',
        'Latte\\Bridges\\Tracy\\BlueScreenPanel' => __DIR__ . '/..' . '/latte/latte/src/Bridges/Tracy/BlueScreenPanel.php',
        'Latte\\Bridges\\Tracy\\LattePanel' => __DIR__ . '/..' . '/latte/latte/src/Bridges/Tracy/LattePanel.php',
        'Latte\\Bridges\\Tracy\\TracyExtension' => __DIR__ . '/..' . '/latte/latte/src/Bridges/Tracy/TracyExtension.php',
        'Latte\\Cache' => __DIR__ . '/..' . '/latte/latte/src/Latte/Cache.php',
        'Latte\\CompileException' => __DIR__ . '/..' . '/latte/latte/src/Latte/exceptions.php',
        'Latte\\Compiler\\Block' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Block.php',
        'Latte\\Compiler\\Escaper' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Escaper.php',
        'Latte\\Compiler\\ExpressionBuilder' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/ExpressionBuilder.php',
        'Latte\\Compiler\\Node' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Node.php',
        'Latte\\Compiler\\NodeHelpers' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/NodeHelpers.php',
        'Latte\\Compiler\\NodeTraverser' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/NodeTraverser.php',
        'Latte\\Compiler\\Nodes\\AreaNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/AreaNode.php',
        'Latte\\Compiler\\Nodes\\AuxiliaryNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/AuxiliaryNode.php',
        'Latte\\Compiler\\Nodes\\FragmentNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/FragmentNode.php',
        'Latte\\Compiler\\Nodes\\Html\\AttributeNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Html/AttributeNode.php',
        'Latte\\Compiler\\Nodes\\Html\\BogusTagNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Html/BogusTagNode.php',
        'Latte\\Compiler\\Nodes\\Html\\CommentNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Html/CommentNode.php',
        'Latte\\Compiler\\Nodes\\Html\\ElementNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Html/ElementNode.php',
        'Latte\\Compiler\\Nodes\\NopNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/NopNode.php',
        'Latte\\Compiler\\Nodes\\Php\\ArgumentNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/ArgumentNode.php',
        'Latte\\Compiler\\Nodes\\Php\\ArrayItemNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/ArrayItemNode.php',
        'Latte\\Compiler\\Nodes\\Php\\ClosureUseNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/ClosureUseNode.php',
        'Latte\\Compiler\\Nodes\\Php\\ComplexTypeNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/ComplexTypeNode.php',
        'Latte\\Compiler\\Nodes\\Php\\ExpressionNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/ExpressionNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\ArrayAccessNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/ArrayAccessNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\ArrayItemNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/ArrayItemNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\ArrayNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/ArrayNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\AssignNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/AssignNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\AssignOpNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/AssignOpNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\AuxiliaryNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/AuxiliaryNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\BinaryOpNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/BinaryOpNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\CastNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/CastNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\ClassConstantFetchNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/ClassConstantFetchNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\CloneNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/CloneNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\ClosureNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/ClosureNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\ConstantFetchNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/ConstantFetchNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\EmptyNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/EmptyNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\ErrorSuppressNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/ErrorSuppressNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\FilterCallNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/FilterCallNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\FunctionCallNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/FunctionCallNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\FunctionCallableNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/FunctionCallableNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\InNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/InNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\InstanceofNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/InstanceofNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\IssetNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/IssetNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\MatchNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/MatchNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\MethodCallNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/MethodCallNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\MethodCallableNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/MethodCallableNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\NewNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/NewNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\NotNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/NotNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\PostOpNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/PostOpNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\PreOpNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/PreOpNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\PropertyFetchNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/PropertyFetchNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\StaticCallNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/StaticMethodCallNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\StaticCallableNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/StaticMethodCallableNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\StaticMethodCallNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/StaticMethodCallNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\StaticMethodCallableNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/StaticMethodCallableNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\StaticPropertyFetchNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/StaticPropertyFetchNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\TemporaryNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/TemporaryNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\TernaryNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/TernaryNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\UnaryOpNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/UnaryOpNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Expression\\VariableNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Expression/VariableNode.php',
        'Latte\\Compiler\\Nodes\\Php\\FilterNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/FilterNode.php',
        'Latte\\Compiler\\Nodes\\Php\\IdentifierNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/IdentifierNode.php',
        'Latte\\Compiler\\Nodes\\Php\\InterpolatedStringPartNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/InterpolatedStringPartNode.php',
        'Latte\\Compiler\\Nodes\\Php\\IntersectionTypeNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/IntersectionTypeNode.php',
        'Latte\\Compiler\\Nodes\\Php\\ListItemNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/ListItemNode.php',
        'Latte\\Compiler\\Nodes\\Php\\ListNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/ListNode.php',
        'Latte\\Compiler\\Nodes\\Php\\MatchArmNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/MatchArmNode.php',
        'Latte\\Compiler\\Nodes\\Php\\ModifierNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/ModifierNode.php',
        'Latte\\Compiler\\Nodes\\Php\\NameNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/NameNode.php',
        'Latte\\Compiler\\Nodes\\Php\\NullableTypeNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/NullableTypeNode.php',
        'Latte\\Compiler\\Nodes\\Php\\ParameterNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/ParameterNode.php',
        'Latte\\Compiler\\Nodes\\Php\\ScalarNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/ScalarNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Scalar\\BooleanNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Scalar/BooleanNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Scalar\\FloatNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Scalar/FloatNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Scalar\\IntegerNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Scalar/IntegerNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Scalar\\InterpolatedStringNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Scalar/InterpolatedStringNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Scalar\\NullNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Scalar/NullNode.php',
        'Latte\\Compiler\\Nodes\\Php\\Scalar\\StringNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/Scalar/StringNode.php',
        'Latte\\Compiler\\Nodes\\Php\\SuperiorTypeNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/SuperiorTypeNode.php',
        'Latte\\Compiler\\Nodes\\Php\\UnionTypeNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/UnionTypeNode.php',
        'Latte\\Compiler\\Nodes\\Php\\VarLikeIdentifierNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/Php/VarLikeIdentifierNode.php',
        'Latte\\Compiler\\Nodes\\StatementNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/StatementNode.php',
        'Latte\\Compiler\\Nodes\\TemplateNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/TemplateNode.php',
        'Latte\\Compiler\\Nodes\\TextNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Nodes/TextNode.php',
        'Latte\\Compiler\\PhpHelpers' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/PhpHelpers.php',
        'Latte\\Compiler\\Position' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Position.php',
        'Latte\\Compiler\\PrintContext' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/PrintContext.php',
        'Latte\\Compiler\\Tag' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Tag.php',
        'Latte\\Compiler\\TagLexer' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/TagLexer.php',
        'Latte\\Compiler\\TagParser' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/TagParser.php',
        'Latte\\Compiler\\TagParserData' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/TagParserData.php',
        'Latte\\Compiler\\TemplateGenerator' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/TemplateGenerator.php',
        'Latte\\Compiler\\TemplateLexer' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/TemplateLexer.php',
        'Latte\\Compiler\\TemplateParser' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/TemplateParser.php',
        'Latte\\Compiler\\TemplateParserHtml' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/TemplateParserHtml.php',
        'Latte\\Compiler\\Token' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Token.php',
        'Latte\\Compiler\\TokenStream' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/TokenStream.php',
        'Latte\\ContentType' => __DIR__ . '/..' . '/latte/latte/src/Latte/ContentType.php',
        'Latte\\Engine' => __DIR__ . '/..' . '/latte/latte/src/Latte/Engine.php',
        'Latte\\Essential\\AuxiliaryIterator' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/AuxiliaryIterator.php',
        'Latte\\Essential\\Blueprint' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Blueprint.php',
        'Latte\\Essential\\CachingIterator' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/CachingIterator.php',
        'Latte\\Essential\\CoreExtension' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/CoreExtension.php',
        'Latte\\Essential\\Filters' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Filters.php',
        'Latte\\Essential\\Nodes\\BlockNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/BlockNode.php',
        'Latte\\Essential\\Nodes\\CaptureNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/CaptureNode.php',
        'Latte\\Essential\\Nodes\\ContentTypeNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/ContentTypeNode.php',
        'Latte\\Essential\\Nodes\\DebugbreakNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/DebugbreakNode.php',
        'Latte\\Essential\\Nodes\\DefineNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/DefineNode.php',
        'Latte\\Essential\\Nodes\\DoNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/DoNode.php',
        'Latte\\Essential\\Nodes\\DumpNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/DumpNode.php',
        'Latte\\Essential\\Nodes\\EmbedNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/EmbedNode.php',
        'Latte\\Essential\\Nodes\\ExtendsNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/ExtendsNode.php',
        'Latte\\Essential\\Nodes\\FirstLastSepNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/FirstLastSepNode.php',
        'Latte\\Essential\\Nodes\\ForNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/ForNode.php',
        'Latte\\Essential\\Nodes\\ForeachNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/ForeachNode.php',
        'Latte\\Essential\\Nodes\\IfChangedNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/IfChangedNode.php',
        'Latte\\Essential\\Nodes\\IfContentNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/IfContentNode.php',
        'Latte\\Essential\\Nodes\\IfNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/IfNode.php',
        'Latte\\Essential\\Nodes\\ImportNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/ImportNode.php',
        'Latte\\Essential\\Nodes\\IncludeBlockNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/IncludeBlockNode.php',
        'Latte\\Essential\\Nodes\\IncludeFileNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/IncludeFileNode.php',
        'Latte\\Essential\\Nodes\\IterateWhileNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/IterateWhileNode.php',
        'Latte\\Essential\\Nodes\\JumpNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/JumpNode.php',
        'Latte\\Essential\\Nodes\\NAttrNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/NAttrNode.php',
        'Latte\\Essential\\Nodes\\NClassNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/NClassNode.php',
        'Latte\\Essential\\Nodes\\NElseNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/NElseNode.php',
        'Latte\\Essential\\Nodes\\NTagNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/NTagNode.php',
        'Latte\\Essential\\Nodes\\ParametersNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/ParametersNode.php',
        'Latte\\Essential\\Nodes\\PrintNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/PrintNode.php',
        'Latte\\Essential\\Nodes\\RawPhpNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/RawPhpNode.php',
        'Latte\\Essential\\Nodes\\RollbackNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/RollbackNode.php',
        'Latte\\Essential\\Nodes\\SpacelessNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/SpacelessNode.php',
        'Latte\\Essential\\Nodes\\SwitchNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/SwitchNode.php',
        'Latte\\Essential\\Nodes\\TemplatePrintNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/TemplatePrintNode.php',
        'Latte\\Essential\\Nodes\\TemplateTypeNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/TemplateTypeNode.php',
        'Latte\\Essential\\Nodes\\TraceNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/TraceNode.php',
        'Latte\\Essential\\Nodes\\TranslateNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/TranslateNode.php',
        'Latte\\Essential\\Nodes\\TryNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/TryNode.php',
        'Latte\\Essential\\Nodes\\VarNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/VarNode.php',
        'Latte\\Essential\\Nodes\\VarPrintNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/VarPrintNode.php',
        'Latte\\Essential\\Nodes\\VarTypeNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/VarTypeNode.php',
        'Latte\\Essential\\Nodes\\WhileNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Nodes/WhileNode.php',
        'Latte\\Essential\\Passes' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Passes.php',
        'Latte\\Essential\\RawPhpExtension' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/RawPhpExtension.php',
        'Latte\\Essential\\RollbackException' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/RollbackException.php',
        'Latte\\Essential\\Tracer' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/Tracer.php',
        'Latte\\Essential\\TranslatorExtension' => __DIR__ . '/..' . '/latte/latte/src/Latte/Essential/TranslatorExtension.php',
        'Latte\\Exception' => __DIR__ . '/..' . '/latte/latte/src/Latte/exceptions.php',
        'Latte\\Extension' => __DIR__ . '/..' . '/latte/latte/src/Latte/Extension.php',
        'Latte\\Helpers' => __DIR__ . '/..' . '/latte/latte/src/Latte/Helpers.php',
        'Latte\\Loader' => __DIR__ . '/..' . '/latte/latte/src/Latte/Loader.php',
        'Latte\\Loaders\\FileLoader' => __DIR__ . '/..' . '/latte/latte/src/Latte/Loaders/FileLoader.php',
        'Latte\\Loaders\\StringLoader' => __DIR__ . '/..' . '/latte/latte/src/Latte/Loaders/StringLoader.php',
        'Latte\\Policy' => __DIR__ . '/..' . '/latte/latte/src/Latte/Policy.php',
        'Latte\\PositionAwareException' => __DIR__ . '/..' . '/latte/latte/src/Latte/PositionAwareException.php',
        'Latte\\RuntimeException' => __DIR__ . '/..' . '/latte/latte/src/Latte/exceptions.php',
        'Latte\\Runtime\\Block' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Block.php',
        'Latte\\Runtime\\FilterExecutor' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/FilterExecutor.php',
        'Latte\\Runtime\\FilterInfo' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/FilterInfo.php',
        'Latte\\Runtime\\Filters' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Filters.php',
        'Latte\\Runtime\\FunctionExecutor' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/FunctionExecutor.php',
        'Latte\\Runtime\\Html' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Html.php',
        'Latte\\Runtime\\HtmlStringable' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/HtmlStringable.php',
        'Latte\\Runtime\\Template' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Template.php',
        'Latte\\Sandbox\\Nodes\\FunctionCallNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/Nodes/FunctionCallNode.php',
        'Latte\\Sandbox\\Nodes\\FunctionCallableNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/Nodes/FunctionCallableNode.php',
        'Latte\\Sandbox\\Nodes\\MethodCallNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/Nodes/MethodCallNode.php',
        'Latte\\Sandbox\\Nodes\\MethodCallableNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/Nodes/MethodCallableNode.php',
        'Latte\\Sandbox\\Nodes\\PropertyFetchNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/Nodes/PropertyFetchNode.php',
        'Latte\\Sandbox\\Nodes\\SandboxNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/Nodes/SandboxNode.php',
        'Latte\\Sandbox\\Nodes\\StaticMethodCallNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/Nodes/StaticMethodCallNode.php',
        'Latte\\Sandbox\\Nodes\\StaticMethodCallableNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/Nodes/StaticMethodCallableNode.php',
        'Latte\\Sandbox\\Nodes\\StaticPropertyFetchNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/Nodes/StaticPropertyFetchNode.php',
        'Latte\\Sandbox\\RuntimeChecker' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/RuntimeChecker.php',
        'Latte\\Sandbox\\SandboxExtension' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/SandboxExtension.php',
        'Latte\\Sandbox\\SecurityPolicy' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/SecurityPolicy.php',
        'Latte\\SecurityViolationException' => __DIR__ . '/..' . '/latte/latte/src/Latte/exceptions.php',
        'Latte\\Tools\\Linter' => __DIR__ . '/..' . '/latte/latte/src/Tools/Linter.php',
        'Verot\\Upload\\Upload' => __DIR__ . '/..' . '/verot/class.upload.php/src/class.upload.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf106dc40b75b094d8848fab9be239569::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf106dc40b75b094d8848fab9be239569::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitf106dc40b75b094d8848fab9be239569::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitf106dc40b75b094d8848fab9be239569::$classMap;

        }, null, ClassLoader::class);
    }
}
