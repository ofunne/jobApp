
@extends('layouts.panelapp')

@section('title')
    Applications | BlogApp 
@endsection

@section('page_title')
    Applications
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Listed Applications </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-4">
                            <ul>
                                @if (!empty($jobs))
                                    @forelse ($jobs as $job)
                                        <li><a href="/client/applications/{{$job->job_slug}}">{{$job->job_title}}</a></li>
                                    @empty
                                        <li>No data</li>
                                    @endforelse                            
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-8">
                            @if (!empty($applications))
                                <h3>Applicants</h3>
                                <table  id="datatable" class="table table-striped projects">
                                    <thead>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($applications as $application)
                                            <tr>
                                                <td> {{$application->user->name}} </td>
                                                <td> <a href="/storage/resumes/{{$application->resume->resume_file}}" download="{{$application->resume->resume_file}}"><button type="button" class="btn btn-primary"><i class="fa fa-fw fa-download"></i></span></button></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td> Empty </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                    

                    <br>
                    
                         
                </div>
                
            </div>
        </div>
    </div>
  
@endsection

@section('script')
    
@endsection