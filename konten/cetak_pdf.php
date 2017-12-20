<?php
require('fpdf/fpdf.php');
require_once "koneksi/koneksi.php";
session_start();

class PDF extends FPDF {
	  // membuat header
	function Header(){
	  // setting properti font
	  $this->SetFont('Arial','B',20);
	  // menulis header
	  $this->Cell(30,10,'Sistem Akademik Informasi');
	  // membuat jarak terhadap cell sebelumnya
	  $this->Cell(132);
	  $this->Image('img/logo uin.png',180,7,20,20);
	  $this->Line(11,18,103,18);
	  // membuat space kosong antara header dengan teks
	  $this->Ln(12);
	  // menulis header
	  $this->SetFont('Arial','I',15);
	  $this->Cell(30,0,'UIN Syarif Hidayatullah Jakarta');	  
	}  
}
	$pdf=new PDF('P','mm','A4');
	$pdf->AddPage();
	$pdf->Ln(12);
	$tgl=date("Y-m-d");
	$mhs=$_SESSION['id'];
	$sql=mysql_query("SELECT * FROM nilai JOIN user on nilai.id_dosen = user.id_user LEFT JOIN matkul on user.id_matkul = matkul.id_matkul left join mhs on nilai.id_mhs=mhs.id_mhs where nilai.id_mhs = '$mhs'");
	while($data=mysql_fetch_array($sql)){
	$fak=$data["fakultas"];
	$jur=$data["jurusan"];
	$pdf->setFont('Arial','',10);
	$pdf->Cell(11,0,'Nama     = '.$_SESSION['nama']);
	$pdf->Ln(6);
	$pdf->Cell(11,0,'Fakultas = '.$fak);
	$pdf->Ln(6);
	$pdf->Cell(11,0,'Jurusan  = '.$jur);
	$pdf->Ln(6);
	
	$pdf->setFont('Arial','',8);
	$pdf->setFillColor(222,222,222);
	$pdf->setX(11);
	$pdf->CELL(25,6,'NIM',1,0,'C',1);
	$pdf->CELL(40,6,'MATKUL',1,0,'C',1);
	$pdf->CELL(25,6,'FORMATIF',1,0,'C',1);
	$pdf->CELL(10,6,'UTS',1,0,'C',1);
	$pdf->CELL(10,6,'UAS',1,0,'C',1);
	$pdf->CELL(20,6,'NILAI AKHIR',1,0,'C',1);
	$pdf->CELL(15,6,'GRADE',1,0,'C',1);	
	$pdf->CELL(25,6,'PREDIKAT',1,0,'C',1);
	$pdf->CELL(10,6,'IPK',1,0,'C',1);
	$pdf->Ln(6);
	$pdf->setX(11);
	$pdf->setFont('Arial','',8);
	$pdf->setFillColor(255,255,255);
	$pdf->CELL(25,6,$data['id_mhs'],1,0,'C',1);
	$pdf->CELL(40,6,$data['nama_matkul'],1,0,'C',1);
	$pdf->CELL(25,6,$data['formatif'],1,0,'C',1);
	$pdf->CELL(10,6,$data['uts'],1,0,'C',1);
	$pdf->CELL(10,6,$data['uas'],1,0,'C',1);
	$pdf->CELL(20,6,$data['nilai'],1,0,'C',1);
	$pdf->CELL(15,6,$data['huruf'],1,0,'C',1);	
	$pdf->CELL(25,6,$data['predikat'],1,0,'C',1);
	$pdf->CELL(10,6,$data['ipk'],1,0,'C',1);
	}
	$pdf ->Output($_SESSION['nama'].'.pdf','D');
?>