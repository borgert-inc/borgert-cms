
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    {% } %}
                </span>
            </td>
            <td>
                <span class="name">
                    <span>{%=file.name%}</span>
                </span>
                {% if (file.error) { %}
                    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td class="text-right">
                {% if (file.deleteUrl) { %}
                    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                        <i class="fa fa-trash"></i>
                        <span>@lang('admin/_globals.buttons.delete')</span>
                    </button>
                {% } else { %}
                    <button class="btn btn-warning cancel">
                        <i class="fa fa-ban-circle"></i>
                        <span>@lang('admin/_globals.buttons.cancel')</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
</script>
