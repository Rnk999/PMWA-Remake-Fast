<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#173f70">
    <meta name="description" content="คำถามที่พบบ่อยเกี่ยวกับบริการประปา แยกหมวดหมู่และค้นหาคำตอบได้สะดวก">
    <title>คำถามที่พบบ่อย — กองการประปา เทศบาลนครพิษณุโลก</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+Thai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,400,0,0" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/logos/กองการประปา%20logo.PNG">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/main.js" defer></script>
  </head>
  <body>
    <a class="skip-link" href="#main-content">ข้ามไปยังเนื้อหาหลัก</a>

    <?php
      $activePage = 'faqs';
      require __DIR__ . '/partials/header.php';
    ?>

    <main id="main-content" class="faqs-page">
      <div class="subpage-breadcrumb">
        <div class="container faq-breadcrumb-inner">
          <nav aria-label="เส้นทางนำทาง">
            <ol class="breadcrumb">
              <li><a href="index.php"><span class="material-symbols-rounded" aria-hidden="true">home</span> หน้าแรก</a></li>
              <li><span>บริการ</span></li>
              <li aria-current="page">คำถามที่พบบ่อย (FAQs)</li>
            </ol>
          </nav>
          <span class="faq-breadcrumb-badge"><span class="material-symbols-rounded" aria-hidden="true">support_agent</span> ศูนย์ช่วยเหลือประชาชน</span>
        </div>
      </div>

      <section class="faq-hero" aria-labelledby="faq-title">
        <div class="container faq-hero-inner">
          <div>
            <p class="section-kicker"><span class="status-dot"></span> คำถามจากบริการสาธารณะ</p>
            <h1 id="faq-title">คำถามที่พบบ่อย (FAQs)</h1>
            <p class="faq-hero-desc">รวมคำถามตัวอย่างเกี่ยวกับการใช้น้ำประปา การขอติดตั้ง การชำระเงิน และการแจ้งเหตุ เพื่อช่วยค้นหาหัวข้อที่ต้องการได้สะดวก</p>
          </div>
          <div class="faq-hero-stats" aria-label="ข้อมูลคำถาม">
            <div class="faq-stat-card"><span class="faq-stat-icon"><span class="material-symbols-rounded" aria-hidden="true">quiz</span></span><p><strong data-faq-total>8</strong><span>คำถามตัวอย่าง</span></p></div>
            <div class="faq-stat-card"><span class="faq-stat-icon"><span class="material-symbols-rounded" aria-hidden="true">info</span></span><p><strong>ข้อมูลตัวอย่าง</strong><span>รอยืนยันจากหน่วยงาน</span></p></div>
          </div>
        </div>
      </section>

      <div class="page-content faq-content">
        <section class="container faq-search-panel" aria-label="ค้นหาและกรองคำถาม">
          <div class="faq-search-field">
            <span class="material-symbols-rounded" aria-hidden="true">search</span>
            <label class="visually-hidden" for="faq-search">ค้นหาคำถามที่พบบ่อย</label>
            <input id="faq-search" type="search" placeholder="ค้นหาข้อสงสัย เช่น ขอติดตั้งมิเตอร์, ค่าน้ำประปา, ท่อแตก..." autocomplete="off" aria-controls="faq-list">
            <button class="faq-search-clear" type="button" id="faq-search-clear" aria-label="ล้างคำค้นหา" hidden><span class="material-symbols-rounded" aria-hidden="true">close</span></button>
          </div>
          <div class="faq-category-filters" role="group" aria-label="กรองตามหมวดหมู่">
            <button type="button" class="faq-filter is-active" data-faq-category="all" aria-pressed="true">ทั้งหมด (All)</button>
            <button type="button" class="faq-filter" data-faq-category="installation" aria-pressed="false">การขอใช้น้ำและติดตั้ง</button>
            <button type="button" class="faq-filter" data-faq-category="billing" aria-pressed="false">การชำระค่าน้ำและบิล</button>
            <button type="button" class="faq-filter" data-faq-category="emergency" aria-pressed="false">ท่อแตก รั่ว และเหตุฉุกเฉิน</button>
            <button type="button" class="faq-filter" data-faq-category="quality" aria-pressed="false">คุณภาพและแรงดันน้ำ</button>
            <button type="button" class="faq-filter" data-faq-category="documents" aria-pressed="false">การโอนสิทธิ์และเอกสาร</button>
          </div>
        </section>

        <div class="container faq-layout">
          <section class="faq-results-column" aria-label="รายการคำถามที่พบบ่อย">
            <p class="faq-results-status" id="faq-results-status" role="status" aria-live="polite">แสดงคำถามตัวอย่าง 8 รายการ</p>
            <div class="faq-list" id="faq-list">
              <details class="faq-item" data-faq-item data-faq-category="installation" id="faq-1">
                <summary><span class="faq-item-heading"><span class="faq-category-tag tag-installation"><span class="material-symbols-rounded" aria-hidden="true">water_drop</span> การขอใช้น้ำและติดตั้ง</span><span class="faq-number">ข้อที่ 1</span><span class="faq-question">ขั้นตอนการขอติดตั้งมาตรวัดน้ำประปาใหม่สำหรับบ้านพักอาศัยต้องเตรียมเอกสารอะไรบ้าง?</span></span><span class="faq-chevron material-symbols-rounded" aria-hidden="true">expand_more</span></summary>
                <div class="faq-answer"><p><strong>คำตอบตัวอย่าง:</strong> รายการเอกสารและขั้นตอนยังรอข้อมูลยืนยันจากหน่วยงาน โปรดตรวจสอบข้อมูลล่าสุดกับกองการประปาก่อนยื่นคำขอ</p><a href="citizen-guide.php" class="faq-answer-link">ดูหัวข้อการขอใช้น้ำในคู่มือประชาชน <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></div>
              </details>
              <details class="faq-item" data-faq-item data-faq-category="billing" id="faq-2">
                <summary><span class="faq-item-heading"><span class="faq-category-tag tag-billing"><span class="material-symbols-rounded" aria-hidden="true">payments</span> การชำระค่าน้ำและบิล</span><span class="faq-number">ข้อที่ 2</span><span class="faq-question">ชำระค่าน้ำประปาเกินกำหนดชำระ (เลย Due Date) สามารถจ่ายผ่านช่องทางใดได้บ้าง?</span></span><span class="faq-chevron material-symbols-rounded" aria-hidden="true">expand_more</span></summary>
                <div class="faq-answer"><p><strong>คำตอบตัวอย่าง:</strong> ช่องทางชำระและเงื่อนไขหลังวันครบกำหนดยังไม่มีข้อมูลยืนยันในต้นแบบ โปรดตรวจสอบจากใบแจ้งค่าน้ำหรือช่องทางทางการของหน่วยงาน</p><a href="citizen-guide.php" class="faq-answer-link">ดูหัวข้อการชำระเงินในคู่มือประชาชน <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></div>
              </details>
              <details class="faq-item" data-faq-item data-faq-category="emergency" id="faq-3">
                <summary><span class="faq-item-heading"><span class="faq-category-tag tag-emergency"><span class="material-symbols-rounded" aria-hidden="true">emergency</span> ท่อแตก รั่ว และเหตุฉุกเฉิน</span><span class="faq-number">ข้อที่ 3</span><span class="faq-question">กรณีพบเห็นท่อประปาแตก รั่ว หรือน้ำไม่ไหลในพื้นที่ สามารถแจ้งได้ทางใดและมีขั้นตอนอย่างไร?</span></span><span class="faq-chevron material-symbols-rounded" aria-hidden="true">expand_more</span></summary>
                <div class="faq-answer"><p><strong>คำตอบตัวอย่าง:</strong> ช่องทางและขั้นตอนการแจ้งเหตุยังรอการยืนยันจากหน่วยงาน สามารถดูช่องทางติดต่อที่เว็บไซต์แสดงไว้ได้ที่ด้านล่างของหน้า</p><a href="index.php#contact" class="faq-answer-link">ไปยังข้อมูลติดต่อ <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></div>
              </details>
              <details class="faq-item" data-faq-item data-faq-category="documents" id="faq-4">
                <summary><span class="faq-item-heading"><span class="faq-category-tag tag-documents"><span class="material-symbols-rounded" aria-hidden="true">assignment_ind</span> การโอนสิทธิ์และเอกสาร</span><span class="faq-number">ข้อที่ 4</span><span class="faq-question">หากต้องการเปลี่ยนชื่อผู้ใช้น้ำประปา (โอนกรรมสิทธิ์) มีค่าธรรมเนียมหรือไม่ และต้องทำอย่างไร?</span></span><span class="faq-chevron material-symbols-rounded" aria-hidden="true">expand_more</span></summary>
                <div class="faq-answer"><p><strong>คำตอบตัวอย่าง:</strong> เอกสาร ขั้นตอน และค่าธรรมเนียมสำหรับการเปลี่ยนชื่อยังไม่มีข้อมูลทางการในต้นแบบ โปรดสอบถามหน่วยงานก่อนดำเนินการ</p><a href="citizen-guide.php" class="faq-answer-link">ดูหัวข้อเอกสารในคู่มือประชาชน <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></div>
              </details>
              <details class="faq-item" data-faq-item data-faq-category="quality" id="faq-5">
                <summary><span class="faq-item-heading"><span class="faq-category-tag tag-quality"><span class="material-symbols-rounded" aria-hidden="true">science</span> คุณภาพและแรงดันน้ำ</span><span class="faq-number">ข้อที่ 5</span><span class="faq-question">ทำไมน้ำประปามีสีขุ่นหรือตะกอนบางช่วงเวลา และมีวิธีแก้ไขเบื้องต้นอย่างไร?</span></span><span class="faq-chevron material-symbols-rounded" aria-hidden="true">expand_more</span></summary>
                <div class="faq-answer"><p><strong>คำตอบตัวอย่าง:</strong> สาเหตุและแนวทางแก้ไขขึ้นอยู่กับสถานการณ์จริง ข้อมูลในหน้านี้ยังไม่ใช่คำแนะนำทางการ โปรดติดตามประกาศหรือสอบถามหน่วยงาน</p><a href="index.php#water-status" class="faq-answer-link">ดูข้อมูลสถานะน้ำบนเว็บไซต์ <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></div>
              </details>
              <details class="faq-item" data-faq-item data-faq-category="installation" id="faq-6">
                <summary><span class="faq-item-heading"><span class="faq-category-tag tag-installation"><span class="material-symbols-rounded" aria-hidden="true">water</span> การขอใช้น้ำและติดตั้ง</span><span class="faq-number">ข้อที่ 6</span><span class="faq-question">มิเตอร์น้ำหมุนเร็วผิดปกติ ทั้งที่ไม่ได้เปิดใช้น้ำ เป็นเพราะอะไร และตรวจสอบได้อย่างไร?</span></span><span class="faq-chevron material-symbols-rounded" aria-hidden="true">expand_more</span></summary>
                <div class="faq-answer"><p><strong>คำตอบตัวอย่าง:</strong> วิธีตรวจสอบและการขอตรวจมาตรวัดต้องอ้างอิงข้อมูลจากหน่วยงาน เนื้อหานี้ยังรอการยืนยัน กรุณาติดต่อหน่วยงานเพื่อรับคำแนะนำที่ตรงกับกรณี</p><a href="citizen-guide.php" class="faq-answer-link">ดูหัวข้อการตรวจสอบมาตรวัด <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></div>
              </details>
              <details class="faq-item" data-faq-item data-faq-category="billing" id="faq-7">
                <summary><span class="faq-item-heading"><span class="faq-category-tag tag-billing"><span class="material-symbols-rounded" aria-hidden="true">receipt_long</span> การชำระค่าน้ำและบิล</span><span class="faq-number">ข้อที่ 7</span><span class="faq-question">ประชาชนสามารถขอหนังสือรับรองการชำระเงินหรือใบเสร็จย้อนหลังได้อย่างไร?</span></span><span class="faq-chevron material-symbols-rounded" aria-hidden="true">expand_more</span></summary>
                <div class="faq-answer"><p><strong>คำตอบตัวอย่าง:</strong> ขั้นตอนการขอเอกสารย้อนหลังยังรอข้อมูลยืนยันจากหน่วยงาน โปรดสอบถามหน่วยงานเกี่ยวกับเอกสารและช่องทางที่รองรับ</p><a href="citizen-guide.php" class="faq-answer-link">ดูหัวข้อเอกสารในคู่มือประชาชน <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></div>
              </details>
              <details class="faq-item" data-faq-item data-faq-category="billing" id="faq-8">
                <summary><span class="faq-item-heading"><span class="faq-category-tag tag-billing"><span class="material-symbols-rounded" aria-hidden="true">calculate</span> การชำระค่าน้ำและบิล</span><span class="faq-number">ข้อที่ 8</span><span class="faq-question">อัตราค่าน้ำประปาของเทศบาลนครพิษณุโลกคิดคำนวณอย่างไร?</span></span><span class="faq-chevron material-symbols-rounded" aria-hidden="true">expand_more</span></summary>
                <div class="faq-answer"><p><strong>คำตอบตัวอย่าง:</strong> อัตราและวิธีคำนวณค่าน้ำต้องตรวจสอบจากประกาศหรือใบแจ้งค่าน้ำฉบับปัจจุบัน เนื้อหาอัตราค่าบริการในหน้านี้รอข้อมูลทางการ</p><a href="citizen-guide.php" class="faq-answer-link">ดูข้อมูลบริการประชาชน <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></div>
              </details>
            </div>

            <div class="faq-empty-state" id="faq-empty-state" hidden>
              <span class="material-symbols-rounded" aria-hidden="true">search_off</span>
              <h2>ไม่พบคำถามที่ตรงกัน</h2>
              <p>ลองใช้คำค้นหาอื่น หรือเลือกหมวดหมู่ทั้งหมด</p>
              <button class="button button-muted" type="button" id="faq-reset-filters">ล้างตัวกรอง</button>
            </div>
          </section>

          <aside class="faq-sidebar" aria-label="บริการและข้อมูลเพิ่มเติม">
            <section class="faq-online-card">
              <div class="faq-sidebar-heading"><span class="faq-sidebar-icon"><span class="material-symbols-rounded" aria-hidden="true">devices</span></span><span>บริการประชาชนออนไลน์</span></div>
              <h2>ต้องการทำรายการ?</h2>
              <p>เข้าสู่ระบบ E-Service ของเทศบาลเพื่อดูบริการออนไลน์ที่เปิดให้ใช้งาน</p>
              <a href="https://eservice.phsmun.go.th/" target="_blank" rel="noopener noreferrer">เข้าสู่ระบบ E-Service <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a>
            </section>
            <section class="faq-sidebar-card">
              <div class="faq-sidebar-card-title"><span class="material-symbols-rounded" aria-hidden="true">menu_book</span><h2>คู่มือและข้อมูลบริการ</h2></div>
              <a class="faq-resource-link" href="citizen-guide.php"><span class="faq-resource-icon"><span class="material-symbols-rounded" aria-hidden="true">library_books</span></span><span><strong>คู่มือประชาชน</strong><small>หัวข้อบริการและข้อมูลประกอบ</small></span><span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a>
              <p class="faq-sample-note"><span class="material-symbols-rounded" aria-hidden="true">info</span> คำถามและคำตอบในหน้านี้เป็นข้อมูลตัวอย่าง รอการตรวจสอบและยืนยันจากหน่วยงาน</p>
            </section>
          </aside>
        </div>
      </div>

      <section class="faq-contact-section" aria-labelledby="faq-contact-title">
        <div class="container faq-contact-card">
          <div class="faq-contact-copy">
            <p class="section-kicker"><span class="material-symbols-rounded" aria-hidden="true">support_agent</span> เจ้าหน้าที่พร้อมช่วยเหลือคุณ</p>
            <h2 id="faq-contact-title">ยังหาคำตอบที่ต้องการไม่พบใช่หรือไม่?</h2>
            <p>ตรวจสอบช่องทางติดต่อและข้อมูลที่หน่วยงานเผยแพร่ไว้บนเว็บไซต์ เพื่อขอคำแนะนำเพิ่มเติม</p>
          </div>
          <a class="button button-primary" href="index.php#contact"><span class="material-symbols-rounded" aria-hidden="true">contact_support</span> ไปยังหน้าติดต่อเรา</a>
        </div>
      </section>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>
  </body>
</html>
