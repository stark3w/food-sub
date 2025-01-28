@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Просмотр заказа #{{ $order->id }}</h1>

        <div class="card mb-4">
            <div class="card-header">
                Информация о заказе
            </div>
            <div class="card-body">
                <p><strong>Клиент:</strong> {{ $order->client_name }}</p>
                <p><strong>Телефон:</strong> {{ $order->client_phone }}</p>
                <p><strong>Тариф:</strong> {{ $order->tariff ? $order->tariff->ration_name : 'Не указан' }}</p>
                <p><strong>Тип расписания:</strong> {{ $order->schedule_type }}</p>
                <p><strong>Первичная дата:</strong> {{ $order->first_date }}</p>
                <p><strong>Конечная дата:</strong> {{ $order->last_date }}</p>
                <p><strong>Комментарий:</strong> {{ $order->comment }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Список рационов
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Дата приготовления</th>
                        <th>Дата доставки</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->ration as $ration)
                        <tr>
                            <td>{{ $ration->cooking_date }}</td>
                            <td>{{ $ration->delivery_date }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <a href="{{ route('orders.index') }}" class="btn btn-primary mt-3">Назад к списку заказов</a>
    </div>
@endsection
