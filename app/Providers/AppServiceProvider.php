<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;

use Auth;
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
        // fix MySQL string error
        Schema::defaultStringLength(191);

        // custom Blade Directives
        Blade::if('permission', function($test){
            $r = false;
            if(Auth::check()){
                // test if user is an Admin

                // make the test an array
                if(!is_array($test)) $test = [$test, null];
                if(count($test) < 2) array_push($test, null);
                list($permission, $obj_id) = $test;

                // test if user has appropriate permission
                if($obj_id == null){
                    $r = Auth::user()->permissions()->where('name', $permission)->first() != null;
                }else{
                    $r = Auth::user()->permissions()->where([
                                ['name', $permission],
                                ['obj_id', $obj_id]
                            ])->first() != null;
                }
            }

            return $r;
        });

        // custom Form components
        Form::component('FileGroup', 'components.form.FileGroup', ['name', 'label' => null, 'description' => null, 'attributes' => []]);
        Form::component('JSColor', 'components.form.JSColor', ['name', 'label' => 'Color', 'description' => null, 'attributes' => [], 'value' => randomHexColor()]);
        Form::component('SelectGroup', 'components.form.SelectGroup', ['name', 'label' => null, 'items' => [], 'key' => 'id', 'value' => 'value', 'description' => null, 'attributes' => []]);
        Form::component('TextGroup', 'components.form.TextGroup', ['name', 'label' => null, 'description' => null, 'value' => null, 'attributes' => []]);
        Form::component('TextAreaGroup', 'components.form.TextAreaGroup', ['name', 'label' => null, 'description' => null, 'value' => null, 'attributes' => []]);

        Form::component('DestroyBtn', 'components.form.DestroyBtn', ['route', 'id', 'label' => 'Delete', 'attributes' => []]);
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
