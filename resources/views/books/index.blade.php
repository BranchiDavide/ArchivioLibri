@extends("layout.main")

@section("page-title")
    I miei Libri
@endsection

@section("nav-buttons")
    <a href="{{ url('books/create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi un
        Libro</a>
    <h2 class="mt-5 mb-4">I miei Libri</h2>
@endsection

@section("page-content")
    <div class="col-md-12">
        <div class="list-book">
            @forelse ($books as $book)
                <article class="card border-0 mb-3">
                    <div class="card-body">
                        <h3 class="card-title">{{ $book->title }}</h3>
                        <div>di {{ $book->author->name }}</div>
                        <div class="mt-2">
                            <span class="badge text-bg-secondary">{{ $book->category->name }}</span>
                        </div>
                        <div class="btn-group mt-3 d-flex justify-content-center" role="group">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-light">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-light">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Sei Sicuro? Stai eliminando un Libro')"
                                        class="btn btn-light">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            @empty
                <p class="text-center">Nessun libro disponibile.</p>
            @endforelse
        </div>
    </div>
@endsection
