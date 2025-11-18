// Page-specific calendar bootstrap (lazy-loaded)

async function initCalendar() {
    if (typeof document === 'undefined') return;
    const el = document.getElementById('calendar');
    if (!el) return;

    // Load FullCalendar modules and CSS dynamically
    const [{ Calendar }, dayGridModule] = await Promise.all([
        import('@fullcalendar/core'),
        import('@fullcalendar/daygrid')
    ]);

    // Import CSS as raw text and inject
    const fcCssModule = await import('../css/vendor/fullcalendar.min.css?raw');
    const fcCss = fcCssModule.default || fcCssModule;
    if (fcCss) {
        const style = document.createElement('style');
        style.setAttribute('data-fullcalendar-css', 'true');
        style.innerHTML = fcCss;
        document.head.appendChild(style);
    }

    const eventsUrl = el.dataset.eventsUrl || '/admin/calendar/events';

    const calendar = new Calendar(el, {
        plugins: [ dayGridModule.default ],
        initialView: 'dayGridMonth',
        events: eventsUrl,
        dateClick: function(info) {
            openEventModal({ start: info.dateStr });
        },
        eventClick: function(info) {
            const id = info.event.id;
            openEventModal(null, id);
        }
    });

    calendar.render();

    // --- CRUD UI / modal handling ---
    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const modalEl = document.getElementById('eventModal');
    const $modal = window.jQuery ? window.jQuery(modalEl) : null;
    const form = document.getElementById('event-form');
    const deleteBtn = document.getElementById('delete-event-btn');

    function initSummernote() {
        if (window.jQuery && typeof window.jQuery.fn.summernote === 'function') {
            window.jQuery('#event-description').summernote({height: 150});
        }
    }

    if ($modal) {
        $modal.on('shown.bs.modal', function () { initSummernote(); });
        $modal.on('hidden.bs.modal', function () {
            if (window.jQuery && typeof window.jQuery.fn.summernote === 'function') {
                window.jQuery('#event-description').summernote('destroy');
            }
            form.reset();
            document.getElementById('event-id').value = '';
            if (deleteBtn) deleteBtn.style.display = 'none';
        });
    }

    document.getElementById('create-event-btn')?.addEventListener('click', function () {
        openEventModal();
    });

    async function openEventModal(prefill = null, id = null) {
        if (id) {
            const res = await fetch(`${eventsUrl}/${id}`);
            if (!res.ok) return alert('Etkinlik yüklenemedi');
            const data = await res.json();
            populateFormFromData(data);
            if (deleteBtn) deleteBtn.style.display = '';
        } else if (prefill) {
            populateFormFromData(prefill);
            if (deleteBtn) deleteBtn.style.display = 'none';
        } else {
            form.reset();
            if (deleteBtn) deleteBtn.style.display = 'none';
        }
        if ($modal) $modal.modal('show');
    }

    function populateFormFromData(data) {
        document.getElementById('event-id').value = data.id || '';
        document.getElementById('event-title').value = data.title || '';
        document.getElementById('event-start').value = data.start ? toLocalInputValue(data.start) : '';
        document.getElementById('event-end').value = data.end ? toLocalInputValue(data.end) : '';
        document.getElementById('event-all-day').checked = !!data.all_day;
        const desc = data.description || '';
        if (window.jQuery && typeof window.jQuery.fn.summernote === 'function') {
            window.jQuery('#event-description').summernote('code', desc);
        } else {
            document.getElementById('event-description').value = desc;
        }
    }

    function toLocalInputValue(iso) {
        const d = new Date(iso);
        const pad = n => String(n).padStart(2,'0');
        const yyyy = d.getFullYear();
        const mm = pad(d.getMonth()+1);
        const dd = pad(d.getDate());
        const hh = pad(d.getHours());
        const min = pad(d.getMinutes());
        return `${yyyy}-${mm}-${dd}T${hh}:${min}`;
    }

    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        const id = document.getElementById('event-id').value;
        const payload = {
            title: document.getElementById('event-title').value,
            start: document.getElementById('event-start').value,
            end: document.getElementById('event-end').value || null,
            all_day: document.getElementById('event-all-day').checked ? 1 : 0,
            description: window.jQuery && typeof window.jQuery.fn.summernote === 'function' ? window.jQuery('#event-description').summernote('code') : document.getElementById('event-description').value
        };

        const method = id ? 'PUT' : 'POST';
        const url = id ? `${eventsUrl}/${id}` : eventsUrl;

        const res = await fetch(url, {
            method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf,
                'Accept': 'application/json'
            },
            body: JSON.stringify(payload)
        });

        if (!res.ok) {
            const txt = await res.text();
            return alert('Kaydetme başarısız: ' + txt);
        }

        if ($modal) $modal.modal('hide');
        calendar.refetchEvents();
    });

    if (deleteBtn) {
        deleteBtn.addEventListener('click', async function () {
            const id = document.getElementById('event-id').value;
            if (!id) return;
            if (!confirm('Etkinliği silmek istediğinizden emin misiniz?')) return;
            const res = await fetch(`${eventsUrl}/${id}`, {
                method: 'DELETE',
                headers: {'X-CSRF-TOKEN': csrf, 'Accept': 'application/json'}
            });
            if (!res.ok) return alert('Silme başarısız');
            if ($modal) $modal.modal('hide');
            calendar.refetchEvents();
        });
    }
}

// Immediately init when script loads (will be a separate chunk)
initCalendar().catch(err => {
    console.error('Failed to init calendar:', err);
});
