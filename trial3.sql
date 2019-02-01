-- NILAI PRESENSI SHALAT (With Udzur disetujui)

SELECT m.nim, m.nama, m.gender, m.id_pembina, p.nama AS namapembina, 
IF(s.total IS NULL, 0, s.total) AS total,
35 AS target1,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
35-IF(u.jmlu IS NULL, 0, u.jmlu) AS target2,
ROUND(((IF(s.total IS NULL, 0, s.total)/(35-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai
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
ORDER BY m.nama