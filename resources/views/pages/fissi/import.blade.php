@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="text-center mt-5">
                    <h1>Carica Fissi</h1>
                </div>
                {{-- Form import Excel --}}
                <div class="col-8 my-3 ">
                    <form action="{{ route('fissi.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group text-center fw-bold">
                            <label for="import_file">Seleziona il file Excel (XLSX, CSV)</label>
                            <input type="file" name="import_file" class="form-control" id="import_file" required>
                        </div>

                        {{-- Mostriamo gli errori in pagina dalla validazione --}}
                        @error('import_file')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                        <button type="submit" class="btn btn-primary mt-3 ">Importa</button>
                    </form>
                </div>
                @if (session('success'))
                    <div class="col-12 alert alert-success">{{ session('success') }}</div>
                @endif

            </div>
        </div>
    </main>
@endsection
