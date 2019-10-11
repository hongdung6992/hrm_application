<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerRequest;
use App\Models\Record;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
  public function index(Request $request)
  {
    $departmentId = $request->department_id;
    $staringFrom  = $request->staring_from ? formatDateToYmd($request->staring_from) : '1971-1-1';
    $staringTo    = $request->staring_to ? formatDateToYmd($request->staring_to) : now()->format('Y-m-d');
    $status       = $request->status;

    $workers = new Worker;

    if ($request->filled('department_id') && $request->filled('status') && ($request->filled('staring_from') || $request->filled('staring_to'))) {
      //
    } else if ($request->filled('department_id') && $request->filled('status')) {
      //
    } else if ($request->filled('status') && ($request->filled('staring_from') || $request->filled('staring_to'))) {
      //
    } else if ($request->filled('department_id') && ($request->filled('staring_from') || $request->filled('staring_to'))) {
      //
    } else if ($request->filled('staring_from') || $request->filled('staring_to')) {
      //
    } else if ($request->filled('department_id')) {
      //
    } else if ($request->filled('status')) {
      //
    } else {

      $workers = $workers->newQuery()->get();
    }


    return view('admin.workers.index', compact('workers'));
  }

  public function create()
  {
    $records = Record::all();
    return view('admin.workers.create', compact('records'));
  }

  public function store(WorkerRequest $request)
  {
    $workers = new Worker;
    $input = $workers->getInputWorker($request);
    if ($workers->create($input)) {
      return redirect()->route('workers.index')
        ->with(['flash_level' => 'success', 'flash_message' => t('worker.message.create')]);
    } else {
      return redirect()->back()
        ->with(['flash_level' => 'error', 'flash_message' => t('worker.message.error')]);
    }
  }

  public function show($id)
  {
    $worker = Worker::findOrFail($id);
    $records = Record::all();
    return view('admin.workers.show', compact('worker', 'records'));
  }

  public function edit($id)
  {
    $worker = Worker::findOrFail($id);
    $records = Record::all();
    return view('admin.workers.edit', compact('worker', 'records'));
  }

  public function update(Request $request, $id)
  {
    $workerRequest = new WorkerRequest;
    $this->validate(
      $request,
      $workerRequest->rules(true, $id),
      $workerRequest->messages(),
      $workerRequest->attributes()
    );

    $worker = Worker::findOrFail($id);
    $input = $worker->getInputWorker($request);
    if ($worker->update($input)) {
      return redirect()->route('workers.index')
        ->with(['flash_level' => 'success', 'flash_message' => t('worker.message.update')]);
    } else {
      return redirect()->back()
        ->with(['flash_level' => 'error', 'flash_message' => t('worker.message.error')]);
    }
  }

  public function destroy(Request $request, $id)
  {
    if ($request->ajax()) {
      $worker = Worker::findOrFail($id);
      if ($worker->delete()) {
        return response(['id' => $id, 'status' => 'success', 'flash_message' => t('worker.message.delete')]);
      }
    }
  }
}
