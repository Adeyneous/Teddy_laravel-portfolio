@extends('layouts.app')

@section('title', 'Projects')

@section('content')

@php
$projects_row1 = [
  [
    'image' => 'Neous.png',
    'name' => 'Neous HM (Coming Soon)',
    'description' => 'Developed using C# and built on the .NET framework, serves as a comprehensive tool designed to streamline hospital operations...',
    'link' => 'https://github.com/Adeyneous/Neous-HM.git'
  ],
  [
    'image' => 'IDapp.png',
    'name' => 'ID Info',
    'description' => 'Developed using JavaScript, provides a streamlined solution for scanning and processing user identification documents...',
    'link' => 'https://github.com/Adeyneous/ID-info.git'
  ],
  [
    'image' => 'ML3.png',
    'name' => 'Home Credit',
    'description' => 'Machine learning model designed to predict the likelihood of loan default among clients...',
    'link' => 'https://www.kaggle.com/code/teddykpoto/home-credit-2/edit'
  ],
];

$projects_row2 = [
  [
    'image' => 'loan_cal.png',
    'name' => 'Home Credit Web',
    'description' => 'Web application leveraging ML model to predict loan defaults...',
    'link' => 'https://github.com/Adeyneous/Home-Credit.git'
  ],
  [
    'image' => 'azure-data.png',
    'name' => 'Azure Data',
    'description' => 'End-to-end data solution moving SQL Server to Azure...',
    'link' => 'https://github.com/Adeyneous/Azure-Data-.git'
  ],
  [
    'image' => 'mob.png',
    'name' => 'Diet Tracker',
    'description' => 'Kotlin-based mobile app to track water intake and meals...',
    'link' => 'https://github.com/Adeyneous/Diet-Tracker.git'
  ],
];
@endphp


<div id="project-container">

  <div class="Neous_med">
    <h2>Projects</h2>

    <div class="card-container">

      {{-- First Row --}}
      <div class="row">
        @foreach ($projects_row1 as $project)
          <div class="card">
            <img src="{{ asset('Img/' . $project['image']) }}" alt="{{ $project['name'] }}">
            <h3>{{ $project['name'] }}</h3>
            <p>{{ $project['description'] }}</p>
            <a href="{{ $project['link'] }}" class="project_button" target="_blank">
              Project Code
            </a>
          </div>
        @endforeach
      </div>

      {{-- Second Row --}}
      <div class="row">
        @foreach ($projects_row2 as $project)
          <div class="card">
            <img src="{{ asset('Img/' . $project['image']) }}" alt="{{ $project['name'] }}">
            <h3>{{ $project['name'] }}</h3>
            <p>{{ $project['description'] }}</p>
            <a href="{{ $project['link'] }}" class="project_button" target="_blank">
              Project Code
            </a>
          </div>
        @endforeach
      </div>

    </div>
  </div>

</div>

@endsection
