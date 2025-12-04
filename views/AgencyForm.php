<?php
// require_once 'views/template/header.php'; // Diasumsikan header.php sudah termasuk tag <head> dan <body>

// --- BLOK CSS INTERNAL ---
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

/* --- CSS untuk Tabel (Disertakan untuk referensi jika file ini juga menampilkan tabel) --- */

.table-container-card {
    background-color: white;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden; 
}

.table-responsive {
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse; 
}

.table-header-row {
    background-color: #f3f4f6; 
}

.table-header-cell {
    padding: 12px 24px;
    text-align: left;
    font-size: 12px;
    color: #4b5563; 
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-bottom: 1px solid #e5e7eb;
}

.table-data-row:hover {
    background-color: #f7f9fd; 
}

.table-data-cell {
    padding: 16px 24px;
    font-size: 14px;
    color: #374151; 
    border-bottom: 1px solid #f3f4f6;
    white-space: nowrap; 
}

.data-id {
    font-weight: 500;
}

.action-edit {
    color: #2563eb;
    text-decoration: none;
    transition: color 0.2s;
    font-weight: 600;
    margin-right: 10px;
}

.action-edit:hover {
    color: #1d4ed8;
    text-decoration: underline;
}

.action-delete {
    color: #dc2626; 
    text-decoration: none;
    transition: color 0.2s;
    font-weight: 600;
}

.action-delete:hover {
    color: #b91c1c;
    text-decoration: underline;
}

.no-data-cell {
    padding: 20px;
    text-align: center;
    color: #6b7280;
    font-style: italic;
    background-color: #f9fafb;
    border-bottom: none;
    font-size: 14px;
}

</style>

<?php 
require_once 'views/template/header.php';
// --- END BLOK CSS INTERNAL --- 
?>

<div class="container-vtuber form-page">

    <h2 class="page-title form-title">
        <?php echo isset($agency) ? 'Edit Agensi' : 'Tambah Agensi'; ?>
    </h2>

    <div class="form-container-card">
        <form action="index.php?entity=agency&action=<?php echo isset($agency) ? 'update&id=' . $agency['id'] : 'save'; ?>" method="POST" class="data-form">
            <?php if (isset($agency)): ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($agency['id']); ?>">
            <?php endif; ?>
            
            <div class="form-group">
                <label for="name" class="form-label">Nama Agensi:</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="<?php echo isset($agency) ? htmlspecialchars($agency['name']) : ''; ?>" 
                       class="form-input" 
                       required>
            </div>
            
            <div class="form-group">
                <label for="country" class="form-label">Negara:</label>
                <input type="text" 
                       id="country" 
                       name="country" 
                       value="<?php echo isset($agency) ? htmlspecialchars($agency['country']) : ''; ?>" 
                       class="form-input" 
                       required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-submit">
                Simpan
            </button>
        </form>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>