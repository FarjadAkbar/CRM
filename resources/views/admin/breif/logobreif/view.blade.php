@extends('layouts.app')


@section('content')
{{-- <x-header title="Brief of {{$logobrief->logo_name}}" description="" /> --}}
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">{{$logobrief->logo_name}} Detail</h6>
        {{-- <a href="{{ route('breif.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a> --}}
    </div>
    <div class="card-body">
        <h3><b>Creative</b></h3>
        <hr>
        <x-breifview label="Logo Name">{{$logobrief->logo_name}}</x-breifview>
        <x-breifview label="Slogan">{{$logobrief->slogan}}</x-breifview>
        <x-breifview label="Imagery">{{$logobrief->imagery}}</x-breifview>
        <x-breifview label="Desired Design">{{$logobrief->desired_design}}</x-breifview>
        <x-breifview label="Colors Visual">{{$logobrief->colors_visual}}</x-breifview>
        <x-breifview label="Intended Use">{{$logobrief->intended_use}}</x-breifview>
        <x-breifview label="Business Overview">{{$logobrief->business_overview}}</x-breifview>
        <x-breifview label="Target Audience">{{$logobrief->target_audience}}</x-breifview>
        <x-breifview label="Additional Information">{{$logobrief->additional_information}}</x-breifview>
        <x-breifview label="Files">
            @php
                $filesname = json_decode($logobrief->filesname)
            @endphp  
            @if(is_array($filesname))
                @foreach ($filesname as $file)
                    <a href="{{ url('files/'.$file) }}" class="btn btn-light" download>Dowanload</a>
                @endforeach
            @else
                <a href="{{ url('files/'.$logobrief->filesname) }}" class="btn btn-light" download>Dowanload</a>
            @endif    
        </x-breifview>
    </div>
</div>

@endsection