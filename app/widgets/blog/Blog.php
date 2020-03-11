<?php


namespace app\widgets\blog;


class Blog
{
//    public $categoryId;

    public function getCount($categoryId)
    {
//        $categoryId = $this->categoryId;
        $articles = \R::getAll('SELECT * FROM news WHERE category_id = ' . $categoryId);
        $count = count($articles);
        return $count;
    }
}