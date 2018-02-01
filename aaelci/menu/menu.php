<?php

require_once('../TreeMenu.php');

    
$icon         = 'folder.gif';
    
$expandedIcon = 'folder-expanded.gif';

    
$menu  = new HTML_TreeMenu();

    
$node1   = new HTML_TreeNode(array('text' => "Penataan AIL", 'link' => "test.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), array('onclick' => "alert('*** Silakan memilih sub menu ***'); 
return false", 'onexpand' => "alert('Expanded')"));
    
$node1_1 = &$node1->addItem(new HTML_TreeNode(array('text' => "Entry/Edit AIL", 'link' => "../proc_1/pengail_entry_idpel.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_2 = &$node1->addItem(new HTML_TreeNode(array('text' => "Lihat AIL", 'link' => "../proc_1/pengail_lihat_idpel.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_3 = &$node1->addItem(new HTML_TreeNode(array('text' => "Transaksi AIL", 'link' => "menu_alert.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
 
$node1_3_1 = &$node1_3->addItem(new HTML_TreeNode(array('text' => "Peminjaman AIL", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_3_2 = &$node1_3->addItem(new HTML_TreeNode(array('text' => "Pengembalian AIL", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_4 = &$node1->addItem(new HTML_TreeNode(array('text' => "Rekapitulasi Penataan AIL", 'link' => "menu_alert.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_4_1 = &$node1_4->addItem(new HTML_TreeNode(array('text' => "Menurut Gardu", 'link' => "menu_alert2.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_4_2 = &$node1_4->addItem(new HTML_TreeNode(array('text' => "Menurut Daya Terpasang", 'link' => "../proc_1/pengail_rekap_daya_pilih.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_4_3 = &$node1_4->addItem(new HTML_TreeNode(array('text' => "Menurut Lemari Penyimpanan", 'link' => "../proc_1/pengail_rekap_lemari.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_4_4 = &$node1_4->addItem(new HTML_TreeNode(array('text' => "Menurut hasil scanning", 'link' => "../proc_1/pengail_rekap_image.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_5 = &$node1->addItem(new HTML_TreeNode(array('text' => "Monitoring Penataan AIL", 'link' => "../proc_1/pengail_rekap_rayon.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_6 = &$node1->addItem(new HTML_TreeNode(array('text' => "Kertas Kerja Penataan AIL", 'link' => "menu_alert.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_6_1 = &$node1_6->addItem(new HTML_TreeNode(array('text' => "PDP I.I-001 : Kelengkapan AIL", 'link' => "../proc_1/pengail_laporan_pdpi_i001_pilih.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_6_2 = &$node1_6->addItem(new HTML_TreeNode(array('text' => "PDP I.I-002 : BAST Amplop AIL", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_6_3 = &$node1_6->addItem(new HTML_TreeNode(array('text' => "PDP I.II-001 : Kartu Indeks AIL", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_6_4 = &$node1_6->addItem(new HTML_TreeNode(array('text' => "PDP I.II-002 : Daftar Isi Rak Penyimpanan", 'link' => "../proc_1/pengail_laporan_pdpi_ii002_pilih.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_6_5 = &$node1_6->addItem(new HTML_TreeNode(array('text' => "PDP I.II-003 : Daftar AIL Tersimpan", 'link' => "../proc_1/pengail_laporan_pdpi_ii003_pilih.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_6_6 = &$node1_6->addItem(new HTML_TreeNode(array('text' => "PDP I.IV-001 : Pengawasan Penyimpanan AIL", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node1_6_7 = &$node1_6->addItem(new HTML_TreeNode(array('text' => "PDP I Add-001 : Daftar AIL sudah di-scan", 'link' => "../proc_1/pengail_laporan_image_pilih.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    

$node2   = new HTML_TreeNode(array('text' => "Analisis Data Pelanggan & Prioritas", 'link' => "test.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), array('onclick' => "alert('*** Silakan memilih sub menu ***'); 
return false", 'onexpand' => "alert('Expanded')"));
    
$node2_1 = &$node2->addItem(new HTML_TreeNode(array('text' => "Identifikasi Prioritas", 'link' => "menu_alert_pdp2.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
//$node2_1 = &$node2->addItem(new HTML_TreeNode(array('text' => "Identifikasi Prioritas", 'link' => "../proc_2/pengail_entry_prioritas.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node2_2 = &$node2->addItem(new HTML_TreeNode(array('text' => "Prioritas Menurut Daya", 'link' => "../proc_2/pengail_prioritas_daya_pilih.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node2_3 = &$node2->addItem(new HTML_TreeNode(array('text' => "Jadwal Pembenahan Data", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node2_4 = &$node2->addItem(new HTML_TreeNode(array('text' => "Kertas Kerja Analisis Data & Prioritas", 'link' => "menu_alert.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node2_4_1 = &$node2_4->addItem(new HTML_TreeNode(array('text' => "PDP II.I-001 : Identifikasi Prioritas", 'link' => "../proc_2/pengail_laporan_pdpii_i001_pilih.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node2_4_2 = &$node2_4->addItem(new HTML_TreeNode(array('text' => "PDP II.II-001 : Laporan Akhir Identifikasi Prioritas", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node2_4_3 = &$node2_4->addItem(new HTML_TreeNode(array('text' => "PDP II.II-002 : Daftar Pelanggan Prioritas", 'link' => "../proc_2/pengail_laporan_pdpii_ii002_pilih.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node2_4_4 = &$node2_4->addItem(new HTML_TreeNode(array('text' => "PDP II.II-003 : Jadwal Pembenahan Data Pelanggan", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    

$node3   = new HTML_TreeNode(array('text' => "Verifikasi DIL dengan AIL", 'link' => "test.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), array('onclick' => "alert('*** Silakan memilih sub menu ***'); 
return false", 'onexpand' => "alert('Expanded')"));
    
$node3_1 = &$node3->addItem(new HTML_TreeNode(array('text' => "Rencana Kerja Verifikasi DIL/AIL", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node3_2 = &$node3->addItem(new HTML_TreeNode(array('text' => "Verifikasi DIL/AIL", 'link' => "../proc_3/pengail_entry_dil_ail.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node3_3 = &$node3->addItem(new HTML_TreeNode(array('text' => "Kertas Kerja Verifikasi DIL/AIL", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node3_3_1 = &$node3_3->addItem(new HTML_TreeNode(array('text' => "PDP III.I-001  : Rencana Kerja Verifikasi DIL/AIL", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node3_3_2 = &$node3_3->addItem(new HTML_TreeNode(array('text' => "PDP III.I-002a : Prosedur dan Atribut", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node3_3_3 = &$node3_3->addItem(new HTML_TreeNode(array('text' => "PDP III.I-002b : Kertas Kerja Verifikasi DIL/AIL", 'link' => "../proc_3/pengail_laporan_pdpiii_i002b_pilih.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node3_3_4 = &$node3_3->addItem(new HTML_TreeNode(array('text' => "PDP III.II-001  : Laporan Hasil Akhir", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    

$node4   = new HTML_TreeNode(array('text' => "Verifikasi Fisik", 'link' => "test.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), array('onclick' => "alert('*** Silakan memilih sub menu ***'); 
return false", 'onexpand' => "alert('Expanded')"));
    
$node4_1 = &$node4->addItem(new HTML_TreeNode(array('text' => "Rencana Kerja Verifikasi Fisik", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node4_2 = &$node4->addItem(new HTML_TreeNode(array('text' => "Entry Hasil Verifikasi Fisik", 'link' => "../proc_4/pengail_entry_fisik.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node4_3 = &$node4->addItem(new HTML_TreeNode(array('text' => "Laporan Akhir", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node4_4 = &$node4->addItem(new HTML_TreeNode(array('text' => "Kertas Kerja Verifikasi DIL/AIL", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node4_4_1 = &$node4_4->addItem(new HTML_TreeNode(array('text' => "PDP IV.I-001    : Rencana Kerja Verifikasi Fisik", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node4_4_2 = &$node4_4->addItem(new HTML_TreeNode(array('text' => "PDP IV.II-001   : BA Pelaksanaan Verifikasi Fisik", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node4_4_3 = &$node4_4->addItem(new HTML_TreeNode(array('text' => "PDP IV.III-001a : Prosedur dan Atribut", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node4_4_4 = &$node4_4->addItem(new HTML_TreeNode(array('text' => "PDP IV.III-001b : Kertas Kerja Verifikasi Fisik", 'link' => "../proc_4/pengail_laporan_pdpiv_iii001b_pilih.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node4_4_5 = &$node4_4->addItem(new HTML_TreeNode(array('text' => "PDP IV.III-002  : Laporan Hasil Akhir", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    

$node5   = new HTML_TreeNode(array('text' => "Pembenahan Data Pelanggan", 'link' => "test.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), array('onclick' => "alert('*** Silakan memilih sub menu ***'); 
return false", 'onexpand' => "alert('Expanded')"));
    
$node5_1 = &$node5->addItem(new HTML_TreeNode(array('text' => "Rencana Kerja Pembenahan Data", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node5_2 = &$node5->addItem(new HTML_TreeNode(array('text' => "Jadwal Pembenahan Data Pelanggan", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node5_3 = &$node5->addItem(new HTML_TreeNode(array('text' => "Pengawasan Pembenahan Data", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node5_4 = &$node5->addItem(new HTML_TreeNode(array('text' => "Laporan AKhir Pembenahan Data", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node5_5 = &$node5->addItem(new HTML_TreeNode(array('text' => "Kertas Pembenahan Data ", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node5_5_1 = &$node5_5->addItem(new HTML_TreeNode(array('text' => "PDP V.I-001    : Rencana Kerja Pembenahan Data", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node5_5_2 = &$node5_5->addItem(new HTML_TreeNode(array('text' => "PDP V.I-002   : Jadwal Pembenahan Data", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node5_5_3 = &$node5_5->addItem(new HTML_TreeNode(array('text' => "PDP V.II-001 : Kertas Kerja Pengawasan PDP ", 'link' => "../proc_5/pengail_laporan_pdpv_ii001_pilih.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node5_5_4 = &$node5_5->addItem(new HTML_TreeNode(array('text' => "PDP V.II-002 : Laporan Pengawasan PDP", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node5_5_5 = &$node5_5->addItem(new HTML_TreeNode(array('text' => "PDP V.II-003  : Laporan Akhir Pelaksanaan PDP", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node5_5_6 = &$node5_5->addItem(new HTML_TreeNode(array('text' => "Monitoring Progres PDP1-PDP5", 'link' => "../proc_5/pengail_monitor_daya_pilih.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    

$node6   = new HTML_TreeNode(array('text' => "Utility", 'link' => "test.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), array('onclick' => "alert('*** Silakan memilih sub menu ***'); 
return false", 'onexpand' => "alert('Expanded')"));
    
$node6_1 = &$node6->addItem(new HTML_TreeNode(array('text' => "Ganti Password", 'link' => "menu_alert_password.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node6_2 = &$node6->addItem(new HTML_TreeNode(array('text' => "Workplan PDP", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node6_2_1 = &$node6_2->addItem(new HTML_TreeNode(array('text' => "Entry Target", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node6_2_2 = &$node6_2->addItem(new HTML_TreeNode(array('text' => "Laporan Realisasi", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node6_3 = &$node6->addItem(new HTML_TreeNode(array('text' => "Update Mutasi PDL", 'link' => "../utility/pengail_ambil_mutasi_input.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node6_4 = &$node6->addItem(new HTML_TreeNode(array('text' => "Edit Kode Image AIL", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node6_5 = &$node6->addItem(new HTML_TreeNode(array('text' => "Master Lemari", 'link' => "../Utility/pengail_referensi_lemari.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    
$node6_6 = &$node6->addItem(new HTML_TreeNode(array('text' => "Download Manual", 'link' => "../Utility/pengail_manual.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget'=>"menu_show")));
    
$node6_7 = &$node6->addItem(new HTML_TreeNode(array('text' => "Pelanggan Belum Scan", 'link' => "../Utility/plgblmscan.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget'=>"menu_show")));

$node6_8 = &$node6->addItem(new HTML_TreeNode(array('text' => "History Dashboard PDP", 'link' => "../Utility/snapshottampil.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget'=>"menu_show")));

$node6_9 = &$node6->addItem(new HTML_TreeNode(array('text' => "Dashboard PDP Area", 'link' => "../Utility/datapdp.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget'=>"menu_show")));

$node6_10 = &$node6->addItem(new HTML_TreeNode(array('text' => "Dashboard PDP Rayon", 'link' => "../Utility/datapdp_rayon.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget'=>"menu_show")));
//$node6_5_2 = &$node6_5->addItem(new HTML_TreeNode(array('text' => "Master Area", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon)));
    
//$node6_5_3 = &$node6_5->addItem(new HTML_TreeNode(array('text' => "Master Rayon", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon)));
    
//$node6_5_4 = &$node6_5->addItem(new HTML_TreeNode(array('text' => "Master Lemari", 'link' => "../Utility/pengail_referensi_lemari.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon,'linkTarget' => "menu_show")));
    


//$node1_1_1 = &$node1_1->addItem(new HTML_TreeNode(array('text' => "Third level", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon)));
    
//$node1_1_1_1 = &$node1_1_1->addItem(new HTML_TreeNode(array('text' => "Fourth level", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon)));
    
//$node1_1_1_1->addItem(new HTML_TreeNode(array('text' => "Fifth level", 'link' => "menu_alert1.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'cssClass' => 'treeMenuBold')));

    
$menu->addItem($node1);
    
$menu->addItem($node2);
    
    
$menu->addItem($node3);
    
    
$menu->addItem($node4);
    
    
$menu->addItem($node5);
    
    
$menu->addItem($node6);
    
    

// Create the presentation class
    
$treeMenu = &new HTML_TreeMenu_DHTML($menu, array('images' => '../images', 'defaultClass' => 'treeMenuDefault'));
    
$listBox  = &new HTML_TreeMenu_Listbox($menu, array('linkTarget' => '_self'));
    
//$treeMenuStatic = &new HTML_TreeMenu_staticHTML($menu, array('images' => '../images', 'defaultClass' => 'treeMenuDefault', 'noTopLevelImages' => true));

?>


<html>
<head>
<title>Aplikasi Revenue Assurance - Pembenahan DIL - Menu Utama</title>
<style type="text/css">
        
body {
            
   font-family: Georgia;
            
   font-size: 9pt;
        }
        
        
   .treeMenuDefault {
            
   font-style: normal;
        
   }
        
        
   .treeMenuBold {
            
   font-style: italic;
            
   font-weight: bold;
        
   }
    
</style>
    
<script src="../TreeMenu.js" language="JavaScript" type="text/javascript"></script>

</head>

<body>



<script language="JavaScript" type="text/javascript">

<!--
    
   a = new Date();
    
   a = a.getTime();

//-->


</script>


<?php
$treeMenu->printMenu()
?>
<br />
<br />

<?
//$listBox->printMenu()
?>


<script language="JavaScript" type="text/javascript">

<!--
    
   b = new Date();
    
   b = b.getTime();
    
    
   document.write("Time to render tree: " + ((b - a) / 1000) + "s");

//-->

</script>



</body>

</html>

