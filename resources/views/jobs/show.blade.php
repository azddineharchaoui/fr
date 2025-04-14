@extends('layouts.app')

@section('content')
<div>
    <div class="mb-6">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('jobs.index') }}" class="text-sm font-medium text-gray-700 hover:text-indigo-600">
                        Jobs
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="text-sm font-medium text-gray-500 md:ml-2">{{ $job->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ $job->title }}</h1>
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <span>{{ $job->company }}</span>
                        <span class="mx-2">&bull;</span>
                        <span>{{ $job->location }}</span>
                        @if ($job->salary_range)
                            <span class="mx-2">&bull;</span>
                            <span>{{ $job->salary_range }}</span>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col items-end">
                    <span class="text-sm text-gray-500">Posted {{ $job->created_at->diffForHumans() }}</span>
                    @if(Auth::check() && Auth::id() === $job->user_id)
                        <div class="mt-2 flex space-x-2">
                            <a href="{{ route('jobs.edit', $job) }}" class="text-sm text-indigo-600 hover:text-indigo-500">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('jobs.destroy', $job) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-600 hover:text-red-500" onclick="return confirm('Are you sure you want to delete this job posting?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <h2 class="text-lg font-medium text-gray-900">Job Description</h2>
                <div class="mt-2 prose prose-indigo max-w-none text-gray-600">
                    {{ $job->description }}
                </div>
            </div>

            <div class="mt-6">
                <h2 class="text-lg font-medium text-gray-900">Requirements</h2>
                <div class="mt-2 prose prose-indigo max-w-none text-gray-600">
                    {{ $job->requirements }}
                </div>
            </div>

            <div class="mt-6">
                <h2 class="text-lg font-medium text-gray-900">Contact</h2>
                <div class="mt-2 text-gray-600">
                    <p>{{ $job->contact_email }}</p>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 px-6 py-4">
            @auth
                @if(Auth::id() !== $job->user_id)
                    <a href="{{ route('jobs.applications.create', $job) }}" class="inline-flex items-center justify-center px-5 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Apply for this job
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-5 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Sign in to apply
                </a>
            @endauth
        </div>
    </div>
</div>
@endsection