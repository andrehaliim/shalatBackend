<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class CityController extends Controller
{
    protected function createResponse($param = array())
    {
        $status = !empty($param['status']) ? $param['status'] : 200;
        $message = !empty($param['message']) ? $param['message'] : 'OK';
        $data = !empty($param['data']) ? $param['data'] : [];

        return [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
    }

    public function index()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $query = City::selectRaw('city.*');

        $qb = QueryBuilder::for($query)->allowedSorts(
            [
                AllowedSort::field('nama', 'city.nama')
            ])
            ->allowedFilters(
            [
                AllowedFilter::partial('nama', 'city.nama')
            ])->distinct()->get();

        return response()->json($this->createResponse(['data' => $qb]), 200);
    }
}
