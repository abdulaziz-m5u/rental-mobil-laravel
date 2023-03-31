<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\TeamRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::get();

        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        if($request->validated()){
            $photo = $request->file('photo')->store(
                'team/photo', 'public'
            );

            Team::create($request->except('photo') + ['photo' => $photo]);
        }

        return redirect()->route('admin.teams.index')->with([
            'message' => 'berhasil di buat',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, Team $team)
    {
        if($request->validated()) {
            if($request->photo) {
                File::delete('storage/' . $team->photo);
                $photo = $request->file('photo')->store(
                    'team/photo', 'public'
                );
                $team->update($request->except('photo') + ['photo' => $photo]);
            }else {
                $team->update($request->validated());
            }
        }

        return redirect()->route('admin.teams.index')->with([
            'message' => 'berhasil di edit',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        File::delete('storage/'. $team->photo);
        $team->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus',
            'alert-type' => 'danger'
        ]);
    }
}
