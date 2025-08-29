{{-- resources/views/import/form.blade.php --}}
@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="text-center mt-5">
                    <h1>Importazione File</h1>
                </div>

                <div class="col-8 my-3">
                    <form id="importForm" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Select import type --}}
                        <div class="form-group text-center fw-bold">
                            <label for="import_type">Tipo di file da importare</label>
                            <select name="import_type" id="import_type" class="form-control" required>
                                <option value="">-- Seleziona tipo --</option>
                                <option value="fissi">Fissi</option>
                                <option value="energia">Energia</option>
                            </select>
                        </div>

                        {{-- File input --}}
                        <div class="form-group text-center fw-bold mt-3">
                            <label for="import_file">Seleziona il file Excel (XLSX, CSV)</label>
                            <input type="file" name="import_file" class="form-control" id="import_file" required>
                        </div>

                        {{-- Validation / Flash errors --}}
                        @error('import_file')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror

                        @error('import_type')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror

                        @if (session('error'))
                            <div class="alert alert-danger mt-2">{{ session('error') }}</div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success mt-2">{{ session('success') }}</div>
                        @endif

                        <button type="submit" class="btn btn-primary mt-3">Importa</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('additional scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const importTypeSelect = document.getElementById('import_type');
            const form = document.getElementById('importForm');

            importTypeSelect.addEventListener('change', function() {
                const tipo = this.value;

                @php
                    // Provide fallback routes for safety
                    $routes = [
                        'fissi' => route('fissi.import'),
                        'energia' => route('energia.import'),
                    ];
                @endphp

                const routes = @json($routes);

                form.action = routes[tipo] ?? "#";
            });
        });
    </script>
@endsection
