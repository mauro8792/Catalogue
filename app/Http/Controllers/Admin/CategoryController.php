<?php

namespace App\Http\Controllers\Admin;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ProductImage;
use App\Model\Product;

class CategoryController extends Controller
{
    
	public function index()
    {
    	$categories = Category::orderBy('name')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories')); // listado
    }

    public function create()
    {
    	return view('admin.categories.create'); // formulario de registro
    }

    public function store(Request $request)
    {
        $this->validate($request, Category::$rules, Category::$messages);

        $category = Category::create($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            
            // update category
            if ($moved) {
                $category->image = $fileName;
                $category->save(); // UPDATE
            }
        }

        return redirect('/admin/categories');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category')); // form de edición
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, Category::$rules, Category::$messages);

        $category->update($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            
            // update category
            if ($moved) {
                $previousPath = $path . '/' . $category->image;

                $category->image = $fileName;
                $saved = $category->save(); // UPDATE

                if ($saved)
                    File::delete($previousPath);
            }
        }        

        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {   
        $product_id = Product::where('category_id', $category->id)->get();
        //dd(count($product_id));
        if( count($product_id)!=0){
            $product_id = Product::where('category_id', $category->id)->get();
            //dd($product_id);
            ProductImage::where('product_id', $product_id)->delete();
            Product::where('category_id', $category->id)->delete();
            $category->delete(); // DELETE
            return back();
        }else{
            $category->delete(); // DELETE
            return back();
        }
    }
}
