<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Pagination\LengthAwarePaginator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected  function objToArray($objs)
    {
        $data = [];
        foreach ($objs as $o)
        {
            $data[$o->id] = $o->firstName;
        }
        return $data;
    }

    public function paginate($collection)
    {
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perpage = 15;
        $results = $collection->slice(($page - 1)*$perpage,$perpage)->values();
        $paginated = new LengthAwarePaginator($results,$collection->count(),$perpage,$page,[
            'path'=> LengthAwarePaginator::resolveCurrentPath(),
        ]);
        $paginated->appends(request()->all());
        return $paginated;
    }
}
