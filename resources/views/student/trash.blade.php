<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a class="btn btn-primary mb-3" href="{{ route('student.create') }}" role="button">
        Create
    </a>
    <ul class="list-group">
        @foreach ($students as $student)
            <li class="list-group-item">
                {{ $loop->iteration }}.{{ $student->nim }} -- {{ $student->name }} -- {{ $student->gender }}


                <form action="{{ route('student.restore', $student->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="btn btn-warning btn-sm"
                        onclick="return confirm('Anda Yakin Ingin Mengembalikan Data?')">
                        Restore
                    </button>
                </form>

                <form action="{{ route('student.force-delete', $student->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Anda Yakin Ingin Menghapus Secara Permanen?')">
                        Force Delete
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app>
