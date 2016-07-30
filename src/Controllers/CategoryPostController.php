<?php

namespace Lembarek\Admin\Controllers;

use Lembarek\Admin\Requests\CreateCategoryPostRequest;

class CategoryPostController extends Controller
{


    public function __construct()
    {
    }

    /**
     * attach post to a category
     *
     * @param  string  $
     * @return Response
     */
    public function store(CreateCategoryPostRequest $request)
    {
        $post = $this->postRepo->find($request->get('post_id'));
        $category = $this->categoryRepo->find($request->get('category_id'));

        $post->attachCategory($category);
    }
}
