<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::post('/register', function () {
    $user =  User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password
    ]);

    return response()->json([
        'user' =>  $user
    ]);
});


Route::get('/login', function (Request $request) {
    $check = Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
    ]);

    if ($check) {
        $token = $request->user()->createToken('token-name');
        return ['token' => $token->plainTextToken];
    } else {
        return response(['error' =>  'email or password errors !'], 401);
    };
});


Route::post('/upadate_user', function () {
    $get = User::find(1);
    $get->name = 'theEngs';
    $get->save();

    //web hook
    $response = Http::post(env('URL'));
    if ($response->successful()) {
        return $response->json();
    } else {
        return response()->json(['error' => 'Request failed'], $response->status());
    }
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
