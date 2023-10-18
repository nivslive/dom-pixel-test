<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\{ProductStoreRequest, ProductUpdateRequest};

class ProductController extends Controller
{
    /**
     * Display a listing of the product.
     */
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        try {
            Product::create($request->validated());
            $request->session()->flash('status', ['message' => 'Produto cadastrado com sucesso!', 'type' => 'PRODUCT-CREATED-SUCCESS']);
            return back();
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Erro ao cadastrar o produto.']);
        }
    }

    /**
     * Display the specified product.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return back()->withErrors(['error' => 'Produto não encontrado.']);
        }
        return $product;
    }

    /**
     * Update the specified product in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                return back()->withErrors(['error' => 'Produto não encontrado.']);
            }
            $product->update($request->validated());
            $request->session()->flash('status', ['message' => 'Produto atualizado com sucesso!', 'type' => 'PRODUCT-UPDATED-SUCCESS']);
            return back();
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Erro ao atualizar o produto.']);
        }
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                return back()->withErrors(['error' => 'Produto não encontrado.']);
            }
            $product->delete();
            $request->session()->flash('status', ['message' => 'Produto deletado com sucesso!', 'type' => 'PRODUCT-DELETED-SUCCESS']);
            return response()->json(['message' => 'Produto deletado com sucesso!']);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erro ao excluir o produto.']);
        }
    }
}
