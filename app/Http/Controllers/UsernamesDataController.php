<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Models\ListUsernamesData;


class UsernamesDataController extends Controller
{
    /**
     * Upload usernames.
     */
    public function upload(Request $request): RedirectResponse
    {
        $handle = fopen($request->file('listUsernamesData'), 'r');
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $verify = ListUsernamesData::where('username', '=', $line)->first();
                
                if ($verify === null) {
                    $data = [
                        'username' => $line,
                    ];
    
                    ListUsernamesData::create($data);
                }
            }

            fclose($handle);
        }

        // $request->user()->save();

        return Redirect::route('dashboard');
    }
}
