<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#173f70">
    <meta name="description" content="ข้อมูลข่าวสารและบริการประชาชนของกองการประปา เทศบาลนครพิษณุโลก">
    <title>กองการประปา เทศบาลนครพิษณุโลก</title>
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

    <?php require __DIR__ . '/partials/header.php'; ?>

    <main id="main-content">
      <!-- ส่วนที่ 2: ภาพหลักและทางลัดบริการด่วน -->
      <!-- หน้าที่: แนะนำภารกิจของหน่วยงานและนำไปยังบริการหรือติดต่อทางโทรศัพท์ -->
      <section class="hero" aria-labelledby="hero-title">
        <div class="hero-shade"></div>
        <div class="container hero-content">
          <p class="eyebrow hero-eyebrow"><span class="status-dot"></span> มาตรฐานน้ำประปาสะอาด ปลอดภัย</p>
          <p class="hero-kicker"><span class="material-symbols-rounded" aria-hidden="true">verified</span> ระบบประปาเพื่อประชาชนเมืองพิษณุโลก</p>
          <h1 id="hero-title">บริการประปา<br>เพื่อคุณภาพชีวิตที่ดีของประชาชน</h1>
          <p class="hero-copy">กองการประปา เทศบาลนครพิษณุโลก พร้อมให้บริการข้อมูล ข่าวสาร และบริการประชาชน เพื่อการเข้าถึงน้ำประปาที่สะอาด ปลอดภัย สะดวก และรวดเร็ว</p>
          <div class="hero-actions">
            <a class="button button-primary" href="#services"><span class="material-symbols-rounded" aria-hidden="true">water_drop</span> บริการประชาชน</a>
            <a class="button button-light" href="tel:055983230"><span class="material-symbols-rounded" aria-hidden="true">call</span> ติดต่อเรา / แจ้งเหตุ</a>
          </div>
          <p class="prototype-note">ข้อมูลสถานะในหน้านี้เป็นตัวอย่างสำหรับต้นแบบเว็บไซต์</p>
        </div>
        <aside class="hero-status" aria-label="ตัวอย่างสถานะบริการ">
          <div class="hero-status-card">
            <span class="icon-box icon-box-blue"><span class="material-symbols-rounded" aria-hidden="true">science</span></span>
            <p><span>ตัวอย่างผลตรวจคุณภาพน้ำ</span><strong>คลอรีนอิสระ 0.2 – 0.5 mg/L</strong></p>
          </div>
          <div class="hero-status-card hero-status-main">
            <span class="icon-box icon-box-pale"><span class="material-symbols-rounded" aria-hidden="true">speed</span></span>
            <p><span>ตัวอย่างอัตราการจ่ายน้ำ</span><strong>64,500 ลบ.ม./วัน</strong></p>
            <span class="status-label">ข้อมูลตัวอย่าง</span>
          </div>
        </aside>
      </section>
      <!-- สิ้นสุดส่วนภาพหลัก -->

      <div class="page-content">
        <!-- ส่วนที่ 6: ข่าวสารและประชาสัมพันธ์ -->
        <!-- หน้าที่: แสดงตัวอย่างรูปแบบข่าวและประกาศของหน่วยงาน -->
        <section class="section news-section" id="news" aria-labelledby="news-title">
          <div class="container">
            <div class="section-heading"><div><p class="section-kicker"><span class="material-symbols-rounded" aria-hidden="true">campaign</span> ข่าวสารอัปเดตล่าสุด</p><h2 id="news-title">ข่าวสารและประชาสัมพันธ์</h2><p>ติดตามข่าวสาร ประกาศการให้บริการ และกิจกรรมของกองการประปา</p></div><span class="section-aside"><span class="status-dot status-dot-red"></span> ข่าวตัวอย่างสำหรับต้นแบบ</span></div>
            <div class="news-grid">
              <article class="card news-feature">
                <div class="news-art news-art-work" role="img" aria-label="ภาพประกอบตัวอย่างข่าว รอภาพข่าวจริงจากหน่วยงาน"><span class="material-symbols-rounded" aria-hidden="true">image</span><span>ภาพข่าวตัวอย่าง</span></div>
                <div class="news-body"><span class="news-tag tag-red">ตัวอย่างรูปแบบข่าว</span><p class="news-meta">ข่าวประชาสัมพันธ์ · รอข้อมูลจริง</p><h3>หัวข้อข่าวประชาสัมพันธ์ตัวอย่าง</h3><p>พื้นที่แสดงรายละเอียดข่าว รอเนื้อหาที่ผ่านการยืนยันจากหน่วยงาน</p></div>
              </article>
              <div class="news-list">
                <article class="card news-item"><span class="news-icon"><span class="material-symbols-rounded" aria-hidden="true">science</span></span><div><p class="news-meta"><span class="news-tag">ข่าวกิจกรรม</span> รอข้อมูลจริง</p><h3>หัวข้อข่าวกิจกรรมตัวอย่าง</h3></div></article>
              <article class="card news-item"><span class="news-icon"><span class="material-symbols-rounded" aria-hidden="true">description</span></span><div><p class="news-meta"><span class="news-tag">จัดซื้อจัดจ้าง</span> รอข้อมูลจริง</p><h3>รายการประกาศจัดซื้อจัดจ้าง</h3><p class="news-pending">ยังไม่มีประกาศหรือเอกสาร TOR ใน Assets</p></div></article>
                <article class="card news-item"><span class="news-icon"><span class="material-symbols-rounded" aria-hidden="true">lightbulb</span></span><div><p class="news-meta"><span class="news-tag tag-green">สาระน่ารู้</span> รอข้อมูลจริง</p><h3>หัวข้อสาระน่ารู้ตัวอย่าง</h3></div></article>
              </div>
            </div>
            <div class="news-more"><a class="button button-muted" href="#news">ดูข่าวทั้งหมด <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></div>
          </div>
        </section>
        <!-- สิ้นสุดส่วนข่าวสาร -->

        <!-- ส่วนที่ 3: สถานะน้ำประปาและสถิติ -->
        <!-- หน้าที่: แสดงตัวอย่างสถานะระบบ คุณภาพน้ำ และสถิติที่ยังไม่เชื่อมต่อข้อมูลจริง -->
        <section class="section status-section" id="water-status" aria-labelledby="status-title">
          <div class="container">
            <div class="section-heading status-heading">
              <div>
                <p class="section-kicker"><span class="material-symbols-rounded" aria-hidden="true">bar_chart</span> ระบบติดตามสถานการณ์น้ำประปา</p>
                <h2 id="status-title">สถานะน้ำประปา</h2>
                <p>รายงานสถานการณ์จ่ายน้ำ สถิติการใช้น้ำ และคุณภาพน้ำประปาในเขตเทศบาลนครพิษณุโลก</p>
              </div>
              <span class="prototype-pill"><span class="status-dot"></span> ข้อมูลตัวอย่างเพื่อแสดงรูปแบบ</span>
            </div>

            <div class="status-grid">
              <article class="card status-card">
                <div class="card-title-row">
                  <span class="icon-box"><span class="material-symbols-rounded" aria-hidden="true">water</span></span>
                  <div><h3>สถานะระบบน้ำประปา</h3><p>ตัวอย่างข้อมูลการจ่ายน้ำ</p></div>
                  <span class="state-chip"><span class="status-dot"></span> ตัวอย่างปกติ</span>
                </div>
                <div class="status-message"><span class="material-symbols-rounded" aria-hidden="true">check_circle</span> ข้อมูลจำลอง: ระบบจ่ายน้ำทำงานตามปกติ</div>
                <dl class="metric-grid">
                  <div><dt>แรงดันน้ำเฉลี่ย</dt><dd>1.8 – 2.2 บาร์</dd><small>ค่าตัวอย่าง</small></div>
                  <div><dt>อัตราการจ่ายน้ำ</dt><dd>42,500</dd><small>ลบ.ม./วัน</small></div>
                  <div><dt>สถานีผลิตน้ำหลัก</dt><dd>3 / 3</dd><small>ข้อมูลตัวอย่าง</small></div>
                </dl>
                <div class="card-footer"><span>ข้อมูลสถานะยังไม่เชื่อมต่อระบบจริง</span><a href="#information">ข้อมูลเผยแพร่ <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></div>
              </article>

              <article class="card status-card">
                <div class="card-title-row">
                  <span class="icon-box"><span class="material-symbols-rounded" aria-hidden="true">biotech</span></span>
                  <div><h3>คุณภาพน้ำประปา</h3><p>ตัวอย่างค่าคุณภาพน้ำ</p></div>
                  <span class="state-chip"><span class="status-dot"></span> ค่าตัวอย่าง</span>
                </div>
                <dl class="quality-grid">
                  <div><dt>ค่าความเป็นกรด-ด่าง (pH)</dt><dd>7.2 <small>(เกณฑ์ 6.5 – 8.5)</small></dd></div>
                  <div><dt>ความขุ่น (Turbidity)</dt><dd>1.1 <small>NTU (เกณฑ์ &lt; 5.0 NTU)</small></dd></div>
                  <div><dt>คลอรีนคงเหลือ</dt><dd>0.35 <small>mg/L (เกณฑ์ 0.2 – 0.5)</small></dd></div>
                  <div><dt>ผลตรวจเชื้อแบคทีเรีย</dt><dd class="good-value">ข้อมูลตัวอย่าง</dd></div>
                </dl>
                <div class="card-footer"><span>ผลวิเคราะห์ตัวอย่างเพื่อประกอบต้นแบบ</span><a href="#information">อ่านข้อมูลเพิ่มเติม <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></div>
              </article>
            </div>

            <article class="card usage-card">
              <div class="card-title-row usage-title-row">
                <span class="icon-box"><span class="material-symbols-rounded" aria-hidden="true">bar_chart</span></span>
                <div><h3>สถิติปริมาณการใช้น้ำประปา</h3><p>ตัวอย่างสถิติประกอบต้นแบบเว็บไซต์</p></div>
                <div class="usage-controls" role="group" aria-label="เลือกช่วงเวลาสถิติ">
                  <button class="period-button is-selected" id="period-monthly" type="button" aria-pressed="true">รายเดือน (Monthly)</button>
                  <button class="period-button" id="period-yearly" type="button" aria-pressed="false">รายปี (Yearly)</button>
                  <label class="visually-hidden" for="usage-year">เลือกปี พ.ศ.</label>
                  <select id="usage-year" aria-label="เลือกปี พ.ศ." aria-controls="usage-chart">
                    <option value="2567">ปี พ.ศ. 2567</option>
                    <option value="2568">ปี พ.ศ. 2568</option>
                    <option value="2569" selected>ปี พ.ศ. 2569</option>
                  </select>
                </div>
              </div>
              <p class="usage-period-status" id="usage-period-status" role="status" aria-live="polite">ข้อมูลจำลองเพื่อประกอบต้นแบบเว็บไซต์ ไม่ใช่สถิติทางการ</p>
              <div class="usage-data" id="usage-data">
                <div class="usage-summary">
                <div><span>ปริมาณการใช้น้ำรวม (ข้อมูลจำลอง)</span><strong><span data-usage-total>—</span> <small>ลบ.ม.</small></strong></div>
                <div><span>แนวโน้มเทียบเดือนก่อน</span><strong class="trend" data-usage-trend>—</strong></div>
                <div><span>ผู้ใช้น้ำที่ลงทะเบียน (ตัวอย่าง)</span><strong>34,812 <small>ราย</small></strong></div>
                </div>
                <div class="chart" id="usage-chart" aria-label="กราฟปริมาณการใช้น้ำประปา ข้อมูลจำลอง">
                </div>
              </div>
              <p class="usage-empty" id="usage-empty" hidden>ยังไม่มีข้อมูลรายปีสำหรับแสดงในต้นแบบ</p>
            </article>
          </div>
        </section>
        <!-- สิ้นสุดส่วนสถานะและสถิติ -->

        <!-- ส่วนที่ 4: บริการประชาชน -->
        <!-- หน้าที่: รวมทางลัดไปยังข้อมูลบริการและช่องทางติดต่อในต้นแบบ -->
        <section class="section" id="services" aria-labelledby="services-title">
          <div class="container">
            <div class="section-heading">
              <div><p class="section-kicker"><span class="material-symbols-rounded" aria-hidden="true">chevron_right</span> หมวดหมู่บริการหลัก</p><h2 id="services-title">บริการประชาชน</h2><p>เข้าถึงบริการและข้อมูลสำคัญได้สะดวก รวดเร็ว</p></div>
              <span class="section-aside">เลือกบริการเพื่อดูข้อมูลเบื้องต้น</span>
            </div>
            <div class="service-grid">
              <article class="card service-card service-urgent"><span class="service-badge">เร่งด่วน</span><span class="icon-box icon-box-red"><span class="material-symbols-rounded" aria-hidden="true">water_pump</span></span><h3>แจ้งปัญหาน้ำประปา</h3><p>ช่องทางติดต่อเพื่อแจ้งเหตุขัดข้องหรือปัญหาเกี่ยวกับระบบประปา</p><a href="tel:055983230">ติดต่อแจ้งเหตุ <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></article>
              <article class="card service-card"><span class="service-badge">ข้อมูลบริการ</span><span class="icon-box"><span class="material-symbols-rounded" aria-hidden="true">humidity_indoor</span></span><h3>ขอใช้น้ำประปา</h3><p>ศึกษาข้อมูลและเอกสารเบื้องต้นสำหรับการขอติดตั้งมาตรวัดน้ำ</p><a href="#information">ดูขั้นตอน <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></article>
              <article class="card service-card"><span class="service-badge">ข้อมูลบริการ</span><span class="icon-box"><span class="material-symbols-rounded" aria-hidden="true">qr_code</span></span><h3>ชำระค่าน้ำประปา</h3><p>ดูช่องทางและข้อมูลการชำระค่าน้ำประปาที่หน่วยงานเผยแพร่</p><a href="#information">ดูข้อมูล <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></article>
              <article class="card service-card"><span class="service-badge">ข้อมูลบริการ</span><span class="icon-box"><span class="material-symbols-rounded" aria-hidden="true">area_chart</span></span><h3>ตรวจสอบข้อมูล</h3><p>ข้อมูลเกี่ยวกับประวัติการใช้น้ำและสถานะการให้บริการ</p><a href="#water-status">ดูสถานะตัวอย่าง <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></article>
              <article class="card service-card"><span class="service-badge">เอกสาร</span><span class="icon-box"><span class="material-symbols-rounded" aria-hidden="true">download</span></span><h3>แบบฟอร์มบริการ</h3><p>รวมข้อมูลเอกสารและแบบฟอร์มที่เกี่ยวข้องกับงานบริการประปา</p><a href="#information">ดูเอกสาร <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></article>
              <article class="card service-card"><span class="service-badge">ติดต่อ</span><span class="icon-box"><span class="material-symbols-rounded" aria-hidden="true">live_help</span></span><h3>ติดต่อเจ้าหน้าที่<h3><p>สอบถามข้อมูลบริการประปากับกองการประปาโดยตรง</p><a href="#contact">ข้อมูลติดต่อ <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></article>
            </div>
            <p class="prototype-disclaimer"><span class="material-symbols-rounded" aria-hidden="true">info</span> บริการบนหน้านี้เป็นข้อมูลต้นแบบ ไม่มีการส่งคำขอหรือทำธุรกรรมออนไลน์</p>
          </div>
        </section>
        <!-- สิ้นสุดส่วนบริการประชาชน -->

        <!-- ส่วนที่ 5: ข้อมูลเผยแพร่ -->
        <!-- หน้าที่: รวบรวมหมวดข้อมูลสาธารณะและแนวทางที่ประชาชนค้นหาได้ -->
        <section class="section information-section" id="information" aria-labelledby="information-title">
          <div class="container">
            <div class="section-heading"><div><p class="section-kicker"><span class="material-symbols-rounded" aria-hidden="true">info</span> สาระน่ารู้และระเบียบปฏิบัติ</p><h2 id="information-title">ข้อมูลเผยแพร่</h2><p>รวมข้อมูลบริการ เอกสารสาธารณะ และแนวทางปฏิบัติสำหรับผู้ใช้น้ำในเขตเทศบาลนครพิษณุโลก</p></div></div>
            <div class="info-grid">
              <article class="card info-card"><span class="icon-box icon-box-muted"><span class="material-symbols-rounded" aria-hidden="true">payments</span></span><h3>อัตราค่าน้ำประปา</h3><p>ข้อมูลอัตราค่าบริการและรายละเอียดที่ประชาชนควรทราบ</p><a href="#contact">สอบถามข้อมูล <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></article>
              <article class="card info-card"><span class="icon-box icon-box-muted"><span class="material-symbols-rounded" aria-hidden="true">account_tree</span></span><h3>ขั้นตอนการให้บริการ</h3><p>แนวทางการขอรับบริการและการติดต่อกองการประปา</p><a href="#services">ดูบริการ <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></article>
              <article class="card info-card"><span class="icon-box icon-box-muted"><span class="material-symbols-rounded" aria-hidden="true">menu_book</span></span><h3>คู่มือประชาชน</h3><p>ข้อมูลเบื้องต้นเกี่ยวกับการใช้น้ำและการดูแลระบบประปา</p><a href="citizen-guide.php">อ่านข่าวสาร <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></article>
              <article class="card info-card"><span class="icon-box icon-box-muted"><span class="material-symbols-rounded" aria-hidden="true">folder_copy</span></span><h3>เอกสารและแบบฟอร์ม</h3><p>พื้นที่สำหรับเผยแพร่ข้อมูลสาธารณะและเอกสารของหน่วยงาน</p><a href="#contact">สอบถามหน่วยงาน <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a></article>
            </div>
          </div>
        </section>
        <!-- สิ้นสุดส่วนข้อมูลเผยแพร่ -->


      </div>
    </main>/

    <?php require __DIR__ . '/partials/footer.php'; ?>
  </body>
</html>
