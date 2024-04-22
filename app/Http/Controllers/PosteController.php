<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Idee;
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
            'idee_id' => 'required|exists:idees,id'
        ]);

        $commentaire = new Commentaire();
        $commentaire->contenu = $validatedData['addComment'];
        $commentaire->user_id = auth()->user()->id;
        $commentaire->idee_id = $validatedData['idee_id'];
        $commentaire->save();
        
        return back()->with('success', 'Votre commentaire a été créée avec succès.');
    }
    
    public function show_poste($id)
    {
        $postes = Idee::find($id);
        $postes->isHidden = 0;
        $postes->save();
        return redirect()->route('postes');
    }
    public function hide_poste($id)
    {
        $postes = Idee::find($id);
        $postes->isHidden = 1;
        $postes->save();
        return redirect()->route('postes');
    }

}
