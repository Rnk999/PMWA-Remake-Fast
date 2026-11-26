    <!-- ส่วนที่ 7: ข้อมูลหน่วยงาน ช่องทางติดต่อ และลิงก์ท้ายเว็บไซต์ -->
    <!-- หน้าที่: ให้ข้อมูลติดต่อและทางลัดไปยังหมวดต่าง ๆ ของเว็บไซต์ -->
    <?php
      // ใช้ตัวแปร $activePage ที่กำหนดจากหน้าหลัก หากยังไม่ได้กำหนดให้ถือเป็น home
      if (!isset($activePage)) $activePage = 'home';
      $isHome = ($activePage === 'home');
      $footerHomeHref = $isHome ? '#top' : 'index.php';
      $footerServicesHref = $isHome ? '#services' : 'index.php#services';
      $footerNewsHref = 'news.php';
      $footerStatusHref = $isHome ? '#water-status' : 'index.php#water-status';
      $footerInfoHref = $isHome ? '#information' : 'index.php#information';
      $footerContactHref = $isHome ? '#contact' : 'index.php#contact';
    ?>
    <footer class="site-footer" id="about">
      <div class="container footer-main">
        <div class="footer-about" id="contact">
          <a class="footer-brand" href="<?php echo $footerHomeHref; ?>"><img src="assets/logos/กองการประปา%20logo.PNG" alt="ตราสัญลักษณ์เทศบาลนครพิษณุโลก"><span><strong>กองการประปา</strong><small>เทศบาลนครพิษณุโลก</small></span></a>
          <address>
            <p><span class="material-symbols-rounded" aria-hidden="true">location_on</span> 1299 ถนนบรมไตรโลกนารถ 2 ตำบลในเมือง อำเภอเมือง จังหวัดพิษณุโลก 65000</p>
            <p><span class="material-symbols-rounded" aria-hidden="true">call</span> โทรศัพท์: <a href="tel:055983230">055-983230</a></p>
          </address>
          <!-- ปุ่มแผนที่รอ URL ทางการ จึงไม่เปิดบริการภายนอก -->
          <button class="map-button" id="map-button" type="button" aria-disabled="true" aria-describedby="map-status"><span class="material-symbols-rounded" aria-hidden="true">location_on</span> ดูแผนที่การเดินทาง</button>
          <p class="map-status" id="map-status" role="status" aria-live="polite">รอยืนยัน URL แผนที่จากหน่วยงาน</p>
          <div class="social-links" aria-label="ตัวอย่างช่องทางสื่อสารที่รอการยืนยันลิงก์ทางการ"><span><img src="assets/contact/Facebook%20logo.png" alt=""> Facebook</span><span><img src="assets/contact/Line%20OA%20logo.png" alt=""> LINE Official</span></div>
        </div>
        <nav class="footer-nav" aria-label="บริการประชาชน"><h2>บริการประชาชน</h2><a href="<?php echo $footerServicesHref; ?>">แจ้งปัญหาน้ำประปา</a><a href="<?php echo $footerServicesHref; ?>">ขอใช้น้ำประปา</a><a href="<?php echo $footerServicesHref; ?>">ชำระค่าน้ำประปา</a><a href="citizen-guide.php">คู่มือประชาชน</a><a href="faqs.php">คำถามที่พบบ่อย</a><a href="<?php echo $footerContactHref; ?>">ติดต่อเจ้าหน้าที่</a></nav>
        <nav class="footer-nav" aria-label="ข้อมูลเผยแพร่"><h2>ข้อมูลเผยแพร่</h2><a href="<?php echo $footerNewsHref; ?>">ข่าวประชาสัมพันธ์</a><a href="<?php echo $footerInfoHref; ?>">ข้อมูลการใช้น้ำ</a><a href="<?php echo $footerStatusHref; ?>">คุณภาพน้ำประปา</a><a href="<?php echo $footerNewsHref; ?>">ประกาศ</a><a href="procurement.php"<?php echo ($activePage === 'procurement') ? ' aria-current="page"' : ''; ?>>จัดซื้อจัดจ้าง</a></nav>
        <nav class="footer-nav policy-nav" aria-label="กฎหมายและนโยบาย"><h2>กฎหมายและนโยบาย</h2><ul><li>PDPA</li><li>นโยบายเว็บไซต์</li><li>นโยบายความเป็นส่วนตัว</li><li>นโยบายคุกกี้</li><li>ข้อกำหนดการใช้งาน</li></ul><p>รอเนื้อหาจากหน่วยงาน</p></nav>
        <nav class="footer-nav" aria-label="หน่วยงานที่เกี่ยวข้อง"><h2>หน่วยงานที่เกี่ยวข้อง</h2><a href="https://www.phsmun.go.th/" target="_blank" rel="noopener noreferrer">เทศบาลนครพิษณุโลก <span class="material-symbols-rounded" aria-hidden="true">open_in_new</span></a></nav>
      </div>
      <div class="footer-bottom"><div class="container footer-bottom-inner"><p>© 2569 กองการประปา เทศบาลนครพิษณุโลก สงวนลิขสิทธิ์ตามกฎหมาย</p><span>เอกสารกฎหมายและนโยบายรอเผยแพร่จากหน่วยงาน</span></div></div>
    </footer>
    <!-- สิ้นสุดส่วนท้ายเว็บไซต์ -->
