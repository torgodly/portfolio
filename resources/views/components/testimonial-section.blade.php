@props(['title' => 'Testimonials'])
<div x-data="{intersect:false}" x-intersect:enter="intersect=true">
    <h2 :class="intersect ? 'animate-fade-up animate-ease-out':'opacity-0'"
        class="text-white/50 text-xs tracking-widest uppercase mb-6 opacity-0">{{$title}}</h2>
    <div class="mx-auto grid grid-cols-1 gap-10">
        {{$slot}}
    </div>
</div>
