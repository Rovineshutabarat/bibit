@extends('layouts.adminpage')

@section('title', 'Dashboard - Order Page')

@section('adminpage-content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Pesanan</h1>

    <table class="table-auto w-full bg-white rounded-lg shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-left">#</th>
                <th class="px-4 py-2 text-left">Nama User</th>
                <th class="px-4 py-2 text-left">Produk</th>
                <th class="px-4 py-2 text-left">Total</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Tanggal Pesanan</th>
                <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $order['id'] }}</td>
                    <td class="px-4 py-2">{{ $order['user'] }}</td>
                    <td class="px-4 py-2">{{ $order['products'] }}</td>
                    <td class="px-4 py-2">{{ number_format($order['total_amount'], 2) }}</td>
                    <td class="px-4 py-2">{{ ucfirst($order['status']) }}</td>
                    <td class="px-4 py-2">{{ $order['order_date'] }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('adminpage.listorder.update', $order['id']) }}" method="POST">

                            @csrf
                            @method('PUT')
                            <select name="status" class="border p-2 rounded">
                                <option value="unpaid" {{ $order['status'] == 'unpaid' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $order['status'] == 'paid' ? 'selected' : '' }}>Sukses</option>
                                <option value="cancelled" {{ $order['status'] == 'cancelled' ? 'selected' : '' }}>Batal</option>
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Update
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
