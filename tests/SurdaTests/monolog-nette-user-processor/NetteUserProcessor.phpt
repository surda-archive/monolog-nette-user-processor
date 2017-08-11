<?php
/**
 * Test: Surda\Monolog\NetteUserProcessor.
 *
 * @testCase SurdaTests\Monolog\NetteUserProcessorTest
 * @package  Surda\Monolog
 */

namespace SurdaTests\Monolog;


use Nette;
use Tester\Assert;
use Surda\Monolog\Processor\NetteUserProcessor;

require __DIR__ . '/../bootstrap.php';
require __DIR__ . '/MockUserStorage.php';

/**
 * @testCase
 */
class NetteUserProcessorTest extends TestCase
{

    public function testNoUser()
    {
        $user = new Nette\Security\User(new MockUserStorage());

        Assert::same(['extra' => ['nette-user' => ['id' => null, 'loggedIn' => false]]], call_user_func(new NetteUserProcessor($user), []));
    }


    public function testUnlogged()
    {
        $storage = new MockUserStorage();
        $identity = new Nette\Security\Identity(12, 'admin', ['name' => 'John']);

        $storage->setIdentity($identity);

        $user = new Nette\Security\User($storage);

        Assert::same(['extra' => ['nette-user' => ['id' => 12, 'loggedIn' => false]]], call_user_func(new NetteUserProcessor($user), []));
    }


    public function testLoggedIn()
    {
        $storage = new MockUserStorage();
        $identity = new Nette\Security\Identity(12, 'admin', ['name' => 'John']);

        $storage->setIdentity($identity);
        $storage->setAuthenticated(true);

        $user = new Nette\Security\User($storage);

        Assert::same(['extra' => ['nette-user' => ['id' => 12, 'loggedIn' => true]]], call_user_func(new NetteUserProcessor($user), []));
    }


}

(new NetteUserProcessorTest())->run();
