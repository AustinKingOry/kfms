document.addEventListener('DOMContentLoaded', function() {
    const selectCrop = document.querySelectorAll('.select-crop');
    selectCrop.forEach(select => {
        select.addEventListener('change', function() {
            const selectedCrop = this.value;
            const medicineField = this.closest('form').querySelector('.medicine-field');
            const manureField = this.closest('form').querySelector('.manure-field');
            const chemicalField = this.closest('form').querySelector('.chemical-field');
            if (selectedCrop === 'Pyrethrum') {
                medicineField.value = 'Insecticides';
                manureField.value = 'Compost';
                chemicalField.value = 'Pesticides';
            } else {
                medicineField.value = '';
                manureField.value = '';
                chemicalField.value = '';
            }
        });
    });
});
