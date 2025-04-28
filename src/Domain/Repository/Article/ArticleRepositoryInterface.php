<?php

declare(strict_types=1);

namespace App\Domain\Repository\Article;

use App\Domain\Entity\Article\Article;
use App\Domain\RepositoryFilter\Article\ArticleFilter;
use DomainException;

interface ArticleRepositoryInterface
{
    /**
     * Найти статью по фильтру
     *
     * @param ArticleFilter $filter
     *
     * @return array
     */
    public function findArticles(ArticleFilter $filter): array;

    /**
     * Найти статью по коду
     *
     * @param string $code
     *
     * @return Article
     *
     * @throws DomainException
     */
    public function findByCode(string $code): Article;

    /**
     * Сохранить статью
     *
     * @param Article $article
     *
     * @return void
     */
    public function save(Article $article): void;

    /**
     * Удалить статью
     *
     * @param Article $article
     *
     * @return void
     */
    public function delete(Article $article): void;
}
