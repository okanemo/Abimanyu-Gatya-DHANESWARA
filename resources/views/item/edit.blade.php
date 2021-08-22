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
                Item
            </header>

            <div class="w-full p-6">
                <form action="{{ route('item.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-5">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $item->name }}"
                        class="w-full bg-gray-200 p-2 rounded shadow-sm border border-gray-200 focus:outline-none focus:bg-white mt-2"
                        placeholder="name category">
                    </div>
                    <div class="mt-5">
                        <label>Category</label>
                        <select class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" id="category" name="category" placeholder="Category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id == $item->category_id) selected @endif >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5">
                        <label>Sub Category</label>
                        <select class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" id="sub-category" name="sub_category" placeholder="Sub Category">
                            @foreach ($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" @if($subCategory->id == $item->sub_category_id) selected @endif >{{ $subCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5">
                        <label>Staff</label>
                        <select class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" name="user" placeholder="Staff">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" @if($user->id == $item->user_id) selected @endif >{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5">
                        <label>Value</label>
                        <input type="text" name="value" value="{{ $item->value }}"
                        class="w-full bg-gray-200 p-2 rounded shadow-sm border border-gray-200 focus:outline-none focus:bg-white mt-2"
                        placeholder="value">
                    </div>
                    <div class="mt-5">
                        <button type="submit"
                            class="bg-indigo-500 text-white p-2 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Update</button>
                    </div>
                </form>        
            </div>
        </section>
    </div>
</main>
@endsection
