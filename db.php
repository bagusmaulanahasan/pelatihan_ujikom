<?php

class db
{
    private $koneksi;
    function __construct()
    {
        $this->koneksi = $koneksi = new mysqli("localhost", "root", "0320", "db_latihan");

    }
    function get_user($username, $password)
    {
        $data = $this->koneksi->query("select * from tbl_user where username='$username' and password='$password'");
        return $data;
    }
    // mahasiswa
    function get_allMhs()
    {
        $data = $this->koneksi->query("select * from tbl_mahasiswa");
        return $data;
    }

    function add_mhs($nim, $nama, $alamat)
    {
        $this->koneksi->query("insert into tbl_mahasiswa(nim,nama,alamat) values('$nim','$nama','$alamat')");
        return true;

    }

    function update_mhs($nim, $nama, $alamat)
    {
        $this->koneksi->query("UPDATE tbl_mahasiswa SET nama = '$nama', alamat = '$alamat' WHERE nim='$nim'");
        return true;
    }

    function get_MhdByNim($nim)
    {
        $data = $this->koneksi->query("select * from tbl_mahasiswa where nim='$nim'");
        return $data;
    }

    function del_mhs($nim)
    {
        $this->koneksi->query("delete from tbl_mahasiswa where nim='$nim'");
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
            $data = $this->koneksi->query("insert into tbl_dosen(kd_dosen,nama,alamat) values('$kd_dosen','$nama','$alamat')");
        } catch (\Exception $e) {
            return false;
        }
        return $data;

    }

    function update_dosen($kd_dosen, $kd_dosen_baru, $nama, $alamat)
    {
        try {
            $data = $this->koneksi->query("UPDATE tbl_dosen SET kd_dosen = '$kd_dosen_baru', nama = '$nama', alamat = '$alamat' WHERE kd_dosen='$kd_dosen'");
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }

    function get_DosenByKd($kd_dosen)
    {
        $data = $this->koneksi->query("select * from tbl_dosen where kd_dosen='$kd_dosen'");
        return $data;
    }

    function del_dosen($kd_dosen)
    {
        try {
            $data = $this->koneksi->query("delete from tbl_dosen where kd_dosen='$kd_dosen'");
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
        $data = $this->koneksi->query("select * from tbl_jadwal where id='$id'");
        return $data;
    }

    function add_jadwal($kd_dosen, $kd_matkul, $waktu, $ruang)
    {
        try {
            $data = $this->koneksi->query("insert into tbl_jadwal(kd_dosen,kd_matkul,waktu,ruang) values('$kd_dosen','$kd_matkul','$waktu','$ruang')");
        } catch (\Exception $e) {
            return false;
        }
        return $data;

    }

    function update_jadwal($id, $kd_dosen, $kd_matkul, $waktu, $ruang)
    {
        try {
            $data = $this->koneksi->query("UPDATE tbl_jadwal SET kd_dosen = '$kd_dosen', kd_matkul = '$kd_matkul', waktu = '$waktu', ruang = '$ruang' WHERE id='$id'");
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }

    function del_jadwal($id)
    {
        try {
            $data = $this->koneksi->query("delete from tbl_jadwal where id='$id'");
        } catch (\Exception $e) {
            return false;
        }
        return $data;

    }



}

?>