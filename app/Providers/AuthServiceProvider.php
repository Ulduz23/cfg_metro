<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Slide\Slide;
use App\Models\Banner\Banner;
use App\Models\Contact\Contact;
use App\Models\Gallery\Gallery;
use App\Policies\SlidePolicy;
use App\Policies\BannerPolicy;
use App\Policies\ContactPolicy;
use App\Policies\GalleryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Contact::class => ContactPolicy::class,
        Gallery::class => GalleryPolicy::class,
        Slide::class => SlidePolicy::class,
        Banner::class => BannerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
