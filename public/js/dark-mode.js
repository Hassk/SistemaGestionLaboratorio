document.addEventListener('DOMContentLoaded', function() {
    const toggleSwitch = document.getElementById('mode-toggle');
    const currentMode = localStorage.getItem('mode') || 'light';

    if (currentMode === 'dark') {
        document.body.classList.add('dark-mode');
        document.body.classList.remove('light-mode');
        toggleSwitch.checked = true;
    } else {
        document.body.classList.add('light-mode');
        document.body.classList.remove('dark-mode');
    }

    toggleSwitch.addEventListener('change', function() {
        if (toggleSwitch.checked) {
            document.body.classList.add('dark-mode');
            document.body.classList.remove('light-mode');
            localStorage.setItem('mode', 'dark');
        } else {
            document.body.classList.add('light-mode');
            document.body.classList.remove('dark-mode');
            localStorage.setItem('mode', 'light');
        }

        // Cambiar clases en el sidebar
        const sidebar = document.querySelector('.sidebar');
        if (sidebar) {
            if (toggleSwitch.checked) {
                sidebar.classList.add('dark-mode');
                sidebar.classList.remove('light-mode');
            } else {
                sidebar.classList.add('light-mode');
                sidebar.classList.remove('dark-mode');
            }
        }
    });
});
