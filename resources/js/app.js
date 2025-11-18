import './bootstrap';
import 'jquery';
import 'bootstrap/dist/js/bootstrap.bundle';
import 'overlayscrollbars/js/OverlayScrollbars';
import 'admin-lte/dist/js/adminlte.min.js';
// UI libraries
import 'select2/dist/css/select2.min.css';
import 'select2';
import 'summernote/dist/summernote-bs4.css';
import 'summernote/dist/summernote-bs4.js';
import 'datatables.net-bs4/css/dataTables.bootstrap4.min.css';
import 'datatables.net-bs4';
import 'datatables.net-responsive-bs4';
import 'jsgrid/dist/jsgrid.min.css';
import 'jsgrid';

// FullCalendar CSS: not imported here because package doesn't export CSS files for ESM.
// Include FullCalendar CSS via CDN in the calendar Blade (resources/views/vendor/adminlte/pages/calendar.blade.php)

// FullCalendar styles will be imported per-page; include base adminlte css
import '../css/app.css';
// FullCalendar is lazy-loaded on the calendar page (see resources/js/pages/calendar.js)
