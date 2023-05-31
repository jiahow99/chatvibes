<div class="col-10 mx-auto mt-10">
    <div class="w-full text-gray-900 bg-white border border-gray-200 rounded-lg space-y-4">
        @foreach ($users as $user)
            <a href="#" class="block w-full px-4 py-3 rounded-b-lg cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                {{ $user->name }}
            </a>
        @endforeach
    </div>
</div>