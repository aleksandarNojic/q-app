<?php

use App\Services\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['customAuth'])->group(function () {
    /**
     * All routes with authors prefix
     */
    Route::prefix('authors')->group(function () {
        /**
         * Single authors view page
         */
        Route::get('', function (Client $client) {
            $response = $client->get('authors', ['limit' => 30]);

            return view('authors', ['authors' => $response->items]);
        })->name('authors');

        /**
         * Single author view page
         */
        Route::get('/{author_id}', function (Request $request, Client $client) {
            $author = $client->get("authors/{$request->author_id}");

            return view('authors', ['authorWithBooks' => $author]);
        });

        /**
         * Delete author route
         */
        Route::delete('/{author_id}/delete', function (Request $request, Client $client) {
            $client->delete("authors/{$request->author_id}");

            return redirect('authors');
        });
    });

    /**
     * All routes with books prefix
     */
    Route::prefix('books')->group(function () {
        /**
         * Store book view page
         */
        Route::get('', function (Client $client) {
            $response = $client->get('authors');

            return view('store_books', ['authors' => $response->items]);
        })->name('books');

        /**
         * Store book route
         */
        Route::post('', function (Request $request, Client $client) {
            $credentials = $request->validate([
                'title' => ['required', 'string'],
                'author_id' => ['required'],
                'description' => ['required', 'string'],
                'release_date' => ['required', 'date'],
                'isbn' => ['required', 'string'],
                'format' => ['required', 'string'],
                'number_of_pages' => ['required', 'integer'],
            ]);

            $credentials['number_of_pages'] = (int) $credentials['number_of_pages'];
            $credentials['author'] = ['id' => (int) $credentials['author_id']];
            unset($credentials['author_id']);
            $response = $client->post('books', $credentials);

            if (isset($response->id)) {
                return redirect()->back()->with('success', 'Book succesfully created');
            }

            return redirect()->back()->with('error', $response->title);
        })->name('book_store');

        /**
         * Delete book route
         */
        Route::delete('/{book_id}/delete', function (Request $request, Client $client) {
            $client->delete("books/{$request->book_id}");

            return redirect()->back();
        });
    });

    /**
     * Logout route
     */
    Route::get('/logout', function () {
        session()->flush();

        return redirect('login');
    })->name('logout');
});

Route::middleware(['guest'])->group(function () {
    /**
     * Login view
     */
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    /**
     * Login route
     */
    Route::post('/signin', function (Client $client, Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $response = $client->post('token', $credentials);

        if (isset($response->token_key)) {
            session([
                'token_key' => $response->token_key,
                'user' =>  $response->user->first_name . " " . $response->user->last_name
            ]);

            return redirect('authors');
        }


        return redirect("login")->with('error', 'Signin error!');
    });
});
