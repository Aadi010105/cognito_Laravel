<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/oauth/callback', function (Request $request) {
    // Retrieve the grant code from the request
    $grantCode = $request->get('code');

    // Make a POST request to the token endpoint
    $response = Http::asForm()
        ->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic NzB0ODg0NnJoOXVjNDhwaTRqMTVuc3BuMG46MTFtc3JxZGNxNmI5b3M0NGducTRtOWtnMTg0MnRhbG5pZWVjMWZxN3VyMnRyYW12MWpxZA==',
        ])
        ->withOptions(['verify' => false])
        ->post('https://us-west-2fm8jdrdnr.auth.us-west-2.amazoncognito.com/oauth2/token', [
            'grant_type' => 'authorization_code',
            'code' => $grantCode,
            'redirect_uri' => 'http://localhost:8000/oauth/callback',
        ]);

    // Decode the response
    $decodedResponse = json_decode($response->body());
    $accessToken = $decodedResponse->access_token;

    // Make a GET request to the userInfo endpoint
    $userInfoResponse = Http::withHeaders([
        'Content-Type' => 'application/x-www-form-urlencoded',
        'Authorization' => 'Bearer ' . $accessToken,
    ])->get('https://us-west-2fm8jdrdnr.auth.us-west-2.amazoncognito.com/oauth2/userInfo');

    // Decode the user info response
    $data = json_decode($userInfoResponse->body(), true);

    // Return the view with the data
    return view('index', ['data' => $data]);
});
require __DIR__.'/auth.php';
