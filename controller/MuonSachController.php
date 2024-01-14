<?php
session_start();
include '../model/MuonSachModel.php';
include "../model/BookTransactionModel.php";

$conn = new PDO("mysql:host=localhost;dbname=library", "root", "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['muon_sach'])) {
        $bookId = $_POST['sach'];
        $userId = $_POST['nguoi_dung'];
        $borrowedDatetime = $_POST['tu_ngay'];
        $returnPlanDatetime = $_POST['den_ngay'];
        $result = MuonSachModel::muonSach($bookId, $userId, $borrowedDatetime, $returnPlanDatetime, $conn);
        if ($result) {
            echo $result;
            header("Location: ../view/MuonSachView.php");
            exit();
        }
    } elseif (isset($_POST['lich_su_muon'])) {
        header("Location: ../view/Sach_LichSuMuon-view.php");
        exit();
    }
}

include '../view/MuonSachView.php';
?>
