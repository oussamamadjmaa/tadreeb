<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TrainingNeed;
use Illuminate\Http\Request;

class TrainingNeedsController extends Controller
{
    public function index(){
        $training_needs = TrainingNeed::with('category')->latest()->get();
        return view('backend.training_needs.index', compact('training_needs'));
    }   

    
    /**
     * Display Training need.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $need = TrainingNeed::with('category')->findOrFail($id);

        return view('backend.training_needs.show', compact('need'));
    }

    /**
     * Remove Training need from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $need = TrainingNeed::findOrFail($id);
        $need->delete();

        return redirect()->route('admin.training_needs.index')->withFlashSuccess(trans('alerts.backend.general.deleted'));
    }
}
