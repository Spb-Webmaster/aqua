@if($message = flash()->get())
    <div class="flashMassegeFixed">
        <div class="{{ $message->class() }} flashMassege">

            {{ $message->message() }}

        </div>
    </div>
@endif

@if ($errors->any())
    <div class="flashMassegeFixed">
        <div class="class__alert flashMassege">

            @foreach ($errors->all() as $error)
                {{ $error }}<br/>
            @endforeach

        </div>
    </div>
@endif
