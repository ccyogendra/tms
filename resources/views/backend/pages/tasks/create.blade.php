
@extends('backend.layouts.master')

@section('title')
Task - Manager
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">New Task</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.users.index') }}">All Tasks</a></li>
                    <li><span>Create Task</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create New Task</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.tasks.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="task">Task</label>
                                <input type="text" class="form-control" id="task" name="task" placeholder="Enter Task">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="task_detail">Task Detail</label>
                                <textarea 
                                    class="form-control" 
                                    id="task_detail" 
                                    name="task_detail" 
                                    placeholder="Task Detail"
                                    rows="6"
                                ></textarea>
                            </div>
                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" >
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="due_date">Due Date</label>
                                <input type="date" class="form-control" id="due_date" name="due_date" >
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password">Status</label>
                                <select name="status" id="status" class="form-control select2" >
                                 
                                    @foreach ($status as $item)
                                    <option
                                        value="{{ $item->name }}"
                                        {{ $loop->first ? 'selected' : '' }}
                                    >
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="assignee">Assignee</label>
                                <input type="text" class="form-control" id="assignee" name="assignee" >
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Task</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
<!-- CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
  ClassicEditor
    .create( document.querySelector( '#task_detail' ) )
    .catch( error => console.error( error ) );
</script>

@endsection