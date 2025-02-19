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
        $category = Category::getCategory();
        return view('categories.index', compact($category));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $request -> validate([
            'nom'=>'required|unique:categorie|max:255',
            'slug' => 'required|unique:categorie|max:255'
        ]);

        Category::createCategory($request->only(['nom', 'slug']));

        return redirect('categorie.index')->with('success','Categorie ajouter avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categorie)
    { 
        return view('categories.show', compact('categorie'));
    }

    public function showBySlug($slug){
        $categorie = Category::getBySlug($slug);
        if (!$categorie) {
            return response()->json(['message' => 'Catégorie non trouvée'], 404);
        }

        return response()->json($categorie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $categorie)
    {
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $categorie)
    {
        $request->validate([
            'nom' => 'required|max:255|unique:categories,nom,' . $categorie->id,
            'slug' => 'required|max:50|unique:categorie,slug' . $categorie->id ,
        ]);

        $categorie->updateCategorie($request);

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $categorie)
    {
        $categorie->deleteCategorie();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée.');
    }
}
