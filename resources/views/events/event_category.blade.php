@extends('layouts.layout')
@section('content')
    <main>
        <div class="box_event">
            <div class="managerDel_flex">
            <h1>{{ $event_category->title }}</h1>
                @auth()
                    @if(role(auth()->user()->id) == 'manager')

                        <x-forms.auth-form
                            title="{{__('')}}"
                            action="{{ route('delete') }}"
                            method="POST"
                        >
                            <input type="hidden" name="id" value="{{ $event_category->id  }}">
                            <x-slot:buttons>
                                <div class="pageLogin__slotButtons slotButtons">
                                    <div class="slotButtons__flex">

                                        <div class="slotButtons__right">
                                            <x-forms.alert-button>
                                                {{ __('Delete Page') }}
                                            </x-forms.alert-button>
                                        </div>
                                    </div>

                                </div>
                            </x-slot:buttons>
                        </x-forms.auth-form>
                    @endif
                @endauth


           </div>
            <div class="subitem_title">{{ $event_category->created_at->format('d.m.Y') }}</div>
            @if(isset($event_category->child))
                @foreach($event_category->child as $item)
                    <div class="flex box_event__flex">
                        <div class="box_event__text"><a href="{{ asset('/event/'. $event_category->id . '/' . $item->id) }}">{{ $item->title }}</a>
                        </div>
                        <a href="{{ asset('/event/'. $event_category->id . '/' . $item->id) }}" class="box_event__more">More</a>
                    </div>
                @endforeach
            @endif




            @if(isset($event_category->judge))
               <br/> <div class="subitem_title">{{ __('Judges') }}</div>

            @foreach($event_category->judge as $item)
                    @if($item->params)
                        @foreach($item->params as $junge)

                            <div class="flex box_event__flex">
                                <div class="box_event__text">{{  $junge }}
                                </div>
                            </div>
                        @endforeach

                    @endif
                @endforeach
            @endif

        </div>

    </main>
@endsection





