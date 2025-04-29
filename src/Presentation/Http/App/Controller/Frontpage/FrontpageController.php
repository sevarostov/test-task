<?php

declare(strict_types=1);

namespace App\Presentation\Http\App\Controller\Frontpage;

use App\Domain\RepositoryFilter\Article\ArticleFilter;
use App\Infrastructure\Persistence\Doctrine\Repository\Article\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/', name: 'app_frontpage')]
class FrontpageController extends AbstractController {

	private EntityManagerInterface $em;
	public function __construct(EntityManagerInterface $em)
	{
		$this->em = $em;
	}
	public function __invoke(): Response {
		return $this->render('app/page/frontpage/page.html.twig',
			["items" => (new ArticleRepository($this->em))->findArticles(new ArticleFilter())]);
	}
}
