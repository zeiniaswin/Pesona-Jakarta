{{-- Library eksternal (CDN): Tailwind CSS, Google Fonts, Phosphor Icons --}}
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: { extend: {
            fontFamily: {
                sans:    ['Plus Jakarta Sans', 'Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                display: ['Plus Jakarta Sans', 'Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            colors: {
                paper: '#FFFFFF',
                'paper-soft': '#F7F8FA',
                ink:   '#0F172A',
                'ink-muted': '#64748B',
                merah: { DEFAULT: '#E8192C', dark: '#C0121F', soft: '#FEF1F2' },
                emas:  { DEFAULT: '#F59E0B', soft: '#FFFBEB' },
                biru:  { DEFAULT: '#3B82F6', soft: '#EFF6FF' },
            },
        } },
    };
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/bold/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<noscript><style>.reveal { opacity: 1 !important; transform: none !important; }</style></noscript>
