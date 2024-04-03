@props([
   'title' => '',
   'subtitle' => '',
   'action' => '',
   'method' => 'post',
   'buttons' => '',
   'enctype' => '',
])


    <div class="blockForm">
        @if($title) <h1 class="blockForm__h1">{{ $title }}</h1>@endif
        @if($subtitle)
            <p class="blockForm__pSubTitle text_center   color_grey color_grey_22">{{ $subtitle }}</p>
        @endif
        <form class="form"
              action="{{ $action }}"
              method="{{ $method }}"
              enctype= "{{ $enctype }}"


        >
            @csrf
            {{ $slot  }}

            {{ $buttons  }}
        </form>
    </div><!--.blockForm-->
