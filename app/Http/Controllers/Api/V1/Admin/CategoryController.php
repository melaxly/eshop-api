<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function store(CategoryRequest $request): CategoryResource
    {
        // Check if the request has an 'image' file.
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Store the image file in the 'public/category' directory.
            $imagePath = $image->store('category', 'public');
        }

        // Create a new category using the validated request data.
        $category = Category::create($request->validated());

        // Update the category's 'image' field with the file path. If an image file was uploaded
        if (isset($imagePath)) {
            $category->image = $imagePath;
            $category->save();
        }

        // Transform the category data into a JSON response using the CategoryResource.
        return new CategoryResource($category);
    }

    public function update(Category $category, CategoryRequest $request)
    {
        // Check if the request has an 'image' file.
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Store the image file in the 'public/category' directory.
            $imagePath = $image->store('category', 'public');

            // Delete old category image
            if ($category->image !== null) {
                Storage::delete('public/' . $category->image);
            }
        }

        // Update Category and store the Image path in the DB
        if ($category->update($request->validated())) {
            if (isset($imagePath)) {
                $category->image = $imagePath;
                $category->save();
            }     
        }

        return new CategoryResource($category);

    }

}
