<?php

use Filament\Facades\Filament;
use Filament\Http\Middleware\SetUpContext;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::domain(config('filament.domain'))
    ->middleware(config('filament.middleware.base'))
    ->name('filament.')
    ->group(function () {
        Route::prefix(config('filament.core_path'))->group(function () {
            Route::post('/logout', function (Request $request): LogoutResponse {
                Filament::auth()->logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return app(LogoutResponse::class);
            })->name('auth.logout');
        });

        Route::prefix(config('filament.path'))->group(function () {
            if ($loginPage = config('filament.auth.pages.login')) {
                Route::get('/login', $loginPage)->name('auth.login');
            }

            Route::middleware(config('filament.middleware.auth'))->group(function (): void {
                Route::name('pages.')->group(function (): void {
                    foreach (Filament::getPages() as $page) {
                        Route::group([], Closure::fromCallable([$page, 'routes']));
                    }
                });

                Route::name('resources.')->group(function (): void {
                    foreach (Filament::getResources() as $resource) {
                        Route::group([], Closure::fromCallable([$resource, 'routes']));
                    }
                });
            });
        });
    });
