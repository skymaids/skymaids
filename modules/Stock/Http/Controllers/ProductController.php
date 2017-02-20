<?php

namespace Modules\Stock\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\Stock\Http\Requests\ProductRequest;
use Modules\Stock\Repositories\ProductRepository;

/**
 * Class ProductController
 * @package Modules\Stock\Http\Controllers
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 31/01/2017
 * @version 1.0
 */
class ProductController extends BaseController
{
    protected $repository;

    /**
     * ProductController constructor.
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository  = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->repository->all();
        return $product;
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
     * @param  ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $product = $this->repository->create($request->all());
        return response()->json($product, 201);
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
        $product = $this->repository->find($id);
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param  ProductRequest $request
     * @param  string $id
     * @return Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = $this->repository->update($request->all(), $id);
        return response()->json($product,201);
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

