<?php 

	include 'functions.php';

// ===================================================================== Mahasiswa Role SHALAT =====================================================================
	function tampilUdzurShalatRoleMhs($idMahasiswa){
		$ambildata = mysql_query("SELECT su.id_periode, su.tanggal, su.udzur, GROUP_CONCAT(su.wkt_shalat SEPARATOR ',') AS wkt, COUNT(su.wkt_shalat) AS jml, su.keterangan, su.direview, su.diajukan FROM shalat_udzur2 su WHERE su.id_mahasiswa = $idMahasiswa GROUP BY su.tanggal ORDER BY su.diajukan DESC") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-warning alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Belum Ada Data Udzur Shalat
						</div>";
		}		
	}

	function tampilUdzurShalatRolePembina($idPembina){
		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, su.id_periode, su.tanggal, su.udzur, COUNT(su.wkt_shalat) AS jml, su.keterangan, su.direview FROM shalat_udzur2 su LEFT JOIN m_binaan mb ON su.id_mahasiswa = mb.id_mahasiswa LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa WHERE mb.id_pembina = $idPembina GROUP BY su.id_mahasiswa, su.tanggal, su.udzur ORDER BY diajukan DESC") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-warning alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Belum Ada Data Pengajuan Udzur Shalat
						</div>";
		}		
	}	

	function tampilJplgDetail($tgl){
		$tgl_ = date('Y-m-d', strtotime($tgl));
		$ambildata = mysql_query("SELECT jp.tanggal, jp.id_periode, jp.j_kelamin, jp.wkt_shalat FROM j_pulang2 jp WHERE jp.tanggal = '$tgl_'") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-warning alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Tidak Ada Jadwal Kepulangan Mahasiswa Pada ".date('l - d M Y', strtotime($tgl_))."
						</div>";
		}		
	}	

	function tampilUdzurShalatDetailByMhsByDay($idMahasiswa, $tgl){
		$tgl_ = date('Y-m-d', strtotime($tgl));
		$ambildata = mysql_query("SELECT su.id_udzur, su.id_mahasiswa, su.tanggal, su.wkt_shalat, su.udzur, su.keterangan, su.disetujui FROM shalat_udzur2 su WHERE su.id_mahasiswa = $idMahasiswa AND su.tanggal = '$tgl_' ORDER BY su.diajukan DESC") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-warning alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Tidak Ada Pengajuan Udzur Shalat Pada Hari ".date('l - d M Y', strtotime($tgl_))."
						</div>";
		}		
	}

	function tampilUdzurShalatAdminmatrik(){
		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, p.nama AS pembina, COUNT(su.wkt_shalat) AS jmlu FROM mahasiswa m LEFT JOIN shalat_udzur2 su ON m.id_mahasiswa = su.id_mahasiswa LEFT JOIN m_binaan mb ON m.id_mahasiswa = mb.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina GROUP BY m.id_mahasiswa ORDER BY m.nama") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-warning alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Belum Ada Pengajuan Udzur Shalat
						</div>";
		}		
	}	

	function shalatUdzurAdminmatrikGraph(){
		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, COUNT(su.wkt_shalat) AS jmlu FROM mahasiswa m LEFT JOIN shalat_udzur2 su ON m.id_mahasiswa = su.id_mahasiswa GROUP BY m.id_mahasiswa ORDER BY jmlu DESC LIMIT 5") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

	function shalatUdzurDetailByMhsAdminmatrikGraph($idMahasiswa){
		$ambildata = mysql_query("SELECT su.udzur, IF(s.jmlu IS NULL, 0, s.jmlu) AS jmlu FROM shalat_udzur2 su LEFT JOIN ( SELECT sh.udzur, COUNT(sh.udzur) AS jmlu FROM shalat_udzur2 sh WHERE sh.id_mahasiswa = $idMahasiswa GROUP BY sh.udzur ) s ON su.udzur = s.udzur GROUP BY su.udzur ORDER BY s.jmlu DESC") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}		

	function tampilUdzurShalatDetailByMhsAdminmatrik($idMahasiswa){
		$ambildata = mysql_query("SELECT su.tanggal, su.id_periode, su.wkt_shalat, su.udzur, su.keterangan, su.diajukan, su.disetujui FROM shalat_udzur2 su WHERE su.id_mahasiswa = $idMahasiswa ORDER BY su.diajukan DESC") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-warning alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Belum Ada Pengajuan Udzur Shalat
						</div>";
		}		
	}		

	function shalatManualDetailByMhsAdminmatrikGraph($idMahasiswa){
		$ambildata = mysql_query("SELECT sm.wkt_shalat, IF(s.jmlm IS NULL, 0, s.jmlm) AS jmlm FROM shalat sm LEFT JOIN ( SELECT sl.wkt_shalat, COUNT(sl.wkt_shalat) AS jmlm FROM shalat_manual sl WHERE sl.id_mahasiswa = $idMahasiswa GROUP BY sl.wkt_shalat ) s ON sm.wkt_shalat = s.wkt_shalat GROUP BY sm.wkt_shalat ORDER BY sm.wkt_tapping") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}			

	function tampilShalatManualAdminmatrik(){
		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, p.nama AS pembina, COUNT(sm.wkt_shalat) AS jmlm FROM mahasiswa m LEFT JOIN shalat_manual sm ON m.id_mahasiswa = sm.id_mahasiswa LEFT JOIN m_binaan mb ON m.id_mahasiswa = mb.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina GROUP BY m.id_mahasiswa ORDER BY m.nama") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-warning alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Belum Ada Pengajuan Presensi Shalat Manual
						</div>";
		}		
	}		

	function tampilShalatManualDetailByMhsAdminmatrik($idMahasiswa){
		$ambildata = mysql_query("SELECT sm.tanggal, sm.wkt_shalat, sm.keterangan, sm.diajukan, sm.disetujui FROM shalat_manual sm WHERE sm.id_mahasiswa = $idMahasiswa ORDER BY sm.diajukan DESC") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-warning alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Belum Ada Pengajuan Presensi Shalat Manual
						</div>";
		}		
	}		

	function shalatManualAdminmatrikGraph(){
		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, COUNT(sm.wkt_shalat) AS jmlm FROM mahasiswa m LEFT JOIN shalat_manual sm ON m.id_mahasiswa = sm.id_mahasiswa GROUP BY m.id_mahasiswa ORDER BY jmlm DESC LIMIT 5") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

	function tampilShalatManualDetailByMhsByDay($idMahasiswa, $tgl){
		$tgl_ = date('Y-m-d', strtotime($tgl));
		$ambildata = mysql_query("SELECT sm.id_manual, sm.id_mahasiswa, sm.tanggal, sm.wkt_shalat, sm.keterangan, sm.disetujui FROM shalat_manual sm WHERE sm.id_mahasiswa = $idMahasiswa AND sm.tanggal = '$tgl_' ORDER BY sm.diajukan DESC") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-warning alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Tidak Ada Pengajuan Presensi Manual Shalat Wajib Pada Hari ".date('l - d M Y', strtotime($tgl_))."
						</div>";
		}		
	}	

	function tambahUdzurShalat($idMahasiswa, $tgl, $wkt, $udzur, $ket){
		$tgl_ = date('Y-m-d', strtotime($tgl));
		mysql_query("INSERT INTO shalat_udzur2 (id_periode, id_mahasiswa, tanggal, wkt_shalat, udzur, keterangan, diajukan, disetujui, direview) VALUES ( (SELECT id_periode FROM shalat WHERE tanggal = '$tgl_' GROUP BY id_periode), $idMahasiswa, '$tgl_', '$wkt', '$udzur', '$ket', now(), 0,0 )") or die(mysql_error());
	}	

	function reviewUdzurShalat($idUdzur, $status){
		$ambildata = mysql_query("UPDATE shalat_udzur2 SET disetujui = $status AND direview = 1 WHERE id_udzur = $idUdzur") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} 	
	}				

	function tampilShalatManualMhs($idMahasiswa){
		$ambildata = mysql_query("SELECT sm.tanggal, COUNT(sm.wkt_shalat) AS jml, sm.keterangan, sm.direview, sm.diajukan, sm.disetujui FROM shalat_manual sm WHERE sm.id_mahasiswa = $idMahasiswa GROUP BY sm.tanggal ORDER BY sm.diajukan DESC") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-warning alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Belum Ada Data Pengajuan Presensi Shalat Manual
						</div>";
		}		
	}		

	function tampilShalatManualMhsRolePembina($idPembina){
		$ambildata = mysql_query("SELECT sm.tanggal, sm.id_mahasiswa, m.nama, COUNT(sm.wkt_shalat) AS jml, sm.keterangan, sm.direview, sm.diajukan, sm.disetujui FROM shalat_manual sm LEFT JOIN m_binaan mb ON sm.id_mahasiswa = mb.id_mahasiswa LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa WHERE mb.id_pembina = $idPembina GROUP BY sm.tanggal, sm.id_mahasiswa ORDER BY sm.diajukan DESC") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-warning alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Belum Ada Data Pengajuan Presensi Shalat Manual
						</div>";
		}		
	}			

	function udzurGraphPembina($idPembina){
		$ambildata = mysql_query("SELECT mb.id_pembina, su.id_mahasiswa, m.nama, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su LEFT JOIN m_binaan mb ON su.id_mahasiswa = mb.id_mahasiswa LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa WHERE mb.id_pembina = $idPembina AND su.disetujui = 1 GROUP BY su.id_mahasiswa ORDER BY COUNT(su.wkt_shalat) DESC") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}		

	function tambahShalatManual($idMahasiswa, $tgl, $wkt, $ket){
		$tgl_ = date('Y-m-d', strtotime($tgl));
		mysql_query("INSERT INTO shalat_manual (id_mahasiswa, tanggal, wkt_shalat, keterangan, diajukan, disetujui, direview) VALUES ($idMahasiswa, '$tgl_', '$wkt', '$ket', now(), 0, 0);") or die(mysql_error());
	}		

	function talimMhs(){
		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, m.j_kelamin, COUNT(b.talim) AS total, c.target, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, c.target-IF(u.jmlu IS NULL, 0, u.jmlu) AS target2, ROUND((((COUNT(b.talim))/(c.target-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai FROM ( SELECT m.id_mahasiswa, m.nama, m.j_kelamin FROM mahasiswa m ) m LEFT JOIN ( ( SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim FROM ( SELECT m.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim FROM mahasiswa m LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) ) a INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim ORDER BY a.id_mahasiswa, a.tanggal ) UNION ALL ( SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim FROM talim t LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa ) ) b ON m.id_mahasiswa = b.id_mahasiswa LEFT JOIN ( SELECT jt.j_kelamin, COUNT(jt.talim) AS target FROM j_talim jt GROUP BY jt.j_kelamin ) c ON m.j_kelamin = c.j_kelamin LEFT JOIN ( SELECT tu.id_mahasiswa, COUNT(tu.udzur) AS jmlu FROM talim_udzur tu GROUP BY tu.id_mahasiswa ) u ON m.id_mahasiswa = u.id_mahasiswa GROUP BY b.id_mahasiswa ORDER BY m.nama") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

	function talimMhsGraph(){
		$ambildata = mysql_query("SELECT m.nama, m.j_kelamin, ROUND((((COUNT(b.talim))/(c.target-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai FROM ( SELECT m.id_mahasiswa, m.nama, m.j_kelamin FROM mahasiswa m ) m LEFT JOIN ( ( SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim FROM ( SELECT m.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim FROM mahasiswa m LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) ) a INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim ORDER BY a.id_mahasiswa, a.tanggal ) UNION ALL ( SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim FROM talim t LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa ) ) b ON m.id_mahasiswa = b.id_mahasiswa LEFT JOIN ( SELECT jt.j_kelamin, COUNT(jt.talim) AS target FROM j_talim jt GROUP BY jt.j_kelamin ) c ON m.j_kelamin = c.j_kelamin LEFT JOIN ( SELECT tu.id_mahasiswa, COUNT(tu.udzur) AS jmlu FROM talim_udzur tu GROUP BY tu.id_mahasiswa ) u ON m.id_mahasiswa = u.id_mahasiswa GROUP BY b.id_mahasiswa ORDER BY nilai DESC LIMIT 5") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

	function talimIA(){
		$ambildata = mysql_query("SELECT m.j_kelamin, COUNT(b.talim) AS total, (CASE WHEN m.j_kelamin = 'Akhwat' THEN a.jml ELSE i.jml END) AS jmhs, (CASE WHEN m.j_kelamin = 'Akhwat' THEN a.jml ELSE i.jml END)*c.target AS target, u.jmlu, ((CASE WHEN m.j_kelamin = 'Akhwat' THEN a.jml ELSE i.jml END)*c.target)-(u.jmlu) AS target2, ROUND((((COUNT(b.talim))/(((CASE WHEN m.j_kelamin = 'Akhwat' THEN a.jml ELSE i.jml END)*c.target)-(u.jmlu)))*100),2) AS nilai FROM ( SELECT m.id_mahasiswa, m.nama, m.j_kelamin FROM mahasiswa m ) m LEFT JOIN ( ( SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim FROM ( SELECT m.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim FROM mahasiswa m LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) ) a INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim ORDER BY a.id_mahasiswa, a.tanggal ) UNION ALL ( SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim FROM talim t LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa ) ) b ON m.id_mahasiswa = b.id_mahasiswa LEFT JOIN ( SELECT m.j_kelamin, COUNT(m.id_mahasiswa) AS jml FROM mahasiswa m WHERE m.j_kelamin = 'Ikhwan' GROUP BY m.j_kelamin ) i ON m.j_kelamin = i.j_kelamin LEFT JOIN ( SELECT m.j_kelamin, COUNT(m.id_mahasiswa) AS jml FROM mahasiswa m WHERE m.j_kelamin = 'Akhwat' GROUP BY m.j_kelamin ) a ON m.j_kelamin = a.j_kelamin LEFT JOIN ( SELECT m.j_kelamin, COUNT(tu.udzur) AS jmlu FROM talim_udzur tu LEFT JOIN mahasiswa m ON tu.id_mahasiswa = m.id_mahasiswa GROUP BY m.j_kelamin ) u ON m.j_kelamin = u.j_kelamin LEFT JOIN ( SELECT jt.j_kelamin, COUNT(jt.talim) AS target FROM j_talim jt GROUP BY jt.j_kelamin ) c ON m.j_kelamin = c.j_kelamin GROUP BY m.j_kelamin ORDER BY m.nama") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}		

	function talimPembina(){
		$ambildata = mysql_query("SELECT p.id_pembina, p.nama, p.j_kelamin, o.total, b.jmlb, j.jmlt, (b.jmlb*j.jmlt) AS target1, uz.jmlu, (b.jmlb*j.jmlt)-uz.jmlu AS target2, ROUND(((o.total/((b.jmlb*j.jmlt)-uz.jmlu))*100),2) AS nilai FROM pembina p LEFT JOIN ( SELECT mb.id_pembina, COUNT(c.wkt_tapping) AS total FROM m_binaan mb LEFT JOIN ( ( SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim FROM ( SELECT m.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim FROM mahasiswa m LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) ) a INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim ORDER BY a.id_mahasiswa, a.tanggal ) UNION ALL ( SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim FROM talim t LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa ) ) c ON mb.id_mahasiswa = c.id_mahasiswa GROUP BY mb.id_pembina ) o ON p.id_pembina = o.id_pembina LEFT JOIN ( SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina GROUP BY p.id_pembina ) b ON p.id_pembina = b.id_pembina LEFT JOIN ( SELECT jt.j_kelamin, COUNT(jt.talim) AS jmlt FROM j_talim jt GROUP BY jt.j_kelamin ) j ON p.j_kelamin = j.j_kelamin LEFT JOIN ( SELECT mb.id_pembina, COUNT(u.jmlu) AS jmlu FROM m_binaan mb LEFT JOIN ( SELECT tu.id_mahasiswa, COUNT(tu.udzur) AS jmlu FROM talim_udzur tu WHERE tu.disetujui = 1 GROUP BY tu.id_mahasiswa ) u ON mb.id_mahasiswa = u.id_mahasiswa GROUP BY mb.id_pembina ) uz ON p.id_pembina = uz.id_pembina GROUP BY p.id_pembina ORDER BY p.nama") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}		

	function talimJtalim(){
		$ambildata = mysql_query("SELECT v.talim, COUNT(v.wkt_tapping) AS total, j.jmlt, m.jmhs, (j.jmlt*m.jmhs) AS target1, IF(uz.jmlu IS NULL, 0, uz.jmlu) AS jmlu, (j.jmlt*m.jmhs) - IF(uz.jmlu IS NULL, 0, uz.jmlu) AS target2, ROUND((((COUNT(v.wkt_tapping))/((j.jmlt*m.jmhs) - IF(uz.jmlu IS NULL, 0, uz.jmlu)))*100),2) AS nilai FROM ( ( SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim FROM ( SELECT s.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) ) a INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim ORDER BY a.id_mahasiswa, a.tanggal ) UNION ALL ( SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim FROM talim t LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa ) ) v LEFT JOIN ( SELECT d.talim, COUNT(d.talim) AS jmlt FROM ( SELECT jt.tanggal, jt.talim, IF(jt.talim <> 'skb', jt.j_kelamin, (GROUP_CONCAT(jt.j_kelamin SEPARATOR ' '))) AS j_kelamin FROM j_talim jt GROUP BY jt.tanggal ) d GROUP BY d.talim ) j ON v.talim = j.talim JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m ) m LEFT JOIN ( SELECT tu.talim, COUNT(tu.udzur) AS jmlu FROM talim_udzur tu WHERE tu.disetujui = 1 GROUP BY tu.talim ) uz ON v.talim = uz.talim GROUP BY v.talim") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}			

?>