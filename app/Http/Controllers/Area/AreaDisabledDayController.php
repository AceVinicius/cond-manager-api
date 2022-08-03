<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\AreaDisabledDay;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AreaDisabledDayController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDays(Area $area)
    {
        $response = [
            'message' => '',
            'disabled' => [],
        ];

        $disabledDays = AreaDisabledDay::where('area_id', $area['id'])->get();

        foreach($disabledDays as $disabledDay) {
            $response['disabled'][] = $disabledDay['day'];
        }

        $allowedDays = explode(',', $area['days']);
        $offDays = [];

        for ($i = 0; $i < 7; ++$i) {
            if (in_array($i, $allowedDays)) {
                continue;
            }

            $offDays[] = $i;
        }

        $start = time();
        $end = strtotime('+3 months');

        for ($current = $start; $current < $end; $current = strtotime('+1 day', $current)) {
            $weekday = date('w', $current);

            if (in_array($weekday, $offDays)) {
                $response['disabled'][] = date('Y-m-d', $current);
            }
        }

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAreaDisabledDayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function getTimes(Request $request, Area $area)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date_format:Y-m-d',
        ]);

        if ($validator->fails()) {
            $response = [
                'message' => $validator->errors()->first(),
            ];

            return response()->json($response, 200);
        }

        $existingDisabledDay = AreaDisabledDay::where('area_id', $area['id'])
            ->where('day', $request->input('date'))
            ->count();

        if ($existingDisabledDay > 0) {
            $response = [
                'message' => 'O dia está desabilitado',
            ];

            return response()->json($response, 400);
        }

        $allowedDays = explode(',', $area['days']);
        $weekday = date('w', strtotime($request->input('date')));

        if (!in_array($weekday, $allowedDays)) {
            $response = [
                'message' => 'O dia não é disponível',
            ];

            return response()->json($response, 400);
        }

        $start = strtotime($area['start_time']);
        $end = strtotime($area['end_time']);

        $times = [];

        for ($lastTime = $start; $lastTime < $end; $lastTime = strtotime('+1 hour', $lastTime)) {
            $times[] = $lastTime;
        }

        $timeList = [];

        foreach ($times as $time) {
            $timeList[] = [
                'id' => date('H:i:s', $time),
                'title' => date('H:i', $time).'-'.date('H:i', strtotime('+1 hour', $time)),
            ];
        }

        $reservations = Reservation::where('area_id', $area['id'])
            ->whereBetween('reservation_date', [
                $request->input('date').' 00:00:00',
                $request->input('date').' 23:59:59',
            ])
            ->get();

        $toRemove = [];
        foreach($reservations as $reservation) {
            $time = date('H:i:s', strtotime($reservation['reservation_date']));
            $toRemove[] = $time;
        }

        $response = [
            'message' => '',
            'times' => [],
        ];

        foreach ($timeList as $timeItem) {
            if (in_array($timeItem['id'], $toRemove)) {
                continue;
            }

            $response['times'][] = $timeItem;
        }

        return response()->json($response, 200);
    }
}
