<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Idee;
use App\Models\User;
use App\Models\user_follows_Category;
use App\Models\user_follows_Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PosteController extends Controller
{
    public function postes(Request $request)
    {
        $postes = Idee::all();
        return view('admin.postes', compact('postes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
        ]);

        $imageName = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }

        $idee = Idee::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'image' => $imageName,
            'isHidden' => 0,
        ]);

        $tags = $request->input('tags', []);
        $idee->tags()->attach($tags);

        return back()->with('success', 'Votre idée a été créée avec succès.');
    }

    public function editPost(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'imgActuelle' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }

        $idee = Idee::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'image' => $imageName,
            'isHidden' => 0,
        ]);

        $tags = $request->input('tags', []);
        $idee->tags()->attach($tags);

        return back()->with('success', 'Votre idée a été créée avec succès.');
    }
    public function follow_tag(Request $request)
    {

        user_follows_Tag::create([
            'user_id' => auth()->id(),
            'tag_id' => $request->tag_id,
        ]);

        return back()->with('success', 'Votre idée a été créée avec succès.');
    }
    public function follow_category(Request $request)
    {

        user_follows_Category::create([
            'user_id' => auth()->id(),
            'category_id' => $request->cat_id,
        ]);

        return back()->with('success', 'Votre idée a été créée avec succès.');
    }

    public function addComment(Request $request)
    {
        $validatedData = $request->validate([
            'addComment' => 'required|string',
            'post_id' => 'required|exists:idees,id'
        ]);

        $commentaire = new Commentaire();
        $commentaire->contenu = $validatedData['addComment'];
        $commentaire->user_id = auth()->user()->id;
        $commentaire->idee_id = $validatedData['post_id'];
        $commentaire->save();

        $commentaire = Commentaire::with('user')->find($commentaire->id);

        $newCommentHtml = view('partials.comment', compact('commentaire'))->render();

        return $newCommentHtml;
    }


    public function show_poste($id)
    {
        $postes = Idee::find($id);
        $postes->isHidden = 0;
        $postes->save();
        return redirect()->route('postes');
    }
    public function search(Request $request)
    {
        $search = $request->input('q');

        $postes = Idee::where('titre', 'like', '%' . $search . '%')->paginate(3);
        $user = User::find(Auth::user()->id);

        $view = view('search_results', compact(['postes', 'user']))->render();

        return response()->json(['html' => $view]);
    }
    public function hide_poste($id)
    {
        $postes = Idee::find($id);
        $postes->isHidden = 1;
        $postes->save();
        return redirect()->route('postes');
    }
    public function poste_details($id)
    {
        $user = User::find(Auth::user()->id);
        $poste = Idee::find($id);
        return view('SinglePost', compact(['poste', 'user']));
    }
    public function deletePoste($id)
    {
        $poste = Idee::find($id);
        $poste->delete();
        return back();
    }


}
