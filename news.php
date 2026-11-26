<?php
$activePage = 'news';
$newsItems = [
  ['id' => 'mock-12', 'category' => 'การพัฒนาระบบประปา', 'date' => '2026-11-24', 'dateLabel' => '24 พ.ย. 2569', 'title' => 'ตัวอย่าง: แนวทางพัฒนาการให้บริการข้อมูลประปาในรูปแบบดิจิทัล', 'summary' => 'เนื้อหาตัวอย่างสำหรับนำเสนอแนวคิดการสื่อสารข้อมูลบริการให้ประชาชนเข้าถึงได้สะดวกขึ้น'],
  ['id' => 'mock-11', 'category' => 'บริการประชาชน', 'date' => '2026-11-20', 'dateLabel' => '20 พ.ย. 2569', 'title' => 'ตัวอย่าง: รวมคำแนะนำการใช้น้ำและการดูแลอุปกรณ์ภายในบ้าน', 'summary' => 'ตัวอย่างเนื้อหาความรู้ทั่วไปเกี่ยวกับการใช้น้ำอย่างเหมาะสมและการดูแลระบบประปาภายในบ้าน'],
  ['id' => 'mock-10', 'category' => 'กิจกรรมและชุมชนสัมพันธ์', 'date' => '2026-11-16', 'dateLabel' => '16 พ.ย. 2569', 'title' => 'ตัวอย่าง: กิจกรรมสร้างความเข้าใจเรื่องระบบประปากับชุมชน', 'summary' => 'ข้อความจำลองสำหรับแสดงรูปแบบข่าวกิจกรรมและการสื่อสารข้อมูลกับประชาชน'],
  ['id' => 'mock-09', 'category' => 'รายงานคุณภาพน้ำประปา', 'date' => '2026-10-28', 'dateLabel' => '28 ต.ค. 2569', 'title' => 'ตัวอย่าง: การนำเสนอข้อมูลคุณภาพน้ำประปาให้อ่านง่าย', 'summary' => 'ตัวอย่างรูปแบบการสรุปข้อมูลและแนวทางเผยแพร่รายงานคุณภาพน้ำอย่างเข้าใจง่าย'],
  ['id' => 'mock-08', 'category' => 'การพัฒนาระบบประปา', 'date' => '2026-10-14', 'dateLabel' => '14 ต.ค. 2569', 'title' => 'ตัวอย่าง: การบำรุงรักษาระบบประปาและการวางแผนงาน', 'summary' => 'เนื้อหาจำลองเพื่อแสดงการสื่อสารเรื่องการดูแลระบบและการวางแผนงานบริการ'],
  ['id' => 'mock-07', 'category' => 'บริการประชาชน', 'date' => '2026-09-30', 'dateLabel' => '30 ก.ย. 2569', 'title' => 'ตัวอย่าง: ช่องทางและขั้นตอนการติดต่อขอรับบริการ', 'summary' => 'ตัวอย่างการจัดทำข่าวแนะนำบริการ โดยรายละเอียดจริงควรได้รับการยืนยันจากหน่วยงาน'],
  ['id' => 'mock-06', 'category' => 'กิจกรรมและชุมชนสัมพันธ์', 'date' => '2026-09-12', 'dateLabel' => '12 ก.ย. 2569', 'title' => 'ตัวอย่าง: สื่อความรู้เรื่องการใช้น้ำอย่างรู้คุณค่า', 'summary' => 'ข้อความตัวอย่างสำหรับข่าวสารความรู้และการมีส่วนร่วมกับชุมชน'],
  ['id' => 'mock-05', 'category' => 'รายงานคุณภาพน้ำประปา', 'date' => '2025-12-18', 'dateLabel' => '18 ธ.ค. 2568', 'title' => 'ตัวอย่าง: วิธีอ่านข้อมูลในรายงานคุณภาพน้ำประปา', 'summary' => 'ตัวอย่างเนื้อหาอธิบายหัวข้อพื้นฐานที่อาจพบในรายงานคุณภาพน้ำ'],
  ['id' => 'mock-04', 'category' => 'การพัฒนาระบบประปา', 'date' => '2025-10-05', 'dateLabel' => '5 ต.ค. 2568', 'title' => 'ตัวอย่าง: การปรับปรุงระบบงานเพื่อบริการประชาชน', 'summary' => 'ข่าวจำลองสำหรับแสดงรูปแบบการสื่อสารความคืบหน้าด้านการพัฒนาระบบ'],
  ['id' => 'mock-03', 'category' => 'บริการประชาชน', 'date' => '2025-08-22', 'dateLabel' => '22 ส.ค. 2568', 'title' => 'ตัวอย่าง: เตรียมข้อมูลก่อนติดต่อขอใช้บริการประปา', 'summary' => 'ตัวอย่างคำแนะนำทั่วไปสำหรับเตรียมข้อมูลให้พร้อมก่อนติดต่อหน่วยงาน'],
  ['id' => 'mock-02', 'category' => 'กิจกรรมและชุมชนสัมพันธ์', 'date' => '2025-06-11', 'dateLabel' => '11 มิ.ย. 2568', 'title' => 'ตัวอย่าง: เปิดพื้นที่รับฟังข้อเสนอแนะด้านบริการ', 'summary' => 'ข้อความจำลองสำหรับแสดงข่าวประชาสัมพันธ์เกี่ยวกับการรับฟังความคิดเห็น'],
  ['id' => 'mock-01', 'category' => 'รายงานคุณภาพน้ำประปา', 'date' => '2025-03-04', 'dateLabel' => '4 มี.ค. 2568', 'title' => 'ตัวอย่าง: ทำความรู้จักขั้นตอนการตรวจสอบคุณภาพน้ำ', 'summary' => 'ข้อมูลตัวอย่างเพื่อแสดงรูปแบบข่าวให้ความรู้เกี่ยวกับกระบวนการตรวจสอบคุณภาพน้ำ']
];
$featuredNews = array_shift($newsItems);
$categories = array_values(array_unique(array_column(array_merge([$featuredNews], $newsItems), 'category')));
$years = array_values(array_unique(array_map(static fn ($item) => (string) ((int) substr($item['date'], 0, 4) + 543), array_merge([$featuredNews], $newsItems))));
?>
<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#173f70">
    <meta name="description" content="หน้าข่าวประชาสัมพันธ์ตัวอย่างของกองการประปา เทศบาลนครพิษณุโลก">
    <title>ข่าวประชาสัมพันธ์ — กองการประปา เทศบาลนครพิษณุโลก</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+Thai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,400,0,0" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/logos/กองการประปา%20logo.PNG">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/news.css">
    <script src="js/localization.js" defer></script>
    <script src="js/main.js" defer></script>
    <script src="js/news.js" defer></script>
  </head>
  <body>
    <a class="skip-link" href="#main-content">ข้ามไปยังเนื้อหาหลัก</a>
    <?php require __DIR__ . '/partials/header.php'; ?>
    <main tabindex="-1" id="main-content">
      <?php
        $banner = [
            'title' => 'ข่าวประชาสัมพันธ์',
            'titleId' => 'news-title',
            'subtitle' => 'Public Relations News',
            'description' => 'ติดตามข่าวสาร กิจกรรม และข้อมูลที่เป็นประโยชน์จากกองการประปา เทศบาลนครพิษณุโลก',
            'eyebrow' => 'ข่าวสารและกิจกรรม',
            'icon' => 'newspaper',
            'breadcrumbParent' => 'information',
            'details' => static function (): void {
            ?>
            <aside class="news-demo-callout"><span class="material-symbols-rounded" aria-hidden="true">info</span><span><strong>ข้อมูลตัวอย่าง</strong><small>เนื้อหาในหน้านี้จัดทำเพื่อทดสอบต้นแบบ ไม่ใช่ข่าวประกาศจากหน่วยงาน</small></span></aside>
            <?php
            },
        ];
        require __DIR__ . '/partials/page-banner.php';
      ?>
      <div class="news-page container">

      <section class="news-filters" aria-label="ค้นหาและกรองข่าว">
        <div class="page-search news-search">
          <span class="material-symbols-rounded" aria-hidden="true">search</span>
          <label class="visually-hidden" for="news-search">ค้นหาข่าว</label>
          <input id="news-search" type="search" placeholder="ค้นหาหัวข้อข่าวหรือคำสำคัญ..." autocomplete="off">
          <button type="button" id="news-search-clear" aria-label="ล้างคำค้นหา" hidden><span class="material-symbols-rounded" aria-hidden="true">close</span></button>
        </div>
        <label class="filter-select"><span>หมวดหมู่</span><select id="news-category"><option value="">ทุกหมวดหมู่</option><?php foreach ($categories as $category): ?><option value="<?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8') ?></option><?php endforeach; ?></select></label>
        <label class="filter-select"><span>ปีที่เผยแพร่</span><select id="news-year"><option value="">ทุกปี</option><?php foreach ($years as $year): ?><option value="<?= htmlspecialchars($year, ENT_QUOTES, 'UTF-8') ?>">พ.ศ. <?= htmlspecialchars($year, ENT_QUOTES, 'UTF-8') ?></option><?php endforeach; ?></select></label>
        <button class="news-reset" id="news-reset" type="button"><span class="material-symbols-rounded" aria-hidden="true">restart_alt</span> ล้างตัวกรอง</button>
      </section>

      <section class="featured-news" id="featured-news" aria-labelledby="featured-title">
        <div class="featured-image-wrap"><img src="assets/images/hero/waterwork%201.jpg" alt="ภาพตัวอย่างระบบท่อประปา" class="featured-image"><span class="featured-image-label"><span class="material-symbols-rounded" aria-hidden="true">image</span> ภาพประกอบตัวอย่าง</span></div>
        <div class="featured-copy">
          <div class="featured-tags"><span class="news-category-badge"><?= htmlspecialchars($featuredNews['category'], ENT_QUOTES, 'UTF-8') ?></span><span class="featured-label"><span class="material-symbols-rounded" aria-hidden="true">star</span> ข่าวแนะนำ</span></div>
          <p class="news-date"><span class="material-symbols-rounded" aria-hidden="true">calendar_month</span><time datetime="<?= $featuredNews['date'] ?>"><?= $featuredNews['dateLabel'] ?></time></p>
          <h2 id="featured-title"><?= htmlspecialchars($featuredNews['title'], ENT_QUOTES, 'UTF-8') ?></h2>
          <p class="featured-summary"><?= htmlspecialchars($featuredNews['summary'], ENT_QUOTES, 'UTF-8') ?></p>
          <button class="news-read-more featured-read-more" type="button" data-news-id="<?= $featuredNews['id'] ?>">อ่านรายละเอียด <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></button>
        </div>
      </section>

      <section class="news-results" aria-labelledby="news-results-title">
        <div class="news-results-heading"><h2 id="news-results-title">ข่าวสารและกิจกรรมล่าสุด</h2><p id="news-results-count" aria-live="polite"></p></div>
        <div class="news-grid" id="news-grid" aria-live="polite">
          <?php foreach ($newsItems as $item): $year = (int) substr($item['date'], 0, 4) + 543; ?>
            <article class="news-card" data-news-id="<?= $item['id'] ?>" data-category="<?= htmlspecialchars($item['category'], ENT_QUOTES, 'UTF-8') ?>" data-year="<?= $year ?>" data-search="<?= htmlspecialchars($item['title'] . ' ' . $item['summary'] . ' ' . $item['category'], ENT_QUOTES, 'UTF-8') ?>">
              <div class="news-card-image"><img src="assets/images/hero/waterwork%201.jpg" alt="ภาพประกอบข่าวตัวอย่าง" loading="lazy"><span class="news-category-badge"><?= htmlspecialchars($item['category'], ENT_QUOTES, 'UTF-8') ?></span></div>
              <div class="news-card-body"><p class="news-date"><span class="material-symbols-rounded" aria-hidden="true">calendar_month</span><time datetime="<?= $item['date'] ?>"><?= $item['dateLabel'] ?></time></p><h3><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h3><p class="news-card-summary"><?= htmlspecialchars($item['summary'], ENT_QUOTES, 'UTF-8') ?></p><button class="news-read-more" type="button" data-news-id="<?= $item['id'] ?>">อ่านเพิ่มเติม <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></button></div>
            </article>
          <?php endforeach; ?>
        </div>
        <div class="news-empty" id="news-empty" hidden><span class="material-symbols-rounded" aria-hidden="true">search_off</span><h3>ไม่พบข่าวที่ตรงกับตัวกรอง</h3><p>ลองเปลี่ยนคำค้นหาหรือเลือกตัวกรองอื่น</p></div>
        <nav class="news-pagination" id="news-pagination" aria-label="หน้ารายการข่าว"><p id="news-page-status"></p><div class="news-page-buttons" id="news-page-buttons"></div></nav>
      </section>

      <section class="news-social" aria-labelledby="news-social-title">
        <div class="news-social-copy"><p class="news-social-eyebrow"><span class="material-symbols-rounded" aria-hidden="true">notifications_active</span> ติดตามข่าวสารของหน่วยงาน</p><h2 id="news-social-title">ติดตามข้อมูลข่าวสารเพิ่มเติม</h2><p>ช่องทาง Facebook และ LINE Official อยู่ระหว่างรอการยืนยัน URL ทางการจากหน่วยงาน</p></div>
        <div class="news-social-channels"><div class="news-social-channel"><img src="assets/contact/Facebook%20logo.png" alt=""><span><strong>Facebook</strong><small>รอ URL ทางการ</small></span></div><div class="news-social-channel"><img src="assets/contact/Line%20OA%20logo.png" alt=""><span><strong>LINE Official</strong><small>รอ URL ทางการ</small></span></div></div>
      </section>
      <p class="news-prototype-note">หมายเหตุ: ข่าวและรายละเอียดทั้งหมดในหน้านี้เป็นข้อมูลจำลองเพื่อออกแบบและทดสอบต้นแบบเท่านั้น ไม่ใช่ข่าวหรือประกาศจากหน่วยงาน</p>
      <dialog class="news-dialog" id="news-dialog" aria-labelledby="news-dialog-title"><form method="dialog"><button class="news-dialog-close" aria-label="ปิดรายละเอียด"><span class="material-symbols-rounded" aria-hidden="true">close</span></button></form><div id="news-dialog-content"></div></dialog>
      <script>window.newsData = <?= json_encode(array_column(array_merge([$featuredNews], $newsItems), null, 'id'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;</script>
      </div>
    </main>
    <?php require __DIR__ . '/partials/footer.php'; ?>
  </body>
</html>
