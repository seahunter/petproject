<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Product;
use App\Models\Menu;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private Menu $menu;

    public function __construct(Product $product, Menu $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Company $company)
    {

        return view('admin.product.list', [
            'company' => $company,
            'products' => $company->products()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        $menus = $this->menu->getMenuByCompanyId($company->id);
        return view('admin.product.form', [
            'company' => $company,
            'menus' => $menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Company $company)
    {
        Product::create([
            'company_id' => $company->id,
            'name' => $request->name,
            'weight' => $request->weight,
            'price' => $request->price,
            'active' => $request->active,
            'menu_id' => $request->menu_id
        ]);

        return redirect()->route('company.product.index', $company);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Company $company, Product $product)
    {
        return view('admin.product.show', compact('company', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Company $company, Product $product)
    {
        $menus = $this->menu->getMenuByCompanyId($company->id);

        return view('admin.product.form', compact('company', ['menus', 'product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product      $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Company $company, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'weight' => $request->weight,
            'price' => $request->price,
            'active' => isset($request->active) ? 1 : 0,
            'menu_id' => $request->menu_id
        ]);
        return redirect()->route('company.product.index', compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company, Product $product)
    {
        $product->delete();

        return redirect()->route('company.product.index', compact('company'));
    }
}
