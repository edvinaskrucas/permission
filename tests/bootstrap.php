<?php

require __DIR__ . '/../vendor/autoload.php';

class_alias('Krucas\Permission\Tests\ValidatorStub', 'User\Edit');
class_alias('Krucas\Permission\Tests\ValidatorStub', 'Namespace\User\Edit');
class_alias('Krucas\Permission\Tests\ValidatorStub', 'Namespace\Higher\User\Edit');
class_alias('Krucas\Permission\Tests\NonValidatorStub', 'User\Delete');
