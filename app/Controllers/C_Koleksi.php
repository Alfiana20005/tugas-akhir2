<?php

namespace App\Controllers;

use App\Models\M_Koleksi;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\M_TerakhirDiubah;

class C_Koleksi extends BaseController
{
    protected $M_Koleksi;
    protected $M_TerakhirDiubah;

    public function __construct()
    {
        $this->M_Koleksi = new M_Koleksi();
        $this->M_TerakhirDiubah = new M_TerakhirDiubah();
    }

    public function tambahData()
    {
        return view('pengkajian/v_tambahKoleksi');
    }
    public function delete($id)
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Koleksi->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        // Redirect ke halaman yang sesuai
        return redirect()->back();
    }

    public function saveData()
    {

        //validation
        $rules = [
            'no_registrasi' => [
                'rules' => 'required|is_unique[data_koleksi.no_registrasi]',
                'errors' => ['required' => 'No Registrasi harus diisi']
            ],
            'no_inventaris' => [
                'rules' => 'required',
                'errors' => ['required' => 'No Inventaris harus diisi']
            ],

            'nama_inv' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama Benda harus diisi']
            ],
            'ukuran' => [
                'rules' => 'required',
                'errors' => ['required' => 'Ukuran harus diisi']
            ],
            'tempat_buat' => [
                'rules' => 'required',
                'errors' => ['required' => 'Tempat buat harus diisi']
            ],
            'tempat_dapat' => [
                'rules' => 'required',
                'errors' => ['required' => 'Tempat dapat harus diisi']
            ],
            'cara_dapat' => [
                'rules' => 'required',
                'errors' => ['required' => 'Cara dapat harus diisi']
            ],

            'keadaan' => [
                'rules' => 'required',
                'errors' => ['required' => 'Keadaan harus diisi']
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => ['required' => 'Lokasi harus diisi']
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => ['required' => 'Keterangan harus diisi']
            ],
            'uraian' => [
                'rules' => 'required',
                'errors' => ['required' => 'Uraian harus diisi']
            ],
            'kode_lk' => [
                'rules' => 'required|is_unique[data_koleksi.kode_lk]',

            ],

        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('/tambahdata'))
                ->withInput()
                ->with('errors', $this->validator->listErrors());
        }

        $idPetugas = session()->get('id_petugas');
        if (empty($idPetugas)) {
            die('Error: id_petugas tidak valid');
        }

        $foto = $this->request->getFile('gambar');
        $dafaultImg = 'images.jpeg';

        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/koleksi', $fotoName);
        } else {
            // Handle file upload error
            $fotoName = $dafaultImg;
        }
        // Simpan data pengunjung
        $this->M_Koleksi->save([

            'no_registrasi' => $this->request->getVar('no_registrasi'),
            'no_inventaris' => $this->request->getVar('no_inventaris'),
            'nama_inv' => $this->request->getVar('nama_inv'),
            'inv_name' => $this->request->getVar('inv_name'),
            'gambar' => $fotoName,
            'ukuran' => $this->request->getVar('ukuran'),
            'tempat_buat' => $this->request->getVar('tempat_buat'),
            'tempat_dapat' => $this->request->getVar('tempat_dapat'),
            'cara_dapat' => $this->request->getVar('cara_dapat'),
            'tgl_masuk' => $this->request->getVar('tgl_masuk'),
            'keadaan' => $this->request->getVar('keadaan'),
            'lokasi' => $this->request->getVar('lokasi'),
            'zona' => $this->request->getVar('zona'),
            'rak' => $this->request->getVar('rak'),
            'lemari' => $this->request->getVar('lemari'),
            'urutan' => $this->request->getVar('urutan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'uraian' => $this->request->getVar('uraian'),
            'kode_kategori' => $this->request->getVar('kode_kategori'),
            'harga' => $this->request->getVar('harga'),
            'usia' => $this->request->getVar('usia'),
            'harga_wajar' => $this->request->getVar('harga_wajar'),
            'harga_penggantian' => $this->request->getVar('harga_penggantian'),
            'kode_lk' => $this->request->getVar('kode_lk'),
            'fotografer' => $this->request->getVar('fotografer'),
            'sumber' => $this->request->getVar('sumber'),
            'status' => $this->request->getVar('status'),
            'id_petugas' => session()->get('id_petugas'), // Ambil ID petugas dari sesi

        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/tambahdata');
    }

    public function seluruhKoleksi()
    {
        $valid = $this->M_Koleksi->countStatus("Valid");
        $validtbc = $this->M_Koleksi->countStatus("Valid tbc");
        $anomali = $this->M_Koleksi->countStatus("Anomali");
        $disclaimer = $this->M_Koleksi->countStatus("Disclaimer");

        $keyword = $this->request->getGet('keyword');
        $filter = $this->request->getGet('filter');

        // Jika filter tanpa gambar dipilih
        if ($filter === 'no_image') {
            $data_koleksi = $this->M_Koleksi->getKoleksiNoImage(15, $keyword);
        } else {
            $data_koleksi = $this->M_Koleksi->getPaginated(15, $keyword);
        }

        $pager = $this->M_Koleksi->pager;

        $data = [
            'title' => 'Daftar Koleksi ',
            'data_koleksi' => $data_koleksi,
            'valid' => $valid,
            'validtbc' => $validtbc,
            'anomali' => $anomali,
            'disclaimer' => $disclaimer,
            'pager' => $pager,
            'filter' => $filter // Tambahkan filter ke data view
        ];

        return view('pengkajian/v_seluruhKoleksi', $data);
    }

    public function tampilKoleksi($kode_kategori)
    {
        // Mendapatkan data koleksi berdasarkan kategori
        $data_koleksi = $this->M_Koleksi->getKoleksiByKategori($kode_kategori);

        // Mendapatkan nama kategori
        $kategoriName = $this->M_Koleksi->getKategoriName($kode_kategori);

        // Mengecek apakah kategori ditemukan
        if ($kategoriName !== null && isset($kategoriName['nama_kategori'])) {
            // Jika kategori ditemukan, gunakan nama kategori di judul
            $judulKategori = $kategoriName['nama_kategori'];
        } else {
            // Handle jika kategori tidak ditemukan
            $judulKategori = 'Kategori Tidak Ditemukan';
        }

        // Membuat array data untuk dikirim ke view
        $data = [
            'title' => 'Daftar Koleksi ', // Menggunakan nama kategori di judul
            'data_koleksi' => $data_koleksi,
            'kategori' => $kategoriName,
            'judul' => $judulKategori,
        ];

        // Menampilkan view dengan data yang telah disiapkan
        return view('pengkajian/v_dataKoleksi', $data);
    }
    public function detailKoleksi($id)
    {
        // $this->M_Koleksi->enableQueryLog();


        $data_koleksi = $this->M_Koleksi->getKoleksi($id);
        $petugasName = $this->M_Koleksi->getPetugasName($data_koleksi['id_petugas']);
        $kategoriName = $this->M_Koleksi->getKategoriName($data_koleksi['kode_kategori']);
        $data_koleksi['petugas_name'] = isset($petugasName['nama']) ? $petugasName['nama'] : 'Nama Petugas Tidak Tersedia';
        $data_koleksi['kategori_name'] = isset($kategoriName['nama_kategori']) ? $kategoriName['nama_kategori'] : 'Nama Kategori Tidak Tersedia';

        // Akses log query setelah menjalankan query model
        // $queries = $this->M_Koleksi->getQueryLog();
        // print_r($queries);
        $data = [
            'title' => 'Detail Koleksi',
            'data_koleksi' => $data_koleksi,
        ];

        return view('pengkajian/v_detailKoleksi', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Koleksi',
            'validation' => \Config\Services::validation(),
            'data_koleksi' => $this->M_Koleksi->getKoleksi($id)
        ];

        return view('pengkajian/v_ubahKoleksi', $data);
    }
    public function update($id)
    {


        // Simpan data pengunjung
        //validation
        $data_koleksi = $this->M_Koleksi->getKoleksi($id);

        $idPetugas = session()->get('id_petugas');
        if (empty($idPetugas)) {
            die('Error: id_petugas tidak valid');
        }

        $foto = $this->request->getFile('gambar');

        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/koleksi', $fotoName);
        } else {
            // Handle file upload error
            $fotoName = $data_koleksi['gambar'];
        }

        $data = [
            // 'no_registrasi' => $this->request->getVar('no_registrasi'),
            // 'no_inventaris' => $this->request->getVar('no_inventaris'),
            // 'nama_inv' => $this->request->getVar('nama_inv'),
            // 'inv_name' => $this->request->getVar('inv_name'),
            // 'gambar' => $fotoName,
            // 'ukuran' => $this->request->getVar('ukuran'),
            // 'tempat_buat' => $this->request->getVar('tempat_buat'),
            // 'tempat_dapat' => $this->request->getVar('tempat_dapat'),
            // 'cara_dapat' => $this->request->getVar('cara_dapat'),
            // 'tgl_masuk' => $this->request->getVar('tgl_masuk'),
            // 'keadaan' => $this->request->getVar('keadaan'),
            // 'rak' => $this->request->getVar('rak'),
            // 'lemari' => $this->request->getVar('lemari'),
            // 'lokasi' => $this->request->getVar('lokasi'),
            // 'keterangan' => $this->request->getVar('keterangan'),
            // 'uraian' => $this->request->getVar('uraian'),
            // 'kode_kategori' => $this->request->getVar('kode_kategori'),
            // 'harga' => $this->request->getVar('harga'),
            // 'usia' => $this->request->getVar('usia'),
            // 'harga_wajar' => $this->request->getVar('harga_wajar'),
            // 'harga_penggantian' => $this->request->getVar('harga_penggantian'),
            // 'sumber' => $this->request->getVar('sumber'),
            // 'status' => $this->request->getVar('status'),
            // 'id_petugas' => session()->get('id_petugas'), // Ambil ID petugas dari sesi

            'no_registrasi' => $this->request->getVar('no_registrasi'),
            'no_inventaris' => $this->request->getVar('no_inventaris'),
            'nama_inv' => $this->request->getVar('nama_inv'),
            'inv_name' => $this->request->getVar('inv_name'),
            'gambar' => $fotoName,
            'ukuran' => $this->request->getVar('ukuran'),
            'tempat_buat' => $this->request->getVar('tempat_buat'),
            'tempat_dapat' => $this->request->getVar('tempat_dapat'),
            'cara_dapat' => $this->request->getVar('cara_dapat'),
            'tgl_masuk' => $this->request->getVar('tgl_masuk'),
            'keadaan' => $this->request->getVar('keadaan'),
            'lokasi' => $this->request->getVar('lokasi'),
            'zona' => $this->request->getVar('zona'),
            'lemari' => $this->request->getVar('lemari'),
            'rak' => $this->request->getVar('rak'),
            'urutan' => $this->request->getVar('urutan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'uraian' => $this->request->getVar('uraian'),
            'kode_kategori' => $this->request->getVar('kode_kategori'),
            'harga' => $this->request->getVar('harga'),
            'usia' => $this->request->getVar('usia'),
            'harga_wajar' => $this->request->getVar('harga_wajar'),
            'harga_penggantian' => $this->request->getVar('harga_penggantian'),
            'kode_lk' => $this->request->getVar('kode_lk'),
            'fotografer' => $this->request->getVar('fotografer'),
            'sumber' => $this->request->getVar('sumber'),
            'status' => $this->request->getVar('status'),
            'id_petugas' => session()->get('id_petugas'), // Ambil ID petugas dari sesi

        ];
        $this->M_Koleksi->updateKoleksi($id, $data);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        // dd($this->request->getVar());
        // Redirect ke halaman sebelumnya atau halaman yang sesuai
        return redirect()->to('/detailKoleksi/' . $id);
    }
    public function updateKeadaan()
    {
        // Pastikan metode yang digunakan adalah POST
        if ($this->request->getMethod() == 'post') {
            // Ambil data ID dan status dari permintaan POST
            $id = $this->request->getPost('id');
            $keadaan = $this->request->getPost('keadaan');

            // Lakukan pembaruan status di database menggunakan model
            $result = $this->M_Koleksi->updateKeadaan($id, $keadaan);

            // Beri respons berdasarkan hasil pembaruan
            if ($result) {
                return redirect()->back();
                // return $this->response->setJSON(['success' => false, 'message' => 'Berhasil']);

            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui status']);
            }
        } else {
            // Jika metode bukan POST, beri respons dengan kesalahan
            return $this->response->setJSON(['success' => false, 'message' => 'Metode yang tidak valid']);
        }
    }

    // public function exportExcel(){
    //     $koleksiModel = new M_Koleksi();
    //     $koleksi = $koleksiModel->getkoleksiAll();

    //     $fileName = 'koleksi.xlsx';

    //     $spreadsheet = new Spreadsheet();

    //     $sheet = $spreadsheet->getActiveSheet();
    //     $sheet-> setCellValue('A1', 'NO REGISTRASI');
    //     $sheet-> setCellValue('B1', 'NO INVENTARIS');
    //     $sheet-> setCellValue('C1', 'NAMA BENDA');
    //     $sheet-> setCellValue('D1', 'URAIAN');
    //     $sheet-> setCellValue('E1', 'ASAL DIDAPAT');
    //     $sheet-> setCellValue('F1', 'UKURAN');
    //     $sheet-> setCellValue('G1', 'CARA DIDAPAT');
    //     $sheet-> setCellValue('H1', 'TANGGAL');
    //     $sheet-> setCellValue('I1', 'HARGA');
    //     $sheet-> setCellValue('J1', 'LOKASI PENYIMPANAN');
    //     $sheet-> setCellValue('K1', 'KEADAAN');
    //     $sheet->setCellValue('L1', 'GAMBAR'); // Kolom untuk gambar

    //     $row = 2;

    //     foreach($koleksi as $item){
    //         $sheet-> setCellValue('A' . $row, $item['no_registrasi']);
    //         $sheet-> setCellValue('B' . $row, $item['kode_kategori'] . " . " . $item['no_inventaris']);
    //         $sheet-> setCellValue('C' . $row, $item['nama_inv']);
    //         $sheet-> setCellValue('D' . $row, $item['uraian']);
    //         $sheet-> setCellValue('E' . $row, $item['tempat_dapat']);
    //         $sheet-> setCellValue('F' . $row, $item['ukuran']);
    //         $sheet-> setCellValue('G' . $row, $item['cara_dapat']);
    //         $sheet-> setCellValue('H' . $row, $item['tgl_masuk']);
    //         $sheet-> setCellValue('I' . $row, $item['harga']);
    //         $sheet-> setCellValue('J' . $row, $item['rak'] . " " .  $item['lemari'] . " " . $item['lokasi']);
    //         $sheet-> setCellValue('K' . $row, $item['keadaan']);

    //          // Tambahkan gambar jika ada
    //         if (!empty($item['gambar']) && file_exists('path/to/gambar/' . $item['gambar'])) {
    //             $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    //             $drawing->setName('Gambar');
    //             $drawing->setDescription('Gambar Koleksi');
    //             $drawing->setPath('path/to/gambar/' . $item['gambar']); // Path ke gambar
    //             $drawing->setCoordinates('L' . $row); // Kolom gambar
    //             $drawing->setWidth(50); // Atur lebar gambar
    //             $drawing->setHeight(50); // Atur tinggi gambar
    //             $drawing->setWorksheet($sheet);
    //         }

    //         $row++;

    //     }

    //     header('Content-Type: application/vnd.ms-excel');
    //     header('Content-Disposition: attachment: filename' . $fileName);
    //     header('cache-Control: max=age-0');

    //     $writer = new xlsx($spreadsheet);
    //     $writer->save('php://output');
    //     exit;

    // }

    // public function exportExcel(){
    //     $koleksiModel = new M_Koleksi();
    //     $koleksi = $koleksiModel->getkoleksiAll();

    //     $fileName = 'koleksi.xlsx';

    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();

    //     // Header
    //     $sheet->setCellValue('A1', 'NO REGISTRASI');
    //     $sheet->setCellValue('B1', 'NO INVENTARIS');
    //     $sheet->setCellValue('C1', 'NAMA BENDA');
    //     $sheet->setCellValue('D1', 'URAIAN');
    //     $sheet->setCellValue('E1', 'ASAL DIDAPAT');
    //     $sheet->setCellValue('F1', 'UKURAN');
    //     $sheet->setCellValue('G1', 'CARA DIDAPAT');
    //     $sheet->setCellValue('H1', 'TANGGAL');
    //     $sheet->setCellValue('I1', 'HARGA');
    //     $sheet->setCellValue('J1', 'LOKASI PENYIMPANAN');
    //     $sheet->setCellValue('K1', 'KEADAAN');
    //     $sheet->setCellValue('L1', 'GAMBAR');

    //     // Style header
    //     $sheet->getStyle('A1:L1')->applyFromArray([
    //         'font' => [
    //             'bold' => true,
    //         ],
    //         'fill' => [
    //             'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
    //             'startColor' => [
    //                 'argb' => 'FFCCCCCC',
    //             ],
    //         ],
    //         'alignment' => [
    //             'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    //             'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    //         ],
    //     ]);

    //     $row = 2;

    //     foreach ($koleksi as $item) {
    //         $sheet->setCellValue('A' . $row, $item['no_registrasi']);
    //         $sheet->setCellValue('B' . $row, $item['kode_kategori'] . " . " . $item['no_inventaris']);
    //         $sheet->setCellValue('C' . $row, $item['nama_inv']);
    //         $sheet->setCellValue('D' . $row, $item['uraian']);
    //         $sheet->setCellValue('E' . $row, $item['tempat_dapat']);
    //         $sheet->setCellValue('F' . $row, $item['ukuran']);
    //         $sheet->setCellValue('G' . $row, $item['cara_dapat']);
    //         $sheet->setCellValue('H' . $row, $item['tgl_masuk']);
    //         $sheet->setCellValue('I' . $row, $item['harga']);
    //         $sheet->setCellValue('J' . $row, $item['rak'] . " " . $item['lemari'] . " " . $item['lokasi']);
    //         $sheet->setCellValue('K' . $row, $item['keadaan']);

    //         // Tambahkan gambar
    //         $path = realpath('img/koleksi/' . $item['gambar']);
    //         if ($path && file_exists($path)) {
    //             $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    //             $drawing->setName('Gambar');
    //             $drawing->setDescription('Gambar Koleksi');
    //             $drawing->setPath($path);
    //             $drawing->setCoordinates('L' . $row);
    //             $drawing->setWidth(50);
    //             $drawing->setHeight(50);
    //             $drawing->setWorksheet($sheet);
    //         }

    //         // Atur tinggi baris
    //         $sheet->getRowDimension($row)->setRowHeight(60);

    //         $row++;
    //     }

    //     // Atur auto-size kolom
    //     foreach (range('A', 'L') as $col) {
    //         $sheet->getColumnDimension($col)->setAutoSize(true);
    //     }

    //     // Tambahkan border
    //     $styleArray = [
    //         'borders' => [
    //             'allBorders' => [
    //                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //             ],
    //         ],
    //     ];
    //     $sheet->getStyle('A1:L' . $row)->applyFromArray($styleArray);

    //     // Simpan dan unduh file Excel
    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Disposition: attachment; filename="' . $fileName . '"');
    //     header('Cache-Control: max-age=0');

    //     $writer = new Xlsx($spreadsheet);
    //     $writer->save('php://output');
    //     exit;
    // }

    public function exportExcel()
    {
        // 1. Tingkatkan memory limit dan execution time
        ini_set('memory_limit', '512M');
        ini_set('max_execution_time', 300); // 5 menit

        $koleksiModel = new M_Koleksi();
        $fileName = 'koleksi_' . date('Y-m-d_H-i-s') . '.xlsx';

        // 2. Inisialisasi Spreadsheet dengan setting yang dioptimasi
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // 3. Nonaktifkan kalkulasi otomatis untuk menghemat memory
        $spreadsheet->getActiveSheet()->setAutoFilter(false);

        // Header
        $headers = [
            'A1' => 'NO REGISTRASI',
            'B1' => 'NO INVENTARIS',
            'C1' => 'NAMA BENDA',
            'D1' => 'URAIAN',
            'E1' => 'ASAL DIDAPAT',
            'F1' => 'UKURAN',
            'G1' => 'CARA DIDAPAT',
            'H1' => 'TANGGAL',
            'I1' => 'HARGA',
            'J1' => 'LOKASI PENYIMPANAN',
            'K1' => 'KEADAAN',
            'L1' => 'GAMBAR'
        ];

        // Set header dengan loop
        foreach ($headers as $cell => $value) {
            $sheet->setCellValue($cell, $value);
        }

        // Style Header
        $sheet->getStyle('A1:L1')->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFCCCCCC'],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // 4. Proses data dalam batch yang lebih kecil
        $batchSize = 100; // Kurangi dari 500 ke 100
        $offset = 0;
        $row = 2;
        $totalProcessed = 0;

        // 5. Hitung total data terlebih dahulu
        $totalData = $koleksiModel->countAll();

        while ($offset < $totalData) {
            // Ambil batch data
            $koleksi = $koleksiModel->getKoleksiBatch($batchSize, $offset);

            if (empty($koleksi)) {
                break;
            }

            foreach ($koleksi as $item) {
                try {
                    // 6. Gunakan array untuk mengurangi memory overhead
                    $rowData = [
                        'A' => $item['no_registrasi'] ?? '',
                        'B' => ($item['kode_kategori'] ?? '') . " . " . ($item['no_inventaris'] ?? ''),
                        'C' => $item['nama_inv'] ?? '',
                        'D' => $item['uraian'] ?? '',
                        'E' => $item['tempat_dapat'] ?? '',
                        'F' => $item['ukuran'] ?? '',
                        'G' => $item['cara_dapat'] ?? '',
                        'H' => $item['tgl_masuk'] ?? '',
                        'I' => $item['harga'] ?? '',
                        'J' => ($item['rak'] ?? '') . " " . ($item['lemari'] ?? '') . " " . ($item['lokasi'] ?? ''),
                        'K' => $item['keadaan'] ?? '',
                        'L' => $item['gambar'] ?? 'Tidak ada gambar'
                    ];

                    // Set data ke spreadsheet
                    foreach ($rowData as $col => $value) {
                        $sheet->setCellValue($col . $row, $value);
                    }

                    // 7. SKIP GAMBAR untuk menghemat memory
                    // Hanya tampilkan nama file tanpa embed gambar

                    // Set tinggi baris standar
                    $sheet->getRowDimension($row)->setRowHeight(20);

                    $row++;
                    $totalProcessed++;

                    // 8. Bersihkan memory setiap 50 baris
                    if ($totalProcessed % 50 == 0) {
                        gc_collect_cycles();
                    }
                } catch (Exception $e) {
                    // Skip baris yang error
                    log_message('error', 'Error processing row: ' . $e->getMessage());
                    continue;
                }
            }

            // Update offset
            $offset += $batchSize;

            // 9. Bersihkan memory setiap batch
            unset($koleksi);
            gc_collect_cycles();

            // 10. Cek memory usage
            if (memory_get_usage() > 400 * 1024 * 1024) { // 400MB
                log_message('error', 'Memory usage too high, stopping export');
                break;
            }
        }

        // 11. Set auto-size hanya untuk kolom yang diperlukan
        $autoSizeColumns = ['A', 'B', 'C', 'K', 'L'];
        foreach ($autoSizeColumns as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set width manual untuk kolom lainnya
        $sheet->getColumnDimension('D')->setWidth(30); // Uraian
        $sheet->getColumnDimension('E')->setWidth(20); // Asal didapat
        $sheet->getColumnDimension('F')->setWidth(15); // Ukuran
        $sheet->getColumnDimension('G')->setWidth(20); // Cara didapat
        $sheet->getColumnDimension('H')->setWidth(15); // Tanggal
        $sheet->getColumnDimension('I')->setWidth(15); // Harga
        $sheet->getColumnDimension('J')->setWidth(25); // Lokasi

        // 12. Tambahkan border hanya jika data tidak terlalu banyak
        if ($totalProcessed < 5000) {
            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ];
            $sheet->getStyle('A1:L' . ($row - 1))->applyFromArray($styleArray);
        }

        // 13. Bersihkan memory sebelum save
        gc_collect_cycles();

        // 14. Output dengan buffer yang dioptimasi
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        // 15. Gunakan output buffering
        ob_start();

        try {
            $writer = new Xlsx($spreadsheet);

            // Optimasi writer
            $writer->setPreCalculateFormulas(false);
            $writer->setUseDiskCaching(true);

            $writer->save('php://output');
        } catch (Exception $e) {
            ob_end_clean();
            log_message('error', 'Export error: ' . $e->getMessage());
            session()->setFlashdata('error', 'Export gagal: ' . $e->getMessage());
            return redirect()->back();
        }

        // 16. Bersihkan memory
        $spreadsheet->disconnectWorksheets();
        unset($spreadsheet);

        ob_end_flush();
        exit;
    }



    public function terakhirDiubah($id)
    {

        // $data_koleksi = $this->M_TerakhirDiubah->getData($id);
        $data_koleksi = $this->M_TerakhirDiubah->findAll();
        // $petugasName = $this->M_Koleksi->getPetugasName($data_koleksi['id_petugas']);
        // $kategoriName = $this->M_Koleksi->getKategoriName($data_koleksi['kode_kategori']);
        // $data_koleksi['petugas_name'] = isset($petugasName['nama']) ? $petugasName['nama'] : 'Nama Petugas Tidak Tersedia';
        // $data_koleksi['kategori_name'] = isset($kategoriName['nama_kategori']) ? $kategoriName['nama_kategori'] : 'Nama Kategori Tidak Tersedia';

        $data = [
            'title' => 'Detail Koleksi',
            'data_koleksi' => $data_koleksi,
        ];
        return view('pengkajian/v_terakhirDiubah', $data);
    }

    // Di controller
    public function dataKoleksiTanpaGambar()
    {
        $model = new M_Koleksi();
        $data = [
            'title' => 'Data Koleksi Tanpa Gambar',
            'data_koleksi' => $model->where('gambar', '')->orWhere('gambar', 'default.jpg')->findAll()
        ];

        return view('pengkajian/v_seluruhKoleksi', $data);
    }
}
