<?php

namespace App\Users\Application\Command\CreateUser;

use App\Shared\Application\Command\CommandHandlerInterface;
use App\Users\Domain\Factory\UserFactory;
use App\Users\Domain\Repository\UserRepositoryInterface;

readonly class CreatUserCommandHandler implements CommandHandlerInterface
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @return string ID пользователя
     */
    public function __invoke(CreateUserCommand $createUserCommand): string
    {
        $user = (new UserFactory())->create($createUserCommand->email, $createUserCommand->password);
        $this->userRepository->add($user);

        return $user->getUlid();
    }

}