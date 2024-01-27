@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Lista dei post</h2>

    <div class="text-end">

      @if (session('message'))
        <div class="alert alert-success mt-5">
            {{ session('message') }}
        </div>
    @endif
      {{-- <a class="btn btn-success" href="{{ route('admin.posts.create') }}">Crea un nuovo post</a> --}}
    </div>

    <table class="table table-striped mt-5">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Titolo</th>
            <th scope="col">Data</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td class="p-5">
                      <a class="btn btn-success m-3" href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">Dettagli</a>
                      <a class="btn btn-warning m-3" href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                        <i class="fa-solid fa-pencil"></i>
                    </a>


                    <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" class="m-3" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">
                          <i class="fa-solid fa-trash"></i>
                      </button>
                  </form>


                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <div class="text-end my-5">
        <a class="btn btn-secondary" href="{{ route('admin.projects.create') }}">Aggiungi un progetto</a>
      </div>
</div>
@endsection