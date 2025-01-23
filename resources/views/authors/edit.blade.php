@extends("layout.main")

@section("page-title")
    Modifica Autore
@endsection

@section("nav-buttons")
    <h2 class="mt-5 mb-4">Modifica Autore</h2>
@endsection

@section("page-content")
    <div class="col-md-8">
        <form action="{{ route('authors.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome dell'Autore <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $author->name) }}" required>
            </div>

            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="birthday" class="form-label">Data di Nascita</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday', $author->birthday) }}">
                </div>
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
            <button type="submit" class="btn btn-primary">Aggiorna Autore</button>
        </form>
    </div>
@endsection
