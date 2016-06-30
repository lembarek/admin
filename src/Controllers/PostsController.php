<?php

namespace Lembarek\Admin\Controllers;

use App\Http\Requests;
use Lembarek\Admin\Requests\UpdatePostRequest;
use Lembarek\Blog\Repositories\PostRepositoryInterface;

class PostsController extends Controller
{
    protected $postRepo;

    public function __construct(PostRepositoryInterface $postRepo)
    {

        $this->postRepo = $postRepo;
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $posts = $this->postRepo->getPaginatedAndOrdered();
        return view('admin::posts.index', compact('posts'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $post = $this->postRepo->find($id);
        return view('admin::posts.edit', compact('post'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  UpdatePostRequest  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = $this->postRepo->find($id);
        $post->update($request->except('_method', '_token'));
        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
    }
}
