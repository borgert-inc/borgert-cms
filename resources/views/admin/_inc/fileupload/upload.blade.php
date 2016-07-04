
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">@lang('admin/_globals.forms.processing')...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </td>
            <td class="text-right">
                {% if (!i && !o.options.autoUpload) { %}
                    <button class="btn btn-primary start" disabled>
                        <i class="fa fa-upload"></i>
                        <span>@lang('admin/_globals.buttons.send')</span>
                    </button>
                {% } %}
                {% if (!i) { %}
                    <button class="btn btn-warning cancel">
                        <i class="fa fa-ban-circle"></i>
                        <span>@lang('admin/_globals.buttons.cancel')</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
</script>
