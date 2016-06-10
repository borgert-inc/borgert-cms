@extends('admin.users.index')

@section('title', 'Lista | Usuários ', @parent)

@section('actions')
	<a href="{{ route('admin.users.create') }}" class="btn dim btn-primary"><i class="fa fa-plus"></i> Criar Usuário</a>
@endsection

@section('users')

	@section('subtitle', 'Lista de usuários (' . $users->total() . ')')
    
    <div class="ibox">
        <div class="ibox-content">
            <form action="{{ route('admin.users.destroy') }}" method="post">
                {{ csrf_field() }}
                <div class="table-responsive">
                    <table class="table table-striped table-align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Criado em</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <td><input type="checkbox" class="i-checks" name="users[]" value="{{ $user->id }}"></td>
                                    <td>{{ date('d M Y | H:i', $user->created_at->timestamp) }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->status === 1)
                                            <span class="badge badge-success">Ativo</span>
                                        @elseif ($user->status === 0)
                                            <span class="badge">Inativo</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-primary">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover Selecionados</button>
            </form>
        </div>
        {!! $users->render() !!}
    </div>

@endsection