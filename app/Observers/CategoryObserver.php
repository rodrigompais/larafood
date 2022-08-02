<?php

namespace App\Observers;

use App\Models\Admin\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function creating(Category $category)
    {
        $category->url = Str::slug($category->name);
        //dd($category->url);
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updating(Category $category)
    {
        $category->url = Str::slug($category->name);
    }
}
