document.addEventListener("DOMContentLoaded", function() {
    const eanSection = document.getElementById('ean-section');
    const found = '{$found}';

    if (found === 'true') {
        eanSection.style.display = 'none';
    }
});