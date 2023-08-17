<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Admin\Departments;
use Illuminate\Support\Facades\View;

class DepartmentNamesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MyServiceInterface::class, MyServiceImpl::class);
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // In a service provider's boot method or similar location
        View::composer('*', function ($view) {
            $phaseLabels = [
                1 => '1st',
                2 => '2nd',
                3 => '3rd',
                4 => '4th',
                // Add more phases if needed
            ];

            $departmentData = Departments::orderBy('phase')
                ->get(['id', 'name', 'phase', 'slug'])
                ->groupBy('phase');

            $transformedData = $departmentData->map(function ($departments, $phase) use ($phaseLabels) {
                return [
                    'phase_label' => $phaseLabels[$phase],
                    'departments' => $departments,
                ];
            });

            $view->with('departmentNames', $transformedData);
        });
    }
}
