@extends("layout.main")

@section("page-title")
    Modifica Libro
@endsection

@section("nav-buttons")
    <h2 class="mt-5 mb-4">Modifica Libro</h2>
@endsection

@section("page-content")
    <div class="col-md-8">
        <form action="{{ url('books/' . $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo del Libro <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title"
                       value="{{ old('title', $book->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Autore <span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <select class="form-select" id="author" name="author_id" required>
                        <option value="" disabled selected>Scegli un Autore</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}"
                                {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Categoria <span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <select class="form-select" id="category" name="category_id" required>
                        <option value="" disabled selected>Scegli una Categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="pages" class="form-label">Numero di pagine</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="pages" name="pages" min="1"
                           value="{{ old('pages', $book->pages) }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione (Max 800 caratteri)</label>
                <textarea class="form-control" id="description" name="description" rows="4" maxlength="800">{{ old('description', $book->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="imageInput" name="image" accept="image/jpeg,image/png,image/gif">
            </div>
            <img src="{{old("image", asset($book->image))}}" id="previewImage" style="width: 400px; height: 520px;">
            <br>
            <br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
            <br>
            <br>
        </form>
    </div>
    <script>
        document.getElementById("imageInput").addEventListener("change", (e) => {
            let file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const previewImage = document.getElementById("previewImage");
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection


