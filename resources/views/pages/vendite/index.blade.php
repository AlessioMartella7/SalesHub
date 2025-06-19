@extends('layouts.main', [
    'title' => 'Vendite',
    'description' => 'Gestione delle vendite',
    'breadcrumbs' => [['label' => 'Vendite', 'url' => route('vendite.index')]],
])
@section('content')
    <main>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="text-center mt-5">
                    <h1>Vendite</h1>
                </div>
            </div>
        </div>
    </main>
@endsection
