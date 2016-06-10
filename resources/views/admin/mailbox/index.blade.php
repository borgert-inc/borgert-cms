@extends('admin.base')

@section('title', 'Mailbox')

@section('content')
    
    <div class="page-heading">
        <h2>Mailbox</h2>
    </div>
    
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content mailbox-content">
                    <div class="file-manager">
                        <ul class="folder-list m-b-md" style="padding: 0">
                            <li><a href="{{ route('admin.mailbox.inbox') }}"> <i class="fa fa-inbox "></i> Caixa de Entrada</a></li>
                            <li><a href="{{ route('admin.mailbox.archive') }}"> <i class="fa fa-archive"></i> Arquivados</a></li>
                            <li><a href="{{ route('admin.mailbox.trash') }}"> <i class="fa fa-trash-o"></i> Lixeira</a></li>
                        </ul>
                        <h5>Legenda</h5>
                        <ul class="category-list" style="padding: 0">
                            <li><a href="javascript:;"><i class="fa fa-circle text-navy"></i> Contato </a></li>
                            <li><a href="javascript:;"><i class="fa fa-circle text-danger"></i> Orçamento</a></li>
                            <li><a href="javascript:;"><i class="fa fa-circle text-primary"></i> Newsletter</a></li>
                            <li><a href="javascript:;"><i class="fa fa-circle text-info"></i> Produtos</a></li>
                            <li><a href="javascript:;"><i class="fa fa-circle text-warning"></i> Clientes</a></li>
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 animated fadeIn">
            @yield('mailbox')
        </div>
    </div>

@endsection