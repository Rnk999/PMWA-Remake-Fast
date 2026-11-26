<?php
return [
    'services' => ['label' => 'บริการ', 'items' => [
        'e-service' => ['E-Service (บริการออนไลน์)', 'https://eservice.phsmun.go.th/', 'open_in_new'],
        'citizen-guide' => ['คู่มือประชาชน', 'citizen-guide.php', 'menu_book'],
        'faqs' => ['คำถามที่พบบ่อย', 'faqs.php', 'quiz'],
    ]],
    'information' => ['label' => 'ข้อมูลเผยแพร่', 'items' => [
        'announcements' => ['ประกาศด่วนและแจ้งเหตุ', 'announcements.php', 'campaign'],
        'news' => ['ข่าวประชาสัมพันธ์', 'news.php', 'newspaper'],
        'documents' => ['แบบฟอร์มและเอกสารเผยแพร่', 'documents.php', 'folder_open'],
        'open-data' => ['Open Data', 'open-data.php', 'database'],
    ]],
];
