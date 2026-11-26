    <!-- ส่วนที่ 1: แถบข้อมูลหน่วยงาน ประกาศ และเมนูนำทาง -->
    <!-- หน้าที่: แสดงช่องทางติดต่อ ข่าวประกาศ โลโก้ และทางลัดไปยังเนื้อหาหลัก -->
    <?php
      // กำหนดหน้าปัจจุบันสำหรับ nav active state ถ้ายังไม่ได้กำหนดจากหน้าที่เรียกใช้
      if (!isset($activePage)) $activePage = 'home';
      $isHome = ($activePage === 'home');
      $homeHref = $isHome ? '#top' : 'index.php';
      $newsHref = 'news.php';
      $aboutHref = $isHome ? '#about' : 'index.php#about';
      $contactHref = $isHome ? '#contact' : 'index.php#contact';
    ?>
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
          <a href="<?php echo $newsHref; ?>" aria-label="อ่านประกาศเพิ่มเติม"><span class="announcement-link-long">อ่านข่าวประกาศ</span><span class="announcement-link-short">อ่านต่อ</span><span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a>
        </div>
      </div>
      <!-- ส่วนหัวหลักและเมนูนำทาง -->
      <div class="nav-wrap">
        <div class="container nav-inner">
          <a class="brand" href="<?php echo $homeHref; ?>" aria-label="กองการประปา เทศบาลนครพิษณุโลก - หน้าแรก">
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
            <a class="nav-link<?php echo $isHome ? ' is-current' : ''; ?>" href="<?php echo $homeHref; ?>"<?php echo $isHome ? ' aria-current="page"' : ''; ?>>หน้าแรก</a>
            <div class="nav-dropdown" id="services-dropdown">
              <button class="nav-link dropdown-toggle<?php echo in_array($activePage, ['citizen-guide', 'faqs'], true) ? ' is-current' : ''; ?>" id="services-toggle" type="button" aria-expanded="false" aria-haspopup="true" aria-controls="services-menu">
                บริการ <span class="material-symbols-rounded" aria-hidden="true">arrow_drop_down</span>
              </button>
              <div class="dropdown-menu" id="services-menu" role="menu" aria-labelledby="services-toggle" hidden>
                <a class="dropdown-item" href="https://eservice.phsmun.go.th/" target="_blank" rel="noopener noreferrer" role="menuitem">
                  <span class="material-symbols-rounded" aria-hidden="true">open_in_new</span>
                  <span>E-Service (บริการออนไลน์)</span>
                </a>
                <a class="dropdown-item<?php echo ($activePage === 'citizen-guide') ? ' is-active' : ''; ?>" href="citizen-guide.php" role="menuitem"<?php echo ($activePage === 'citizen-guide') ? ' aria-current="page"' : ''; ?>>
                  <span class="material-symbols-rounded" aria-hidden="true">menu_book</span>
                  <span>คู่มือประชาชน</span>
                </a>
                <a class="dropdown-item<?php echo ($activePage === 'faqs') ? ' is-active' : ''; ?>" href="faqs.php" role="menuitem"<?php echo ($activePage === 'faqs') ? ' aria-current="page"' : ''; ?>>
                  <span class="material-symbols-rounded" aria-hidden="true">quiz</span>
                  <span>คำถามที่พบบ่อย</span>
                </a>
              </div>
            </div>
            <div class="nav-dropdown" id="information-dropdown">
              <button class="nav-link dropdown-toggle<?php echo in_array($activePage, ['announcements', 'news', 'documents', 'open-data'], true) ? ' is-current' : ''; ?>" id="information-toggle" type="button" aria-expanded="false" aria-haspopup="true" aria-controls="information-menu">
                ข้อมูลเผยแพร่ <span class="material-symbols-rounded" aria-hidden="true">arrow_drop_down</span>
              </button>
              <div class="dropdown-menu" id="information-menu" role="menu" aria-labelledby="information-toggle" hidden>
                <a class="dropdown-item<?php echo ($activePage === 'announcements') ? ' is-active' : ''; ?>" href="announcements.php" role="menuitem"<?php echo ($activePage === 'announcements') ? ' aria-current="page"' : ''; ?>><span class="material-symbols-rounded" aria-hidden="true">campaign</span><span>ประกาศด่วนและแจ้งเหตุ</span></a>
                <a class="dropdown-item<?php echo ($activePage === 'news') ? ' is-active' : ''; ?>" href="<?php echo $newsHref; ?>" role="menuitem"<?php echo ($activePage === 'news') ? ' aria-current="page"' : ''; ?>><span class="material-symbols-rounded" aria-hidden="true">newspaper</span><span>ข่าวประชาสัมพันธ์</span></a>
                <a class="dropdown-item<?php echo ($activePage === 'documents') ? ' is-active' : ''; ?>" href="documents.php" role="menuitem"<?php echo ($activePage === 'documents') ? ' aria-current="page"' : ''; ?>><span class="material-symbols-rounded" aria-hidden="true">folder_open</span><span>แบบฟอร์มและเอกสารเผยแพร่</span></a>
                <a class="dropdown-item<?php echo ($activePage === 'open-data') ? ' is-active' : ''; ?>" href="open-data.php" role="menuitem"<?php echo ($activePage === 'open-data') ? ' aria-current="page"' : ''; ?>><span class="material-symbols-rounded" aria-hidden="true">database</span><span lang="en">Open Data</span></a>
              </div>
            </div>
            <a class="nav-link<?php echo ($activePage === 'procurement') ? ' is-current' : ''; ?>" href="procurement.php"<?php echo ($activePage === 'procurement') ? ' aria-current="page"' : ''; ?>>จัดซื้อจัดจ้าง</a>
            <a class="nav-link" href="<?php echo $aboutHref; ?>">เกี่ยวกับเรา</a>
            <a class="nav-link" href="<?php echo $contactHref; ?>">ติดต่อเรา</a>
          </nav>
          <div class="search-results" id="search-results" aria-live="polite" hidden>
            <p id="search-results-status"></p>
            <ul id="search-result-list"></ul>
          </div>
        </div>
      </div>
    </header>
    <!-- สิ้นสุดส่วนหัวเว็บไซต์ -->
