<?php get_header(); ?>

<header>
  <nav>
    <a href="/land-for-sale/">Land for Sale</a>
  </nav>
  <h1><?php bloginfo('name'); ?></h1>
  <p class="tagline">Conserving and restoring native habitat in Texas’s Big Bend.</p>
</header>

<main id="main-content">
  <section id="about" class="about">
    <p>
      ReGreen Big Bend helps landowners in the 190,000-acre Terlingua Ranch
      deploy native plants and water conservation techniques to restore desert land for
      flora and fauna. We do so by example on our own land and by growing and
      selling native plants.
    </p>

    <p>Our goal is to have fun doing something good for the land and creatures. It’s not
      any big, organized deal. We’re making it up as we go along, making sure to
      consult experts and not do anything harmful.</p>

    <p>We work mostly in the winter because it's just too hot the rest of the time.</p>
  </section>

  <section id="contact" class="contact">
    <h2>Get in Touch</h2>

    <p>Also <a href="https://www.instagram.com/regreenbigbend/" class="contact">@regreenbigbend</a> on Instagram, now
      and then. Mostly then.
    </p>

    <form class="contact" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
      <div><label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" autocomplete="true" required>
      </div>

      <div><label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" autocomplete="true" required>
      </div>

      <div><label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Message" required></textarea>
      </div>

      <?php wp_nonce_field('contact_form_submit'); ?>
      <input type="hidden" name="action" value="contact_form_submission">
      <button type="submit">Send</button>
    </form>

  </section>

  <section id="resources" class="resources">
    <h2>Resources</h2>
    <ul class="resources">
      <li><a href="https://www.npsot.org/chapters/big-bend/">Big Bend Chapter</a> of the Native Plant Society of Texas
      </li>
      <li><a href="https://www.ckwri.tamuk.edu/research-programs/texas-native-seeds-program-tns">Texas Native Seed
          Program</a></li>
      <li><a href="https://www.npsot.org">Native Plant Society of Texas</a></li>
      <li><a href="https://www.cdri.org">Chihuahuan Desert Nature Center</a></li>
      <li>Jim Martinez and Jim Fissel, and their book <a href="https://a.co/d/iON96BW"><cite>Marfa Garden</cite></a>
      </li>
      <li>Brad Lancaster and his <a
          href="https://www.amazon.com/stores/Brad-Lancaster/author/B00E82SVUW?ref=ap_rdr&amp;isDramIntegrated=true&amp;shoppingPortalEnabled=true">books
          on rainwater harvesting</a></li>
      <li>Robert Pavlis, <a href="https://a.co/d/0FHXNu9"><cite>Soil Science for Gardeners</cite></a></li>
      <li><a href="https://www.plantsofthesouthwest.com">Plants of the Southwest</a>, Santa Fe, NM</li>
      <li><a href="http://southwestperennials.com">Southwest Perennials</a>, Dallas, TX</li>
      <li><a href="https://bamertseed.com">Bamert Seed</a>, Muleshoe, TX</li>
    </ul>
  </section>
</main>

<?php get_footer(); ?>