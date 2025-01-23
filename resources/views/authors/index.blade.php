@extends("layout.main")

@section("page-title")
    Lista Autori
@endsection

@section("nav-buttons")
    <a href="{{ url('authors/create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Aggiungi un Autore
    </a>
    <h2 class="mt-5 mb-4">Gli Autori</h2>
@endsection

@section("page-content")
    <div class="col-md-6">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col" class="w-auto">#</th>
                <th scope="col" class="w-50">Autore</th>
                <th scope="col" class="w-25">Data di nascita</th>
                <th scope="col" class="w-auto text-end">Azioni</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $author->name }}</td>
                    <td class="align-middle">
                        {{ $author->birthday ? $author->birthday : 'N/A' }}
                    </td>
                    <td class="text-end">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('authors/' . $author->id . '/edit') }}" class="btn btn-secondary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ url('authors/' . $author->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary"
                                        onclick="return confirm('Sei Sicuro? Stai eliminando un Autore')">
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
