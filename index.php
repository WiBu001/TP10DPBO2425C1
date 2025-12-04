<?php
// --- Memuat ViewModels ---
// Asumsi semua file ViewModel berada di direktori 'viewmodels/'
// Perhatikan nama file di komentar: AgencyViewModels.php, merchandiseViewModels.php, dll.
require_once 'viewmodels/AgencyViewModels.php';
require_once 'viewmodels/VtuberViewModels.php';
require_once 'viewmodels/StreamViewModels.php';
require_once 'viewmodels/MerchandiseViewModels.php'; 
// Catatan: Saya menggunakan nama file yang konsisten, pastikan nama file di sistem Anda sudah benar.

// Menentukan entitas (tabel) dan aksi (operasi) dari URL
$entity = isset($_GET['entity']) ? $_GET['entity'] : 'vtuber'; // Default ke 'vtuber'
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

## 🚀 Dispatcher Controller
// Logika utama memproses permintaan berdasarkan entitas yang diminta

switch ($entity) {
    case 'agency':
        // ==============================================
        // --- Logika untuk Entitas Agency (Menggunakan metode AgencyViewModel) ---
        // ==============================================
        $agencyVM = new AgencyViewModel();

        switch ($action) {
            case 'list':
                // Metode: getAgencyList()
                $agencyList = $agencyVM->getAgencyList();
                require_once 'views/AgencyList.php';
                break;
            case 'add':
                require_once 'views/AgencyForm.php';
                break;
            case 'edit':
                $id = $_GET['id'];
                $agency = $agencyVM->getAgencyById($id);
                require_once 'views/AgencyForm.php';
                break;
            case 'save':
                // Metode: addAgency($name, $country)
                $name = $_POST['name'];
                $country = $_POST['country'];
                $agencyVM->addAgency($name, $country);
                header('Location: index.php?entity=agency&action=list');
                exit();
            case 'update':
                // Metode: updateAgency($id, $name, $country)
                $id = $_POST['id'];
                $name = $_POST['name'];
                $country = $_POST['country'];
                $agencyVM->updateAgency($id, $name, $country);
                header('Location: index.php?entity=agency&action=list');
                exit();
            case 'delete':
                // Metode: deleteAgency($id)
                $id = $_GET['id'];
                $agencyVM->deleteAgency($id);
                header('Location: index.php?entity=agency&action=list');
                exit();
            default:
                echo "Invalid action for Agency.";
                break;
        }
        break;

    case 'vtuber':
        // ===========================================
        // --- Logika untuk Entitas Vtuber (Menggunakan metode VtuberViewModel) ---
        // ===========================================
        $vtuberVM = new VtuberViewModel();
        // Asumsi: Kita masih memerlukan AgencyModel untuk dropdown di form Vtuber
        $agencyVM = new AgencyViewModel(); 

        switch ($action) {
            case 'list':
                // Metode: getVtuberList()
                $vtuberList = $vtuberVM->getVtuberList();
                require_once 'views/VtuberList.php';
                break;
            case 'add':
                // Data agensi untuk dropdown form
                $agencyList = $agencyVM->getAgencyList(); 
                require_once 'views/VtuberForm.php';
                break;
            case 'edit':
                $id = $_GET['id'];
                $vtuber = $vtuberVM->getVtuberById($id);
                $agencyList = $agencyVM->getAgencyList(); 
                require_once 'views/VtuberForm.php';
                break;
            case 'save':
                // Metode: addVtuber($name, $debut_date, $agency_id)
                $name = $_POST['name'];
                $debut_date = $_POST['debut_date'];
                $agency_id = $_POST['agency_id'];
                $vtuberVM->addVtuber($name, $debut_date, $agency_id);
                header('Location: index.php?entity=vtuber&action=list');
                exit();
            case 'update':
                // Metode: updateVtuber($id, $name, $debut_date, $agency_id)
                $id = $_POST['id'];
                $name = $_POST['name'];
                $debut_date = $_POST['debut_date'];
                $agency_id = $_POST['agency_id'];
                $vtuberVM->updateVtuber($id, $name, $debut_date, $agency_id);
                header('Location: index.php?entity=vtuber&action=list');
                exit();
            case 'delete':
                // Metode: deleteVtuber($id)
                $id = $_GET['id'];
                $vtuberVM->deleteVtuber($id);
                header('Location: index.php?entity=vtuber&action=list');
                exit();
            default:
                echo "Invalid action for Vtuber.";
                break;
        }
        break;

    case 'stream':
        // ==================================================
        // --- Logika untuk Entitas Stream (Menggunakan metode StreamViewModel) ---
        // ==================================================
        $streamVM = new StreamViewModel();
        // Asumsi: Kita memerlukan VtuberViewModel untuk dropdown di form Stream
        $vtuberVM = new VtuberViewModel(); 

        switch ($action) {
            case 'list':
                // Metode: getStreamList()
                $streamList = $streamVM->getStreamList();
                require_once 'views/StreamList.php';
                break;
            case 'add':
                // Data Vtuber untuk dropdown form
                $vtuberList = $vtuberVM->getVtuberList(); 
                require_once 'views/StreamForm.php';
                break;
            case 'edit':
                $id = $_GET['id'];
                $stream = $streamVM->getStreamById($id);
                $vtuberList = $vtuberVM->getVtuberList();
                require_once 'views/StreamForm.php';
                break;
            case 'save':
                // Metode: addStream($vtuber_id, $title, $stream_date)
                $vtuber_id = $_POST['vtuber_id'];
                $title = $_POST['title'];
                $stream_date = $_POST['stream_date']; 
                $streamVM->addStream($vtuber_id, $title, $stream_date);
                header('Location: index.php?entity=stream&action=list');
                exit();
            case 'update':
                // Metode: updateStream($id, $vtuber_id, $title, $stream_date)
                $id = $_POST['id'];
                $vtuber_id = $_POST['vtuber_id'];
                $title = $_POST['title'];
                $stream_date = $_POST['stream_date']; 
                $streamVM->updateStream($id, $vtuber_id, $title, $stream_date);
                header('Location: index.php?entity=stream&action=list');
                exit();
            case 'delete':
                // Metode: deleteStream($id)
                $id = $_GET['id'];
                $streamVM->deleteStream($id);
                header('Location: index.php?entity=stream&action=list');
                exit();
            default:
                echo "Invalid action for Stream.";
                break;
        }
        break;

    case 'merchandise':
        // ==============================================
        // --- Logika untuk Entitas Merchandise (Menggunakan metode MerchandiseViewModel) ---
        // ==============================================
        $merchandiseVM = new MerchandiseViewModel();
        // Asumsi: Kita memerlukan VtuberViewModel untuk dropdown di form Merchandise
        $vtuberVM = new VtuberViewModel(); 

        switch ($action) {
            case 'list':
                // Metode: getMerchList()
                $merchandiseList = $merchandiseVM->getMerchList();
                require_once 'views/MerchandiseList.php';
                break;
            case 'add':
                // Data Vtuber untuk dropdown form
                $vtuberList = $vtuberVM->getVtuberList(); 
                require_once 'views/MerchandiseForm.php';
                break;
            case 'edit':
                $id = $_GET['id'];
                // Metode: getMerchById($id)
                $merchandise = $merchandiseVM->getMerchById($id);
                $vtuberList = $vtuberVM->getVtuberList(); 
                require_once 'views/MerchandiseForm.php';
                break;
            case 'save':
                // Metode: addMerch($vtuber_id, $item_name, $price)
                $vtuber_id = $_POST['vtuber_id'];
                $item_name = $_POST['item_name'];
                $price = $_POST['price'];
                $merchandiseVM->addMerch($vtuber_id, $item_name, $price);
                header('Location: index.php?entity=merchandise&action=list');
                exit();
            case 'update':
                // Metode: updateMerch($id, $vtuber_id, $item_name, $price)
                $id = $_POST['id'];
                $vtuber_id = $_POST['vtuber_id'];
                $item_name = $_POST['item_name'];
                $price = $_POST['price'];
                $merchandiseVM->updateMerch($id, $vtuber_id, $item_name, $price);
                header('Location: index.php?entity=merchandise&action=list');
                exit();
            case 'delete':
                // Metode: deleteMerch($id)
                $id = $_GET['id'];
                $merchandiseVM->deleteMerch($id);
                header('Location: index.php?entity=merchandise&action=list');
                exit();
            default:
                echo "Invalid action for Merchandise.";
                break;
        }
        break;

    default:
        // Jika entitas tidak dikenali
        echo "Invalid entity specified.";
        break;
}

?>