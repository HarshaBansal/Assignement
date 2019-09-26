<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use File;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Autoload all the helper files.
        $files = File::allFiles(base_path('helpers'));
        
        foreach ($files as $file) {
            $fileName = $file->getRelativePathName();
            require base_path("helpers/{$fileName}");
        }
    }
    
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
