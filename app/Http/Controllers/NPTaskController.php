<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\NPTask;

class NPTaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nptasks = NPTask::paginate(5);

        return view('nptask-mgmt/index', ['nptasks' => $nptasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nptask-mgmt/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
         NPTask::create([
            'nptask_name' => $request['nptask_name'],
            'nptask_type' => $request['nptask_type']
        ]);

        return redirect()->intended('nptask-management');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nptask = NPTask::find($id);
        // Redirect to task list if updating task wasn't existed
        if ($nptask == null || count($nptask) == 0) {
            return redirect()->intended('nptask-management');
        }

        return view('nptask-mgmt/edit', ['nptask' => $nptask]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nptask = NPTask::findOrFail($id);
        $this->validateInput($request);
        $input = [
            'nptask_name' => $request['nptask_name'],
            'nptask_type' => $request['nptask_type']
        ];
        NPTask::where('id', $id)
            ->update($input);
        
        return redirect()->intended('nptask-management');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NPTask::where('id', $id)->delete();
         return redirect()->intended('nptask-management');
    }

    /**
     * Search task from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'nptask_name' => $request['nptask_name'],
            'nptask_type' => $request['nptask_type']
            ];

       $nptasks = $this->doSearchingQuery($constraints);
       return view('nptask-mgmt/index', ['nptasks' => $nptasks, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = NPTask::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request) {
        $this->validate($request, [
        'nptask_name' => 'required|max:60|unique:nptask',
        'nptask_type' => 'required|max:60'
    ]);
    }
}
