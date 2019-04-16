<?php

return [
    // Generator configuration
    'path' => [
        'model' => app_path('Domain/Api/' . config('app.api_version', 'V1') . '/{MODEL_NAME}/Permissions/'),

        'model_permissions' => app_path('Domain/Api/' . config('app.api_version', 'V1') . '/{MODEL_NAME}/Permissions/'),

        'controller' => app_path('Domain/Api/' . config('app.api_version', 'V1') . '/{MODEL_NAME}/Http/Controllers/Api/'),

        'repository' => app_path('Domain/Api/' . config('app.api_version', 'V1') . '/{MODEL_NAME}/Repositories/'),

        'policy' => app_path('Domain/Api/' . config('app.api_version', 'V1') . '/{MODEL_NAME}/Policies/'),

        'auth_test' => base_path('tests/Authentication/'),

        'templates' => 'vendor/krasnikov/json-api-server/resources/templates/',

        'routes' => app_path('Domain/Api/' . config('app.api_version', 'V1') . '/{MODEL_NAME}/Http/Routes/')
    ],

    'namespace' => [
        'model' => 'App\Domain\Api\\' . config('app.api_version', 'V1') .'\\{MODEL_NAME}',

        'model_permissions' => 'App\Domain\Api\\' . config('app.api_version', 'V1') .'\\{MODEL_NAME}\Permissions',

        'controller' => 'App\Domain\Api\\' . config('app.api_version', 'V1') .'\\{MODEL_NAME}\Http\Controllers\Api',

        'repository' => 'App\Domain\Api\\' . config('app.api_version', 'V1') .'\\{MODEL_NAME}\Repositories',

        'policy' => 'App\Domain\Api\\' . config('app.api_version', 'V1') .'\\{MODEL_NAME}\Policies',

        'auth_test' => 'App\Domain\Api\\' . config('app.api_version', 'V1') .'\\{MODEL_NAME}\Tests\Authentication'
    ],

    // Permissions configuration
    'permissions' => [
        'checkDefaultIndexPermission' => false,

        'checkDefaultShowPermission' => false,

        'checkDefaultCreatePermission' => false,

        'checkDefaultUpdatePermission' => false,

        'checkDefaultDeletePermission' => false,
    ],


    // Load all relationships to have response exactly like json api. This slows down the API immensely.
    'loadAllJsonApiRelationships' => true,
];
