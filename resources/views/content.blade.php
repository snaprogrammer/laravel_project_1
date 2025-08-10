@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Welcome to the Content Page</h1>
        <p>This page is only visible to logged-in users.</p>
        <div id="vue-content">
            <!-- Vue will mount here -->
        </div>
    </div>
@endsection