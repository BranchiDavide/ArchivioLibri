@extends("layout.main")

@section("page-title")
    Aggiungi Categoria
@endsection

@section("nav-buttons")
    <h2 class="mt-5 mb-4">Aggiungi una Nuova Categoria</h2>
@endsection

@section("page-content")
    <div class="col-md-8">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome della Categoria <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Aggiungi Categoria</button>
        </form>
    </div>
@endsection
