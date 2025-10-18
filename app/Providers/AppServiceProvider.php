<?php

namespace App\Providers;

use App\Models\Application;
use App\Models\Document;
use App\Policies\ApplicationPolicy;
use App\Policies\DocumentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Application::class => ApplicationPolicy::class,
        Document::class => DocumentPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}