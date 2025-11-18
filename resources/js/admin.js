/**
 * Admin JS entry
 * - Initializes Select2 for role selects (requires `select2` and `jquery` npm packages)
 */
import $ from 'jquery';
import 'select2';
import 'select2/dist/css/select2.min.css';
import '../css/select2-admin.css';

document.addEventListener('DOMContentLoaded', () => {
    try {
        if (typeof $ !== 'undefined' && $.fn && $.fn.select2) {
            $('.roles-select').each(function () {
                const $el = $(this);
                const ajaxUrl = $el.data('ajax-url');

                if (ajaxUrl) {
                    // If a preload URL is provided, fetch current selections first
                    const preloadUrl = $el.data('preload-url');
                    const initSelect2 = function () {
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
                    };

                    if (preloadUrl) {
                        // fetch preselected items, add them as options, then init select2
                        $.ajax({ url: preloadUrl, dataType: 'json' }).done(function (data) {
                            if (data && data.results && data.results.length) {
                                data.results.forEach(function (it) {
                                    // create the option and mark as selected
                                    const option = new Option(it.text, it.id, true, true);
                                    $el.append(option);
                                });
                            }
                            initSelect2();
                        }).fail(function () {
                            // fallback: init without preloaded items
                            initSelect2();
                        });
                    } else {
                        initSelect2();
                    }
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
