@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">Список заказов</h1>

        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Клиент</th>
                <th>Телефон</th>
                <th>Тариф</th>
                <th>Первичная дата</th>
                <th>Конечная дата</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->client_name }}</td>
                    <td>{{ $order->client_phone }}</td>
                    <td>{{ $order->tariff ? $order->tariff->ration_name : 'Не указан' }}</td>
                    <td>{{ $order->first_date }}</td>
                    <td>{{ $order->last_date }}</td>
                    <td class="d-flex">
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Просмотреть заказ">
                            <i class="bi bi-eye"></i> Просмотреть
                        </a>
                        {{--                        <form action="#" method="POST" style="display:inline;" onsubmit="return confirm('Вы уверены, что хотите удалить этот заказ?');">--}}
                        {{--                            @csrf--}}
                        {{--                            @method('DELETE')--}}
                        {{--                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить заказ">--}}
                        {{--                                <i class="bi bi-trash"></i> Удалить--}}
                        {{--                            </button>--}}
                        {{--                        </form>--}}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
