import 'bootstrap';

import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;

document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('sidebarToggle');

    if (!sidebar || !toggle) {
        return;
    }

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
    });
});