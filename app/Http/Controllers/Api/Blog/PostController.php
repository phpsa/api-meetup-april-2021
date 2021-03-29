<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostResourceCollection;
use App\Models\Blog\Post;
use Phpsa\LaravelApiController\Http\Api\Controller;

class PostController extends Controller
{

    protected $resourceSingle = PostResource::class;

    protected $resourceCollection = PostResourceCollection::class;

    protected $maximumLimit = 100; //lock down 100 most at a time

    protected $defaultSort = 'published_at asc';

    //Discussion point
    protected $includesWhitelist = [
   //    'category'
    ];

    protected $includesBlacklist = [
        // 'user'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->handleIndexAction();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @see self::handleStoreOrUpdateAction to do magic insert / update
     * @param  App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        return $this->handleStoreAction($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->handleShowAction($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {

        return $this->handleUpdateAction($id, $request, [
            'withUnPublished' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->handleDestroyAction($id);
    }


    public function publish(PostRequest $request, $id)
    {
        return $this->handleUpdateAction($id, $request, [
            'withUnPublished' => true
        ]);
    }

    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return Post::class;
    }
}
