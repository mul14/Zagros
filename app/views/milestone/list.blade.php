@extends('layouts.milestone.main')

@section('title')
    {{$project->name}} - {{$project->milestone->codename}}
@stop

@section('milestone-navbar')active @stop

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">{{$project->milestone->codename}}</h2>
        @if (Session::has('message'))
            <p class="text-info text-center">{{Session::get('message')}}</p>
        @endif
    </div>

    <div class="col-md-12">
        <h3 class="text-center">Blueprints</h3>
        <div class="table-responsive">
            <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Blueprint title</th>
                        <th>Assignee</th>
                        <th>Importance</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project->milestone->blueprints as $blueprint)
                        <tr>
                            <td><a href="{{URL::action('MilestoneController@getBlueprint', array($project->url, $project->milestone->url, $blueprint->blueprint_id))}}">{{$blueprint->title}}</a></td>
                            <td>
                                @if (isset($blueprint->user_assigned->name))
                                    {{$blueprint->user_assigned->name}}
                                @endif
                            </td>
                            <td>
                                <span style="color: {{Helper::getBlueprintImportanceColor($blueprint->importance)}}">
                                    {{Helper::getBlueprintImportance($blueprint->importance)}}
                                </span>
                            </td>
                            <td>
                                <span style="color: {{Helper::getBlueprintStatusColor($blueprint->status)}}">
                                    {{Helper::getBlueprintStatus($blueprint->status)}}
                                <span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-12">
        <h3 class="text-center">Bugs</h3>
        <div class="table-responsive">
            <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Bug title</th>
                        <th>Assignee</th>
                        <th>Importance</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project->milestone->bugs as $bug)
                        <tr>
                            <td><a href="{{URL::action('MilestoneController@getBug', array($project->url, $project->milestone->url, $bug->bug_id))}}">{{{$bug->title}}}</a></td>
                            <td>
                                @if (isset($bug->user_assigned->name))
                                    {{$bug->user_assigned->name}}
                                @endif
                            </td>
                            <td>
                                <span style="color: {{Helper::getBugImportanceColor($bug->importance)}}">
                                    {{Helper::getBugImportance($bug->importance)}}
                                </span>
                            </td>
                            <td>
                                <span style="color: {{Helper::getBugStatusColor($bug->status)}}">
                                    {{Helper::getBugStatus($bug->status)}}
                                <span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
