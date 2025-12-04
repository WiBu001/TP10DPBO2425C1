<?php
// FILE: views/stream/StreamForm.php

// --- BLOK CSS INTERNAL (Menggunakan gaya yang konsisten) ---
?>
<style>
.container-stream {
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
</style>

<?php 
require_once 'views/template/header.php';
// Diasumsikan variabel $stream berisi data stream untuk Edit, dan $vtuberList berisi daftar vtuber untuk dropdown.
?>

<div class="container-stream form-page">

    <h2 class="page-title form-title">
        <?php echo isset($stream) ? 'Edit Stream: ' . htmlspecialchars($stream['title']) : 'Tambah Stream Baru'; ?>
    </h2>

    <div class="form-container-card">
        <form action="index.php?entity=stream&action=<?php echo isset($stream) ? 'update&id=' . htmlspecialchars($stream['id']) : 'save'; ?>" method="POST" class="data-form">
            <?php if (isset($stream)): ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($stream['id']); ?>">
            <?php endif; ?>
            
            <div class="form-group">
                <label for="vtuber_id" class="form-label">VTuber:</label>
                <select id="vtuber_id" name="vtuber_id" class="form-input" required>
                    <option value="">-- Pilih VTuber --</option>
                    <?php
                    // Diasumsikan $vtuberList berisi array data vtuber: [{'id': 1, 'name': 'Anya'}, ...]
                    if (isset($vtuberList) && is_array($vtuberList)):
                        $selected_vtuber_id = isset($stream) ? $stream['vtuber_id'] : null;
                        foreach ($vtuberList as $vtuber):
                    ?>
                        <option value="<?php echo htmlspecialchars($vtuber['id']); ?>" 
                                <?php echo ($selected_vtuber_id == $vtuber['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($vtuber['name']); ?>
                        </option>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="title" class="form-label">Judul Stream:</label>
                <input type="text" 
                        id="title" 
                        name="title" 
                        value="<?php echo isset($stream) ? htmlspecialchars($stream['title']) : ''; ?>" 
                        class="form-input" 
                        required>
            </div>
            
            <div class="form-group">
                <label for="stream_date" class="form-label">Tanggal Stream:</label>
                <input type="date" 
                        id="stream_date" 
                        name="stream_date" 
                        value="<?php echo isset($stream) ? htmlspecialchars(substr($stream['stream_date'], 0, 10)) : ''; ?>" 
                        class="form-input" 
                        required>
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