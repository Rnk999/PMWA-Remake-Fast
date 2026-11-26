<?php
$breadcrumbPages = [
    'citizen-guide' => ['คู่มือประชาชน', 'บริการ', 'index.php#services'],
    'faqs' => ['คำถามที่พบบ่อย', 'บริการ', 'index.php#services'],
    'announcements' => ['ประกาศด่วนและแจ้งเหตุน้ำประปา', 'ข้อมูลเผยแพร่', 'index.php#information'],
    'news' => ['ข่าวประชาสัมพันธ์', 'ข้อมูลเผยแพร่', 'index.php#information'],
    'documents' => ['แบบฟอร์มและเอกสารเผยแพร่', 'ข้อมูลเผยแพร่', 'index.php#information'],
    'open-data' => ['ข้อมูลเปิด', 'ข้อมูลเผยแพร่', 'index.php#information'],
    'procurement' => ['จัดซื้อจัดจ้าง', null, null],
    'about' => [$aboutTitle ?? '', 'เกี่ยวกับเรา', 'about.php'],
];
[$breadcrumbTitle, $breadcrumbParent, $breadcrumbParentHref] = $breadcrumbPages[$activePage];
?>
    <div class="subpage-breadcrumb">
      <nav class="container" aria-label="เส้นทางนำทาง">
        <ol class="breadcrumb">
          <li><a href="index.php">หน้าแรก</a></li>
          <?php if ($breadcrumbParent !== null): ?>
            <li><a href="<?= $breadcrumbParentHref ?>"><?= $breadcrumbParent ?></a></li>
          <?php endif; ?>
          <li><span aria-current="page"><?= $breadcrumbTitle ?></span></li>
        </ol>
      </nav>
    </div>
