<?php

namespace App\Tests\Functional\Users\Application\Command\CreateUser;

use App\Shared\Application\Command\CommandBusInterface;
use App\Users\Application\Command\CreateUser\CreateUserCommand;
use App\Users\Domain\Repository\UserRepositoryInterface;
use Faker\Factory;
use Faker\Generator;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CreatUserCommandHandlerTest extends WebTestCase
{
    private Generator $faker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
        $this->userRepository = static::getContainer()->get(UserRepositoryInterface::class);
        $this->commandBus = static::getContainer()->get(CommandBusInterface::class);
    }

    public function test_user_created_successfully()
    {
        $command = new CreateUserCommand($this->faker->email(), $this->faker->password);

        // act
        $userUlid = $this->commandBus->execute($command);

        // assert
        $user = $this->userRepository->findByUlid($userUlid);
        $this->assertNotEmpty($user);
    }
}
