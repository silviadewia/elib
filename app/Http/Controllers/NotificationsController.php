<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function getNotificationsData()
    {
        $pinjam = \App\Models\Pinjam::where('status', 0)->count();
        $kembali = \App\Models\Pinjam::where('status', 1)->count();
        $telat = \App\Models\Pinjam::where('status', 2)->count();
        
        $notifications = [
            [
                'icon' => 'fas fa-fw fa-envelope',
                'text' => $pinjam . ' peminjaman buku',
            ],
            [
                'icon' => 'fas fa-fw fa-users text-primary',
                'text' => $kembali. ' pengembalian buku',
            ],
            [
                'icon' => 'fas fa-fw fa-file text-danger',
                'text' =>  $telat . ' denda',
            ],
        ];

        $dropdownHtml = '';

        foreach ($notifications as $key => $not) {
            $icon = "<i class='mr-2 {$not['icon']}'></i>";


            $dropdownHtml .= "<a href='#' class='dropdown-item'>
                            {$icon}{$not['text']}
                          </a>";

            if ($key < count($notifications) - 1) {
                $dropdownHtml .= "<div class='dropdown-divider'></div>";
            }
        }

        return [
            'label'       => $pinjam + $kembali + $telat,
            'label_color' => 'danger',
            'icon_color'  => 'dark',
            'dropdown'    => $dropdownHtml,
        ];
    }
}
