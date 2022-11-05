<!DOCTYPE html>

    <body class="">

    @foreach ($videos as $video)
        @if(str_contains($video, 'https'))
            <video width="400" controls>
                <source src="{{$video}}">
                <source src="mov_bbb.ogg" type="video/ogg">
                Your browser does not support HTML video.
            </video>
            @else
            <h3>{{$video}}</h3>

            @endif
    @endforeach


    <a href="/video?page={{$current + 1}}"> <h1>NEXT</h1></a>

    </body>
</html>
