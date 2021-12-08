<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        return view('admin.menu.list', [
            'company' => $company,
            'menus' => $company->menus()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        return view('admin.menu.form', [
            'company' => $company
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
        Menu::create([
            'company_id' => $company->getKey('id'),
            'name' => $request->name,
        ]);

        return redirect()->route('company.menu.index', $company);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Company $company, Menu $menu)
    {
        return view('admin.menu.show', compact('company', 'menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Company $company, Menu $menu)
    {
        return view('admin.menu.form', compact('company', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Menu         $menu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Company $company, Menu $menu)
    {
        $menu->update($request->only(['name']));
        return redirect()->route('company.menu.index', compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company, Menu $menu)
    {
        $menu->delete();

        return redirect()->route('company.menu.index', compact('company'));
    }
}
