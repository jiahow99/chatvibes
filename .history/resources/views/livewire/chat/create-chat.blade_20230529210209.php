<div class="col-10 mx-auto mt-10">
    <div class="w-full text-gray-900 bg-white border border-gray-200 rounded-lg">
        @foreach ($users as $user)
            <div wire:click="is_conversation_established({{ $user->id }})" class="block w-full px-4 py-3 rounded-b-lg cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                {{ $user->name }}
            </div>
        @endforeach
    </div>
</div>
