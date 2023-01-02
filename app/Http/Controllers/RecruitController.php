<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
use App\Http\Requests\StoreRecruitRequest;
use App\Http\Requests\UpdateRecruitRequest;
use Inertia\Inertia;
use App\Mail\RecruitSendmail;

class RecruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Recruits/Index', [
            'recruits' => Recruit::select('id', 'name', 'email', 'status', 'created_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Recruits/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecruitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecruitRequest $request)
    {
        Recruit::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'member' => $request->member,
            'status' => $request->status,
        ]);

        $params = [
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
        ];
        try {
            \Mail::send(new RecruitSendmail($params)); // メール送信
        } catch (\Exception $e) {
            throw $e;
        }
        return to_route('recruits.thanks');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recruit  $recruit
     * @return \Illuminate\Http\Response
     */
    public function edit(Recruit $recruit)
    {
        return Inertia::render('Recruits/Edit', [
            'recruit' => $recruit
        ]);
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
        $recruit->status = $request->status;
        $recruit->save();
        return to_route('recruits.index')
        ->with([
            'message' => '更新しました。',
            'status' => '成功しました。',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recruit  $recruit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recruit $recruit)
    {
        $contact->delete();
        return to_route('recruits.index')
        ->with([
            'message' => '削除しました。',
            'status' => 'danger',
        ]);
    }

    public function thanks()
    {
        return Inertia::render('Recruits/Thanks');
    }
}
