<?php

require __DIR__ . '/../vendor/autoload.php';

class_alias('Krucas\Permissions\Tests\ValidatorStub', 'User\Edit');
class_alias('Krucas\Permissions\Tests\ValidatorStub', 'Namespace\User\Edit');
class_alias('Krucas\Permissions\Tests\ValidatorStub', 'Namespace\Higher\User\Edit');
class_alias('Krucas\Permissions\Tests\NonValidatorStub', 'User\Delete');
