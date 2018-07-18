@extends('admin.blog.base')

@section('title', trans('admin/logs.module'), @parent)

@section('stylesheet')

@parent() 

<!-- Bootstrap datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')

    <h2>{{ trans('admin/logs.module') }}</h2>

    <br>
    
    <div class="card">
        <div class="card-header">
            <form action="" class="form-inline" method="GET">
                <div class="form-group">
                    <select name="l" class="form-control" style="margin-right: 10px; width: 250px;">
                        @foreach($files as $file)
                            <option value="{{ base64_encode($file) }}">{{ $file }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-history"></i> {{ trans('admin/logs.filter.load') }}</button>
                </div>
            </form>
        </div>
    </div>

    <br>

    <div class="table-container">
        @if ($logs === null)
            <div>
                {{ trans('admin/logs.file.ultra') }}
            </div>
        @else
            <table id="table-log" class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ trans('admin/logs.table.header.level') }}</th>
                        <th>{{ trans('admin/logs.table.header.context') }}</th>
                        <th>{{ trans('admin/logs.table.header.date') }}</th>
                        <th>{{ trans('admin/logs.table.header.content') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $key => $log)
                        <tr data-display="stack{{{$key}}}">
                            <td class="text-center text-{{{$log['level_class']}}}"><span class="glyphicon glyphicon-{{{$log['level_img']}}}-sign" aria-hidden="true"></span> &nbsp;{{$log['level']}}</td>
                            <td class="text">{{$log['context']}}</td>
                            <td class="date">{{{$log['date']}}}</td>
                            <td class="text">
                                @if ($log['stack'])
                                    <a class="pull-right expand btn btn-default btn-xs" data-display="stack{{{$key}}}"><span class="glyphicon glyphicon-search"></span></a>
                                @endif
                                
                                {{{$log['text']}}}
                                
                                @if (isset($log['in_file']))
                                    <br/>{{{$log['in_file']}}}
                                @endif
                            
                                @if ($log['stack'])
                                    <div class="stack" id="stack{{{$key}}}" style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div> 

    <hr>


    @if($current_file)
        <a href="?dl={{ base64_encode($current_file) }}" class="btn btn-primary"><i class="fa fa-download"></i> {{ trans('admin/logs.file.download') }}</a>
        <a id="delete-log" href="?del={{ base64_encode($current_file) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ trans('admin/logs.file.delete') }}</a>
        @if(count($files) > 1)
            <a id="delete-all-log" href="?delall=true" class="btn btn-danger"><i class="fa fa-trash"></i> {{ trans('admin/logs.file.download_all') }}</a>
        @endif
    @endif

    <hr>

@endsection

@section('javascript')

    @parent()

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.table-container tr').on('click', function () {
                $('#' + $(this).data('display')).toggle();
            });
            $('#table-log').DataTable({
                "order": [1, 'desc'],
                "stateSave": true,
                "stateSaveCallback": function (settings, data) {
                    window.localStorage.setItem("datatable", JSON.stringify(data));
                },
                "stateLoadCallback": function (settings) {
                    var data = JSON.parse(window.localStorage.getItem("datatable"));
                    if (data) data.start = 0;
                    return data;
                }
            });
            $('#delete-log, #delete-all-log').click(function () {
                return confirm("{{ trans('admin/logs.file.confirm') }}");
            });
        });
    </script>

@endsection