-- DATA PEKAN PRESENSI SHALAT (With Total) => ADMINMATRIK / PIMPINAN / PEMBINA / MAHASISWA
SELECT p.id_pekan, p.pekan, p.tanggal_dari, p.tanggal_sampai, s.total
FROM pekan p
INNER JOIN (
    SELECT ps.id_pekan, SUM(ps.shubuh+ps.dzuhur+ps.ashar+ps.maghrib+ps.isya) AS total
    FROM presensi_shalat ps
    GROUP BY ps.id_pekan
) s ON p.id_pekan = s.id_pekan

-- NILAI PRESENSI SHALAT (With Udzur disetujui + Jadwal Pulang) => ADMINMATRIK / PIMPINAN
SELECT m.nim, m.nama, m.gender, m.id_pembina, p.nama AS namapembina, p.gelar,
IF(s.total IS NULL, 0, s.total) AS total,
35 AS target1,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
IF(g.jplg IS NULL, 0, g.jplg) AS jplg,
35-IF(u.jmlu IS NULL, 0, u.jmlu)-(IF(g.jplg IS NULL, 0, g.jplg)) AS target2,
ROUND(((IF(s.total IS NULL, 0, s.total)/(35-IF(u.jmlu IS NULL, 0, u.jmlu)-(IF(g.jplg IS NULL, 0, g.jplg))))*100),2) AS nilai
FROM mahasiswa m 
INNER JOIN pembina_mahasiswa p ON m.id_pembina = p.id_pembina
LEFT JOIN (
    SELECT ps.nim, SUM(ps.shubuh+ps.dzuhur+ps.ashar+ps.maghrib+ps.isya) AS total
    FROM presensi_shalat ps 
    WHERE ps.id_pekan = 2
    GROUP BY ps.nim
) s ON m.nim = s.nim
LEFT JOIN (
    SELECT us.nim, SUM(us.shubuh+us.dzuhur+us.ashar+us.maghrib+us.isya) AS jmlu
    FROM udzur_shalat us 
    WHERE us.disetujui = 1
    GROUP BY us.nim
) u ON m.nim = u.nim
LEFT JOIN (
    SELECT jp.gender, SUM(jp.shubuh+jp.dzuhur+jp.ashar+jp.maghrib+jp.isya) AS jplg
    FROM jadwal_pulang jp 
    WHERE jp.id_pekan = 2
    GROUP BY jp.gender
) g ON m.gender = g.gender
ORDER BY m.nama

-- NILAI PRESENSI SHALAT (With Udzur disetujui + Jadwal Pulang) => PEMBINA
SELECT m.nim, m.nama, m.gender, m.id_pembina, p.nama AS namapembina, 
IF(s.total IS NULL, 0, s.total) AS total,
35 AS target1,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
IF(g.jplg IS NULL, 0, g.jplg) AS jplg,
35-IF(u.jmlu IS NULL, 0, u.jmlu)-(IF(g.jplg IS NULL, 0, g.jplg)) AS target2,
ROUND(((IF(s.total IS NULL, 0, s.total)/(35-IF(u.jmlu IS NULL, 0, u.jmlu)-(IF(g.jplg IS NULL, 0, g.jplg))))*100),2) AS nilai
FROM mahasiswa m 
INNER JOIN pembina_mahasiswa p ON m.id_pembina = p.id_pembina
LEFT JOIN (
    SELECT ps.nim, SUM(ps.shubuh+ps.dzuhur+ps.ashar+ps.maghrib+ps.isya) AS total
    FROM presensi_shalat ps 
    WHERE ps.id_pekan = 2
    GROUP BY ps.nim
) s ON m.nim = s.nim
LEFT JOIN (
    SELECT us.nim, SUM(us.shubuh+us.dzuhur+us.ashar+us.maghrib+us.isya) AS jmlu
    FROM udzur_shalat us 
    WHERE us.disetujui = 1 AND us.id_pekan = 2
    GROUP BY us.nim
) u ON m.nim = u.nim
LEFT JOIN (
    SELECT jp.gender, SUM(jp.shubuh+jp.dzuhur+jp.ashar+jp.maghrib+jp.isya) AS jplg
    FROM jadwal_pulang jp 
    WHERE jp.id_pekan = 2
    GROUP BY jp.gender
) g ON m.gender = g.gender
WHERE p.id_pembina = 9
ORDER BY m.nama

-- NILAI PRESENSI SHALAT (With Udzur disetujui + Jadwal Pulang) => MAHASISWA
SELECT m.nim, m.nama, m.gender, m.id_pembina, p.nama AS namapembina, 
IF(s.total IS NULL, 0, s.total) AS total,
35 AS target1,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
IF(g.jplg IS NULL, 0, g.jplg) AS jplg,
35-IF(u.jmlu IS NULL, 0, u.jmlu)-(IF(g.jplg IS NULL, 0, g.jplg)) AS target2,
ROUND(((IF(s.total IS NULL, 0, s.total)/(35-IF(u.jmlu IS NULL, 0, u.jmlu)-(IF(g.jplg IS NULL, 0, g.jplg))))*100),2) AS nilai
FROM mahasiswa m 
INNER JOIN pembina_mahasiswa p ON m.id_pembina = p.id_pembina
LEFT JOIN (
    SELECT ps.nim, SUM(ps.shubuh+ps.dzuhur+ps.ashar+ps.maghrib+ps.isya) AS total
    FROM presensi_shalat ps 
    WHERE ps.id_pekan = 2
    GROUP BY ps.nim
) s ON m.nim = s.nim
LEFT JOIN (
    SELECT us.nim, SUM(us.shubuh+us.dzuhur+us.ashar+us.maghrib+us.isya) AS jmlu
    FROM udzur_shalat us 
    WHERE us.disetujui = 1
    GROUP BY us.nim
) u ON m.nim = u.nim
LEFT JOIN (
    SELECT jp.gender, SUM(jp.shubuh+jp.dzuhur+jp.ashar+jp.maghrib+jp.isya) AS jplg
    FROM jadwal_pulang jp 
    WHERE jp.id_pekan = 2
    GROUP BY jp.gender
) g ON m.gender = g.gender
WHERE m.nim = 18103033
ORDER BY m.nama

-- DATA PEKAN PRESENSI TALIM (With Total) => ADMINMATRIK / PIMPINAN
SELECT p.id_pekan, p.pekan, p.tanggal_dari, p.tanggal_dari, p.tanggal_sampai, t.total
FROM pekan p 
INNER JOIN (
    SELECT t.id_pekan, COUNT(t.id_talim) AS total
    FROM talim t 
    GROUP BY t.id_pekan
) t ON p.id_pekan = t.id_pekan
ORDER BY p.id_pekan

-- DATA PEKAN PRESENSI TALIM (With Total) => PEMBINA / MAHASISWA
SELECT p.id_pekan, p.pekan, p.tanggal_dari, p.tanggal_dari, p.tanggal_sampai, t.total
FROM pekan p 
INNER JOIN (
    SELECT t.id_pekan, COUNT(t.id_talim) AS total
    FROM talim t 
    WHERE t.id_pembina = 13
    GROUP BY t.id_pekan
) t ON p.id_pekan = t.id_pekan
ORDER BY p.id_pekan

-- NILAI PRESENSI TALIM (With Udzur disetujui) => ADMINMATRIK / PIMPINAN
SELECT m.nim, m.nama, m.gender, m.id_pembina, p.nama AS namapembina, p.gelar 
IF(ta.total IS NULL, 0, ta.total) AS total, 
IF(tl.target IS NULL, 0, tl.target) AS target1, 
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, 
IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu) AS target2, 
ROUND(((IF(ta.total IS NULL, 0, ta.total)/(IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai 
FROM mahasiswa m INNER JOIN pembina_mahasiswa p ON m.id_pembina = p.id_pembina 
LEFT JOIN ( 
	SELECT pt.nim, COUNT(pt.nim) AS total 
	FROM presensi_talim pt 
    LEFT JOIN talim t ON pt.id_talim = t.id_talim
    WHERE t.id_pekan = 1
    GROUP BY pt.nim 
) ta ON m.nim = ta.nim 
LEFT JOIN ( 
	SELECT t.id_pembina, COUNT(t.id_pembina) AS target 
	FROM talim t 
    WHERE t.id_pekan = 1
	GROUP BY t.id_pembina 
) tl ON m.id_pembina = tl.id_pembina 
LEFT JOIN ( 
	SELECT ut.nim, COUNT(ut.id_udzur) AS jmlu 
	FROM udzur_talim ut 
    LEFT JOIN talim t ON ut.id_talim = t.id_talim
	WHERE t.id_pekan = 1 AND ut.disetujui = 1 
    GROUP BY ut.nim 
) u ON m.nim = u.nim ORDER BY m.nama

-- NILAI PRESENSI TALIM (With Udzur disetujui) => PEMBINA
SELECT m.nim, m.nama, m.gender, m.id_pembina, p.nama, 
IF(ta.total IS NULL, 0, ta.total) AS total,
IF(tl.target IS NULL, 0, tl.target) AS target1,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu) AS target2,
ROUND(((IF(ta.total IS NULL, 0, ta.total)/(IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai
FROM mahasiswa m
INNER JOIN pembina_mahasiswa p ON m.id_pembina = p.id_pembina
LEFT JOIN (
    SELECT pt.nim, COUNT(pt.nim) AS total
    FROM presensi_talim pt 
    LEFT JOIN talim t ON pt.id_talim = t.id_talim
    WHERE t.id_pekan = 2
    GROUP BY pt.nim
) ta ON m.nim =  ta.nim
LEFT JOIN (
    SELECT t.id_pembina, COUNT(t.id_pembina) AS target
    FROM talim t
    WHERE t.id_pekan = 2
    GROUP BY t.id_pembina
) tl ON m.id_pembina = tl.id_pembina
LEFT JOIN (
    SELECT ut.nim, COUNT(ut.id_udzur) AS jmlu
    FROM udzur_talim ut
    LEFT JOIN talim t ON ut.id_talim = t.id_talim
    WHERE ut.disetujui = 1 AND t.id_pekan = 2
    GROUP BY ut.nim
) u ON m.nim = u.nim
WHERE m.id_pembina = 13
ORDER BY m.nama

-- NILAI PRESENSI TALIM (With Udzur disetujui) => MAHASISWA
SELECT m.nim, m.nama, m.gender, m.id_pembina, p.nama, 
IF(ta.total IS NULL, 0, ta.total) AS total,
IF(tl.target IS NULL, 0, tl.target) AS target1,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu) AS target2,
ROUND(((IF(ta.total IS NULL, 0, ta.total)/(IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai
FROM mahasiswa m
INNER JOIN pembina_mahasiswa p ON m.id_pembina = p.id_pembina
LEFT JOIN (
    SELECT pt.nim, COUNT(pt.nim) AS total
    FROM presensi_talim pt 
    GROUP BY pt.nim
) ta ON m.nim =  ta.nim
LEFT JOIN (
    SELECT t.id_pembina, COUNT(t.id_pembina) AS target
    FROM talim t
    GROUP BY t.id_pembina
) tl ON m.id_pembina = tl.id_pembina
LEFT JOIN (
    SELECT ut.nim, COUNT(ut.id_udzur) AS jmlu
    FROM udzur_talim ut
    WHERE ut.disetujui = 1
    GROUP BY ut.nim
) u ON m.nim = u.nim
WHERE m.nim = 18108021
ORDER BY m.nama

-- DATA PEKAN PRESENSI TAHSIN (With Total) => ADMINMATRIK / PIMPINAN
SELECT s.id_semester, p.id_pekan, p.pekan, p.tanggal_dari, p.tanggal_sampai, t.total
FROM pekan p 
LEFT JOIN semester s ON p.id_semester = s.id_semester
INNER JOIN (
    SELECT t.id_pekan, COUNT(t.id_tahsin) AS total
    FROM tahsin t 
    GROUP BY t.id_pekan
) t ON p.id_pekan = t.id_pekan
ORDER BY p.id_pekan


-- DATA PEKAN PRESENSI TAHSIN (With Total) => MAHASISWA / PEMBINA
SELECT p.id_pekan, p.pekan, p.tanggal_dari, p.tanggal_sampai, t.total
FROM pekan p 
INNER JOIN (
    SELECT t.id_pekan, COUNT(t.id_tahsin) AS total
    FROM tahsin t 
    WHERE t.id_pembina = 14
    GROUP BY t.id_pekan
) t ON p.id_pekan = t.id_pekan
ORDER BY p.id_pekan


-- NILAI PRESENSI TAHSIN (With Udzur disetujui) => ADMINMATRIK / PIMPINAN
SELECT m.nim, m.nama, m.gender, m.id_pembina, p.nama, 
IF(ta.total IS NULL, 0, ta.total) AS total,
IF(tl.target IS NULL, 0, tl.target) AS target1,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu) AS target2,
ROUND(((IF(ta.total IS NULL, 0, ta.total)/(IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai
FROM mahasiswa m
INNER JOIN pembina_mahasiswa p ON m.id_pembina = p.id_pembina
LEFT JOIN (
    SELECT pt.nim, COUNT(pt.nim) AS total
    FROM presensi_tahsin pt 
    LEFT JOIN tahsin t ON pt.id_tahsin = t.id_tahsin
    WHERE t.id_pekan = 1
    GROUP BY pt.nim
) ta ON m.nim =  ta.nim
LEFT JOIN (
    SELECT t.id_pembina, COUNT(t.id_pembina) AS target
    FROM tahsin t
    WHERE t.id_pekan = 1
    GROUP BY t.id_pembina
) tl ON m.id_pembina = tl.id_pembina
LEFT JOIN (
    SELECT ut.nim, COUNT(ut.id_udzur) AS jmlu
    FROM udzur_tahsin ut
    LEFT JOIN tahsin t ON ut.id_tahsin = t.id_tahsin
    WHERE t.id_pekan = 1 AND ut.disetujui = 1
    GROUP BY ut.nim
) u ON m.nim = u.nim
ORDER BY m.nama

-- NILAI PRESENSI TAHSIN (With Udzur disetujui) => PEMBINA
SELECT m.nim, m.nama, m.gender, m.id_pembina, p.nama AS namapembina, 
IF(ta.total IS NULL, 0, ta.total) AS total,
IF(tl.target IS NULL, 0, tl.target) AS target1,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu) AS target2,
ROUND(((IF(ta.total IS NULL, 0, ta.total)/(IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai
FROM mahasiswa m
INNER JOIN pembina_mahasiswa p ON m.id_pembina = p.id_pembina
LEFT JOIN (
    SELECT pt.nim, COUNT(pt.nim) AS total
    FROM presensi_tahsin pt 
    LEFT JOIN tahsin t ON pt.id_tahsin = t.id_tahsin
    WHERE t.id_pekan = 1
    GROUP BY pt.nim
) ta ON m.nim =  ta.nim
LEFT JOIN (
    SELECT t.id_pembina, COUNT(t.id_pembina) AS target
    FROM tahsin t
    WHERE t.id_pekan = 1
    GROUP BY t.id_pembina
) tl ON m.id_pembina = tl.id_pembina
LEFT JOIN (
    SELECT ut.nim, COUNT(ut.id_udzur) AS jmlu
    FROM udzur_tahsin ut
    LEFT JOIN tahsin t ON ut.id_tahsin = t.id_tahsin
    WHERE ut.disetujui = 1 AND t.id_pekan = 1
    GROUP BY ut.nim
) u ON m.nim = u.nim
WHERE m.id_pembina = 13
ORDER BY m.nama


-- NILAI PRESENSI TAHSIN (With Udzur disetujui) => MAHASISWA
SELECT m.nim, m.nama, m.gender, m.id_pembina, p.nama, 
IF(ta.total IS NULL, 0, ta.total) AS total,
IF(tl.target IS NULL, 0, tl.target) AS target1,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu) AS target2,
ROUND(((IF(ta.total IS NULL, 0, ta.total)/(IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai
FROM mahasiswa m
INNER JOIN pembina_mahasiswa p ON m.id_pembina = p.id_pembina
LEFT JOIN (
    SELECT pt.nim, COUNT(pt.nim) AS total
    FROM presensi_tahsin pt 
    GROUP BY pt.nim
) ta ON m.nim =  ta.nim
LEFT JOIN (
    SELECT t.id_pembina, COUNT(t.id_pembina) AS target
    FROM tahsin t
    GROUP BY t.id_pembina
) tl ON m.id_pembina = tl.id_pembina
LEFT JOIN (
    SELECT ut.nim, COUNT(ut.id_udzur) AS jmlu
    FROM udzur_tahsin ut
    WHERE ut.disetujui = 1
    GROUP BY ut.nim
) u ON m.nim = u.nim
WHERE m.nim = 18103021
ORDER BY m.nama


-- NILAI PRESENSI TOTAL => ADMINMATRIK / PIMPINAN
SELECT m.nim, m.nama, m.gender, m.id_pembina, p.nama AS namapembina, p.gelar,
s.nilai AS shalat,
tl.nilai AS talim,
th.nilai AS tahsin,
(s.nilai*(65/100))+(tl.nilai*(15/100))+(th.nilai*(20/100)) AS nilai
FROM mahasiswa m 
INNER JOIN pembina_mahasiswa p ON m.id_pembina = p.id_pembina
LEFT JOIN (
    SELECT m.nim,
    ROUND(((IF(s.total IS NULL, 0, s.total)/(35-IF(u.jmlu IS NULL, 0, u.jmlu)-(IF(g.jplg IS NULL, 0, g.jplg))))*100),2) AS nilai
    FROM mahasiswa m 
    LEFT JOIN (
        SELECT ps.nim, SUM(ps.shubuh+ps.dzuhur+ps.ashar+ps.maghrib+ps.isya) AS total
        FROM presensi_shalat ps 
        WHERE ps.id_pekan = 1
        GROUP BY ps.nim
    ) s ON m.nim = s.nim
    LEFT JOIN (
        SELECT us.nim, SUM(us.shubuh+us.dzuhur+us.ashar+us.maghrib+us.isya) AS jmlu
        FROM udzur_shalat us 
        WHERE us.disetujui = 1 AND us.id_pekan = 1
        GROUP BY us.nim
    ) u ON m.nim = u.nim
    LEFT JOIN (
        SELECT jp.gender, SUM(jp.shubuh+jp.dzuhur+jp.ashar+jp.maghrib+jp.isya) AS jplg
        FROM jadwal_pulang jp 
        WHERE jp.id_pekan = 1
        GROUP BY jp.gender
    ) g ON m.gender = g.gender 
) s ON m.nim = s.nim
LEFT JOIN (
    SELECT m.nim,
    ROUND(((IF(ta.total IS NULL, 0, ta.total)/(IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai 
    FROM mahasiswa m
    LEFT JOIN ( 
        SELECT pt.nim, COUNT(pt.nim) AS total 
        FROM presensi_talim pt 
        LEFT JOIN talim t ON pt.id_talim = t.id_talim
        WHERE t.id_pekan = 1
        GROUP BY pt.nim 
    ) ta ON m.nim = ta.nim 
    LEFT JOIN ( 
        SELECT t.id_pembina, COUNT(t.id_pembina) AS target 
        FROM talim t 
        WHERE t.id_pekan = 1
        GROUP BY t.id_pembina 
    ) tl ON m.id_pembina = tl.id_pembina 
    LEFT JOIN ( 
        SELECT ut.nim, COUNT(ut.id_udzur) AS jmlu 
        FROM udzur_talim ut 
        LEFT JOIN talim t ON ut.id_talim = t.id_talim
        WHERE t.id_pekan = 1 AND ut.disetujui = 1 
        GROUP BY ut.nim 
    ) u ON m.nim = u.nim    
) tl ON m.nim = tl.nim
LEFT JOIN (
    SELECT m.nim,
    ROUND(((IF(ta.total IS NULL, 0, ta.total)/(IF(tl.target IS NULL, 0, tl.target)-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai
    FROM mahasiswa m
    LEFT JOIN (
        SELECT pt.nim, COUNT(pt.nim) AS total
        FROM presensi_tahsin pt 
        LEFT JOIN tahsin t ON pt.id_tahsin = t.id_tahsin
        WHERE t.id_pekan = 1
        GROUP BY pt.nim
    ) ta ON m.nim =  ta.nim
    LEFT JOIN (
        SELECT t.id_pembina, COUNT(t.id_pembina) AS target
        FROM tahsin t
        WHERE t.id_pekan = 1
        GROUP BY t.id_pembina
    ) tl ON m.id_pembina = tl.id_pembina
    LEFT JOIN (
        SELECT ut.nim, COUNT(ut.id_udzur) AS jmlu
        FROM udzur_tahsin ut
        LEFT JOIN tahsin t ON ut.id_tahsin = t.id_tahsin
        WHERE t.id_pekan = 1 AND ut.disetujui = 1
        GROUP BY ut.nim
    ) u ON m.nim = u.nim    
) th ON m.nim = th.nim
ORDER BY m.nama   