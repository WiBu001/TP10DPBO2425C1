<?php
// FILE: views/vtuber/VtuberForm.php

// --- BLOK CSS INTERNAL ---
// CATATAN: Blok <style> dari AgencyForm harus diletakkan di sini 
// atau dipindahkan ke file CSS eksternal/header.php agar konsisten. 
// Untuk tujuan ini, saya akan menyertakan blok style di sini.

// --- BLOK CSS INTERNAL (Sama seperti yang Anda berikan di awal) ---
?>
<style>
.container-vtuber {
    width: 90%;
    max-width: 1200px;
    margin: 40px auto; 
    padding: 20px;
    font-family: Arial, sans-serif;
}

.page-title {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    margin-bottom: 25px;
    border-bottom: 2px solid #4f46e5;
    padding-bottom: 10px;
}

/* --- Tombol Umum --- */
.btn {
    display: inline-block;
    padding: 10px 18px;
    font-size: 14px;
    font-weight: 500;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.1s;
    margin-bottom: 20px;
    border: none;
}

.btn-primary {
    background-color: #4f46e5; /* Ungu/Indigo */
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.btn-primary:hover {
    background-color: #4338ca;
    transform: translateY(-1px);
}

/* --- CSS Khusus Formulir --- */

.form-container-card {
    background-color: white;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 30px; 
    max-width: 600px; 
    margin: 0 auto; 
}

.form-title {
    margin-bottom: 30px;
    text-align: center;
}

.data-form {
    display: flex;
    flex-direction: column;
    gap: 15px; 
}

.form-group {
    margin-bottom: 10px;
}

.form-label {
    display: block; 
    font-size: 14px;
    font-weight: 600;
    color: #4b5563; 
    margin-bottom: 6px;
}

.form-input {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #d1d5db; 
    border-radius: 4px;
    font-size: 14px;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
    box-sizing: border-box; 
}

.form-input:focus {
    border-color: #4f46e5; 
    outline: none;
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2); 
}

.btn-submit {
    margin-top: 15px;
    width: auto;
    align-self: flex-start;
}

/* --- CSS untuk Tabel (Opsional) --- */
/* Aturan CSS Tabel (action-edit, action-delete, dll.) dapat ditambahkan di sini 
   jika Anda berencana menggunakan file ini untuk tabel juga, namun biasanya tidak */

</style>

<?php 
require_once 'views/template/header.php';
// --- END BLOK CSS INTERNAL --- 

// Diasumsikan variabel $vtuber berisi data VTuber untuk Edit, 
// dan $agencyList berisi daftar agensi untuk dropdown dari ViewModel.
?>

<div class="container-vtuber form-page">

    <h2 class="page-title form-title">
        <?php echo isset($vtuber) ? 'Edit VTuber' : 'Tambah VTuber Baru'; ?>
    </h2>

    <div class="form-container-card">
        <form action="index.php?entity=vtuber&action=<?php echo isset($vtuber) ? 'update&id=' . htmlspecialchars($vtuber['id']) : 'save'; ?>" method="POST" class="data-form">
            <?php if (isset($vtuber)): ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($vtuber['id']); ?>">
            <?php endif; ?>
            
            <div class="form-group">
                <label for="name" class="form-label">Nama VTuber:</label>
                <input type="text" 
                        id="name" 
                        name="name" 
                        value="<?php echo isset($vtuber) ? htmlspecialchars($vtuber['name']) : ''; ?>" 
                        class="form-input" 
                        required>
            </div>
            
            <div class="form-group">
                <label for="debut_date" class="form-label">Tanggal Debut:</label>
                <input type="date" 
                        id="debut_date" 
                        name="debut_date" 
                        value="<?php echo isset($vtuber) ? htmlspecialchars($vtuber['debut_date']) : ''; ?>" 
                        class="form-input" 
                        required>
            </div>
            
            <div class="form-group">
                <label for="agency_id" class="form-label">Agensi:</label>
                <select id="agency_id" name="agency_id" class="form-input" required>
                    <option value="">-- Pilih Agensi --</option>
                    <?php
                    // Logika untuk mengisi dropdown Agensi
                    if (isset($agencyList) && is_array($agencyList)):
                        $selected_agency_id = isset($vtuber) ? $vtuber['agency_id'] : null;
                        foreach ($agencyList as $agency):
                    ?>
                        <option value="<?php echo htmlspecialchars($agency['id']); ?>" 
                                <?php echo ($selected_agency_id == $agency['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($agency['name']); ?>
                        </option>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary btn-submit">
                Simpan Data
            </button>
        </form>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>