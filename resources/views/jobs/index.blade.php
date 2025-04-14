@extends('layouts.app')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Available Jobs</h1>
        @auth
            <a href="{{ route('jobs.create') }}" class="bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700">
                Post a Job
            </a>
        @endauth
    </div>

    <div class="bg-white shadow rounded-lg divide-y">
        @forelse ($jobs as $job)
            <div class="p-6 hover:bg-gray-50">
                <div class="flex justify-between">
                    <div>
                        <h2 class="text-xl font-medium text-gray-900">
                            <a href="{{ route('jobs.show', $job) }}" class="hover:text-indigo-600">
                                {{ $job->title }}
                            </a>
                        </h2>
                        <div class="mt-1 flex items-center text-sm text-gray-500">
                            <span>{{ $job->company }}</span>
                            <span class="mx-2">&bull;</span>
                            <span>{{ $job->location }}</span>
                            @if ($job->salary_range)
                                <span class="mx-2">&bull;</span>
                                <span>{{ $job->salary_range }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="text-sm text-gray-500">
                        <time datetime="{{ $job->created_at->toIso8601String() }}">
                            Posted {{ $job->created_at->diffForHumans() }}
                        </time>
                    </div>
                </div>
                <div class="mt-3 text-sm text-gray-600 line-clamp-2">
                    {{ Str::limit($job->description, 150) }}
                </div>
                <div class="mt-3">
                    <a href="{{ route('jobs.show', $job) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                        View details <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
        @empty
            <div class="p-6 text-center">
                <p class="text-gray-500">No jobs available at the moment.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $jobs->links() }}
    </div>
</div>
@endsection