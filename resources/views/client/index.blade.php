@extends('themes.base')

@section('content')
<body >
    

<div class="container py-5 text-center">

    <style> h1 {
        color: #00e1ff;
    }
    th {
        color: #ffc400;
    }
    </style>
        
   
    <h1>Datos Cliente</h1>
    <a href="{{ route('client.create') }}" class="btn btn-primary">Crear Cliente</a>
    @if (Session::has('mensaje'))
    <div class="alert alert-info my-5">{{Session::get('mensaje')}}</div>
    @endif
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>apellido</th>
            <th>Edad</th>
            <th>Puesto</th>
        </thead> 
        <tbody>
            @forelse ($client as $detail)
                
            <tr>
                <td>{{$detail->name}}</td>
                <td>{{$detail->apellido}}</td>
                <td>{{$detail->deuda}}</td>
                <td>{{$detail->puesto}}</td>
                <td>
                    <a href="{{ route('client.edit', $detail) }}" class="btn btn-warning">Editar</a> 
                    <form action="{{ route('client.destroy', $detail) }}" method="post" class="d-inline">
                        @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Desea Eliminar El Rigistro')">Eliminar</button>
                    </form>
                    </td>
            </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>
    {{$client->links() }}

    </div>   

        
    </body> 
@endsection