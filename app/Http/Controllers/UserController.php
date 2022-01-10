<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function contributorRequestForm()
    {
        $categories = Category::all();

        return view("contributor.insert", compact('categories'));
    }

    public function contributorRequest(Request $request)
    {
        if ($request->hasFile('image')) {
            $data = $request->except('_token');
            $data["type"] = "proposal";
            $data["user_id"] = Auth::user()->id;

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $originalImage = $request->file('image');
            $originalImage->move(public_path() . '/images/informations/', $fileNameToStore);
            $data["image"] = '/images/informations/' . $fileNameToStore;

            $info = Article::create($data);
            if (!is_null($info)) {

                // Nek raduwe relasi karo proposal langsung dadi editor proposal
                $editor = User::whereHas('roles', function ($q) {
                    $q->where('name', 'editor');
                })
                    ->doesnthave('proposals')
                    ->get();

                if ($editor->isEmpty()) {
                    // Ambil editor yang punya proposal
                    $editor = User::withCount(['proposals', 'proposals as pending_proposals_count' => function (Builder $query) {
                        $query->where('status', 'active');
                    }])
                        ->whereHas('roles', function ($q) {
                            $q->where('name', 'editor');
                        })
                        // Sort editor yang mempunyai proposal paling sedikit
                        ->orderBy('pending_proposals_count', 'asc')
                        ->first();
                } else {
                    $editor = $editor[0];
                }

                $proposal = Proposal::create([
                    'editor_id' => $editor->id,
                    'article_id' => $info->id
                ]);

                return redirect()->route('dashboard')->with('success', 'Success! proposal terkirim, mohon menunggu email dari kami');
            } else {
                return redirect()->route('patient')->with('failed', 'Alert! terjadi kesalahan');
            }
        }
    }
}
