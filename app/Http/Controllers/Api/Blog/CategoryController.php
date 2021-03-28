<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryResourceCollection;
use App\Models\Blog\Category;
use Phpsa\LaravelApiController\Http\Api\Controller;

class CategoryController extends Controller
{

    protected $resourceSingle = CategoryResource::class;

    protected $resourceCollection = CategoryResourceCollection::class;

    /**
     * Set the default sorting for queries.
     *
     * @var string
     */
    protected $defaultSort = 'title asc';

    /**
     * Number of items displayed at once if not specified.
     * There is no limit if it is 0 or false.
     *
     * @var int
     */
    protected $defaultLimit = 25;

    /**
     * Maximum limit that can be set via $_GET['limit'].
     * 0 allows disabling the pager
     *
     * @var int
     */
    protected $maximumLimit = 0;


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
     * @param  App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
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
     * @param  App\Http\Requests\CategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        return $this->handleUpdateAction($id, $request);
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

    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return Category::class;
    }
}
