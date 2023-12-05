<ol type='1'>
    @foreach ($uploads as $upload)
        <li value='{{$upload->id}}'>
            {{--
            url("/uploads/{$upload->id}/{$upload->originalName}"
            --}}
            <a href='{{url("/uploads/{$upload->id}/{$upload->originalName}")}}'>{{$upload->originalName}}</a>
            <form method="POST"
                action='{{url("/uploads/{$upload->id}/edit")}}' {{-- NOTE ROUTE STYLE --}}
                style="display:inline!important;"            
            >
                @csrf
                @method('get') {{-- NOTE METHOD --}}
                <input type="submit" value="Edit" style="display:inline!important;" >
            </form>            
            <form method="POST"
                action='{{url("/uploads/{$upload->id}")}}'
                style="display:inline!important;"            
            >
                @csrf
                @method('delete') {{-- NOTE METHOD --}}
                <input type="submit" value="Delete" style="display:inline!important;" >
            </form>
        </li>
    @endforeach
</ol>       
@if (session('operation'))
        {{ session('operation') }} {{ session('id')  }}
@endif   
<a href="/uploads/create">Add file</a>      