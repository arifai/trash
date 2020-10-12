<?php

if (!function_exists('datetime_parse')) {

    /**
     * Method ini akan membuat format tanggal dan waktu (WIB) Indonesia. Contoh hasil Jumat, 17 Agustus 1945 11:00 WIB
     */
    function datetime_parse($datetime)
    {
        date_default_timezone_set('Asia/Jakarta');

        $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $year = substr($datetime, 0, 4);
        $month = substr($datetime, 5, 2);
        $date = substr($datetime, 8, 2);
        $time = substr($datetime, 11, 5);
        $day = date('w', strtotime($datetime));

        $result = $days[$day] . ', ' . $date . ' ' . $months[(int)$month - 1] . ' ' . $year . ' ' . $time . ' WIB';

        return $result;
    }

    /**
     * Method ini akan memformat tanggal, bulan, dan tahun saja. Contoh hasil 17 Agustus 1945
     */
    function simple_datetime_parse($datetime)
    {
        date_default_timezone_set('Asia/Jakarta');

        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $year = substr($datetime, 0, 4);
        $month = substr($datetime, 5, 2);
        $date = substr($datetime, 8, 2);

        $result = $date . ' ' . $months[(int)$month - 1] . ' ' . $year;

        return $result;
    }
}
