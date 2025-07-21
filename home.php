<?php include("header.php"); ?>

<!-- home section starts -->
<div class="home">
   <section class="center">
      <form action="search.php" method="post">
         <h3>find your perfect home</h3>
         <div class="box">
            <p>enter location <span>*</span></p>
            <input type="text" name="location" required maxlength="50" placeholder="enter city name" class="input">
         </div>
         <div class="flex">
            <div class="box">
               <p>property type <span>*</span></p>
               <select name="type" class="input" required>
                  <option value="flat">flat</option>
                  <option value="house">house</option>
                  <option value="shop">shop</option>
               </select>
            </div>
            <div class="box">
               <p>how many BHK <span>*</span></p>
               <select name="bhk" class="input" required>
                  <option value="1">1 BHK</option>
                  <option value="2">2 BHK</option>
                  <option value="3">3 BHK</option>
                  <option value="4">4 BHK</option>
                  <option value="5">5 BHK</option>
                  <option value="6">6 BHK</option>
                  <option value="7">7 BHK</option>
                  <option value="8">8 BHK</option>
                  <option value="9">9 BHK</option>
               </select>
            </div>
            <div class="box">
               <p>minimum budget <span>*</span></p>
               <select name="minimum" class="input" required>
                  <option value="5000000">5 lac</option>
                  <option value="1000000">10 lac</option>
                  <option value="2000000">20 lac</option>
                  <option value="3000000">30 lac</option>
                  <option value="4000000">40 lac</option>
                  <option value="5000000">50 lac</option>
                  <option value="6000000">60 lac</option>
                  <option value="7000000">70 lac</option>
                  <option value="8000000">80 lac</option>
                  <option value="9000000">90 lac</option>
                  <option value="10000000">1 Cr</option>
                  <option value="20000000">2 Cr</option>
                  <option value="30000000">3 Cr</option>
                  <option value="40000000">4 Cr</option>
                  <option value="50000000">5 Cr</option>
                  <option value="60000000">6 Cr</option>
                  <option value="70000000">7 Cr</option>
                  <option value="80000000">8 Cr</option>
                  <option value="90000000">9 Cr</option>
                  <option value="100000000">10 Cr</option>
                  <option value="150000000">15 Cr</option>
                  <option value="200000000">20 Cr</option>
               </select>
            </div>
            <div class="box">
               <p>maximum budget <span>*</span></p>
               <select name="maximum" class="input" required>
                  <option value="5000000">5 lac</option>
                  <option value="1000000">10 lac</option>
                  <option value="2000000">20 lac</option>
                  <option value="3000000">30 lac</option>
                  <option value="4000000">40 lac</option>
                  <option value="5000000">50 lac</option>
                  <option value="6000000">60 lac</option>
                  <option value="7000000">70 lac</option>
                  <option value="8000000">80 lac</option>
                  <option value="9000000">90 lac</option>
                  <option value="10000000">1 Cr</option>
                  <option value="20000000">2 Cr</option>
                  <option value="30000000">3 Cr</option>
                  <option value="40000000">4 Cr</option>
                  <option value="50000000">5 Cr</option>
                  <option value="60000000">6 Cr</option>
                  <option value="70000000">7 Cr</option>
                  <option value="80000000">8 Cr</option>
                  <option value="90000000">9 Cr</option>
                  <option value="100000000">10 Cr</option>
                  <option value="150000000">15 Cr</option>
                  <option value="200000000">20 Cr</option>
               </select>
            </div>
         </div>
         <input type="submit" value="search property" name="search" class="btn">
      </form>
   </section>
</div>
<!-- home section ends -->

<!-- services section starts -->
<section class="services">
   <h1 class="heading">our services</h1>
   <div class="box-container">

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>buy house</h3>
         <p>Search and filter listings by location, budget, and features.</p>
      </div>

      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>rent house</h3>
         <p>Browse rentals with flexible filters and move-in options.</p>
      </div>

      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>sell house</h3>
         <p>Create detailed listings with images and descriptions.</p>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>flats and buildings</h3>
         <p>Find the perfect space using powerful location filters.</p>
      </div>

      <div class="box">
         <img src="images/icon-5.png" alt="">
         <h3>shops and malls</h3>
         <p>Discover commercial complexes and shop spaces.</p>
      </div>

      <div class="box">
         <img src="images/icon-6.png" alt="">
         <h3>24/7 service</h3>
         <p>Access property listings and services anytime.</p>
      </div>

   </div>
</section>
<!-- services section ends -->

<!-- listings section starts -->
<section class="listings">
   <h1 class="heading">latest listings</h1>
   <div class="box-container">

      <div class="box">
         <div class="admin">
            <h3>j</h3>
            <div>
               <p>john deo</p>
               <span>10-11-2022</span>
            </div>
         </div>
         <div class="thumb">
            <p class="total-images"><i class="far fa-image"></i><span>4</span></p>
            <p class="type"><span>house</span><span>sale</span></p>
            <form action="" method="post" class="save">
               <button type="submit" name="save" class="far fa-heart"></button>
            </form>
            <img src="images/house-img-1.webp" alt="">
         </div>
         <h3 class="name">modern flats and apartments</h3>
         <p class="location"><i class="fas fa-map-marker-alt"></i><span>Telangana, India.</span></p>
         <div class="flex">
            <p><i class="fas fa-bed"></i><span>3</span></p>
            <p><i class="fas fa-bath"></i><span>2</span></p>
            <p><i class="fas fa-maximize"></i><span>750sqft</span></p>
         </div>
         <a href="view_property.php" class="btn">view property</a>
      </div>

      <!-- Repeat above box for more listings if needed -->

   </div>
   <div style="margin-top: 2rem; text-align:center;">
      <a href="listings.php" class="inline-btn">view all</a>
   </div>
</section>
<!-- listings section ends -->

<?php include("footer.php"); ?>
