@props(['title' => 'My Projects'])
<div x-data="{intersect:false}" x-intersect:enter="intersect=true">
    <h2 :class="intersect ? 'animate-fade-up animate-ease-out':'opacity-0'"
        class="opacity-0 text-white/50 text-xs tracking-widest uppercase mb-6">{{$title}}</h2>

    <ul role="list" class="grid grid-cols-1 gap-x-12 gap-y-16 sm:grid-cols-2 lg:grid-cols-3 mb-20">
        {{$slot}}
    </ul>
</div>
