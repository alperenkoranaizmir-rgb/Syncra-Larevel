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
            $('.roles-select').each(function () {
                const $el = $(this);
                const ajaxUrl = $el.data('ajax-url');

                if (ajaxUrl) {
                    $el.select2({
                        width: '100%',
                        placeholder: $el.data('placeholder') || 'Roller seçin (isteğe bağlı)',
                        minimumInputLength: 1,
                        ajax: {
                            url: ajaxUrl,
                            dataType: 'json',
                            delay: 250,
                            data: function (params) {
                                return {
                                    q: params.term,
                                    page: params.page || 1
                                };
                            },
                            processResults: function (data, params) {
                                params.page = params.page || 1;
                                return {
                                    results: data.results || [],
                                    pagination: { more: data.pagination ? data.pagination.more : false }
                                };
                            },
                        }
                    });
                } else {
                    // simple local init
                    $el.select2({
                        width: '100%',
                        placeholder: $el.data('placeholder') || 'Roller seçin (isteğe bağlı)'
                    });
                }
            });
        }
    } catch (e) {
        // fail silently — Select2 is enhancement only
        console.warn('Select2 init failed', e);
    }
});
