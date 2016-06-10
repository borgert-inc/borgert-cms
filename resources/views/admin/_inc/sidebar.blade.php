<div class="sidebard-panel">
    <div class="m-t-md">
        <h4>Blog</h4>
        <div class="media-body">
            Gerencie suas postagens, comentários e crie novas categorias.
        </div>
    </div>
    <div class="m-t-md">
        <h4>Páginas</h4>
        <div class="media-body">
            Crie páginas personalizadas para seu site.
        </div>
    </div>
    <div class="m-t-md">
        <h4>Mailbox</h4>
        <div>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge badge-primary">{{ $inbox->count() }}</span>
                    <a href="{{ route('admin.mailbox.inbox') }}"><u>Caixa de Entrada</u></a>
                </li>
                <li class="list-group-item">
                    <span class="badge badge-success">{{ $archive->count() }}</span>
                    <a href="{{ route('admin.mailbox.archive') }}"><u>Arquivadas</u></a>
                </li>
                <li class="list-group-item">
                    <span class="badge badge-warning">{{ $trash->count() }}</span>
                    <a href="{{ route('admin.mailbox.trash') }}"><u>Lixeira</u></a>
                </li>
            </ul>
        </div>
    </div>
</div>