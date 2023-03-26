<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Create Tweet Form --}}
            <div class="card bg-white">
                <div class="card-body">
                    <form action="{{ route('tweets.store') }}" method="POST">
                        @csrf
                        <textarea name="content" rows="3" class="textarea textarea-bordered w-full bg-white text-slate-800"
                            placeholder="apa yang anda pikirkan?"></textarea>
                        <input type="submit" value="Tweet" class="btn btn-primary">
                    </form>
                </div>
            </div>

            {{-- Show Tweet to Browser --}}
            @foreach ($tweets as $tweet)
                <div class="card my-4 bg-white text-slate-800">
                    <div class="card-body">
                        <h2 class="text-md font-bold">{{ $tweet->user->name }}</h2>
                        <p class="text-md">{{ $tweet->content }}</p>
                        <div class="text-end ">
                            <a href="{{ route('tweets.edit', $tweet->id) }}"
                                class=" font-semibold text-sm link-primary bg-primary text-white p-2 rounded-md transition duration-500 hover:text-slate-900 hover:bg-slate-100">Edit</a>
                            <span class="text-xs">{{ $tweet->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
