<section id="projects" class="py-24">
    <div class="max-w-6xl mx-auto px-6">
        <div class="fade-up mb-14">
            <p class="section-label-line font-mono text-xs uppercase tracking-widest mb-3" style="color: var(--accent);">
                Work</p>
            <h2 class="font-heading font-bold mb-3"
                style="font-size: clamp(1.8rem,4vw,2.6rem); color: var(--text-primary);">Featured Projects</h2>
        </div>
        @php
            $projects = [
                [
                    'icon' => 'fa-store',
                    'title' => 'LeydiBoss',
                    'desc' =>
                        'A capstone web system for LeydiBoss Online built with Angular, PHP, and MySQL, focused on smooth customer experience and practical business operations.',
                    'tech' => ['Angular', 'PHP', 'MySQL'],
                    'live_url' => 'https://leydiboss.online',
                    'github_url' => 'https://github.com/MARKADUCAL/capstone',
                ],
                [
                    'icon' => 'fa-spa',
                    'title' => 'Relevare',
                    'desc' =>
                        'A clinic and spa management system for a skincare boutique salon, built with React, Next.js, and Supabase. Features client profiling, appointment management, and a modern dashboard UI.',
                    'tech' => ['React', 'Next.js', 'Supabase'],
                    'live_url' => 'https://skinclinic.vercel.app/login',
                    'github_url' => 'https://github.com/MARKADUCAL/relevare', // update this kung iba yung actual repo URL
                ],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach ($projects as $i => $proj)
                <div class="project-card fade-up flex flex-col gap-4 rounded-[14px] p-7 border border-[var(--border)] transition-all duration-200 hover:-translate-y-1.5 hover:border-[var(--border-hover)] hover:shadow-[var(--shadow)]"
                    style="background: var(--bg-card); --i: {{ $i }};"
                    onmouseenter="this.style.background='var(--bg-card-hover)'"
                    onmouseleave="this.style.background='var(--bg-card)'">
                    <div class="flex items-start justify-between">
                        <div class="w-11 h-11 rounded-lg flex items-center justify-center text-xl flex-shrink-0"
                            style="background: var(--accent-dim); color: var(--accent);">
                            <i class="fa-solid {{ $proj['icon'] }}"></i>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ $proj['live_url'] }}" target="_blank"
                                class="w-8 h-8 rounded-lg flex items-center justify-center text-[0.85rem] border border-[var(--border)] transition-all duration-200 hover:border-[var(--accent)]"
                                style="background: var(--bg-secondary); color: var(--text-secondary);"
                                title="Live Demo">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                            <a href="{{ $proj['github_url'] }}" target="_blank"
                                class="w-8 h-8 rounded-lg flex items-center justify-center text-[0.85rem] border border-[var(--border)] transition-all duration-200 hover:border-[var(--accent)]"
                                style="background: var(--bg-secondary); color: var(--text-secondary);" title="GitHub">
                                <i class="fa-brands fa-github"></i>
                            </a>
                        </div>
                    </div>

                    <h3 class="text-[1.15rem] font-bold" style="color: var(--text-primary);">{{ $proj['title'] }}</h3>
                    <p class="text-[0.9rem] leading-[1.65] flex-1" style="color: var(--text-secondary);">
                        {{ $proj['desc'] }}</p>

                    <div class="flex flex-wrap gap-1.5">
                        @foreach ($proj['tech'] as $t)
                            <span
                                class="font-mono text-[0.75rem] px-2.5 py-0.5 rounded-lg border border-[var(--border)]"
                                style="background: var(--bg-secondary); color: var(--text-muted);">{{ $t }}</span>
                        @endforeach
                    </div>

                    <div class="flex gap-3 mt-auto pt-1">
                        <a href="{{ $proj['live_url'] }}" target="_blank"
                            class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-[0.85rem] font-medium text-white transition-all duration-200 bg-[var(--accent)] hover:brightness-110 hover:-translate-y-0.5">
                            <i class="fa-solid fa-eye"></i> Live Demo
                        </a>
                        <a href="{{ $proj['github_url'] }}" target="_blank"
                            class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-[0.85rem] font-medium border border-[var(--border)] transition-all duration-200 hover:border-[var(--border-hover)] hover:-translate-y-0.5"
                            style="background: var(--bg-secondary); color: var(--text-secondary);">
                            <i class="fa-brands fa-github"></i> GitHub
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
