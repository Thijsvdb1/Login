<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }
        // Hier word je naar de profile.index pagina gelinked

    public function update(User $user, Request $request)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => now()
        ]);

        return redirect()->route('profile')
                        ->with('profile','Profile updated successfully!');
    }
        // Hier word je profile geupdate met de nieuw ingevoerde gegevens.
        // (De $request haalt de gegevens op uit de invoer velden)
}
