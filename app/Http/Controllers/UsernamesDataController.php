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
                        'username' => str_replace(array("\r", "\n"), '', $line),
                    ];
    
                    ListUsernamesData::create($data);
                }
            }

            fclose($handle);
        }

        return Redirect::route('dashboard');
    }

    /**
     * Filter usernames.
     */
    public function filter(Request $request)
    {
        // dd($request->age);
        $listUsernamesData = ListUsernamesData::query();

        $age = $request->age;
        $gender = $request->gender;
        $race = $request->race;

        if ($age != null) {
            if ($age == 0) {
                $listUsernamesData = $listUsernamesData->where([
                    ['age', '>=', 0],
                    ['age', '<=', 20]
                ]);
            } else if ($age == 21) {
                $listUsernamesData = $listUsernamesData->where([
                    ['age', '>=', 21],
                    ['age', '<=', 30]
                ]);
            } else if ($age == 31) {
                $listUsernamesData = $listUsernamesData->where([
                    ['age', '>=', 31],
                    ['age', '<=', 40]
                ]);
            } else if ($age == 41) {
                $listUsernamesData = $listUsernamesData->where([
                    ['age', '>=', 41],
                    ['age', '<=', 50]
                ]);
            } else {
                $listUsernamesData = $listUsernamesData->where([
                    ['age', '>=', 51]
                ]);
            }
        }
        
        if ($gender != null) {
            if ($gender == 'Male') {
                $listUsernamesData = $listUsernamesData->where([
                    ['gender', '=', 'Male']
                ]);
            } else if ($gender == 'Female') {
                $listUsernamesData = $listUsernamesData->where([
                    ['gender', '=', 'Female']
                ]);
            }
        }

        if ($race != null) {
            $listUsernamesData = $listUsernamesData->where([
                ['race', '=', $race]
            ]);
        }
            
        $listUsernamesData = $listUsernamesData->get();

        return view('dashboard.partials.usernames-data-table', compact('listUsernamesData'));
    }
}
