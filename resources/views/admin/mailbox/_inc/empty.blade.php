@if ($mailbox->total() == 0)
    <div class="widget p-lg text-center">
        <div class="m-b-md">
            <i class="fa fa-{{ $icone }} fa-2x"></i>
            <h4 class="no-margins">
                Não existe nenhuma mensagem.
            </h4>
        </div>
    </div>
@endif