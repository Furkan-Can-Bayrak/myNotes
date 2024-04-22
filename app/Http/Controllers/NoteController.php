<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mockery\Matcher\Not;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $notes =Note::where('user_id',Auth::user()->id)->latest('updated_at')->paginate(8);

        return view('front.notes.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ],[
            'title.required' => 'Başlık boş bırakılamaz'
        ]);

        $note =new Note();
        $note->user_id =Auth::user()->id;
        $note->title = $request->title;
        $note->content = $request->content;
        $note->uuid =Str::uuid();
        $note->save();

        return redirect()->route('indexNote')->with('success','Not Oluşturuldu');
    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {

        $note =Note::where('uuid',$uuid)->first();

        if(Auth::user()->id != $note->user_id){
            return redirect()->back();
        }

        return view('front.notes.show',compact('note'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid)
    {

        $note =Note::where('uuid',$uuid)->first();

        if(Auth::user()->id != $note->user_id){
            return redirect()->back();
        }

        return view('front.notes.edit',compact('note'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ],[
            'title.required' => 'Başlık boş bırakılamaz'
        ]);


        $note = Note::where('id',$request->id)->first();
        $note->title =$request->title;
        $note->content = $request->content;
        $note->save();

        return redirect()->route('showNote',$note->uuid)->with('success','Not güncellendi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
