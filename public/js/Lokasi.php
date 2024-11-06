<script>
    // Data kota dari PHP ke JavaScript
    const kotaList = <?php echo json_encode($kotaList); ?>;

    // Fungsi untuk memperbarui dropdown Kota berdasarkan Provinsi yang dipilih
    function updateKotaDropdown() {
        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota');

        const selectedProvinceId = provinsiSelect.value;

        // Hapus semua opsi pada dropdown Kota
        kotaSelect.innerHTML = '<option value="" selected>Pilih Kota/Kabupaten</option>';

        // Filter kota berdasarkan provinsi yang dipilih
        const filteredCities = kotaList.filter(city => city.province_id === selectedProvinceId);

        // Tambahkan opsi kota yang sesuai
        filteredCities.forEach(city => {
            const option = document.createElement('option');
            option.value = city.id;
            option.textContent = city.name;
            kotaSelect.appendChild(option);
        });
    }
</script>