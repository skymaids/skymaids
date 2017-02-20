<?php

namespace Modules\Stock\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\Stock\Http\Requests\CategoryRequest;
use Modules\Stock\Repositories\CategoryRepository;

/**
 * Class CategoryController
 * @package Modules\Stock\Http\Controllers
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 31/01/2017
 * @version 1.0
 */
class CategoryController extends BaseController
{
    protected $repository;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository  = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = $this->repository->all();
        return $category;
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('stock::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  CategoryRequest $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->repository->create($request->all());
        return response()->json($category, 201);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('stock::edit');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $category = $this->repository->find($id);
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param  CategoryRequest $request
     * @param  string $id
     * @return Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->repository->update($request->all(), $id);
        return response()->json($category,201);
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return response()->json([],204);
    }
}

