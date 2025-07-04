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
                    <x-project-components.project-card
                        id="1"
                        :links="['YeahWorks' => 'https://yeahworks1.com', 'YeahWorks2' => 'https://yeahworks2.com']"
                        title="YeahWorks"
                        description="YeahWorks is a web development agency that specializes in creating high-quality, user-friendly websites and applications. We focus on delivering exceptional digital experiences for our clients."
                        logo="https://emis.hiss.edu.ly/images/logo1.png"/>
                    <x-project-components.project-card
                        id="2"
                        :links="['YeahWorks' => 'https://yeahworks1.com', 'YeahWorks2' => 'https://yeahworks2.com']"
                        title="YeahWorks"
                        description="YeahWorks is a web development agency that specializes in creating high-quality, user-friendly websites and applications. We focus on delivering exceptional digital experiences for our clients."
                        logo="https://emis.hiss.edu.ly/images/logo1.png"/>
                </x-project-section>
                <x-testimonial-section>
                    <x-testimonials.testimonial-card
                        id="1"
                        author="John Doe"
                        author_title="Software Engineer"
                        quote="YeahWorks has been a game-changer for our business. Their expertise in web development is unmatched, and they consistently deliver high-quality work."
                        author_image="https://nunoguerra.com/imgs/nuno_maduro.jpg?12433432"/>
                </x-testimonial-section>

            </div>

        </main>

        <x-footer/>
    </div>
</x-app-layout>
