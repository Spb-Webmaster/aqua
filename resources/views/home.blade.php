@extends('layouts.layout')
@section('content')
    <main>

            @foreach($event_categories as $key => $event_category)
            <div class="box_event box_event_{{$key}}">
            <h2 class="h2 h2_{{$key}}">{{ $event_category->title }}</h2>
                <div class="subitem_title">{{ $event_category->created_at->format('d.m.Y') }}</div>
                @if(isset($event_category->child))
                    @foreach($event_category->child as $item)
                        <div class="flex box_event__flex">
                            <div class="box_event__text"><a href="{{ asset('/event/'. $event_category->id . '/' . $item->id) }}">{{ $item->title }}</a>
                            </div>
                            <a href="{{ asset('/event/'. $event_category->id . '/' . $item->id) }}" class="box_event__more">{{__('More')}}</a>
                        </div>
                    @endforeach
                @endif
            </div>
            @endforeach



    </main>
@endsection
