<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request)
    {
        $this->validate($request,[
            'date' => 'required',
            'time' => 'required',
            'number_of_people' => 'required',
        ]);

        Carbon::useMonthsOverflow(false);

        $now = Carbon::now();
        $user = Auth::user();
        $shop = Shop::find($request->input('shop_id'));
        $reservation_datetime = Carbon::parse($request->input('date') . '' . $request->input('time'));
        $number_of_people = $request->input('number_of_people');

        if($reservation_datetime->isPast())
        {
            return back()->with('error', '現在日時よりも前の予約は出来ません');
        }

        if(Reservation::where('user_id', $user->id)->where('shop_id', $shop->id)->where('reservation_datetime', $reservation_datetime)->exists())
        {
            $reservation = Reservation::where('user_id', $user->id)->where('shop_id', $shop->id)->whereDate('reservation_datetime', $reservation_datetime)->first();
            
            if(($reservation->reservation_datetime) == $reservation_datetime)
            {
                return back()->with('error', '予約が重複しています');
            }
        }

        $reservation = new Reservation([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'reservation_datetime' => $reservation_datetime,
            'number_of_people' => $number_of_people,
        ]);

        $reservation->save();
        Session::put('message', 'ご予約ありがとうございました');

        return view('done');
    }

    public function destroy(Request $request)
    {
        $now = Carbon::now();
        $reservation = Reservation::find($request->input('reservation_id'));
        $reservation_datetime = Carbon::createFromTimeString($reservation->reservation_datetime);
        if($reservation_datetime->isPast())
        {
            return back()->with('isPast', '既にご来店済みです。');
        }else{
            Reservation::find($request->reservation_id)->delete();
            Session::put('message', '予約を取り消しました');
            return view('done');
        }
    }

    public function edit($id)
    {
        $now = Carbon::now();
        $reservation = Reservation::find($id);
        $reservation_datetime = Carbon::createFromTimeString($reservation->reservation_datetime);
        if($reservation_datetime->isPast())
        {
            return back()->with('isPast', 'ご来店日時を過ぎている予約は変更できません。');
        }else{
            return view('edit', compact('reservation'));
        }
    }

    public function update(ReservationRequest $request)
    {
        $this->validate($request,[
            'date' => 'required',
            'time' => 'required',
            'number_of_people' => 'required',
        ]);

        Carbon::useMonthsOverflow(false);

        $now = Carbon::now();
        $reservation = Reservation::find($request->input('reservation_id'));
        $reservation_datetime = Carbon::parse($request->input('date') . '' . $request->input('time'));
        $number_of_people = $request->input('number_of_people');

        if($reservation_datetime->isPast())
        {
            return back()->with('error', '現在日時よりも前の予約は出来ません');
        }

        $reservation->update([
            'reservation_datetime' => $reservation_datetime,
            'number_of_people' => $number_of_people,
        ]);

        Session::put('message', 'ご予約内容を変更しました');
        return view('done');
    }
}
