@props([
    'judge_active' => '',
    'chosen' => ''
])
<select class="js-chosen" name="judge[]">
   @foreach($chosen->judge as $item)
        @if($item->params)
            <option value="">-</option>
            @foreach($item->params as $junge)
                <option @if($judge_active == $junge) selected @endif value="{{  $junge }}">{{  $junge }}</option>
            @endforeach
        @endif
    @endforeach
</select>
