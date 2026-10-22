<?php

class db
{
    private $koneksi;
    function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->koneksi = new mysqli("localhost", "root", "0320", "db_latihan");
    }
    
    function get_user($username, $password)
    {
        $stmt = $this->koneksi->prepare("select * from tbl_user where username = ? and password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        return $stmt->get_result();
    }
    
    // mahasiswa
    function get_allMhs()
    {
        $data = $this->koneksi->query("select * from tbl_mahasiswa");
        return $data;
    }

    function add_mhs($nim, $nama, $alamat)
    {
        $stmt = $this->koneksi->prepare("insert into tbl_mahasiswa(nim,nama,alamat) values(?, ?, ?)");
        $stmt->bind_param("sss", $nim, $nama, $alamat);
        $stmt->execute();
        return true;
    }

    function update_mhs($nim, $nama, $alamat)
    {
        $stmt = $this->koneksi->prepare("UPDATE tbl_mahasiswa SET nama = ?, alamat = ? WHERE nim = ?");
        $stmt->bind_param("sss", $nama, $alamat, $nim);
        $stmt->execute();
        return true;
    }

    function get_MhdByNim($nim)
    {
        $stmt = $this->koneksi->prepare("select * from tbl_mahasiswa where nim = ?");
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        return $stmt->get_result();
    }

    function del_mhs($nim)
    {
        $stmt = $this->koneksi->prepare("delete from tbl_mahasiswa where nim = ?");
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        return true;
    }

    // dosen
    function get_allDosen()
    {
        $data = $this->koneksi->query("select * from tbl_dosen");
        return $data;
    }

    function add_dosen($kd_dosen, $nama, $alamat)
    {
        try {
            $stmt = $this->koneksi->prepare("insert into tbl_dosen(kd_dosen,nama,alamat) values(?, ?, ?)");
            $stmt->bind_param("sss", $kd_dosen, $nama, $alamat);
            $data = $stmt->execute();
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }

    function update_dosen($kd_dosen, $nama, $alamat)
    {
        try {
            $stmt = $this->koneksi->prepare("UPDATE tbl_dosen SET nama = ?, alamat = ? WHERE kd_dosen = ?");
            $stmt->bind_param("sss", $nama, $alamat, $kd_dosen);
            $data = $stmt->execute();
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }

    function get_DosenByKd($kd_dosen)
    {
        $stmt = $this->koneksi->prepare("select * from tbl_dosen where kd_dosen = ?");
        $stmt->bind_param("s", $kd_dosen);
        $stmt->execute();
        return $stmt->get_result();
    }

    function del_dosen($kd_dosen)
    {
        try {
            $stmt = $this->koneksi->prepare("delete from tbl_dosen where kd_dosen = ?");
            $stmt->bind_param("s", $kd_dosen);
            $data = $stmt->execute();
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }

    // pesan error mysql terakhir, untuk ditampilkan ke user
    function get_error()
    {
        return $this->koneksi->error;
    }

    // ringkasan jumlah data untuk halaman dashboard
    function get_dashboard()
    {
        $data = $this->koneksi->query("select
                                        (select count(*) from tbl_mahasiswa) as total_mhs,
                                        (select count(*) from tbl_dosen) as total_dosen,
                                        (select count(*) from tbl_jadwal) as total_jadwal,
                                        (select count(*) from tbl_krs) as total_krs");
        return $data->fetch_array();
    }

    // matkul
    function get_allMatkul()
    {
        $data = $this->koneksi->query("select * from tbl_matkul");
        return $data;
    }

    // jadwal
    function get_allJadwal()
    {
        $data = $this->koneksi->query("select jadwal.*, dosen.nama as nama_dosen, matkul.nama as nama_matkul
                                        from tbl_jadwal as jadwal
                                        left join tbl_dosen as dosen on jadwal.kd_dosen = dosen.kd_dosen
                                        left join tbl_matkul as matkul on jadwal.kd_matkul = matkul.kd_matkul
                                        order by jadwal.id");
        return $data;
    }

    function get_JadwalById($id)
    {
        $stmt = $this->koneksi->prepare("select * from tbl_jadwal where id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    function add_jadwal($kd_dosen, $kd_matkul, $waktu, $ruang)
    {
        try {
            $stmt = $this->koneksi->prepare("insert into tbl_jadwal(kd_dosen,kd_matkul,waktu,ruang) values(?, ?, ?, ?)");
            $stmt->bind_param("ssss", $kd_dosen, $kd_matkul, $waktu, $ruang);
            $data = $stmt->execute();
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }

    function update_jadwal($id, $kd_dosen, $kd_matkul, $waktu, $ruang)
    {
        try {
            $stmt = $this->koneksi->prepare("UPDATE tbl_jadwal SET kd_dosen = ?, kd_matkul = ?, waktu = ?, ruang = ? WHERE id = ?");
            $stmt->bind_param("sssss", $kd_dosen, $kd_matkul, $waktu, $ruang, $id);
            $data = $stmt->execute();
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }

    function del_jadwal($id)
    {
        try {
            $stmt = $this->koneksi->prepare("delete from tbl_jadwal where id = ?");
            $stmt->bind_param("s", $id);
            $data = $stmt->execute();
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }

    // semester
    function get_allSemester()
    {
        $data = $this->koneksi->query("select * from tbl_semester order by kd_semester");
        return $data;
    }

    // krs
    function get_allKrs()
    {
        $data = $this->koneksi->query("select krs.*, mhs.nama as nama_mhs, semester.semester as nama_semester,
                                        matkul.nama as nama_matkul, dosen.nama as nama_dosen,
                                        jadwal.waktu as waktu, jadwal.ruang as ruang
                                        from tbl_krs as krs
                                        left join tbl_mahasiswa as mhs on krs.nim = mhs.nim
                                        left join tbl_semester as semester on krs.kd_semester = semester.kd_semester
                                        left join tbl_jadwal as jadwal on krs.id_jadwal = jadwal.id
                                        left join tbl_matkul as matkul on jadwal.kd_matkul = matkul.kd_matkul
                                        left join tbl_dosen as dosen on jadwal.kd_dosen = dosen.kd_dosen
                                        order by krs.id");
        return $data;
    }

    function get_KrsById($id)
    {
        $stmt = $this->koneksi->prepare("select * from tbl_krs where id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    // cek apakah nim sudah ambil jadwal tersebut pada semester tersebut
    function cek_krs($nim, $id_jadwal, $kd_semester, $id = "")
    {
        $stmt = $this->koneksi->prepare("select * from tbl_krs where nim = ? and id_jadwal = ? and kd_semester = ? and id <> ?");
        $stmt->bind_param("ssss", $nim, $id_jadwal, $kd_semester, $id);
        $stmt->execute();
        $data = $stmt->get_result();
        return $data->num_rows > 0;
    }

    function add_krs($nim, $id_jadwal, $kd_semester)
    {
        try {
            $stmt = $this->koneksi->prepare("insert into tbl_krs(nim,id_jadwal,kd_semester) values(?, ?, ?)");
            $stmt->bind_param("sss", $nim, $id_jadwal, $kd_semester);
            $data = $stmt->execute();
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }

    function update_krs($id, $nim, $id_jadwal, $kd_semester)
    {
        try {
            $stmt = $this->koneksi->prepare("UPDATE tbl_krs SET nim = ?, id_jadwal = ?, kd_semester = ? WHERE id = ?");
            $stmt->bind_param("ssss", $nim, $id_jadwal, $kd_semester, $id);
            $data = $stmt->execute();
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }

    function del_krs($id)
    {
        try {
            $stmt = $this->koneksi->prepare("delete from tbl_krs where id = ?");
            $stmt->bind_param("s", $id);
            $data = $stmt->execute();
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }
}

?>
