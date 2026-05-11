<section id="skills" class="py-24" style="background: var(--bg-secondary);">
    <div class="max-w-6xl mx-auto px-6">
        <div class="fade-up mb-14">
            <p class="section-label-line font-mono text-xs uppercase tracking-widest mb-3" style="color: var(--accent);">
                Tech Stack</p>
            <h2 class="font-heading font-bold mb-3"
                style="font-size: clamp(1.8rem,4vw,2.6rem); color: var(--text-primary);">Skills &amp; Technologies</h2>
        </div>

        @php
            $skillGroups = [
                [
                    'icon' => 'fa-paintbrush',
                    'title' => 'Frontend',
                    'skills' => [
                        ['HTML / CSS', 90],
                        ['JavaScript', 78],
                        ['Angular', 72],
                        ['React', 60], // added
                    ],
                ],
                [
                    'icon' => 'fa-server',
                    'title' => 'Backend',
                    'skills' => [['PHP', 85], ['Laravel', 82], ['Node.js', 65], ['REST API', 78]],
                ],
                [
                    'icon' => 'fa-database',
                    'title' => 'Database',
                    'skills' => [
                        ['MySQL (XAMPP)', 82],
                        ['Supabase', 60], // added
                        ['Database Design', 75],
                        ['Query Optimization', 75],
                    ],
                ],
                [
                    'icon' => 'fa-wrench',
                    'title' => 'Tools & Others',
                    'skills' => [
                        ['Git / GitHub', 80],
                        ['Tailwind CSS (Beginner)', 45],
                        ['UI/UX (Figma)', 68],
                        ['Testing', 66],
                    ],
                ],
            ];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
            @foreach ($skillGroups as $i => $group)
                <div class="skill-card fade-up rounded-[14px] p-7 border border-[var(--border)] transition-all duration-200 hover:-translate-y-1 hover:border-[var(--border-hover)] hover:shadow-[var(--shadow-card)]"
                    style="background: var(--bg-card); --i: {{ $i }};">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-[1.1rem]"
                            style="background: var(--accent-dim); color: var(--accent);">
                            <i class="fa-solid {{ $group['icon'] }}"></i>
                        </div>
                        <span class="text-[0.95rem] font-semibold"
                            style="color: var(--text-primary);">{{ $group['title'] }}</span>
                    </div>

                    @foreach ($group['skills'] as [$name, $pct])
                        <div class="mb-4 last:mb-0">
                            <div class="flex justify-between items-center mb-1.5">
                                <span class="text-[0.88rem]"
                                    style="color: var(--text-secondary);">{{ $name }}</span>
                                <span class="font-mono text-[0.78rem]"
                                    style="color: var(--accent);">{{ $pct }}%</span>
                            </div>
                            <div class="h-[5px] rounded-full overflow-hidden" style="background: var(--bg-secondary);">
                                <div class="progress-fill" data-width="{{ $pct }}"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
