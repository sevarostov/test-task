<?php

declare(strict_types=1);

namespace App\Domain\RepositoryFilter\Article;

class ArticleFilter
{
	/**
	 * @param bool|null $isActive
	 */
    public function __construct(
        public ?bool $isActive = true,
    ) {
    }
}
