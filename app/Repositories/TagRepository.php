<?php
namespace CodeCommerce\Repositories;
use CodeCommerce\Tag;

class TagRepository
{
    private $tag;
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function all()
    {
        return $this->tag->all();
    }

    public function create($data)
    {
        return 1;
    }
}