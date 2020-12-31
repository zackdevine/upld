<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Domain;
use App\Models\Subdomain;
use App\Models\UserUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function uploads ()
    {
        return view('user.uploads', [ 'uploads' => UserUpload::where('user_id', Auth::id())->paginate(15) ]);
    }

    public function updateSubdomain (Request $request)
    {
        $request->validate([
            'subdomain' => 'required|alpha_dash|unique:subdomains'
        ]);

        Subdomain::updateOrCreate(
            [ 'user_id'     => Auth::id() ],
            [ 'subdomain'   => $request->subdomain ]
        );

        return redirect()->route('user.subdomain');
    }

    public function updateDomain (Request $request)
    {
        $request->validate([
            'domain' => 'required|string|unique:domains'
        ]);

        Domain::updateOrCreate(
            [ 'user_id'  => Auth::id() ],
            [ 'domain'   => $request->domain ]
        );

        return redirect()->route('user.domain');
    }

    public function doUpload (Request $request)
    {
        $request->validate([
            'file'  => 'required|image|max:10240'
        ]);

        $user = Auth::user();

        if ($file_path = $request->file('file')->storePublicly("uploads/$user->user_id", 's3'))
        {
            if ($upload = UserUpload::create([
                'user_id'   => $user->id,
                'file_id'   => Str::random(16),
                'path'      => $file_path
            ]))
            {
                return route('user.uploads');
            }
        }
        return back();
    }
}