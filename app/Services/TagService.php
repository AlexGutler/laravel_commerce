<?php
namespace CodeCommerce\Services;

use CodeCommerce\Repositories\TagRepository;

class TagService
{
    private $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function create($data)
    {
        $tag = $this->tagRepository->create($data);

        return $tag;
    }

}