<div class="row fileupload-buttonbar">
    <div class="col-lg-12">
        <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-success fileinput-button">
            <i class="fa fa-plus"></i>
            <span>@lang('admin/_globals.buttons.add_file')</span>
            <input type="file" name="files[]" multiple>
        </span>
        <span class="fileupload-process"></span>
        @lang('admin/_globals.forms.files_support'): 
        @if(isset($extensions))
            @foreach($extensions as $extension)
                <span class="label label-default">{{ $extension }}</span>
            @endforeach
        @endif
    </div>
    <!-- The global progress state -->
    <div class="col-lg-12 fileupload-progress fade">
        <!-- The global progress bar -->
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
        </div>
        <!-- The extended global progress state -->
        <div class="progress-extended">&nbsp;</div>
    </div>
</div>
<!-- The table listing the files available for upload/download -->
<table role="presentation" class="table table-striped table-align-middle"><tbody class="files"></tbody></table>


