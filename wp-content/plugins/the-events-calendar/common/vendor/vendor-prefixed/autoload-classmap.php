<?php

// autoload-classmap.php @generated by Strauss

$strauss_src = dirname(__FILE__);

return array(
   'TEC\Common\StellarWP\ContainerContract\ContainerInterface' => $strauss_src . '/stellarwp/container-contract/src/ContainerInterface.php',
   'TEC\Common\StellarWP\DB\DB' => $strauss_src . '/stellarwp/db/src/DB/DB.php',
   'TEC\Common\StellarWP\DB\Database\Provider' => $strauss_src . '/stellarwp/db/src/DB/Database/Provider.php',
   'TEC\Common\StellarWP\DB\Database\Actions\EnableBigSqlSelects' => $strauss_src . '/stellarwp/db/src/DB/Database/Actions/EnableBigSqlSelects.php',
   'TEC\Common\StellarWP\DB\Database\Exceptions\DatabaseQueryException' => $strauss_src . '/stellarwp/db/src/DB/Database/Exceptions/DatabaseQueryException.php',
   'TEC\Common\StellarWP\DB\Config' => $strauss_src . '/stellarwp/db/src/DB/Config.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\WhereQueryBuilder' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/WhereQueryBuilder.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Types\Type' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Types/Type.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Types\Operator' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Types/Operator.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Types\Math' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Types/Math.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Types\JoinType' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Types/JoinType.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\JoinQueryBuilder' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/JoinQueryBuilder.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\QueryBuilder' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/QueryBuilder.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Clauses\RawSQL' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Clauses/RawSQL.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Clauses\Select' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Clauses/Select.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Clauses\From' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Clauses/From.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Clauses\JoinCondition' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Clauses/JoinCondition.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Clauses\OrderBy' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Clauses/OrderBy.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Clauses\Join' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Clauses/Join.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Clauses\Union' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Clauses/Union.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Clauses\MetaTable' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Clauses/MetaTable.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Clauses\Where' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Clauses/Where.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Clauses\Having' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Clauses/Having.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\GroupByStatement' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/GroupByStatement.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\CRUD' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/CRUD.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\SelectStatement' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/SelectStatement.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\JoinClause' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/JoinClause.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\OrderByStatement' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/OrderByStatement.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\UnionOperator' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/UnionOperator.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\OffsetStatement' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/OffsetStatement.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\FromClause' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/FromClause.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\Aggregate' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/Aggregate.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\TablePrefix' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/TablePrefix.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\LimitStatement' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/LimitStatement.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\WhereClause' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/WhereClause.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\MetaQuery' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/MetaQuery.php',
   'TEC\Common\StellarWP\DB\QueryBuilder\Concerns\HavingClause' => $strauss_src . '/stellarwp/db/src/DB/QueryBuilder/Concerns/HavingClause.php',
   'TEC\Common\StellarWP\Telemetry\Events\Event' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Events/Event.php',
   'TEC\Common\StellarWP\Telemetry\Events\Event_Subscriber' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Events/Event_Subscriber.php',
   'TEC\Common\StellarWP\Telemetry\Opt_In\Status' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Opt_In/Status.php',
   'TEC\Common\StellarWP\Telemetry\Opt_In\Opt_In_Subscriber' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Opt_In/Opt_In_Subscriber.php',
   'TEC\Common\StellarWP\Telemetry\Opt_In\Opt_In_Template' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Opt_In/Opt_In_Template.php',
   'TEC\Common\StellarWP\Telemetry\Exit_Interview\Template' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Exit_Interview/Template.php',
   'TEC\Common\StellarWP\Telemetry\Exit_Interview\Exit_Interview_Subscriber' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Exit_Interview/Exit_Interview_Subscriber.php',
   'TEC\Common\StellarWP\Telemetry\Data_Providers\Null_Data_Provider' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Data_Providers/Null_Data_Provider.php',
   'TEC\Common\StellarWP\Telemetry\Data_Providers\Debug_Data' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Data_Providers/Debug_Data.php',
   'TEC\Common\StellarWP\Telemetry\Telemetry\Telemetry' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Telemetry/Telemetry.php',
   'TEC\Common\StellarWP\Telemetry\Telemetry\Telemetry_Subscriber' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Telemetry/Telemetry_Subscriber.php',
   'TEC\Common\StellarWP\Telemetry\Contracts\Runnable' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Contracts/Runnable.php',
   'TEC\Common\StellarWP\Telemetry\Contracts\Template_Interface' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Contracts/Template_Interface.php',
   'TEC\Common\StellarWP\Telemetry\Contracts\Subscriber_Interface' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Contracts/Subscriber_Interface.php',
   'TEC\Common\StellarWP\Telemetry\Contracts\Data_Provider' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Contracts/Data_Provider.php',
   'TEC\Common\StellarWP\Telemetry\Contracts\Abstract_Subscriber' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Contracts/Abstract_Subscriber.php',
   'TEC\Common\StellarWP\Telemetry\Core' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Core.php',
   'TEC\Common\StellarWP\Telemetry\Config' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Config.php',
   'TEC\Common\StellarWP\Telemetry\Last_Send\Last_Send' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Last_Send/Last_Send.php',
   'TEC\Common\StellarWP\Telemetry\Last_Send\Last_Send_Subscriber' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Last_Send/Last_Send_Subscriber.php',
   'TEC\Common\StellarWP\Telemetry\Admin\Admin_Subscriber' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Admin/Admin_Subscriber.php',
   'TEC\Common\StellarWP\Telemetry\Admin\Resources' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Admin/Resources.php',
   'TEC\Common\StellarWP\Telemetry\Uninstall' => $strauss_src . '/stellarwp/telemetry/src/Telemetry/Uninstall.php',
   'TEC\Common\StellarWP\Installer\Utils\Array_Utils' => $strauss_src . '/stellarwp/installer/src/Installer/Utils/Array_Utils.php',
   'TEC\Common\StellarWP\Installer\Button' => $strauss_src . '/stellarwp/installer/src/Installer/Button.php',
   'TEC\Common\StellarWP\Installer\Contracts\Handler' => $strauss_src . '/stellarwp/installer/src/Installer/Contracts/Handler.php',
   'TEC\Common\StellarWP\Installer\Config' => $strauss_src . '/stellarwp/installer/src/Installer/Config.php',
   'TEC\Common\StellarWP\Installer\Installer' => $strauss_src . '/stellarwp/installer/src/Installer/Installer.php',
   'TEC\Common\StellarWP\Installer\Assets' => $strauss_src . '/stellarwp/installer/src/Installer/Assets.php',
   'TEC\Common\StellarWP\Installer\Handler\Plugin' => $strauss_src . '/stellarwp/installer/src/Installer/Handler/Plugin.php',
   'TEC\Common\Psr\Log\LogLevel' => $strauss_src . '/psr/log/Psr/Log/LogLevel.php',
   'TEC\Common\Psr\Log\InvalidArgumentException' => $strauss_src . '/psr/log/Psr/Log/InvalidArgumentException.php',
   'TEC\Common\Psr\Log\LoggerTrait' => $strauss_src . '/psr/log/Psr/Log/LoggerTrait.php',
   'TEC\Common\Psr\Log\NullLogger' => $strauss_src . '/psr/log/Psr/Log/NullLogger.php',
   'TEC\Common\Psr\Log\Test\DummyTest' => $strauss_src . '/psr/log/Psr/Log/Test/DummyTest.php',
   'TEC\Common\Psr\Log\Test\LoggerInterfaceTest' => $strauss_src . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
   'TEC\Common\Psr\Log\Test\TestLogger' => $strauss_src . '/psr/log/Psr/Log/Test/TestLogger.php',
   'TEC\Common\Psr\Log\AbstractLogger' => $strauss_src . '/psr/log/Psr/Log/AbstractLogger.php',
   'TEC\Common\Psr\Log\LoggerInterface' => $strauss_src . '/psr/log/Psr/Log/LoggerInterface.php',
   'TEC\Common\Psr\Log\LoggerAwareInterface' => $strauss_src . '/psr/log/Psr/Log/LoggerAwareInterface.php',
   'TEC\Common\Psr\Log\LoggerAwareTrait' => $strauss_src . '/psr/log/Psr/Log/LoggerAwareTrait.php',
   'TEC\Common\Psr\Container\ContainerInterface' => $strauss_src . '/psr/container/src/ContainerInterface.php',
   'TEC\Common\Psr\Container\ContainerExceptionInterface' => $strauss_src . '/psr/container/src/ContainerExceptionInterface.php',
   'TEC\Common\Psr\Container\NotFoundExceptionInterface' => $strauss_src . '/psr/container/src/NotFoundExceptionInterface.php',
   'TEC\Common\Firebase\JWT\BeforeValidException' => $strauss_src . '/firebase/php-jwt/src/BeforeValidException.php',
   'TEC\Common\Firebase\JWT\JWT' => $strauss_src . '/firebase/php-jwt/src/JWT.php',
   'TEC\Common\Firebase\JWT\CachedKeySet' => $strauss_src . '/firebase/php-jwt/src/CachedKeySet.php',
   'TEC\Common\Firebase\JWT\Key' => $strauss_src . '/firebase/php-jwt/src/Key.php',
   'TEC\Common\Firebase\JWT\SignatureInvalidException' => $strauss_src . '/firebase/php-jwt/src/SignatureInvalidException.php',
   'TEC\Common\Firebase\JWT\ExpiredException' => $strauss_src . '/firebase/php-jwt/src/ExpiredException.php',
   'TEC\Common\Firebase\JWT\JWK' => $strauss_src . '/firebase/php-jwt/src/JWK.php',
   'TEC\Common\lucatume\DI52\Container' => $strauss_src . '/lucatume/di52/src/Container.php',
   'TEC\Common\lucatume\DI52\App' => $strauss_src . '/lucatume/di52/src/App.php',
   'TEC\Common\lucatume\DI52\ServiceProvider' => $strauss_src . '/lucatume/di52/src/ServiceProvider.php',
   'TEC\Common\lucatume\DI52\ContainerException' => $strauss_src . '/lucatume/di52/src/ContainerException.php',
   'TEC\Common\lucatume\DI52\Builders\ClosureBuilder' => $strauss_src . '/lucatume/di52/src/Builders/ClosureBuilder.php',
   'TEC\Common\lucatume\DI52\Builders\BuilderInterface' => $strauss_src . '/lucatume/di52/src/Builders/BuilderInterface.php',
   'TEC\Common\lucatume\DI52\Builders\ReinitializableBuilderInterface' => $strauss_src . '/lucatume/di52/src/Builders/ReinitializableBuilderInterface.php',
   'TEC\Common\lucatume\DI52\Builders\Factory' => $strauss_src . '/lucatume/di52/src/Builders/Factory.php',
   'TEC\Common\lucatume\DI52\Builders\ValueBuilder' => $strauss_src . '/lucatume/di52/src/Builders/ValueBuilder.php',
   'TEC\Common\lucatume\DI52\Builders\ClassBuilder' => $strauss_src . '/lucatume/di52/src/Builders/ClassBuilder.php',
   'TEC\Common\lucatume\DI52\Builders\CallableBuilder' => $strauss_src . '/lucatume/di52/src/Builders/CallableBuilder.php',
   'TEC\Common\lucatume\DI52\Builders\Parameter' => $strauss_src . '/lucatume/di52/src/Builders/Parameter.php',
   'TEC\Common\lucatume\DI52\Builders\Resolver' => $strauss_src . '/lucatume/di52/src/Builders/Resolver.php',
   'TEC\Common\lucatume\DI52\NotFoundException' => $strauss_src . '/lucatume/di52/src/NotFoundException.php',
   'TEC\Common\lucatume\DI52\NestedParseError' => $strauss_src . '/lucatume/di52/src/NestedParseError.php',
   'TEC\Common\Monolog\Processor\ProcessorInterface' => $strauss_src . '/monolog/monolog/src/Monolog/Processor/ProcessorInterface.php',
   'TEC\Common\Monolog\Processor\WebProcessor' => $strauss_src . '/monolog/monolog/src/Monolog/Processor/WebProcessor.php',
   'TEC\Common\Monolog\Processor\ProcessIdProcessor' => $strauss_src . '/monolog/monolog/src/Monolog/Processor/ProcessIdProcessor.php',
   'TEC\Common\Monolog\Processor\MercurialProcessor' => $strauss_src . '/monolog/monolog/src/Monolog/Processor/MercurialProcessor.php',
   'TEC\Common\Monolog\Processor\MemoryUsageProcessor' => $strauss_src . '/monolog/monolog/src/Monolog/Processor/MemoryUsageProcessor.php',
   'TEC\Common\Monolog\Processor\PsrLogMessageProcessor' => $strauss_src . '/monolog/monolog/src/Monolog/Processor/PsrLogMessageProcessor.php',
   'TEC\Common\Monolog\Processor\MemoryProcessor' => $strauss_src . '/monolog/monolog/src/Monolog/Processor/MemoryProcessor.php',
   'TEC\Common\Monolog\Processor\IntrospectionProcessor' => $strauss_src . '/monolog/monolog/src/Monolog/Processor/IntrospectionProcessor.php',
   'TEC\Common\Monolog\Processor\TagProcessor' => $strauss_src . '/monolog/monolog/src/Monolog/Processor/TagProcessor.php',
   'TEC\Common\Monolog\Processor\GitProcessor' => $strauss_src . '/monolog/monolog/src/Monolog/Processor/GitProcessor.php',
   'TEC\Common\Monolog\Processor\MemoryPeakUsageProcessor' => $strauss_src . '/monolog/monolog/src/Monolog/Processor/MemoryPeakUsageProcessor.php',
   'TEC\Common\Monolog\Processor\UidProcessor' => $strauss_src . '/monolog/monolog/src/Monolog/Processor/UidProcessor.php',
   'TEC\Common\Monolog\Utils' => $strauss_src . '/monolog/monolog/src/Monolog/Utils.php',
   'TEC\Common\Monolog\Logger' => $strauss_src . '/monolog/monolog/src/Monolog/Logger.php',
   'TEC\Common\Monolog\ResettableInterface' => $strauss_src . '/monolog/monolog/src/Monolog/ResettableInterface.php',
   'TEC\Common\Monolog\SignalHandler' => $strauss_src . '/monolog/monolog/src/Monolog/SignalHandler.php',
   'TEC\Common\Monolog\Handler\HipChatHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/HipChatHandler.php',
   'TEC\Common\Monolog\Handler\RollbarHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/RollbarHandler.php',
   'TEC\Common\Monolog\Handler\ErrorLogHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/ErrorLogHandler.php',
   'TEC\Common\Monolog\Handler\DynamoDbHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/DynamoDbHandler.php',
   'TEC\Common\Monolog\Handler\SlackWebhookHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/SlackWebhookHandler.php',
   'TEC\Common\Monolog\Handler\MongoDBHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/MongoDBHandler.php',
   'TEC\Common\Monolog\Handler\HandlerInterface' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/HandlerInterface.php',
   'TEC\Common\Monolog\Handler\GelfHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/GelfHandler.php',
   'TEC\Common\Monolog\Handler\BrowserConsoleHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/BrowserConsoleHandler.php',
   'TEC\Common\Monolog\Handler\MissingExtensionException' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/MissingExtensionException.php',
   'TEC\Common\Monolog\Handler\Curl\Util' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/Curl/Util.php',
   'TEC\Common\Monolog\Handler\FirePHPHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/FirePHPHandler.php',
   'TEC\Common\Monolog\Handler\BufferHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/BufferHandler.php',
   'TEC\Common\Monolog\Handler\FingersCrossed\ActivationStrategyInterface' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/FingersCrossed/ActivationStrategyInterface.php',
   'TEC\Common\Monolog\Handler\FingersCrossed\ChannelLevelActivationStrategy' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/FingersCrossed/ChannelLevelActivationStrategy.php',
   'TEC\Common\Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/FingersCrossed/ErrorLevelActivationStrategy.php',
   'TEC\Common\Monolog\Handler\LogglyHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/LogglyHandler.php',
   'TEC\Common\Monolog\Handler\AbstractHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/AbstractHandler.php',
   'TEC\Common\Monolog\Handler\WhatFailureGroupHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/WhatFailureGroupHandler.php',
   'TEC\Common\Monolog\Handler\AbstractSyslogHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/AbstractSyslogHandler.php',
   'TEC\Common\Monolog\Handler\AbstractProcessingHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/AbstractProcessingHandler.php',
   'TEC\Common\Monolog\Handler\SamplingHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/SamplingHandler.php',
   'TEC\Common\Monolog\Handler\FleepHookHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/FleepHookHandler.php',
   'TEC\Common\Monolog\Handler\CouchDBHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/CouchDBHandler.php',
   'TEC\Common\Monolog\Handler\ZendMonitorHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/ZendMonitorHandler.php',
   'TEC\Common\Monolog\Handler\SlackHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/SlackHandler.php',
   'TEC\Common\Monolog\Handler\SyslogHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/SyslogHandler.php',
   'TEC\Common\Monolog\Handler\InsightOpsHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/InsightOpsHandler.php',
   'TEC\Common\Monolog\Handler\HandlerWrapper' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/HandlerWrapper.php',
   'TEC\Common\Monolog\Handler\LogEntriesHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/LogEntriesHandler.php',
   'TEC\Common\Monolog\Handler\RavenHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/RavenHandler.php',
   'TEC\Common\Monolog\Handler\StreamHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/StreamHandler.php',
   'TEC\Common\Monolog\Handler\SyslogUdpHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/SyslogUdpHandler.php',
   'TEC\Common\Monolog\Handler\TestHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/TestHandler.php',
   'TEC\Common\Monolog\Handler\PushoverHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/PushoverHandler.php',
   'TEC\Common\Monolog\Handler\Slack\SlackRecord' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/Slack/SlackRecord.php',
   'TEC\Common\Monolog\Handler\ElasticSearchHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/ElasticSearchHandler.php',
   'TEC\Common\Monolog\Handler\MandrillHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/MandrillHandler.php',
   'TEC\Common\Monolog\Handler\FingersCrossedHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/FingersCrossedHandler.php',
   'TEC\Common\Monolog\Handler\SocketHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/SocketHandler.php',
   'TEC\Common\Monolog\Handler\GroupHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/GroupHandler.php',
   'TEC\Common\Monolog\Handler\DoctrineCouchDBHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/DoctrineCouchDBHandler.php',
   'TEC\Common\Monolog\Handler\NewRelicHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/NewRelicHandler.php',
   'TEC\Common\Monolog\Handler\PHPConsoleHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/PHPConsoleHandler.php',
   'TEC\Common\Monolog\Handler\SyslogUdp\UdpSocket' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/SyslogUdp/UdpSocket.php',
   'TEC\Common\Monolog\Handler\NativeMailerHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/NativeMailerHandler.php',
   'TEC\Common\Monolog\Handler\IFTTTHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/IFTTTHandler.php',
   'TEC\Common\Monolog\Handler\FilterHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/FilterHandler.php',
   'TEC\Common\Monolog\Handler\AmqpHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/AmqpHandler.php',
   'TEC\Common\Monolog\Handler\DeduplicationHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/DeduplicationHandler.php',
   'TEC\Common\Monolog\Handler\MailHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/MailHandler.php',
   'TEC\Common\Monolog\Handler\PsrHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/PsrHandler.php',
   'TEC\Common\Monolog\Handler\FlowdockHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/FlowdockHandler.php',
   'TEC\Common\Monolog\Handler\SlackbotHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/SlackbotHandler.php',
   'TEC\Common\Monolog\Handler\RedisHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/RedisHandler.php',
   'TEC\Common\Monolog\Handler\RotatingFileHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/RotatingFileHandler.php',
   'TEC\Common\Monolog\Handler\SwiftMailerHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/SwiftMailerHandler.php',
   'TEC\Common\Monolog\Handler\ChromePHPHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/ChromePHPHandler.php',
   'TEC\Common\Monolog\Handler\CubeHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/CubeHandler.php',
   'TEC\Common\Monolog\Handler\NullHandler' => $strauss_src . '/monolog/monolog/src/Monolog/Handler/NullHandler.php',
   'TEC\Common\Monolog\Registry' => $strauss_src . '/monolog/monolog/src/Monolog/Registry.php',
   'TEC\Common\Monolog\ErrorHandler' => $strauss_src . '/monolog/monolog/src/Monolog/ErrorHandler.php',
   'TEC\Common\Monolog\Formatter\GelfMessageFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/GelfMessageFormatter.php',
   'TEC\Common\Monolog\Formatter\FormatterInterface' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/FormatterInterface.php',
   'TEC\Common\Monolog\Formatter\ChromePHPFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/ChromePHPFormatter.php',
   'TEC\Common\Monolog\Formatter\LogstashFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/LogstashFormatter.php',
   'TEC\Common\Monolog\Formatter\ElasticaFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/ElasticaFormatter.php',
   'TEC\Common\Monolog\Formatter\MongoDBFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/MongoDBFormatter.php',
   'TEC\Common\Monolog\Formatter\WildfireFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/WildfireFormatter.php',
   'TEC\Common\Monolog\Formatter\JsonFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/JsonFormatter.php',
   'TEC\Common\Monolog\Formatter\LogglyFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/LogglyFormatter.php',
   'TEC\Common\Monolog\Formatter\HtmlFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/HtmlFormatter.php',
   'TEC\Common\Monolog\Formatter\FluentdFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/FluentdFormatter.php',
   'TEC\Common\Monolog\Formatter\LineFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/LineFormatter.php',
   'TEC\Common\Monolog\Formatter\FlowdockFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/FlowdockFormatter.php',
   'TEC\Common\Monolog\Formatter\NormalizerFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/NormalizerFormatter.php',
   'TEC\Common\Monolog\Formatter\ScalarFormatter' => $strauss_src . '/monolog/monolog/src/Monolog/Formatter/ScalarFormatter.php',
);