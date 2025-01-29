<?php

namespace app\Services\Order;

use App\Models\Order;
use App\Models\Ration;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        DB::beginTransaction();

        try
        {
            $data['client_phone'] = preg_replace('/[^0-9]/', '', $data['client_phone']);

            $order = Order::create($data);

            $firstDate = Carbon::parse($data['delivery_dates'][0]['from']);
            $lastDate = Carbon::parse($data['delivery_dates'][count($data['delivery_dates']) - 1]['to']);

            $order->first_date = $firstDate->format('Y-m-d');
            $order->last_date = $lastDate->format('Y-m-d');
            $order->save();

            foreach ($data['delivery_dates'] as $date)
            {
                $this->createRations($order,$date);
            }

            DB::commit();
        } catch (\Exception $e)
        {
            DB::rollBack();
            throw $e;
        }

    }

    private function createRations($order,$date)
    {
        $tariff = $order->tariff;

        $startDate = Carbon::parse($date['from']);
        $endDate = Carbon::parse($date['to']);

        while($startDate <= $endDate)
        {
            $ration = new Ration();

            if ($tariff->cooking_day_before == 1)
            {
                $cookingDate = $startDate->copy()->subDay();
            } else
            {
                $cookingDate = $startDate->copy();
            }


            $ration->order_id = $order->id;
            $ration->cooking_date = $cookingDate->format('Y-m-d');
            $ration->delivery_date = $startDate->format('Y-m-d');
            $ration->save();


            if ($order->schedule_type == 'EVERY_DAY')
            {
                $startDate->addDay();
            } elseif ($order->schedule_type == 'EVERY_OTHER_DAY')
            {
                $startDate->addDays(2);
            } elseif ($order->schedule_type == 'EVERY_OTHER_DAY_TWICE')
            {
                if ($startDate->copy()->addDay() <= $endDate)
                {
                    $ration2 = new Ration();
                    $ration2->order_id = $order->id;

                    if ($tariff->cooking_day_before) {
                        $cookingDate = $startDate->copy()->subDay();
                    } else {
                        $cookingDate = $startDate->copy();
                    }

                    $ration2->cooking_date = $cookingDate->format('Y-m-d');
                    $ration2->delivery_date = $startDate->format('Y-m-d');
                    $ration2->save();
                }

                $startDate->addDays(2);
            }

        }
    }

}
