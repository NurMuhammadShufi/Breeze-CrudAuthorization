<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Tweet
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Edit Tweet Form --}}
            <div class="card bg-white">
                <div class="card-body">
                    <form action="{{ route('tweets.update', $tweet->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <textarea name="content" rows="3" class="textarea textarea-bordered w-full bg-white text-slate-800"
                            placeholder="apa yang anda pikirkan?">{{ $tweet->content }}</textarea>
                        <input type="submit" value="Edit" class="btn btn-primary btn-sm">
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
