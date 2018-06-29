<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Form;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // custom Form components
        Form::component('FileGroup', 'components.form.FileGroup', ['name', 'label' => null, 'description' => null, 'attributes' => []]);
        Form::component('SelectGroup', 'components.form.SelectGroup', ['name', 'label' => null, 'items' => [], 'key' => 'id', 'value' => 'value', 'description' => null, 'attributes' => []]);
        Form::component('TextGroup', 'components.form.TextGroup', ['name', 'label' => null, 'description' => null, 'value' => null, 'attributes' => []]);
        Form::component('TextAreaGroup', 'components.form.TextAreaGroup', ['name', 'label' => null, 'description' => null, 'value' => null, 'attributes' => []]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
