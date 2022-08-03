<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Area;
use App\Models\AreaDisabledDay;
use App\Models\Reservation;
use App\Models\Unit;
use DateTime;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
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
    public function index(Unit $unit)
    {
        if (Auth::id() !== $unit->user_id) {
            $response = [
                'message' => 'Unauthorized',
            ];

            return response()->json($response, 403);
        }

        $reservations = Reservation::where('unit_id', $unit['id'])
            ->orderBy('reservation_date', 'DESC')->with('area:id,title,cover')->get();

        $response = [
            'message' => '',
            'reservations' => [],
        ];

        foreach ($reservations as $reservation) {
            $time = strtotime($reservation['reservation_date']);

            $day = date('d-m-Y', $time);
            $start = date('H:i', $time);
            $end = date('H:i', strtotime('+1 hour', $time));

            $response['reservations'][] = [
                'id' => $reservation['id'],
                'cover' => asset('storage/'.$reservation['area']['cover']),
                'title' => $reservation['area']['title'],
                'reservation_date' => $day.', de '.$start.' às '.$end,
            ];
        }

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request, Unit $unit)
    {
        if (Auth::id() !== $unit->user_id) {
            $response = [
                'message' => 'Unauthorized',
            ];

            return response()->json($response, 403);
        }

        $validated = $request->validated();

        $area = Area::find($validated['id']);

        if (!$area) {
            $response = [
                'message' => 'A área não existe',
            ];

            return response()->json($response, 400);
        }

        $weekday = date('w', strtotime($validated['date']));
        $allowedDays = explode(',', $area['days']);

        if (!in_array($weekday, $allowedDays)) {
            $response = [
                'message' => 'O dia não é disponível',
            ];

            return response()->json($response, 400);
        }

        $start = strtotime($area['start_time']);
        $end = strtotime('-1 hour', strtotime($area['end_time']));
        $reservation = strtotime($validated['time']);

        if ($reservation < $start || $reservation > $end) {
            $response = [
                'message' => 'A hora não é disponível',
            ];

            return response()->json($response, 400);
        }

        $existingDisabledDay = AreaDisabledDay::where('area_id', $validated['id'])
            ->where('day', $validated['date'])
            ->count();

        if ($existingDisabledDay > 0) {
            $response = [
                'message' => 'O dia está desabilitado',
            ];

            return response()->json($response, 400);
        }

        $existingReservation = Reservation::where('area_id', $validated['id'])
            ->where('reservation_date', new DateTime($validated['date'].'T'.$validated['time'].'.000000Z'))
            ->count();

        if ($existingReservation > 0) {
            $response = [
                'message' => 'O horário já está reservado',
            ];

            return response()->json($response, 400);
        }

        $reservation = Reservation::create([
            'unit_id' => $unit->id,
            'area_id' => $validated['id'],
            'reservation_date' => new DateTime($validated['date'].'T'.$validated['time'].'.000000Z'),
        ]);

        if (!$reservation) {
            $response = [
                'message' => 'A reserva não pôde ser criada.',
            ];

            return response()->json($response, 500);
        }

        $response = [
            'message' => '',
            'reservation' => $reservation,
        ];

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit, Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationRequest $request, Unit $unit, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit, Reservation $reservation)
    {
        //
    }
}
