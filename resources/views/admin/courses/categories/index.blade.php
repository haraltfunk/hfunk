@extends('adminlte::page')

@section('title', 'hfunk')

@section('content_header')
    <a href="{{ route('admin.courses.categories.create') }}" class="btn btn-success btn-sm float-right">
        Nueva categoría
    </a>
    <h1>Categorías de los cursos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
             <table id="lista" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)

                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="10px">
                                <a href="{{ route('admin.courses.categories.edit', $category) }}" class="btn btn-primary btn-sm">
                                    Editar
                                </a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.courses.categories.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
             </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script>
        $('#lista').DataTable( {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
        responsive: true,
        autoWidth: false

        
    } );
    </script>

    <script> console.log('hfunk ok!'); </script>

@stop