<div>
    <div id="{{$name}}" name="{{$name}}">
        {!!$value!!}
    </div>

    @script
    <script>
        const {{$name}} = new Quill('#{{$name}}',{
            theme: "snow",
            placeholder: "Write a description....."
        });

        {{$name}}.on('text-change', function(event){
            let value = $('#{{$name}} .ql-editor')[0].innerHTML;
            $wire.dispatch('{{$name}}Updated', {value: value});
        })
    </script>
    @endscript
</div>
