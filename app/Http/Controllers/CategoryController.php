<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Auth\Events\Validated;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest()->paginate(10);
        return view('category.index', compact('category'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        

        Category::create($request->validated());

        return redirect('category.index')->with('success','Categorie ajouter avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categorie)
    { 
        return view('category.show', compact('category'));
    }

    public function showBySlug($slug){
        $category = Category::all($slug);
        if (!$category) {
            return response()->json(['message' => 'Catégorie non trouvée'], 404);
        }

        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $category->update($request->validated());

       

        return redirect()->route('category.index')->with('success', 'Catégorie mise à jour.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Catégorie supprimée.');
    }
}
