<?php

namespace App\Infrastructure\Persistence\DataFixtures;

use App\Domain\Factory\Article\ArticleFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture {
	public function load(ObjectManager $manager): void {

		ArticleFactory::createMany((int)$_ENV['FACTORY_COUNT'] ?? 5);
	}
}
