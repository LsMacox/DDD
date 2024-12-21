<?php

namespace App\Tests\Resources\Fixture;

use App\Users\Domain\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Tests\Tools\FakerTools;

class UserFixture extends Fixture
{
    use FakerTools;

    const REFERENCE = 'user';

    public function load(ObjectManager $manager): void
    {
        $email = $this->getFaker()->email();
        $password = $this->getFaker()->password();
        $user = (new UserFactory())->create($email, $password);

        $manager->persist($user);
        $manager->flush();

        $this->addReference(self::REFERENCE, $user);
    }
}