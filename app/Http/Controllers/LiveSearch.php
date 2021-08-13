<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Platform;

class LiveSearch extends Controller
{
    public function index()
    {
        return view('live_search');
    }
    public function action(Request $request)
    {
    if($request->ajax())
    {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
            $data = DB::table('platforms')
                ->where('nom', 'like', '%'.$query.'%')
                ->orWhere('url', 'like', '%'.$query.'%')
                ->get();
        }
        else
        {
            $data = DB::table('platforms')
                ->orderBy('id', 'asc')
                ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
        {
        $output .= '
        <tr>
            <td>'.$row->nom.'</td>
            <td>'.$row->url.'</td>
            <td>'.$row->statut.'</td>
            <td><img width="50" src="logos/'.$row->logo.'"</td>
        </tr>
        ';
        }
        }
        else
        {
            $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
        );
        echo json_encode($data);
        }
    }
}
