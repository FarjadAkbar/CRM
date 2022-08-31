@extends('layouts.app')


@section('content')
{{-- <x-header title="Brief of {{$brief->website_title}}" description="" /> --}}
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">{{$brief->website_title}} Brief</h6>
        {{-- <a href="{{ route('brief.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a> --}}
    </div>
    <div class="card-body">
        <h3><b>Creative</b></h3>
        <hr>

        <x-breifview label="Website Title">{{$brief->website_title}}</x-breifview>
        <x-breifview label="Purpose">{{$brief->purpose}}</x-breifview>
        <x-breifview label="Objective">{{$brief->objective}}</x-breifview>
        <x-breifview label="Project Target">{{$brief->project_target}}</x-breifview>
        <x-breifview label="Brand Target">{{$brief->brand_target}}</x-breifview>
        <x-breifview label="Desire Dreaction">{{$brief->desired_reaction}}</x-breifview>
        <x-breifview label="Competitor">{{$brief->competitor}}</x-breifview>
        <x-breifview label="Design">{{$brief->design}}</x-breifview>
        <x-breifview label="Positive Aspects">{{$brief->postive_aspects}}</x-breifview>
        <x-breifview label="Negative Aspects">{{$brief->negative_aspects}}</x-breifview>
        <x-breifview label="Traffic Levels">{{$brief->traffic_levels}}</x-breifview>
        <x-breifview label="Current Performance">{{$brief->current_performance}}</x-breifview>
        <x-breifview label="Currrent Hosting">{{$brief->currrent_hosting}}</x-breifview>
        <x-breifview label="Negative Hosting">{{$brief->negative_hosting}}</x-breifview>
        <x-breifview label="Additional Information">{{$brief->additional_information}}</x-breifview>
        <x-breifview label="Files">
            @php
                $filesname = json_decode($brief->filesname)
            @endphp    
             @php
                $filesname = json_decode($brief->filesname);
            @endphp
            @if(is_array($filesname))
                @foreach ($filesname as $file)
                    <a href="{{ url('files/'.$file) }}" class="btn btn-light" download>Dowanload</a>
                @endforeach
            @else
                <a href="{{ url('files/'.$brief->filesname) }}" class="btn btn-light" download>Dowanload</a>
            @endif    
        </x-breifview>
    </div>
</div>

@endsection