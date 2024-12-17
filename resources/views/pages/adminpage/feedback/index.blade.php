<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.adminpage')

@section('title', 'Dashboard - Category Page')

@section('adminpage-content')
<div class="w-full flex justify-between items-center mb-3 mt-1">
    <div>
        <h3 class="text-lg font-bold text-slate-800">Daftar Feedback</h3>
        <p class="text-slate-500 text-sm">Ringkasan dari Feedback yang ada.</p>
    </div>

</div>

<div class="flex justify-between items-center my-2">
    <div class="ml-3">
        <div class="w-full max-w-sm min-w-[200px] relative">
            <form action="{{route('adminpage.category.search')}}" method="post" class="relative">
                @csrf
                <input name="search"
                    class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                    placeholder="Cari feedback..." />
                <button class="absolute h-8 w-8 right-1 top-1 my-auto px-2 flex items-center bg-white rounded "
                    type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" class="w-8 h-8 text-slate-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<div class="relative flex flex-col w-full h-full overflow-hidden text-gray-700 bg-white bg-clip-border">
    <table class="w-full text-center table-auto min-w-max shadow-sm">
        <thead>
            <tr class="bg-black text-white">
                <th class="p-2 border-b border-slate-300">
                    <p class="block text-sm font-normal leading-none">No</p>
                </th>
                <th class="p-2 border-b border-slate-300">
                    <p class="block text-sm font-normal leading-none">Nama</p>
                </th>
                <th class="p-2 border-b border-slate-300">
                    <p class="block text-sm font-normal leading-none">Email</p>
                </th>
                <th class="p-2 border-b border-slate-300">
                    <p class="block text-sm font-normal leading-none">Subjek</p>
                </th>
                <th class="p-2 border-b border-slate-300">
                    <p class="block text-sm font-normal leading-none">Pesan</p>
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
                <tr class="hover:bg-slate-50 border-b border-slate-200">
                    <td class="p-3">
                        <p class="block font-semibold text-sm text-slate-800">{{ $feedback->id }}</p>
                    </td>
                    <td class="p-3">
                        <p class="block text-sm text-slate-800">{{ $feedback->name }}</p>
                    </td>
                    <td class="p-3">
                        <p class="block text-sm text-slate-800">{{ $feedback->email }}</p>
                    </td>
                    <td class="p-3">
                        <p class="block text-sm text-slate-800">{{ $feedback->subject }}</p>
                    </td>
                    <td class="p-3">
                        <p class="block text-sm text-slate-800">{{ $feedback->message }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection