@extends('layouts.layout')
@section('content')
    <main>
        <div class="box_event">
            <h1>{{ $event_item->title }}</h1>
            <div class="subitem_title">{{ $event_item->subtitle }}</div>


<div class="sport">
            <div class="sport__table">

                <div class="sport__tr" >
                    <div class="sport__th sport__thNumber">{{ __('#') }}</div>
                    <div class="sport__th sport__thFlag">--</div>
                    <div class="sport__th sport__thName">{{ $event_item->name }}</div>
                    <div class="sport__th sport__thCountry">{{ $event_item->country }}</div>
                    <div class="sport__th sport__thCategory">{{ $event_item->category }}</div>
                    <div class="sport__th sport__thScore">{{ $event_item->score }}</div>
                </div>
                        @foreach($sport as $i => $item)
                        <div class="sport__tr" id="sportsman_{{$i}}">
                            <div class="sport__td sport__thNumber">{{ $i }}</div>
                            <div class="sport__td sport__thFlag">{{ $item['sport']->{"2"} }}</div>
                            <div class="sport__td sport__thName">{{ $item['sport']->{"3"} }}</div>
                            <div class="sport__td sport__thCountry">{{ $item['sport']->{"4"} }}</div>
                            <div class="sport__td sport__thCategory">{{ $item['sport']->{"5"} }}</div>
                            <div class="sport__td sport__thScore">{{ $item['sport']->{"6"} }}</div>
                        </div>

                    @auth()
                        @if(role(auth()->user()->id) == 'judge')
                        <div class="sport__tr sport__trMobile"></div>

                        <x-forms.auth-form
                            title="{{__('')}}"
                            action="{{ route('addScore.handle') }}"
                            method="POST"
                        >
                        <div class="sport__tr sport__trBlue">
                            <div class="sport__td sport__thJudge"> {{__('Judge')}}</div>
                            <div class="sport__td sport__thEx"> {{__('EX.')}}</div>
                            <div class="sport__td sport__thInt"> {{__('INT')}}</div>
                            <div class="sport__td sport__thComp"> {{__('COMP')}}</div>
                        </div>
                        <div class="sport__tr sport__responce">


                            <div class="sport__td sport__thJudge">
                                <x-forms.chosen :chosen="$event_category"
                                judge_active="{{($item['judge']->{'judge'}[0])??''}}"
                                />
                            </div>
                            <div class="sport__td sport__thEx">
                                <x-forms.text-input
                                    id="score1"
                                    type="text"
                                    name="score1"
                                    value="{{ ($item['score']->{'score'}->{'1'})?:'' }}"

                                />
                            </div>
                            <div class="sport__td sport__thInt">
                                <x-forms.text-input
                                    id="score2"
                                    type="text"
                                    name="score2"
                                    value="{{ ($item['score']->{'score'}->{'2'})?:'' }}"

                                />
                            </div>
                            <div class="sport__td sport__thComp">
                                <x-forms.text-input
                                    id="score3"
                                    type="text"
                                    name="score3"
                                    value="{{ ($item['score']->{'score'}->{'3'})?:'' }}"

                                />
                            </div>
                        </div>
                        <div class="sport__tr sport__responce">
                            <div class="sport__td sport__thJudge">
                                <x-forms.chosen :chosen="$event_category"
                                                judge_active="{{($item['judge']->{'judge'}[1])??''}}"
                                />
                            </div>
                            <div class="sport__td sport__thEx">
                                <x-forms.text-input
                                    id="score4"
                                    type="text"
                                    name="score4"
                                    value="{{ ($item['score']->{'score'}->{'4'})?:'' }}"

                                /></div>
                            <div class="sport__td sport__thInt">
                                <x-forms.text-input
                                    id="score5"
                                    maxlength="3"
                                    type="text"
                                    name="score5"
                                    value="{{ ($item['score']->{'score'}->{'5'})?:'' }}"

                                /></div>
                            <div class="sport__td sport__thComp">
                                <x-forms.text-input
                                    id="score6"
                                    type="text"
                                    name="score6"
                                    value="{{ ($item['score']->{'score'}->{'6'})?:'' }}"

                                />
                            </div>
                        </div>
                        <div class="sport__tr sport__responce">
                            <div class="sport__td sport__thJudge">
                                <x-forms.chosen :chosen="$event_category"
                                                judge_active="{{($item['judge']->{'judge'}[2])??''}}"
                                />
                            </div>


                            <div class="sport__td sport__thEx">
                                <x-forms.text-input
                                    id="score7"
                                    type="text"
                                    name="score7"
                                    value="{{ ($item['score']->{'score'}->{'7'})?:'' }}"

                                />
                            </div>
                            <div class="sport__td sport__thInt">
                                <x-forms.text-input
                                    id="score8"
                                    type="text"
                                    name="score8"
                                    value="{{ ($item['score']->{'score'}->{'8'})?:'' }}"

                                />
                            </div>
                            <div class="sport__td sport__thComp">
                                <x-forms.text-input
                                    id="score9"
                                    type="text"
                                    name="score9"
                                    value="{{ ($item['score']->{'score'}->{'9'})?:'' }}"

                                />
                            </div>
                        </div>
                        <div class="sport__tr sport__button">
                            <input type="hidden" name="yakor_id" value="sportsman_{{$i}}">
                            <input type="hidden" name="event_item" value="{{ $event_item->id }}">
                            <input type="hidden" name="num" value="{{  $i  }}">
                            <div class="sport__td sport__thresult"><x-forms.send-button>{{__('Send')}}</x-forms.send-button></div>
                        </div>
                        </x-forms.auth-form>

                        <div class="sport__tr sport__trMobile"></div>
                        @endif

                        @if(role(auth()->user()->id) == 'manager')
                        <div class="sport__tr sport__trMobile"></div>

                        <div class="sport__tr sport__trBlue">
                            <div class="sport__td sport__thJudge"> {{__('Judge')}}</div>
                            <div class="sport__td sport__thEx"> {{__('EX.')}}</div>
                            <div class="sport__td sport__thInt"> {{__('INT')}}</div>
                            <div class="sport__td sport__thComp"> {{__('COMP')}}</div>
                        </div>
                        <div class="sport__tr sport__responce">

                            <div class="sport__td sport__td__judge sport__thJudge">
                                <div class="">
                                {{($item['judge']->{'judge'}[0])??'—'}}
                                </div>
                            </div>
                            <div class="sport__td sport__thEx">
                              {{ ($item['score']->{'score'}->{'1'})?:'-' }}
                            </div>
                            <div class="sport__td sport__thInt">
                                {{ ($item['score']->{'score'}->{'2'})?:'-' }}
                            </div>
                            <div class="sport__td sport__thComp">
                                {{ ($item['score']->{'score'}->{'3'})?:'-' }}
                            </div>
                        </div>
                        <div class="sport__tr sport__responce">
                            <div class="sport__td sport__td__judge sport__thJudge">
                                <div class="">
                                {{($item['judge']->{'judge'}[1])??'—'}}
                                </div>
                            </div>
                            <div class="sport__td sport__thEx">
                                {{ ($item['score']->{'score'}->{'4'})?:'-' }}
                            </div>
                            <div class="sport__td sport__thInt">
                                {{ ($item['score']->{'score'}->{'5'})?:'-' }}
                            </div>
                            <div class="sport__td sport__thComp">
                                {{ ($item['score']->{'score'}->{'6'})?:'-' }}
                            </div>
                        </div>
                        <div class="sport__tr sport__responce">
                            <div class="sport__td sport__td__judge sport__thJudge">
                                <div class="">
                                {{($item['judge']->{'judge'}[2])??'—'}}
                                </div>
                            </div>

                            <div class="sport__td sport__thEx">
                                {{ ($item['score']->{'score'}->{'7'})?:'-' }}
                            </div>
                            <div class="sport__td sport__thInt">
                                {{ ($item['score']->{'score'}->{'8'})?:'-' }}
                            </div>
                            <div class="sport__td sport__thComp">
                                {{ ($item['score']->{'score'}->{'9'})?:'-' }}
                            </div>
                        </div>


                        <div class="sport__tr sport__trMobile"></div>
                        @endif
                    @endauth
                        @endforeach


            </div>
</div>



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





