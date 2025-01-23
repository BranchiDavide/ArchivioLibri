@extends("layout.main")

@section("page-title")
    Lista Categorie
@endsection

@section("nav-buttons")
    <a href="{{ url('categories/create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi una Categoria</a>
    <h2 class="mt-5 mb-4">Le Categorie</h2>
@endsection

@section("page-content")
    <div class="col-md-6">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col" class="w-auto">#</th>
                <th scope="col" class="w-75">Categoria</th>
                <th scope="col" class="w-auto text-end">Azioni</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $category->name }}</td>
                    <td class="text-end">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('categories/' . $category->id . '/edit') }}" class="btn btn-secondary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ url('categories/' . $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary"
                                        onclick="return confirm('Sei Sicuro? Stai eliminando una Categoria')">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
