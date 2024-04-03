<div class="left_bar__events">
    <span>{{__('Events')}}</span>
</div>
<div class="iwwf_events">
    <div class="before"><img width="30" height="30" alt="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IS0tIFVwbG9hZGVkIHRvOiBTVkcgUmVwbywgd3d3LnN2Z3JlcG8uY29tLCBHZW5lcmF0b3I6IFNWRyBSZXBvIE1peGVyIFRvb2xzIC0tPg0KPHN2ZyB3aWR0aD0iODBweCIgaGVpZ2h0PSI4MHB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+DQo8cGF0aCBkPSJNMTMgMTVMMTYgMTJNMTYgMTJMMTMgOU0xNiAxMkg4TTcuMiAyMEgxNi44QzE3LjkyMDEgMjAgMTguNDgwMiAyMCAxOC45MDggMTkuNzgyQzE5LjI4NDMgMTkuNTkwMyAxOS41OTAzIDE5LjI4NDMgMTkuNzgyIDE4LjkwOEMyMCAxOC40ODAyIDIwIDE3LjkyMDEgMjAgMTYuOFY3LjJDMjAgNi4wNzk5IDIwIDUuNTE5ODQgMTkuNzgyIDUuMDkyMDJDMTkuNTkwMyA0LjcxNTY5IDE5LjI4NDMgNC40MDk3MyAxOC45MDggNC4yMTc5OUMxOC40ODAyIDQgMTcuOTIwMSA0IDE2LjggNEg3LjJDNi4wNzk5IDQgNS41MTk4NCA0IDUuMDkyMDIgNC4yMTc5OUM0LjcxNTY5IDQuNDA5NzMgNC40MDk3MyA0LjcxNTY5IDQuMjE3OTkgNS4wOTIwMkM0IDUuNTE5ODQgNCA2LjA3OTg5IDQgNy4yVjE2LjhDNCAxNy45MjAxIDQgMTguNDgwMiA0LjIxNzk5IDE4LjkwOEM0LjQwOTczIDE5LjI4NDMgNC43MTU2OSAxOS41OTAzIDUuMDkyMDIgMTkuNzgyQzUuNTE5ODQgMjAgNi4wNzk4OSAyMCA3LjIgMjBaIiBzdHJva2U9IiNmZmZmZmYiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+DQo8L3N2Zz4="></div>
    <div class="iwwf_event__wrapp">
@foreach($event_category_left as $event)
    <div class="iwwf_event">
        <a class="{{ active_linkMenu(asset('/event/'. $event->id) , 'find') }}" href="{{ asset('/event/'. $event->id) }}">{{ $event->title }}</a>
    </div>
@endforeach
    </div>
</div>
