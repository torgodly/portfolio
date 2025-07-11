<x-app-layout>
    <div class="max-w-6xl w-full mx-auto bg-slate-800/30 ring-1 ring-slate-800 min-h-screen">
        <x-particles-animation/>

        <main class="px-6 sm:px-10 lg:px-16 pt-16 z-50 relative overflow-hidden">
            <x-header
                profile-picture="https://nunoguerra.com/imgs/nuno_guerra.jpg"
                :socials="[
                    'github' => 'https://github.com/torgodly/',
                    'instagram' => 'https://www.instagram.com/torgodly/',
                    'x' => 'https://x.com/torgodly',
                    'linkedin' => 'https://www.linkedin.com/in/torgodly/',
                    'telegram' => 'https://t.me/torgodly',
                    'youtube' => 'https://www.youtube.com/@torgodly',
                    'mastodon' => 'https://mastodon.social/@torgodly',
                    'threads' => 'https://www.threads.net/@torgodly',
                    'facebook' => 'https://www.facebook.com/torgodly',
                    'tiktok' => 'https://www.tiktok.com/@torgodly',
                    'discord' => 'https://discord.gg/torgodly',
            ]"
            />

            <div class=" mt-16 sm:mt-20">
                <x-project-section>
                    @foreach($projects as $project)
                        <x-project-components.project-card
                            :id="$loop->index + 1"
                            :links="$project->links"
                            :title="$project->title"
                            :description="$project->description"
                            :logo="$project->logo"/>
                    @endforeach
                </x-project-section>
                <x-testimonial-section>
                    @foreach($testimonials as $testimonial)
                        <x-testimonials.testimonial-card
                            :id="$loop->index + 1"
                            :name="$testimonial->name"
                            :title="$testimonial->title"
                            :quote="$testimonial->quote"
                            :image="$testimonial->image"
                        />
                    @endforeach
                </x-testimonial-section>

            </div>

        </main>

        <x-footer/>
    </div>
</x-app-layout>
