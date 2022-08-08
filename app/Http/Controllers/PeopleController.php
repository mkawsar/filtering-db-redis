<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class PeopleController extends Controller
{
    public function index(Request $request): object
    {
        $year = null;
        $month = null;

        if ($request->year !== '') {
            $year = $request->year;
        }

        if ($request->month !== '') {
            $month = $request->month;
        }

        Redis::del('person:filtering');
        $total = 0;

        $persons = Cache::remember('filtering', 60, function () use ($year, $month, &$total) {
            $person = Person::query()
                ->when($year !== null, function ($q) use ($year) {
                    $q->whereYear('birthday', $year);
                })
                ->when($month !== null, function ($q) use ($month) {
                    $q->whereMonth('birthday', $month);
                });
            $total = $person->count();
            return $person->simplePaginate(20);
        });


        return view('people-list', ['total' => $total, 'persons' => $persons]);
    }
}
