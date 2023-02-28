<html>
<body>
    <form method="get" action="{{ url('resoursecontroller.index')}}">
<table>
    @forelse ($books as $book)
    <tr>
    <td><img src="{{asset($book->img_book) }}" height="50" width="50" ></td>
    <td>{{ $book->name }}</td>
    <td>{{ $book->issue_Number }}</td>
    <td>{{ $book->release_Date}}</td>
    {{--  @foreach ($book->auther_id as $b )
    <td>{{$b->name }}</td>
    @endforeach  --}}
    {{-- <td>{{$book->auther_id->name }}</td> --}}
    {{--  @forelse ($book->auther_id as $b )
    {{--  {{$book->auther_id->['name'] }}  --}}
    {{--  {{ $book->auther_id}}
    @empty

    @endforelse  --}}  --}}

    {{--  <td>{{\App\Models\Auther::find($book->auther_id)->name }}</td>  --}}
</tr>
    @empty

    @endforelse
</table>
</form>
</body>

</html>
