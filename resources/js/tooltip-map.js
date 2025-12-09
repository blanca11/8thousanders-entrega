const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

if (isTouchDevice) {
    document.querySelectorAll('.toggle-tooltip').forEach(icon => {
        icon.addEventListener('click', function (e) {
            e.stopPropagation();
            const tooltip = this.querySelector('.tooltip');

            document.querySelectorAll('.tooltip').forEach(t => {
                if (t !== tooltip) t.style.display = 'none';
            });

            tooltip.style.display = (tooltip.style.display === 'block') ? 'none' : 'block';
        });
    });

    document.body.addEventListener('click', () => {
        document.querySelectorAll('.tooltip').forEach(t => t.style.display = 'none');
    });
}
