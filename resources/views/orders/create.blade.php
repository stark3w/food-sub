@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Создать новый заказ</h1>

        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            <div class="mb-3">
                <label for="client_name" class="form-label">ФИО клиента</label>
                <input type="text" id="client_name" name="client_name" class="form-control" value="{{ old('client_name') }}" required>
            </div>

            <div class="mb-3">
                <label for="client_phone" class="form-label">Телефон клиента</label>
                <input type="text" id="client_phone" name="client_phone" class="form-control" value="{{ old('client_phone') }}" required>
                @if ($errors->has('client_phone'))
                    <div class="text-danger">{{ $errors->first('client_phone') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="tariff_id" class="form-label">Тариф</label>
                <select id="tariff_id" name="tariff_id" class="form-select">
                    @foreach($tariffs as $tariff)
                        <option value="{{ $tariff->id }}" {{ old('tariff_id') == $tariff->id ? 'selected' : '' }}>
                            {{ $tariff->ration_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="schedule_type" class="form-label">Тип расписания</label>
                <select id="schedule_type" name="schedule_type" class="form-select">
                    <option value="EVERY_DAY" {{ old('schedule_type') == 'EVERY_DAY' ? 'selected' : '' }}>Ежедневно</option>
                    <option value="EVERY_OTHER_DAY" {{ old('schedule_type') == 'EVERY_OTHER_DAY' ? 'selected' : '' }}>Каждые два дня</option>
                    <option value="EVERY_OTHER_DAY_TWICE" {{ old('schedule_type') == 'EVERY_OTHER_DAY_TWICE' ? 'selected' : '' }}>Каждые два дня по два рациона</option>
                </select>

            </div>

            <div class="mb-3">
                <label for="comment" class="form-label">Комментарий</label>
                <textarea id="comment" name="comment" class="form-control">{{ old('comment') }}</textarea>

            </div>

            <div class="mb-3">
                <label for="delivery_dates" class="form-label">Промежутки дат</label>
                <div id="delivery_dates" class="d-flex gap-3">
                    <input type="date" name="delivery_dates[0][from]" class="form-control" required>
                    <input type="date" name="delivery_dates[0][to]" class="form-control" required>
                </div>
                <button type="button" class="btn btn-info mt-2" id="add-delivery-date">Добавить еще дату</button>
            </div>

            <button type="submit" class="btn btn-primary">Создать заказ</button>
        </form>
    </div>

@endsection
