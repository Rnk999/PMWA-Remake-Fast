<?php
$activePage = 'documents';
?>
<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#173f70">
    <meta name="description" content="ค้นหาแบบฟอร์มและเอกสารเผยแพร่ ตัวอย่างต้นแบบเว็บไซต์กองการประปาเทศบาลนครพิษณุโลก">
    <title>แบบฟอร์มและเอกสารเผยแพร่ — กองการประปา เทศบาลนครพิษณุโลก</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+Thai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,400,0,0" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/documents.css">
    <script src="js/main.js" defer></script>
    <script src="js/documents.js" defer></script>
  </head>
  <body>
    <a class="skip-link" href="#main-content">ข้ามไปยังเนื้อหาหลัก</a>
    <?php require __DIR__ . '/partials/header.php'; ?>
    <?php require __DIR__ . '/partials/breadcrumb.php'; ?>
    <main id="main-content" class="documents-page container">
      <header class="documents-intro">
        <div class="documents-intro-row">
          <div>
            <p class="documents-eyebrow"><span class="material-symbols-rounded" aria-hidden="true">folder_open</span> ศูนย์รวมข้อมูลและเอกสาร</p>
            <h1 id="documents-title">แบบฟอร์มและเอกสารเผยแพร่</h1>
            <p class="documents-subtitle" lang="en">Forms &amp; Published Documents</p>
            <p class="documents-lead">ค้นหาแบบฟอร์มสำหรับประชาชน คู่มือ และเอกสารเผยแพร่ได้จากจุดเดียว พร้อมตรวจสอบประเภทเอกสารก่อนเลือกดู</p>
          </div>
          <aside class="documents-notice" aria-label="คำชี้แจงข้อมูลตัวอย่าง">
            <span class="material-symbols-rounded" aria-hidden="true">info</span>
            <p><strong>ข้อมูลตัวอย่างสำหรับต้นแบบ</strong><span>รายการในหน้านี้เป็นข้อมูลจำลอง และยังไม่มีไฟล์เอกสารจริงแนบ</span></p>
          </aside>
        </div>
      </header>

      <section class="documents-filter-panel" aria-label="ค้นหาและกรองเอกสาร">
        <div class="documents-filter-row">
          <label class="documents-search" for="documents-search">
            <span class="material-symbols-rounded" aria-hidden="true">search</span>
            <input id="documents-search" type="search" placeholder="ค้นหาชื่อเอกสารหรือคำสำคัญ" autocomplete="off">
            <button id="documents-search-clear" type="button" aria-label="ล้างคำค้นหา" hidden><span class="material-symbols-rounded" aria-hidden="true">close</span></button>
          </label>
          <label class="filter-select"><span>หมวดหมู่</span>
            <select id="documents-category"><option value="">ทุกหมวดหมู่</option><option value="แบบฟอร์ม">แบบฟอร์ม</option><option value="คู่มือและแนวทาง">คู่มือและแนวทาง</option><option value="แผนงานและรายงาน">แผนงานและรายงาน</option><option value="ข้อมูลทั่วไป">ข้อมูลทั่วไป</option></select>
          </label>
          <label class="filter-select"><span>รูปแบบไฟล์</span>
            <select id="documents-format"><option value="">ทุกประเภทไฟล์</option><option value="PDF">PDF</option><option value="DOCX">DOCX</option><option value="XLSX">XLSX</option></select>
          </label>
          <button class="documents-reset" id="documents-reset" type="button"><span class="material-symbols-rounded" aria-hidden="true">restart_alt</span> ล้างตัวกรอง</button>
        </div>
        <p class="documents-filter-status" id="documents-filter-status" aria-live="polite"></p>
      </section>

      <section class="documents-results" aria-labelledby="documents-results-title">
        <div class="documents-results-heading">
          <div><p class="documents-section-eyebrow">รายการเอกสาร</p><h2 id="documents-results-title">ค้นหาเอกสารเผยแพร่</h2></div>
          <span class="documents-count" id="documents-count"></span>
        </div>
        <section class="documents-group" id="forms-group" aria-labelledby="forms-heading">
          <div class="documents-group-heading"><span class="documents-group-icon"><span class="material-symbols-rounded" aria-hidden="true">description</span></span><div><h3 id="forms-heading">แบบฟอร์มสำหรับประชาชน</h3><p>แบบฟอร์มตัวอย่างสำหรับการติดต่อและขอรับบริการ</p></div><span class="documents-group-count" id="forms-count"></span></div>
          <div class="documents-list" id="forms-list"></div>
        </section>
        <section class="documents-group" id="publications-group" aria-labelledby="publications-heading">
          <div class="documents-group-heading"><span class="documents-group-icon documents-group-icon-soft"><span class="material-symbols-rounded" aria-hidden="true">library_books</span></span><div><h3 id="publications-heading">เอกสารเผยแพร่</h3><p>คู่มือ รายงาน และข้อมูลตัวอย่างสำหรับประชาชน</p></div><span class="documents-group-count" id="publications-count"></span></div>
          <div class="documents-list" id="publications-list"></div>
        </section>
        <div class="documents-empty" id="documents-empty" hidden>
          <span class="material-symbols-rounded" aria-hidden="true">search_off</span><h3>ไม่พบเอกสารที่ตรงกับการค้นหา</h3><p>ลองเปลี่ยนคำค้นหาหรือปรับตัวกรอง แล้วค้นหาอีกครั้ง</p><button class="documents-reset" id="documents-empty-reset" type="button">ล้างตัวกรอง</button>
        </div>
        <nav class="documents-pagination" id="documents-pagination" aria-label="หน้าเอกสาร">
          <p id="documents-page-status"></p><div class="documents-page-buttons" id="documents-page-buttons"></div>
        </nav>
      </section>
      <p class="documents-prototype-note"><span class="material-symbols-rounded" aria-hidden="true">info</span> ต้นแบบส่วนติดต่อผู้ใช้: รายการและรูปแบบไฟล์เป็นข้อมูลจำลอง ไม่มีเอกสารราชการหรือไฟล์ดาวน์โหลดจริง</p>
    </main>
    <?php require __DIR__ . '/partials/footer.php'; ?>
  </body>
</html>
