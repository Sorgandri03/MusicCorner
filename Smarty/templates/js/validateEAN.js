function validateEAN() {
    const eanInput = document.querySelector('input[name="EAN"]');
    const ean = eanInput.value.trim();
    const eanPattern = /^\d{13}$/;

    if (!eanPattern.test(ean)) {
        alert("Il codice EAN deve essere un numero di 13 cifre.");
        return false;
    }

    return true;
}