<?php

declare(strict_types=1);

namespace App\Presentation\Http\App\Controller\Article;

use App\Domain\RepositoryFilter\Article\ArticleFilter;
use App\Infrastructure\Persistence\Doctrine\Repository\Article\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/article', name: 'article_show')]
class IndexController extends AbstractController {

	private EntityManagerInterface $em;

	public function __construct(EntityManagerInterface $em) {
		$this->em = $em;
	}

	public function __invoke(Request $request): Response {

		if (!($article = (new ArticleRepository($this->em))->findByCode($request->get("code")))) {
			return new Response('not found', Response::HTTP_NOT_FOUND);
		}

		return $this->render('app/page/article/page.html.twig', ["item" => $article]);
	}
}
