<?php

namespace App\Http\Controllers\Users\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Job;
use App\Application;
use App\User;
use App\Resume;

class ViewApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:client');
    }


    public function index()
    {
        $cID = auth()->user()->id;
        $jobs = Job::whereClientId($cID)->get();
        return view('client.application.index', compact('jobs'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        $cID = auth()->user()->id;
        $jobs = Job::whereClientId($cID)->get();
        $applications = Application::whereJobId($job->id)->orderBy('id', 'desc')->get();
        return view('client.application.index', compact('jobs', 'applications'));
    }

    public function view_applicant(Application $application)
    {
        $user = User::whereId($application->user_id)->first();
        $resume = Resume::whereUserId($application->user_id)->whereId($application->resume_id)->first();
        dd($resume);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
