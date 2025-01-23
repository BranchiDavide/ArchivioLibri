@extends("layout.main")

@section("page-title")
    Aggiungi un Nuovo Autore
@endsection

@section("nav-buttons")
    <h2 class="mt-5 mb-4">Aggiungi un Nuovo Autore</h2>
@endsection

@section("page-content")
    <div class="col-md-8">
        <form action="{{ url('authors') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome dell'Autore <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="birthday" class="form-label">Data di Nascita</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday') }}">
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
            <button type="submit" class="btn btn-primary">Aggiungi Autore</button>
        </form>
    </div>
@endsection
