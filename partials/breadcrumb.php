<?php
$breadcrumbParents = [
    'services' => ['บริการ', 'index.php#services'],
    'information' => ['ข้อมูลเผยแพร่', 'index.php#information'],
    'about' => ['เกี่ยวกับเรา', 'about.php'],
];
$breadcrumbParent = $breadcrumbParents[$banner['breadcrumbParent'] ?? ''] ?? null;
?>
          <nav aria-label="เส้นทางนำทาง">
            <ol class="breadcrumb">
              <li><a href="index.php">หน้าแรก</a></li>
              <?php if ($breadcrumbParent !== null): ?>
                <li><a href="<?= $escapeBanner($breadcrumbParent[1]) ?>"><?= $escapeBanner($breadcrumbParent[0]) ?></a></li>
              <?php endif; ?>
              <li><span aria-current="page"><?= $escapeBanner($banner['breadcrumbLabel'] ?? $banner['title']) ?></span></li>
            </ol>
          </nav>
