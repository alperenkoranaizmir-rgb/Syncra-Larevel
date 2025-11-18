/**
 * Admin JS entry
 * - Initializes Select2 for role selects (requires `select2` and `jquery` npm packages)
 */
import $ from 'jquery';
import 'select2';
import 'select2/dist/css/select2.min.css';

document.addEventListener('DOMContentLoaded', () => {
    try {
        if (typeof $ !== 'undefined' && $.fn && $.fn.select2) {
            $('.roles-select').select2({
                width: '100%',
                placeholder: 'Roller seçin (isteğe bağlı)'
            });
        }
    } catch (e) {
        // fail silently — Select2 is enhancement only
        console.warn('Select2 init failed', e);
    }
});
