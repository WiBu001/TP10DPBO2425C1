# TP10DPBO2425C1

## Janji

Saya **Daffa Dhiyaa Candra** dengan NIM 2404286 mengerjakan  
TP 10 dalam mata kuliah Desain dan Pemrograman  
Berorientasi Objek untuk keberkahanNya maka saya tidak  
melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.  

## Deskripsi Program
Program ini adalah sistem sederhana untuk **manajemen VTuber, Stream, dan Merchandise** menggunakan **PHP, MySQL, dan arsitektur MVP (Model-View-Presenter)**.  
Fitur utama:
- CRUD VTuber (Create, Read, Update, Delete)
- CRUD Stream
- CRUD Merchandise
- Dropdown dinamis VTuber dan Agency
- Form tambah dan edit
- Konfirmasi hapus melalui JavaScript
- Tampilan responsif dan konsisten dengan CSS internal

---

## Desain Program

### 1. Struktur Folder

/project-root  
│  
├─ /config # Penghunbung ke database  
│ └─ database.php  
|  
├─ /models # Model untuk mengakses database  
│ ├─ Agency.php  
│ ├─ Vtuber.php  
│ ├─ Stream.php  
│ └─ Merchandise.php  
│  
├─ /viewmodels # ViewModel untuk menghubungkan Model dengan View  
│ ├─ AgencyViewModel.php  
│ ├─ VtuberViewModel.php  
│ ├─ StreamViewModel.php  
│ └─ MerchandiseViewModel.php  
│  
├─ /views # View untuk menampilkan data dan form  
| ├─ /template # Template header/footer  
| | ├─ header.php  
│ | └─ footer.php  
│ ├─ AgencyList.php  
│ ├─ AgencyForm.php  
│ ├─ VtuberList.php  
│ ├─ VtuberForm.php  
│ ├─ StreamList.php  
│ ├─ StreamForm.php  
│ ├─ MerchandiseList.php  
│ └─ MerchandiseForm.php  
│  
└─ index.php # Entry point utama  

### 2. Alur Program
1. **Request masuk ke `index.php`**.
2. Tentukan **entity** (`agency`, `vtuber`, `stream`, atau `merchandise`) dari `$_GET['entity']` atau default `'vtuber'`.
3. Tentukan **action** (`list`, `add`, `edit`, `save`, `update`, `delete`) dari `$_GET['action']` atau default `'list'`.
4. **Dispatcher** di `index.php` memanggil ViewModel yang sesuai berdasarkan entity:
   - `AgencyViewModel`, `VtuberViewModel`, `StreamViewModel`, `MerchandiseViewModel`.
5. **CRUD Operations**:
   - `list`: menampilkan daftar data.
   - `add`: menampilkan form kosong untuk input data baru.
   - `edit`: menampilkan form dengan data terisi untuk diedit.
   - `save`: menambahkan data baru ke database.
   - `update`: mengubah data yang sudah ada.
   - `delete`: menghapus data.
6. **Form**:
   - Dropdown VTuber muncul di Stream dan Merchandise sesuai data VTuber di database.
   - Validasi HTML5 `required` pada input form.
7. **Tampilan**:
   - Menggunakan CSS internal konsisten, mengikuti template StreamForm.
   - Tombol submit memiliki efek hover dan fokus.

---

## Dokumentasi  



https://github.com/user-attachments/assets/cfe0939f-6dd7-40c8-99f0-77aff76d7b84

