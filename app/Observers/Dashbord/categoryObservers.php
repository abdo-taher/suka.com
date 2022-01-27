<?php

namespace App\Observers\Dashbord;

use App\Models\Dashbord\Category;

class categoryObservers
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Dashbord\Category  $Category
     * @return void
     */
    public function created(Category $Category)
    {

    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Dashbord\Category  $Category
     * @return void
     */
    public function updated(Category $Category)
    {



    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Dashbord\Category  $Category
     * @return void
     */
    public function deleted(Category $Category)
    {
        $Category->translationCat()->delete();
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Dashbord\Category  $Category
     * @return void
     */
    public function restored(Category $Category)
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Dashbord\Category  $Category
     * @return void
     */
    public function forceDeleted(Category $Category)
    {
        //
    }
}
