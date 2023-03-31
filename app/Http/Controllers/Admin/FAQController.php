<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listFAQs = FAQ::all();
        return view('admin.pages.faq.list_faq', compact('listFAQs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.faq.add_faq');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => ['required', 'max:255'],
            'answer' => ['required', 'max:255'],
        ]);

        FAQ::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = [
            'message' => 'Create FAQ Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getFAQById = FAQ::find($id);
        return view('admin.pages.faq.edit_faq', compact('getFAQById'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => ['required', 'max:255'],
            'answer' => ['required', 'max:255'],
        ]);

        FAQ::updateOrCreate(['id' => $id], [
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = [
            'message' => 'Updated FAQ Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $getFAQ = FAQ::findOrFail($id);

        $getFAQ->delete();

        $notification = [
            'message' => 'Delete FAQ Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}