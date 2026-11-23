    <!-- ส่วนที่ 1: แถบข้อมูลหน่วยงาน ประกาศ และเมนูนำทาง -->
    <!-- หน้าที่: แสดงช่องทางติดต่อ ข่าวประกาศ โลโก้ และทางลัดไปยังเนื้อหาหลัก -->
    <header class="site-header" id="top">
      <!-- แถบข้อมูลหน่วยงานและหมายเลขโทรศัพท์ -->
      <div class="utility-bar">
        <div class="container utility-inner">
          <!-- แถบเครื่องมือช่วยการเข้าถึงเว็บไซต์ -->
          <div class="accessibility-tools" role="group" aria-label="เครื่องมือช่วยการเข้าถึงเว็บไซต์">
            <button id="font-decrease" type="button" aria-label="ลดขนาดตัวอักษร">A−</button>
            <button id="font-reset" type="button" aria-label="คืนค่าขนาดตัวอักษรปกติ" aria-pressed="true">A</button>
            <button id="font-increase" type="button" aria-label="เพิ่มขนาดตัวอักษร">A+</button>
            <button id="contrast-toggle" type="button" aria-label="เปิดโหมดสีความเปรียบต่างสูง" aria-pressed="false"><span class="material-symbols-rounded" aria-hidden="true">contrast</span></button>
          </div>
          <div class="utility-contact">
            <a class="utility-phone" href="tel:055983230"><span class="material-symbols-rounded" aria-hidden="true">call</span> 055-983230</a>
            <!-- ช่องทางสังคมจะแสดงเป็นลิงก์เมื่อมีการกำหนด URL ทางการใน js/main.js -->
            <div class="top-social" role="group" aria-label="ช่องทางสังคม รอยืนยัน URL ทางการ">
              <span class="social-channel" data-social-channel="facebook"><img src="assets/contact/Facebook%20logo.png" alt=""><span>Facebook</span><small>รอ URL ทางการ</small></span>
              <span class="social-channel" data-social-channel="line"><img src="assets/contact/Line%20OA%20logo.png" alt=""><span>LINE Official</span><small>รอ URL ทางการ</small></span>
            </div>
          </div>
        </div>
      </div>
      <!-- แถบประกาศพร้อมทางลัดไปยังข่าวสาร -->
      <div class="announcement-bar">
        <div class="container announcement-inner">
          <p><span class="material-symbols-rounded" aria-hidden="true">campaign</span><strong>ประกาศสำคัญ</strong> ติดตามข่าวสารและประกาศการให้บริการประปาจากกองการประปา</p>
          <a href="#news" aria-label="อ่านประกาศเพิ่มเติม"><span class="announcement-link-long">อ่านข่าวประกาศ</span><span class="announcement-link-short">อ่านต่อ</span><span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a>
        </div>
      </div>
      <!-- ส่วนหัวหลักและเมนูนำทาง -->
      <div class="nav-wrap">
        <div class="container nav-inner">
          <a class="brand" href="#top" aria-label="กองการประปา เทศบาลนครพิษณุโลก - หน้าแรก">
            <img src="assets/logos/PMWA.jpg" alt="ตราสัญลักษณ์กองการประปา เทศบาลนครพิษณุโลก">
            <span class="brand-name"><strong>กองการประปา</strong><span>เทศบาลนครพิษณุโลก</span></span>
          </a>
          <!-- ค้นหาจากเนื้อหาบนหน้าเว็บที่มีอยู่เท่านั้น -->
          <form class="header-search" id="site-search" role="search">
            <label class="visually-hidden" for="site-search-input">ค้นหาบริการหรือประกาศ</label>
            <input id="site-search-input" name="q" type="search" placeholder="ค้นหาบริการหรือประกาศ..." autocomplete="off">
            <button type="submit" aria-label="ค้นหาในหน้านี้"><span class="material-symbols-rounded" aria-hidden="true">search</span></button>
          </form>
          <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" aria-label="เปิดเมนูนำทาง">
            <span class="material-symbols-rounded" aria-hidden="true">menu</span>
          </button>
          <nav class="primary-nav" id="primary-navigation" aria-label="เมนูหลัก">
            <a class="nav-link is-current" href="#top" aria-current="page">หน้าแรก</a>
            <a class="nav-link" href="#services">บริการประชาชน</a>
            <a class="nav-link" href="#information">ข้อมูลเผยแพร่</a>
            <button class="nav-link procurement-toggle" id="procurement-toggle" type="button" aria-expanded="false" aria-controls="procurement-status">จัดซื้อจัดจ้าง <span class="material-symbols-rounded" aria-hidden="true">arrow_drop_down</span></button>
            <a class="nav-link" href="#about">เกี่ยวกับเรา</a>
            <a class="nav-link" href="#contact">ติดต่อเรา</a>
          </nav>
          <p class="nav-pending" id="procurement-status" role="status" hidden>ข้อมูลจัดซื้อจัดจ้างยังไม่เชื่อมต่อในต้นแบบ</p>
          <div class="search-results" id="search-results" aria-live="polite" hidden>
            <p id="search-results-status"></p>
            <ul id="search-result-list"></ul>
          </div>
        </div>
      </div>
    </header>
    <!-- สิ้นสุดส่วนหัวเว็บไซต์ -->
