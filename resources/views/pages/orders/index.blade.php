@extends('layouts.app')

@section('title', 'Orders')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Orders</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Orders</a></div>
                    <div class="breadcrumb-item">All Orders</div>
                </div>
            </div>
<div class="card-header">
    <form method="GET" action="{{ route('order.index') }}" class="form-inline">
        <div class="form-group mr-2">
            <label for="transaction_time" class="sr-only">Transaction Time</label>
            <input type="date" name="transaction_time" id="transaction_time" class="form-control"
                value="{{ request('transaction_time') }}">
        </div>
        <div class="form-group mr-2">
            <label for="kasir" class="sr-only">Kasir</label>
            <input type="text" name="kasir" id="kasir" class="form-control" placeholder="Kasir"
                value="{{ request('kasir') }}">
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="{{ route('order.index') }}" class="btn btn-secondary ml-2">Reset</a>
    </form>
</div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Transaction Time</th>
                                            <th>Total Price</th>
                                            <th>Total Item</th>
                                            <th>Kasir</th>
                                        </tr>
                                        @foreach ($orders as $order)
                                            <tr>

                                                <td><a
                                                        href="{{ route('order.show', $order->id) }}">{{ $order->transaction_time }}</a>
                                                </td>
                                                <td>
                                                    {{ $order->total_price }}
                                                </td>
                                                <td>
                                                    {{ $order->total_item }}
                                                </td>

                                                <td>
                                                    {{ $order->kasir->name }}

                                                </td>

                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $orders->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
