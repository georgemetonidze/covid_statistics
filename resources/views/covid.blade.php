<h1>what is your proffesion</h1>

@foreach($response as $responses)
{{--    @dd($response)--}}
    <p>{{$responses->code}}</p>
    <p>{{$responses->name->ka}}</p>

@endforeach
