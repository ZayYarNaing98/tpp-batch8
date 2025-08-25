<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Product\ProductService;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $prodcutService;
    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository, ProductService $prodcutService)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->prodcutService = $prodcutService;
        $this->middleware('auth');
    }

    public function index()
    {
        $products = $this->productRepository->index();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->index();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'category_id' => 'required',
            'image' => 'required',
            'status' => 'nullable',
        ]);

        if($request->hasFile('image'))
        {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('productImages'), $imageName);

            $data = array_merge($data, ['image' => $imageName]);
        }

        $data['status'] = $request->has('status') ? true : false;

        $this->productRepository->store($data);

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $categories = $this->categoryRepository->index();

        $product = $this->productRepository->show($id);

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductUpdateRequest $request)
    {
        $product = $this->productRepository->show($request->id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'status' => $request->status == 'on' ? 1 : 0,
        ]);

        return redirect()->route('products.index');

    }

    public function delete($id)
    {
        $product = $this->productRepository->show($id);

        $product->delete();

        return redirect()->route('products.index');
    }

    public function status($id)
    {
        $this->prodcutService->status($id);

        return redirect()->route('products.index');
    }
}