<?php
// FILE: views/vtuber/VtuberList.php

// --- BLOK CSS INTERNAL (Menggabungkan Gaya Tabel dan Tombol) ---
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
    background-color: #4f46e5;
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.btn-primary:hover {
    background-color: #4338ca;
    transform: translateY(-1px);
}

/* --- CSS Tabel --- */
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

.action-links {
    white-space: nowrap;
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

<div class="container-vtuber">

    <h2 class="page-title">
        Daftar VTuber
    </h2>

    <a href="index.php?entity=vtuber&action=add" class="btn btn-primary">
        Tambah VTuber
    </a>

    <div class="table-container-card">
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr class="table-header-row">
                        <th class="table-header-cell small-col">ID</th>
                        <th class="table-header-cell">Nama VTuber</th>
                        <th class="table-header-cell medium-col">Tanggal Debut</th>
                        <th class="table-header-cell medium-col">Agensi (ID)</th>
                        <th class="table-header-cell medium-col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Variabel $vtuberList diasumsikan berisi data
                    if (!empty($vtuberList)):
                        foreach ($vtuberList as $vtuber): 
                    ?>
                        <tr class="table-data-row">
                            <td class="table-data-cell data-id">
                                <?php echo htmlspecialchars($vtuber['id']); ?>
                            </td>
                            <td class="table-data-cell">
                                <?php echo htmlspecialchars($vtuber['name']); ?>
                            </td>
                            <td class="table-data-cell">
                                <?php echo htmlspecialchars($vtuber['debut_date']); ?>
                            </td>
                            <td class="table-data-cell">
                                <?php echo htmlspecialchars($vtuber['agency_name']); ?> 
                            </td>
                            <td class="table-data-cell action-links">
                                <a href="index.php?entity=vtuber&action=edit&id=<?php echo $vtuber['id']; ?>" 
                                   class="action-edit">
                                    Edit
                                </a>
                                |
                                <a href="index.php?entity=vtuber&action=delete&id=<?php echo $vtuber['id']; ?>" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus VTuber <?php echo htmlspecialchars($vtuber['name']); ?>?');"
                                   class="action-delete">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php 
                        endforeach;
                    else:
                    ?>
                        <tr>
                            <td colspan="5" class="no-data-cell">
                                Belum ada data VTuber.
                            </td>
                        </tr>
                    <?php 
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>