@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Sub Category
            </header>

            <div class="w-full p-6">
                <a href="{{ route('sub-category.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create
                </a>
            </div>
        </section>

        <table class="min-w-full table-auto">
            <thead class="justify-between">
                <tr class="bg-indigo-500 w-full">
                    <th class="px-16 py-2">
                        <span class="text-white">No. </span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-white">Name</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-white">Category</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-white">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-gray-200">
                @forelse($subCategories as $key => $subCategory)
                    <tr class="bg-white border-2 border-gray-200">
                        <td class="px-16 py-2">
                            {{ $key+1 }}
                        </td>
                        <td class="px-16 py-2">
                            {{ $subCategory->name }}
                        </td>
                        <td class="px-16 py-2">
                            {{ $subCategory->category->name }}
                        </td>
                        <td class="px-10 py-2 text-center">
                            <form action="{{ route('sub-category.destroy', $subCategory->id) }}" method="POST">
                                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:border-indigo-700 text-xs focus:outline-none mr-2"><a href="{{ route('sub-category.edit', $subCategory->id) }}">Edit</a></button>
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?');"  class="bg-red-500 text-white px-4 py-2 rounded hover:border-red-700 text-xs focus:outline-none"> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="bg-red-500 text-white p-3 rounded shadow-sm mb-3">
                        Data not available!
                    </div>
                @endforelse
            </tbody>
        </table>
        <div class="mt-2">
            {{ $subCategories->links() }}
        </div>
    </div>
</main>
@endsection
