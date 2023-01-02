<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
use App\Http\Requests\StoreRecruitRequest;
use App\Http\Requests\UpdateRecruitRequest;

class RecruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecruitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecruitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recruit  $recruit
     * @return \Illuminate\Http\Response
     */
    public function show(Recruit $recruit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recruit  $recruit
     * @return \Illuminate\Http\Response
     */
    public function edit(Recruit $recruit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecruitRequest  $request
     * @param  \App\Models\Recruit  $recruit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecruitRequest $request, Recruit $recruit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recruit  $recruit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recruit $recruit)
    {
        //
    }
}
