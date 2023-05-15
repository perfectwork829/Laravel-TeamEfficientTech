<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use App\Models\TimeWorkType;
use App\Models\TimeProject;
use App\Models\TimeEntry;
use Gate;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Task::with(['assigned_to', 'team'])->select(sprintf('%s.*', (new Task)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'task_show';
                $editGate      = 'task_edit';
                $deleteGate    = 'task_delete';
                $crudRoutePart = 'tasks';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });

            $table->editColumn('endtime', function ($row) {
                return $row->endtime ? $row->endtime : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->addColumn('assigned_to_name', function ($row) {
                return $row->assigned_to ? $row->assigned_to->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'assigned_to']);

            return $table->make(true);
        }

        return view('admin.tasks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assigned_tos = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tasks.create', compact('assigned_tos'));
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->all());

        return redirect()->route('admin.tasks.index');
    }

    public function edit(Task $task)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assigned_tos = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $task->load('assigned_to', 'team');

        return view('admin.tasks.edit', compact('assigned_tos', 'task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('admin.tasks.index');
    }

    public function show(Task $task)
    {
        abort_if(Gate::denies('task_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->load('assigned_to', 'team');

        return view('admin.tasks.show', compact('task'));
    }

    public function destroy(Task $task)
    {
        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskRequest $request)
    {
        $tasks = Task::find(request('ids'));

        foreach ($tasks as $task) {
            $task->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function dailyTask(Request $request){
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Task::with(['assigned_to', 'team'])->select(sprintf('%s.*', (new Task)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'task_show';
                $editGate      = 'task_edit';
                $deleteGate    = 'task_delete';
                $crudRoutePart = 'tasks';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });

            $table->editColumn('endtime', function ($row) {
                return $row->endtime ? $row->endtime : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->addColumn('assigned_to_name', function ($row) {
                return $row->assigned_to ? $row->assigned_to->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'assigned_to']);

            return $table->make(true);
        }       

        $all_tasks = DB::table('tasks')
            ->join('time_work_types', 'tasks.jobType_id', '=', 'time_work_types.id')
            ->join('users', 'users.id', '=', 'tasks.assigned_to_id')                  
            ->whereNull('tasks.deleted_at')
            ->select('tasks.id', 'tasks.clientName', 'tasks.siteAddress', 'time_work_types.name as workType', 'tasks.description', 'tasks.starttime', 'users.name', 'tasks.checkIn', 'tasks.checkOut')
            ->get();            
        return view('admin.tasks.daily', ["tasks" => $all_tasks]);
    }

    //get the all tasks data.
    public function getTasks(){
        $tasks = Task::select('clientName', 'siteAddress', 'jobType_id', 'description', 'starttime', 'assigned_to_id', 'checkIn', 'checkOut')->orderBy("id")->get(); 

        return response()->json(
            $tasks                     
        );
    }
    public function payCheck(Request $request){
        
        $user = Auth::user();  
        
   
        if($request->method()=="GET"){                 
            $pay_start_time = $request->payStartDate;      
            $from = $to = '';           
            $time_entry_lists  = [];
            return view('admin.tasks.paycheck', ['pay_start_time'=>$pay_start_time,
                                                 'user_name'=>$user->name, 
                                                 'time_entry_lists'=> null,
                                                 'from'=>$from, 'to'=>$to]);
        }else{   
            $pay_start_date = $request->payStartDate;
            $pay_end_date = $request->payEndDate;            
            $from = Carbon::createFromFormat('Y-m-d', $pay_start_date)->format('Y-m-d');
            $to = Carbon::createFromFormat('Y-m-d', $pay_end_date)->format('Y-m-d');            
                                
            $time_entry_lists = TimeEntry::where('user_id', $user->id)
                ->whereBetween('start_time', [$from, $to])
                ->get();        
            
            return view('admin.tasks.payCheck', ["time_entry_lists" => $time_entry_lists, 
                                                'user_name'=>$user->name,
                                                'from'=>$from,
                                                'to'=>$to,]);
            
        }

        
    }

    //Get the all job type and engineers
    public function getComboData(Request $request)
    {
        $timeWorkTypes = TimeWorkType::select('id', 'name')->orderBy("id")->get();        
        $timeProjectData = TimeProject::select('address', 'name')->orderBy("id")->get();
        $engineer = User::select('id', 'name')->orderBy("id")->get();

        return response()->json(
            [
             'timeworktype' => $timeWorkTypes,
              'timeProjectData' => $timeProjectData,            
              'engineer' => $engineer
            ]                       
        );
    }

    //updateTask
    public function updateTask(Request $request)
    {
       
        $task_id = $request->id;
        if($task_id!=0){
            $updateTask = Task::where('id', $task_id)->first();

            $updateTask->clientName =  $request->clientName;
            $updateTask->siteAddress =  $request->siteAddress;
            $updateTask->jobType_id =  $request->jobType_id;
            $updateTask->description =  $request->description;
            // $updateTask->starttime =  $request->starttime;
            $updateTask->assigned_to_id =  $request->assigned_to_id;
            $updateTask->checkIn =  $request->checkIn;
            $updateTask->checkOut =  $request->checkOut;

            $updateTask->save();

            if( $updateTask==1){
                return response()->json(
                    [
                        'status'=>'success',
                        'message'=>'Ok',                
                    ]                       
                );
            }else{
                return response()->json(
                    [
                        'status'=>'fail',
                        'message'=>'not updated',                
                    ]                       
                );
            } 
        }else if($task_id==0){
            $newTask = new Task;            
            $newTask->clientName =  $request->clientName;
            $newTask->siteAddress =  $request->siteAddress;
            $newTask->jobType_id =  $request->jobType_id;
            $newTask->description =  $request->description;
            // $newTask->starttime =  $request->starttime;
            $newTask->assigned_to_id =  $request->assigned_to_id;
            $newTask->checkIn =  $request->checkIn;
            $newTask->checkOut =  $request->checkOut;
            $newTask->save();

            if($newTask == 1){
                return response()->json(
                    [
                        'status'=>'success',
                        'message'=>'Ok',                
                    ]                       
                );
            }else{
                return response()->json(
                    [
                        'status'=>'fail',
                        'message'=>'not created',                
                    ]                       
                );
            }
        }
               
    }

    //delete task
    public function delTask(Request $request)
    {
        $task_id = $request->id;
        var_dump($task_id);
        exit(0);
        $deleteTask = Task::where('id', $task_id)->delete();
        if($deleteTask == 1){
            return response()->json(
                [
                    'status'=>'success',
                    'message'=>'Ok',                
                ]                       
            );
        }else{
            return response()->json(
                [
                    'status'=>'fail',
                    'message'=>'not removed',                
                ]                       
            );
        }

        
    }

    //create task
    public function createTask(Request $request)
    {
        
        $newTask = new Task;
        $newTask->clientName =  $request->clientName;
        $newTask->siteAddress =  $request->siteAddress;
        $newTask->jobType_id =  $request->jobType_id;
        $newTask->description =  $request->description;
        // $newTask->starttime =  $request->starttime;
        $newTask->assigned_to_id =  $request->assigned_to_id;
        $newTask->checkIn =  $request->checkIn;
        $newTask->checkOut =  $request->checkOut;
        $newTask->save();

        if($newTask == 1){
            return response()->json(
                [
                    'status'=>'success',
                    'message'=>'Ok',                
                ]                       
            );
        }else{
            return response()->json(
                [
                    'status'=>'fail',
                    'message'=>'not created',                
                ]                       
            );
        }
        
    }

    

}
